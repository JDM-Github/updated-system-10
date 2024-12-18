<?php
session_start();
include_once "header.php";
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<body class="bg-light">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('bg.jpeg');
            /* Replace with your image URL */
            background-size: cover;
            /* Ensures the image covers the whole screen */
            background-position: center;
            /* Centers the image */
            background-repeat: no-repeat;
            /* Prevents the image from repeating */
            height: 100vh;
            /* Sets the body height to fill the viewport */
        }
    </style>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-success shadow-sm">
        <div class="container">
            <span class="navbar-text me-auto" style="font-size: 20px;">
                Welcome |
                <strong>
                    <?php
                    // Check if the user is logged in and display the username or default message
                    echo isset($_SESSION['userName']) ? htmlspecialchars($_SESSION['userName']) : 'Guest';
                    ?>
                </strong>
            </span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="dashboard.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="tutorial.php">Tutorial</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="Form.php">Create Resume</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="resumetest.php">My Resume</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="registration.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>




    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            /* Light background color */
        }

        .bulletin-card {
            margin-right: 20px;
            width: 30%;
            /* Set the width of the bulletin card */
            position: fixed;
            /* Fix the position */
            right: 0;
            /* Align to the right */
            top: 20%;
            /* Adjust the top position as needed */
        }
    </style>
    </head>

    <body>
        <div class="container mt-4">
        </div>
        <div class="bulletin-card"> <!-- Right-aligned bulletin card -->
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h5 class="mb-0">Bulletin Board</h5>
                </div>
                <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                    <ul class="list-group list-group-flush" id="userBulletinList">
                        <!-- Bulletin items will be added here -->
                    </ul>
                </div>
            </div>
        </div>

        <script>
            // Function to load bulletins from localStorage
            function loadUserBulletins() {
                const list = document.getElementById('userBulletinList');
                list.innerHTML = ''; // Clear existing list
                const bulletins = JSON.parse(localStorage.getItem('bulletins')) || [];
                bulletins.forEach(content => {
                    const newItem = document.createElement('li');
                    newItem.className = 'list-group-item';
                    newItem.innerHTML = `<strong>${content}</strong>`;
                    list.appendChild(newItem);
                });
            }

            // Load bulletins on page load
            window.onload = loadUserBulletins;
        </script>


        <!-- Toast Notification -->
        <div id="toast" class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
            <div id="toast-message" class="toast" style="background-color: #28a745; color: white;">
                <div class="toast-body">Success: Operation completed!</div>
            </div>
        </div>

        <!-- Notification Script -->
        <script>
            function showToast(message) {
                const toast = document.getElementById('toast');
                const toastMessage = document.getElementById('toast-message');
                toastMessage.querySelector('.toast-body').textContent = message;
                const bsToast = new bootstrap.Toast(toastMessage);
                bsToast.show();
            }

            <?php if (isset($_SESSION['success'])): ?>
                showToast("<?php echo $_SESSION['success']; ?>");
            <?php endif; ?>
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    <?php
    include_once "footer.php";
    ?>