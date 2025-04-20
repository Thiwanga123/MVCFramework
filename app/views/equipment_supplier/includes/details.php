<?php
$details = $data['rental'];
$imagePaths = explode(',', $details->image_paths);
?>
<div class="details-container">

    <!-- Image Upload Form -->
    <h2>Update Equipment Images</h2>
    <form method="POST" action="submit-product-images.php" enctype="multipart/form-data" class="form1">
        <div class="image-section">
            <div class="form-section">
                <div class="left">
                    <div class="image-top">
                        <button type="button" class="change-image" onclick="previousImage()">&#9664;</button>
                        <img src="<?php echo URLROOT . '/' . $imagePaths[0]; ?>" id="mainImage" alt="Main Image">
                        <button type="button" class="change-image" onclick="nextImage()">&#9654;</button>
                    </div>
                    <div class="image-bottom">
                        <?php foreach ($imagePaths as $imagePath): ?>
                            <div class="image-thumbnail">
                                <img src="<?php echo URLROOT . '/' . trim($imagePath); ?>" onclick="changeMainImage('<?php echo URLROOT . '/' . trim($imagePath); ?>')">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="right">
                    <label for="newImages">Upload New Images</label>
                    <input type="file" name="new_images[]" id="newImages" multiple accept="image/*">
                    <button type="submit">Update Images</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Equipment Details Form -->
    <form method="POST" action="submit-product-details.php">
        <h2>Update Equipment Details</h2>
        <div class="form-section">
            <div class="left">
                <label>Rental Name</label>
                <input type="text" name="rental_name" value="<?php echo htmlspecialchars($details->rental_name); ?>">

                <label>Price (Per day)</label>
                <input type="number" name="price_per_day" value="<?php echo htmlspecialchars($details->price_per_day); ?>">

                <label>Category</label>
                <input type="text" name="category_name" value="<?php echo htmlspecialchars($details->category_name); ?>">

                <label>Maximum Rental Period</label>
                <input type="number" name="maximum_rental_period" value="<?php echo htmlspecialchars($details->maximum_rental_period); ?>">

                <label>Delivery Available</label>
                <label><input type="radio" name="delivery_available" value="yes" <?php echo ($details->delivery_available === 'yes') ? 'checked' : ''; ?>> Yes</label>
                <label><input type="radio" name="delivery_available" value="no" <?php echo ($details->delivery_available === 'no') ? 'checked' : ''; ?>> No</label>
            </div>

            <div class="right">
                <label>Description</label>
                <textarea name="rental_description" rows="4"><?php echo htmlspecialchars($details->rental_description); ?></textarea>

                <label>Return Policy</label>
                <select name="return_policy" id="return_policy">
                    <option value="noReturn" <?php echo ($details->return_policy == 'noReturn') ? 'selected' : ''; ?>>No return policies</option>
                    <option value="fullRefund" <?php echo ($details->return_policy == 'fullRefund') ? 'selected' : ''; ?>>Full refund</option>
                    <option value="partialRefund" <?php echo ($details->return_policy == 'partialRefund') ? 'selected' : ''; ?>>Partial refund</option>
                    <option value="bothRefunds" <?php echo ($details->return_policy == 'bothRefunds') ? 'selected' : ''; ?>>Both full and partial refund</option>
                </select>

                <div id="fullRefundSection" style="display: none;">
                    <label>Full Refund Time</label>
                    <select name="full_refund_time">
                        <?php foreach ([12, 24, 36, 48] as $val): ?>
                            <option value="<?php echo $val; ?>" <?php echo ($details->full_refund_time == $val) ? 'selected' : ''; ?>><?php echo $val; ?> hours</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div id="partialRefundSection" style="display: none;">
                    <label>Partial Refund Time</label>
                    <select name="partial_refund_time">
                        <?php foreach ([12, 24, 36, 48] as $val): ?>
                            <option value="<?php echo $val; ?>" <?php echo ($details->partial_refund_time == $val) ? 'selected' : ''; ?>><?php echo $val; ?> hours</option>
                        <?php endforeach; ?>
                    </select>

                    <label>Partial Refund Percentage</label>
                    <input type="number" name="partial_refund_percentage" min="0" max="100" step="5" value="<?php echo htmlspecialchars($details->partial_refund_percentage); ?>">
                </div>

                <label>Damage Policy</label>
                <textarea name="damage_policy" rows="4"><?php echo htmlspecialchars($details->damage_policy); ?></textarea>

                <button type="submit">Update Details</button>
            </div>
        </div>
    </form>
</div>