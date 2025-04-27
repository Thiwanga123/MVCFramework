<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/pages/components/sp_register.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/pages/components/paymentModal.css">
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
            <h2>Terms and Conditions for Service Providers</h2>
            
            <h3>1. Service Provider Responsibilities</h3>
            <ul>
                <li>Maintain accurate and up-to-date business information</li>
                <li>Provide reliable and quality services to customers</li>
                <li>Respond to customer inquiries within 24 hours</li>
                <li>Maintain proper documentation and licenses</li>
                <li>Comply with all applicable laws and regulations</li>
            </ul>

            <h3>2. Subscription and Payment Terms</h3>
            <ul>
                <li>Subscription fees are non-refundable after service activation</li>
                <li>Automatic renewal unless cancelled 30 days before expiry</li>
                <li>Payment must be made in full before service activation</li>
                <li>Prices are subject to change with 30 days notice</li>
            </ul>

            <h3>3. Refund Policy</h3>
            <ul>
                <li><strong>100% Refund:</strong>
                    <ul>
                        <li>If service is not activated within 7 days of payment</li>
                        <li>If technical issues prevent service delivery</li>
                        <li>If service provider is unable to provide services due to platform issues</li>
                    </ul>
                </li>
                <li><strong>85% Refund:</strong>
                    <ul>
                        <li>If cancellation is requested within 14 days of payment</li>
                        <li>If service provider is unable to provide services due to unforeseen circumstances</li>
                        <li>If platform undergoes major changes affecting service delivery</li>
                    </ul>
                </li>
                <li><strong>No Refund:</strong>
                    <ul>
                        <li>After 14 days of payment</li>
                        <li>If service has been actively used</li>
                        <li>For policy violations</li>
                    </ul>
                </li>
            </ul>

            <h3>4. Cancellation Policy</h3>
            <ul>
                <li>Service providers can cancel their subscription 30 days before renewal</li>
                <li>No refunds for partial subscription periods</li>
                <li>Account deactivation may occur for policy violations</li>
                <li>Reactivation requires admin approval and may incur fees</li>
            </ul>

            <h3>5. Termination</h3>
            <ul>
                <li>We reserve the right to terminate accounts for policy violations</li>
                <li>No refunds for terminated accounts</li>
                <li>Appeal process available for terminated accounts</li>
                <li>Reapplication possible after 6 months</li>
            </ul>
        </div>
    </div>

    <div class="container">
            <div class="top">
                <div class="logo">
                    <a href="<?php echo URLROOT;?>/pages/home" class = "logo">
                    <img src="<?php echo URLROOT;?>/Images/Logo1.png">
                    <p>JOURNEY <br><span>BEYOND</span></p>
                </div>
                    </a>
                    <p class="login-link">Already have an account? <a href="<?php echo URLROOT;?>/Serviceprovider/login">Login</a></p>   
            </div>

            <h1>Create Your Account</h1>

            <div class="box">
                <form action="<?php echo URLROOT;?>/ServiceProvider/registerUpdated" method="POST" id="registration-form">

                <div class="step" id="step-1">
                    <h2>Basic Details</h2>                    
                    <div class="content">
                        <div class="side">
                            <label for="name">Business Name <span class="req">*</span></label>
                            <input type="text" id="name" name="name" placeholder="Business Name" required   value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
                            <span class="form-invalid" id="name-error"><?php echo isset($data['name_err']) ? $data['name_err'] : ''; ?></span>
                            
                            <label for="email">Email <span class="req">*</span></label>
                            <input type="email" id="email" name="email" placeholder="Email" required value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                            <span class="form-invalid" id="email-error"><?php echo isset($data['email_err']) ? $data['email_err'] : ''; ?></span>

                        </div>

                        <div class="side">

                            <label for="NIC">NIC Number <span class="req">*</span></label>
                            <input type="text" id="nic" name="nic" placeholder="NIC Number" required  value="<?php echo isset($data['nic']) ? $data['nic'] : ''; ?>">
                            <span class="form-invalid" id="nic-error"><?php echo isset($data['nic_err']) ? $data['nic_err'] : ''; ?></span>
                            
                            <label for="phone">Contact Number <span class="req">*</span></label>
                            <input type="tel" id="phone" name="phone" placeholder="Contact Number" required value="<?php echo isset($data['phone']) ? $data['phone'] : ''; ?>">
                            <span class="form-invalid" id="phone-error"><?php echo isset($data['phone_err']) ? $data['phone_err'] : ''; ?></span>
                           
                        </div>

                    </div>

                    <div class="bottom">
                        <div class="div">
                                <label for="sptype" id="type">Service Type <span class="req">*</span></label>
                                <select id="sptype" name="sptype" required style="width: 100%; height: 40px;">
                                    <option value="" disabled selected>Select a type</option>
                                    <option value="accomadation">Accomodation</option>
                                    <option value="equipment_suppliers">Equipment Supplier</option>
                                    <option value="tour_guides">Tour Guide</option>
                                    <option value="vehicle_suppliers">Transport Supplier</option>
                                </select>
                                <span class="form-invalid" id="sptype-error"><?php echo isset($data['sp_err']) ? $data['sp_err'] : ''; ?></span>
                        </div>
                        <div class="div">
                                <label>Address <span class="req">*</span></label>
                                <input type="text" id="address" name="address" placeholder="Address" required value="<?php echo isset($data['address']) ? $data['address'] : ''; ?>">
                                <span class="form-invalid" id="address-error"><?php echo isset($data['address_err']) ? $data['address_err'] : ''; ?></span>
                        </div>
                    </div>

                    <div id="step1-common-error" class="form-invalid" style="color: red; margin-top: 10px;"></div>

                    <div class="nxt-btn">
                        <button type="button" id="step1-next-btn">Next</button>
                    </div>
                </div>

                <!--
                <div class="step" id="step-3"  style="display:none;">
                    <h2>Address & Location Details</h2>
                    <div class="content">
                        <div class="side">
                            <label>Address <span class="req">*</span></label>
                            <input type="text" id="address" name="address" placeholder="Address" required value="<?php echo isset($data['address']) ? $data['address'] : ''; ?>">
                            <span class="form-invalid" id="address-error"><?php echo isset($data['address_err']) ? $data['address_err'] : ''; ?></span>
                        </div>
                        <div class="side">
                            <label>Present Address <span class="req">*</span></label>
                            <input type="text" id="present_address" name="presentaddress" placeholder="Present Address" required value="<?php echo isset($data['present_address']) ? $data['present_address'] : ''; ?>">
                            <span class="form-invalid" id="presentaddress-error"><?php echo isset($data['presentaddress_err']) ? $data['presentaddress_err'] : ''; ?></span>
                        </div>
                    </div>

                    <label>Pin Your Location</label>
                    <div id="map" style="width: 100%; height: 300px;">
                                
                    </div>
                    <span class="form-invalid" id="map-error"></span>
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                            
                    <div class="buttons">
                        <button type="button" onclick="prevStep(3)">Previous</button>
                        <button type="button" onclick="nextStep(3)">Next</button>
                    </div>
                </div>

