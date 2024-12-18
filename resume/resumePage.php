<?php
session_start();

$host = "localhost";
$username = "root";
$password = "admin";
$dbname = "admin_db";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user']['id'];

    $resumeQuery = "SELECT * FROM resume WHERE user_id = ?";
    $stmt = $conn->prepare($resumeQuery);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $resumeResult = $stmt->get_result();
    $resumeData = $resumeResult->fetch_assoc();

    $skillsQuery = "SELECT skill_name FROM skills WHERE user_id = ?";
    $stmt = $conn->prepare($skillsQuery);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $skillsResult = $stmt->get_result();
    $skills = [];
    while ($row = $skillsResult->fetch_assoc()) {
        $skills[] = $row['skill_name'];
    }

    $stmt->close();
} else {
    $_SESSION['error'] = "Please log in to view your resume.";
    header("Location: registration.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>My Resume</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            padding-top: 30px;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .back-button {
            color: #28a745;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .back-button:hover {
            text-decoration: underline;
        }

        h1 {
            color: #28a745;
            text-align: center;
            font-weight: bold;
            margin-bottom: 25px;
        }

        h2 {
            color: #343a40;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        p {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .resume-section h3 {
            font-size: 16px;
            color: #28a745;
            margin-bottom: 10px;
        }

        .resume-section p {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .btn-custom {
            background-color: #28a745;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            padding: 6px 12px;
            width: 100%;
            margin-top: 15px;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .toggle-content {
            display: none;
            margin-top: 10px;
        }

        .toggle-button {
            background-color: #f1f1f1;
            border: none;
            color: #28a745;
            padding: 6px 12px;
            cursor: pointer;
            width: 100%;
            text-align: left;
            border-radius: 5px;
        }

        .toggle-button:hover {
            background-color: #e9ecef;
        }

        @media print {
            body {
                background-color: #fff;
            }

            .container {
                box-shadow: none;
                padding: 0;
                margin: 0;
            }

            .back-button,
            button {
                display: none;
            }

            h1,
            h2,
            p {
                text-align: left;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Back Button -->
        <a href="javascript:history.back();" class="back-button"><i class="bi bi-arrow-left-circle"></i> Back</a>

        <!-- Resume Heading -->
        <h1>My Resume</h1>

        <!-- Name -->
        <h2><?php echo htmlspecialchars($resumeData['username']); ?></h2>

        <!-- Personal Information -->
        <div class="resume-section">
            <h3>Personal Information</h3>
            <p><strong>Birthdate:</strong> <?php echo htmlspecialchars($resumeData['birth_date']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($resumeData['address']); ?></p>
            <p><strong>Sex:</strong> <?php echo htmlspecialchars($resumeData['sex']); ?></p>
            <p><strong>Employment Status:</strong> <?php echo htmlspecialchars($resumeData['employment_status']); ?></p>
        </div>

        <!-- Objectives -->
        <div class="resume-section">
            <h3>Objectives</h3>
            <p><?php echo nl2br(htmlspecialchars($resumeData['objectives'])); ?></p>
        </div>

        <!-- Education -->
        <div class="resume-section">
            <h3>Education</h3>
            <p><strong>Degree:</strong> <?php echo htmlspecialchars($resumeData['education']); ?></p>
        </div>

        <!-- Skills Section with Toggle -->
        <div class="resume-section">
            <h3>Skills</h3>
            <button class="toggle-button" onclick="toggleSkills()">View Skills</button>
            <div class="toggle-content" id="skillsContent">
                <?php foreach ($skills as $skill): ?>
                    <p><?php echo htmlspecialchars($skill); ?></p>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Description -->
        <div class="resume-section">
            <h3>Description</h3>
            <p><?php echo nl2br(htmlspecialchars($resumeData['description'])); ?></p>
        </div>

        <button onclick="window.print()" class="btn btn-custom mt-3">Print Resume</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        function toggleSkills() {
            const skillsContent = document.getElementById('skillsContent');
            if (skillsContent.style.display === "none" || skillsContent.style.display === "") {
                skillsContent.style.display = "block";
            } else {
                skillsContent.style.display = "none";
            }
        }
    </script>

</body>

</html>