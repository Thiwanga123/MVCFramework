<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
            background: #f9f9f9;
        }
        
        .report-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .report-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #eee;
        }
        
        .report-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: rgb(36, 36, 118);
        }
        
        .report-date {
            font-size: 16px;
            color: #666;
        }
        
        .summary-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
        }
        
        .summary-item {
            text-align: center;
            padding: 0 15px;
        }
        
        .summary-item-title {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .summary-item-value {
            font-size: 18px;
            font-weight: bold;
            color: rgb(36, 36, 118);
        }
        
        .section-title {
            font-size: 18px;
            margin: 30px 0 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
            color: rgb(36, 36, 118);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        
        th {
            background-color: rgb(36, 36, 118);
            color: white;
            padding: 10px;
            text-align: left;
        }
        
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .amount {
            text-align: right;
            font-weight: bold;
        }
        
        .status {
            text-align: center;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #666;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
        
        .action-buttons {
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .btn-print {
            background-color: rgb(36, 36, 118);
            color: white;
        }
        
        .btn-print:hover {
            background-color: teal;
        }
        
        .btn-back {
            background-color: #ddd;
            color: #333;
        }
        
        .btn-back:hover {
            background-color: #ccc;
        }
        
        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
            font-style: italic;
        }
        
        @media print {
            body {
                background: white;
                padding: 0;
            }
            
            .report-container {
                box-shadow: none;
                padding: 0;
            }
            
            .action-buttons {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="report-container">
        <div class="report-header">
            <div class="report-title">Transaction History Report</div>
            <div class="report-date">Generated on: <?= $data['report_date'] ?></div>
        </div>
        
        <div class="summary-section">
            <div class="summary-item">
                <div class="summary-item-title">Wallet Balance</div>
                <div class="summary-item-value">Rs. <?= number_format($data['wallet_balance'], 2) ?></div>
            </div>
            <div class="summary-item">
                <div class="summary-item-title">Holding Amount</div>
                <div class="summary-item-value">Rs. <?= number_format($data['holding_amount'], 2) ?></div>
            </div>
            <div class="summary-item">
                <div class="summary-item-title">Total Earnings</div>
                <div class="summary-item-value">Rs. <?= number_format($data['earnings'], 2) ?></div>
            </div>
        </div>
        
        <div class="action-buttons">
            <button class="btn btn-print" onclick="window.print()">Print Report</button>
            <a href="<?= URLROOT ?>/tour_guides/mypayments" class="btn btn-back">Back to Wallet</a>
        </div>
        
        <div class="section-title">Withdrawal Transactions</div>
        <?php if (!empty($data['transactions'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Bank</th>
                        <th>Account Number</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['transactions'] as $transaction): ?>
                    <tr>
                        <td><?= date('M d, Y H:i', strtotime($transaction->transaction_date)) ?></td>
                        <td class="amount">Rs. <?= number_format($transaction->amount, 2) ?></td>
                        <td><?= $transaction->bank_name ?></td>
                        <td><?= substr($transaction->account_number, 0, 4) . '****' . substr($transaction->account_number, -4) ?></td>
                        <td class="status"><?= $transaction->status ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-data">No withdrawal transactions found</div>
        <?php endif; ?>
        
        <div class="section-title">Wallet Transactions</div>
        <?php if (!empty($data['wallet_transactions'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Transaction Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['wallet_transactions'] as $transaction): ?>
                    <tr>
                        <td><?= date('M d, Y H:i', strtotime($transaction->transaction_date)) ?></td>
                        <td><?= $transaction->transaction_type ?></td>
                        <td class="amount">Rs. <?= number_format($transaction->wallet_balance, 2) ?></td>
                        <td class="status"><?= $transaction->holding_amount > 0 ? 'Pending' : 'Completed' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-data">No wallet transactions found</div>
        <?php endif; ?>
        
        <div class="footer">
            <p>This report includes all transactions associated with your account.</p>
            <p>For any queries regarding these transactions, please contact support.</p>
        </div>
    </div>
    
    <script>
        // If the user wants to save as PDF, they can use the browser's print functionality
        // and select "Save as PDF" in the print dialog
    </script>
</body>
</html>
