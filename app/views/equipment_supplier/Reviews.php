<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Orders_ushan.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/replyModal.css">


    <title>Reviews</title>
</head>

<body>
    <div class="box">
        <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/equipmentSupplierSidebar.php'; ?>
        <!-- End Of Sidebar -->
            <main>
                <div class="initial-container">
                    <div class="header">
                        <div class="left">
                            <h1>Reviews</h1>
                        </div>
                    </div>

                    <p>Showing All Reviews()</p>
                    <div class="table-container">
                        <?php if(!empty($data['reviews'])): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Product Image</th>
                                    <th>Produt Name</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Date</th> 
                                    <th>Action</th>                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['reviews'] as $review):?>
                                <?php
                                    $date = new DateTime($review->created_at);
                                    $formattedDate = $date->format('m/d/Y'); ?>
                                <tr class="review-row"
                                    data-id="<?php echo $review->review_id; ?>"
                                    data-name="<?php echo htmlspecialchars($review->customer_name); ?>"
                                    data-image="<?php echo htmlspecialchars($review->profile_path); ?>"
                                    data-comment="<?php echo htmlspecialchars($review->comment); ?>"
                                    data-rating="<?php echo htmlspecialchars($review->rating); ?>"
                                    data-review-date="<?= htmlspecialchars($formattedDate); ?>"">                                        
                                        <td>
                                        <?php if (!empty($review->profile_path)): ?>
                                                <img src="<?= URLROOT . '/' . htmlspecialchars($review->profile_path); ?>" alt="Product Image" width="100" height="100">
                                            <?php else: ?>
                                                <img src="URLROOT . '/Images/Profile pic.jpg">
                                            <?php endif; ?>
                                            <h4><?php echo htmlspecialchars($review->customer_name); ?></h4>
                                        </td>
                                        <td>
                                        <?php if (!empty($review->image_path)): ?>
                                                <img src="<?= URLROOT . '/' . htmlspecialchars($review->image_path); ?>" alt="Product Image" width="100" height="100">
                                            <?php else: ?>
                                                No Image
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($review->equipment_name); ?></td>
                                        <td><?php echo htmlspecialchars($review->rating); ?></td>
                                        <td><?php echo htmlspecialchars($review->comment); ?></td>
                                        <td><?php echo htmlspecialchars($review->created_at); ?></td>
                                        <td>
                                            <button class="btn-reply">Reply</button>
                                        </td>     
                                    </tr>
                            <?php endforeach; ?>    
                            </tbody>
                        </table> 
                        <?php else: ?>
                            <p>You don't have any reviews at the moment.</p>
                        <?php endif; ?>
                       
                    </div>
                </div>
            </main>


                            <!-- REPLY MODEL -->
                            <div id="replyModal" class="replyModal">
                                <div class="modal-content">
                                    <span class="close" onclick="closeModal()">&times;</span>

                                    <!-- Customer Info -->
                                    <div class="customer-info">
                                        <img id="modalProfileImage" src="" alt="Profile" class="profile-img">
                                        <div>
                                            <h3 id="modalCustomerName"></h3>
                                            <h4 id = "modalReviewDate"></h4>
                                            <div id="modalRating" class="rating"></div>
                                        </div>
                                    </div>

                                    <!-- Review Content -->
                                    <div class="review-text">
                                        <p id="modalComment"></p>
                                    </div>

                                    <div class="errorMessageContainer" id="errorMessageContainer" style="display: none;"></div>

                                    <!-- Reply Form -->
                                    <form id="replyForm" method="POST">
                                        <input type="hidden" name="review_id" id="modalReviewId">
                                        <textarea name="reply" placeholder="Type your reply here..." required></textarea>
                                        <button type="submit">Send Reply</button>
                                    </form>
                                </div>
                            </div>

    </div>
    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script>
    <script src="<?php echo URLROOT;?>/js/EquipmentSupplierJS/cancellationPolicy.js"></script>
    <script src="<?php echo URLROOT;?>/js/replyModal.js"></script>



</body>
</html>
