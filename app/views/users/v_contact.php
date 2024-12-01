<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Profile_pre.css">
    <title>Contact</title>
</head>
<body>
    <!-- SideBar -->
     <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
     <!-- End Of Sidebar -->

     <!--Main Content-->
     <div class="content">
        <!--navbar-->
        <nav>
            <svg class="menu" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-269.23v-40h640v40H160ZM160-460v-40h640v40H160Zm0-190.77v-40h640v40H160Z"/></svg>
            <form action="#">
                <div class="form-input">
                    
                </div>
            </form>
            <a href="#" class="updates">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>
                <span class="count">12</span>
            </a>
            <p>Hii Welcome <?php echo isset($_SESSION['name']) ? ' ' . htmlspecialchars($_SESSION['name']) : ''; ?> </p>
            <a href="#" class="profile">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
           
        
        
        <form action="#"  method="POST">
        <p>We will Contact you via the Phone or Email after your msg sent.</p>
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
</body>

</html>
