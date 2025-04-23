<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventorys.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/addVehicleModal.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/UpdateVehicleModal.css"> -->
    <title>Home</title>
</head>
<body>
    <div class="box">
        <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/vehiclesupplier_sidebar.php'; ?>
        <!-- End Of Sidebar -->
        <main>
            <div class="initial-container" id = "driverContainer">
                <div class="header">
                    <div class="left">
                        <h1>My Drivers</h1>
                    </div>
                    <div class="right">
                    <button class="add-btn" id="driver-add-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                                <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/>
                            </svg>
                            <h3>Add Driver</h3>
</button>
                    </div>
                </div>
                <p>Showing All drivers()</p>
                <div class="table-container">
                    <?php if(!empty($data['drivers'])):?>
                    <table>
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Driver License</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Description</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['drivers'] as $driver):?>
                            <tr>
                               
                                <td><?php echo htmlspecialchars($driver->name); ?></td>
                                <td><?php echo htmlspecialchars($driver->driverLicense); ?></td>
                                <td><?php echo htmlspecialchars($driver->phone); ?></td>
                                <td><?php echo htmlspecialchars($driver->email); ?></td>
                                <td><?php echo htmlspecialchars($driver->description); ?></td>
                                <td>
                                <button class="delete-btn" onclick="confirmDelete(<?php echo $driver->driverID; ?>)">Delete</button>
                                </td>
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

            <?php include('Addriver.php'); ?>

        </main>
    </div>

</div>


    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
    <script src="<?php echo URLROOT;?>/js/addDriver.js"></script>
    <script src="<?php echo URLROOT;?>/js/editVehicle.js"></script>
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js"></script>
     
</body>

</html>
