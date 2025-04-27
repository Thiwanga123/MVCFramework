<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventorys.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/addVehicleModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/UpdateVehicleModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/userspage/supplierSection.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">
    <title>Vehicles</title>
</head>
<body>
    <div class="box" id ="box">

   <!-- SideBar -->
   <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
        <!-- End Of Sidebar -->
    
     <!-- End Of Sidebar -->
     <main>
            <div class="guider-container">
                <div class="filter">
                    <h1>Tour Guides</h1>
                </div>

                <div class="guider-details">
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

                <p>Showing All Tour Guides()</p>

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
                        <p>No Guiders found.</p>
                
                    <?php endif; ?>
                </div>

            </div>
            </main>
        </div>      
</div>

     
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
     <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
</body>
</html>


    