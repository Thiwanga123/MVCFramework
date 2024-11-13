<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/pages/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container" id="container">
        <div class="left">
            <div class="top">
                <div class="logo">
                    <a href="<?php echo URLROOT;?>/pages/home" class = "logo">
                    <img src="<?php echo URLROOT;?>/Images/Logo1.png">
                    <p>JOURNEY <br><span>BEYOND</span></p>
                </div>
                </a>
                   <p class="login-account-link"> Already have an account? <a href="<?php echo URLROOT;?>/users/login">Login</a></p>   
            </div>

            <div class="bottom">

            <div class="login-box">
                <h1>Create Your Account</h1>
                <form action="<?php echo URLROOT; ?>/users/register" method="POST">

                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
                <span class="from-invalid"><?php echo isset($data['name_err']) ? $data['name_err'] : ''; ?></span> 

                <label for="telephone_number">Telephone Number</label>
                <input type="text" id="telephone_number" name="telephone_number" value="<?php echo isset($data['telephone_number']) ? $data['telephone_number'] : ''; ?>">
                <span class="from-invalid"> <?php echo isset($data['telephone_err']) ? $data['telephone_err'] : ''; ?></span>


                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                <span class="from-invalid"> <?php echo isset($data['email_err']) ? $data['email_err'] : ''; ?></span>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
                <span class="from-invalid"> <?php echo isset($data['password_err']) ? $data['password_err'] : ''; ?></span>

                <button type="submit" class="signup-btn">Create Account</button>
    </form>
            </div>
        </div>
    </div>

        <div class="right">
            <p>Want to provide service via us?</p>
            <button type="submit" class="service-btn">Join With Us</button>
        </div>

        <script src="../JS Scripts/signIn.js" defer></script>
    
</body>
</html>
