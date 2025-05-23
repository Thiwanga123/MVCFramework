<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard_e.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    
    <title>Dashboard</title>
</head>
<body>
    <div class="box">
    
    <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/equipmentSupplierSidebar.php'; ?>
        <!-- End Of Sidebar -->

            <main>
                <div class="initial-container">
                    <div class="header">
                        <h1>Dashboard</h1>
                    </div>

                    <ul class="insights">
                        <li>
                            <div class="products">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M202.87-71.87q-37.78 0-64.39-26.61t-26.61-64.39V-612.2q-18.24-12.43-29.12-31.48-10.88-19.06-10.88-43.02v-110.43q0-37.78 26.61-64.39t64.39-26.61h634.26q37.78 0 64.39 26.61t26.61 64.39v110.43q0 23.96-10.88 43.02-10.88 19.05-29.12 31.48v449.33q0 37.78-26.61 64.39t-64.39 26.61H202.87Zm0-523.83v433.07h554.5V-595.7h-554.5Zm-40-91h634.5v-110.43h-634.5v110.43Zm193.06 292.44H604.3v-86.22H355.93v86.22Zm124.31 14.98Z"/></svg>
                            </div>
                            <span class = "info">
                                <h3>9</h3>
                                <p>Total Products</p>
                            </span>
                        </li>
                        <li>
                            <div class="view">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm.04-77.02q-42.89 0-72.95-30.02-30.07-30.03-30.07-72.92t30.02-72.95q30.03-30.07 72.92-30.07t72.95 30.02q30.07 30.03 30.07 72.92t-30.02 72.95q-30.03 30.07-72.92 30.07ZM480-192.59q-148.87 0-270.66-83.89Q87.54-360.37 32.59-500q54.95-139.63 176.75-223.52Q331.13-807.41 480-807.41t270.66 83.89Q872.46-639.63 927.41-500q-54.95 139.63-176.75 223.52Q628.87-192.59 480-192.59ZM480-500Zm.02 220q112.74 0 207-59.62T831.28-500q-50-100.76-144.28-160.38Q592.72-720 479.98-720q-112.74 0-207 59.62T128.72-500q50 100.76 144.28 160.38Q367.28-280 480.02-280Z"/></svg>
                            </div>
                            <span class = "info">
                                <h3>21</h3>
                                <p>Total Views</p>
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
                                <p>Rented Products</p>
                            </span>
                        </li>
                    </ul>
                    <!--End of Insights-->
        
                    <div class="bottom-data">
                        <div class="orders">
                            <div class="header">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M120-80v-800l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v800l-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h480v-80H240v80Zm0-160h480v-80H240v80Zm0-160h480v-80H240v80Zm-40 404h560v-568H200v568Zm0-568v568-568Z"/></svg>
                                <h3>Recent Orders</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Order Date</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="Images/default profile.png">
                                            <p>John Doe</p>
                                        </td>
                                        <td>21-08-2024</td>
                                        <td>Product A</td>
                                        <td>4</td>
                                        <td>
                                            <span class="status completed">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="Images/default profile.png">
                                            <p>John Doe</p>
                                        </td>
                                        <td>14-07-2024</td>
                                        <td>Product B</td>
                                        <td>10</td>
                                        <td>
                                            <span class="status pending">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="Images/default profile.png">
                                            <p>John Doe</p>
                                        </td>
                                        <td>01-01-2024</td>
                                        <td>Product A</td>
                                        <td>4</td>
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
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h440l200 200v440q0 33-23.5 56.5T760-120H200Zm0-80h560v-400H600v-160H200v560Zm80-80h400v-80H280v80Zm0-320h200v-80H280v80Zm0 160h400v-80H280v80Zm-80-320v160-160 560-560Z"/></svg>
                                <h3>Recent Updates</h3>
                
                            </div>
                            <ul class="update-list">
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>

    </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/subMenu.js"></script>

</body>

</html>
