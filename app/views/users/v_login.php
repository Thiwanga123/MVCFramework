

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/pages/style.css">
    <title>Sign In</title>
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="top">
                <div class="logo">
                    <a href="<?php echo URLROOT;?>/pages/home" class = "logo">
                    <img src="<?php echo URLROOT;?>/Images/Logo1.png">
                    <p>JOURNEY <br><span>BEYOND</span></p>
                </div>
                    </a>
                <p class="create-account-link"> New to Journey Beyond? <a href="<?php echo URLROOT;?>/users/register">Create an account</a></p>   
            </div>

            <div class="login-box">
                <h1>Login</h1>
                <form action="<?php echo URLROOT; ?>/users/login" method="POST">
                    <label for="email">Email / Username</label>
                    <input type="email" id="email" name="email" required value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                    <span class="form-invalid"><?php echo isset($data['email_err']) ? $data['email_err'] : ''; ?></span>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
                    <span class="form-invalid"><?php echo isset($data['password_err']) ? $data['password_err'] : ''; ?></span>

                    <div class="forgot-password">
                        <a href="<?php echo URLROOT; ?>/users/forgotPassword">Forgot password?</a>
                    </div>

                    <button type="submit" class="login-btn">Login</button>
                </form>

                <div class="link">
                    <a href="<?php echo URLROOT; ?>/ServiceProvider/login" class="sp-login-btn">Login as a service provider</a>
                </div>
            </div>

    </div>

        <div class="right">
            <p>Plan your perfect trip! Log in for personalized recommendations, exclusive deals, and seamless planning tools.</p>
        </div>

        <script src="<?php echo URLROOT;?>/js/Sign In.js" defer></script>

</body>
</html>