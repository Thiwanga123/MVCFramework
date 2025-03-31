<h2>Equipment Details</h2>
                        <div class="details-container">
                            <div class="details-top">
                                <div class="left">
                                    <!-- <?php
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
                                    </div> -->
                                </div>

                                <div class="right">
                                    <h2>Basic Details</h2>

                                    <div class="product-details">
                                        <p><strong>Rental Name:</strong> <?php echo htmlspecialchars($rental->rental_name); ?></p>

                                        <p><strong>Price (Per day):</strong> <?php echo htmlspecialchars($rental->price_per_day); ?> USD</p>

                                        <p><strong>Category:</strong> <?php echo htmlspecialchars($rental->category_name); ?></p>

                                        <p><strong>Maximum Rental Period (Days):</strong> <?php echo htmlspecialchars($rental->maximum_rental_period); ?></p>

                                        <p><strong>Delivery Available:</strong> 
                                            <?php echo ($rental->delivery_available == 'yes') ? 'Yes' : 'No'; ?>
                                        </p>
                                    </div>
                                </div>    
                            </div>

                            <div class="bottom">
                                <h2>Description</h2>
                                <p><?php echo nl2br(htmlspecialchars(trim($rental->rental_description))); ?></p>

                                <h2>Policies</h2>
                                <p><strong>Return Policy:</strong> 
                                    <?php 
                                        switch ($rental->return_policy) {
                                            case 'noReturn': echo 'No return policies'; break;
                                            case 'fullRefund': echo 'Full refund'; break;
                                            case 'partialRefund': echo 'Partial refund'; break;
                                            case 'bothRefunds': echo 'Both full and partial refund'; break;
                                        }
                                    ?>
                                </p>

                                <?php if ($rental->return_policy == 'fullRefund' || $rental->return_policy == 'bothRefunds'): ?>
                                    <div id="fullRefundSection">
                                        <h4>Full refund:</h4>
                                        <p><strong>Cancel Time (hours before pickup for full refund):</strong> <?php echo htmlspecialchars($rental->full_refund_time); ?> hours</p>
                                    </div>
                                <?php endif; ?>

                                <?php if ($rental->return_policy == 'partialRefund' || $rental->return_policy == 'bothRefunds'): ?>
                                    <div id="partialRefundSection">
                                        <h4>Partial refund:</h4>
                                        <p><strong>Cancel Time (hours before pickup for partial refund):</strong> <?php echo htmlspecialchars($rental->partial_refund_time); ?> hours</p>
                                        <p><strong>Partial Refund Percentage:</strong> <?php echo htmlspecialchars($rental->partial_refund_percentage); ?>%</p>
                                    </div>
                                <?php endif; ?>

                                <p><strong>Damage Policy:</strong> <?php echo nl2br(htmlspecialchars($rental->damage_policy)); ?></p>
                            </div>
                        </div>