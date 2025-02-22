<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/AddProduct.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/errorModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/successModal.css">

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
                            <textarea id="rentalDescription" name="rentalDescription" rows="4" cols="50" required></textarea>
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
                </form>
                </div>

            </div>
        </main>

     </div>

     <?php
        include('errorModal.php');
    ?>

    <?php   
        include('successModal.php')
    ?>
  
    <script> const URLROOT = "<?php echo URLROOT; ?>"; </script>
    
    <script src="<?php echo URLROOT;?>/js/Sidebar.js" ></script> 
    <script src="<?php echo URLROOT;?>/js/addProduct.js" ></script>
    <!-- <script src="<?php echo URLROOT;?>/js/editProduct.js" ></script> -->
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js" ></script> 
    <!-- <script src="<?php echo URLROOT;?>/js/Productpage.js" ></script>  -->
    

</body>

</html>
