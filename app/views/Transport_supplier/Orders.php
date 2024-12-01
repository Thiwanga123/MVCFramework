<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Order.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <title>Home</title>
</head>
<body>
    <!-- SideBar -->
    <?php
        include('Sidebar.php');;
    ?>
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
            <p><?php echo $_SESSION['name'];?></p>
            <a href="#" class="profile">
            <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>Bookings</h1>
                </div>
            </div>

            <div class="item-orders">
                <div>
                <div class="header">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-80q-33 0-56.5-23.5T80-160v-640q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v640q0 33-23.5 56.5T800-80H160Zm0-80h640v-640H160v640Zm200-240q-17 0-28.5-11.5T320-440q0-17 11.5-28.5T360-480q17 0 28.5 11.5T400-440q0 17-11.5 28.5T360-400Zm240 0q-17 0-28.5-11.5T560-440q0-17 11.5-28.5T600-480q17 0 28.5 11.5T640-440q0 17-11.5 28.5T600-400ZM200-516v264q0 14 9 23t23 9h16q14 0 23-9t9-23v-48h400v48q0 14 9 23t23 9h16q14 0 23-9t9-23v-264l-66-192q-5-14-16.5-23t-25.5-9H308q-14 0-25.5 9T266-708l-66 192Zm106-64 28-80h292l28 80H306ZM160-800v640-640Zm120 420v-120h400v120H280Z"/></svg>
                    <h3>All Bookings</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Vehicle Image</th>
                            <th>Type</th>
                            <th>Model</th>
                            <th>Make</th>
                            <th>Rental Price</th>
                            <th>License Number</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            <img src="<?php echo URLROOT;?>\Images\aqua.jpg">
                            </td>
                            <td>Car</td>
                            <td>Toyota</td>
                            <td>Aqua</td>
                            <td>5000</td>
                            <td>Kv2156</td>
                            <td>2024-09-02</td>
                            <td>Completed</td>
                        </tr>
                        <tr>
                            <td>
                            <img src="<?php echo URLROOT;?>/Images/hiace.jpg">
                            </td>
                            <td>Van</td>
                            <td>Toyota</td>
                            <td>KDH</td>
                            <td>7000</td>
                            <td>Ph2526</td>
                            <td>2024-09-02</td>
                            <td>Completed</td>
                        </tr>
                        <tr>
                            <td>
                            <img src="<?php echo URLROOT;?>/Images/rosa.jpg">
                            </td>
                            <td>Bus</td>
                            <td>Toyota</td>
                            <td>Rosa</td>
                            <td>8000</td>
                            <td>Bc2728</td>
                            <td>2024-09-02</td>
                            <td>Cancelled</td>
                        </tr>
                    </tbody>
                </table> 
                </div>
            </div>
            
          </main>

     </div>


     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 

    
     
</body>

</html>
