<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Barangay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Green theme and layout adjustments */
        body {
            background-color: #f8f9fa;
            font-family: "Poppins", Arial, sans-serif;
            padding: 20px;
        }

        h1,
        h2,
        h3 {
            color: #28a745;
        }

        .anchor {
            position: fixed;
            left: 20px;
            top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            z-index: 1000;
        }

        .anchor:hover {
            background-color: #218838;
        }

        .tree-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
        }

        .left-column {
            flex: 1;
            min-width: 30vw;
        }

        .barangay-image {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 2px solid #28a745;
        }

        .tree {
            flex: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .tree-level {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 20px 0;
        }

        .official {
            flex: 1;
            max-width: 150px;
            margin: 10px;
            text-align: center;
        }

        .official img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #28a745;
            margin-bottom: 8px;
        }

        .official p {
            margin: 0;
            font-size: 14px;
        }

        .official strong {
            color: #28a745;
        }
    </style>
</head>

<body>
    <!-- Back Button -->
    <a href="javascript:history.back();" class="anchor">Back</a>

    <div class="container">
        <div class="tree-container">
            <!-- <div class="left-column">
                <img src="download.jpeg" alt="Barangay Image" class="barangay-image">
            </div> -->

            <div class="tree">
                <div class="tree-level">
                    <div class="official">
                        <img src="https://via.placeholder.com/80" alt="SK Chairperson">
                        <p><strong>SK Chairperson</strong></p>
                        <p>Hon. Jhon Loid P. Larino</p>
                    </div>
                </div>

                <div class="tree-level">
                    <div class="official">
                        <img src="https://via.placeholder.com/80" alt="SK Councilor">
                        <p><strong>SK Councilor</strong></p>
                        <p>Hon. Jhonry C. Ferrer</p>
                    </div>
                    <div class="official">
                        <img src="https://via.placeholder.com/80" alt="SK Councilor">
                        <p><strong>SK Councilor</strong></p>
                        <p>Hon. Maria Estrella M. Duran</p>
                    </div>
                    <div class="official">
                        <img src="https://via.placeholder.com/80" alt="SK Councilor">
                        <p><strong>SK Councilor</strong></p>
                        <p>Hon. Jeremae Iara P. Salazar</p>
                    </div>
                    <div class="official">
                        <img src="https://via.placeholder.com/80" alt="SK Councilor">
                        <p><strong>SK Councilor</strong></p>
                        <p>Hon. Jerome G. Chavez</p>
                    </div>
                    <div class="official">
                        <img src="https://via.placeholder.com/80" alt="SK Councilor">
                        <p><strong>SK Councilor</strong></p>
                        <p>Hon. Kaye Zelle A. Barrion</p>
                    </div>
                    <div class="official">
                        <img src="https://via.placeholder.com/80" alt="SK Councilor">
                        <p><strong>SK Councilor</strong></p>
                        <p>Hon. Maureen C. Ancheta</p>
                    </div>
                    <div class="official">
                        <img src="https://via.placeholder.com/80" alt="SK Councilor">
                        <p><strong>SK Councilor</strong></p>
                        <p>Hon. Ma. Pauline T. Belleza</p>
                    </div>
                </div>

                <!-- Barangay Officials -->
                <div class="tree-level">
                    <div class="official">
                        <img src="https://via.placeholder.com/80" alt="Chairman">
                        <p><strong>Chairman</strong></p>
                        <p>Hon. Romel P. Casintahan</p>
                    </div>
                    <div class="official">
                        <img src="https://via.placeholder.com/80" alt="Secretary">
                        <p><strong>Secretary</strong></p>
                        <p>Maria Victoria Dollentas</p>
                    </div>
                    <div class="official">
                        <img src="https://via.placeholder.com/80" alt="Treasurer">
                        <p><strong>Treasurer</strong></p>
                        <p>Edward B. Gotengco</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>