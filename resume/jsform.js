document.getElementById("myForm").addEventListener("submit", function (event) {
  const username = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const contact = document.getElementById("contact").value;

  // Regular Expressions for validation
  const namePattern = /^[a-zA-Z\s]+$/; // Only letters and spaces
  const emailPattern = /^[a-zA-Z0-9._%+-]{7,30}/; // Gmail with username 6-30 chars
  const phonePattern = /^\d{11}$/; // Exactly 11 digits

  // Validate Username (only letters and spaces)
  if (!namePattern.test(username)) {
    alert("Full Name must contain only letters and spaces.");
    event.preventDefault();
    return;
  }
  
  // Validate Email Address (specific to Gmail username length)
  if (!emailPattern.test(email)) {
    alert("Email must be a valid Email ");
    event.preventDefault();
    return;
  }

  // Validate Contact Number
  if (!phonePattern.test(contact)) {
    alert("Phone Number must be exactly 11 digits.");
    event.preventDefault();
    return;
  }
});

    
    // Get today's date
    const today = new Date();
    
    // Calculate the maximum allowable date (18 years ago from today)
    const maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());

    // Format maxDate to YYYY-MM-DD
    const formattedMaxDate = maxDate.toISOString().split('T')[0];

    // Set max attribute for the date input
    const birthdateInput = document.getElementById('birthdate');
    birthdateInput.setAttribute('max', formattedMaxDate);

    // Optional: Validate on form submit
    document.getElementById('birthdate').addEventListener('submit', (e) => {
      const selectedDate = new Date(birthdateInput.value);
      if (selectedDate > maxDate) {
        e.preventDefault();
        alert("You must be 18 years or older.");
      }
    });

    // Show popup
    function showPopup() {
      document.getElementById('popupOverlay').style.display = 'block';
  }

  // Close popup
  function closePopup() {
      document.getElementById('popupOverlay').style.display = 'none';
  }

  // Accept terms and check the checkbox
  function acceptTerms() {
      document.getElementById('termsCheckbox').checked = true;
      closePopup();
  }

      // Display the file name after the file is selected
      document.getElementById('file').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : '';
        document.getElementById('fileName').textContent = fileName ? `Selected file: ${fileName}` : '';
    });
