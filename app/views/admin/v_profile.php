<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/pages/Profile.css">
    <title>Profile</title>
</head>
<body>
    <!-- SideBar -->
    <?php require APPROOT . '/views/inc/components/adminsidebar.php'; ?>
     <!-- End Of Sidebar -->

     <!--Main Content-->
     <div class="content">
        <!--navbar-->
        <nav>
            <svg class="menu" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-269.23v-40h640v40H160ZM160-460v-40h640v40H160Zm0-190.77v-40h640v40H160Z"/></svg>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search ..">
                    <button class="search-btn" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                    </button>
                </div>
            </form>
            <a href="#" class="updates">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>
                <span class="count">12</span>
            </a>
            <p>Hii Welcome <?php echo isset($_SESSION['name']) ? ' ' . htmlspecialchars($_SESSION['name']) : ''; ?> </p>
            <a href="#" class="profile">
            <img src="../../../Public/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>My Profile</h1>
                </div>
            </div>
            
            <div class="profile">
                <div class="profile-left">
                <img src="/Images/Profile pic.jpg" alt="">
                </div>

                <div class="profile-center">
                    <h4>Name</h4>
                    <input type="name" id="name" name="name">
                    <h4>Email</h4>
                    <input type="email" id="email" name="email">
                    <h4>Permanent Address</h4>
                    <input type="address" id="address" name="address">
                    <h4>Present Address</h4>
                    <input type="presentAddress" id="presentAddress" name="presentAddress">
                    
                </div>

                <div class="profile-right">
                    <h4>Company Name</h4>
                    <input type="companyName" id="companyName" name="companyName">
                    <h4>Password</h4>
                    <input type="password" id="password" name="password">
                    <h4>City</h4>
                    <input type="city" id="city" name="city">
                    <h4>Postal Code</h4>
                    <input type="postalCode" id="postalCode" name="postalCode">
                </div>
                <div class="profile-actions">
                    <button type="submit">Save</button>
                </div>
                
            </div>
         
        </main>

    </div>

    <script src="../../../Public/JS Scripts/Sidebar.js"></script>
</body>

</html>
