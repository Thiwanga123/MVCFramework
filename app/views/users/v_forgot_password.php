<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/password_reset.css">
    <title>Password Reset</title>
</head>
<body>
<div class="container">
            <div class="top">
                <div class="logo">
                    <a href="<?php echo URLROOT;?>/pages/home" class = "logo">
                    <img src="<?php echo URLROOT;?>/Images/Logo1.png">
                    <p>JOURNEY <br><span>BEYOND</span></p>
                </div>
                    </a>
                    <p class="login-link">Already have an account? <a href="<?php echo URLROOT;?>/users/login">Login</a></p>   
            </div>

            <div class="bottom">
                <!-- Email input form -->
                <div class="box" id="email-page">
                    <h2>Reset Your Password</h2>
                    <p>Enter your email address to receive a password reset link.</p>
                    <form action="<?php echo URLROOT;?>/users/forgotPassword" method="POST">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required placeholder="Enter your email">
                            <span class="form-invalid" id="email-error"></span>
                        </div>

                        <div class="button">
                            <button type="button" class="send-otp-btn" id="send-otp-btn">Send OTP</button>
                        </div>
                    </form>
                </div>

                  <!-- OTP Verification Form -->
                <div class="box" id="otp-page"  style="display: none;">
                    <h2>OTP sent to your email</h2>
                    <p>Enter the OTP to verify your identity and change the password</p>
                    <form action="<?php echo URLROOT;?>/users/forgotPassword" method="POST">
                        <div class="form-group">
                            <label for="otp">Enter OTP</label>
                                <div class="otp-inputs">
                                    <input type="text" name="otp1" maxlength="1" class="otp-box" required>
                                    <input type="text" name="otp2" maxlength="1" class="otp-box" required>
                                    <input type="text" name="otp3" maxlength="1" class="otp-box" required>
                                    <input type="text" name="otp4" maxlength="1" class="otp-box" required>
                                    <input type="text" name="otp5" maxlength="1" class="otp-box" required>
                                    <input type="text" name="otp6" maxlength="1" class="otp-box" required>
                                </div>
                            <span class="form-invalid" id="otp-error"></span>
                        </div>

                        <div class="button">
                            <button type="button" id="verify-otp" class="verify-btn">Verify OTP</button>
                        </div>
                    </form>
                </div>

                <!-- New Password Form -->
                <div class="box" id="password-page" style="display: none;">
                    <h2>Set a New Password</h2>
                    <p>Enter your new password below.</p>

                    <form action="<?php echo URLROOT;?>/users/forgotPassword" method="POST">
                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <input type="password" id="new-password" name="new_password" required placeholder="Enter new password">
                            <span class="form-invalid" id="password-error"></span>
                        </div>

                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" id="confirm-password" name="confirm_password" required placeholder="Confirm new password">
                            <span class="form-invalid" id="confirm-password-error"></span>
                        </div>

                        <div class="button">
                            <button type="submit" class="update-btn" id="password-update">Update Password</button>
                        </div>
                    </form>
                </div>


            </div>

</div>

<script src="<?php echo URLROOT;?>/js/forgotPassword.js" defer> </script>
<script>const URLROOT = "<?php echo URLROOT; ?>";</script>

</body>
</html>