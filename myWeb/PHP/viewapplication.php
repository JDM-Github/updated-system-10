<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "lecheria_db"; // Make sure this is the same database as the user login database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM usersdata WHERE id=$id");
    header("Location: viewapplication.php");
}

// Fetch user accounts without registration_date
$result = $conn->query("SELECT id, email_address, full_name, birth_date, educ_attainment FROM resume");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Manage Applications</title>

    <!-- CSS FILE LINK -->
    <link rel="stylesheet" href="/myWeb/CSS/view_application.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="hamburger">
                <i class="fas fa-bars" onclick="toggleSidebar()"></i>
            </div>
            <ul id="menu">
                <li><a href="/myWeb/PHP/index.php">Dashboard</a></li>
                <li><a href="/myWeb/PHP/viewapplication.php">Manage Applications</a></li>
                <li><a href="/myWeb/PHP/viewJobs.php">View Job Listings</a></li>
                <li><a href="/myWeb/PHP/addJobs.php">Add New Job</a></li>
                <li><a href="/myWeb/PHP/viewAccountManagement.php">Account Management</a></li>
                <li><a href="/myWeb/PHP/editBulletin.php">Bulletin</a></li>
                <li><a href="/myWeb/PHP/logout.php">Log Out</a></li>
            </ul>
        </div>


        <!-- Table for the Data for View Applications -->
        <div class="content">
            <h3>Applications</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Birthdate</th>
                    <th>Educational Attainment</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['email_address']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['birth_date']; ?></td>
                        <td><?php echo $row['educ_attainment']; ?></td>

                        <td>
                            <!-- Optional actions, e.g., delete or edit -->
                            <a href="resumetest.php?id=<?php echo $row['id']; ?>">View</a> |
                            <a href="viewapplication.php?delete=<?php echo $row['id']; ?>"
                                onclick="return confirm('Are you sure?');">Delete</a>


                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>

</html>