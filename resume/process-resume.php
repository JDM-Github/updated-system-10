<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$username = "root";
$password = "admin";
$dbname = "lecheria_db";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn->begin_transaction();

    try {
        $profileImagePath = null;
        if (!empty($_FILES['profileImage']['name'])) {
            $targetDir = "uploads/";
            $profileImagePath = $targetDir . basename($_FILES['profileImage']['name']);
            if ($_FILES['profileImage']['error'] != UPLOAD_ERR_OK) {
                throw new Exception("File upload error: " . $_FILES['profileImage']['error']);
            }
            if (!move_uploaded_file($_FILES['profileImage']['tmp_name'], $profileImagePath)) {
                throw new Exception("Failed to upload profile image.");
            }
        }

        if (!isset($_POST['id'], $_POST['name'], $_POST['birthdate'], $_POST['address'], $_POST['sex'], $_POST['isEmployed'], $_POST['education'], $_POST['objectives'], $_POST['description'])) {
            throw new Exception("Missing required fields.");
        }

        $stmt = $conn->prepare("
            INSERT INTO resume (user_id, username, birth_date, address, sex, employment_status, education, objectives, description, profile_image_path)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "isssssssss",
            $_POST['id'],
            $_POST['name'],
            $_POST['birthdate'],
            $_POST['address'],
            $_POST['sex'],
            $_POST['isEmployed'],
            $_POST['education'],
            $_POST['objectives'],
            $_POST['description'],
            $profileImagePath
        );

        if (!$stmt->execute()) {
            throw new Exception("Error executing query: " . $stmt->error);
        }

        $userId = $stmt->insert_id;
        $stmt->close();

        if (!empty($_POST['skills'])) {
            $stmt = $conn->prepare("INSERT INTO skills (user_id, skill_name) VALUES (?, ?)");
            foreach ($_POST['skills'] as $skill) {
                $stmt->bind_param("is", $userId, $skill);
                if (!$stmt->execute()) {
                    throw new Exception("Error inserting skill: " . $stmt->error);
                }
            }
            $stmt->close();
        }

        $conn->commit();
        $_SESSION['success'] = "Resume saved successfully!";
        $_SESSION['user']['haveResume'] = true;
        header("Location: resumePage.php");
        exit;
    } catch (Exception $e) {
        $conn->rollback();
        $_SESSION['error'] = "Error saving resume: " . $e->getMessage();
        header("Location: createResume.php?error=true");
        exit;
    }
} else {
    $_SESSION['error'] = "Invalid request!";
    header("Location: createResume.php?error=true");
    exit;
}
?>