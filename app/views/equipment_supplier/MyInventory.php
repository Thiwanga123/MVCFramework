<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/Common/MyInventory.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/Common/AddProduct.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/Modals/logoutModal.css">

    <title>My Rentals</title>
</head>
<body>
<div class="box">
    <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/equipmentSupplierSidebar.php'; ?>
        <!-- End Of Sidebar -->
            <main>
                <div class="initial-container" id="inventoryContainer" style="display: flex;">
                    <div class="header">
                        <div class="left">
                            <h1>Rental Equipments</h1>
                        </div>
                        <div class="addBtn">
                            <button id="addRentalBtn">Add New</button>
                        </div>
                    </div>
           
                    <div class="Inventory">
                        <p>Showing All Equipments</p>
                            <div class="product-container">
                                <?php foreach ($data['rentals'] as $rental): ?>
                                    <a href="<?php echo URLROOT; ?>/product/viewProduct/<?php echo $rental->id; ?>" class="product-card-link">                        
                                        <div class="product-card">
                                            <div class="img">
                                                <img src="<?php echo URLROOT . '/' . $rental->image_path; ?>">
                                            </div>
                                            <div class="detailsCard">
                                                <h4><?php echo $rental->rental_name ?></h4>
                                                <h4><?php echo $rental->price_per_day ?></h4>
                                            </div>
                                            <div class="ratings">   
                                                <div class="star-rating">
                                                    <span class="star">&#9734;</span> <!-- Empty star -->
                                                    <span class="star">&#9734;</span> <!-- Empty star -->
                                                    <span class="star">&#9734;</span> <!-- Empty star -->
                                                    <span class="star">&#9734;</span> <!-- Empty star -->
                                                    <span class="star">&#9734;</span> <!-- Empty star -->
                                                </div>

                                                <div class="rating-count">
                                                    <h4><span>4.0/</span>5</h4>
                                                </div>
                                            </div> 
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>   
                    </div>
                </div>

                <?php include_once('AddForm.php'); ?>

            </main>
    </div>

        <?php
            include_once('errorModal.php');
        ?>

        <?php   
            include('successModal.php')
        ?>

    <script src="<?php echo URLROOT;?>/js/ushan/js/EquipmentSupplierJS/AddRentalBtn.js"></script>
    <script src="<?php echo URLROOT;?>/js/ushan/js/EquipmentSupplierJS/AddProduct.js"></script>
    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script> 
    <script> const URLROOT = "<?php echo URLROOT; ?>"; </script>
    <!-- <script src="<?php echo URLROOT;?>/js/Productpage.js" ></script>  -->
    
</body>

</html>
