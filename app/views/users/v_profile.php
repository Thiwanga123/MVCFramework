<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Profile_pre.css">
    <title>Profile</title>
</head>
<body>
    <!-- SideBar -->
    <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
     <!-- End Of Sidebar -->

     <!--Main Content-->
    

        <main>
            <div class="header">
                <div class="left">
                    <h1>User Information</h1>
                </div>
            </div>
            
            <!--send the details with the SESSION_ID in post method-->
            <form action="<?php echo URLROOT; ?>users/updateprofile/<?php echo $_SESSION['user_id'];?>"  method="POST">
            <div class="profile">
                <div class="profile-left">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg" alt="">
                </div>
                
                <div class="profile-center">
                    <h4>Name</h4>
                    <input type="name" id="name" name="name" value="<?php echo $data['name'];?>">
                    <h4>Email</h4>
                    <input type="email" id="email" name="email" value="<?php echo $data['email'];?>">
                    <h4>Telephone Number</h4>
                    <input type="phone_number" id="phone_number" name="phone_number" value="<?php echo $data['phone_number'];?>">
                   
                    
                </div>

                <div class="profile-right">
                    
                    
                    <h4>NIC number</h4>
                    <input type="nic" id="nic" name="nic"value="<?php echo $data['nic'];?>">
                    <h4>Password</h4>
                   

                  <!--get the password from the user-->
               
                    <input type="password" id="password" name="password" required>
                    <h4>Confirm Passowrd</h4>
                    <input type="password" id="confirm_password" name="confirm_password" required>
            
                    
                </div>
                <div class="profile-actions">
                    <input type="Submit"></input>
                </div>
                </form>
            </div>
            
         
        </main>

    </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
</body>

</html>
