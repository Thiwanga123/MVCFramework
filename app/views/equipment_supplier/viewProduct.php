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
        <!-- <div class="breadcrumb">
            <a href="<?php echo URLROOT; ?>">Home</a> / <span><?php echo $product->rentalName; ?></span>
        </div> -->
        <hr>

        <div class="product-container">
            <!-- Left: Image Gallery -->
            <div class="image-section">
                <img id="main-image" src="<?php echo URLROOT . '/uploads/' . $product->images[0]; ?>" alt="Main Product Image">
                <div class="thumbnail-gallery">
                    <?php foreach ($product->images as $image) : ?>
                        <img class="thumbnail" src="<?php echo URLROOT . '/uploads/' . $image; ?>" alt="Thumbnail">
                    <?php endforeach; ?>
                </div>
            </div>
   
            <div class="details-section">
                <h1><?php echo $product->rentalName; ?></h1>
                <p class="category">Category: <strong><?php echo $product->rentalType; ?></strong></p>
                <p class="price">Price per Day: <strong>LKR <?php echo number_format($product->pricePerDay, 2); ?></strong></p>
                <p class="description"><?php echo nl2br($product->rentalDescription); ?></p>

                <h2>Rental Details</h2>
                <ul>
                    <li>Maximum Rental Period: <strong><?php echo $product->maximumRentalPeriod; ?> days</strong></li>
                    <li>Delivery Available: <strong><?php echo $product->deliveryAvailable === 'yes' ? 'Yes' : 'No'; ?></strong></li>
                </ul>

                <h2>Policies</h2>
                <p><strong>Return Policy:</strong> <?php echo ucfirst(str_replace('Refund', ' Refund', $product->returnPolicy)); ?></p>
                <p><strong>Damage Policy:</strong> <?php echo nl2br($product->damagePolicy); ?></p>

                <button class="rent-now-btn">Rent Now</button>
            </div> 
        </div>
    </main>

    </div>

    <script>
        // Image Preview Change
        document.querySelectorAll('.thumbnail').forEach(item => {
            item.addEventListener('click', event => {
                document.getElementById('main-image').src = event.target.src;
            });
        });
    </script>
</body>
</html>