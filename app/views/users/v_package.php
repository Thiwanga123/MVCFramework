<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/userspage/packageSection.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>Packages</title>
</head>
<body>
<div class="box" id="box">
<?php $currentPage = $data['currentPage']; ?>
    <!-- SideBar -->
     <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
     <!-- End Of Sidebar -->
     <main>
            <div class="package-container">
                <div class="filter">
                    <h1>Packages</h1>
                </div>

                <div class="package-details">
                <div class="bottom">
                <form class="bottom" method="POST" action="<?php echo URLROOT; ?>/packages/getPackages">
                        <ul class="bar-in">
                            <li>
                                <div class="group">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg>
                                    
                                    <div class="div">
                                        <p>Location</p>
                                    </div>
                                </div>
                                <input type="text" id="location" placeholder="Where Are You Going?" required>
                                    <input type="hidden" id="lat" name="lat">
                                    <input type="hidden" id="lng" name="lng">
                            </li>
        
                            <li>
                                <div class="group">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="M202.87-71.87q-37.78 0-64.39-26.61t-26.61-64.39v-554.26q0-37.78 26.61-64.39t64.39-26.61H240v-80h85.5v80h309v-80H720v80h37.13q37.78 0 64.39 26.61t26.61 64.39v554.26q0 37.78-26.61 64.39t-64.39 26.61H202.87Zm0-91h554.26V-560H202.87v397.13Zm0-477.13h554.26v-77.13H202.87V-640Zm0 0v-77.13V-640ZM480-398.09q-17.81 0-29.86-12.05T438.09-440q0-17.81 12.05-29.86T480-481.91q17.81 0 29.86 12.05T521.91-440q0 17.81-12.05 29.86T480-398.09Zm-160 0q-17.81 0-29.86-12.05T278.09-440q0-17.81 12.05-29.86T320-481.91q17.81 0 29.86 12.05T361.91-440q0 17.81-12.05 29.86T320-398.09Zm320 0q-17.48 0-29.7-12.05-12.21-12.05-12.21-29.86t12.21-29.86q12.22-12.05 29.82-12.05t29.7 12.05q12.09 12.05 12.09 29.86t-12.05 29.86q-12.05 12.05-29.86 12.05Zm-160 160q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm-160 0q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm320 0q-17.48 0-29.7-12.21-12.21-12.22-12.21-29.82t12.21-29.7q12.22-12.09 29.82-12.09t29.7 12.05q12.09 12.05 12.09 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Z"/></svg>                            
                                    <div class="div">
                                        <p>Start Date</p>
                                    </div>
                                </div>
                                <input type="date" id="startDate" name="startDate" required min="<?php echo date('Y-m-d'); ?>">
                            </li>
        
                            <li>
                                <div class="group">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="M202.87-71.87q-37.78 0-64.39-26.61t-26.61-64.39v-554.26q0-37.78 26.61-64.39t64.39-26.61H240v-80h85.5v80h309v-80H720v80h37.13q37.78 0 64.39 26.61t26.61 64.39v554.26q0 37.78-26.61 64.39t-64.39 26.61H202.87Zm0-91h554.26V-560H202.87v397.13Zm0-477.13h554.26v-77.13H202.87V-640Zm0 0v-77.13V-640ZM480-398.09q-17.81 0-29.86-12.05T438.09-440q0-17.81 12.05-29.86T480-481.91q17.81 0 29.86 12.05T521.91-440q0 17.81-12.05 29.86T480-398.09Zm-160 0q-17.81 0-29.86-12.05T278.09-440q0-17.81 12.05-29.86T320-481.91q17.81 0 29.86 12.05T361.91-440q0 17.81-12.05 29.86T320-398.09Zm320 0q-17.48 0-29.7-12.05-12.21-12.05-12.21-29.86t12.21-29.86q12.22-12.05 29.82-12.05t29.7 12.05q12.09 12.05 12.09 29.86t-12.05 29.86q-12.05 12.05-29.86 12.05Zm-160 160q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm-160 0q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm320 0q-17.48 0-29.7-12.21-12.21-12.22-12.21-29.82t12.21-29.7q12.22-12.09 29.82-12.09t29.7 12.05q12.09 12.05 12.09 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Z"/></svg>                            
                                    <div class="div">
                                        <p>End Date</p>
                                    </div>
                                </div>
                                <input type="date" id="endDate" name="endDate" required min="<?php echo date('Y-m-d'); ?>">
                            </li>    

                            <div class="errorMessageContainer" id="errorMessageContainer" style="display: none;"></div>

                            <li>
                                <button type="submit" class="filter-btn">Search</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>

                <p>Showing All packages()</p>

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
                        <p>No packages found.</p>
                
                    <?php endif; ?>
                </div>

            </div>
            </main>
        </div>      
</div>


    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
    <script src="<?php echo URLROOT;?>/js/packages.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&libraries=places&callback=initAutocomplete" async defer></script>

</body>
</html>
