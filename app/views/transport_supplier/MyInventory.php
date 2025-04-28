<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Commoon/MyInventorys.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Commoon/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/addVehicleModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/UpdateVehicleModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>Home</title>
</head>
<body>
    <div class="box">
        <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/vehiclesupplier_sidebar.php'; ?>
        <!-- End Of Sidebar -->
        <main>
            <!-- <?php var_dump($_SESSION);?> -->
            <div class="initial-container" id="vehicleContainer">
                <div class="header">
                    <div class="left">
                        <h1>My Vehicles</h1>
                    </div>
                    <div class="right">
                        <button class="add-btn" name="vehicle-add-btn" id="vehicle-add-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                                <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/>
                            </svg>
                            <h3>Add Vehicle</h3>
                        </button>
                    </div>
                </div>
                <p>Showing All Vehicles()</p>
                <div class="table-container">
                    <?php if(!empty($data['vehicles'])):?>
                    <table>
                        <thead>
                            <tr>
                                <th>Vehicle Image</th>
                                <th>Type</th>
                                <th>Model</th>
                                <th>Make</th>
                                <th>Availability</th>  
                                <th>Action</th>  

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['vehicles'] as $vehicle):?>
                            <tr>
                                <td>
                                    <?php if (!empty($vehicle->image_paths) && count($vehicle->image_paths) > 0): ?>
                                        <img src="<?= URLROOT . '/' . htmlspecialchars($vehicle->image_paths[0]); ?>" alt="Vehicle Image" width="100" height="100">
                                    <?php else: ?>
                                        No Image
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($vehicle->type); ?></td>
                                <td><?php echo htmlspecialchars($vehicle->model); ?></td>
                                <td><?php echo htmlspecialchars($vehicle->make); ?></td>
                                <td><?php echo htmlspecialchars($vehicle->availability); ?></td>
                                <td class="action-button">
                                    <!-- Edit Button -->
                                    <button class="vehicle-edit-btn" name="vehicle-edit-btn"
                                        vehicleType="<?php echo htmlspecialchars($vehicle->type); ?>"
                                        vehicleModel="<?php echo htmlspecialchars($vehicle->model); ?>"
                                        vehicleMake="<?php echo htmlspecialchars($vehicle->make); ?>"
                                        seating_capacity="<?php echo htmlspecialchars($vehicle->seating_capacity); ?>"
                                        availability="<?php echo htmlspecialchars($vehicle->availability); ?>"
                                        licensePlateNumber="<?php echo htmlspecialchars($vehicle->license_plate_number); ?>"
                                        vehicleRate="<?php echo htmlspecialchars($vehicle->rate); ?>"
                                        fuelType="<?php echo htmlspecialchars($vehicle->fuel_type); ?>"
                                        description="<?php echo htmlspecialchars($vehicle->description); ?>"
                                        driver="<?php echo htmlspecialchars($vehicle->driver); ?>"
                                        vehicleCost="<?php echo htmlspecialchars($vehicle->cost); ?>"
                                        vehicleLocation="<?php echo htmlspecialchars($vehicle->location); ?>"
                                        vid="<?php echo htmlspecialchars($vehicle->vehicle_id); ?>">
                                        Edit
                                    </button>

                                    <form action="<?php echo URLROOT; ?>/transport_suppliers/delete_availability/<?php echo $vehicle->vehicle_id; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this vehicle?');">
                                        <button type="submit" class="delete-btn">Delete</button>
                                    </form>

                                    <a href="<?php echo URLROOT; ?>/transport_suppliers/details/<?php echo $vehicle->vehicle_id; ?>">
                                        <button class="vehicle-info-btn" name="vehicle-info-btn">View</button>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                    <?php else:?>
                        <p>No vehicles available.</p>
                    <?php endif;?>
                </div>
            </div>

            <?php include('AddForm.php'); ?>
        </main>
    </div>

</div>

    <?php
        include('UpdateVehicle.php');
    ?>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
    <script src="<?php echo URLROOT;?>/js/addVehicle.js"></script>
    <script src="<?php echo URLROOT;?>/js/editVehicle.js"></script>
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js"></script>
     
</body>

</html>
