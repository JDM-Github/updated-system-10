<?php
session_start();
?>
<?php
require_once("modals.php");

if (isset($_SESSION['success'])) {
    echo "<script>showSuccessModal('{$_SESSION['success']}');</script>";
    unset($_SESSION['success']);
} elseif (isset($_SESSION['error'])) {
    echo "<script>showErrorModal('{$_SESSION['error']}');</script>";
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Resume</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            min-width: 500px;
            margin-top: 10px;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .btn-custom {
            background-color: #28a745;
            color: #fff;
            font-size: 14px;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .btn-outline-success {
            font-size: 14px;
        }

        .form-title {
            color: #28a745;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .skill-input {
            margin-bottom: 8px;
        }

        .back-button {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 10;
        }

        .profile-image-preview {
            display: block;
            margin: 0 auto 15px;
            max-width: 150px;
            max-height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <a href="javascript:history.back();" class="absolute top-10 left-0 btn btn-success btn-sm back-button">Back</a>

    <div class="form-container">
        <h1 class="text-center form-title">Create Resume</h1>
        <form action="process-resume.php" method="POST" id="resumeForm" enctype="multipart/form-data">
            <?php
            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
                $id = $user['id'];
                $name = $user['username'];
                $birthDate = $user['birthDate'];
                $address = $user['address'];
                $disabled = "readonly";
            } else {
                $id = "";
                $name = "";
                $birthDate = "";
                $address = "";
                $disabled = "";
            }
            ?>
            <input type="hidden" name="id" value="<?= $id ?>">
            <!-- Profile Image Upload -->
            <div class="mb-3 text-center">
                <img src="default-profile.png" alt="Profile Image" id="profilePreview" class="profile-image-preview">
                <label for="profileImage" class="form-label">Upload Profile Picture</label>
                <input type="file" class="form-control form-control-sm" id="profileImage" name="profileImage"
                    accept="image/*">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control form-control-sm" id="name" name="name"
                    value="<?= $name ?>" placeholder="Enter your name" required <?= $disabled ?>>
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Birthdate</label>
                <input type="date" class="form-control form-control-sm" id="birthdate" name="birthdate"
                    value="<?= $birthDate ?>" required <?= $disabled ?>>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control form-control-sm" id="address" name="address"
                    value="<?= $address ?>" placeholder="Enter your address" required <?= $disabled ?>>
            </div>
            <div class="mb-3">
                <label for="sex" class="form-label">Sex</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="male" value="Male" required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="female" value="Female" required>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="isEmployed" class="form-label">Employment Status</label>
                <select class="form-select form-select-sm" id="isEmployed" name="isEmployed" required>
                    <option value="">Select status</option>
                    <option value="Yes">Employed</option>
                    <option value="No">Unemployed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="education" class="form-label">Educational Attainment</label>
                <select class="form-select form-select-sm" id="education" name="education" required>
                    <option value="">Select education</option>
                    <option value="High School">High School</option>
                    <option value="Associate Degree">Associate Degree</option>
                    <option value="Bachelor's Degree">Bachelor's Degree</option>
                    <option value="Master's Degree">Master's Degree</option>
                    <option value="Doctorate">Doctorate</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="objectives" class="form-label">Objectives</label>
                <textarea class="form-control form-control-sm" id="objectives" name="objectives" rows="2"
                    placeholder="Enter your career objectives" required></textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control form-control-sm" id="description" name="description" rows="2"
                    placeholder="Enter your description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="skills" class="form-label">Skills</label>
                <div id="skillsContainer">
                    <input type="text" class="form-control form-control-sm skill-input" name="skills[]" 
                           placeholder="Enter skill" required>
                </div>
                <button type="button" class="btn btn-outline-success btn-sm mt-2" id="addSkillBtn">Add Skill</button>
            </div>
            <button type="submit" class="btn btn-custom btn-sm w-100 mt-3">Generate Resume</button>
        </form>
        <button onclick="alert('Do you need help?')" class="btn btn-outline-success btn-sm w-100 mt-3">Need Help?</button>
        <p class="text-center mt-3">Already created a resume? <a href="resumePage.php" class="text-success">View Resume</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        document.getElementById("addSkillBtn").addEventListener("click", function () {
            const skillsContainer = document.getElementById("skillsContainer");
            const skillInput = document.createElement("input");
            skillInput.type = "text";
            skillInput.className = "form-control form-control-sm skill-input";
            skillInput.name = "skills[]";
            skillInput.placeholder = "Enter skill";
            skillsContainer.appendChild(skillInput);
        });

        document.getElementById("profileImage").addEventListener("change", function (event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById("profilePreview").src = URL.createObjectURL(file);
            }
        });
    </script>
</body>

</html>
