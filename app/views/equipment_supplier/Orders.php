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
                                    <th>Actions</th>                           
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
                                        <td>
                                            <span class="status <?php echo strtolower($booking->status); ?>">
                                                <?php echo htmlspecialchars($booking->status); ?>
                                            </span>
                                        </td>
                                        <td><?php echo htmlspecialchars($booking->total_price); ?></td>
                                        <td class="actions">
                                            <div class="action-menu-container">
                                                <span class="action-trigger">  
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z"/></svg>
                                                </span>
                                                <div class="action-menu">
                                                    <a href="<?= URLROOT ?>/booking/view/<?php echo htmlspecialchars($booking->booking_id) ?>">View</a>
                                                    <?php if (strtolower($booking->status) === 'booked'): ?>
                                                        <a href="<?= URLROOT ?>/booking/cancel/<?= $booking->booking_id ?>"
                                                        onclick="return confirm('Are you sure you want to cancel this booking?')">
                                                        Cancel
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
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
