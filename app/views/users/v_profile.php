<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Profile_pre.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>Profile</title>
</head>
<body>
    <div class="box">
    <?php $currentPage = $data['currentPage']; ?>

        <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
        <!-- End Of Sidebar -->
    
            <main>
                <div class="profile-container">
                    <div class="header">
                        <h1>My Profile</h1>
                    </div>

                    <div class="profileContentMain">
                        <div class="profile-top">
                            <div class="imageDiv">
                                <div class="div1">
                                    <img id= "profilePreview" src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <form action="<?php echo URLROOT; ?>/users/updateProfileImage" method="POST" enctype="multipart/form-data" id="imageUploadForm">
                                        <input type="file" name="profileImage" id="profileImage" accept="image/*" style="display: none;">
                                        <button type="button" class="change-btn" id="imageChangeBtn">Change Image</button>

                                        <div id="imageActionButtons">
                                            <button type="submit" class="save-btn">Save Image</button>
                                            <button type="button" class="cancel-btn" id="cancelImageBtn">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="div2">
                                    <h4><?php echo htmlspecialchars($data['details']->name); ?></h4>
                                    <h5><?php echo htmlspecialchars($data['details']->email); ?></h5>

                                </div>
                            </div>

                            <div class="editBtn">
                            <button class="editProfile" id="editProfileBtn">Edit Profile</button>
                            </div>
                        </div>

                        <div class="profileContent">
                            <form action="" method="POST">
                                <div class="profile-center">
                                    <div class="left">
                                        <h4>Name</h4>
                                        <input type="name" id="name" name="name" value="<?php echo $data['details']->name; ?>">
                                        <h4>Email</h4>
                                        <input type="email" id="email" name="email" value="<?php echo $data['details']->email; ?>">
                                    </div>

                                    <div class="right">
                                        <h4>Username</h4>
                                        <input type="businessName" id="businessName" name="businessName" value="<?php echo $data['details']->username; ?>">
                                        <h4>Contact Number</h4>
                                        <input type="presentAddress" id="presentAddress" name="presentAddress" value="<?php echo $data['details']->telephone_number; ?>">
                                    </div>
                                </div>

                                <div class="profile-actions">
                                    <div class="group">
                                        <button type="submit">Confirm Changes</button>
                                    </div>

                                    <button type="submit" class="delete">Delete My Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
  
    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
    <script src="<?php echo URLROOT;?>/js/profilePicUpload.js"></script>

</body>

</html>
