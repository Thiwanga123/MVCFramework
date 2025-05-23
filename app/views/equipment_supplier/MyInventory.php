<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventory_e.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/AddProduct.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

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
                        <div>
                            <div class="header">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                                <h3>All Rental Products</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                            </div>

                            <div class="product-container">
                                <?php foreach ($data['rentals'] as $rental): ?>
                                    <a href="<?php echo URLROOT; ?>/product/viewProduct/<?php echo $rental->id; ?>" class="product-card-link">                        
                                        <div class="product-card">
                                            <div class="img">
                                                <img src="<?php echo URLROOT . '/' . $rental->image_path; ?>" alt="<?php echo $rental->product_name; ?>">
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

    <script src="<?php echo URLROOT;?>/js/EquipmentSupplierJS/AddRentalBtn.js"></script>
    <script src="<?php echo URLROOT;?>/js/EquipmentSupplierJS/AddProduct.js"></script>
    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script> 
    <script> const URLROOT = "<?php echo URLROOT; ?>"; </script>
    <!-- <script src="<?php echo URLROOT;?>/js/Productpage.js" ></script>  -->
    
</body>

</html>
