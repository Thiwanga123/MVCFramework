<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Guider Payments </title>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/payments.css">
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
<title>Home</title>
</head>
<body>
 <!-- SideBar -->
    <?php
        include('Sidebar.php');;
    ?>
         <!-- End Of Sidebar -->
    <div class="payment-container">
        <header>
            <h2>Guider Payments </h2>
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
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-11-10</td>
                        <td>Rs.20000</td>
                        <td><span class="status completed">Completed</span></td>
                        <td><button class="details-btn">Details</button></td>
                    </tr>
                    <tr>
                        <td>2024-10-28</td>
                        <td>Rs.10000</td>
                        <td><span class="status pending">Pending</span></td>
                        <td><button class="details-btn">Details</button></td>
                    </tr>
                    <tr>
                        <td>2024-09-15</td>
                        <td>Rs.15000</td>
                        <td><span class="status completed">Completed</span></td>
                        <td><button class="details-btn">Details</button></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Update Payment Details Form -->
        <section class="update-payment">
            <h3>Update Payment Details</h3>
            <form id="updatePaymentForm">
                <div class="form-group">
                    <label for="paymentMethod">Payment Method</label>
                    <select id="paymentMethod">
                        <option value="bank">Bank Transfer</option>
                        <option value="paypal">PayPal</option>
                        <option value="crypto">Cryptocurrency</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="accountNumber">Account Number / PayPal Email</label>
                    <input type="text" id="accountNumber" placeholder="Enter Account Number or PayPal Email">
                </div>
                <button type="submit" class="submit-btn">Update</button>
            </form>
        </section>
    </div>
</body>
</html>

