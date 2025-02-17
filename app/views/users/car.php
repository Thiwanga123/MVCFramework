<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/features.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <title>Vehicles</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/features.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <title>Vehicles</title>
</head>
<body>
    <!-- SideBar -->
     <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
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
            <p>Hii Welcome <?php echo isset($_SESSION['name']) ? ' ' . htmlspecialchars($_SESSION['name']) : ''; ?> </p>
            <a href="#" class="profile">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>

        <?php require APPROOT . '/views/inc/components/topbar.php'; ?>
           
        
        <section id = "features" class="features">

<div class="container1">
<div class="feature">
    <div class="vehicle-container">
    <?php if (empty($vehicles)): ?>
        <p class="no-vehicles">Currently no cars available</p>
    <?php else: ?>
        <?php foreach ($vehicles as $vehicle): ?>
            <div class="vehicle-card">
                <div class="vehicle-image">
                    <?php if (!empty($vehicle->image_path)): ?>
                        <img src="<?php echo URLROOT . '/' . $vehicle->image_path; ?>" alt="Vehicle Image">
                    <?php else: ?>
                        <img src="<?php echo URLROOT; ?>/Images/default_profile.png" alt="Default Image">
                    <?php endif; ?>
                </div>
                <div class="vehicle-details">
                    <h3><?php echo $vehicle->model; ?> (<?php echo $vehicle->make; ?>)</h3>
                    <p><strong>Type:</strong> <?php echo $vehicle->type; ?></p>
                    <p><strong>Rental Price:</strong> Rs. <?php echo $vehicle->rate; ?> per day</p>
                    <p><strong>License Number:</strong> <?php echo $vehicle->license_plate_number; ?></p>
                    <p><strong>Driver Availability:</strong> <?php echo $vehicle->driver; ?></p>
                    <p><strong>Vehicle Availability:</strong> <?php echo $vehicle->availability; ?></p>
                </div>
                <div class="vehicle-actions">
                    <button class="vehicle-edit-btn" 
                        vehicleType="<?php echo $vehicle->type; ?>"
                        vehicleModel="<?php echo $vehicle->model; ?>"
                        vehicleMake="<?php echo $vehicle->make; ?>"
                        vehicleRate="<?php echo $vehicle->rate; ?>"
                        licensePlateNumber="<?php echo $vehicle->license_plate_number; ?>"
                        driver="<?php echo $vehicle->driver; ?>"
                        availability="<?php echo $vehicle->availability; ?>"
                        fuelType="<?php echo $vehicle->fuel_type; ?>"
                        description="<?php echo $vehicle->description; ?>"
                        vid="<?php echo $vehicle->id; ?>">
                        Edit
                    </button>
                    <a href="<?php echo URLROOT; ?>/transport_suppliers/delete_availability/<?php echo $vehicle->id; ?>">
                        <button class="delete-btn" onclick="return confirm('Are you sure?');">
                            Delete
                        </button>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</div>
<div class="feature">
    <img src="<?php echo URLROOT;?>/images/vehicle.jpeg" alt="vehicle ">
    <h3>Traveling Vehicle</h3>
    <p>NW BDC-2090</p>
    <br>
    <p>Price:Rs.10,000 per Day</p>
    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
    border-radius: 30px;
    border: none;
    margin-top: 1rem;
    cursor: pointer;
    padding: 0 10px;
    transition: all 0.3s ease;">Book & Pay Now</button></a>

</div>
<div class="feature">
    <img src="<?php echo URLROOT;?>/images/vehicle.jpeg" alt="vehicle ">
    <h3>Traveling Vehicle</h3>
    <p>NW BDC-2090</p>
    <br>
    <p>Price:Rs.10,000 per Day</p>
    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
    border-radius: 30px;
    border: none;
    margin-top: 1rem;
    cursor: pointer;
    padding: 0 10px;
    transition: all 0.3s ease;">Book & Pay Now</button></a>

</div>
<div class="feature">
    <img src="<?php echo URLROOT;?>/images/vehicle.jpeg" alt="vehicle ">
    <h3>Traveling Vehicle</h3>
    <p>NW BDC-2090</p>
    <br>
    <p>Price:Rs.10,000 per Day</p>
    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
    border-radius: 30px;
    border: none;
    margin-top: 1rem;
    cursor: pointer;
    padding: 0 10px;
    transition: all 0.3s ease;">Book & Pay Now</button></a>

</div>
<div class="feature">
    <img src="<?php echo URLROOT;?>/images/vehicle.jpeg" alt="vehicle ">
    <h3>Traveling Vehicle</h3>
    <p>NW BDC-2090</p>
    <br>
    <p>Price:Rs.10,000 per Day</p>
    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
    border-radius: 30px;
    border: none;
    margin-top: 1rem;
    cursor: pointer;
    padding: 0 10px;
    transition: all 0.3s ease;">Book & Pay Now</button></a>

</div>
<div class="feature">
    <img src="<?php echo URLROOT;?>/images/vehicle.jpeg" alt="vehicle ">
    <h3>Traveling Vehicle</h3>
    <p>NW BDC-2090</p>
    <br>
    <p>Price:Rs.10,000 per Day</p>
    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
    border-radius: 30px;
    border: none;
    margin-top: 1rem;
    cursor: pointer;
    padding: 0 10px;
    transition: all 0.3s ease;">Book & Pay Now</button></a>

</div>
<div class="feature">
    <img src="<?php echo URLROOT;?>/images/vehicle.jpeg" alt="vehicle ">
    <h3>Traveling Vehicle</h3>
    <p>NW BDC-2090</p>
    <br>
    <p>Price:Rs.10,000 per Day</p>
    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
    border-radius: 30px;
    border: none;
    margin-top: 1rem;
    cursor: pointer;
    padding: 0 10px;
    transition: all 0.3s ease;">Book & Pay Now</button></a>

</div>
<div class="feature">
    <img src="<?php echo URLROOT;?>/images/vehicle.jpeg" alt="vehicle ">
    <h3>Traveling Vehicle</h3>
    <p>NW BDC-2090</p>
    <br>
    <p>Price:Rs.10,000 per Day</p>
    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
    border-radius: 30px;
    border: none;
    margin-top: 1rem;
    cursor: pointer;
    padding: 0 10px;
    transition: all 0.3s ease;">Book & Pay Now</button></a>

</div>


          </main>
     </div>

     
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>

</body>

</html>
