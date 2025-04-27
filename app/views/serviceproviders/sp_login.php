<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/pages/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .status-message {
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            line-height: 1.5;
        }
        .status-message i {
            font-size: 20px;
            flex-shrink: 0;
        }
        .status-warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }
        .status-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .status-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .admin-contact {
            margin-top: 5px;
            font-size: 12px;
            color: #666;
        }
    </style>
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
                <?php if(isset($data['status_message'])): ?>
                    <div class="status-message <?php echo $data['status_class']; ?>">
                        <i class="<?php echo $data['status_icon']; ?>"></i>
                        <div>
                            <?php echo $data['status_message']; ?>
                            <?php if(isset($data['admin_contact'])): ?>
                                <div class="admin-contact">
                                    <?php echo $data['admin_contact']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <form action="<?php echo URLROOT; ?>/serviceProvider/login" method="POST">
                    <label for="email">Email / Username</label>
                    <input type="email" id="email" name="email" required >
                    <span class="form-invalid"><?php echo isset($data['email_err']) ? $data['email_err'] : ''; ?></span>

                    <label for="password">Password</label>
                    <div class="password-container">
                            <input type="password" id="password" name="password" required value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['password_err']) ? $data['password_err'] : ''; ?></span>
                            <button type="button" id="togglePassword" class="eye-icon">
                                <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                                    <path d="M17.94 17.94A10.06 10.06 0 0 1 12 20c-7 0-11-8-11-8a18.36 18.36 0 0 1 3.69-5.63M9.88 9.88A3 3 0 0 0 12 15a3 3 0 0 0 2.12-.88"></path>
                                    <line x1="1" y1="1" x2="23" y2="23"></line>
                                </svg>
                            </button>
                        </div>
                    <label for="sptype">Service Type</label>
                            <select id="sptype" name="sptype" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option value="" disabled selected>Select a type</option>
                                <option value="accomadation">Accomodation</option>
                                <option value="equipment_suppliers">Equipment Supplier</option>
                                <option value="tour_guides">Tour Guide</option>
                                <option value="vehicle_suppliers">Transport Supplier</option>
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