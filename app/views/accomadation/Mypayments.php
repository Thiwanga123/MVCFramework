<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payments</title>
<link rel="stylesheet" href="payments-style.css">
<script src="payments-script.js" defer></script>
</head>
<body>
    <div class="payment-container">
        <header>
            <h2>Accommodation Supplier Payments Dashboard</h2>
            <button class="download-btn">Download Report</button>
        </header>

        <!-- Summary Section -->
        <section class="summary">
            <div class="card">
                <h3>Total Earnings</h3>
                <p class="amount">$12,500</p>
            </div>
            <div class="card">
                <h3>Pending Payments</h3>
                <p class="amount">$1,200</p>
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
                <button id="filter-btn">Apply Filters</button>
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
                        <td>$500</td>
                        <td><span class="status completed">Completed</span></td>
                        <td><button class="details-btn">Details</button></td>
                    </tr>
                    <tr>
                        <td>2024-10-28</td>
                        <td>$300</td>
                        <td><span class="status pending">Pending</span></td>
                        <td><button class="details-btn">Details</button></td>
                    </tr>
                    <tr>
                        <td>2024-09-15</td>
                        <td>$700</td>
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

