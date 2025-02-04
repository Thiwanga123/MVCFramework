
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/common/productdetails.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/deleteWarningModal.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
            <div class="top">
                <div class="logo">
                    <a href="<?php echo URLROOT;?>/pages/home" class = "logo">
                    <img src="<?php echo URLROOT;?>/Images/Logo1.png">
                    <p>JOURNEY <br><span>BEYOND</span></p>
                </div>

                <div class="prof">
                    <a href="#" class="profile">
                    <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                    </a>
                </div>

            </div>

            <div class="content">
                <div class="details">
                    <h2>Product Details :</h2>

                    <form id="editProductForm" action="<?php echo URLROOT; ?>/product/updateProduct" method="POST">

                    <div class="actions">
                            <button class="edit" id="edit">Edit Product</button>
                            <button type="submit" class="save" id="save" style="display: none;">Save</button>
                            <button class="delete" id="delete" data-product-id="<?php echo $data['product']->product_id; ?>">Delete Product</button>

                        </div>

                        <div class="product-details">
                            <div class="left">
                                <div class="slider-container">
                                    <div class="slider">
                                        <?php if (!empty($data['product']->images)): ?>
                                            <?php foreach ($data['product']->images as $image): ?>
                                                <div class="slide">
                                                    <img src="<?php echo URLROOT . '/' . $image; ?>" alt="Product Image">
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <div class="slide">
                                                <img src="<?php echo URLROOT; ?>/Images/default_product.png" alt="Default Image">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                                    <button class="next" onclick="moveSlide(1)">&#10095;</button>
                                </div>
                            </div>

                            <div class="right">
                                <label for="productId">Product ID</label>
                                <input type="text" value="<?php echo $data['product']->product_id; ?>" readonly>

                                
            <label for="productName">Product Name</label>
            <input type="text" name="productName" value="<?php echo isset($_SESSION['old_input']['productName']) ? $_SESSION['old_input']['productName'] : $data['product']->product_name; ?>" 
                   <?php echo isset($_SESSION['errors']['nameError']) ? 'style="border-color: red;"' : ''; ?> 
                   <?php echo isset($_SESSION['errors']['nameError']) ? 'aria-invalid="true"' : ''; ?>>
            <?php if (isset($_SESSION['errors']['nameError'])): ?>
                <p style="color: red;"><?php echo $_SESSION['errors']['nameError']; ?></p>
            <?php endif; ?>

            <label for="productCategory">Category</label>
            <select id="productCategoryEdit" name="productCategory" required style="width: 100%; max-width: 300px; height: 40px;" 
                    <?php echo isset($_SESSION['errors']['categoryError']) ? 'style="border-color: red;"' : ''; ?>>
                <option disabled selected><?php echo isset($_SESSION['old_input']['productCategory']) ? $_SESSION['old_input']['productCategory'] : $data['product']->category_name; ?></option>
                <option value="Camping & Outdoor Gear" <?php echo (isset($_SESSION['old_input']['productCategory']) && $_SESSION['old_input']['productCategory'] == 'Camping & Outdoor Gear') ? 'selected' : ''; ?>>Camping & Outdoor Gear</option>
                <option value="Luggage & Bags" <?php echo (isset($_SESSION['old_input']['productCategory']) && $_SESSION['old_input']['productCategory'] == 'Luggage & Bags') ? 'selected' : ''; ?>>Luggage & Bags</option>
                <option value="Music & Entertainment" <?php echo (isset($_SESSION['old_input']['productCategory']) && $_SESSION['old_input']['productCategory'] == 'Music & Entertainment') ? 'selected' : ''; ?>>Music & Entertainment</option>
                <option value="Photography & Videography Gear" <?php echo (isset($_SESSION['old_input']['productCategory']) && $_SESSION['old_input']['productCategory'] == 'Photography & Videography Gear') ? 'selected' : ''; ?>>Photography & Videography Gear</option>
            </select>
            <?php if (isset($_SESSION['errors']['categoryError'])): ?>
                <p style="color: red;"><?php echo $_SESSION['errors']['categoryError']; ?></p>
            <?php endif; ?>

            <label for="stockQuantity">Stock Quantity</label>
            <input type="number" id="stockQuantityEdit" name="stockQuantity" min="1" max="15" value="<?php echo isset($_SESSION['old_input']['stockQuantity']) ? $_SESSION['old_input']['stockQuantity'] : $data['product']->quantity; ?>" required>
            <?php if (isset($_SESSION['errors']['quantityError'])): ?>
                <p style="color: red;"><?php echo $_SESSION['errors']['quantityError']; ?></p>
            <?php endif; ?>

            <label for="productDescription">Description</label>
            <textarea name="productDescription" <?php echo isset($_SESSION['errors']['descriptionError']) ? 'style="border-color: red;"' : ''; ?>><?php echo isset($_SESSION['old_input']['productDescription']) ? $_SESSION['old_input']['productDescription'] : $data['product']->description; ?></textarea>
            <?php if (isset($_SESSION['errors']['descriptionError'])): ?>
                <p style="color: red;"><?php echo $_SESSION['errors']['descriptionError']; ?></p>
            <?php endif; ?>

            <label for="productRate">Rate</label>
            <input type="text" name="productRate" value="<?php echo isset($_SESSION['old_input']['productRate']) ? $_SESSION['old_input']['productRate'] : $data['product']->rate; ?>" 
                   <?php echo isset($_SESSION['errors']['rateError']) ? 'style="border-color: red;"' : ''; ?>>
            <?php if (isset($_SESSION['errors']['rateError'])): ?>
                <p style="color: red;"><?php echo $_SESSION['errors']['rateError']; ?></p>
            <?php endif; ?>
                            </div>
                        </div>

                    </form>

                
                        <div class="reviews">

                        </div>

                        <div class="booking-history">
                            
                        </div>

                </div>
              
            </div>
        </div>

        <?php
        include('Warning_Modal.php');;
         ?>

        <script src="<?php echo URLROOT;?>/js/warningModel.js" ></script>  
        <script src="<?php echo URLROOT;?>/js/editProduct.js" ></script>  
        <script>const URLROOT = "<?php echo URLROOT; ?>";</script>


</body>
</html>