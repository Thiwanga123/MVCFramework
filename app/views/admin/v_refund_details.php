<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard.css">
    <title>Refund Details - Admin</title>
</head>
<body>
    <!-- SideBar -->
    <?php require APPROOT . '/views/inc/components/adminsidebar.php'; ?>
    <!-- End Of Sidebar -->

    <!--Main Content-->
    <div class="content">
        <main>
            <div class="header">
                <div class="left">
                    <h1>Refund Request Details</h1>
                </div>
            </div>

            <?php if(isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <div class="refund-details">
                <div class="booking-info">
                    <h3>Booking Information</h3>
                    <p><strong>Booking ID:</strong> <?php echo htmlspecialchars($data['refundDetails']->booking_id); ?></p>
                    <p><strong>Service Type:</strong> <?php echo htmlspecialchars($data['refundDetails']->booking_type); ?></p>
                    <p><strong>User:</strong> <?php echo htmlspecialchars($data['refundDetails']->user_name); ?></p>
                    <p><strong>Amount:</strong> Rs.<?php echo htmlspecialchars($data['refundDetails']->amount); ?></p>
                    <p><strong>Request Date:</strong> <?php echo date('Y-m-d H:i', strtotime($data['refundDetails']->request_date)); ?></p>
                </div>

                <div class="refund-info">
                    <h3>Refund Information</h3>
                    <p><strong>Status:</strong> <?php echo htmlspecialchars($data['refundDetails']->status); ?></p>
                    <p><strong>Amount:</strong> Rs.<?php echo htmlspecialchars($data['refundDetails']->amount); ?></p>
                    <p><strong>Request Date:</strong> <?php echo date('Y-m-d H:i', strtotime($data['refundDetails']->request_date)); ?></p>
                    <?php if($data['refundDetails']->refund_date): ?>
                        <p><strong>Refund Date:</strong> <?php echo date('Y-m-d H:i', strtotime($data['refundDetails']->refund_date)); ?></p>
                    <?php endif; ?>
                    <?php if($data['refundDetails']->bank_details): ?>
                        <?php $bankDetails = json_decode($data['refundDetails']->bank_details); ?>
                        <div class="bank-details">
                            <h4>Bank Details</h4>
                            <p><strong>Bank Name:</strong> <?php echo htmlspecialchars($bankDetails->bank_name); ?></p>
                            <p><strong>Account Number:</strong> <?php echo htmlspecialchars($bankDetails->account_number); ?></p>
                            <p><strong>Account Holder:</strong> <?php echo htmlspecialchars($bankDetails->account_holder); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($data['refundDetails']->admin_notes): ?>
                        <div class="admin-notes">
                            <h4>Admin Notes</h4>
                            <p><?php echo nl2br(htmlspecialchars($data['refundDetails']->admin_notes)); ?></p>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if($data['refundDetails']->status == 'pending'): ?>
                <div class="action-form">
                    <h3>Process Refund</h3>
                    <form action="<?php echo URLROOT; ?>/admin/processRefund" method="POST">
                        <input type="hidden" name="request_id" value="<?php echo $data['refundDetails']->id; ?>">
                        
                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" id="bank_name" name="bank_name" required>
                        </div>

                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" id="account_number" name="account_number" required>
                        </div>

                        <div class="form-group">
                            <label for="account_holder">Account Holder Name</label>
                            <input type="text" id="account_holder" name="account_holder" required>
                        </div>

                        <div class="form-group">
                            <label for="admin_notes">Admin Notes</label>
                            <textarea id="admin_notes" name="admin_notes" rows="3"></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-success">Process Refund</button>
                        </div>
                    </form>

                    <h3>Reject Refund</h3>
                    <form action="<?php echo URLROOT; ?>/admin/rejectRefund" method="POST">
                        <input type="hidden" name="request_id" value="<?php echo $data['refundDetails']->id; ?>">
                        
                        <div class="form-group">
                            <label for="admin_notes">Reason for Rejection</label>
                            <textarea id="admin_notes" name="admin_notes" rows="3" required></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-danger">Reject Refund</button>
                        </div>
                    </form>
                </div>
                <?php endif; ?>

                <div class="back-link">
                    <a href="<?php echo URLROOT; ?>/admin/getRefundRequests" class="btn-back">Back to Refund Requests</a>
                </div>
            </div>
        </main>
    </div>

    <style>
        .refund-details {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .booking-info, .refund-info {
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 4px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-actions {
            margin-top: 20px;
        }
        .btn-success {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-danger {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
</body>
</html> 