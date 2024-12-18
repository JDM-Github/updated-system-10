<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lecheria_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];  // Fix the incorrect syntax
$result = $conn->query("SELECT * FROM jobs WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];
    $conn->query("UPDATE jobs SET job_title='$title', job_description='$description', salary='$salary' WHERE id=$id");
    header("Location: viewJobs.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Job</title>
 
</head>
<body>

<div class="container">
    <h2>Edit Job</h2>
    <form method="post" action="">
        <label for="title">Job Title:</label>
        <input type="text" name="title" id="title" value="<?php echo $row['job_title']; ?>" required>

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="<?php echo $row['job_description']; ?>">

        <label for="salary">Salary:</label>
        <input type="number" name="salary" id="salary" step="0.01" value="<?php echo $row['salary']; ?>">

        <button type="submit" name="update">Update Job</button>
    </form>
    $userId=1; 
    $imageSrc="get_image.php?id=".$userId;

echo "<img src='$imageSrc' alt='Profile Picture' />";

</div>

<style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }
        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }
        button:hover {
            background-color: #218838;
        }
        img {
    border-radius: 50%;
    width: 100px;  /* Adjust the size of the image */
    height: 100px;
    object-fit: cover; /* Ensures the image fits within the circular shape */
            }
    </style>

</body>

// Assuming $userId contains the ID of the user



</html>

<?php $conn->close(); ?>
