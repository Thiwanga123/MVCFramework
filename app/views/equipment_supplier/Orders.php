<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Orders_ushan.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>Bookings</title>
</head>

<body>
    <div class="box">
        <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/equipmentSupplierSidebar.php'; ?>
        <!-- End Of Sidebar -->
            <main>
                <div class="initial-container">
                    <div class="header">
                        <div class="left">
                            <h1>Bookings</h1>
                        </div>
                    </div>

                    <p>Showing All Bookings()</p>
                    <div class="table-container">

                        <?php if(!empty($data['bookings'])): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Id</th>
                                    <th>Booking Id</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Price</th>                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['bookings'] as $booking):?>
                                    <tr>
                                        <td>
                                            <?php if (!empty($booking->image_path)): ?>
                                                <img src="<?= URLROOT . '/' . htmlspecialchars($booking->image_path); ?>" alt="Product Image" width="100" height="100">
                                            <?php else: ?>
                                                No Image
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($booking->equipment_id); ?></td>
                                        <td><?php echo htmlspecialchars($booking->booking_id); ?></td>
                                        <td><?php echo htmlspecialchars($booking->start_date); ?></td>
                                        <td><?php echo htmlspecialchars($booking->end_date); ?></td>
                                        <td><?php echo htmlspecialchars($booking->status); ?></td>
                                        <td><?php echo htmlspecialchars($booking->total_price); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table> 
                        <?php else: ?>
                            <p>You don't have any bookings at the moment.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </main>

    </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script>

</body>
</html>
