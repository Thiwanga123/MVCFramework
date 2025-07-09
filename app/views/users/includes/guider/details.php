<h2>Guider Details</h2>
    <div class="details-container">
        <div class="details-top">
            <div class="left">
            <?php
                                $imagePaths = explode(',', $guiders->images);
                                $firstImage = isset($imagePaths[0]) ? $imagePaths[0] : null;
                                ?>
                                <?php if ($firstImage): ?>
                                    <img src="<?php echo URLROOT . '/' . $firstImage; ?>" alt="Vehicle Image" style="width: 100%; border-radius: 10px;">
                                <?php else: ?>
                                    <p>No image available</p>
                                <?php endif; ?>
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
                    <p><strong>Name: </strong> <?php echo($guiders->name); ?></p>

                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($guiders->phone); ?></p>

                    <p><strong>Gender:</strong> <?php echo htmlspecialchars($guiders->gender); ?></p>

                    <p><strong>Email</strong> <?php echo htmlspecialchars($guiders->email); ?></p>
                    <p><strong>Daily Rates</strong> <?php echo htmlspecialchars($guiders->base_rate); ?></p>
                    <p><strong>Languages Can Spoken</strong> <?php echo htmlspecialchars($guiders->languages); ?></p>

                    <p><strong>Experience</strong> <?php echo htmlspecialchars($guiders->years_experience); ?></p>

                    <p><strong>Location</strong> <?php echo htmlspecialchars($guiders->address); ?></p>
                </div>
            </div>    
        </div>

    </div>