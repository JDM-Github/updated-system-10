<?php
session_start();
// Add any session checks for admin authentication here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Home</title>
    <!-- Hamburger Something CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="/myWeb/CSS/admin_home.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        background-image: url('logobg.jpeg'); /* Replace with your image URL */
        background-size:500px; /* Ensures the image covers the whole screen */
        background-position: 800px; /* Centers the image */
        background-repeat: no-repeat; /* Prevents the image from repeating */
        height: 100vh; /* Sets the body height to fill the viewport */
    }
</style>
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

        <div class="content">
            <h3>Welcome to the Admin Dashboard</h3>
            <p>Select an option from the sidebar to manage your job listings and more.</p>
            <!-- Add content dynamically based on the selected option -->
        </div>
    </div>

</body>
</html>
