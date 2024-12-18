<?php
// Database connection
$db_server = "localhost";
$db_user = "root";
$db_pass = "admin";
$db_name = "lecheria_db";
session_start();

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user']['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $objectives = mysqli_real_escape_string($conn, $_POST['objectives']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);
    $programCourse = mysqli_real_escape_string($conn, $_POST['programCourse']);
    $educAttainment = mysqli_real_escape_string($conn, $_POST['educAttainment']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $speciality = mysqli_real_escape_string($conn, $_POST['speciality']);

    $sql = "INSERT INTO resume (user_id, full_name, email_address, phone_number, birth_date, gender, address, objectives, speciality, skills, program_course, educ_attainment, status)
            VALUES ('$user_id', '$name', '$email', '$contact', '$birthdate', '$sex', '$address', '$objectives', '$speciality', '$skills', '$programCourse', '$educAttainment', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo '
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh; text-align: center;">
            <div style="background-color: #f4f4f4; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 300px;">
                <h2 style="color: #4CAF50;">Submission Successful!</h2>
                <p>Your details have been submitted successfully.</p>
                <form action="dashboard.php" method="get">
                    <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                        Go to Dashboard
                    </button>
                </form>
            </div>
        </div>
        ';
    } else {
        echo "Submit Unsuccessful: " . $conn->error;
    }
}

$conn->close();
?>