<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f5e9;
        }
        
        .header-title {
            color: #2e7d32;
            font-weight: bold;
            font-size: 2rem;
        }

        .header-subtitle {
            color: #388e3c;
            font-size: 1rem;
        }

        .tutorial-card {
            background-color: #ffffff;
            border: 1px solid #c8e6c9;
            border-radius: 8px;
            padding: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .tutorial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .tutorial-card img {
            width: 100%;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .tutorial-card h5 {
            color: #2e7d32;
            font-weight: bold;
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .tutorial-card p {
            color: #4caf50;
            font-size: 0.9rem;
        }

        .back-button {
            top: 15px;
            left: 15px;
            z-index: 10;
            font-size: 0.9rem;
            padding: 5px 10px;
            background-color: #2e7d32;
            color: white;
            border: none;
        }

        .back-button:hover {
            background-color: #388e3c;
        }
    </style>
</head>

<body>
    <!-- Back Button -->
    <a href="javascript:history.back();" class="btn position-fixed back-button">Back</a>

    <!-- Page Header -->
    <div class="container text-center mt-4">
        <h1 class="header-title">Tutorial: Professional Guide</h1>
        <p class="header-subtitle">Step-by-step instructions to get you started efficiently.</p>
    </div>

    <!-- Tutorial Steps -->
    <div class="container mt-5">
        <div class="row g-4">
            <!-- Step 1 -->
            <div class="col-md-4">
                <div class="tutorial-card">
                    <img src="https://via.placeholder.com/300x200" alt="Step 1">
                    <h5>Step 1</h5>
                    <p>Navigate to the registration page to begin the process.</p>
                </div>
            </div>
            <!-- Step 2 -->
            <div class="col-md-4">
                <div class="tutorial-card">
                    <img src="https://via.placeholder.com/300x200" alt="Step 2">
                    <h5>Step 2</h5>
                    <p>Fill out your details accurately and ensure all fields are completed.</p>
                </div>
            </div>
            <!-- Step 3 -->
            <div class="col-md-4">
                <div class="tutorial-card">
                    <img src="https://via.placeholder.com/300x200" alt="Step 3">
                    <h5>Step 3</h5>
                    <p>Review and submit the form. You will receive a confirmation email shortly.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>