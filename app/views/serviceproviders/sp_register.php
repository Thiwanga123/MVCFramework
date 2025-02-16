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
