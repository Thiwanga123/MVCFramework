<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Orders_ushan.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

<<<<<<< HEAD
    <title>Home</title>
=======
    <title>Bookings</title>
>>>>>>> main
</head>

<body>
    <div class="box">
<<<<<<< HEAD
    
=======
>>>>>>> main
        <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/equipmentSupplierSidebar.php'; ?>
        <!-- End Of Sidebar -->
            <main>
<<<<<<< HEAD
                <?php echo($_SESSION['id']); ?>
=======
>>>>>>> main
                <div class="initial-container">
                    <div class="header">
                        <div class="left">
                            <h1>Bookings</h1>
                        </div>
                    </div>
<<<<<<< HEAD
                    <p>Showing All Bookings()</p>
                    <div class="table-container">
=======

                    <p>Showing All Bookings()</p>
                    <div class="table-container">

                        <?php if(!empty($data['bookings'])): ?>
>>>>>>> main
                        <table>
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Id</th>
<<<<<<< HEAD
                                    <th>Order</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Price</th>                            
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><img src="https://via.placeholder.com/50" alt="Product 1" /></td>
                                <td>PID001</td>
                                <td>#1001</td>
                                <td>2025-04-01</td>
                                <td>2025-04-10</td>
                                <td>Shipped</td>
                                <td>$49.99</td>
                            </tr>
                            <tr>
                                <td><img src="https://via.placeholder.com/50" alt="Product 2" /></td>
                                <td>PID002</td>
                                <td>#1002</td>
                                <td>2025-04-03</td>
                                <td>2025-04-12</td>
                                <td>Processing</td>
                                <td>$29.99</td>
                            </tr>
                            <tr>
                                <td><img src="https://via.placeholder.com/50" alt="Product 3" /></td>
                                <td>PID003</td>
                                <td>#1003</td>
                                <td>2025-04-05</td>
                                <td>2025-04-15</td>
                                <td>Delivered</td>
                                <td>$79.99</td>
                            </tr>
                            </tbody>
                        </table> 
                    </div>

                    <!-- <?php foreach ($data['bookings'] as $booking):?>
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
                                <?php endforeach; ?> -->
                        <!-- <div class="item-orders">
                            <div>
                            <div class="header">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                                <h3>All Orders</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Id</th>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="Images/default profile.png"> 
                                        </td>
                                        <td>E102</td>
                                        <td>Product A</td>
                                        <td>2024-09-12</td>
                                        <td>Rs.4000</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="Images/default profile.png"> 
                                        </td>
                                        <td>E102</td>
                                        <td>Product A</td>
                                        <td>2024-09-12</td>
                                        <td>Rs.4000</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="Images/default profile.png"> 
                                        </td>
                                        <td>E102</td>
                                        <td>Product A</td>
                                        <td>2024-09-101</td>
                                        <td>Rs.2000</td>
                                        <td>Cancelled</td>
                                    </tr>
                                </tbody>
                            </table> 
                            </div>
                        </div> -->
=======
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
>>>>>>> main
                </div>
            </main>

    </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script>

</body>
</html>
