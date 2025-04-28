<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Commoon/MyInventorys.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Commoon/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/cancellationModal.css">
    <!-- Add CSS link for notification modals -->
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/notificationModal.css">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/addVehicleModal.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/UpdateVehicleModal.css"> -->
    <title>Home</title>
    <style>
        /* Status styling */
        .status {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }
        
        .status.pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status.completed, .status.confirmed {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status.cancelled, .status.canceled {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        /* Button styling */
        .btn-cancel {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 12px;
            cursor: pointer;
        }
        
        .btn-cancel:hover {
            background-color: #d32f2f;
        }
        
        /* Responsive table styles */
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
            font-weight: 600;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        @media screen and (max-width: 768px) {
            th, td {
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>
    <div class="box">
        <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/vehiclesupplier_sidebar.php'; ?>
        <!-- End Of Sidebar -->
        <main>
            <div class="initial-container" id = "driverContainer">
                <div class="header">
                    <div class="left">
                        <h1>Bookings</h1>
                    </div>
                    <div class="right">
                    </div>
                </div>
                <p>Showing All Bookings()</p>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                            <th>Customer Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Pickup Location</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>    
                            <th>Action</th>                        
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data['bookings'])): ?>
                                <?php foreach ($data['bookings'] as $booking): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($booking->name); ?></td>
                                        <td><?php echo htmlspecialchars($booking->phone_number); ?></td>
                                        <td><?php echo htmlspecialchars($booking->email); ?></td>
                                        <td><?php echo htmlspecialchars($booking->pickup); ?></td>
                                        <td><?php echo htmlspecialchars($booking->check_in); ?></td>
                                        <td><?php echo htmlspecialchars($booking->check_out); ?></td>
                                        <td><span class="status <?php echo strtolower($booking->status); ?>"><?php echo $booking->status; ?></span></td>
                                        <td>
                                            <?php 
                                                $status = strtolower($booking->status);
                                                if ($status != 'cancelled' && $status != 'canceled'): 
                                            ?>
                                                <button class="btn-cancel" data-id="<?php echo $booking->booking_id; ?>">
                                                    Cancel
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">No bookings available.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table> 
                   
                </div>
            </div>

            <?php include('Addriver.php'); ?>

        </main>
    </div>

</div>

<!-- Cancellation Warning Modal -->
<div id="cancellationModal" class="confirmModal" style="display: none;">
    <div class="wrapper">
        <div class="modalContent">
            <img src="<?php echo URLROOT;?>/Images/warning.png" alt="Warning">
            <h1>Are you sure?</h1>
            <p>Do you really want to cancel this booking?</p>
            <p>Cancellations within 3 days of check-in will incur a 20% penalty.</p>
            <input type="hidden" id="bookingIdToCancel" value="">
        </div>

        <div class="bottom">
            <button id="cancelCancellation" class="cancel-btn">No, Keep Booking</button>
            <button id="confirmCancellation" class="delete-btn">Yes, Cancel Booking</button>
        </div>
    </div>
</div>

<!-- Include error and success modals -->
<?php require APPROOT . '/views/transport_supplier/errorModal.php'; ?>
<?php require APPROOT . '/views/transport_supplier/successModal.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check for cancellation success message
        <?php if(isset($_SESSION['cancellation_success'])): ?>
            // Show success modal
            const successModal = document.getElementById('successModal');
            const successMessage = document.getElementById('successMessage');
            successMessage.textContent = "<?php echo $_SESSION['cancellation_success']; ?>";
            successModal.style.display = 'flex';
            
            // Clear the message from session
            <?php unset($_SESSION['cancellation_success']); ?>
        <?php endif; ?>
        
        // Check for cancellation error message
        <?php if(isset($_SESSION['cancellation_error'])): ?>
            // Show error modal
            const errorModal = document.getElementById('errorModal');
            const errorMessage = document.getElementById('errorMessage');
            errorMessage.textContent = "<?php echo $_SESSION['cancellation_error']; ?>";
            errorModal.style.display = 'flex';
            
            // Clear the message from session
            <?php unset($_SESSION['cancellation_error']); ?>
        <?php endif; ?>
        
        // Close modal buttons
        document.getElementById('closeSuccessModal').addEventListener('click', function() {
            document.getElementById('successModal').style.display = 'none';
        });
        
        document.getElementById('closeSuccessModalBtn').addEventListener('click', function() {
            document.getElementById('successModal').style.display = 'none';
        });
        
        document.getElementById('closeErrorModal').addEventListener('click', function() {
            document.getElementById('errorModal').style.display = 'none';
        });
        
        document.getElementById('closeErrorModalBtn').addEventListener('click', function() {
            document.getElementById('errorModal').style.display = 'none';
        });
        
        // Add click event listener to all cancel buttons
        const cancelButtons = document.querySelectorAll('.btn-cancel');
        cancelButtons.forEach(button => {
            button.addEventListener('click', function() {
                const bookingId = this.getAttribute('data-id');
                openCancellationModal(bookingId);
            });
        });
        
        // Function to open cancellation modal
        window.openCancellationModal = function(bookingId) {
            document.getElementById('bookingIdToCancel').value = bookingId;
            document.getElementById('cancellationModal').style.display = 'flex';
        };
        
        // Close modal when clicking "No, Keep Booking" button
        document.getElementById('cancelCancellation').addEventListener('click', function() {
            document.getElementById('cancellationModal').style.display = 'none';
        });
        
        // Handle cancellation confirmation
        document.getElementById('confirmCancellation').addEventListener('click', function() {
            const bookingId = document.getElementById('bookingIdToCancel').value;
            if (bookingId) {
                window.location.href = '<?php echo URLROOT; ?>/transport_suppliers/cancelBooking/' + bookingId;
            }
        });
    });
</script>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
    <script src="<?php echo URLROOT;?>/js/addDriver.js"></script>
    <script src="<?php echo URLROOT;?>/js/editVehicle.js"></script>
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js"></script>
     
</body>

</html>
