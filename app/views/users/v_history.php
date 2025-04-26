<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/newbooking.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>History</title>
</head>
<body>
    <div class="box" id="box">
    

    <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
    <!-- End Of Sidebar -->

    <!--Main Content-->
        <main>
            <div class="history-container">
                <div class="header">
                    <h1>Booking History</h1>
                </div>
                <p>Showing All Bookings (<?php echo htmlspecialchars($data['booking_count']); ?>)</p>

                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Price</th>   
                                    <th>Actions</th>                         
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['bookings'] as $booking): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($booking->booking_id); ?></td>
                                    <td><?php echo htmlspecialchars($booking->type); ?></td>
                                    <td><?php echo htmlspecialchars($booking->name); ?></td>
                                    <td><?php echo htmlspecialchars($booking->start_date); ?></td>
                                    <td><?php echo htmlspecialchars($booking->end_date); ?></td>
                                    <td class="status <?php echo strtolower($booking->status); ?>">
                                        <?php echo htmlspecialchars($booking->status); ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($booking->price); ?></td>
                                    <td>
                                        <?php if (strtolower($booking->status) === 'booked' || strtolower($booking->status) === 'pending'): ?>
                                        <button class="cancel-btn" 
                                                data-id="<?php echo htmlspecialchars($booking->booking_id); ?>" 
                                                data-checkin="<?php echo htmlspecialchars($booking->start_date); ?>"
                                                style="background-color: #ff4d4d; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">
                                            Cancel
                                        </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table> 
                    </div>
            </div>
        </main>
    </div>
   
    <div id="cancelDialog" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); z-index: 1000;">
        <p id="cancelMessage"></p>
        <div style="text-align: right; margin-top: 20px;">
            <button id="confirmCancel" style="background-color: #4CAF50; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">Confirm</button>
            <button id="closeDialog" style="background-color: #f44336; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">Close</button>
        </div>
    </div>
    <div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;"></div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
    <script src="<?php echo URLROOT;?>/js/cancellationPolicy.js"></script>
    <script>const URLROOT = "<?php echo URLROOT; ?>";</script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cancelButtons = document.querySelectorAll('.cancel-btn');
            const cancelDialog = document.getElementById('cancelDialog');
            const overlay = document.getElementById('overlay');
            const cancelMessage = document.getElementById('cancelMessage');
            const confirmCancel = document.getElementById('confirmCancel');
            const closeDialog = document.getElementById('closeDialog');
            let selectedBookingId = null;

            cancelButtons.forEach(button => {
                button.addEventListener('click', function () {
                    selectedBookingId = this.getAttribute('data-id');
                    const checkInDate = new Date(this.getAttribute('data-checkin'));
                    const currentDate = new Date();
                    const daysDiff = Math.ceil((checkInDate - currentDate) / (1000 * 60 * 60 * 24));

                    if (daysDiff <= 3) {
                        cancelMessage.textContent = "If you cancel within the last three days, you have to pay a 15% penalty amount to your service provider. Only 85% will be refunded to you.";
                    } else {
                        cancelMessage.textContent = "If you cancel now, you will be refunded the full amount.";
                    }

                    cancelDialog.style.display = 'block';
                    overlay.style.display = 'block';
                });
            });

            confirmCancel.addEventListener('click', function () {
                fetch('<?php echo URLROOT; ?>/users/cancelBooking', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `booking_id=${selectedBookingId}`
                })
                .then(response => response.text())
                .then(data => {
                    cancelDialog.style.display = 'none';
                    overlay.style.display = 'none';
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                    cancelDialog.style.display = 'none';
                    overlay.style.display = 'none';
                    alert('An error occurred. Please try again.');
                });
            });

            closeDialog.addEventListener('click', function () {
                cancelDialog.style.display = 'none';
                overlay.style.display = 'none';
            });
        });
    </script>
</body>
</html>
