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
 <?php print_r($data['bookings'] )?>
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
                                    <td>
                                    <?php if (strtolower($booking->status) === 'booked'): ?>
                                        <button class="cancellationBtn" 
                                        data-id = "<?php echo htmlspecialchars($booking->id); ?>"
                                        data-type = "<?php echo htmlspecialchars($booking->type); ?>"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
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
   
    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
    <script src="<?php echo URLROOT;?>/js/cancellationPolicy.js"></script>
    <script>const URLROOT = "<?php echo URLROOT; ?>";</script>



</body>
</html>
