<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Orders_ushan.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>Reviews</title>
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
                            <h1>Reviews</h1>
                        </div>
                    </div>

                    <p>Showing All Reviews()</p>
                    <div class="table-container">
                        <?php if(!empty($data['reviews'])): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Product Image</th>
                                    <th>Produt Name</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Date</th>                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['reviews'] as $review):?>
                                    <tr>
                                        <td>
                                       
                                        </td>
                                        <td>
                                        <?php if (!empty($review->image_path)): ?>
                                                <img src="<?= URLROOT . '/' . htmlspecialchars($review->image_path); ?>" alt="Product Image" width="100" height="100">
                                            <?php else: ?>
                                                No Image
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($review->equipment_name); ?></td>
                                        <td><?php echo htmlspecialchars($review->rating); ?></td>
                                        <td><?php echo htmlspecialchars($review->comment); ?></td>
                                        <td><?php echo htmlspecialchars($review->created_at); ?></td>     
                                    </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table> 
                        <?php else: ?>
                            <p>You don't have any reviews at the moment.</p>
                        <?php endif; ?>
                       
                    </div>
                </div>
            </main>

    </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script>
    <script src="<?php echo URLROOT;?>/js/EquipmentSupplierJS/cancellationPolicy.js"></script>


</body>
</html>
