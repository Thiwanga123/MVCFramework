<!DOCTYPE html>
<html>
<head>
    <title>PayHere Payment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2>Complete Your Payment</h2>
    <button id="payhere-payment" disabled>Loading Payment Gateway...</button>

    <?php
$merchant_id = "1229635";
$merchant_secret = "MzgwMDgyNjc2ODIwOTcyNzYwNjExODUyODIzOTYyNzY3NTk4ODY5";
$order_id = "ItemNo12345"; // Dynamic order ID
$amount = "1000"; // Dynamic amount
$currency = "LKR"; // Or USD

// Generate hash
$hash = strtoupper(md5(
    $merchant_id . 
    $order_id . 
    number_format($amount, 2, '.', '') . 
    $currency .  
    strtoupper(md5($merchant_secret)) 
));

?>



    <!-- Load PayHere script with error handling -->
    <script>
        // Check if script loaded successfully
        function checkPayHereLoaded() {
            if (typeof payhere === 'undefined') {
                document.getElementById('payhere-payment').innerHTML = 'Payment gateway not available. Please try again later.';
                console.error('PayHere script failed to load');
            } else {
                document.getElementById('payhere-payment').disabled = false;
                document.getElementById('payhere-payment').innerHTML = 'Pay with PayHere';
                setupPayHere();
            }
        }

        // Setup PayHere object after it loads
        function setupPayHere() {
            // Get the PHP variables as JavaScript variables
            var order_id = "<?php echo $order_id; ?>";
            var amount = <?php echo $amount; ?>;
            var currency = "<?php echo $currency; ?>";
            var hash = "<?php echo $hash; ?>";
            
            // Payment completed handler
            payhere.onCompleted = function onCompleted(orderId) {
                alert("Payment completed. Order ID: " + orderId);
                window.location.href = "<?php echo URLROOT; ?>/payment/success?order_id=" + orderId;
            };

            // Payment dismissed handler
            payhere.onDismissed = function onDismissed() {
                alert("Payment cancelled!");
                window.location.href = "<?php echo URLROOT; ?>/payment/failed";
            };

            // Payment error handler
            payhere.onError = function onError(error) {
                alert("Error occurred: " + error);
                window.location.href = "<?php echo URLROOT; ?>/payment/failed";
            };

            // Pay button click handler
            document.getElementById('payhere-payment').onclick = function() {
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1229635",
                    "return_url": "<?php echo URLROOT; ?>/payment/success",
                    "cancel_url": "<?php echo URLROOT; ?>/payment/failed",
                    "notify_url": "<?php echo URLROOT; ?>/payment/notify",
                    "order_id": "<?php echo $order_id; ?>",
                    "items": "Room Booking",
                    "hash": "<?php echo $hash; ?>",
                    "amount": amount.toFixed(2),
                    "currency": "<?php echo $currency; ?>",
                    "first_name": "John",
                    "last_name": "Doe",
                    "email": "john@example.com",
                    "phone": "0712345678",
                    "address": "123 Test Road",
                    "city": "Colombo",
                    "country": "Sri Lanka"
                };

                payhere.startPayment(payment);
            };
        }

        // Load PayHere script
        window.addEventListener('load', function() {
            var script = document.createElement('script');
            script.src = 'https://www.payhere.lk/lib/payhere.js';
            script.onload = checkPayHereLoaded;
            script.onerror = function() {
                document.getElementById('payhere-payment').innerHTML = 'Failed to load payment gateway';
                console.error('Failed to load PayHere script');
            };
            document.body.appendChild(script);
        });
    </script>
</body>
</html>