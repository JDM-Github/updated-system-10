<?php
// GINAGAMIT PARA DI MAULIT UNG EMAIL NA NILAGAY DATI
$email_put = $_SESSION['email-put'] ?? '';
unset($_SESSION['email-put']);
?>
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

<!-- SIMPLE LOGIN FORM -->

<h5 class="card-title text-center mb-4 text-success">Login</h5>
<form action="redirector.php" autocomplete="off" method="POST">
    <input type="hidden" name="type" value="login">

    <div class="mb-3">
        <label for="email" class="form-label text-success">Email address</label>
        <input type="email" class="form-control border-success" id="email" name="email" value="<?php echo $email_put ?>"
            required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label text-success">Password<span style="color: red;">*</span></label>
        <input type="password" class="form-control border-success" id="password" name="password" required
            oninput="validatePassword(this)">
        <small id="passwordError" style="color: red; display: none;">Password must not be 3 characters long.</small>
    </div>

    <script>
        function validatePassword(input) {
            const error = document.getElementById('passwordError');
            if (input.value.length === 3) {
                error.style.display = 'block';
            } else {
                error.style.display = 'none';
            }
        }
    </script>


    <button type="submit" class="btn btn-success w-100">Login</button>
</form>

<div class="mt-4 text-center">
    <p>Don't have an account? <a href="registration.php?page=register" class="text-success">Register</a></p>
</div>