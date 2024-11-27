
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
                <h1>Service Provider Login</h1>
                <form action="<?php echo URLROOT; ?>/serviceProvider/login" method="POST">
                    <label for="email">Email / Username</label>
                    <input type="email" id="email" name="email" required >
                    <span class="form-invalid"><?php echo isset($data['email_err']) ? $data['email_err'] : ''; ?></span>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <span class="form-invalid"><?php echo isset($data['password_err']) ? $data['password_err'] : ''; ?></span>

                    <label for="sptype">Service Type</label>
                            <select id="sptype" name="sptype" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option value="" disabled selected>Select a type</option>
                                <option value="accomodations">Accomodation</option>
                                <option value="equipment_suppliers">Equipment Supplier</option>
                                <option value="tour_guides">Tour Guide</option>
                                <option value="transport_suppliers">Transport Supplier</option>
                            </select>
                    <div class="forgot-password">
                        <a href="#">Forgot password?</a>
                    </div>

                    <button type="submit" class="login-btn">Login</button>
                </form>

                <div class="link">
                    <a href="<?php echo URLROOT; ?>/users/login" class="sp-login-btn">Login as a user</a>
                </div>
            </div>

    </div>

        <div class="right">
            <p>Access Your Service Provider Account</p>
        </div>

        <script src="<?php echo URLROOT;?>/js/Sign In.js" defer></script>
        <script src="<?php echo URLROOT;?>/js/Loginvalidation.js"> </script>

</body>
</html>