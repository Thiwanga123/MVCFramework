<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/features.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventorys.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/UpdateVehicleModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>Vehicles</title>
</head>
<body>
    <div class="box" id="box">
    <?php $currentPage = $data['currentPage']; ?>

        <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
        <!-- End Of Sidebar -->

        <!-- Main Content -->
        <div class="content">

            <!-- Navbar -->
          

            <main>
            <?php require APPROOT . '/views/inc/components/search.php'; ?>
                <div class="header">
                    <div class="left">
                        <h1>My Vehicles</h1>
                    </div>
                </div>
                <div class="Inventory">
                    <table>
                        <thead>
                            <tr>
                                <th>Vehicle Image</th>
                                <th>Type</th>
                                <th>Model</th>
                                <th>Make</th>
                                <th>Self Drive Rates per day</th>
                                <th>Driver Availability</th>
                                <th>With Driver Rates Per Day</th>
                                <th>Description</th>
                                <th>Vehicle Availability</th>
                                <th>Vehicle Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (empty($vehicles)): ?>
                            <tr>
                                <td colspan="7" style="text-align: center; font-size: 24px; font-weight: bold;">Currently no cars available</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ( $data ['vehicles'] as $vehicle): ?>
                            <tr>
                                <td>
                                    <?php if (!empty($vehicle['image_path'])): ?>
                                    <img src="<?php echo URLROOT . '/' . $vehicle['image_path']; ?>" alt="Vehicle Image">
                                    <?php else: ?>
                                    <img src="<?php echo URLROOT; ?>/Images/default_profile.png" alt="Default Image">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $vehicle['type']; ?></td>
                                <td><?php echo $vehicle['model']; ?></td>
                                <td><?php echo $vehicle['make']; ?></td>
                                <td><?php echo $vehicle['rate']; ?></td>
                                <td><?php echo $vehicle['driver']; ?></td>
                                <td><?php echo $vehicle['cost']; ?></td>
                                <td><?php echo $vehicle['description']; ?></td>
                                <td><?php echo $vehicle['availability']; ?></td>
                                <td><?php echo $vehicle['location']; ?></td>
                                <td class="action-button">
                                    <button class="vehicle-edit-btn" name="vehicle-edit-btn" id="vehicle-edit-btn"
                                        vehicleType="<?php echo $vehicle['type']; ?>"
                                        vehicleModel="<?php echo $vehicle['model']; ?>"
                                        vehicleMake="<?php echo $vehicle['make']; ?>"
                                        vehicleRate="<?php echo $vehicle['rate']; ?>"
                                        driver="<?php echo $vehicle['driver']; ?>"
                                        vehicleCost="<?php echo $vehicle['cost']; ?>"
                                        availability="<?php echo $vehicle['availability']; ?>"
                                        fuelType="<?php echo $vehicle['fuel_type']; ?>"
                                        description="<?php echo $vehicle['description']; ?>"
                                        vehicleLocation="<?php echo $vehicle['location']; ?>"
                                        vid="<?php echo $vehicle['id']; ?>">
                                        Edit
                                    </button>
                                    <a href="<?php echo URLROOT; ?>/transport_suppliers/delete_availability/<?php echo $vehicle['id']; ?>">
                                        <button class="delete-btn" onclick="return confirm('Are you sure?');">Delete</button>
                                    </a>
                                    <a href="<?php echo URLROOT; ?>/bookings/book/<?php echo $vehicle['id']; ?>">
                                        <button class="book-now-btn">Book Now</button>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/editVehicle.js"></script>
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
</body>
</html>
