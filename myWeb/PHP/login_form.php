<!-- Start of PHP Config -->
<?php

    @include 'config.php';
    session_start();
    if(isset($_POST['submit'])){

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['password']);

        $select = " SELECT * FROM admin_form WHERE email = '$email' && password = '$pass' ";


        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);

            if($row['user_type'] == 'admin'){
                $_SESSION['admin_name'] = $row['name'];
                header('location:index.php');
            }
            //elseif($row['user_type]) == 'user'){
            //$_SESSION['user_name'] = $row['name'];
            //header('location:user_page.php');
            //}
        }else{
            $error[] = 'Incorrect Email and Password!';
        };
    };

?>

<!-- End of PHP Config -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login Page</title>

    <!-- CSS FILE LINK -->
    <link rel="stylesheet" href="/myWeb/CSS/style.css">
    <style>
    .bgc {
        background-image: url('logobg.jpeg'); /* Replace with your image URL */
        background-size: cover; /* Ensures the image covers the whole screen */
        background-position: center; /* Centers the image */
        background-repeat: no-repeat; /* Prevents the image from repeating */
        height: 100vh; /* Sets the body height to fill the viewport */
    }
    </style>
</head>

<body class="bgc">
    <div class="form-container">
        <form action="" method="post">
            <h3>Log In Now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            }
            ?>
            <input type="email" name="email" required placeholder="Enter Your Email">
            <input type="password" name="password" required placeholder="Enter Your Password">
            <input type="submit" name="submit" value="Login Now" class="form-btn">
        </form>
    </div>
</body>
</html>
