<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="formstyle.css" />
</head>

<body>
  <a href="dashboard.php" class="anchor">Back</a>
  <section class="container">
    <header>Resume Form</header>
    <form action="insert.php" id="myForm" autocomplete="off" class="form" method="post" enctype="multipart/form-data">
      <div class="input-box">
        <label>Full Name<span style="color: red;">*</span></label>
        <input type="text" id="name" name="name" placeholder="Enter full name (First Name, Middle Name, Last Name)"
          required oninput="validateName(this)" />
      </div>

      <script>
        function validateName(input) {
          input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
        }
      </script>

      <div class="input-box">
        <label>Email Address<span style="color: red;">*</span></label>
        <input type="email" id="email" name="email" placeholder="Enter Email address" required minlength="7"
          oninput="validateEmailLength(this)" />
        <small id="emailError" style="color: red; display: none;">Email must be at least 7 characters.</small>
      </div>

      <script>
        function validateEmailLength(input) {
          const error = document.getElementById('emailError');
          if (input.value.length < 7) {
            error.style.display = 'block';
          } else {
            error.style.display = 'none';
          }
        }
      </script>

      <div class="column">
        <div class="input-box">
          <label>Phone Number<span style="color: red;">*</span></label>
          <input type="text" id="contact" name="contact" placeholder="Enter phone number" required />
        </div>
        <div class="input-box">
          <label>Birth Date<span style="color: red;">*</span></label>
          <input type="date" id="birthdate" name="birthdate" required />
        </div>
        <div class="input-box sexgroup">
          <label class="sexlabel">Sex<span style="color: red;">*</span></label>
          <div class="sex-options">
            <label>
              <input type="radio" name="sex" value="Male" required>
              Male
            </label>
            <label>
              <input type="radio" name="sex" value="Female" required>
              Female
            </label>
          </div>
        </div>
      </div>
      <div class="input-box address">
        <label>Address<span style="color: red;">*</span></label>
        <input type="text" id="address" name="address" placeholder="Enter street address" required />
      </div>
      <div class="input-box objectives">
        <label>Objectives<span style="color: red;">*</span></label>
        <textarea class="textarea" id="objectives" name="objectives" placeholder="Your objectives" required></textarea>
      </div>
      <div class="input-box Skills">
        <label>Skills</label>
        <textarea class="textarea" id="skills" name="skills" placeholder="Your skills"></textarea>
      </div>
      <div class="input-box Field">
        <label>Speciality</label>
        <textarea class="textarea" id="field" name="speciality"
          placeholder="What field do you excel the MOST?"></textarea>
      </div>
      <div class="input-box educAttain">
        <label for="educational">Educational Attainment<span style="color: red;">*</span></label>
        <select class="textarea" id="educational" name="educAttainment" required>
          <option value="" disabled selected>Select your Education level</option>
          <option value="Elementary">Elementary</option>
          <option value="Junior Highschool">Junior Highschool</option>
          <option value="Senior Highschool">Senior Highschool</option>
          <option value="Undergraduate">Undergraduate</option>
          <option value="College">College</option>
        </select>
      </div>
      <div class="input-box educAttain">
        <label for="educational">Program/Course<span style="color: red;">*</span></label>
        <select class="textarea" id="educational" name="programCourse" required>
          <option value="" disabled selected>Select your Degree level</option>
          <option value="N/A">N/A</option>
          <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
          <option value="Bachelor of Arts in Psychology">Bachelor of Arts in Psychology</option>
          <option value="Bachelor of Science in Engineering">Bachelor of Science in Engineering</option>
          <option value="Master of Business Administration">Master of Business Administration</option>
        </select>
      </div>
      <div class="terms">
        <h3>Terms and Conditions</h3>
        <label>
          <input type="checkbox" class="checkbox" id="termsCheckbox" required>
          I agree to the <a href="#" onclick="showPopup()">terms and conditions</a>.
        </label>
        <label class="employ">
          <input type="radio" name="status" value="Employed" required>
          Employed
        </label>
        <label class="employ">
          <input type="radio" name="status" value="Unemployed" required>
          Unemployed
        </label>
        <div class="picture">
          <label class="form-label">Attach a picture for your Resume<span style="color: red;">*</span></label>
          <label class="form-labelnote">Note: Please attach a 2x2 picture with white background wearing a formal
            attire.</label>
          <input type="file" class="form-control" id="file" name="File" required>
          <span id="fileName"></span>
        </div>
        <div class="popup-overlay" id="popupOverlay">
          <div class="popup-box">
            <h3>Terms and Conditions</h3>
            <p>
              Last Updated: [Date]
              <br>
              Welcome to [Your System Name]! By using our services, you agree to comply with these Terms and Conditions.
              Please read them carefully.
              <br><br>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit...
            </p>
            <div class="popup-buttons">
              <button onclick="acceptTerms()">Accept</button>
              <button onclick="closePopup()">Cancel</button>
            </div>
          </div>
        </div>
        <div class="divbutton">
          <button type="submit" class="btn" name="send">Submit</button>
        </div>
      </div>
    </form>

  </section>
  <script src="jsform.js"></script>
</body>

</html>