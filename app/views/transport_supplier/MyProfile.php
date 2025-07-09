<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Commoon/Profile.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Commoon/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>My Profile</title>
</head>

<body>
    <div class="box">
    
     <!-- SideBar -->
     <?php require APPROOT . '/views/inc/components/vehiclesupplier_sidebar.php'; ?>
        <!-- End Of Sidebar -->
            <main>
                <div class="initial-container">
                    <div class="header">
                        <div class="left">
                            <h1>My Profile</h1>
                        </div>
                    </div>
            
                    <div class="profile-content">
                        <div class="profile-top">
                            <div class="imageDiv">
                                <div class="div1">
                                    <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <button class="change-btn" id="imageChangeBtn">Change Image</button>
                                </div>
                                <div class="div2">
                                    <h4><?php echo htmlspecialchars($data['details']->name); ?></h4>
                                    <h5><?php echo htmlspecialchars($data['details']->email); ?></h5>

                                </div>
                            </div>

                            <div class="editBtn">
                            <button class="editProfile" id="editProfileBtn">Edit</button>
                            </div>
                        </div>


                        <form action="" method="POST">
                            
                            <h2>Personal Information :</h2>
                            <div class="profile-center">
                                <div class="left">
                                    <h4>Name</h4>
                                    <input type="name" id="name" name="name" value="<?php echo $data['details']->name; ?>">
                                    <h4>Email</h4>
                                    <input type="email" id="email" name="email" value="<?php echo $data['details']->email; ?>">
                                    <h4>Business Name</h4>
                                    <input type="businessName" id="businessName" name="businessName" value="<?php echo $data['details']->business_name; ?>">
                                    <h4>City</h4>
                                    <input type="city" id="city" name="city" value="<?php echo $data['details']->city; ?>">
                                </div>

                                <div class="right">
                                    <h4>Permanent Address</h4>
                                    <input type="address" id="address" name="address" value="<?php echo $data['details']->permanent_address; ?>">
                                    <h4>Present Address</h4>
                                    <input type="presentAddress" id="presentAddress" name="presentAddress" value="<?php echo $data['details']->present_address; ?>">
                                    <h4>Postal Code</h4>
                                    <input type="postalCode" id="postalCode" name="postalCode" value="<?php echo $data['details']->postal_code; ?>">
                                </div>
                            </div>

                            <h2>Password Settings :</h2>

                            <div class="profile-bottom">
                                <div class="group">
                                    <h4>Password</h4>
                                    <input type="password" id="password" name="password" value="<?php echo $data['details']->password; ?>" readonly>
                                </div>

                                <div class="group">
                                    <h4>Confirm Password</h4>
                                    <input type="password" id="password" name="password" value="<?php echo $data['details']->password; ?>" readonly>
                                </div>
                            </div>

                            <div class="profile-actions">
                                <div class="group">
                                    <button type="submit" class="pswd-btn">Change Password</button>
                                    <button type="submit">Confirm Changes</button>
                                </div>

                                <button type="submit" class="delete">Delete My Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script>
    <script src="<?php echo URLROOT;?>/js/Test.js"></script>

</body>

</html>
