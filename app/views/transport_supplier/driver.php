<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventorys.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/addVehicleModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/UpdateVehicleModal.css">
    
    <title>Home</title>
</head>
<body>
    <div class="box" id ="box">

    <!-- SideBar -->
    <?php
        include('Sidebar.php');;
    ?>
    
     <!-- End Of Sidebar -->

     <!--Main Content-->
     <div class="content">
        <!--navbar-->
        
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
            <p><?php echo $_SESSION['name'];?></p>
            <a href="#" class="profile">
               <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>My Drivers</h1>
                </div>

                <div class="right">
                        <button class="add-btn" name ="vehicle-add-btn" id="vehicle-add-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                            <h3>Add Driver</h3>
                        </button>
                </div>
            </div>

            <div class="Inventory">
                <div>
                <div class="header">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M240-200v40q0 17-11.5 28.5T200-120h-40q-17 0-28.5-11.5T120-160v-320l84-240q6-18 21.5-29t34.5-11h440q19 0 34.5 11t21.5 29l84 240v320q0 17-11.5 28.5T800-120h-40q-17 0-28.5-11.5T720-160v-40H240Zm-8-360h496l-42-120H274l-42 120Zm-32 80v200-200Zm100 160q25 0 42.5-17.5T360-380q0-25-17.5-42.5T300-440q-25 0-42.5 17.5T240-380q0 25 17.5 42.5T300-320Zm360 0q25 0 42.5-17.5T720-380q0-25-17.5-42.5T660-440q-25 0-42.5 17.5T600-380q0 25 17.5 42.5T660-320Zm-460 40h560v-200H200v200Z"/></svg>
                    <h3>All Drivers</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                </div>
                <table>
                    <thead>
                        <tr>
                        <th>Driver Image</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Description</th>
                            <th>Availability</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($drivers)): ?>
    <tr>
        <td colspan="7" style="text-align: center; font-size: 24px; font-weight: bold;">
            Currently no drivers available
        </td>
    </tr>
<?php else: ?>
    <?php foreach ($drivers as $driver): ?>
    <tr>
        <td>
            <?php if (!empty($driver->image_path)): ?>
                <img src="<?php echo URLROOT . '/' . $driver->image_path; ?>" alt="Driver Image">
            <?php else: ?>
                <img src="<?php echo URLROOT; ?>/Images/default_profile.png" alt="Default Image">
            <?php endif; ?>
        </td>
        <td><?php echo $driver->name; ?></td>
        <td><?php echo $driver->gender; ?></td>
        <td><?php echo $driver->phone; ?></td>
        <td><?php echo $driver->email; ?></td>
        <td><?php echo $driver->description; ?></td>
        <td class="action-button">
            <button class="driver-edit-btn"
                driverName="<?php echo $driver->name; ?>"
                driverGender="<?php echo $driver->gender; ?>"
                driverPhone="<?php echo $driver->phone; ?>"
                driverEmail="<?php echo $driver->email; ?>"
                driverDescription="<?php echo $driver->description; ?>"
                driverId="<?php echo $driver->id; ?>">
                Edit
            </button>
            <a href="<?php echo URLROOT; ?>/drivers/delete/<?php echo $driver->id; ?>">
                <button class="delete-btn" onclick="return confirm('Are you sure?');">Delete</button>
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
     <!--Modal Structure-->

     <?php
        include('Addriver.php');;
    ?>

    <?php
        include('UpdateVehicle.php');
    ?>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
    <script src="<?php echo URLROOT;?>/js/addVehicle.js"></script>
    <script src="<?php echo URLROOT;?>/js/editVehicle.js"></script>
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js"></script>
     
</body>

</html> 