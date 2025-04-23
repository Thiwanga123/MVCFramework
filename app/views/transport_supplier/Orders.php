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
                        <h1>Bookings</h1>
                    </div>
                    <div class="right">
                    </div>
                </div>
                <p>Showing All Bookings()</p>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                            <th>Customer Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Pickup Location</th>
                            <th>Start Date</th>
                            <th>End Date</th>    
                            <th>Action</th>                        </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table> 
                   
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
