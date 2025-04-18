<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventory.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/AddProduct.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>My Rentals</title>
</head>
<body>
<div class="box">
    <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/equipmentSupplierSidebar.php'; ?>
        <!-- End Of Sidebar -->
            <main>
                <div class="initial-container" id="inventoryContainer" style="display: flex;">
                    <div class="header">
                        <div class="left">
                            <h1>Rental Equipments</h1>
                        </div>
                        <div class="addBtn">
                            <button id="addRentalBtn">Add New</button>
                        </div>
                    </div>
           
                    <div class="Inventory">
                        <div>
                            <div class="header">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                                <h3>All Rental Products</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                            </div>

                            <div class="product-container">
                                <?php foreach ($data['rentals'] as $rental): ?>
                                    <a href="<?php echo URLROOT; ?>/product/viewProduct/<?php echo $rental->id; ?>" class="product-card-link">                        
                                        <div class="product-card">
                                            <div class="img">
                                                <img src="<?php echo URLROOT . '/' . $rental->image_path; ?>" alt="<?php echo $rental->product_name; ?>">
                                            </div>
                                            <div class="details">
                                                <h4><?php echo $rental->rental_name ?></h4>
                                                <h4><?php echo $rental->price_per_day ?></h4>
                                            </div>
                                            <div class="ratings">   
                                                <div class="star-rating">
                                                    <span class="star">&#9734;</span> <!-- Empty star -->
                                                    <span class="star">&#9734;</span> <!-- Empty star -->
                                                    <span class="star">&#9734;</span> <!-- Empty star -->
                                                    <span class="star">&#9734;</span> <!-- Empty star -->
                                                    <span class="star">&#9734;</span> <!-- Empty star -->
                                                </div>

                                                <div class="rating-count">
                                                    <h4><span>4.0/</span>5</h4>
                                                </div>
                                            </div> 
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="initial-container" id="addRentalContainer" style="display: none;">
                    <div class="header">
                            <div class="left">
                                <h1>Add Rental</h1>
                            </div>
                            <div class="backBtn">
                                <button id="backBtn">Back To Rentals</button>
                            </div>
                    </div>
           
                    <div class="AddProduct">
                    <!-- Basic Details Section -->
                        <div class="basic-details">
                            <h2>Basic Details</h2>
                            <div class="details">
                                    <div class="div">
                                        <div class="left">
                                        <form id="addRentalForm" action="<?php echo URLROOT; ?>/product/addProduct" method="POST" enctype="multipart/form-data">

                                            <label for="rentalName">Rental Name:</label>
                                            <input type="text" id="rentalName" name="rentalName" required>
                                            <span id="rentalName-error" class="error-message"></span>

                                            <label for="rentalType">Rental Type:</label>
                                            <select id="rentalType" name="rentalType" required>
                                                <option value="" disabled selected>Select a category</option>
                                                <?php
                                                if (isset($categories) && !empty($categories)) {
                                                    foreach ($categories as $category) {
                                                        echo "<option value='" . $category->category_name . "'>" . $category->category_name . "</option>";
                                                    }
                                                }
                                                ?>
                                                <!-- Add other types as needed -->
                                            </select>
                                            <span id="rentalType-error" class="error-message"></span>


                                            <label for="pricePerDay">Price per Day (LKR):</label>
                                            <input type="number" id="pricePerDay" name="pricePerDay" min="0" step="0.01" required>
                                            <span id="pricePerDay-error" class="error-message"></span>
                                        </div>

                                        <div class="right">
                                            <label for="maximumRentalPeriod">Maximum Rental Period (days):</label>
                                            <input type="number" id="maximumRentalPeriod" name="maximumRentalPeriod" min="1">
                                            <span id="maximumRentalPeriod-error" class="error-message"></span>

                                            <label>Delivery Available:</label>
                                            <div class="group">
                                                <input type="radio" id="deliveryYes" name="deliveryAvailable" value="yes">
                                                <label for="deliveryYes">Yes</label>

                                                <input type="radio" id="deliveryNo" name="deliveryAvailable" value="no" checked>
                                                <label for="deliveryNo">No</label>
                                            </div>
                                            <span id="maximumRentalPeriod-error" class="error-message"></span>


                                        </div>
                                    </div>

                                    <div class="bottom">
                                        <label for="rentalDescription">Description:</label>
                                        <textarea id="rentalDescription" name="rentalDescription" rows="6" cols="50" required></textarea>
                                    </div>
                                    <span id="rentalDescription-error" class="error-message"></span>

                                </div>
                            </div>
                            <!-- Image Upload Section -->
                            <div class="image-upload">
                                <h2>Upload Images</h2>
                                <div class="details">
                                    <label for="image">Choose upto 6 images</label>
                                    <input type="file" id="image" name="image[]" accept="image/*" multiple required>
                                    <span id="image-error" class="error-message"></span>
                                </div>

                                <div class="image-container" id="image-container">
                                    <img id="image-preview" src="" alt="Image Preview" style="display:none; max-width: 100%; max-height: 300px;">
                                </div>
                                
                            </div>

                        <!-- Policies Section -->
                            <div class="policies">
                                <div class="details">
                                    <h2>Policies</h2>
                                    <br>
                                    <label for="returnPolicy">Return Policy:</label>
                                    <select id="returnPolicy" name="returnPolicy" required>
                                        <option value="noReturn">No return policies</option>
                                        <option value="fullRefund">Full refund</option>
                                        <option value="partialRefund">Partial refund</option>
                                        <option value="bothRefunds">Both full and partial refund</option>
                                    </select>
                                    <span id="returnPolicy-error" class="error-message"></span>

                                    <br><br>

                                    <!-- Full Refund Time -->
                                    <div id="fullRefundSection" style="display: none;">
                                        <h4>Full refund:</h4>
                                        <label for="fullRefundTime">Cancel Time (hours before pickup for full refund):</label>
                                        <select id="fullRefundTime" name="fullRefundTime" required>
                                            <option value="12">12 hours</option>
                                            <option value="24">24 hours</option>
                                            <option value="36">36 hours</option>
                                            <option value="48">48 hours</option>
                                        </select>
                                        <span id="fullRefundTime-error" class="error-message"></span>

                                    </div>

                                    <!-- Partial Refund Time -->
                                    <div id="partialRefundSection" style="display: none;">
                                        <h4>Partial refund:</h4>
                                        <div>
                                            <div class="div">
                                                <label for="partialRefundTime">Cancel Time (hours before pickup for partial refund):</label>
                                                <select id="partialRefundTime" name="partialRefundTime" required>
                                                    <option value="12">12 hours</option>
                                                    <option value="24">24 hours</option>
                                                    <option value="36">36 hours</option>
                                                    <option value="48">48 hours</option>
                                                </select>
                                                <span id="partialRefundTime-error" class="error-message"></span>

                                            </div>
                                            <div>
                                                <label for="partialRefundPercentage">Partial Refund Percentage:</label>
                                                <input type="number" id="partialRefundPercentage" name="partialRefundPercentage" min="0" max="100" step="10">
                                                <span id="partialRefundPercentage-error" class="error-message"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <label for="damagePolicy">Damage Policy:</label>
                                    <textarea id="damagePolicy" name="damagePolicy" rows="4" cols="50" required></textarea>
                                    <span id="damagePolicy-error" class="error-message"></span>

                                    <div class="btn">
                                        <button type="submit" id = "addRentalBtn" class="addRentalBtn">Add Equipment</button>
                                        <div id="loadingSpinner" style="display: none;">
                                            <img src="spinner.gif" alt="Loading..." width="30">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </main>

    </div>

    <script src="<?php echo URLROOT;?>/js/EquipmentSupplierJS/AddRentalBtn.js"></script>
    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script> 
    <script> const URLROOT = "<?php echo URLROOT; ?>"; </script>
    <!-- <script src="<?php echo URLROOT;?>/js/Productpage.js" ></script>  -->
    
</body>

</html>
