<?php
// Get data from controller
$startDate = $data['booking_start_date'] ?? '';
$endDate = $data['booking_end_date'] ?? '';
$totalDays = $data['days'] ?? '';
$totalPrice = $data['totalPrice'] ?? '';
$orderId = $data['order_id'] ?? '';
$spType = $data['sp_type'] ?? 'guider';
$pickupLocation = $data['pickupLocation'] ?? 'Selected Location';
$destination = $data['tripDestination'] ?? 'N/A';
$supplierId = $data['supplier_id'] ?? 'N/A';
$productId = $data['product_id'] ?? 'N/A';
$vehicleId= $data['vehicle_id'] ?? 'N/A';



$data['currency'] = 'LKR';
$data['order_id'] = 'ORDER' . time() . rand(1000, 9999);

$merchant_id = '1229635';
$merchant_secret = 'MzgwMDgyNjc2ODIwOTcyNzYwNjExODUyODIzOTYyNzY3NTk4ODY5';

$hash = strtoupper(md5(
    $merchant_id . 
    $data['order_id'] . 
    number_format($data['totalPrice'], 2, '.', '') . 
    $data['currency'] .  
    strtoupper(md5($merchant_secret)) 
));

$data['hash'] = $hash;
$data['merchant_id'] = $merchant_id;
$data['merchant_secret'] = $merchant_secret;

// Get type-specific data
switch($spType) {
    case 'guider':
        $title = 'Guide Booking';
        $pickupLocation = $data['pickupLocation'] ?? '';
        $destination = $data['tripDestination'] ?? '';
        $serviceName = $data['guider_name'] ?? 'Guide Service';
        $serviceId = $data['guider_id'] ?? '';
        break;
        
    case 'equipment_supplier':
        $title = 'Equipment Rental';
        $pickupLocation = 'N/A';
        $destination = 'N/A';
        $serviceName = $data['product_name'] ?? 'Equipment';
        $serviceId = $data['product_id'] ?? '';
        break;
        
    case 'transport_supplier':
        $title = 'Vehicle Rental';
        $pickupLocation = $data['pickupLocation'] ?? 'Selected Location'; // Ensure pickupLocation is fetched
        $destination = $data['tripDestination'] ?? 'N/A'; // Ensure tripDestination is fetched
        $serviceName = $data['vehicle_name'] ?? 'Vehicle';
        $serviceId = $data['product_id'] ?? '';
        break;
}

// Get the driver option for transport suppliers
$driverOption = '';
if ($spType == 'transport_supplier') {
    $driverOption = $data['driver_option'] ?? 'with_driver';
    $driverOptionText = $driverOption == 'with_driver' ? 'With Driver' : 'Without Driver';
}

