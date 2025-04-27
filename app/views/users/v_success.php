<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Successful - JourneyBeyond</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .success-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 40px;
            width: 90%;
            max-width: 600px;
        }
        
        .checkmark-circle {
            width: 150px;
            height: 150px;
            position: relative;
            display: inline-block;
            background: #1d5a62;
            border-radius: 50%;
            margin: 20px auto 40px;
        }
        
        .checkmark {
            position: absolute;
            transform: rotate(45deg);
            left: 55px;
            top: 35px;
            height: 80px;
            width: 40px;
            border-bottom: 12px solid white;
            border-right: 12px solid white;
        }
        
        h1 {
            color: #1d5a62;
            font-size: 32px;
            margin-bottom: 20px;
        }
        
        .thank-you-message {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .booking-details {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            text-align: left;
            border: 1px solid #eee;
        }
        
        .booking-details h3 {
            color: #1d5a62;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        
        .booking-details p {
            margin: 10px 0;
            color: #333;
            display: flex;
            justify-content: space-between;
        }
        
        .booking-details p span:first-child {
            font-weight: bold;
        }
        
        .booking-id {
            font-weight: bold;
            color: #1d5a62;
        }
        
        .button-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }
        
        .btn {
            padding: 12px 25px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 30px;
            border: none;
            transition: all 0.3s ease;
            min-width: 45%;
        }
        
        .return-button {
            background-color: #1d5a62;
            color: white;
        }
        
        .return-button:hover {
            background-color: #157e7e;
        }
        
        .download-button {
            background-color: white;
            color: #1d5a62;
            border: 2px solid #1d5a62;
        }
        
        .download-button:hover {
            background-color: #f0f0f0;
        }
        
        #receiptArea {
            display: none;
        }
        
        @media print {
            body * {
                visibility: hidden;
            }
            #receiptArea, #receiptArea * {
                visibility: visible;
            }
            #receiptArea {
                display: block;
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 20px;
            }
            .no-print {
                display: none !important;
            }
        }
        
        #receiptArea {
            background: white;
            padding: 30px;
            max-width: 800px;
            margin: 20px auto;
            border: 1px solid #ddd;
        }
        
        .receipt-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #1d5a62;
        }
        
        .receipt-details {
            margin-bottom: 30px;
        }
        
        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        
        .receipt-table th, 
        .receipt-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .receipt-table th {
            background-color: #f5f5f5;
        }
        
        .receipt-total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
            font-size: 18px;
        }
        
        .receipt-footer {
            margin-top: 40px;
            text-align: center;
            color: #666;
            font-size: 14px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="checkmark-circle">
            <div class="checkmark"></div>
        </div>
        
        <h1>Your Booking was Successful!</h1>
        
        <p class="thank-you-message">
            Thanks for selecting JourneyBeyond as your Traveling Partner.
            Your payment has been processed successfully.
        </p>
        
        <div class="booking-details">
            <h3>Booking Details</h3>
            <p><span>Booking ID:</span> <span>#<?php echo isset($data['booking_id']) ? $data['booking_id'] : rand(10000, 99999); ?></span></p>
            <p><span>Property:</span> <span><?php echo isset($data['property_name']) ? $data['property_name'] : 'Luxury Resort'; ?></span></p>
            <p><span>Check-in:</span> <span><?php echo isset($data['check_in']) ? $data['check_in'] : date('Y-m-d', strtotime('+2 days')); ?></span></p>
            <p><span>Check-out:</span> <span><?php echo isset($data['check_out']) ? $data['check_out'] : date('Y-m-d', strtotime('+5 days')); ?></span></p>
            
            <?php if(isset($data['single_rooms']) && $data['single_rooms'] > 0): ?>
                <p><span>Single Rooms:</span> <span><?php echo $data['single_rooms']; ?></span></p>
            <?php endif; ?>
            
            <?php if(isset($data['double_rooms']) && $data['double_rooms'] > 0): ?>
                <p><span>Double Rooms:</span> <span><?php echo $data['double_rooms']; ?></span></p>
            <?php endif; ?>
            
            <?php if(isset($data['family_rooms']) && $data['family_rooms'] > 0): ?>
                <p><span>Family Rooms:</span> <span><?php echo $data['family_rooms']; ?></span></p>
            <?php endif; ?>
            
            <p><span>Total Rooms:</span> <span><?php echo isset($data['totalrooms']) ? $data['totalrooms'] : '1'; ?></span></p>
            <p><span>Total Amount:</span> <span>LKR <?php echo isset($data['totalamount']) ? number_format($data['totalamount'], 2) : '15,000.00'; ?></span></p>
            <p><span>Payment Date:</span> <span><?php echo date('Y-m-d H:i:s'); ?></span></p>
            <p><span>Payment Status:</span> <span style="color:green;font-weight:bold;">PAID</span></p>
        </div>
        
        <div class="button-container">
            <a href="<?php echo URLROOT; ?>/users/dashboard">
                <button class="btn return-button">Return to Dashboard</button>
            </a>
            <button class="btn download-button" onclick="printReceipt()">Download Receipt</button>
        </div>
    </div>
    
    <!-- Printable Receipt Area (Hidden by default) -->
    <div id="receiptArea">
        <div class="receipt-header">
            <h2>JourneyBeyond</h2>
            <p>Payment Receipt</p>
            <p>Date: <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>
        
        <div class="receipt-details">
            <p><strong>Booking ID:</strong> #<?php echo isset($data['booking_id']) ? $data['booking_id'] : rand(10000, 99999); ?></p>
            <p><strong>Property:</strong> <?php echo isset($data['property_name']) ? $data['property_name'] : 'Luxury Resort'; ?></p>
            <p><strong>Customer:</strong> <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Valued Customer'; ?></p>
            <p><strong>Email:</strong> <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'customer@example.com'; ?></p>
        </div>
        
        <table class="receipt-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php if(isset($data['single_rooms']) && $data['single_rooms'] > 0): ?>
                <tr>
                    <td>Single Room (<?php echo isset($data['check_in']) ? $data['check_in'] : date('Y-m-d', strtotime('+2 days')); ?> to <?php echo isset($data['check_out']) ? $data['check_out'] : date('Y-m-d', strtotime('+5 days')); ?>)</td>
                    <td><?php echo $data['single_rooms']; ?></td>
                   
                </tr>
                <?php endif; ?>
                
                <?php if(isset($data['double_rooms']) && $data['double_rooms'] > 0): ?>
                <tr>
                    <td>Double Room (<?php echo isset($data['check_in']) ? $data['check_in'] : date('Y-m-d', strtotime('+2 days')); ?> to <?php echo isset($data['check_out']) ? $data['check_out'] : date('Y-m-d', strtotime('+5 days')); ?>)</td>
                    <td><?php echo $data['double_rooms']; ?></td>
                    
                </tr>
                <?php endif; ?>
                
                <?php if(isset($data['family_rooms']) && $data['family_rooms'] > 0): ?>
                <tr>
                    <td>Family Room (<?php echo isset($data['check_in']) ? $data['check_in'] : date('Y-m-d', strtotime('+2 days')); ?> to <?php echo isset($data['check_out']) ? $data['check_out'] : date('Y-m-d', strtotime('+5 days')); ?>)</td>
                    <td><?php echo $data['family_rooms']; ?></td>
                   </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <div class="receipt-total">
            <p>Total Amount: LKR <?php echo isset($data['totalamount']) ? number_format($data['totalamount'], 2) : '15,000.00'; ?></p>
        </div>
        
        <div class="receipt-footer">
            <p>Thank you for choosing JourneyBeyond!</p>
            <p>If you have any questions, please contact us at support@journeybeyond.com</p>
            <p class="no-print">This is an electronically generated receipt. No signature required.</p>
        </div>
    </div>
    
    <script>
        function printReceipt() {
            window.print();
        }
    </script>
</body>
</html>