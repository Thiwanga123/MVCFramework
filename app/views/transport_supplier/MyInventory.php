<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventorys.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/addVehicleModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/UpdateVehicleModal.css">
    <title>Home</title>
</head>
<body>
    <div class="box">
        <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/vehiclesupplier_sidebar.php'; ?>
        <!-- End Of Sidebar -->
        <main>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['vehicles'] as $vehicle):?>
                            <tr>
                                <td>
                                    <?php if (!empty($vehicle->image_path)): ?>
                                        <img src="<?= URLROOT . '/' . htmlspecialchars($vehicle->image_path); ?>" alt="Product Image" width="100" height="100">
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
                                    <button class="vehicle-edit-btn" name="vehicle-edit-btn" id="vehicle-edit-btn"
                                        vehicleType="<?php echo $vehicle->type; ?>"
                                        vehicleModel="<?php echo $vehicle->model; ?>"
                                        vehicleMake="<?php echo $vehicle->make; ?>"
                                        availability="<?php echo $vehicle->availability; ?>"
                                        licensePlateNumber="<?php echo $vehicle->license_plate_number; ?>"
                                        vehicleRate="<?php echo $vehicle->rate; ?>"
                                        fuelType="<?php echo $vehicle->fuel_type; ?>"
                                        description="<?php echo $vehicle->description; ?>"
                                        driver="<?php echo $vehicle->driver; ?>"
                                        vehicleCost="<?php echo $vehicle->cost; ?>"
                                        availability="<?php echo $vehicle->availability; ?>"
                                        vehicleLocation="<?php echo $vehicle->location; ?>"
                                        vid="<?php echo $vehicle->id; ?>"
                                        onclick="window.location.href='<?php echo URLROOT; ?>transport_suppliers/editVehicle<?php echo $vehicle->id; ?>';">
                                        Edit
                                    </button>
                                    <a href="<?php echo URLROOT; ?>/transport_suppliers/delete_availability/<?php echo $vehicle->id; ?>">
                                        <button class="delete-btn" onclick="return confirm('Are you sure?');" name="delete-btn" id="delete-btn">
                                            Delete
                                        </button>
                                    </a>
                                    <form action="/MVCFramework/transport_suppliers/details" method="get">
  <button type="submit" name="vehicle-info-btn" class="vehicle-info-btn">View Details</button>
</form>


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
