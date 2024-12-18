<?php
// Database connection setup
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lecheria_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];
    $conn->query("INSERT INTO jobs (job_title, job_description, salary) VALUES ('$title', '$description', '$salary')");
    header("Location: viewJobs.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin | Add Job</title>

    <!-- CSS FILE LINK -->
    <link rel="stylesheet" href="/myWeb/CSS/add_job.css">
</head>
<body>
<a href="index.php" class="anchor">Back</a>
<div class="container">
    <h2>Add a New Job</h2>
    <form method="post" action="">
        <label for="title">Job Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Description:</label>
        <input type="text" name="description" id="description">

        <label for="salary">Salary:</label>
        <input type="number" name="salary" id="salary" step="0.01">

        <button type="submit" name="add">Add Job</button>
    </form>
</div>

</body>
</html>
