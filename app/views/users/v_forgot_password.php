<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/password_reset.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/successModal.css">

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
                <div class="left">
                    <img src="<?php echo URLROOT;?>/Images/Forgot password-rafiki.png" alt="" id="leftimage">
                </div>
                
                <div class="right">
                <!-- Email input form -->
                    <div class="box" id="email-page">
                        <h2>Reset Your Password</h2>
                        <p>Enter your email address to receive a password reset link.</p>
                        <form action="<?php echo URLROOT;?>/users/forgotPassword" method="POST">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required placeholder="Enter your email address" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                                <span class="form-invalid" id="emailError"><?php echo isset($data['email_err']) ? $data['email_err'] : ''; ?></span>
                            </div>

                            <span class="valid" id="valid"> <?php echo isset($data['success_msg']) ? $data['success_msg'] : ''; ?></span>

                            <div class="button">
                                <button type="submit" class="send-otp-btn" id="send-otp-btn">Send Link</button>
                            </div>
                        </form>

                        <p class="login-link">Enter new password page<a href="<?php echo URLROOT;?>/users/resetPassword">Enter new password</a></p>   

                    </div>

                </div>

            </div>

    </div>

    

<!-- <script src="<?php echo URLROOT;?>/js/forgotPassword.js" defer> </script> -->
<script>const URLROOT = "<?php echo URLROOT; ?>";</script>
<script src="<?php echo URLROOT;?>/js/forgotPassword.js"></script>


</body>
</html>