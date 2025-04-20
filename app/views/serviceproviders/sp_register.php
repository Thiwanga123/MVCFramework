<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/serviceprovider.css">
</head>
<body>
    <div class="main-container">
        <div class="inside">
            <div class="container">
                <div class="logo">
                    <img src="<?php echo URLROOT;?>/Images/Logo1.png" alt="Logo">
                </div>
                <h2>Create your account</h2>
                <form action="<?php echo URLROOT;?>/ServiceProvider/registerTesting" method="POST">
                    <div class="left-container">
                        <div class="input-field">
                            <label for="name">Business Name</label>
                            <input type="text" id="name" name="name" placeholder="Business Name" required   value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
                           
                        </div>
                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email" required  value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['email_err']) ? $data['email_err'] : ''; ?></span>
                        </div>
                        <div class="input-field">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="Phone Number" required  value="<?php echo isset($data['phone']) ? $data['phone'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['phone_err']) ? $data['phone_err'] : ''; ?></span>
                        </div>
                        <div class="input-field">
                            <label for="NIC">NIC Number</label>
                            <input type="text" id="nic" name="nic" placeholder="NIC Number" required  value="<?php echo isset($data['nic']) ? $data['nic'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['nic_err']) ? $data['nic_err'] : ''; ?></span>
                        </div>
                        <div class="input-field">
                            <label for="sptype">Service Type</label>
                            <select id="sptype" name="sptype" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option value="transport_suppliers">Transport Supplier</option>
                                <option value="equipment_suppliers">Equipment Supplier</option>
                                <option value="accomadation">Accomadation Supplier</option>
                                <option value="tour_guides">Tour Guide</option>
                            </select>
                        </div>
                    </div>

                    <div class="right-container">
                        <div class="input-field">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" placeholder="Address" required value="<?php echo isset($data['address']) ? $data['address'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['address_err']) ? $data['address_err'] : ''; ?></span>
                        </div>
                        <div class="input-field">
                            <label for="reg_num">Government Registration Number</label>
                            <input type="text" id="reg_num" name="reg_num" placeholder="Government Resgistration Number" required  value="<?php echo isset($data['reg_num']) ? $data['phone'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['reg_num_err']) ? $data['reg_num_err'] : ''; ?></span>
                        </div>
                        <div class="input-field">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" required  value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['password_err']) ? $data['password_err'] : ''; ?></span>
                        </div>
                        <div class="input-field">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required  value="<?php echo isset($data['confirm_password']) ? $data['confirm_password'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['confirmpassword_err']) ? $data['confirmpassword_err'] : ''; ?></span>
                        </div>
                        <div class="error-message" id="error-message" style="color: red; display: none;">
                            Passwords do not match!
                        </div>
                        <div class="input-field">
                            <label for="pdfFile">Your Cerificates</label>
                            <input type="file" id="pdfFile" name="pdfFile" accept="application/pdf" requiredvalue="<?php echo isset($data['doc']) ? $data['doc'] : ''; ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn">Create Account</button>
                </form>
                <p class="login-link">Already have an account? <a href="<?php echo URLROOT;?>/Serviceprovider/login">Login</a></p>
            </div>
        </div>
    </div>


</body>
</html>






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
                    <label for="sptype" id="type">Service Type <span class="req">*</span></label>
                                <select id="sptype" name="sptype" required style="width: 100%; max-width: 300px; height: 40px;">
                                    <option value="" disabled selected>Select a type</option>
                                    <option value="accomadation">Accomodation</option>
                                    <option value="equipment_suppliers">Equipment Supplier</option>
                                    <option value="tour_guides">Tour Guide</option>
                                    <option value="transport_suppliers">Transport Supplier</option>
                                </select>
                                <span class="form-invalid" id="sptype-error"><?php echo isset($data['sp_err']) ? $data['sp_err'] : ''; ?></span>
                    </div>

                    <div class="nxt-btn">
                        <button type="button" onclick="nextStep(1)">Next</button>
                    </div>
                </div>

                <div class="step" id="step-2" style="display:none;">
                <h2>Choose Your Subscription Plan</h2>
                <span class="form-invalid" id="subscription-error"></span>

                    <div class="content">
                        <div class="plans-container">
                            <div class="plan-card" id="free-plan">
                                <h3>Free Plan</h3>
                                <span class="price">$0</span>
                                <p>Basic access to services.</p>
                                <button type="button" class="choose-btn">Choose</button>
                            </div>
                            <div class="plan-card" id="basic-plan">
                                <h3>Basic Plan</h3>
                                <span class="price">$19.99/month</span>
                                <p>Access to essential services and features.</p>
                                <button type="button" class="choose-btn">Choose</button>
                            </div>
                            <div class="plan-card" id="pro-plan">
                                <h3>Pro Plan</h3>
                                <span class="price">$49.99/month</span>
                                <p>All premium features and priority support.</p>
                                <button type="button" class="choose-btn">Choose</button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="selected-plan" name="selected_plan" value="">

                    <div class="buttons">
                        <button type="button" onclick="prevStep(2)">Previous</button>
                        <button type="button" onclick="nextStep(2)">Next</button>
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
                <div class="step" id="step-3" style="display:none;">
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


                    <div class="buttons">
                        <button type="button" onclick="prevStep(3)">Previous</button>
                        <button type="submit" onclick="nextStep(3)">Register</button> 
                    </div>
                </div>
                    </form>