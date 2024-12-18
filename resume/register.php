<!-- SIMPLE REGISTER FORM -->
<a href="javascript:history.back();" class="btn btn-success position-fixed" style="top: 10px; left: 10px;">Back</a>
<h5 class="card-title text-center mb-4 text-success">Register</h5>
<form action="redirector.php" method="POST">
    <input type="hidden" name="type" value="register">

    <div class="mb-3">
        <label for="userName" class="form-label text-success">Username</label>
        <input type="text" class="form-control border-success" id="userName" name="userName" required>
    </div>

    <div class="mb-3">
        <label for="firstName" class="form-label text-success">First Name</label>
        <input type="text" class="form-control border-success" id="firstName" name="firstName" required>
    </div>

    <div class="mb-3">
        <label for="lastName" class="form-label text-success">Last Name</label>
        <input type="text" class="form-control border-success" id="lastName" name="lastName" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label text-success">Email address</label>
        <input type="email" class="form-control border-success" id="email" name="email" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label text-success">Password</label>
        <input type="password" class="form-control border-success" id="password" name="password" required>
    </div>

    <!-- Birthdate Field -->
    <div class="mb-3">
        <label for="birthDate" class="form-label text-success">Birthdate</label>
        <input type="date" class="form-control border-success" id="birthDate" name="birthDate" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label text-success">Address</label>
        <input type="text" class="form-control border-success" id="address" name="address" required>
    </div>

    <button type="submit" class="btn btn-success w-100">Register</button>
</form>

<div class="mt-4 text-center">
    <p>Already have an account? <a href="registration.php?page=login" class="text-success">Login</a></p>
</div>