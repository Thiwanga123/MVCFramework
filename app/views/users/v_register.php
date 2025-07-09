<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/pages/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .terms-checkbox {
            margin: 20px 0;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }
        .terms-checkbox input[type="checkbox"] {
            margin-top: 3px;
            width: 18px;
            height: 18px;
            accent-color: #2196F3;
        }
        .terms-checkbox label {
            font-size: 14px;
            line-height: 1.5;
            color: #495057;
        }
        .terms-link {
            color: #2196F3;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .terms-link:hover {
            color: #1976D2;
            text-decoration: underline;
        }
        .terms-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1000;
            backdrop-filter: blur(5px);
        }
        .terms-content {
            position: relative;
            background-color: #fff;
            margin: 5% auto;
            padding: 30px;
            width: 90%;
            max-width: 800px;
            max-height: 85vh;
            overflow-y: auto;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
        .terms-content h2 {
            color: #1a237e;
            margin-bottom: 25px;
            font-size: 24px;
            border-bottom: 2px solid #e3f2fd;
            padding-bottom: 10px;
        }
        .terms-content h3 {
            color: #0d47a1;
            margin: 20px 0 15px;
            font-size: 18px;
        }
        .terms-content ul {
            margin: 15px 0;
            padding-left: 20px;
        }
        .terms-content li {
            margin: 10px 0;
            line-height: 1.6;
            color: #37474f;
        }
        .terms-content li strong {
            color: #1565c0;
            display: block;
            margin-bottom: 5px;
        }
        .terms-content ul ul {
            margin: 5px 0 5px 20px;
            list-style-type: circle;
        }
        .terms-content ul ul li {
            margin: 5px 0;
            color: #546e7a;
        }
        .close-terms {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 28px;
            cursor: pointer;
            color: #78909c;
            transition: color 0.3s ease;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #f5f5f5;
        }
        .close-terms:hover {
            color: #455a64;
            background-color: #e0e0e0;
        }
        /* Custom scrollbar for terms content */
        .terms-content::-webkit-scrollbar {
            width: 8px;
        }
        .terms-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        .terms-content::-webkit-scrollbar-thumb {
            background: #90caf9;
            border-radius: 4px;
        }
        .terms-content::-webkit-scrollbar-thumb:hover {
            background: #64b5f6;
        }
    </style>
    <title>Sign Up</title>
</head>
<body>
    <!-- Terms and Conditions Modal -->
    <div id="termsModal" class="terms-modal">
        <div class="terms-content">
            <span class="close-terms">&times;</span>
            <h2>Terms and Conditions for Users</h2>
            
            <h3>1. User Responsibilities</h3>
            <ul>
                <li>Provide accurate personal information</li>
                <li>Maintain the security of your account</li>
                <li>Use the platform for legitimate purposes only</li>
                <li>Respect service providers and other users</li>
                <li>Comply with all applicable laws and regulations</li>
            </ul>

            <h3>2. Booking and Cancellation Policy</h3>
            <ul>
                <li>Bookings must be cancelled 24 hours before the service date</li>
                <li>Cancellation fees may apply based on service provider policies</li>
                <li>No-shows may result in account restrictions</li>
            </ul>

            <h3>3. Refund Policy</h3>
            <ul>
                <li><strong>100% Refund:</strong>
                    <ul>
                        <li>If service provider cancels the booking</li>
                        <li>If technical issues prevent service delivery</li>
                        <li>If service is not provided as described</li>
                        <li>If cancellation is made 48 hours before service date</li>
                    </ul>
                </li>
                <li><strong>85% Refund:</strong>
                    <ul>
                        <li>If cancellation is made 24-48 hours before service date</li>
                        <li>If service provider is unable to provide full service</li>
                        <li>If there are significant changes to the booked service</li>
                    </ul>
                </li>
                <li><strong>No Refund:</strong>
                    <ul>
                        <li>For cancellations less than 24 hours before service</li>
                        <li>For no-shows</li>
                        <li>If service was provided as described</li>
                        <li>For policy violations</li>
                    </ul>
                </li>
            </ul>

            <h3>4. Privacy and Data Protection</h3>
            <ul>
                <li>Your personal data is protected under our privacy policy</li>
                <li>We never share your information with third parties without consent</li>
                <li>You can request data deletion at any time</li>
                <li>We use secure encryption for all transactions</li>
            </ul>

            <h3>5. User Conduct</h3>
            <ul>
                <li>Maintain respectful communication with service providers</li>
                <li>No false or misleading reviews</li>
                <li>No harassment or abusive behavior</li>
                <li>Report any issues or concerns promptly</li>
            </ul>

            <h3>6. Account Management</h3>
            <ul>
                <li>You can deactivate your account at any time</li>
                <li>We reserve the right to suspend accounts for policy violations</li>
                <li>Appeal process available for suspended accounts</li>
                <li>Account reactivation may require verification</li>
            </ul>
        </div>
    </div>

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

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                    <span class="from-invalid"> <?php echo isset($data['email_err']) ? $data['email_err'] : ''; ?></span>

                    <label for="telephone_number">Telephone Number</label>
                    <input type="text" id="telephone_number" name="telephone_number" value="<?php echo isset($data['telephone_number']) ? $data['telephone_number'] : ''; ?>">
                    <span class="from-invalid"> <?php echo isset($data['telephone_err']) ? $data['telephone_err'] : ''; ?></span>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                    <span class="from-invalid"> <?php echo isset($data['password_err']) ? $data['password_err'] : ''; ?></span>

                    <div class="terms-checkbox">
                        <input type="checkbox" id="termsAgree" name="termsAgree" required>
                        <label for="termsAgree">
                            I agree to the <span class="terms-link" onclick="openTermsModal()">Terms and Conditions</span> and understand the cancellation policies
                        </label>
                    </div>

                    <button type="submit" class="signup-btn">Create Account</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="right">
            <p>Want to provide service via us?</p>
            <button type="submit" button onclick="window.location.href='<?php echo URLROOT;?>/ServiceProvider/register'" class="service-btn" >Join With Us</button>
        </div>
    </div>

    <script>
        function openTermsModal() {
            document.getElementById('termsModal').style.display = 'block';
        }

        document.querySelector('.close-terms').onclick = function() {
            document.getElementById('termsModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('termsModal')) {
                document.getElementById('termsModal').style.display = 'none';
            }
        }
    </script>
    <script src="<?php echo URLROOT;?>/js/Sign In.js" defer></script>
</body>
</html>
