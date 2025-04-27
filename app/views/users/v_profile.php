<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Profile.css">
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
                                    <img id= "profilePreview" src="<?php echo isset($details->profile_path) && !empty($details->profile_path) ? URLROOT . '/' . $details->profile_path : URLROOT . '/Images/Profile pic.jpg'; ?>">
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
                        <h2>Basic Information</h2>

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

                            <button type="button" class="changePasswordBtn" id="showPasswordChangeFormBtn">Change Password</button>
                            <div class="changePasswordSection" id="passwordChangeForm" style="display: none;">
                                <h2>Change Password</h2>
                                <form action="<?php echo URLROOT; ?>/users/changePassword" method="POST">
                                    <div class="passwordFields" >
                                        <div class="fieldGroup">
                                            <label for="currentPassword">Current Password</label>
                                            <input type="password" id="currentPassword" name="currentPassword" required>
                                        </div>

                                        <div class="new" style="display: none;">
                                            <div class="fieldGroup">
                                                <label for="newPassword">New Password</label>
                                                <input type="password" id="newPassword" name="newPassword" required>
                                            </div>

                                            <div class="fieldGroup">
                                                <label for="confirmPassword">Confirm New Password</label>
                                                <input type="password" id="confirmPassword" name="confirmPassword" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="passwordActions">
                                        <button type="submit" class="updatePasswordBtn">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
  
    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
    <script src="<?php echo URLROOT;?>/js/profilePicUpload.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("showPasswordChangeFormBtn");
        const passwordForm = document.getElementById("passwordChangeForm");
        const currentPasswordInput = document.getElementById("currentPassword");
        const newPasswordSection = document.querySelector(".new");

        // Show/hide entire password change form
        toggleBtn.addEventListener("click", function () {
            passwordForm.style.display = passwordForm.style.display === "none" ? "block" : "none";
        });

        // Reveal new password fields only after current password is typed
        currentPasswordInput.addEventListener("input", function () {
            if (currentPasswordInput.value.trim().length > 0) {
                newPasswordSection.style.display = "block";
            } else {
                newPasswordSection.style.display = "none";
            }
        });
    });
</script>

</body>

</html>
