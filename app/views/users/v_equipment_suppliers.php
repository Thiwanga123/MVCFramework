<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/userspage/supplier.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/Modals/logoutModal.css">

    <title>Equipment Rentals</title>
</head>
<body>
    <div class="box" id="box">
    <?php $currentPage = $data['currentPage']; ?>

    <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
     <!-- End Of Sidebar -->

     <!--Main Content-->
    
        <main>
            <div class="rental-container">
                <div class="filter">
                    <h1>Rent Equipments</h1>
                </div>

                <div class="rental-details">
                    <div class="bar">
                        <div class="inside">
                            <div class="search-item">
                                <p>Category</p>    
                                <div class="group">
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
                        </div>
                    </div>
                </div>

                <p>Showing All Products</p>
                <div class="container1">
                    <?php if (!empty($data['equipments']) && is_array($data['equipments'])) : ?>
                    <?php foreach ($data['equipments'] as $equipment) : ?>

                    <div class="equipment-card" data-category="<?php echo htmlspecialchars($equipment->category_id); ?>">
                        <div class="image-container">
                            <?php
                                $images = !empty($equipment->images) ? explode(',', $equipment->images) : [];
                                $firstImage = !empty($images) ? trim($images[0]) : 'default.jpg';
                            ?>
                            <img src="<?php echo URLROOT . '/' . htmlspecialchars($firstImage); ?>" alt="equipment" class="equipment-image">
                        </div>
                        <div class="card-content">
                            <h3 class="product-name"><?php echo htmlspecialchars($equipment->rental_name); ?></h3>
                            <p class="rate">Rs. <?php echo htmlspecialchars($equipment->price_per_day); ?></p>
                            <div class="rating-container">
                                <div class="stars">★★★★☆</div> <!-- 4 out of 5 stars -->
                                <p class="rating-text">4.0</p>
                            </div>
                            <div class="bottom">
                            <a href="<?php echo URLROOT; ?>/users/viewProduct/<?php echo $equipment->id; ?>">                 
                                <button class="pay-button">View & Rent</button>
                            </a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                    <?php else : ?>
                        <p>No equipment found.</p>
                
                    <?php endif; ?>
                </div>
            </div>
        </main>

     </div>

     
     <script src="<?php echo URLROOT;?>/js/ushan/js/Sidebar.js"></script>
     <script src="<?php echo URLROOT;?>/js/ushan/js/supplierLocations.js"></script>
     <script src="<?php echo URLROOT;?>/js/ushan/js/logout.js"></script>
     <script src="<?php echo URLROOT;?>/js/ushan/js/submenu.js"></script>
     <script src="<?php echo URLROOT;?>/js/ushan/js/equipmentFilter.js"></script>
     <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&libraries=places"></script>
     <script>const URLROOT = "<?php echo URLROOT; ?>";</script>



</body>

</html>
