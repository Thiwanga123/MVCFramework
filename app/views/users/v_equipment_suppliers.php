<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/userspage/supplierSection.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    
    <title>Equipment</title>
</head>
<body>
    <div class="box" id="box">
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
                                <p>Starting Date</p>
                                <div class="group">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62">
                                        <path d="M202.87-71.87q-37.78 0-64.39-26.61t-26.61-64.39v-554.26q0-37.78 26.61-64.39t64.39-26.61H240v-80h85.5v80h309v-80H720v80h37.13q37.78 0 64.39 26.61t26.61 64.39v554.26q0 37.78-26.61 64.39t-64.39 26.61H202.87Zm0-91h554.26V-560H202.87v397.13Zm0-477.13h554.26v-77.13H202.87V-640Zm0 0v-77.13V-640ZM480-398.09q-17.81 0-29.86-12.05T438.09-440q0-17.81 12.05-29.86T480-481.91q17.81 0 29.86 12.05T521.91-440q0 17.81-12.05 29.86T480-398.09Zm-160 0q-17.81 0-29.86-12.05T278.09-440q0-17.81 12.05-29.86T320-481.91q17.81 0 29.86 12.05T361.91-440q0 17.81-12.05 29.86T320-398.09Zm320 0q-17.48 0-29.7-12.05-12.21-12.05-12.21-29.86t12.21-29.86q12.22-12.05 29.82-12.05t29.7 12.05q12.09 12.05 12.09 29.86t-12.05 29.86q-12.05 12.05-29.86 12.05Zm-160 160q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm-160 0q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm320 0q-17.48 0-29.7-12.21-12.21-12.22-12.21-29.82t12.21-29.7q12.22-12.09 29.82-12.09t29.7 12.05q12.09 12.05 12.09 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Z"/>
                                    </svg>                            

                                    <input type="date" id="sDate" placeholder="Starting Date">
                                </div>
                                <span class="form-invalid" id="sDate-error"> </span>

                            </div>

                            <div class="search-item">
                                <p>End Date</p>
                                <div class="group">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62">
                                        <path d="M202.87-71.87q-37.78 0-64.39-26.61t-26.61-64.39v-554.26q0-37.78 26.61-64.39t64.39-26.61H240v-80h85.5v80h309v-80H720v80h37.13q37.78 0 64.39 26.61t26.61 64.39v554.26q0 37.78-26.61 64.39t-64.39 26.61H202.87Zm0-91h554.26V-560H202.87v397.13Zm0-477.13h554.26v-77.13H202.87V-640Zm0 0v-77.13V-640ZM480-398.09q-17.81 0-29.86-12.05T438.09-440q0-17.81 12.05-29.86T480-481.91q17.81 0 29.86 12.05T521.91-440q0 17.81-12.05 29.86T480-398.09Zm-160 0q-17.81 0-29.86-12.05T278.09-440q0-17.81 12.05-29.86T320-481.91q17.81 0 29.86 12.05T361.91-440q0 17.81-12.05 29.86T320-398.09Zm320 0q-17.48 0-29.7-12.05-12.21-12.05-12.21-29.86t12.21-29.86q12.22-12.05 29.82-12.05t29.7 12.05q12.09 12.05 12.09 29.86t-12.05 29.86q-12.05 12.05-29.86 12.05Zm-160 160q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm-160 0q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm320 0q-17.48 0-29.7-12.21-12.21-12.22-12.21-29.82t12.21-29.7q12.22-12.09 29.82-12.09t29.7 12.05q12.09 12.05 12.09 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Z"/>
                                    </svg>
                                    <input type="date" id="eDate" placeholder="End Date">
                                </div>
                                <span class="form-invalid" id="eDate-error"> </span>

                            </div>

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

                <!-- <div class="filter-menu" id="filter-bar">
                    <li class="search-item">
                        <p>Sort By</p>
                        <div class="group">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62">
                                <path d="M480-80 280-280l28-28 172 172 172-172 28 28-200 200Zm-200-400v-40h400v40H280Zm0-190v-40h400v40H280Zm0-190v-40h400v40H280Z"/>
                            </svg>
                            <select id="sort-option">
                                <option value="name-asc">Name: A-Z</option>
                                <option value="name-desc">Name: Z-A</option>
                                <option value="price-asc">Price: Low to High</option>
                                <option value="price-desc">Price: High to Low</option>
                            </select>
                        </div>
                    </li>

                    

                    <li class="search-item">
                        <button id="clear-filters" class="clear-filters-btn">Clear Filters</button>
                    </li>

                </div> -->
                
                <div class="location">
                    <p>Want to find nearby supppliers?</p>
                    <button class="filter-btn" id="filter-btn">Nearby Suppliers</button>
                </div>

                <div class="box" id="filter-box">
                    <div class="search-bar" id="filter-bar">
                        <div class="search-container">
                            <ul>
                        <!-- Location -->
                                <li class="search-item">
                                    <p>Location</p>

                                    <div class="group">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#1d5a62">
                                            <path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/>
                                        </svg>
                                        <input type="text" id="location" placeholder="Where Are You Going?" class="form-control">
                                    </div>
                                    <span class="form-invalid" id="location-error"> </span>
                                </li>

                                <li>
                                    <button class="search-btn" id="search-btn">
                                        Search
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="map-section">
                        <div id="map" style="height: 300px; width: 100%; border-radius: 10px; display: none;"> </div>
                        <div id="supplier-details" class="supplier-details" style="display: none;">
                            <h3 id="supplier-name"></h3>
                            <p id="supplier-details-text"></p>
                        </div>
        
                    </div>

                </div>


            <!--<pre><?php print_r($data['equipments']); ?></pre> -->
            <!--<pre><?php print_r($data['categories']); ?></pre> -->
            
        
                <p>Showing All Products()</p>
                <div class="container1">
                    <?php if (!empty($data['equipments']) && is_array($data['equipments'])) : ?>
                    <?php foreach ($data['equipments'] as $equipment) : ?>

                    <div class="equipment-card">
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

     
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
     <script src="<?php echo URLROOT;?>/js/supplierLocations.js"></script>
     <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&libraries=places"></script>
     <script>const URLROOT = "<?php echo URLROOT; ?>";</script>



</body>

</html>
