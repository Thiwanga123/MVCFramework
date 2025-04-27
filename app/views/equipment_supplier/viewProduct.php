<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/equipmentRentals/supplierViewProduct.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/equipmentRentals/editProduct.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/equipmentRentals/reviews.css">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT;?>/css/equipmentRentals/booking.css"> -->
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/calendar.css"> 
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/Modals/logoutModal.css">

    
    <title>Equipment</title>
</head>
<body>
    <div class="box" id="box">
        <div class="content">
            <?php include_once APPROOT . '/views/inc/components/supplierNavBar.php'; ?>
            <main>
                <hr>

                <div class="view-container">
                    <div class="container">
                        <div class="header">
                            <h1>Product Details</h1>
                            <div class="back-button"><a href="<?php echo URLROOT;?>/equipment_suppliers/myInventory"> Back to My Rentals</a></div>
                        </div>
                    <!-- Navigation Tabs -->
                        <div class="menu-bar">
                            <button class="tab-button active" onclick="openTab(event, 'details')">Details</button>
                            <button class="tab-button" onclick="openTab(event, 'reviews')">Reviews</button>
                            <button class="tab-button" onclick="openTab(event, 'book-now')">Bookings</button>
    
                        </div>
                        <!-- Tab Content -->
                        <div class="tab-content" id="details">
                            <?php include_once APPROOT . '/views/equipment_supplier/includes/details.php'; ?> 
                        </div>

                        <div class="tab-content" id="reviews" style="display: none;">
                            <?php include_once APPROOT . '/views/equipment_supplier/includes/reviews.php'; ?> 
                        </div>

                        <div class="tab-content" id="book-now" style="display: none;">
                            <?php include_once APPROOT . '/views/equipment_supplier/includes/bookings.php'; ?> 
                        </div>
                    </div>
                </div>  
            </main>
        </div>

        <div id="responseSuccessModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close-button" id="closeSuccessModal">&times;</span>
                <img src="<?php echo URLROOT;?>/Images/1930264_check_complete_done_green_success_icon.png" alt="">
                <p id="successModalMessage"></p>
            </div>
        </div>

        <div id="responseErrorModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close-button" id="closeErrorModal">&times;</span>
                <img src="<?php echo URLROOT;?>/Images/warning.png" alt="">

                <p id="errorModalMessage"></p>
            </div>
        </div>

        <?php include_once APPROOT . '/views/users/includes/components/logoutModal.php'; ?>
        

        
    </div>

    <div id="responseSuccessModal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; display: none; justify-content: center; align-items: center; background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-content" style="background-color: white; padding: 20px; border-radius: 10px; max-width: 400px; width: 90%; text-align: center;">
        <p id="successModalMessage" style="font-size: 16px; color: #333;"></p>
        <button id="closeSuccessModal" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-top: 10px;">Close</button>
    </div>
</div>

<!-- Error Modal -->
<div id="responseErrorModal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; display: none; justify-content: center; align-items: center; background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-content" style="background-color: white; padding: 20px; border-radius: 10px; max-width: 400px; width: 90%; text-align: center;">
        <p id="errorModalMessage" style="font-size: 16px; color: #333;"></p>
        <button id="closeErrorModal" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-top: 10px;">Close</button>
    </div>
</div>

    <script>const URLROOT = "<?php echo URLROOT; ?>"; </script>
    <script>var bookings = <?php echo $data['bookings']; ?></script>
    <script>const userId = <?php echo json_encode($data['user_id']); ?>;</script>
    <script src="<?php echo URLROOT;?>/js/ushan/js/changeContent.js" defer></script>
    <script src="<?php echo URLROOT;?>/js/ushan/js/Calendar.js"></script>
    <script src="<?php echo URLROOT;?>/js/ushan/js/equipmentBooking.js"></script>
    <script src="<?php echo URLROOT;?>/js/ushan/js/equipmentReview.js"></script>
    <script src="<?php echo URLROOT;?>/js/ushan/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/ushan/js/subMenu.js"></script>
    <script src="<?php echo URLROOT;?>/js/ushan/js/EquipmentSupplierJS/deleteProduct.js"></script>


</body>

</html>
