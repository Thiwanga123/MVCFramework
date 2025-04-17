<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/features.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventorys.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/UpdateVehicleModal.css">
    <title>Vehicles</title>
</head>
<body>
    <div class="box" id="box">
        <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
        <!-- End Of Sidebar -->

        <!-- Main Content -->
        <div class="content">

            <!-- Navbar -->
            <nav>
                <svg class="menu" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-269.23v-40h640v40H160ZM160-460v-40h640v40H160Zm0-190.77v-40h640v40H160Z"/></svg>
                <form action="#">
                    <div class="form-input">
                        <input type="search" placeholder="Search ..">
                        <button class="search-btn" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                        </button>
                    </div>
                </form>
                <a href="#" class="updates">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>
                    <span class="count">12</span>
                </a>
                <p>Hii Welcome <?php echo isset($_SESSION['name']) ? ' ' . htmlspecialchars($_SESSION['name']) : ''; ?> </p>
                <a href="#" class="profile">
                    <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                </a>
            </nav>

            <main>
                <?php require APPROOT . '/views/inc/components/search.php'; ?>
                <div class="header">
                    <div class="left">
                        <h1>My Vehicles</h1>
                    </div>
                </div>
                <div class="Inventory">
                    <div>
                        <div class="header">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M240-200v40q0 17-11.5 28.5T200-120h-40q-17 0-28.5-11.5T120-160v-320l84-240q6-18 21.5-29t34.5-11h440q19 0 34.5 11t21.5 29l84 240v320q0 17-11.5 28.5T800-120h-40q-17 0-28.5-11.5T720-160v-40H240Zm-8-360h496l-42-120H274l-42 120Zm-32 80v200-200Zm100 160q25 0 42.5-17.5T360-380q0-25-17.5-42.5T300-440q-25 0-42.5 17.5T240-380q0 25 17.5 42.5T300-320Zm360 0q25 0 42.5-17.5T720-380q0-25-17.5-42.5T660-440q-25 0-42.5 17.5T600-380q0 25 17.5 42.5T660-320Zm-460 40h560v-200H200v200Z"/></svg>
                            <h3>All Vehicles</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Vehicle Image</th>
                                    <th>Type</th>
                                    <th>Model</th>
                                    <th>Make</th>
                                    <th>Vehicle Number</th>
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
                                    <td colspan="12" style="text-align: center; font-size: 24px; font-weight: bold;">Currently no cars available</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($vehicles as $vehicle): ?>
                                <tr>
                                    <td>
                                        <?php
                                            $imagePaths = explode(',', $vehicle->images);
                                            $firstImage = isset($imagePaths[0]) ? $imagePaths[0] : null;
                                        ?>
                                        <?php if ($firstImage): ?>
                                            <img src="<?php echo URLROOT . '/' . $firstImage; ?>" alt="Vehicle Image" style="max-width: 200px;">
                                        <?php else: ?>
                                            <p>No image available</p>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $vehicle->type; ?></td>
                                    <td><?php echo $vehicle->model; ?></td>
                                    <td><?php echo $vehicle->make; ?></td>
                                    <td><?php echo $vehicle->license_plate_number; ?></td>
                                    <td><?php echo $vehicle->rate; ?></td>
                                    <td><?php echo $vehicle->driver; ?></td>
                                    <td><?php echo $vehicle->cost; ?></td>
                                    <td><?php echo $vehicle->description; ?></td>
                                    <td><?php echo $vehicle->availability; ?></td>
                                    <td><?php echo $vehicle->location; ?></td>
                                    <td class="action-button">
                                        <a href="<?php echo URLROOT; ?>/users/bookings">
                                            <button class="confirm-btn" name="confirm-btn" id="confirm-btn">Select</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table> 
                    </div> 
                </div>
            </main>
        </div>
    </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js"></script>
    <script>
document.getElementById("locationFilter").addEventListener("change", function () {
    const selectedLocation = this.value.toLowerCase();
    const rows = document.querySelectorAll("table tbody tr");

    rows.forEach(row => {
        const locationCell = row.cells[10]; // Vehicle Location column
        if (!locationCell) return;

        const vehicleLocation = locationCell.textContent.trim().toLowerCase();

        if (selectedLocation === "all" || vehicleLocation.includes(selectedLocation)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
});
</script>

</body>
</html>
