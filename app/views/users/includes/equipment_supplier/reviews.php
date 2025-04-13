
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

             <div class="content">
                <div class="list">

                    <?php foreach($data['reviews'] as $review):?>
                        <div class="card">
                            <div class="card-top">
                                <div class="left">
                                <img src="<?php echo URLROOT;?>/Images/profile.png" class="profile-pic">
                                    <div class="info">
                                        <div class="name"><?php echo htmlspecialchars($review->name); ?></div>
                                        <div class="date"><?php echo htmlspecialchars($review->created_at); ?></div>
                                    </div>
                                </div>
                                <div class="right">
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
        
        
        