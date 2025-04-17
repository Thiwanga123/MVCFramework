<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Profile_pre.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>Contact</title>
</head>
<body>
    <!-- SideBar -->
     <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
     <!-- End Of Sidebar -->

     <!--Main Content-->
    

        <main>
           
        
        <form action="#"  method="POST">
            <div class="profile">
                <div class="profile-left">
                
                </div>
                
                <div class="profile-center">
                    <h4>Your Name</h4>
                    <input type="name" id="name" name="name" value="<?php echo $data['name'];?>">
                    <h4>Your Email</h4>
                    <input type="email" id="email" name="email" value="<?php echo $data['email'];?>">
                    <h4>Your Telephone Number</h4>
                    <input type="phone_number" id="phone_number" name="phone_number" value="<?php echo $data['phone_number'];?>">
                    <h4>Your NIC number</h4>
                    <input type="nic" id="nic" name="nic"value="<?php echo $data['nic'];?>">
                    <h4>Person You want to Contact</h4>
                    <input type="nic" id="nic" name="nic"value="<?php echo $data['nic'];?>">
                    
                    
                </div>

                <div class="profile-right">
                    
                    
                    <h4>Service Provider ID (If the Person is a Service Proivder) </h4>
                    <input type="nic" id="nic" name="nic"value="<?php echo $data['nic'];?>" >
                    <h4>Message</h4>
                   

                  <!--get the password from the user-->
               
                    <input type="text-area" id="msg" name="msg"   style="background-color: rgb(247, 247, 247);height: 300px;width: 80%;max-width: 400px;border-radius: 30px;padding: 0 20px;border: 1px solid gainsboro;gap: 1rem;" required>
                    
                    
                </div>
                <div class="profile-actions">
                    <input type="Submit"></input>
                </div>
                </form>
            </div>






          </main>

     </div>

     
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
     <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
</body>

</html>
