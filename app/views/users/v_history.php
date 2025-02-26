<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/newbooking.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <title>History</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-content p {
            line-height: 1.6;
            font-size: 16px;
            color: #333;
        }

        .modal-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .modal-button {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin: 0 10px;
        }

        .delete-button {
            background: var(--danger);
            color: var(--light);
        }

        .cancel-button {
            background: var(--grey);
            color: var(--dark);
        }
    </style>
</head>
<body>
    <!-- SideBar -->
    <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
     <!-- End Of Sidebar -->

     <!--Main Content-->
     <div class="content">
        <!--navbar-->
        <nav>
            <svg class="menu" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-269.23v-40h640v40H160ZM160-460v-40h640v40H160Zm0-190.77v-40h640v40H160Z"/></svg>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search ..">
                    <button class="search-btn" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                    </button>
                </div>
            </form>
            <a href="#" class="updates">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>
                <span class="count">12</span>
            </a>
            <p>Hii Welcome <?php echo $_SESSION['name'];?></p>
            <a href="#" class="profile">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>History</h1>
                </div>
            </div>

            <div class="item-orders">
                <div>
                <div class="header">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    <h3>My Bookings</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                </div>
                <table>
                    <thead>
                        <tr>
                            
                            
                            <th>Booking ID</th>
                            <th>Service Taken</th>
                            <th>Service Provider ID</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Amount</th>
                            <th>Action</th>
                            <th>Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['bookingHistory'] as $booking):?>
                        <tr> 
                           
                            <td><?php echo htmlspecialchars($booking->BookingID); ?></td>
                            <td><?php echo htmlspecialchars($booking->ServiceTaken); ?></td>
                            <td><?php echo htmlspecialchars($booking->SupplierID); ?></td>
                            <td><?php echo htmlspecialchars($booking->CheckIn); ?></td>
                            <td><?php echo htmlspecialchars($booking->CheckOut); ?></td>
                            <td><?php echo htmlspecialchars($booking->Amount); ?></td>
                            <td><div class="action-btn">
                            <button class="view-btn" onclick="openModal(<?php echo htmlspecialchars(json_encode($booking)); ?>)">View</button>
                            <?php if($booking->Action == 'Active'): ?>
                            <button class="cancel-btn" onclick="confirmCancel(<?php echo $booking->BookingID; ?>)">Cancel</button>
                            <?php endif; ?>
                            </div>
                        </td>
                        <td><?php echo htmlspecialchars($booking->Action); ?> </td>                           
                        </tr> 
                        <?php endforeach; ?>
                    </tbody>
                </table> 
                </div>
            </div>
            
          </main>

     </div>

     <!-- Modal -->
     <div id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Booking Details</h2>
            <p id="bookingDetails"></p>
        </div>
     </div>

     <!-- Confirmation Modal -->
     <div id="confirmModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeConfirmModal()">&times;</span>
            <h2>Confirm Cancellation</h2>
            <p>Are you sure you want to cancel this booking?</p>
            <p>If you cancel within the last 3 days, you will only receive 90% of the payment as 10% will be charged as a penalty. If you cancel before the last 3 days, you will receive the full amount of the payment you have made. It will take some days to refund your money.</p>
            <div class="modal-buttons">
                <button class="modal-button cancel-button" onclick="closeConfirmModal()">No</button>
                <form id="cancelForm" action="<?php echo URLROOT; ?>/users/cancelBooking" method="post">
                    <input type="hidden" name="booking_id" id="cancelBookingId">
                    <button type="submit" class="modal-button delete-button">Yes</button>
                </form>
            </div>
        </div>
     </div>

     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
     <script>
        function openModal(booking) {
            document.getElementById('bookingDetails').innerHTML = `<br>
                <strong>Booking ID:</strong> ${booking.BookingID}<br>
                <strong>Service Taken:</strong> ${booking.ServiceTaken}<br>
                <strong>Service Provider ID:</strong> ${booking.SupplierID}<br>
                <strong>Check-In:</strong> ${booking.CheckIn}<br>
                <strong>Check-Out:</strong> ${booking.CheckOut}<br>
                <strong>Amount:</strong> Rs.${booking.Amount}<br>
                <strong>Status:</strong> ${booking.Action}<br>
            `;
            document.getElementById('bookingModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('bookingModal').style.display = 'none';
        }

        function confirmCancel(bookingId) {
            document.getElementById('cancelBookingId').value = bookingId;
            document.getElementById('confirmModal').style.display = 'flex';
        }

        function closeConfirmModal() {
            document.getElementById('confirmModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('bookingModal')) {
                closeModal();
            }
            if (event.target == document.getElementById('confirmModal')) {
                closeConfirmModal();
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            closeModal();
            closeConfirmModal();
        });
     </script>
</body>

</html>
