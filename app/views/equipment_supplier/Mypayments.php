<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Guider Payments </title>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/payments.css">
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
<title>Home</title>
</head>
<body>
 <!-- SideBar -->
    <?php
        include('Sidebar.php');;
    ?>
         <!-- End Of Sidebar -->
          <!--Main Content-->
     

            
    <main>
    <?php require APPROOT . '/views/inc/components/paymenthistory.php'; ?>
       
    </main>
</body>
</html>

