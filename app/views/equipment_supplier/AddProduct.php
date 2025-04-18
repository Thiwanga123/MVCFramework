<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/AddProduct.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/errorModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/successModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">


    <title>Add New Rental</title>
</head>

<body>
    <div class="box">

        <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/equipmentSupplierSidebar.php'; ?>
        <!-- End Of Sidebar -->

            <main>
                
            </main>
            </div>
    </div>
    
            
            <?php
                include('errorModal.php');
            ?>

            <?php   
                include('successModal.php')
            ?>
    
    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script> 
    <script src="<?php echo URLROOT;?>/js/addProduct.js" ></script>
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js" ></script> 
    <!-- <script src="<?php echo URLROOT;?>/js/editProduct.js" ></script> -->
    <!-- <script src="<?php echo URLROOT;?>/js/Productpage.js" ></script>  -->
    <script> const URLROOT = "<?php echo URLROOT; ?>"; </script>
    <!-- <script src="<?php echo URLROOT;?>/js/Productpage.js" ></script>  -->    
</body>
</html>
