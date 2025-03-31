<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Earnings.css">
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
     

        <main>
            <div class="header">
                <div class="left">
                    <h1>My Earnings</h1>
                </div>
            </div>

            <div class="filters">
                <input type="date" id="filter-date" title="Filter by Date">
                <select id="filter-status" title="Filter by Status">
                    <option value="">All Status</option>
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                </select>
                
            </div>
            <div class="earnings">
                <div>
                <div class="header">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m787-145 28-28-75-75v-112h-40v128l87 87Zm-587 25q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v268q-19-9-39-15.5t-41-9.5v-243H200v560h242q3 22 9.5 42t15.5 38H200Zm0-120v40-560 243-3 280Zm80-40h163q3-21 9.5-41t14.5-39H280v80Zm0-160h244q32-30 71.5-50t84.5-27v-3H280v80Zm0-160h400v-80H280v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40Z"/></svg>
                    <h3>Earnings Summary</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                </div>
                <table id="paymentHistory">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    
                </thead>
                <tbody>
                <tr>
                        <td>A.Perera</td>
                        <td>2024-11-10</td>
                        <td>Rs.2000</td>
                        <td><span class="status completed">Completed</span></td>
                        <td><button class="details-btn">Details</button></td>
                    
                        
                    </tr>

                    <tr>
                        <td>Gayan</td>
                        <td>2024-11-10</td>
                        <td>Rs.10000</td>
                        <td><span class="status pending">Pending</span></td>
                        <td><button class="details-btn">Details</button></td>
                    </tr>
                    <tr>
                        <td>Thiwanga</td>
                        <td>2024-11-10</td>
                        <td>Rs.4000</td>
                        <td><span class="status pending">Pending</span></td>
                        <td><button class="details-btn">Details</button></td>
                    </tr>
                    <tr>
                        <td>Sanjula</td>
                        <td>2024-11-10</td>
                        <td>Rs.20000</td>
                        <td><span class="status completed">Completed</span></td>
                        <td><button class="details-btn">Details</button></td>
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
