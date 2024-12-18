<!-- Start of PHP Config -->
<?php

    @include 'config.php';

    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];

        $select = " SELECT * FROM admin_form WHERE email = '$email' && password = '$pass' ";


        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $error[] = 'User Already Exist!';
        }else{

            if($pass != $cpass){
                $error[] = 'Password not Matched!';
            }else{
                $insert = "INSERT INTO admin_form(name,email ,password ,user_type) VALUES ('$name','$email', '$pass','$user_type')";
                mysqli_query($conn, $insert);
                header('location:login_form.php');
            };
        };
    };

?>

<!-- End of PHP Config -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- CSS FILE LINK -->
    <link rel="stylesheet" href="/myWeb/CSS/style.css">
    
</head>
<body>
    
<div class="form-container">
    <form action="" method="post">
        <h3>Register Now</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        }
        ?>
        <input type="text" name="name" required placeholder="Enter Your Name">
        <input type="email" name="email" required placeholder="Enter Your Email">
        <input type="password" name="password" required placeholder="Enter Your Password">
        <input type="password" name="cpassword" required placeholder="Confirm Your password">
        <select name="user_type" id="">
            <option value="admin">admin</option>
        </select>
        <input type="submit" name="submit" value="Register Now" class="form-btn">
        <p>Already Have an Account? <a href="login_form.php">Login Now!</a></p>
 
    </form>
</div>

</body>
</html>