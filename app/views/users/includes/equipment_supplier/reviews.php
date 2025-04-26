<!-- <?php var_dump($_SESSION); ?> -->
       <div class="reviews">
             <div class="top">
                <div class="total">
                    <h2>Total Reviews</h2>
                    <p><?php echo htmlspecialchars($data['reviewCount']); ?></p>
                </div>
                <div class="average">
                    <h2>Average Rating</h2>
                    <div class="inside">
                        <h2><?php echo htmlspecialchars($data['averageRating']); ?></h2>
                        <div class="stars">
                            <span></span>
                        </div>
                    </div>
                </div>

                <?php  
                    $ratingMap = [];
                    foreach ($ratings as $row) {
                        $ratingMap[$row->rating] = $row->total;
                    }
                ?>

                <div class="ratings" id="rating-container">
                    <?php 
                        for($i = 5; $i >= 1; $i--):
                            $count = isset($ratingMap[$i]) ? $ratingMap[$i] : 0;
                            $widthPercent = $reviewCount > 0 ? ($count / $reviewCount) * 100 : 0;
                            $label = $i === 1 ? '1 Star' : "{$i} Stars";
                    ?>
                    <div class="rating-bar">
                        <div class="rating-label"><?= $label ?></div>
                        <div class="bar-container">
                            <div class="bar-fill" style="width: <?= $widthPercent ?>%"></div>
                        </div>
                        <div class="rating-count">(<?= $count ?>)</div>
                    </div>
                    <?php endfor; ?>
                </div>
             </div>
             
             <div class="addReviews">
                <?php if(isset($data['userReview'])) :?>
                    <h4>My Review </h4>
                    <div class="my-card">
                        <div class="my-card-top">
                            <div class="left">
                                <img src="<?php echo URLROOT; ?>/Images/profile.png" class="profile-pic">
                                <div class="info">
                                    <div class="name"><?php echo htmlspecialchars($data['userReview']->name); ?></div>
                                    <div class="date"><?php echo htmlspecialchars($data['userReview']->created_at); ?></div>
                                </div>
                            </div>
                            <div class="right-side">
                                <div class="starRating"><?php echo htmlspecialchars($data['userReview']->rating); ?></div>
                                <div class="stars">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        echo $i <= $data['userReview']->rating ? '<span class="starFilled">★</span>' : '<span class="star">☆</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="bottom"><?php echo htmlspecialchars($data['userReview']->comment); ?></div>
                        <div class="review-actions" style="margin-top: 10px;">
                            <button class="editReviewBtn" id="editReviewBtn" data-review-id="<?php echo htmlspecialchars(($data['userReview']->review_id)); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                            </button>
                            <button class="deleteReviewBtn" id="deleteReviewBtn" data-review-id="<?php echo $data['userReview']->review_id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <!-- No user review yet, show Add Review button -->
                <?php endif; ?>

                <button class="reviewBtn" id="reviewBtn" style="<?= isset($data['userReview']) ? 'display:none;' : '' ?>">Add Review</button>

             </div>
             <div id="errorReviewContainer" style="display: none;"><p></p></div>

             <div class="reviewContent">
                <h3>All Reviews</h3>
                <div class="list">

                    <?php foreach($data['reviews'] as $review):?>
                        <?php if(isset($data['userReview']) && $review->review_id == $data['userReview']->review_id){
                            continue;
                        }?>
                        <div class="card">
                            <div class="card-top">
                                <div class="left">
                                <img src="<?php echo URLROOT;?>/Images/profile.png" class="profile-pic">
                                    <div class="info">
                                        <div class="name"><?php echo htmlspecialchars($review->name); ?></div>
                                        <div class="date"><?php echo htmlspecialchars($review->created_at); ?></div>
                                    </div>
                                </div>
                                <div class="right-side">
                                    <div class="starRating"><?php echo htmlspecialchars($review->rating); ?></div>
                                    <div class="stars">
                                    <?php
                                        $rating = $review->rating; 
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $rating) {
                                                echo '<span class="starFilled">★</span>';
                                            } else {
                                                echo '<span class="star">☆</span>';
                                            }
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr">
                            <div class="bottom"><?php echo htmlspecialchars($review->comment); ?></div>
                        </div>
                    <?php endforeach;?>
                    </div>
                </div>
       </div>
        
       <div id="reviewInsertModal" class="modal" style="display: none;" 
       data-product-id="<?php echo htmlspecialchars($details->id); ?>"
       data-supplier-id="<?php echo htmlspecialchars($details->supplier_id); ?>">
            <div class="review-modal-content">
                <div class="insertContent" id="insertContent">
                    <span class="close-button" id="closeReviewInsertModal">&times;</span>
                    <h3>Leave a Review</h3>

                    <div id="reviewStarRating" style="margin: 10px 0;">
                        <span class="reviewStar" data-value="1">&#9733;</span>
                        <span class="reviewStar" data-value="2">&#9733;</span>
                        <span class="reviewStar" data-value="3">&#9733;</span>
                        <span class="reviewStar" data-value="4">&#9733;</span>
                        <span class="reviewStar" data-value="5">&#9733;</span>
                    </div>

                    <input type="hidden" id="ratingValue" name="rating" value="0">
                    <input type="hidden" id="reviewType" name="type" value="equipment">


                    <textarea id="reviewText" name="review" placeholder="Write your review here..." rows="4"></textarea>
                    <div id="validationErrorContainer" style="display: none;"><p></p></div>

                    <button id="submitReviewBtn">Submit Review</button>
                </div>
                
                <div class="insertSuccessContent" style="display: none;" id="insertSuccessContent">
                    <span class="close-button" id="closeReviewinsertSuccessModal">&times;</span>
                    <img src="<?php echo URLROOT;?>/Images/1930264_check_complete_done_green_success_icon.png" alt="" class="reviewDeleteIcon">
                    <p id="insertSuccessModalMessage"></p>
                </div> 
            </div>
        </div>

        

        <div id="reviewDeleteModal" class="modal" style="display: none;" <?php if (isset($userReview)) : ?> data-review-id="<?php echo htmlspecialchars($userReview->review_id); ?>"<?php endif; ?> > 
            <div class="review-modal-content">
                <div class="deleteContent" id="deleteContent">
                    <span class="close-button" id="closeReviewDeleteModal">&times;</span>
                    <img src="<?php echo URLROOT;?>/Images/warning.png" class="reviewDeleteIcon">
                    <input type="hidden" id="reviewType" name="type" value="equipment">

                    <h3>Are you sure you want to delete this review?</h3>

                    <div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
                        <button id="confirmDeleteBtn" class="reviewBtn" style="background-color: #e53935;">Yes, Delete</button>
                        <button id="cancelDeleteBtn" class="reviewBtn">Cancel</button>
                    </div>
                    <p id="deleteModalErrorMessage" style="display: none;"></p>
                </div>

                <div class="deleteSuccessContent" style="display: none;" id="deleteSuccessContent">
                    <span class="close-button" id="closeReviewDeleteSuccessModal">&times;</span>
                    <img src="<?php echo URLROOT;?>/Images/1930264_check_complete_done_green_success_icon.png" alt="" class="reviewDeleteIcon">
                    <p id="deleteSuccessModalMessage"></p>
                </div>  
            </div>
        </div>


        <div id="reviewEditModal" class="modal" style="display: none;"
            <?php if (isset($userReview)) : ?> data-review-id="<?php echo htmlspecialchars($userReview->review_id); ?>"<?php endif; ?> 
            <?php if (isset($userReview)) : ?> data-product-id="<?php echo htmlspecialchars($userReview->equipment_id); ?>"<?php endif; ?>>
            <div class="review-modal-content">
                <div class="editContent" id="editContent">
                    <span class="close-button" id="closeReviewEditModal">&times;</span>
                    <h3>Edit Your Review</h3>
                    <div id="reviewStarRating" style="margin: 10px 0;">
                        <span class="reviewStar" data-value="1">&#9733;</span>
                        <span class="reviewStar" data-value="2">&#9733;</span>
                        <span class="reviewStar" data-value="3">&#9733;</span>
                        <span class="reviewStar" data-value="4">&#9733;</span>
                        <span class="reviewStar" data-value="5">&#9733;</span>
                    </div>

                    <input type="hidden" id="editRatingValue" name="rating" value="<?php echo isset($data['userReview']) ? htmlspecialchars($data['userReview']->rating) : 0; ?>">
                    <input type="hidden" id="reviewType" name="type" value="<?php echo isset($data[$userReview->type]); ?>">


                    <textarea id="editReviewText" name="review" placeholder="Write your review here..." rows="4"><?php echo isset($data['userReview']) ? htmlspecialchars($data['userReview']->comment) : ''; ?></textarea>

                    <div id="validationErrorContainer" style="display: none;"><p></p></div>

                    <button id="submitEditReviewBtn">Save Review</button>
                </div>
                
                <div class="editSuccessContent" style="display: none;" id="editSuccessContent">
                    <span class="close-button" id="closeReviewEditSuccessModal">&times;</span>
                    <img src="<?php echo URLROOT;?>/Images/1930264_check_complete_done_green_success_icon.png" alt="" class="reviewDeleteIcon">
                    <p id="editSuccessModalMessage"></p>
                </div> 

                <div class="editErrorContent" style="display: none;" id="editErrorContent">
                    <span class="close-button" id="closeReviewEditErrorModal">&times;</span>
                    <img src="<?php echo URLROOT;?>/Images/warning.png" alt="" class="reviewDeleteIcon">
                    <p id="editErrorModalMessage"></p>
                </div>
            </div>
        </div>

        
        
        