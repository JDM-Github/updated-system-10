<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lecheria_db"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM jobs WHERE id=$id");
    header("Location: viewJobs.php");
}

// Fetch jobs
$result = $conn->query("SELECT * FROM jobs");

// Adding a new job
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];
    $conn->query("INSERT INTO jobs (job_title, job_description, salary) VALUES ('$title', '$description', '$salary')");
    header("Location: viewJobs.php");
}

// Update job details
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];
    $conn->query("UPDATE jobs SET job_title='$title', job_description='$description', salary='$salary' WHERE id=$id");
    header("Location: viewJobs.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | View Jobs</title>
    
    
    <!-- CSS Custom File -->
    <link rel="stylesheet" href="/myWeb/CSS/view_jobs.css">
        
</head>
<body>
    
<a href="index.php" class="anchor">Back</a>
    <div class="container">
    <style>
    body {
        margin: 0;
        padding: 0;
        background-image: url('bg.jpeg'); /* Replace with your image URL */
        background-size: cover; /* Ensures the image covers the whole screen */
        background-position: center; /* Centers the image */
        background-repeat: no-repeat; /* Prevents the image from repeating */
        height: 100vh; /* Sets the body height to fill the viewport */
    }
</style>
    <h2>Job Listings</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Job Title</th>
            <th>Description</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['job_title']; ?></td>
            <td><?php echo $row['job_description']; ?></td>
            <td><?php echo $row['salary']; ?></td>
            <td>
                <a href="editJobs.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="viewJobs.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    </div>
   
</body>
</html>

<?php $conn->close(); ?>
