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
           
            <p><span>Service Type:</span> <span><?php echo ucfirst(str_replace('_', ' ', $data['sp_type'])); ?></span></p>
            
            <?php if ($data['sp_type'] == 'guider'): ?>
                <p><span>Guider Name:</span> <span><?php echo $data['guider_name']; ?></span></p>
                <p><span>Tour Date:</span> <span><?php echo $data['start_date']; ?></span></p>
                <p><span>Duration:</span> <span><?php echo $data['total_days']; ?> Days</span></p>
            <?php elseif ($data['sp_type'] == 'transport_supplier'): ?>
                <p><span>Vehicle Type:</span> <span><?php echo $data['vehicle_type']; ?></span></p>
                <p><span>Pickup Location:</span> <span><?php echo $data['pickup_location']; ?></span></p>
                <p><span>Drop-off Location:</span> <span><?php echo $data['destination']; ?></span></p>
                <p><span>Travel Date:</span> <span><?php echo $data['start_date']; ?></span></p>
            <?php elseif ($data['sp_type'] == 'equipment_supplier'): ?>
                <p><span>Equipment Name:</span> <span><?php echo $data['equipment_name']; ?></span></p>
                <p><span>Rental Period:</span> <span><?php echo $data['start_date']; ?> to <?php echo $data['end_date']; ?></span></p>
                <p><span>Quantity:</span> <span><?php echo $data['quantity']; ?></span></p>
            <?php endif; ?>
            
            <p><span>Total Amount:</span> <span>LKR <?php echo isset($data['total_price']) ? number_format($data['total_price'], 2) : '0.00'; ?></span></p>
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
            <p><strong>Service Type:</strong> <?php echo ucfirst(str_replace('_', ' ', $data['sp_type'])); ?></p>
            
            <?php if ($data['sp_type'] == 'guider'): ?>
                <p><strong>Guider Name:</strong> <?php echo $data['service_name']; ?></p>
                <p><strong>Tour Date:</strong> <?php echo $data['start_date']; ?></p>
                <p><strong>Duration:</strong> <?php echo $data['total_days']; ?> Days</p>
            <?php elseif ($data['sp_type'] == 'transport_supplier'): ?>
                <p><strong>Vehicle Type:</strong> <?php echo $data['vehicle_type']; ?></p>
                <p><strong>Pickup Location:</strong> <?php echo $data['pickup_location']; ?></p>
                <p><strong>Drop-off Location:</strong> <?php echo $data['destination']; ?></p>
                <p><strong>Travel Date:</strong> <?php echo $data['start_date']; ?></p>
            <?php elseif ($data['sp_type'] == 'equipment_supplier'): ?>
                <p><strong>Equipment Name:</strong> <?php echo $data['equipment_name']; ?></p>
                <p><strong>Rental Period:</strong> <?php echo $data['start_date']; ?> to <?php echo $data['end_date']; ?></p>
                <p><strong>Quantity:</strong> <?php echo $data['quantity']; ?></p>
            <?php endif; ?>
        </div>
        
        <div class="receipt-total">
            <p>Total Amount: LKR <?php echo isset($data['total_price']) ? number_format($data['total_price'], 2) : '0.00'; ?></p>
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