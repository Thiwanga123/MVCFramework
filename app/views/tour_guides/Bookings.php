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
        .modal-content {
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            background-color: #3498db;
            color: white;
            border-radius: 8px 8px 0 0;
        }

        .modal-footer {
            border-top: 1px solid #e0e0e0;
            padding: 15px;
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

                    <?php if (!empty($data)): ?>
                        <div class="table-responsive">
                            <table class="booking-table">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Traveler Name</th>
                                       
                                        <th>Traveler Phone</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                       
                                        <th>Guests</th>
                                        <th>Paid</th>
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
                                            
                                            <td><?php echo $booking->guests; ?></td>
                                            <td>Rs.<?php echo number_format($booking->paid, 2); ?></td>
                                            <td>
                                                <?php if ($booking->status == 'booked'): ?>
                                                    <span class="status-badge status-confirmed">Booked</span>
                                                <?php elseif ($booking->status == 'pending'): ?>
                                                    <span class="status-badge status-pending">Pending</span>
                                                <?php else: ?>
                                                    <span class="status-badge status-cancelled">Cancelled</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button class="btn-view">View</button>
                                                <?php if ($booking->status != 'cancelled'): ?>
                                                    <button class="btn-cancel">Cancel</button>
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

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
</body>
</html>
