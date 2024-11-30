<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Orders.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/guider_dashboard.css">
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
            <a href="#" class="profile">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1 id = "header-title">Dashboard</h1>
                </div>
            </div>
        
            <!--Insights-->
            <ul class="insights">
                <li>
                    <div class="products">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M202.87-71.87q-37.78 0-64.39-26.61t-26.61-64.39V-612.2q-18.24-12.43-29.12-31.48-10.88-19.06-10.88-43.02v-110.43q0-37.78 26.61-64.39t64.39-26.61h634.26q37.78 0 64.39 26.61t26.61 64.39v110.43q0 23.96-10.88 43.02-10.88 19.05-29.12 31.48v449.33q0 37.78-26.61 64.39t-64.39 26.61H202.87Zm0-523.83v433.07h554.5V-595.7h-554.5Zm-40-91h634.5v-110.43h-634.5v110.43Zm193.06 292.44H604.3v-86.22H355.93v86.22Zm124.31 14.98Z"/></svg>
                    </div>
                    <span class = "info">

                        <h3><?php echo isset($data['number_of_bookings']) ? $data['number_of_bookings'] : '0'; ?></h3>

                       

                        <p>Total Bookings</p>
                    </span>
                </li>
                <li>
                    <div class="view">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm.04-77.02q-42.89 0-72.95-30.02-30.07-30.03-30.07-72.92t30.02-72.95q30.03-30.07 72.92-30.07t72.95 30.02q30.07 30.03 30.07 72.92t-30.02 72.95q-30.03 30.07-72.92 30.07ZM480-192.59q-148.87 0-270.66-83.89Q87.54-360.37 32.59-500q54.95-139.63 176.75-223.52Q331.13-807.41 480-807.41t270.66 83.89Q872.46-639.63 927.41-500q-54.95 139.63-176.75 223.52Q628.87-192.59 480-192.59ZM480-500Zm.02 220q112.74 0 207-59.62T831.28-500q-50-100.76-144.28-160.38Q592.72-720 479.98-720q-112.74 0-207 59.62T128.72-500q50 100.76 144.28 160.38Q367.28-280 480.02-280Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>21</h3>
                        <p>Total Reviews</p>
                    </span>
                </li>
                <li>
                    <div class="earnings">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m140-220-60-60 300-300 160 160 284-320 56 56-340 384-160-160-240 240Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>Rs.30,000</h3>
                        <p>Earnings Received</p>
                    </span>
                </li>
                <li>
                    <div class="pendings">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M684.3-80q-83 0-141.5-58.5T484.3-280q0-83 58.5-141.5T684.3-480q83 0 141.5 58.5T884.3-280q0 83-58.5 141.5T684.3-80Zm67-102.61 30.4-30.63-75.48-75.48v-113.19h-43.59v130.56l88.67 88.74Zm-548.43 70.74q-37.54 0-64.27-26.73-26.73-26.73-26.73-64.27v-554.26q0-37.54 26.73-64.27 26.73-26.73 64.27-26.73h157.91q12.44-35.72 45.94-58.46 33.5-22.74 73.28-22.74 41.2 0 74.37 22.74t45.85 58.46h156.91q37.54 0 64.27 26.73 26.73 26.73 26.73 64.27v250q-19.91-14.91-42.9-25.47-22.99-10.55-48.1-17.07v-207.46H678.8v123.83H281.2v-123.83h-78.33v554.26h212.72q7.48 25.11 18.75 48.46 11.27 23.34 27.14 42.54H202.87ZM480-761.43q17 0 28.5-11.5t11.5-28.5q0-17-11.5-28.5t-28.5-11.5q-17 0-28.5 11.5t-11.5 28.5q0 17 11.5 28.5t28.5 11.5Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>2</h3>
                        <p>Available Dates</p>
                    </span>
                </li>
            </ul>
            <!--End of Insights-->
        
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M120-80v-800l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v800l-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h480v-80H240v80Zm0-160h480v-80H240v80Zm0-160h480v-80H240v80Zm-40 404h560v-568H200v568Zm0-568v568-568Z"/></svg>
                        <h3>Recent Bookings</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Booking Date</th>
                                <th>Destination</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <p>Suren</p>
                                </td>
                                <td>21-08-2024</td>
                                <td>Nuwara Eliya</td>
                                <td>Rs.5000</td>
                                <td>
                                    <span class="status completed">Completed</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <p>Methun</p>
                                </td>
                                <td>14-07-2024</td>
                                <td>Mathara</td>
                                <td>Rs.10000</td>
                                <td>
                                    <span class="status pending">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <p>Kasun</p>
                                </td>
                                <td>01-01-2024</td>
                                <td>Galle</td>
                                <td>Rs.6000</td>
                                <td>
                                    <span class="status cancelled">Cancelled</span>
                                </td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
        
                <!--Recent updates-->
                <div class="reminders">
    <div class="header">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h440l200 200v440q0 33-23.5 56.5T760-120H200Zm0-80h560v-400H600v-160H200v560Zm80-80h400v-80H280v80Zm0-320h200v-80H280v80Zm0 160h400v-80H280v80Zm-80-320v160-160 560-560Z"/>
        </svg>
        <h3>System Annnouncement</h3>
    </div>
    <ul class="event-list">
        <li>
            <div class="event-date">
                <strong>Dec 01</strong>
                <span>2024</span>
            </div>
            <div class="event-details">
                <h4>System Maintenance</h4>
           
<p>Scheduled downtime for updates from 2:00 AM to 4:00 AM.</p>
        </div>
      </li>
      <li>
        <div class="event-date">
          <strong>Dec 05</strong>
          <span>2024</span>
        </div>
        <div class="event-details">
          <h3>Version 3.0 Release</h3>
          <p>Launch of new features and performance improvements.</p>
        </div>
      </li>
      
    </ul>
    </div>
       
        
               
          </main>

     </div>

     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>

</body>

</html>
