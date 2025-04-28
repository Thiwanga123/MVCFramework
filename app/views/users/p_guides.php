<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/userspage/tourguideSection.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/adminpage/planningSideBarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/Modals/logoutModal.css">

    <title>Guider</title>
</head>
<body>
<div class="box" id="box">
<?php $currentPage = $data['currentPage']; ?>
    <!-- SideBar -->
     <?php require APPROOT . '/views/inc/components/planningSideBar.php'; ?>
     <!-- End Of Sidebar -->
     <main>
            <div class="guider-container">
                <div class="filter">
                    <h1>Tour Guides</h1>
                    <div class="navigation-footer">
                    <a href="<?php echo URLROOT;?>/users/planvehicle" class="nav-button prev-button">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                        <path d="m326.15-434.5 218.74 218.74L480-151.87 151.87-480 480-808.13l64.89 63.89L326.15-525.5h481.98v91H326.15Z"/>
                        </svg>
                        <span>Previous</span>
                    </a>
                    <a href="<?php echo URLROOT;?>/users/planequipments" class="nav-button next-button">
                        <span>Next</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                        <path d="M633.85-434.5H151.87v-91h481.98L415.11-744.24 480-808.13 808.13-480 480-151.87l-64.89-63.89 218.74-218.74Z"/>
                        </svg>
                    </a>
                </div>
                </div>

                
                <?php 
                    $startDate = $_SESSION['trip']['startDate'] ?? ''; 
                    $endDate = $_SESSION['trip']['endDate'] ?? ''; 
                    $today = date('Y-m-d');
                ?>  

                <!-- <div class="filter-bar">
                    <div class="filter-item">
                        <label for="sDate">Start Date</label>
                            <div class="input-group">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62">
                                <path d="M202.87-71.87q-37.78 0-64.39-26.61t-26.61-64.39v-554.26q0-37.78 26.61-64.39t64.39-26.61H240v-80h85.5v80h309v-80H720v80h37.13q37.78 0 64.39 26.61t26.61 64.39v554.26q0 37.78-26.61 64.39t-64.39 26.61H202.87Zm0-91h554.26V-560H202.87v397.13Zm0-477.13h554.26v-77.13H202.87V-640Zm0 0v-77.13V-640ZM480-398.09q-17.81 0-29.86-12.05T438.09-440q0-17.81 12.05-29.86T480-481.91q17.81 0 29.86 12.05T521.91-440q0 17.81-12.05 29.86T480-398.09Zm-160 0q-17.81 0-29.86-12.05T278.09-440q0-17.81 12.05-29.86T320-481.91q17.81 0 29.86 12.05T361.91-440q0 17.81-12.05 29.86T320-398.09Zm320 0q-17.48 0-29.7-12.05-12.21-12.05-12.21-29.86t12.21-29.86q12.22-12.05 29.82-12.05t29.7 12.05q12.09 12.05 12.09 29.86t-12.05 29.86q-12.05 12.05-29.86 12.05Zm-160 160q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm-160 0q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm320 0q-17.48 0-29.7-12.21-12.21-12.22-12.21-29.82t12.21-29.7q12.22-12.09 29.82-12.09t29.7 12.05q12.09 12.05 12.09 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Z"/>
                            </svg>
                            <input type="date" id="sDate" min="<?= $today ?>" placeholder="Select Start Date" value="<?= $startDate ?>">
                            </div>
                            <span class="error-message" id="sDate-error"></span>
                    </div>
  
                    <div class="filter-item">
                        <label for="eDate">End Date</label>
                        <div class="input-group">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62">
                            <path d="M202.87-71.87q-37.78 0-64.39-26.61t-26.61-64.39v-554.26q0-37.78 26.61-64.39t64.39-26.61H240v-80h85.5v80h309v-80H720v80h37.13q37.78 0 64.39 26.61t26.61 64.39v554.26q0 37.78-26.61 64.39t-64.39 26.61H202.87Zm0-91h554.26V-560H202.87v397.13Zm0-477.13h554.26v-77.13H202.87V-640Zm0 0v-77.13V-640ZM480-398.09q-17.81 0-29.86-12.05T438.09-440q0-17.81 12.05-29.86T480-481.91q17.81 0 29.86 12.05T521.91-440q0 17.81-12.05 29.86T480-398.09Zm-160 0q-17.81 0-29.86-12.05T278.09-440q0-17.81 12.05-29.86T320-481.91q17.81 0 29.86 12.05T361.91-440q0 17.81-12.05 29.86T320-398.09Zm320 0q-17.48 0-29.7-12.05-12.21-12.05-12.21-29.86t12.21-29.86q12.22-12.05 29.82-12.05t29.7 12.05q12.09 12.05 12.09 29.86t-12.05 29.86q-12.05 12.05-29.86 12.05Zm-160 160q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm-160 0q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm320 0q-17.48 0-29.7-12.21-12.21-12.22-12.21-29.82t12.21-29.7q12.22-12.09 29.82-12.09t29.7 12.05q12.09 12.05 12.09 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Z"/>
                        </svg>
                        <input type="date" id="eDate" min="<?= $today ?>" placeholder="Select End Date" value="<?= $endDate ?>">
                        </div>
                        <span class="error-message" id="eDate-error"></span>
                    </div>
                    
                    <div class="filter-item">
                        <label for="category">Category</label>
                        <div class="input-group">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62">
                            <path d="M80-140v-320h320v320H80Zm80-80h160v-160H160v160Zm60-340 220-360 220 360H220Zm142-80h156l-78-126-78 126ZM863-42 757-148q-21 14-45.5 21t-51.5 7q-75 0-127.5-52.5T480-300q0-75 52.5-127.5T660-480q75 0 127.5 52.5T840-300q0 26-7 50.5T813-204L919-98l-56 56ZM660-200q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM320-380Zm120-260Z"/>
                        </svg>
                        <select id="category">
                            <option value="all" selected>All Categories</option>
                            <?php foreach ($data['categories'] as $category) : ?>
                            <option value="<?php echo htmlspecialchars($category->category_id); ?>">
                            <?php echo htmlspecialchars($category->category_name); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                    
                    <div class="filter-actions">
                        <button type="button" class="apply-filter">Apply</button>
                        <button type="button" class="reset-filter">Reset</button>
                    </div>
                </div> -->

                <p>Showing All Tour Guides()</p>
               

                <div class="container1">
                        <?php if (!empty($data['availableGuiders']) && is_array($data['availableGuiders'])) : ?>
                            <?php foreach ($data['availableGuiders'] as $guider) : ?>
                                <div class="equipment-card">
                                    <div class="image-container">
                                        <?php
                                            $images = !empty($guider->profile_path) ? [$guider->profile_path] : ['default.jpg'];
                                            $firstImage = trim($images[0]);
                                        ?>
                                        <img src="<?php echo URLROOT . '/' . htmlspecialchars($firstImage); ?>" alt="Guider" class="equipment-image">
                                    </div>
                                    <div class="card-content">
                                        <h3 class="product-name"><?php echo htmlspecialchars($guider->name); ?></h3>
                                        <p class="rate">Rs. <?php echo htmlspecialchars($guider->base_rate); ?> / day</p>
                                        <p class="address"><strong>Address:</strong> <?php echo htmlspecialchars($guider->address ?? 'N/A'); ?></p>
                                        <!-- <p class="rating-text"><strong>Experience:</strong> <?php echo htmlspecialchars($guider->years_experience); ?> years</p> -->
                                        <!-- <div class="rating-container">
                                            <div class="stars">★★★★☆</div>
                                            <p class="rating-text">4.0</p>
                                        </div> -->
                                        <div class="bottom">
                                            <button class="view-guider-btn" data-guider-id="<?php echo $guider->id; ?>">View</button>
                                            <button class="book-guider-button"         
                                             data-guider-id="<?php echo $guider->id; ?>" >Book</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>No Guiders found.</p>
                        <?php endif; ?>
                    </div>

            </div>
            </main>
        </div>      
