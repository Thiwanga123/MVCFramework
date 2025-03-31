document.addEventListener('DOMContentLoaded', function() {
    
    const emailCheck = document.getElementById("send-otp-btn");
    const otpCheck = document.getElementById("verify-otp");
    const passwordReset = document.getElementById("password-update");

    //First Step
    emailCheck.addEventListener('click', function(e){
        e.preventDefault();
        const email = document.getElementById("email");
        const emailError = document.getElementById("email-error");

        //const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

        if ((!email.value)) {
            emailError.textContent = "Please enter a valid email address.";
            console.log("Invalid email. Aborting")
            return;
        }
        console.log("Frontend validation success. Sending to server");
        sendData({email: email.value, step: 'email'});
    })

    otpCheck.addEventListener('click', function(){
        const otp = Array.from(document.querySelectorAll('.otp-box')).map(input => input.value).join('');
        const otpError = document.getElementById("otp-error");

        if (otp.length !== 6) {
            otpError.textContent = "Please enter a valid OTP.";
            return;
        }

        sendData({otp: otp, step: 'otp'});
    })

    passwordReset.addEventListener('click', function(){
        const newPassword = document.getElementById('new-password');
        const confirmNewPassword = document.getElementById('confirm-password');
        const newPasswordError = document.getElementById('password-error');
        const confirmPasswordError = document.getElementById('confirm-password-error');

        if (newPassword.length < 8) {
            newPasswordError.textContent = "Password must be at least 8 characters long.";
            return;
        }

        if (newPassword !== confirmNewPassword) {
            confirmPasswordError.textContent = "Passwords do not match.";
            return;
        }

        sendData({ new_password: newPassword, step: 'password' });
    })

    function sendData(data){
        console.log("Sending data:", data);
        fetch(URLROOT + "/users/forgotPassword", {
            method: 'POST',
            headers: {
                "Content-Type" : "application/json"
            },
            body: JSON.stringify(data)
        })
        .then(response=>{response.json()})
        .then(data => {
            if(data.success){
                if (data.step === 'email') {
                    document.getElementById("email-page").style.display = "none";
                    document.getElementById("otp-page").style.display = "block";
                } else if (data.step === 'otp') {
                    document.getElementById("otp-page").style.display = "none";
                    document.getElementById("password-page").style.display = "block";
                } else if (data.step === 'password') {
                    alert("Password updated successfully.");
                }
            }else{
                if (data.error) {
                    showErrorMessage(data.error);
                }
            }
        })
        .catch(error => {
            console.error("Error:", error);
            showErrorMessage("An error occurred. Please try again.");
        });
    }


    function showErrorMessage(message) {
        alert(message);
    }
});