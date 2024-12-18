<?php
// Database connection
$db_server = "localhost";
$db_user = "root";
$db_pass = "admin";
$db_name = "lecheria_db";

session_start();
$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the user you want to query

// Use a prepared statement to safely query the database
$stmt = $conn->prepare("SELECT * FROM resume WHERE user_id = ?");
$stmt->bind_param("s", $_SESSION['user']['id']);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Extract data with fallback for missing values
    $name = $row['full_name'] ?? 'N/A';
    $email = $row['email_address'] ?? 'N/A';
    $contact = $row['phone_number'] ?? 'N/A';
    $birthdate = $row['birth_date'] ?? 'N/A';
    $gender = $row['gender'] ?? 'N/A';
    $address = $row['address'] ?? 'N/A';
    $objectives = $row['objectives'] ?? 'N/A';
    $skills = $row['skills'] ?? 'N/A';
    $programCourse = $row['program_course'] ?? 'N/A';
    $educAttainment = $row['educ_attainment'] ?? 'N/A';
    $status = $row['status'] ?? 'N/A';
    $speciality = $row['speciality'] ?? 'N/A';

    // Get the user ID for the image (or another unique identifier)
    $userId = $row['id']; // Assuming 'id' is the primary key
} else {
    // Default placeholders for empty data
    $name = $email = $contact = $birthdate = $gender = $address = $objectives = $skills = $programCourse = $educAttainment = $status = $speciality = "N/A";
}

// Close database connection
$stmt->close();
$conn->close();

// Assuming you already have $userId from your database or query
$userId = 1; // Replace with the actual user ID you're fetching

// Your existing PHP code where you're outputting the user's details
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 8.5in;
            height: 13in;
            background: white;
            color: black;
            line-height: 1.5;
            padding: 1in; /* Adjust margin for content */
            box-sizing: border-box;
        }
        h1 {
            font-size: 24px;
            text-align: center;
            margin: 0 0 20px 0;
        }
        p, td {
            font-size: 14px;
            margin: 5px 0;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            font-size: 18px;
            margin-bottom: 10px;
            text-transform: uppercase;
            border-bottom: 1px solid black;
            padding-bottom: 5px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table td {
            vertical-align: top;
            padding: 3px 5px;
        }
        .info-table td:first-child {
            width: 35%;
            font-weight: bold;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        ul li {
            margin: 5px 0;
        }
        hr {
            border: 1px solid black;
            margin: 20px 0;
        }
        .print-btn {
            display: block;
            width: 100px;
            margin: 10px auto;
            padding: 10px;
            text-align: center;
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .print-btn:hover {
            background-color: #45a049;
        }
        @media print {
            .print-btn {
                display: none;
            }
        }
        img {
            border-radius: 50%; /* Circular image */
            width: 100px;
            height: 100px;
            object-fit: cover; /* Ensure image fits nicely in the circle */
            margin-right: 20px; /* Space between the image and text */
        }
    </style>
    <script>
        function printResume() {
            window.print();
        }
    </script>
</head>
<body>
    <div style='display: flex; align-items: center; justify-content: center;'>
        
        <!-- Display the user's name and other information -->
        <h1>$name</h1>
    </div>

    <p style='text-align: center;'>$address</p>
    <p style='text-align: center;'>Mobile: $contact | Email: $email</p>

    <hr>

    <div class='section'>
        <h2>Personal Information</h2>
        <table class='info-table'>
            <tr><td>Date of Birth:</td><td>$birthdate</td></tr>
            <tr><td>Gender:</td><td>$gender</td></tr>
            <tr><td>Status:</td><td>$status</td></tr>
        </table>
    </div>

    <div class='section'>
        <h2>Career Objective</h2>
        <p>$objectives</p>
    </div>

    <div class='section'>
        <h2>Skills</h2>
        <ul>";
// Skills are split and displayed as a list
$skillsList = explode(',', $skills);
foreach ($skillsList as $skill) {
    echo "<li>" . trim($skill) . "</li>";
}
echo "
        </ul>
    </div>

    <div class='section'>
        <h2>Educational Background</h2>
        <table class='info-table'>
            <tr><td>Program/Course:</td><td>$programCourse</td></tr>
            <tr><td>Educational Attainment:</td><td>$educAttainment</td></tr>
        </table>
    </div>

    <div class='section'>
        <h2>Speciality</h2>
        <p>$speciality</p>
    </div>
    <button class='print-btn' onclick='printResume()'>Print</button>
</body>
</html>";
?>