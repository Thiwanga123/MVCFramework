<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <title>Dashboard-Admin</title>
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
            <div class="hotline">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path d="M798-120q-125 0-246-58.5T330-329Q229-430 170.5-551T112-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T386-386q31 26 65 47.5t72 38.5l95-98q9-9 21.5-13.5T670-418l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12Z"/>
                </svg>
                <span>Hotline: 011-4392831</span>
            </div>
            </form>
            
            <p>Hii Welcome <?php echo isset($_SESSION['name']) ? ' ' . htmlspecialchars($_SESSION['name']) : ''; ?> </p>
            <a href="#" class="profile">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
           
            <?php require APPROOT . '/views/inc/components/bookings.php'; ?>
            
        
          </main>

     </div>

     
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
</body>

</html>