-->
                <div class="step" id="step-2" style="display:none;">

                    <h2>Verification Details</h2>
                    <div class="content">
                        <div class="side">
                            <label>Government Registration Number <span class="req">*</span></label>
                            <input type="text" id="reg_num" name="reg_num" placeholder="Government Registration Number" required  value="<?php echo isset($data['reg_num']) ? $data['reg_num'] : ''; ?>">
                            <span class="form-invalid" id="reg_num-error"><?php echo isset($data['reg_num_err']) ? $data['reg_num_err'] : ''; ?></span>
                        </div>

                        <div class="side">
                        <label for="pdfFile">Documents & Certificates <span class="req">*</span></label>
                        <input type="file" id="pdfFile" name="pdfFile" accept="application/pdf" required value="<?php echo isset($data['doc']) ? $data['doc'] : ''; ?>"></div>
                        <span class="form-invalid" id="pdfFile-error"><?php echo isset($data['pdfFlie_err']) ? $data['pdfFile_err'] : ''; ?></span>
                    </div>

                    <h2>Account Settings</h2>
                    <div class="content">
                        <div class="side">
                            <label>Password <span class="req">*</span></label>
                            <input type="password" id="password" name="password" placeholder="Password" required  value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
                            <span class="form-invalid" id="password-error"><?php echo isset($data['password_err']) ? $data['password_err'] : ''; ?></span>
                        </div>

                        <div class="side">
                            <label>Confirm Password<span class="req">*</span></label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required  value="<?php echo isset($data['confirm_password']) ? $data['confirm_password'] : ''; ?>">
                            <span class="form-invalid" id="confirm_password-error"><?php echo isset($data['confirmpassword_err']) ? $data['confirmpassword_err'] : ''; ?></span>
                        </div>
                    </div>

                    <div id="step2-common-error" class="form-invalid" style="color: red; margin-top: 10px;"></div>

                    <div class="buttons">
                        <button type="button" onclick="prevStep(2)">Previous</button>
                        <button type="button" id="step2-next-btn">Next</button> 
                    </div>
                </div>

                <div class="step" id="step-3" style="display:none;">
                <h2>Choose Your Subscription Plan</h2>
                <div style="background-color: #e3f2fd; padding: 12px; border-radius: 5px; border-left: 4px solid #2196F3; margin-bottom: 20px; color: #0d47a1; font-size: 14px;">
                    <strong>Notice:</strong> When you first log in to the system, you will need to pay for your subscription to access the JourneyBeyond system.
                </div>
                <span class="form-invalid" id="subscription-error"></span>

                    <div class="content">
                        <div class="plans-container">
                            <div class="plan-card" id="3month-plan">
                                <h3>3 Months</h3>
                                <span class="price">Rs.10,000</span>
                                <p>Full 03 Months access to services.</p>
                                <button type="button" class="choose-btn">Choose</button>
                            </div>
                            <div class="plan-card" id="6month-plan">
                                <h3>6 Months</h3>
                                <span class="price">Rs.20,000</span>
                                <p>Full 06 Months services and features.</p>
                                <button type="button" class="choose-btn">Choose</button>
                            </div>
                            <div class="plan-card" id="12month-plan">
                                <h3>12 Months</h3>
                                <span class="price">Rs.40,000</span>
                                <p>Entire One Year full Service.</p>
                                <button type="button" class="choose-btn">Choose</button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="selected-plan" name="selected_plan" value="">
                    <div id="subscription-error"></div>

                    <div class="terms-checkbox">
                        <input type="checkbox" id="termsAgree" name="termsAgree" required>
                        <label for="termsAgree">
                            I agree to the <span class="terms-link" onclick="openTermsModal()">Terms and Conditions</span> and understand the cancellation policies
                        </label>
                    </div>

                    <div class="buttons">
                        <button type="button" onclick="prevStep(3)">Previous</button>
                        <button type="button" id="step3-next-btn">Register</button>
                    </div>
                </div>

                    </form>

            </div>

            <?php
                include('paymentModal.php');;
            ?>


    </div>

        <!-- <script src="<?php echo URLROOT;?>/js/Sign In.js" defer></script> -->
        <!--<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&libraries=places"></script> !-->
        <script src="<?php echo URLROOT;?>/js/registrationNew.js" defer> </script>
        <script src="<?php echo URLROOT;?>/js/plansSelect.js" defer> </script>
        <script>const URLROOT = "<?php echo URLROOT; ?>";</script>
        
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
</body>
</html>