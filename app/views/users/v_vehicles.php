<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventorys.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/addVehicleModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/UpdateVehicleModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/userspage/supplierSection.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">
    <title>Vehicles</title>
</head>
<body>
    <div class="box" id ="box">

   <!-- SideBar -->
   <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
        <!-- End Of Sidebar -->
    
     <!-- End Of Sidebar -->

        <main>
        <div class="rental-container">
                            <div class="left">
                </div>

                <div class="right">
                <div class="filter">
                    <h1>Available Vehicles</h1>
                    <!-- Location Filter -->
                    <label for="locationFilter" style="margin-right: 10px;">Select your neearest district Location:</label>
                    <select id="locationFilter" style="padding: 5px;">
                        <option value="all">All Locations</option>
                        <?php if (!empty($vehicles)): ?>
                            <?php
                            $locations = array_unique(array_map(function($v) {
                                return $v->location;
                            }, $vehicles));
                            foreach ($locations as $loc): ?>
                                <option value="<?php echo htmlspecialchars($loc); ?>"><?php echo htmlspecialchars($loc); ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                
                </div>
            </div>

            <!-- Vehicle Cards Section -->
            <div class="container1">
                <?php if (empty($vehicles)): ?>
                    <p style="text-align: center; font-size: 24px; font-weight: bold;">Currently no vehicles available</p>
                <?php else: ?>
                    <?php foreach ($vehicles as $vehicle): ?>
                        <div class="equipment-card" data-location="<?php echo strtolower($vehicle->location); ?>" style="border: 1px solid #ddd; margin: 20px; padding: 15px; border-radius: 10px; width: 250px; display: inline-block; vertical-align: top;">
                            <div class="image-container">
                                <?php
                                $imagePaths = explode(',', $vehicle->images);
                                $firstImage = isset($imagePaths[0]) ? $imagePaths[0] : null;
                                ?>
                                <?php if ($firstImage): ?>
                                    <img src="<?php echo URLROOT . '/' . $firstImage; ?>" alt="Vehicle Image" style="width: 100%; border-radius: 10px;">
                                <?php else: ?>
                                    <p>No image available</p>
                                <?php endif; ?>
                            </div>
                            <div class="card-content" >
                                <p>Model: <?php echo $vehicle->model; ?></p>
                                <p>Make: <?php echo $vehicle->make; ?></p>
                                <p>location: <?php echo $vehicle->location; ?></p>
                                <p><strong>Rate:</strong> <?php echo $vehicle->rate; ?> / day</p>
                            </div>
                            <div class="bottom">
                            <a href="<?php echo URLROOT; ?>/users/viewVehicle/<?php echo $vehicle->vehicle_id; ?>">
                            <button class="pay-button">View & book</button>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js"></script>

    <!-- Location Filter Script -->
    <script>
    document.getElementById("locationFilter").addEventListener("change", function () {
        const selectedLocation = this.value.toLowerCase();
        const cards = document.querySelectorAll(".equipment-card");

        cards.forEach(card => {
            const location = card.getAttribute("data-location");

            if (selectedLocation === "all" || location === selectedLocation) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    });
    </script>


    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
    <script src="<?php echo URLROOT;?>/js/addVehicle.js"></script>
    <script src="<?php echo URLROOT;?>/js/editVehicle.js"></script>
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js"></script>
     
</body>

</html>
