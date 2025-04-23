<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Profile_pre.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>My Profile</title>
</head>

<body>
    <div class="box">
    
    <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/equipmentSupplierSidebar.php'; ?>
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
                                    <form action="<?php echo URLROOT; ?>/ServiceProvider/updateProfileImage" method="POST" enctype="multipart/form-data" id="imageUploadForm">
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
                    
                            <form action="<?php echo URLROOT; ?>/equipment_suppliers/updateProfile" method="POST">
                            <h2>Basic Details</h2>
                            <hr>
                                <div class="profile-center">
                                    <div class="left">
                                        <h4>Name</h4>
                                        <input type="name" id="name" name="name" value="<?php echo $data['details']->name; ?>">
                                        <h4>Email</h4>
                                        <input type="email" id="email" name="email" value="<?php echo $data['details']->email; ?>">
                                        <h4>Address</h4>
                                        <input type="address" id="address" name="address" value="<?php echo $data['details']->address; ?>">
                                    </div>

                                    <div class="right">
                                        <h4>Username</h4>
                                        <input type="text" id="username" name="username" value="<?php echo isset($data['details']->username) ? htmlspecialchars($data['details']->username) : ''; ?>">
                                        <h4>Contact Number</h4>
                                        <input type="text" id="contactnumber" name="contactnumber" value="<?php echo $data['details']->phone; ?>">
                                        <h4>Governement Registration Number</h4>
                                        <input type="text" id="regno" name="regno" value="<?php echo $data['details']->reg_number; ?>" readonly>
                                    </div>
                                </div>

                                <h2>Location Information</h2>
                                <hr>
                                <?php if (empty($data['latitude']) || empty($data['longitude'])): ?>
                                    <div class="errorMessageContainer location-error" id="errorMessageContainer">
                                        You haven't given a location yet. Please provide one to include your products on the packages.
                                    </div>
                                    <button type="button" id="openMapBtn" class="openMapBtn">Set Location on Map</button>
                                <?php else: ?>
                                    <div class="successMessageContainer location-success" id="successMessageContainer">
                                        Location has been added successfully.
                                    </div>
                                    <button type="button" id="openMapBtn">Update Location</button>
                                <?php endif; ?>


                                <!-- Hidden inputs to hold selected coordinates -->
                                <input name="latitude" id="latitude" value="<?php echo isset($data['latitude']) ? $data['latitude'] : ''; ?>">
                                <input name="longitude" id="longitude" value="<?php echo isset($data['longitude']) ? $data['longitude'] : ''; ?>">

                                <div class="profile-actions">
                                    <div class="group">
                                        <button type="submit">Confirm Changes</button>
                                    </div>

                                    <button type="submit" class="delete">Delete My Account</button>
                                </div>
                                
                            </form>
                            <h3></h3>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <div id="mapModal">
        <div id="map"></div>
        <div class="modal-footer">
            <button onclick="closeMap()">Close</button>
        </div>
    </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script>
    <script src="<?php echo URLROOT;?>/js/profilePicUpload.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&libraries=places&callback=initMap" async defer></script>
    <script src="<?php echo URLROOT;?>/js/EquipmentSupplierJS/profileLocation.js"></script>


</body>

</html>
