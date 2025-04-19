<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Common/Profile_pre.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Modals/logoutModal.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <style>
        .select2-container--default .select2-selection--multiple {
            border: 1px solid rgb(232, 62, 62); 
            padding: 5px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: rgb(232, 62, 62);
            border: none;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <?php include('Sidebar.php'); ?>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <svg class="menu" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                <path d="M160-269.23v-40h640v40H160ZM160-460v-40h640v40H160Zm0-190.77v-40h640v40H160Z"/>
            </svg>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search ..">
                    <button class="search-btn" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/>
                        </svg>
                    </button>
                </div>
            </form>
            <a href="#" class="updates">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/>
                </svg>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="<?php echo URLROOT; ?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <!-- Main Section -->
        <main>
            <div class="header">
                <div class="left">
                    <h1>My Profile</h1>
                </div>
            </div>
            <p>Please fill the following details to update your profile (You are not allowed to update the NIC and Gov.Reg No).</p>

            <form action="<?php echo URLROOT; ?>/tour_guides/updateprofile" method="POST">
                <div class="profile-content">
                    <!-- Profile Top Section -->
                    <div class="profile-top">
                        <div class="imageDiv">
                            <div class="div1">
                                <img src="<?php echo URLROOT; ?>/Images/Profile pic.jpg">
                                <button class="change-btn" id="imageChangeBtn">Change Image</button>
                            </div>
                            <div class="div2">
                                <h4><?php echo isset($data['details']->name) ? htmlspecialchars($data['details']->name) : 'N/A'; ?></h4>
                                <h5><?php echo isset($data['details']->email) ? htmlspecialchars($data['details']->email) : 'N/A'; ?></h5>
                            </div>
                        </div>
                        <div class="editBtn">
                            <button class="editProfile" id="editProfileBtn">Edit</button>
                        </div>
                    </div>

                    <!-- Personal Information Section -->
                    <h2>Personal Information:</h2>
                    <div class="profile-center">
                        <div class="left">
                            <h4>Guider Name</h4>
                            <input type="text" id="name" name="name">
                            <h4>Address</h4>
                            <input type="text" id="address" name="address">
                            <h4>Language</h4>
                            <select id="language-select" multiple="multiple" style="width: 300px;">
                                <option value="English">English</option>
                                <option value="Sinhala">Sinhala</option>
                                <option value="Russian">Russian</option>
                                <option value="German">German</option>
                                <option value="Arabic">Arabic</option>
                                <option value="French">French</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $('#language-select').select2({
                                        placeholder: "Select languages",
                                        tags: true
                                    });
                                });
                            </script>
                            <h4>Email</h4>
                            <input type="email" id="email" name="email">
                            <h4>Phone Number</h4>
                            <input type="text" id="phone" name="phone">
                            <h4>NIC</h4>
                            <input type="text" id="nic" name="nic" value="200233513599" readonly>
                        </div>

                        <div class="right">
                            <h4>Government Registration No</h4>
                            <input type="text" id="reg_num" name="reg_num" value="ALB2043" readonly>
                            <h4>Government National Guider License</h4>
                            <input type="file" id="gov_license" name="gov_license" accept="image/*">
                            <h4>Experienced Areas</h4>
                            <input type="text" id="exp_area" name="exp_area">
                        </div>
                    </div>

                    <!-- Password Settings Section -->
                    <h2>Password Settings:</h2>
                    <div class="profile-bottom">
                        <div class="group">
                            <h4>Password</h4>
                            <input type="password" id="password" name="password">
                        </div>
                        <div class="group">
                            <h4>Confirm Password</h4>
                            <input type="password" id="confirm_password" name="confirm_password">
                        </div>
                    </div>

                    <!-- Profile Actions -->
                    <div class="profile-actions">
                      
                        <button type="submit" class="delete">Delete My Account</button>
                    </div>
                </div>
            </form>
        </main>

    </div>

    <script src="<?php echo URLROOT; ?>/js/Sidebar.js"></script>
</body>
</html>