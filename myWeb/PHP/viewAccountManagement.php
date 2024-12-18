<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "lecheria_db"; // Ensure this matches your database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Approve or disapprove account
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);  // Sanitize the ID
    $action = $_GET['action'];

    // Ensure the action is either 'approve' or 'disapprove'
    if (!in_array($action, ['approve', 'disapprove'])) {
        die('Invalid action');
    }

    $newStatus = $action === 'approve' ? 'approved' : 'disapproved';

    $updateQuery = "UPDATE users SET approval_status = '$newStatus' WHERE id = $id"; // Use 'approval_status'
    if ($conn->query($updateQuery) === TRUE) {
        $_SESSION['success'] = "Account has been $newStatus.";
        header("Location: viewAccountManagement.php");
        exit;
    } else {
        $_SESSION['error'] = "Error updating record: " . $conn->error;
    }
}

// Fetch user accounts
$result = $conn->query("SELECT id, userName, email, firstName, lastName, approval_status FROM users");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Account Management</title>
    <link rel="stylesheet" href="/myWeb/CSS/account_management.css">

</head>

<body>
    <a href="index.php" class="anchor">Back</a>
    <header>
        <h1>Account Management</h1>
    </header>

    <div class="container">
        <h2>All User Accounts</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <?php if ($row['approval_status'] != "disapproved"): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['userName']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['firstName']; ?></td>
                        <td><?php echo $row['lastName']; ?></td>
                        <td><?php echo ucfirst($row['approval_status']); ?></td>
                        <td>
                            <!-- Display both buttons for approval and disapproval -->
                            <a href="?action=approve&id=<?php echo $row['id']; ?>">Approve</a> |
                            <a href="?action=disapprove&id=<?php echo $row['id']; ?>"
                                onclick="return confirm('Are you sure you want to disapprove this account?');">Disapprove</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>

<?php
$conn->close();
?>