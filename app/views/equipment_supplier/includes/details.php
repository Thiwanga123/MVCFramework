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
<form id="updateProductForm" method="POST" action="<?php echo URLROOT; ?>/product/updateProduct">
    <div class="form-section">
        <div class="left-details">
            <input type="hidden" name="rental_id" value="<?php echo htmlspecialchars($details->id); ?>">
            
            <label>Rental Name</label>
            <input type="text" name="rental_name" value="<?php echo htmlspecialchars($details->rental_name); ?>" id="rental_name">
            <span id="rental_name-error" class="error-message"></span>

            <label>Price (Per day)</label>
            <input type="number" name="price_per_day" value="<?php echo htmlspecialchars($details->price_per_day); ?>" id="price_per_day">
            <span id="price_per_day-error" class="error-message"></span>

            <label>Category</label>
            <select name="category_name" id="category_name">
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo htmlspecialchars($category->category_name); ?>"
                        <?php echo ($details->category_name == $category->category_name) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category->category_name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <span id="category_name-error" class="error-message"></span>

            <label>Maximum Rental Period</label>
            <input type="number" name="maximum_rental_period" value="<?php echo htmlspecialchars($details->maximum_rental_period); ?>" id="maximum_rental_period">
            <span id="maximum_rental_period-error" class="error-message"></span>

            <label>Delivery Available</label>
            <label><input type="radio" name="delivery_available" value="yes" id="delivery_yes" <?php echo ($details->delivery_available === 'yes') ? 'checked' : ''; ?>> Yes</label>
            <label><input type="radio" name="delivery_available" value="no" id="delivery_no" <?php echo ($details->delivery_available === 'no') ? 'checked' : ''; ?>> No</label>
            <span id="delivery_available-error" class="error-message"></span>
        </div>

        <div class="right-details">
            <label>Description</label>
            <textarea name="rental_description" id="rental_description" rows="4"><?php echo htmlspecialchars($details->rental_description); ?></textarea>
            <span id="rental_description-error" class="error-message"></span>

            <label>Return Policy</label>
            <select name="return_policy" id="return_policy">
                <option value="noReturn" <?php echo ($details->return_policy == 'noReturn') ? 'selected' : ''; ?>>No return policies</option>
                <option value="fullRefund" <?php echo ($details->return_policy == 'fullRefund') ? 'selected' : ''; ?>>Full refund</option>
                <option value="partialRefund" <?php echo ($details->return_policy == 'partialRefund') ? 'selected' : ''; ?>>Partial refund</option>
                <option value="bothRefunds" <?php echo ($details->return_policy == 'bothRefunds') ? 'selected' : ''; ?>>Both full and partial refund</option>
            </select>
            <span id="return_policy-error" class="error-message"></span>

            <label>Damage Policy</label>
            <textarea name="damage_policy" id="damage_policy" rows="4"><?php echo htmlspecialchars($details->damage_policy); ?></textarea>
            <span id="damage_policy-error" class="error-message"></span>
        </div>
    </div>

    <button type="button" id="updateBtn">Update Details</button>
</form>
</div>





<script>
    document.getElementById('updateBtn').addEventListener('click', async function(event) {
        event.preventDefault();

        document.getElementById('updateBtn').disabled = true;
        const formData = new FormData(document.getElementById('updateProductForm'));

        try {
            const response = await fetch('<?php echo URLROOT; ?>/product/updateProduct', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            document.getElementById('updateBtn').disabled = false;
            const errorElements = document.querySelectorAll('.error-message');
            errorElements.forEach(errorElement => errorElement.innerText = '');

            if (data.errors) {
                for (const field in data.errors) {
                    const errorMessage = data.errors[field];
                    const errorElement = document.getElementById(`${field}-error`);
                    if (errorElement) {
                        errorElement.innerText = errorMessage;
                    }
                }

                if (data.errors.general) {
                    alert(data.errors.general);
                }
            }else{
                // If successful, handle the response
                alert('Details updated successfully!');
                window.location.reload();
                // Optionally, redirect or update the page with the new data
                }
        } catch (error) {
            // Handle any errors that occur during the fetch
            console.error('Error:', error);
            document.getElementById('updateBtn').disabled = false;
        }
    });
</script>
