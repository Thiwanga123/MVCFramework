<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/equipmentRentals/view_product.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/equipmentRentals/productDetailsDiv.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/equipmentRentals/reviews.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/equipmentRentals/booking.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/calendar.css">
    
    <title>Equipment</title>
</head>
<body>
    <div class="box" id="box">
        <div class="content">
            <?php include_once APPROOT . '/views/inc/components/navbar.php'; ?>
            <main>
                <hr>
                <div class="view-container">
                    <div class="container">
                        <div class="header">
                            <h1>Product Details</h1>
                            <div class="back-button"><a href="<?php echo URLROOT;?>/users/equipment_suppliers"> Back to Products</a></div>
                        </div>
                    <!-- Navigation Tabs -->
                        <div class="menu-bar">
                            <button class="tab-button active" onclick="openTab(event, 'details')">Details</button>
                            <button class="tab-button" onclick="openTab(event, 'reviews')">Reviews</button>
                            <button class="tab-button" onclick="openTab(event, 'book-now')">Book Now</button>
    
                        </div>
                        <!-- Tab Content -->
                        <div class="tab-content" id="details">
                            <?php include_once APPROOT . '/views/users/includes/equipment_supplier/details.php'; ?> 
                        </div>

                        <div class="tab-content" id="reviews" style="display: none;">
                            <?php include_once APPROOT . '/views/users/includes/equipment_supplier/reviews.php'; ?> 
                        </div>

                        <div class="tab-content" id="book-now" style="display: none;">
                            <?php include_once APPROOT . '/views/users/includes/equipment_supplier/bookings.php'; ?> 
                        </div>
                    </div>
                </div>  
            </main>
        </div>

        <?php include_once APPROOT . '/views/users/includes/components/logoutModal.php'; ?>

        
    </div>

    <script>const URLROOT = "<?php echo URLROOT; ?>"; </script>
    <script>var bookings = <?php echo $data['bookings']; ?></script>
    <script>const userId = <?php echo json_encode($data['user_id']); ?>;</script>
    <script src="<?php echo URLROOT;?>/js/changeContent.js" defer></script>
    <script src="<?php echo URLROOT;?>/js/Calendar.js"></script>
    <script src="<?php echo URLROOT;?>/js/equipmentBooking.js"></script>
    <script src="<?php echo URLROOT;?>/js/equipmentReview.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script>



</body>

</html>
