<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Income </title>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/final.css">
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

        

            
    <div class="payment-container">
        <header>
            <h2>Booking Income </h2>
            <button class="download-btn">Download Report</button>
        </header>
        
        <!-- Summary Section -->
        <section class="summary">
            <div class="card">
                <h3>Total Earnings</h3>
                <p class="amount">Rs.60000</p>
            </div>
            <div class="card">
                <h3>Pending Payments</h3>
                <p class="amount">Rs.10000</p>
            </div>
            <div class="card">
                <h3>Next Payment Date</h3>
                <p class="date">Nov 25, 2024</p>
            </div>
        </section>

        <!-- Filters and Payment History Table -->
        <section class="history-section">
            <div class="filters">
                <input type="date" id="filter-date" title="Filter by Date">
                <select id="filter-status" title="Filter by Status">
                    <option value="">All Status</option>
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                </select>
                
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
                        <td>Ruvin</td>
                        <td>2024-11-10</td>
                        <td>Rs.20000</td>
                        <td><span class="status completed">Completed</span></td>
                        <td><button class="details-btn">Details</button></td>
                    
                        
                    </tr>

                    <tr>
                        <td>Ushan</td>
                        <td>2024-11-10</td>
                        <td>Rs.20000</td>
                        <td><span class="status completed">Pending</span></td>
                        <td><button class="details-btn">Details</button></td>
                    </tr>
                    <tr>
                        <td>Thiwanga</td>
                        <td>2024-11-10</td>
                        <td>Rs.20000</td>
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
        </section>

       
    </div>
    <script src="<?php echo URLROOT; ?>/js/Sidebar.js"></script>
    <script src="<?php echo URLROOT; ?>/js/profile.js"></script>
    
</body>
</html>

