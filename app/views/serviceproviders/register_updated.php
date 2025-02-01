
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/pages/components/sp_register.css">
    <title>Sign Up</title>
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
                    <p class="login-link">Already have an account? <a href="<?php echo URLROOT;?>/Serviceprovider/login">Login</a></p>   
            </div>

            <h1>Create your account</h1>

            <div class="box">
                <form action="<?php echo URLROOT;?>/ServiceProvider/register" method="POST" id="registration-form">

                <div class="step" id="step-1">
                    <h2>Basic Details</h2>                    
                    <div class="content">
                        <div class="side">
                            <label for="name">Business Name</label>
                            <input type="text" id="name" name="name" placeholder="Business Name" required   value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['name_err']) ? $data['name_err'] : ''; ?></span>
                            
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email" required value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['email_err']) ? $data['email_err'] : ''; ?></span>

                        </div>

                        <div class="side">

                            <label for="NIC">NIC Number</label>
                            <input type="text" id="nic" name="nic" placeholder="NIC Number" required  value="<?php echo isset($data['nic']) ? $data['nic'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['nic_err']) ? $data['nic_err'] : ''; ?></span>
                            
                            <label for="phone">Contact Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="Contact Number" required value="<?php echo isset($data['phone']) ? $data['phone'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['phone_err']) ? $data['phone_err'] : ''; ?></span>
                           
                        </div>

                    </div>

                    <div class="bottom">
                    <label for="sptype" id="type">Service Type</label>
                                <select id="sptype" name="sptype" required style="width: 100%; max-width: 300px; height: 40px;">
                                    <option value="" disabled selected>Select a type</option>
                                    <option value="accomadation">Accomodation</option>
                                    <option value="equipment_suppliers">Equipment Supplier</option>
                                    <option value="tour_guides">Tour Guide</option>
                                    <option value="transport_suppliers">Transport Supplier</option>
                                </select>
                    </div>

                    <div class="nxt-btn">
                        <button type="button" onclick="nextStep(2)">Next</button>
                    </div>
                </div>

                <div class="step" id="step-2"  style="display:none;">
                    <h2>Address & Location Details</h2>
                    <div class="content">
                        <div class="side">
                            <label>Address</label>
                            <input type="text" id="address" name="address" placeholder="Address" required value="<?php echo isset($data['address']) ? $data['address'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['address_err']) ? $data['address_err'] : ''; ?></span>
                        </div>
                        <div class="side">
                            <label>Present Address</label>
                            <input type="text" id="present_address" name="address" placeholder="Present Address" required value="<?php echo isset($data['present_address']) ? $data['present_address'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['presentaddress_err']) ? $data['presentaddress_err'] : ''; ?></span>
                        </div>
                    </div>

                    <label>Pin Your Location</label>
                    <div id="map" style="width: 100%; height: 300px;">
                                
                    </div>
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                            
                    <div class="buttons">
                        <button type="button" onclick="prevStep(1)">Previous</button>
                        <button type="button" onclick="nextStep(3)">Next</button>
                    </div>
                </div>

                <div class="step" id="step-3" style="display:none;">
                    <h2>Verification Details</h2>
                    <div class="content">
                        <div class="side">
                            <label>Government Registration Number</label>
                            <input type="text" id="reg_num" name="reg_num" placeholder="Government Registration Number" required  value="<?php echo isset($data['reg_num']) ? $data['reg_num'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['reg_num_err']) ? $data['reg_num_err'] : ''; ?></span>
                        </div>

                        <div class="side">
                        <label for="pdfFile">Documents & Certificates</label>
                        <input type="file" id="pdfFile" name="pdfFile" accept="application/pdf" required value="<?php echo isset($data['doc']) ? $data['doc'] : ''; ?>"></div>
                    </div>

                    <h2>Account Settings</h2>
                    <div class="content">
                        <div class="side">
                            <label>Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" required  value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['password_err']) ? $data['password_err'] : ''; ?></span>
                        </div>

                        <div class="side">
                            <label>Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required  value="<?php echo isset($data['confirm_password']) ? $data['confirm_password'] : ''; ?>">
                            <span class="form-invalid"><?php echo isset($data['confirmpassword_err']) ? $data['confirmpassword_err'] : ''; ?></span>
                        </div>
                    </div>


                    <div class="buttons">
                        <button type="button" onclick="prevStep(2)">Previous</button>
                        <button type="submit">Submit</button> 
                    </div>
                </div>
                    </form>

            </div>

    </div>

        <script src="<?php echo URLROOT;?>/js/Sign In.js" defer></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&libraries=places"></script>
        <script src="<?php echo URLROOT;?>/js/Loginvalidation.js"> </script>
        <script src="<?php echo URLROOT;?>/js/registration.js"> </script>
        

</body>
</html>