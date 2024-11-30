<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Orders.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <title>History</title>
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
            <p>Hii Welcome <?php echo $_SESSION['name'];?></p>
            <a href="#" class="profile">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>History</h1>
                </div>
            </div>

            <div class="item-orders">
                <div>
                <div class="header">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    <h3>Previous Bookings</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>TripID</th>
                            <th>Location </th>
                            <th>Booking ID</th>
                            <th>Service Taken</th>
                            <th>Service Provider ID</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Amount Paid</th>
                            <th>Amount to pay</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           
                            <td>T102</td>
                            <td>Badulla</td>
                            <td>10</td>
                            <td>Accommodation</td>
                            <td>A041</td>
                            <td>2024-10-20</td>
                            <td>2024-10-23</td>
                            <td>Rs.20,000.00</td>
                            <td>Rs.10,000.00</td>
                            <td>Pending</td>
                            <td>
                            <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;border-radius: 30px;border: none;margin-top: 1rem;cursor: pointer;padding: 0 10px;transition: all 0.3s ease;">Complete Now</button></a>
                            <a href="#"><button class="pay-btn" style=" background-color: red;color: white;font-size: medium;height: 30px;border-radius: 30px;border: none;margin-top: 1rem;cursor: pointer;padding: 0 10px;transition: all 0.3s ease;">Cancel Now</button></a>
                            </td>
                        </tr>
                        <tr>
                           
                            <td>T102</td>
                            <td>Badulla</td>
                            <td>10</td>
                            <td>Accommodation</td>
                            <td>A041</td>
                            <td>2024-10-20</td>
                            <td>2024-10-23</td>
                            <td>Rs.20,000.00</td>
                            <td>Rs.0.00</td>
                            <td>Completed</td>
                            <td>
                            <a href="#"><button class="pay-btn" style=" background-color: green;color: white;font-size: medium;height: 30px;border-radius: 30px;border: none;margin-top: 1rem;cursor: pointer;padding: 0 10px;transition: all 0.3s ease;">View Details</button></a>
                            
                            </td>
                        </tr>
                        <tr>
                           
                            <td>T102</td>
                            <td>Badulla</td>
                            <td>10</td>
                            <td>Accommodation</td>
                            <td>A041</td>
                            <td>2024-10-20</td>
                            <td>2024-10-23</td>
                            <td>Rs.20,000.00</td>
                            <td>Rs.10,000.00</td>
                            <td>Pending</td>
                            <td>
                            <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;border-radius: 30px;border: none;margin-top: 1rem;cursor: pointer;padding: 0 10px;transition: all 0.3s ease;">Complete Now</button></a>
                            <a href="#"><button class="pay-btn" style=" background-color: red;color: white;font-size: medium;height: 30px;border-radius: 30px;border: none;margin-top: 1rem;cursor: pointer;padding: 0 10px;transition: all 0.3s ease;">Cancel Now</button></a>
                            </td>
                        </tr>
                        <tr>
                           
                            <td>T102</td>
                            <td>Badulla</td>
                            <td>10</td>
                            <td>Accommodation</td>
                            <td>A041</td>
                            <td>2024-10-20</td>
                            <td>2024-10-23</td>
                            <td>Rs.20,000.00</td>
                            <td>Rs.10,000.00</td>
                            <td>Pending</td>
                            <td>
                            <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;border-radius: 30px;border: none;margin-top: 1rem;cursor: pointer;padding: 0 10px;transition: all 0.3s ease;">Complete Now</button></a>
                            <a href="#"><button class="pay-btn" style=" background-color: red;color: white;font-size: medium;height: 30px;border-radius: 30px;border: none;margin-top: 1rem;cursor: pointer;padding: 0 10px;transition: all 0.3s ease;">Cancel Now</button></a>
                            </td>
                        </tr>
                        <tr>
                           
                           <td>T102</td>
                           <td>Badulla</td>
                           <td>10</td>
                           <td>Accommodation</td>
                           <td>A041</td>
                           <td>2024-10-20</td>
                           <td>2024-10-23</td>
                           <td>Rs.20,000.00</td>
                           <td>Rs.0.00</td>
                           <td>Completed</td>
                           <td>
                           <a href="#"><button class="pay-btn" style=" background-color: green;color: white;font-size: medium;height: 30px;border-radius: 30px;border: none;margin-top: 1rem;cursor: pointer;padding: 0 10px;transition: all 0.3s ease;">View Details</button></a>
                           
                           </td>
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
