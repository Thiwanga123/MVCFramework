document.addEventListener('DOMContentLoaded', function() {
    // Get all the input fields and error messages
    const emailField = document.getElementById('email');
    const passwordField = document.getElementById('password');
    const sptypeField = document.getElementById('sptype');
    
    const emailErr = document.getElementById('email_err');
    const passwordErr = document.getElementById('password_err');
    const sptypeErr = document.getElementById('sptype_err');

    // Clear error message when user focuses on the email input field
    emailField.addEventListener('focus', function() {
        emailErr.textContent = ''; // Clear the error message content
    });

    // Clear error message when user focuses on the password input field
    passwordField.addEventListener('focus', function() {
        passwordErr.textContent = ''; // Clear the error message content
    });

    // Clear error message when user focuses on the service type select field
    sptypeField.addEventListener('focus', function() {
        sptypeErr.textContent = ''; // Clear the error message content
    });
});