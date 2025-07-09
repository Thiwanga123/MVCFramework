<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/planningSideBarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/userspage/summarySection.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">
    <style>
        /* Internal CSS for Pay Now button */
        .pay-now-btn {
            display: block;
            margin: 20px auto;
            background-color: #87CEFA; /* Light blue color */
            color: #000;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .pay-now-btn:hover {
            background-color: #5CACEE; /* Slightly darker blue on hover */
        }
        
        .bottom {
            text-align: center;
            width: 100%;
            padding: 15px 0;
        }
    </style>

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

                        <div class="top">
                            <div class="detail">
                                <h4>Start Date :</h4>
                                <p><?php echo htmlspecialchars($data['trip']['startDate']); ?></p>
                            </div>
                            <div class="detail">
                                <h4>End Date :</h4>
                                <p><?php echo htmlspecialchars($data['trip']['endDate']); ?></p>
                            </div>
                            <div class="detail">
                                <h4>Location :</h4>
                                <p><?php echo htmlspecialchars($data['trip']['location']); ?></p>
                            </div>
                        </div>
                        <div class="summary-cards">

                            <?php if (!empty($data['trip']) && !empty($data['accommodation_data'])): ?>
                                <div class="summary-card">
                                    <h3>Accommodation</h3>
                                    <div class="summary-item"><span>Name :</span> <?= htmlspecialchars($data['accommodation_data']['accommodationName']) ?></div>
                                    <div class="summary-item"><span>Single Rooms:</span> <?= htmlspecialchars($data['accommodation_data']['singleRooms']) ?></div>
                                    <div class="summary-item"><span>Double Rooms:</span> <?= htmlspecialchars($data['accommodation_data']['doubleRooms']) ?></div>
                                    <div class="summary-item"><span>Family Rooms:</span> <?= htmlspecialchars($data['accommodation_data']['familyRooms']) ?></div>
                                    <div class="summary-item"><span>Total Price (Rs.) :</span> <?= htmlspecialchars($data['accommodation_data']['accommodationTotal']) ?></div>

                                </div>
                            <?php endif; ?>

                            <?php if (!empty($data['booking_vehicle_data'])): ?>
                                <div class="summary-card">
                                    <h3>Vehicle Booking</h3>
                                    <div class="summary-item"><span>Vehicle :</span> <?= htmlspecialchars($data['booking_vehicle_data']['vehicleModel']) ?></div>
                                    <div class="summary-item"><span>Driver Option:</span> <?= htmlspecialchars($data['booking_vehicle_data']['driverOption']) ?></div>
                                    <div class="summary-item"><span>Pickup Location:</span> <?= htmlspecialchars($data['booking_vehicle_data']['pickupLocation']) ?></div>
                                    <div class="summary-item"><span>Rate:</span> Rs. <?= htmlspecialchars($data['booking_vehicle_data']['rate']) ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($data['guider_booking'])): ?>
                                <div class="summary-card">
                                    <h3>Guider Booking</h3>
                                    <div class="summary-item"><span>Guider:</span> <?= htmlspecialchars($data['guider_booking']['guiderName']) ?></div>
                                    <div class="summary-item"><span>Pickup:</span> <?= htmlspecialchars($data['guider_booking']['pickupLocation']) ?></div>
                                    <div class="summary-item"><span>Total Price:</span> <?= htmlspecialchars($data['guider_booking']['guiderTotal']) ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($data['equipmentBooking'])): ?>
                                <div class="summary-card">
                                    <h3>Equipment Booking</h3>
                                    <div class="summary-item"><span>Equipment:</span> <?= htmlspecialchars($data['equipmentBooking']['equipmentName']) ?></div>
                                    <div class="summary-item"><span>Total Price:</span> Rs. <?= htmlspecialchars($data['equipmentBooking']['totalPrice']) ?></div>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="bottom">
                    <button class="pay-now-btn" id="pay-now-button">
                        Pay Now
                    </button>
                </div>
                </div>

                
            </div>
        </main>

     </div>


     
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
     <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
    <script>const URLROOT = "<?php echo URLROOT; ?>"; </script>

    <?php
    // Calculate total price from all bookings
    $totalPrice = 0;
    
    if (!empty($data['accommodation_data'])) {
        $totalPrice += floatval($data['accommodation_data']['accommodationTotal']);
    }
    
    if (!empty($data['booking_vehicle_data'])) {
        $totalPrice += floatval($data['booking_vehicle_data']['rate']);
    }
    
    if (!empty($data['guider_booking'])) {
        $totalPrice += floatval($data['guider_booking']['guiderTotal']);
    }
    
    if (!empty($data['equipmentBooking'])) {
        $totalPrice += floatval($data['equipmentBooking']['totalPrice']);
    }
    
    // PayHere integration variables
    $merchant_id = '1229635';
    $merchant_secret = 'MzgwMDgyNjc2ODIwOTcyNzYwNjExODUyODIzOTYyNzY3NTk4ODY5';
    $currency = 'LKR';
    $order_id = 'ORDER' . time() . rand(1000, 9999);
    
    // Create hash
    $hash = strtoupper(md5(
        $merchant_id . 
        $order_id . 
        number_format($totalPrice, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchant_secret)) 
    ));
    ?>

    <script>
        // Load PayHere script with error handling
        window.addEventListener('load', function() {
            var script = document.createElement('script');
            script.src = 'https://www.payhere.lk/lib/payhere.js';
            script.onload = function() {
                // Pay button click handler
                document.getElementById('pay-now-button').onclick = function() {
                    var payment = {
                        "sandbox": true,
                        "merchant_id": "<?php echo $merchant_id; ?>",
                        "return_url": "<?php echo URLROOT; ?>/payment/success",
                        "cancel_url": "<?php echo URLROOT; ?>/payment/failed",
                        "notify_url": "<?php echo URLROOT; ?>/payment/notify",
                        "order_id": "<?php echo $order_id; ?>",
                        "items": "Trip Booking Payment",
                        "amount": "<?php echo number_format($totalPrice, 2, '.', ''); ?>",
                        "currency": "<?php echo $currency; ?>",
                        "hash": "<?php echo $hash; ?>",
                        "first_name": "<?php echo $_SESSION['user_name'] ?? 'Customer'; ?>",
                        "last_name": "",
                        "email": "<?php echo $_SESSION['user_email'] ?? ''; ?>",
                        "phone": "<?php echo $_SESSION['user_phone'] ?? ''; ?>",
                        "address": "<?php echo $data['trip']['location'] ?? ''; ?>",
                        "city": "",
                        "country": "Sri Lanka"
                    };

                    payhere.startPayment(payment);
                };

                // Payment completed handler
                payhere.onCompleted = function onCompleted(orderId) {
                    window.location.href = "<?php echo URLROOT; ?>/payment/success_booking?order_id=" + orderId;
                };

                // Payment dismissed handler
                payhere.onDismissed = function onDismissed() {
                    alert("Payment cancelled.");
                    window.location.href = "<?php echo URLROOT; ?>/payment/failed";
                };

                // Payment error handler
                payhere.onError = function onError(error) {
                    alert("Error occurred: " + error);
                    window.location.href = "<?php echo URLROOT; ?>/payment/failed";
                };
            };

            script.onerror = function() {
                document.getElementById('pay-now-button').innerHTML = 'Payment gateway unavailable';
                alert('Failed to load payment gateway. Please try again later.');
            };

            document.body.appendChild(script);
        });
    </script>
</body>

</html>