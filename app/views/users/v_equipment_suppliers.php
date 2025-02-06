<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/supplierSection.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    
    <title>Equipment</title>
</head>
<body>
    <!-- SideBar -->
     <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
     <!-- End Of Sidebar -->

     <!--Main Content-->
     <div class="content">
        <!--navbar-->
        <nav>
            <svg class="menu" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-269.23v-40h640v40H160ZM160-460v-40h640v40H160Zm0-190.77v-40h640v40H160Z"/></svg>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search ..">
                    <button class="search-btn" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                    </button>
                </div>
            </form>
            <a href="#" class="updates">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>
                <span class="count">12</span>
            </a>
            <p>Hii Welcome <?php echo isset($_SESSION['name']) ? ' ' . htmlspecialchars($_SESSION['name']) : ''; ?> </p>
            <a href="#" class="profile">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>

        <div class="search-bar">
            <div class="search-container">
                <ul>
            <!-- Location -->
                    <li class="search-item">
                        <p>Location</p>

                        <div class="group">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#1d5a62">
                                <path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/>
                            </svg>
                            <input type="text" id="location" placeholder="Where Are You Going?">
                         </div>
                    </li>

            <!-- Budget -->
                    <li class="search-item">
                        <p>Budget</p>

                        <div class="group">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#1d5a62">
                                <path d="M240-160q-66 0-113-47T80-320v-320q0-66 47-113t113-47h480q66 0 113 47t47 113v320q0 66-47 113t-113 47H240Zm0-480h480q22 0 42 5t38 16v-21q0-33-23.5-56.5T720-720H240q-33 0-56.5 23.5T160-640v21q18-11 38-16t42-5Zm-74 130 445 108q9 2 18 0t17-8l139-116q-11-15-28-24.5t-37-9.5H240q-26 0-45.5 13.5T166-510Z"/>
                            </svg>
                            <input type="text" id="budget" placeholder="LKR">
                        </div>
                    </li>

            <!-- Category -->
                <li class="search-item">
                        <p>Category</p>
                  
                        <div class="group">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#1d5a62">
                                <path d="M80-140v-320h320v320H80Zm80-80h160v-160H160v160Zm60-340 220-360 220 360H220Zm142-80h156l-78-126-78 126ZM863-42 757-148q-21 14-45.5 21t-51.5 7q-75 0-127.5-52.5T480-300q0-75 52.5-127.5T660-480q75 0 127.5 52.5T840-300q0 26-7 50.5T813-204L919-98l-56 56ZM660-200q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM320-380Zm120-260Z"/>
                            </svg>
                            
                            <select id="category">
                                <option value="" disabled selected>Select Category</option>
                                <?php foreach ($data['categories'] as $category) : ?>
                                    <option value="<?php echo htmlspecialchars($category->category_id); ?>">
                                        <?php echo htmlspecialchars($category->category_name); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                </li>

            <!-- Search Button -->
            <li>
                <button class="search-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#000000">
                        <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/>
                    </svg>
                </button>
            </li>
        </ul>
    </div>
</div>


           <!--<pre><?php print_r($data['equipments']); ?></pre> -->
           <!--<pre><?php print_r($data['categories']); ?></pre> -->

            <div class="container1">
                <?php if (!empty($data['equipments']) && is_array($data['equipments'])) : ?>
                <?php foreach ($data['equipments'] as $equipment) : ?>
                <div class="feature">
                    <?php 
                        // Check if images exist and split them into an array
                        $images = !empty($equipment->images) ? explode(',', $equipment->images) : []; 
                        $firstImage = !empty($images) ? trim($images[0]) : 'default.jpg'; // Use default image if no image is found
                    ?>
                    <img src="<?php echo URLROOT . '/' . htmlspecialchars($firstImage); ?>" alt="equipment">
                    <h3><?php echo htmlspecialchars($equipment->product_name); ?></h3>
                    <p>Size: <?php echo htmlspecialchars($equipment->size); ?></p>
                    <br>
                    <p>Rate: Rs.<?php echo htmlspecialchars($equipment->rate); ?></p>
                    <a href="<?php echo URLROOT;?>/users/payments">
                <button class="pay-btn">Book & Pay Now</button>
                </a>
            </div>
            <?php endforeach; ?>
                <?php else : ?>
                    <p>No equipment found.</p>
                <?php endif; ?>
            </div>

          </main>

     </div>

     
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
</body>

</html>
