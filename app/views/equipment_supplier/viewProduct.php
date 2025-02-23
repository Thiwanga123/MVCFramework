<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/ProductDetails.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    
    <title>Product Details</title>
</head>
<body>
    <div class="box" id="box">
    <!-- SideBar -->
    <?php include('productSidebar.php'); ?>
    
    <!-- Main Content -->
    <main>

    <?php var_dump($rental) ?>;

        <div class="container">
        <form method="POST" action="submit-product-details.php">
            <div class="details-top">
                <div class="left">
                        <?php
                            $imagePaths = explode(',', $rental->image_paths);
                        ?>
                        <div class="image-top">
                            <button type="button" class="change-image" id="prevImage" onclick="previousImage()">
                                <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#e8eaed">
                                    <path d="M640-80 240-480l400-400 71 71-329 329 329 329-71 71Z"/>
                                </svg>
                            </button>

                            <img src="<?php echo URLROOT . '/' . $imagePaths[0]; ?>" alt="Main Image" id="mainImage">

                           <button type="button" class="change-image" id="nextImage" onclick="nextImage()">
                                <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#e8eaed">
                                    <path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z"/>
                                </svg>
                            </button>
                        </div>

                        <div class="image-bottom">
                             <?php foreach ($imagePaths as $imagePath): ?>
                                <div class="image-thumbnail">
                                    <img src="<?php echo URLROOT . '/' . $imagePath; ?>" alt="Thumbnail Image" onclick="changeMainImage('<?php echo URLROOT . '/' . $imagePath; ?>')">
                                </div>
                            <?php endforeach; ?>
                        </div>
                </div>
                <div class="right">
                <h2>Basic Details</h2>

                    <div class="product-details">
                        <label for="product-name">Rental Name</label>
                        <input type="text" id="product-name" name="product-name" value="<?php echo htmlspecialchars($rental->rental_name); ?> ">

                        <label for="product-price">Price (Per day)</label>
                        <input type="number" id="product-price" name="product-price" value="<?php echo htmlspecialchars($rental->price_per_day); ?>">

                        <label for="product-category">Category</label>
                        <input type="text" id="product-category" name="product-category" value="<?php echo htmlspecialchars($rental->category_name); ?>">

                        <label for="max-rental-period">Maximum Rental Period (Days)</label>
                        <input type="number" id="max-rental-period" name="max-rental-period" value="<?php echo htmlspecialchars($rental->maximum_rental_period); ?>">

                        <label for="delivery-available">Delivery Available</label>
                            <div>
                                <div class="group">
                                    <input type="radio" id="delivery-yes" name="delivery-available" value="yes" 
                                        <?php echo ($rental->delivery_available == 'yes') ? 'checked' : ''; ?>>
                                    <label for="delivery-yes">Yes</label>
                                </div>
                                <div class="group">
                                    <input type="radio" id="delivery-no" name="delivery-available" value="no" 
                                        <?php echo ($rental->delivery_available == 'no') ? 'checked' : ''; ?>>
                                    <label for="delivery-no">No</label>
                                </div>
                            </div>
                    </div>
                </div>    
            </div>
            <div class="bottom">
                <h2>Description</h2>
                    <label for="rentalDescription"></label>
                    <textarea id="rentalDescription" name="rentalDescription" rows="4" cols="50">
                        <?php echo htmlspecialchars(trim($rental->rental_description)); ?> 
                    </textarea>

                <h2>Policies</h2>
                <label for="returnPolicy">Return Policy:</label>
                        <select id="returnPolicy" name="returnPolicy" required>
                            <option value="noReturn" <?php echo ($rental->return_policy == 'noReturn') ? 'selected' : ''; ?>>No return policies</option>
                            <option value="fullRefund" <?php echo ($rental->return_policy == 'fullRefund') ? 'selected' : ''; ?>>Full refund</option>
                            <option value="partialRefund" <?php echo ($rental->return_policy == 'partialRefund') ? 'selected' : ''; ?>>Partial refund</option>
                            <option value="bothRefunds" <?php echo ($rental->return_policy == 'bothRefunds') ? 'selected' : ''; ?>>Both full and partial refund</option>
                        </select>

                <div id="fullRefundSection">
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
            </div>
        </form>
    </div>

    </main>

    </div>

    <script>
        let currentIndex = 0;
        const imagePaths = <?php echo json_encode(array_map(fn($path) => URLROOT . '/' . trim($path), $imagePaths)); ?>;

         function changeMainImage(imagePath) {
        document.getElementById('mainImage').src = imagePath;
        currentIndex = imagePaths.indexOf(imagePath); 
    }

    function previousImage() {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : imagePaths.length - 1;
        updateMainImage();
    }

    function nextImage() {
        currentIndex = (currentIndex < imagePaths.length - 1) ? currentIndex + 1 : 0;
        updateMainImage();
    }

    function updateMainImage() {
        document.getElementById('mainImage').src = imagePaths[currentIndex];
    }

    </script>
</body>
</html>