// Format the dates for better display
$formattedStartDate = date('F d, Y', strtotime($startDate));
$formattedEndDate = date('F d, Y', strtotime($endDate));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary - <?php echo $title; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #e6f7ff 0%, #cce6ff 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .summary-container {
            width: 90%;
            max-width: 600px;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease-out;
            position: relative;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .summary-header {
            background-color: #2196F3;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        
        .summary-header h2 {
            font-size: 28px;
            margin-bottom: 5px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        
        .summary-header p {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .close-button {
            position: absolute;
            top: 15px;
            right: 15px;
            color: white;
            font-size: 24px;
            cursor: pointer;
            transition: all 0.3s;
            height: 30px;
            width: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        .close-button:hover {
            background-color: rgba(255,255,255,0.2);
            transform: rotate(90deg);
        }
        
        .summary-body {
            padding: 25px;
        }
        
        .summary-section {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px dashed #ddd;
        }
        
        .summary-item:last-child {
            border-bottom: none;
        }
        
        .summary-label {
            display: flex;
            align-items: center;
            font-weight: 500;
            color: #555;
        }
        
        .summary-label i {
            margin-right: 10px;
            color: #2196F3;
            font-size: 18px;
            width: 24px;
            text-align: center;
        }
        
        .summary-value {
            font-weight: 400;
            color: #333;
            text-align: right;
            max-width: 60%;
            word-break: break-word;
        }
        
        .total-section {
            background-color: #e3f2fd;
            border-radius: 10px;
            padding: 15px 20px;
            margin-top: 10px;
        }
        
        .total-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-weight: bold;
            color: #1565C0;
            font-size: 18px;
        }
        
        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .btn-cancel {
            background-color: #ffffff;
            color: #f44336;
            border: 2px solid #f44336;
        }
        
        .btn-cancel:hover {
            background-color: #f44336;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(244, 67, 54, 0.3);
        }
        
        .btn-proceed {
            background-color: #2196F3;
            color: white;
            box-shadow: 0 4px 10px rgba(33, 150, 243, 0.3);
        }
        
        .btn-proceed:hover {
            background-color: #1976D2;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(33, 150, 243, 0.4);
        }
    </style>
</head>
<body>
    <div class="summary-container">
        <div class="summary-header">
            <span class="close-button" onclick="window.history.back()"><i class="fas fa-times"></i></span>
            <h2><i class="fas fa-receipt"></i> <?php echo $title; ?> Summary</h2>
            <p>Please review your booking details</p>
        </div>
        
        <div class="summary-body">
            <div class="summary-section">
                <?php if ($spType != 'equipment_supplier'): ?>
                <div class="summary-item">
                    <div class="summary-label">
                        <i class="<?php echo $spType == 'guider' ? 'fas fa-user-tie' : 'fas fa-car'; ?>"></i> 
                        <?php echo $spType == 'guider' ? 'Guide' : 'Vehicle'; ?>
                    </div>
                    <div class="summary-value"><?php echo $serviceName; ?></div>
                </div>
                <?php else: ?>
                <div class="summary-item">
                    <div class="summary-label"><i class="fas fa-campground"></i> Equipment</div>
                    <div class="summary-value"><?php echo $serviceName; ?></div>
                </div>
                <?php endif; ?>
                
                <?php if ($spType == 'transport_supplier'): ?>
                <div class="summary-item">
                    <div class="summary-label"><i class="fas fa-steering-wheel"></i> Driver Option</div>
                    <div class="summary-value"><?php echo $driverOptionText; ?></div>
                </div>
                <?php endif; ?>
                
                <div class="summary-item">
                    <div class="summary-label"><i class="fas fa-calendar-check"></i> From</div>
                    <div class="summary-value"><?php echo $formattedStartDate; ?></div>
                </div>
                <div class="summary-item">
                    <div class="summary-label"><i class="fas fa-calendar-times"></i> To</div>
                    <div class="summary-value"><?php echo $formattedEndDate; ?></div>
                </div>
                
                <?php if ($spType == 'guider' || $spType == 'transport_supplier'): ?>
                <div class="summary-item">
                    <div class="summary-label"><i class="fas fa-map-marker-alt"></i> Pickup</div>
                    <div class="summary-value"><?php echo $pickupLocation; ?></div>
                </div>
                <div class="summary-item">
                    <div class="summary-label"><i class="fas fa-map-signs"></i> Destination</div>
                    <div class="summary-value"><?php echo $destination; ?></div>
                </div>
                <?php endif; ?>
                
                <div class="summary-item">
                    <div class="summary-label"><i class="fas fa-clock"></i> Duration</div>
                    <div class="summary-value"><?php echo $totalDays; ?> day<?php echo $totalDays > 1 ? 's' : ''; ?></div>
                </div>
            </div>
            
            <div class="total-section">
                <div class="total-item">
                    <span><i class="fas fa-tag"></i> Total Price</span>
                    <span>Rs <?php echo number_format((float)$totalPrice, 2); ?></span>
                </div>
            </div>
            
            <div class="action-buttons">
                <button type="button" onclick="window.history.back()" class="btn btn-cancel">
                    <i class="fas fa-arrow-left"></i> Go Back
                </button>
                <button type="button" class="btn btn-proceed" disabled>
                    <i class="fas fa-credit-card"></i> Loading...
                </button>
            </div>
        </div>
    </div>

    <?php 

    // Store booking data in session for later use
    $_SESSION['booking_data'] = [
        'user_id' => $_SESSION['user_id'] ?? null,
        'sp_type' => $spType ?? null,
        'order_id' => $orderId ?? null,
        'service_id' => $serviceId ?? null,
        'total_price' => $totalPrice ?? null,
        'pickup_location' => $pickupLocation ?? null, // Ensure pickupLocation is stored in session
        'start_date' => $startDate ?? null,
        'end_date' => $endDate ?? null,
        'total_days' => $totalDays ?? null,
        'product_id' => $productId ?? null,
        'destination' => $destination ?? null, // Ensure tripDestination is stored in session
        'driver_option' => $driverOptionText ?? null,
        'service_name' => $serviceName ?? null,
        'service_provider_id' => $data['supplier_id'] ?? null,
    ];
 // Debugging line to check session data

  // Debugging line to check session data

    ?>

    <script>
        // Load PayHere script with error handling
        window.addEventListener('load', function() {
            var script = document.createElement('script');
            script.src = 'https://www.payhere.lk/lib/payhere.js';
            script.onload = function() {
                document.querySelector('.btn-proceed').disabled = false;
                document.querySelector('.btn-proceed').innerHTML = '<i class="fas fa-credit-card"></i> Proceed to Payment';

                // Pay button click handler
                document.querySelector('.btn-proceed').onclick = function() {
                    var payment = {
                        "sandbox": true,
                        "merchant_id": "<?php echo $data['merchant_id']; ?>",
                        "return_url": "<?php echo URLROOT; ?>/payment/success",
                        "cancel_url": "<?php echo URLROOT; ?>/payment/failed",
                        "notify_url": "<?php echo URLROOT; ?>/payment/notify",
                        "order_id": "<?php echo $data['order_id']; ?>",
                        "items": "<?php echo $title; ?> - <?php echo addslashes($serviceName); ?>",
                        "amount": "<?php echo number_format((float)$totalPrice, 2, '.', ''); ?>",
                        "currency": "<?php echo $data['currency']; ?>",
                        "hash": "<?php echo $data['hash']; ?>",
                        "first_name": "<?php echo $_SESSION['user_name'] ?? 'Customer'; ?>",
                        "last_name": "",
                        "email": "<?php echo $_SESSION['user_email'] ?? ''; ?>",
                        "phone": "<?php echo $_SESSION['user_phone'] ?? ''; ?>",
                        "address": "<?php echo $pickupLocation !== 'N/A' ? $pickupLocation : ''; ?>",
                        "city": "",
                        "country": "Sri Lanka"
                    };

                    payhere.startPayment(payment);
                };

                // Payment completed handler
                payhere.onCompleted = function onCompleted(orderId) {
                    window.location.href = "<?php echo URLROOT; ?>/payment/success_booking+?order_id=" + orderId;
                    
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
                document.querySelector('.btn-proceed').innerHTML = 'Payment gateway unavailable';
                alert('Failed to load payment gateway. Please try again later.');
            };

            document.body.appendChild(script);
        });
    </script>
</body>
</html>
