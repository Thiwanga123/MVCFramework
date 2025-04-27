<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fafafa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .subscription-container {
            text-align: center;
            max-width: 400px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .subscription-container svg {
            width: 60px;
            height: 60px;
            fill: #005cbe;
            margin-bottom: 15px;
        }
        .subscription-container h1 {
            font-size: 24px;
            color: rgb(15, 89, 89);
            margin-bottom: 10px;
        }
        .subscription-container p {
            font-size: 16px;
            color: rgb(18, 138, 138);
            margin: 5px 0;
        }
        .subscription-container .highlight {
            font-weight: bold;
            color: #005cbe;
        }
        .subscription-container .price {
            font-size: 28px;
            font-weight: bold;
            color: #005cbe;
            margin: 15px 0;
        }
        .subscription-container .pay-btn {
            background-color: #005cbe;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .subscription-container .pay-btn:hover {
            background-color: #0056b3;
        }
        .subscription-container .note {
            font-size: 14px;
            color: rgb(18, 138, 138);
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="subscription-container">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
        </svg>
        <h1>Complete Your Subscription</h1>
        <p>To start your journey with <span class="highlight">JourneyBeyond</span>, please complete your subscription payment.</p>
        <h2>
            <?php 
                if ($data['plan'] === '3month') echo 'Basic Plan';
                elseif ($data['plan'] === '6month') echo 'Classic Plan';
                elseif ($data['plan'] === '12month') echo 'Premium Plan';
            ?>
        </h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($data['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($data['email']); ?></p>
        <p><strong>Service Type:</strong> <?php echo htmlspecialchars($data['sptype']); ?></p>
        <p class="price">
            <?php 
                if ($data['plan'] === '3month') {
                    $data['amount'] = 10000;
                    echo 'Rs. 10,000';
                } elseif ($data['plan'] === '6month') {
                    $data['amount'] = 20000;
                    echo 'Rs. 20,000';
                } elseif ($data['plan'] === '12month') {
                    $data['amount'] = 40000;
                    echo 'Rs. 40,000';
                }

                $data['currency'] = 'LKR';
                $data['order_id'] = 'ORDER' . time() . rand(1000, 9999);
                
            
                $merchant_id = '1229635';
                $merchant_secret = 'MzgwMDgyNjc2ODIwOTcyNzYwNjExODUyODIzOTYyNzY3NTk4ODY5';
                
                $hash = strtoupper(md5(
                    $merchant_id . 
                    $data['order_id'] . 
                    number_format($data['amount'], 2, '.', '') . 
                    $data['currency'] .  
                    strtoupper(md5($merchant_secret)) 
                ));

                $data['hash'] = $hash;
                $data['merchant_id'] = $merchant_id;
                $data['merchant_secret'] = $merchant_secret;

                $_SESSION['subscription_data'] = [
                    'plan' => $data['plan'],
                    'price' => $data['amount'],
                    'id' => $data['id'],
                    'order_id' => $data['order_id'],
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'sptype' => $data['sptype']
                    

                ];
            ?>

           
        </p>
        <button class="pay-btn" id="payhere-payment" disabled>Loading Payment Gateway...</button>

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
                        "items": "Subscription Plan",
                        "amount": "<?php echo number_format($data['amount'], 2, '.', ''); ?>",
                        "currency": "<?php echo $data['currency']; ?>",
                        "hash": "<?php echo $data['hash']; ?>",
                        "first_name": "<?php $data['name']; ?>",
                        "last_name": "",
                        "email": "<?php echo $data['email']; ?>",
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
                    window.location.href = "<?php echo URLROOT; ?>/payment/success_sub?order_id=" + orderId;
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
        <p class="note">Your subscription ensures uninterrupted access to our premium services.</p>
    </div>
</body>
</html>
