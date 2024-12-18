document.getElementById('loginButton').addEventListener('click', function() {
    // Get the username and password values
    const username = document.getElementById('username').value;
    const password = document.getElementById('pwd').value;

    // Here you can add validation or authentication logic if needed
    if (username && password) {
        // Redirect to a new page (e.g., dashboard.html)
        window.location.href = 'dashboard.html'; // Change this to your desired page
    } else {
        alert('Please enter both username and password.');
    }
});