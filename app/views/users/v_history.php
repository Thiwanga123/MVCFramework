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
    <?php $currentPage = $data['currentPage']; ?>

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
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['bookings'] as $booking):?>
                                <tr> 
                                    <td><?php echo htmlspecialchars($booking->booking_id); ?></td>
                                    <td><?php echo htmlspecialchars($booking->type); ?></td>
                                    <td><?php echo htmlspecialchars($booking->name); ?></td>
                                    <td><?php echo htmlspecialchars($booking->start_date); ?></td>
                                    <td><?php echo htmlspecialchars($booking->end_date); ?></td>
                                    <td class="status <?php echo strtolower($booking->status); ?>">
                                        <?php echo htmlspecialchars($booking->status); ?>
                                    </td>                                    
                                    <td><?php echo htmlspecialchars($booking->price); ?> </td>                           
                                </tr> 
                                <?php endforeach; ?>
                            </tbody>
                        </table> 
                    </div>
            </div>
        </main>
    </div>
   
    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>

</body>
</html>
