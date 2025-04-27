<?php
$details = $data['details'];
$imagePaths = explode(',', $details->image_paths);
?>

<div class="details-container">
    <button class="delete-item-btn" id="delete-item-btn"  data-product-id = "<?php echo htmlspecialchars($details->id); ?>">Delete Item</button>
        <div class="image-section">
            <div class="form-section">
                <div class="image-container">
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
            </div>
        </div>

    <!-- Equipment Details Form -->
        <h2>Update Equipment Details</h2>
        <form method="POST" action="<?php echo URLROOT; ?>/product/updateProduct">
        <div class="form-section">
            <div class="left-details">
                <input type="hidden" name="rental_id" value="<?php echo htmlspecialchars($details->id); ?>">
                
                <label>Rental Name</label>
                <input type="text" name="rental_name" value="<?php echo htmlspecialchars($details->rental_name); ?>">
                <?php if (isset($data['errors']['rental_name'])): ?>
                    <span class="error"><?php echo $data['errors']['rental_name']; ?></span>
                <?php endif; ?>

                <label>Price (Per day)</label>
                <input type="number" name="price_per_day" value="<?php echo htmlspecialchars($details->price_per_day); ?>">
                <?php if (isset($data['errors']['price_per_day'])): ?>
                    <span class="error"><?php echo $data['errors']['price_per_day']; ?></span>
                <?php endif; ?>

                <label>Category</label>
                <select name="category_name">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo htmlspecialchars($category->category_name); ?>"
                            <?php echo ($details->category_name == $category->category_name) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category->category_name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($data['errors']['category_name'])): ?>
                    <span class="error"><?php echo $data['errors']['category_name']; ?></span>
                <?php endif; ?>

                <label>Maximum Rental Period</label>
                <input type="number" name="maximum_rental_period" value="<?php echo htmlspecialchars($details->maximum_rental_period); ?>">
                <?php if (isset($data['errors']['maximum_rental_period'])): ?>
                    <span class="error"><?php echo $data['errors']['maximum_rental_period']; ?></span>
                <?php endif; ?>

                <label>Delivery Available</label>
                <label><input type="radio" name="delivery_available" value="yes" <?php echo ($details->delivery_available === 'yes') ? 'checked' : ''; ?>> Yes</label>
                <label><input type="radio" name="delivery_available" value="no" <?php echo ($details->delivery_available === 'no') ? 'checked' : ''; ?>> No</label>
                <?php if (isset($data['errors']['delivery_available'])): ?>
                    <span class="error"><?php echo $data['errors']['delivery_available']; ?></span>
                <?php endif; ?>
            </div>

            <div class="right-details">
                <label>Description</label>
                <textarea name="rental_description" rows="4"><?php echo htmlspecialchars($details->rental_description); ?></textarea>
                <?php if (isset($data['errors']['rental_description'])): ?>
                    <span class="error"><?php echo $data['errors']['rental_description']; ?></span>
                <?php endif; ?>

                <label>Return Policy</label>
                <select name="return_policy" id="return_policy">
                    <option value="noReturn" <?php echo ($details->return_policy == 'noReturn') ? 'selected' : ''; ?>>No return policies</option>
                    <option value="fullRefund" <?php echo ($details->return_policy == 'fullRefund') ? 'selected' : ''; ?>>Full refund</option>
                    <option value="partialRefund" <?php echo ($details->return_policy == 'partialRefund') ? 'selected' : ''; ?>>Partial refund</option>
                    <option value="bothRefunds" <?php echo ($details->return_policy == 'bothRefunds') ? 'selected' : ''; ?>>Both full and partial refund</option>
                </select>
                <?php if (isset($data['errors']['return_policy'])): ?>
                    <span class="error"><?php echo $data['errors']['return_policy']; ?></span>
                <?php endif; ?>

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
                    <?php if (isset($data['errors']['partial_refund_percentage'])): ?>
                        <span class="error"><?php echo $data['errors']['partial_refund_percentage']; ?></span>
                    <?php endif; ?>
                </div>

                <label>Damage Policy</label>
                <textarea name="damage_policy" rows="4"><?php echo htmlspecialchars($details->damage_policy); ?></textarea>
                <?php if (isset($data['errors']['damage_policy'])): ?>
                    <span class="error"><?php echo $data['errors']['damage_policy']; ?></span>
                <?php endif; ?>
            </div>
        </div>
        <button type="submit">Update Details</button>
    </form>
</div>