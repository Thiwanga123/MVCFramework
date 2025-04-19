<!DOCTYPE html>
<html>
<head>
    <title>PayHere Payment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        h2 {
            color: #157e7e;
        }
        .details {
            text-align: left;
            margin: 20px 0;
        }
        .details p {
            margin: 5px 0;
        }
        button {
            background-color: #157e7e;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Complete Your Payment</h2>
        
        <div class="details">
            <p><strong>Check-in:</strong> <?php echo $data['check_in']; ?></p>
            <p><strong>Check-out:</strong> <?php echo $data['check_out']; ?></p>
            <p><strong>Total Rooms:</strong> <?php echo $data['totalrooms']; ?></p>
            <p><strong>Total Amount:</strong> LKR <?php echo number_format($data['amount'], 2); ?></p>
        </div>
        
        <button id="payhere-payment" disabled>Loading Payment Gateway...</button>
    </div>

    <script>
        // Load PayHere script with error handling
        window.addEventListener('load', function() {
            var script = document.createElement('script');
            script.src = 'https://www.payhere.lk/lib/payhere.js';
            script.onload = function() {
                document.getElementById('payhere-payment').disabled = false;
                document.getElementById('payhere-payment').innerHTML = 'Pay with PayHere';
                
                // Pay button click handler
                document.getElementById('payhere-payment').onclick = function() {
                    var payment = {
                        "sandbox": true,
                        "merchant_id": "<?php echo $merchant_id; ?>",
                        "return_url": "<?php echo URLROOT; ?>/payment/success",
                        "cancel_url": "<?php echo URLROOT; ?>/payment/failed",
                        "notify_url": "<?php echo URLROOT; ?>/payment/notify",
                        "order_id": "<?php echo $data['order_id']; ?>",
                        "items": "Room Booking",
                        "amount": "<?php echo number_format($data['amount'], 2, '.', ''); ?>",
                        "currency": "<?php echo $data['currency']; ?>",
                        "hash": "<?php echo $data['hash']; ?>",
                        "first_name": "<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest'; ?>",
                        "last_name": "",
                        "email": "<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>",
                        "phone": "",
                        "address": "",
                        "city": "",
                        "country": "Sri Lanka"
                    };

                    payhere.startPayment(payment);
                };
                
                // Payment completed handler
                payhere.onCompleted = function onCompleted(orderId) {
                    alert("Payment completed. Order ID: " + orderId);
                    window.location.href = "<?php echo URLROOT; ?>/payment/success?order_id=" + orderId;
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
                document.getElementById('payhere-payment').innerHTML = 'Payment gateway unavailable';
                alert('Failed to load payment gateway. Please try again later.');
            };
            
            document.body.appendChild(script);
        });
    </script>
</body>
</html>