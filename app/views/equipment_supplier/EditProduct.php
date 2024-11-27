
<div id="editProductModal" class="modal-container">
    <div class="modal">
        <div class="modal-top">
            <h1>Edit Product</h1>
            <span class="close" id="closeModal">&times;</span>
        </div>  

        <div class="modal-form">
            <form id="editProductForm" action="<?php echo URLROOT; ?>/product/updateProduct" method = "post" enctype="multipart/form-data"> 
                <div class="body">
                    <div class="left">
                        <label for="productId">Product Id</label>
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

                        <label for="productName">Product Name</label>
                        <input type="text" id="productName" name="productName" value=value="<?php echo $product['product_name']; ?>" required>
                
                        <label for="productRate">Rate</label>
                        <input type="text" id="productRate" name="productPrice" value= value="<?php echo $product['rate']; ?>" required>
                
                        <label for="productCategory">Category:</label>
                        <select id="productCategory" name="productCategory" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option value="" disabled selected>Select a category</option>
                                <option value="Camping & Outdoor Gear">Camping & Outdoor Gear</option>
                                <option value="Luggage & Bags">Luggage & Bags</option>
                                <option value="Music & Entertainment">Music & Entertainment</option>
                                <option value="Photography & Videography Gear">Photography & Videography Gear</option>
                         </select>

                        <label for="stockQuantity">Stock Quantity</label>
                        <input type="number" id="stockQuantity" name="stockQuantity" min="1" max="15" value="1" required>
                            
                    </div>

                    <div class="right">
                        <label for="productDescription">Description</label>
                        <textarea id="productDescription" name="productDescription" rows="9" required></textarea>
                            
                        <label for="productImage">Product Images (Select upto 5 images)</label>
                        <div id="uploadImagesContainer">
                                <svg id="uploadImagesIcon" style= "cursor:pointer;" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-200h80v-167l64 64 56-57-160-160-160 160 57 56 63-63v167ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z"/></svg>
                                <input type="file" id="productImage"  accept="image/*"  name="productImages[]" multiple style="background-color: white; display: none" required>  
                                <p id="imageCount" style="margin-top: 0.5rem;">No images selected</p>
                        </div>
                           <!-- <div id="imagePreviewContainer"  style="display: flex; flex-wrap: wrap;"></div> -->
            
                    </div>
                </div>

                <div class="submit-btn">
                    <button type="submit" name="submit">Add Product</button>
                </div>
            </form>
        </div> 
    </div>
</div>
    