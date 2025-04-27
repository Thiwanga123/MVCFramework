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
                                                <button class="btn-view">View</button>
                                                <?php 
                                                    $status = strtolower($booking->status);
                                                    if ($status != 'cancelled' && $status != 'canceled'): 
                                                ?>
                                                    <button class="btn-cancel" onclick="openDeleteModal(<?php echo $booking->booking_id; ?>, '<?php echo $booking->check_in; ?>')">Delete</button>
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
        <div class="modal-content">
            <div class="modal-header">
                <h4>Confirm Deletion</h4>
            </div>
            <div class="modal-body">
                <p id="deleteMessage">Are you sure you want to delete this booking?</p>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
                <button class="btn-view" id="confirmDeleteButton">Delete</button>
            </div>
        </div>
    </div>
    <!-- End of Delete Confirmation Modal -->

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script>
        let deleteBookingId = null;

        // Function to open the delete confirmation modal
        function openDeleteModal(bookingId, checkInDate) {
            deleteBookingId = bookingId;

            const checkIn = new Date(checkInDate);
            const today = new Date();
            const timeDiff = Math.abs(today - checkIn);
            const daysDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));

            const message = daysDiff <= 3
                ? "If you delete within the last 3 days, a 20% penalty will be deducted from your income."
                : "Are you sure you want to delete this booking?";

            document.getElementById('deleteMessage').innerText = message;
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
                window.location.href = "<?php echo URLROOT; ?>/tour_guides/deleteBooking/" + deleteBookingId;
            }
        };

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
    </script>
</body>
</html>
