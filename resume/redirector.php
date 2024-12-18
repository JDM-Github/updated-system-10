<?php
session_start();
require_once("./config.php");


$userName = isset($_SESSION['userName']) ? htmlspecialchars($_SESSION['userName']) : 'Guest';

// Utility Function for Database Connection
function getDatabaseConnection()
{
    $database = new MySQLi("sql111.infinityfree.com", "if0_37929558", "M38umBz3st850z", "if0_37929558_database");
    if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
    }
    return $database;
}


// if ($_POST['type'] === 'login') {
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     // Query to check the credentials (simplified)
//     $conn = new mysqli('localhost', 'root', 'admin', 'lecheria_db');
//     $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
//     $stmt->bind_param("ss", $email, $password); // Assuming password is stored in plain text (use hashing in production)
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         $user = $result->fetch_assoc();
//         $_SESSION['user_email'] = $user['email_address'];  // Set session variable
//         header('Location: dashboard.php');  // Redirect to a protected page
//     } else {
//         $_SESSION['email-put'] = $email;  // Remember the email if login fails
//         header('Location: login.php');  // Redirect back to login
//     }
// }


// Function to Record Login Attempt
function recordLoginAttempt($database, $email)
{
    $stmt = $database->prepare("INSERT INTO login_attempts (email_address, attempt_time) VALUES (?, NOW())");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->close();
}

// Login Function
function login()
{
    $database = getDatabaseConnection();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $maxAttempts = 3; // Max allowed attempts
    $timeFrame = 1;  // Timeframe in minutes

    // Check if the user is blocked
    $stmt = $database->prepare("SELECT COUNT(*) AS attempts FROM login_attempts WHERE email_address = ? AND attempt_time > (NOW() - INTERVAL ? MINUTE)");
    $stmt->bind_param('si', $email, $timeFrame);
    $stmt->execute();
    $stmt->bind_result($attempts);
    $stmt->fetch();
    $stmt->close();

    if ($attempts >= $maxAttempts) {
        $_SESSION['error'] = "Too many failed login attempts. Please try again in $timeFrame minute(s).";
        header("Location: registration.php");
        exit;
    }

    // Query to get user data
    $stmt = $database->prepare("SELECT id, userName, password, approval_status FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($userId, $userName, $hashedPassword, $approvalStatus);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            if ($approvalStatus == 'approved') {
                $_SESSION["user"] = [
                    'username' => $userName,
                    'email' => $email,
                    'id' => $userId,
                ];
                $_SESSION['fuck'] = "TETS";
                $_SESSION['userName'] = $userName;
                $_SESSION['success'] = "Login successful! Welcome, $userName.";

                // Clear login attempts
                $stmt = $database->prepare("DELETE FROM login_attempts WHERE email_address = ?");
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $stmt->close();

                header("Location: dashboard.php");
                exit;
            } elseif ($approvalStatus == 'disapproved') {
                $_SESSION['error'] = "Your account has been disapproved. Please visit the Barangay Office for clarification.";
            } else {
                $_SESSION['error'] = "Your account is still pending approval.";
            }
        } else {
            recordLoginAttempt($database, $email);
            $_SESSION['error'] = "Incorrect password.";
        }
    } else {
        recordLoginAttempt($database, $email);
        $_SESSION['error'] = "User with this email does not exist or account is inactive.";
    }

    $stmt->close();
    $database->close();

    $_SESSION["email-put"] = $email;
    header("Location: registration.php");
    exit;
}

// Register Function
function register()
{
    $database = getDatabaseConnection();
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $database->prepare("INSERT INTO users (userName, firstName, lastName, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $userName, $firstName, $lastName, $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registration successful! Your account is now pending approval.";
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
        header("Location: registration.php?page=register");
        exit;
    }

    $stmt->close();
    $database->close();

    header("Location: registration.php");
    exit;
}

// Request Detection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["type"];

    if ($type == "login") {
        login();
    }
    if ($type == "register") {
        register();
    }
}
?>