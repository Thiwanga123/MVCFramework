<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/AddProduct.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/addProductModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/editProductModal.css">
    <title>Home</title>
</head>
<body>
    <div class="box" id="box">
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
            <a href="#" class="profile">
            <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="breadcrumb">
               
                <!-- <nav>
                    <ul>
                        <?php foreach ($data['breadcrumbs'] as $index => $breadcrumb): ?>
                            <?php if ($index < count($data['breadcrumbs']) - 1): ?>
                                <li><a href="<?php echo $breadcrumb['url']; ?>"><?php echo $breadcrumb['name']; ?></a></li>
                                <li class="separator">></li>
                            <?php else: ?>
                                <li><?php echo $breadcrumb['name']; ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </nav> -->
            </div>
            <hr>

            <div class="header">
                    <h1>Add Rental</h1>
            </div>
           
            <div class="AddProduct">
    <!-- Basic Details Section -->
    <div class="basic-details">
        <h2>Basic Details</h2>
        <div class="details">
                    
                        <div class="div">
                            <div class="left">
                            <form action="/submit-equipment" method="POST">

                                <label for="equipmentName">Equipment Name:</label>
                                <input type="text" id="equipmentName" name="equipmentName" required>

                                <label for="equipmentType">Equipment Type:</label>
                                <select id="equipmentType" name="equipmentType" required>
                                    <option value="bike">Bike</option>
                                    <option value="tent">Tent</option>
                                    <option value="gps">GPS</option>
                                    <option value="hikingGear">Hiking Gear</option>
                                    <!-- Add other types as needed -->
                                </select>

                                <label for="pricePerDay">Price per Day (LKR):</label>
                                <input type="number" id="pricePerDay" name="pricePerDay" min="0" step="0.01" required>
                            </div>

                            <div class="right">
                                <label for="minimumRentalPeriod">Minimum Rental Period (days):</label>
                                <input type="number" id="minimumRentalPeriod" name="minimumRentalPeriod" min="1">
                            
                                <label for="availability">Availability:</label>
                                <input type="checkbox" id="availability" name="availability" checked>
                                <label for="availability">Available for Rent</label>

                               </div>
                        </div>

                        <div class="bottom">
                        <label for="equipmentDescription">Description:</label>
                        <textarea id="equipmentDescription" name="equipmentDescription" rows="4" cols="50" required></textarea>
                            </div>
                    </div>
    </div>
    <!-- Image Upload Section -->
    <div class="image-upload">
        <div class="details">
            <h2>Upload Images</h2>
            <label for="image">Choose upto 6 images</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <div class="image-container" id="image-container">
        <img id="image-preview" src="" alt="Image Preview" style="display:none; max-width: 100%; max-height: 300px;">
    </div>
    </div>

    <!-- Policies Section -->
    <div class="policies">
        <div class="details">
            <h2>Rental Policies</h2>
            <label for="rentalPolicy">Rental Policy Description:</label>
            <textarea id="rentalPolicy" name="rentalPolicy" rows="4" cols="50" required></textarea>
            <br><br>

            <label for="depositRequired">Deposit Required:</label>
            <input type="checkbox" id="depositRequired" name="depositRequired">
            <label for="depositRequired">Yes, a deposit is required</label>
            <br><br>

            <label for="damagePolicy">Damage Policy:</label>
            <textarea id="damagePolicy" name="damagePolicy" rows="4" cols="50" required></textarea>
        
        <button type="submit">Add Equipment</button>
        </div>
        </form>
    </div>
</div>
  
    <script> const URLROOT = "<?php echo URLROOT; ?>"; </script>
    
    <script src="<?php echo URLROOT;?>/js/Sidebar.js" ></script> 
    <!-- <script src="<?php echo URLROOT;?>/js/addProduct.js" ></script> -->
    <!-- <script src="<?php echo URLROOT;?>/js/editProduct.js" ></script> -->
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js" ></script> 
    <!-- <script src="<?php echo URLROOT;?>/js/Productpage.js" ></script>  -->
    

</body>

</html>
