document.addEventListener("DOMContentLoaded", function () {
    const email = document.getElementById('email');
    const errorSpan = document.getElementById('emailError');

    email.addEventListener('focus', function() {
        errorSpan.offsetHeight; 
        errorSpan.classList.add('hidden');
        setTimeout(() => {
            errorSpan.textContent = '';
            errorSpan.classList.remove('hidden');
        }, 400); 
    });
});