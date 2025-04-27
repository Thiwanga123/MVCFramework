<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Booking.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <title>Bookings</title>

    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Booking Container */
        .booking-container {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        .booking-title {
            color: #2c3e50;
            font-weight: 600;
            margin: 0;
        }

        .booking-count {
            background-color: #3498db;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
            font-size: 14px;
            font-weight: bold;
        }

        /* Booking Table */
        .booking-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
        }

        .booking-table th {
            background-color: #3498db;
            color: white;
            text-align: left;
            padding: 12px 15px;
            font-weight: 500;
        }

        .booking-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
            vertical-align: middle;
        }

        .booking-table tr:last-child td {
            border-bottom: none;
        }

        .booking-table tr:hover {
            background-color: #f5f5f5;
        }

        /* Status Badges */
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            text-align: center;
            display: inline-block;
            min-width: 80px;
        }

        .status-confirmed {
            background-color: #2ecc71;
            color: white;
        }

        .status-pending {
            background-color: #f39c12;
            color: white;
        }

        .status-cancelled {
            background-color: #e74c3c;
            color: white;
        }

        /* Buttons */
        .btn-view, .btn-cancel {
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-view {
            background-color: #3498db;
            color: white;
        }

        .btn-view:hover {
            background-color: #2980b9;
        }

        .btn-cancel {
            background-color: #e74c3c;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #c0392b;
        }

        /* Empty Bookings */
        .empty-bookings {
            text-align: center;
            padding: 40px 0;
            color: #7f8c8d;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 8px;
            width: 30%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-header h4 {
            margin: 0;
        }

        .modal-body {
            margin: 15px 0;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .booking-table {
                display: block;
                overflow-x: auto;
            }

            .booking-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .booking-count {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <?php include('Sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <!-- Navbar content here -->
        </nav>

        <!-- Main Section -->
        <main>
            <div class="header">
                <h1>All Bookings</h1>
            </div>

            <div class="container mt-4">
                <?php if(isset($_SESSION['booking_success'])): ?>
                    <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                        <?php echo $_SESSION['booking_success']; ?>
                        <?php unset($_SESSION['booking_success']); ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['booking_error'])): ?>
                    <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                        <?php echo $_SESSION['booking_error']; ?>
                        <?php unset($_SESSION['booking_error']); ?>
                    </div>
                <?php endif; ?>

                <div class="booking-container">
                    <div class="booking-header">
                        <h2 class="booking-title">My Bookings</h2>
                        <span class="booking-count"><?php echo count($data); ?></span>
                    </div>

                    <!-- Search Bar -->
                    <div class="search-bar">
                        <input type="text" id="searchInput" placeholder="Search bookings..." onkeyup="filterTable()" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <!-- End of Search Bar -->

                    <!-- Debug Information -->
                   

                    <?php if (!empty($data)): ?>
                        <div class="table-responsive">
                            <table class="booking-table" id="bookingTable">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Traveler Name</th>
                                        <th>Traveler Phone</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Pickup</th>
                                        <th>Destination</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $booking): ?>
                                        <tr>
                                            <td>#<?php echo $booking->booking_id; ?></td>
                                            <td><?php echo $booking->traveler_name; ?></td>
                                            <td><?php echo $booking->traveler_phone; ?></td>
                                            <td><?php echo date('M d, Y', strtotime($booking->check_in)); ?></td>
                                            <td><?php echo date('M d, Y', strtotime($booking->check_out)); ?></td>
                                            <td><?php echo $booking->pickup; ?></td>
                                            <td><?php echo $booking->destination; ?></td>
                                            <td>Rs.<?php echo number_format($booking->amount, 2); ?></td>
                                            <td>
                                                <?php 
                                                    $status = strtolower($booking->status); 
                                                    if ($status == 'booked' || $status == 'confirmed' || $status == 'active'): 
                                                ?>
                                                    <span class="status-badge status-confirmed">Booked</span>
                                                <?php elseif ($status == 'pending' || $status == 'waiting'): ?>
                                                    <span class="status-badge status-pending">Pending</span>
                                                <?php elseif ($status == 'cancelled' || $status == 'canceled'): ?>
                                                    <span class="status-badge status-cancelled">Cancelled</span>
                                                <?php else: ?>
                                                    <span class="status-badge status-cancelled"><?php echo ucfirst($status); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button class="btn-view" onclick="openViewModal(<?php 
                                                    echo htmlspecialchars(json_encode([
                                                        'booking_id' => $booking->booking_id,
                                                        'traveler_name' => $booking->traveler_name,
                                                        'traveler_phone' => $booking->traveler_phone,
                                                        'traveler_email' => $booking->traveler_email ?? '',
                                                        'check_in' => $booking->check_in,
                                                        'check_out' => $booking->check_out,
                                                        'pickup' => $booking->pickup,
                                                        'destination' => $booking->destination,
                                                        'amount' => $booking->amount,
                                                        'status' => $booking->status
                                                    ]), ENT_QUOTES); 
                                                ?>)">View</button>
                                                <?php 
                                                    $status = strtolower($booking->status);
                                                    if ($status != 'cancelled' && $status != 'canceled'): 
                                                ?>
                                                    <button class="btn-cancel" onclick="openDeleteModal(<?php echo $booking->booking_id; ?>, '<?php echo $booking->check_in; ?>', <?php echo $booking->amount; ?>, '<?php echo $booking->traveler_name; ?>', '<?php echo $booking->traveler_phone; ?>')">Cancel</button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="empty-bookings">
                            <h4>No bookings found</h4>
                            <p>You don't have any bookings at the moment.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content" style="width: 40%;">
            <div class="modal-header">
                <h4>Booking Cancellation</h4>
            </div>
            <div class="modal-body">
                <p id="deleteMessage">Are you sure you want to cancel this booking?</p>
                <div id="penaltyInfo" style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin-top: 15px;">
                    <h5 style="color: #e74c3c; margin-top: 0;">Important Notice:</h5>
                    <p id="penaltyMessage"></p>
                </div>
                <div id="travelerContactInfo" style="margin-top: 15px;">
                    <h5 style="color: #3498db;">Traveler Contact:</h5>
                    <p>Please contact <strong><span id="travelerName"></span></strong> at <strong><span id="travelerPhone"></span></strong> to explain your cancellation reason and any inconvenience caused.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-view" onclick="closeDeleteModal()">Back</button>
                <button class="btn-cancel" id="confirmDeleteButton">Confirm Cancellation</button>
            </div>
        </div>
    </div>
    <!-- End of Delete Confirmation Modal -->

    <!-- View Booking Modal -->
    <div id="viewModal" class="modal">
        <div class="modal-content" style="width: 50%;">
            <div class="modal-header">
                <h4>Booking Details</h4>
                <span style="cursor: pointer; font-size: 20px; font-weight: bold;" onclick="closeViewModal()">&times;</span>
            </div>
            <div class="modal-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <h4 style="color: #3498db; margin-bottom: 15px;">Booking Information</h4>
                        <p><strong>Booking ID:</strong> #<span id="view-booking-id"></span></p>
                        <p><strong>Status:</strong> <span id="view-status"></span></p>
                        <p><strong>Check-in Date:</strong> <span id="view-check-in"></span></p>
                        <p><strong>Check-out Date:</strong> <span id="view-check-out"></span></p>
                        <p><strong>Amount:</strong> Rs.<span id="view-amount"></span></p>
                    </div>
                    <div>
                        <h4 style="color: #3498db; margin-bottom: 15px;">Traveler Information</h4>
                        <p><strong>Name:</strong> <span id="view-traveler-name"></span></p>
                        <p><strong>Phone:</strong> <span id="view-traveler-phone"></span></p>
                        <p><strong>Email:</strong> <span id="view-traveler-email"></span></p>
                    </div>
                </div>
                <div style="margin-top: 20px;">
                    <h4 style="color: #3498db; margin-bottom: 15px;">Travel Details</h4>
                    <p><strong>Pickup Location:</strong> <span id="view-pickup"></span></p>
                    <p><strong>Destination:</strong> <span id="view-destination"></span></p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-view" onclick="closeViewModal()">Close</button>
            </div>
        </div>
    </div>
    <!-- End of View Booking Modal -->

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script>
        let deleteBookingId = null;
        let bookingAmount = 0;

        // Function to open the delete confirmation modal
        function openDeleteModal(bookingId, checkInDate, amount, travelerName, travelerPhone) {
            deleteBookingId = bookingId;
            bookingAmount = amount;

            const checkIn = new Date(checkInDate);
            const today = new Date();
            const timeDiff = Math.abs(checkIn - today);
            const daysDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
            const isPenaltyApplicable = checkIn - today <= 3 * 24 * 60 * 60 * 1000; // Within 3 days
            
            // Set traveler information
            document.getElementById('travelerName').textContent = travelerName;
            document.getElementById('travelerPhone').textContent = travelerPhone;

            // Calculate penalty if applicable
            const penaltyAmount = isPenaltyApplicable ? (amount * 0.2) : 0;
            const refundAmount = amount - penaltyAmount;
            
            // Set appropriate message based on penalty
            let penaltyMessage;
            if (isPenaltyApplicable) {
                penaltyMessage = `Since the booking date is within 3 days, a 20% penalty (Rs.${penaltyAmount.toLocaleString()}) will be charged to your account. <strong>The traveler will receive a full refund of Rs.${amount.toLocaleString()}.</strong>`;
            } else {
                penaltyMessage = `The traveler will receive a full refund of Rs.${amount.toLocaleString()}. No penalty will be applied to your account.`;
            }
            
            document.getElementById('penaltyMessage').innerHTML = penaltyMessage;
            document.getElementById('deleteModal').style.display = 'block';
        }

        // Function to close the delete confirmation modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
            deleteBookingId = null;
        }

        // Function to confirm deletion
        document.getElementById('confirmDeleteButton').onclick = function () {
            if (deleteBookingId) {
                window.location.href = "<?php echo URLROOT; ?>/tour_guides/cancelBooking/" + deleteBookingId;
            }
        };

        // Function to open the view booking modal
        function openViewModal(bookingData) {
            // Set the booking details in the modal
            document.getElementById('view-booking-id').textContent = bookingData.booking_id;
            
            // Format the status with proper styling
            const statusElement = document.getElementById('view-status');
            const status = bookingData.status.toLowerCase();
            let statusHTML = '';
            
            if (status === 'booked' || status === 'confirmed' || status === 'active') {
                statusHTML = '<span class="status-badge status-confirmed">Booked</span>';
            } else if (status === 'pending' || status === 'waiting') {
                statusHTML = '<span class="status-badge status-pending">Pending</span>';
            } else if (status === 'cancelled' || status === 'canceled') {
                statusHTML = '<span class="status-badge status-cancelled">Cancelled</span>';
            } else {
                statusHTML = '<span class="status-badge status-cancelled">' + status.charAt(0).toUpperCase() + status.slice(1) + '</span>';
            }
            
            statusElement.innerHTML = statusHTML;
            
            // Format dates nicely
            const checkInDate = new Date(bookingData.check_in);
            const checkOutDate = new Date(bookingData.check_out);
            
            document.getElementById('view-check-in').textContent = checkInDate.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            document.getElementById('view-check-out').textContent = checkOutDate.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            // Fill in the rest of the details
            document.getElementById('view-amount').textContent = parseFloat(bookingData.amount).toLocaleString();
            document.getElementById('view-traveler-name').textContent = bookingData.traveler_name;
            document.getElementById('view-traveler-phone').textContent = bookingData.traveler_phone;
            document.getElementById('view-traveler-email').textContent = bookingData.traveler_email;
            document.getElementById('view-pickup').textContent = bookingData.pickup;
            document.getElementById('view-destination').textContent = bookingData.destination;
            
            // Display the modal
            document.getElementById('viewModal').style.display = 'block';
        }
        
        // Function to close the view booking modal
        function closeViewModal() {
            document.getElementById('viewModal').style.display = 'none';
        }

        // Function to filter table rows based on search input
        function filterTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('bookingTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let match = false;

                for (let j = 0; j < cells.length; j++) {
                    if (cells[j].innerText.toLowerCase().includes(filter)) {
                        match = true;
                        break;
                    }
                }

                rows[i].style.display = match ? '' : 'none';
            }
        }
        
        // Close the modals when clicking outside of them
        window.onclick = function(event) {
            const deleteModal = document.getElementById('deleteModal');
            const viewModal = document.getElementById('viewModal');
            
            if (event.target === deleteModal) {
                closeDeleteModal();
            }
            
            if (event.target === viewModal) {
                closeViewModal();
            }
        };
    </script>
</body>
</html>
