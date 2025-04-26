<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/planningSideBarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/userspage/summarySection.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>My Plan</title>
</head>
<body>
    <div class="box" id="box">
    <?php $currentPage = $data['currentPage']; ?>

    <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/planningSideBar.php'; ?>
     <!-- End Of Sidebar -->

     <!--Main Content-->
    

        <main>
            <div class="rental-container">  
                <div class="filter">
                    <h1>My Plan</h1>
                </div>
                <div class="trip-summary-container">
                        <h2>Trip Summary for <?= htmlspecialchars($data['name']) ?></h2>

                        <div class="summary-cards">

                            <?php if (!empty($data['trip']) && !empty($data['accommodation_data'])): ?>
                                <div class="summary-card">
                                    <h3>Accommodation</h3>
                                    <div class="summary-item"><span>Start Date:</span> <?= htmlspecialchars($data['trip']['startDate']) ?></div>
                                    <div class="summary-item"><span>End Date:</span> <?= htmlspecialchars($data['trip']['endDate']) ?></div>
                                    <div class="summary-item"><span>Property ID:</span> <?= htmlspecialchars($data['accommodation_data']['propertyId']) ?></div>
                                    <div class="summary-item"><span>Single Rooms:</span> <?= htmlspecialchars($data['accommodation_data']['singleRooms']) ?></div>
                                    <div class="summary-item"><span>Double Rooms:</span> <?= htmlspecialchars($data['accommodation_data']['doubleRooms']) ?></div>
                                    <div class="summary-item"><span>Family Rooms:</span> <?= htmlspecialchars($data['accommodation_data']['familyRooms']) ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($data['booking_vehicle_data'])): ?>
                                <div class="summary-card">
                                    <h3>Vehicle Booking</h3>
                                    <div class="summary-item"><span>Vehicle ID:</span> <?= htmlspecialchars($data['booking_vehicle_data']['vehicleId']) ?></div>
                                    <div class="summary-item"><span>Rate:</span> Rs. <?= htmlspecialchars($data['booking_vehicle_data']['rate']) ?></div>
                                    <div class="summary-item"><span>Pickup Location:</span> <?= htmlspecialchars($data['booking_vehicle_data']['pickupLocation']) ?></div>
                                    <div class="summary-item"><span>Driver Option:</span> <?= htmlspecialchars($data['booking_vehicle_data']['driverOption']) ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($data['guider_booking'])): ?>
                                <div class="summary-card">
                                    <h3>Guider Booking</h3>
                                    <div class="summary-item"><span>Guider ID:</span> <?= htmlspecialchars($data['guider_booking']['guiderId']) ?></div>
                                    <div class="summary-item"><span>Pickup:</span> <?= htmlspecialchars($data['guider_booking']['pickupLocation']) ?></div>
                                    <div class="summary-item"><span>Destination:</span> <?= htmlspecialchars($data['guider_booking']['destination']) ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($data['equipmentBooking'])): ?>
                                <div class="summary-card">
                                    <h3>Equipment Booking</h3>
                                    <div class="summary-item"><span>Equipment ID:</span> <?= htmlspecialchars($data['equipmentBooking']['equipmentId']) ?></div>
                                    <div class="summary-item"><span>Start Date:</span> <?= htmlspecialchars($data['equipmentBooking']['startDate']) ?></div>
                                    <div class="summary-item"><span>End Date:</span> <?= htmlspecialchars($data['equipmentBooking']['endDate']) ?></div>
                                    <div class="summary-item"><span>Total Price:</span> Rs. <?= htmlspecialchars($data['equipmentBooking']['totalPrice']) ?></div>
                                </div>
                            <?php endif; ?>

                        </div>
                </div>
            </div>
        </main>

     </div>


     
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
     <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
    <script>const URLROOT = "<?php echo URLROOT; ?>"; </script>

</body>

</html>
