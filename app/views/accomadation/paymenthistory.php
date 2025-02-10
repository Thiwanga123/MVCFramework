<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment History</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
        }
        .summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .summary div {
            background-color: #def2f1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin-right: 20px;
        }
        .summary div:last-child {
            margin-right: 0;
        }
        .summary div h3 {
            margin: 0;
            font-size: 16px;
            color: #3aafa9;
        }
        .summary div p {
            margin: 5px 0 0;
            font-size: 24px;
            color: #333;
        }
        .summary div p span {
            font-size: 14px;
            color: #888;
        }
        .tabs {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 20px;
        }
        .tabs button {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 10px 20px;
            margin-right: 10px;
            cursor: pointer;
            font-size: 14px;
            color: #333;
        }
        .tabs button.active {
            border-color: #4a90e2;
            color: #4a90e2;
        }
        .tabs button:last-child {
            margin-right: 0;
        }
        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color:#3aafa9;
            color: #fff;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        table td.status-advance {
            color: #ff9800;
        }
        table td.status-full {
            color: #4caf50;
        }
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            border-top: 1px solid #ddd;
        }
        .pagination select {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .pagination span {
            font-size: 14px;
            color: #888;
        }
        .pagination .page-controls {
            display: flex;
            align-items: center;
        }
        .pagination .page-controls button {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 5px 10px;
            margin-left: 5px;
            cursor: pointer;
            border-radius: 4px;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .modal-content h2 {
            margin-top: 0;
        }
        .modal-content button {
            background-color: #4a90e2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .modal-content button:hover {
            background-color: #357ab8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="summary">
            <div>
                <h3>Total Earnings</h3>
                <p>Rs. 430,000 <span>as of 01-December 2022</span></p>
            </div>
            <div>
                <h3>Pending Payments</h3>
                <p>Rs. 100,000 <span>as of 01-December 2022</span></p>
            </div>
        </div>
        <div class="tabs">
            <button class="active" onclick="showTab('all')">All</button>
            <button onclick="showTab('complete')">Complete</button>
            <button onclick="showTab('pending')">Pending</button>
            <button onclick="showTab('refund')">Refund</button>
        </div>
        <div class="table-container">
            <table id="payment-table">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Amount to be Received</th>
                    </tr>
                </thead>
                <tbody id="all">

                <?php echo $data; ?>
                    <tr>
                        <td>#</td>
                        <td><?php echo $payment->booking_id; ?></td>
                        <td>Rs. <?php echo $payment->paid; ?></td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td class="status-full">Full Payment</td>
                        <td>-</td>
            </tr>


                        
                    
                    
                   
                </tbody>
                <tbody id="complete" style="display: none;">
                    <tr>
                        <td>#15267</td>
                        <td>Mar 1, 2023</td>
                        <td>Rs. 5,000</td>
                        <td>C123</td>
                        <td>Kumar Perera</td>
                        <td>Credit Card</td>
                        <td class="status-full">Full Payment</td>
                        <td>-</td>
                    </tr>
                   
                </tbody>
                <tbody id="pending" style="display: none;">
                    <tr>
                        <td>#16907</td>
                        <td>March 18, 2033</td>
                        <td>Rs. 3,000</td>
                        <td>C129</td>
                        <td>Gayan Rajapaksha</td>
                        <td>PayPal</td>
                        <td class="status-advance" onclick="openModal()">Advance Only</td>
                        <td>Rs. 1,500</td>
                    </tr>
                </tbody>
                <tbody id="refund" style="display: none;">
                    <tr>
                        <td>#16378</td>
                        <td>Feb 28, 2033</td>
                        <td>Rs. 5,000</td>
                        <td>C127</td>
                        <td>Chandana Wickramasinghe</td>
                        <td>Credit Card</td>
                        <td class="status-advance" onclick="openModal()">Advance Only</td>
                        <td>Rs. 2,000</td>
                    </tr>
                </tbody>
            </table>
            <div class="pagination">
                <div>
                    <label for="per-page">10</label>
                    <select id="per-page">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                    <span>per page</span>
                </div>
                <div class="page-controls">
                    <span>1 of 1 pages</span>
                    <button>&lt;</button>
                    <button>&gt;</button>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="refundModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Refund Payment</h2>
            <p>Are you sure you want to refund this payment?</p>
            <button onclick="confirmRefund()">Confirm</button>
        </div>
    </div>

    <script>
        function showTab(tab) {
            const tabs = document.querySelectorAll('.tabs button');
            tabs.forEach(button => {
                button.classList.remove('active');
            });
            document.querySelector(`.tabs button[onclick="showTab('${tab}')"]`).classList.add('active');

            const tables = document.querySelectorAll('tbody');
            tables.forEach(table => {
                table.style.display = 'none';
            });
            document.getElementById(tab).style.display = 'table-row-group';
        }

        function openModal() {
            document.getElementById('refundModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('refundModal').style.display = 'none';
        }

        function confirmRefund() {
            alert('Payment has been refunded.');
            closeModal();
        }
    </script>
</body>
</html>