</div>

<div id="profileModal" class="modal" style="display:none;">
  <div class="guider-modal-content">
    <span id="closeModal" class="close">&times;</span>
    <div id="profileImageContainer">
      <img id="profileImage" src="" alt="Profile Picture" style="width: 100px; height: 100px; border-radius: 50%;">
    </div>
    <h2 id="profileName"></h2>
    <p><strong>Phone:</strong> <span id="profilePhone"></span></p>
    <p><strong>Email:</strong> <span id="profileEmail"></span></p>
    <p><strong>Address:</strong> <span id="profileAddress"></span></p>
    <p><strong>Language:</strong> <span id="profileLanguage"></span></p>
    <p><strong>Experience:</strong> <span id="profileExperience"></span> years</p>
    <p><strong>Specializations:</strong> <span id="profileSpecializations"></span></p>
    <p><strong>Services:</strong> <span id="profileServices"></span></p>
  </div>
</div>


<div id="bookingGuiderModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close-btnn">&times;</span>
        <h2>Book Guider</h2>

        <!-- Booking Form -->
        <form id="bookingForm">
            <!-- Pickup Location -->
            <div class="form-group">
                <label for="pickupLocation">Pickup Location</label>
                <input type="text" id="pickupLocation" name="pickupLocation" placeholder="Enter pickup location" required>
            </div>
            
            <!-- Destination -->
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" id="destination" name="destination" value="<?php echo htmlspecialchars(isset($_SESSION['trip']['location']) ? $_SESSION['trip']['location'] : ''); ?>">
            </div>

            <!-- Form Actions -->
            <div class="book-form-actions">
                <button type="submit" class="submit-btn">Book Now</button>
                <button type="button" class="cancel-btn">Cancel</button>
            </div>
        </form>
    </div>
</div>

     
     <script src="<?php echo URLROOT;?>/js/ushan/js/Sidebar.js"></script>
     <script src="<?php echo URLROOT;?>/js/ushan/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/ushan/js/submenu.js"></script>
    <script src="<?php echo URLROOT;?>/js/ushan/js/bookGuider.js"></script>
    <script src="<?php echo URLROOT;?>/js/ushan/js/viewGuiderDetails.js"></script>


    <script>const URLROOT = "<?php echo URLROOT; ?>"; </script>


</body>

</html>
