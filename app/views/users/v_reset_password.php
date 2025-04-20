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
                <div class="left">
                    <img src="<?php echo URLROOT;?>/Images/Forgot password-rafiki.png" alt="" id="leftimage">
                </div>
                
                <div class="right">
                <!-- Email input form -->
                    <div class="box" id="reset-page">
                        <h2>Reset Your Password</h2>
                        <p>Please enter your new password.</p>
                        <form action="<?php echo URLROOT;?>/users/resetPassword" method="POST">
                            <div class="form-group">
                                <label for="password">New password</label>
                                <input type="password" id="password" name="password" required placeholder="Enter your new password">
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm your new password</label>
                                <input type="password" id="confirmPassword" name="confirmPassword" required placeholder="Enter your new password again">
                            </div>
                            <span class="form-invalid" id="passwordError"><?php echo isset($data['password_err']) ? $data['password_err'] : ''; ?></span>
                            <span class="valid" id="valid"> <?php echo isset($data['success_msg']) ? $data['success_msg'] : ''; ?></span>

                            <div class="button">
                                <button type="submit" class="passwordResetbtn" id="passwordResetbtn">Submit</button>
                            </div>
                        </form>
                        <p class="login-link"><a href="<?php echo URLROOT;?>/users/forgotPassword">Back to forgot password</a></p>   

                    </div>

                </div>

            </div>

    </div>

    

<!-- <script src="<?php echo URLROOT;?>/js/forgotPassword.js" defer> </script> -->
<script>const URLROOT = "<?php echo URLROOT; ?>";</script>
<script src="<?php echo URLROOT;?>/js/forgotPassword.js"></script>


</body>
</html>