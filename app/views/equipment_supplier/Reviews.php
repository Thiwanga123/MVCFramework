<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Order_ushan.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    
    <title>Home</title>
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
                        <h1>Reviews & Ratings</h1>
                    </div>            
                </div>

                <p>Showing All Reviews()</p>
                    <div class="table-container">

                        <!-- <?php if(!empty($data['reviews'])): ?> -->
                        <table>
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Product Image</th>
                                    <th>Product Id</th>
                                    <th>Comment</th>
                                    <th>Rating</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php foreach ($data['reviews'] as $review):?>
                                    <tr>
                                        <td>
                                            <?php if (!empty($review->image_path)): ?>
                                                <img src="<?= URLROOT . '/' . htmlspecialchars($review->image_path); ?>" alt="Product Image" width="100" height="100">
                                            <?php else: ?>
                                                No Image
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($review->equipment_id); ?></td>
                                        <td><?php echo htmlspecialchars($review->review_id); ?></td>
                                        <td><?php echo htmlspecialchars($review->start_date); ?></td>
                                        <td><?php echo htmlspecialchars($review->end_date); ?></td>
                                        <td><?php echo htmlspecialchars($review->status); ?></td>
                                        <td><?php echo htmlspecialchars($review->total_price); ?></td>
                                    </tr>
                                <?php endforeach; ?> -->
                            </tbody>
                        </table> 
                        <!-- <?php else: ?>
                            <p>You don't have any reviews at the moment.</p>
                        <?php endif; ?> -->
                    </div>
            </div>
        </main>
        </div>


    </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script>

</body>
</html>
