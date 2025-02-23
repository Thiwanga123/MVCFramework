<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/newbooking.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <title>History</title>
</head>
<body>
    <!-- SideBar -->
    <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
     <!-- End Of Sidebar -->

     <!--Main Content-->
    

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
                            <button class="view-btn">View</button>
                            <?php if($booking->Action == 'Active'): ?>
                            <!--when submit cancel button the booking will cancel and release the number of bokkings from the booking table-->
                            <form action="<?php echo URLROOT; ?>/users/cancelBooking" method="post" style="display:inline;">
                                <input type="hidden" name="booking_id" value="<?php echo $booking->BookingID; ?>">
                                <button type="submit" class="cancel-btn">Cancel</button>
                            </form>
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


     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 

    
     
</body>

</html>
