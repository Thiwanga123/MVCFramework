<!DOCTYPE html>
<html>
<head>
  <style>
    :root {
      --light: snow;
      --primary: rgb(36, 36, 118);
      --light-primary: teal;
      --grey: rgb(239, 239, 239);
      --dark-grey: rgb(95, 88, 88);
      --dark: rgb(55, 145, 157);
      --danger: rgb(222, 5, 5);
      --light-danger: rgb(233, 248, 251);
      --warning: rgb(49, 115, 161);
      --light-warning: rgb(158, 213, 255);
      --success: rgb(126, 197, 200);
      --light-success: #016c6cde;
    }

    body {
      background: var(--light);
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 15px;
      height: calc(100vh - 30px);
      display: flex;
      flex-direction: column;
    }

    .header {
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .wallet-container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 10px;
      flex: 0 0 auto;
    }

    .wallet-card, .subscription-card {
      background: linear-gradient(135deg, var(--primary) 0%, var(--light-primary) 100%);
      border-radius: 15px;
      padding: 15px;
      color: var(--light);
      flex: 1;
      margin-right: 15px;
      margin-bottom: 10px;
      width: 400px;
    }

    .subscription-card {
      background: var(--light);
      color: var(--dark);
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
      flex: 0.5;
      padding: 15px;
      border-radius: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .balance {
      font-size: 28px;
      font-weight: bold;
      margin: 8px 0;
    }

    .button-group {
      display: flex;
      gap: 10px;
      margin-top: 15px;
    }

    .button {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: var(--light);
      padding: 8px 16px;
      border-radius: 8px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .subscription-card .button {
      background: var(--primary);
      color: var(--light);
    }

    .left-side, .right-side {
      flex: 1;
    }

    .left-side {
      margin-right: 15px;
    }

    .right-side {
      margin-left: 15px;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 10px;
      margin-bottom: 15px;
    }

    .stat-card {
      background: var(--light);
      border-radius: 12px;
      padding: 12px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .stat-header {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 10px;
    }

    .stat-icon {
      width: 30px;
      height: 30px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--light);
      font-size: 16px;
    }

    .stat-amount {
      font-size: 20px;
      font-weight: bold;
      margin: 8px 0;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6);
      align-items: center;
      justify-content: center;
      z-index: 1000;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .modal.show {
      opacity: 1;
    }

    .modal-content {
      background: var(--light);
      padding: 30px;
      border-radius: 15px;
      width: 90%;
      max-width: 500px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      transform: translateY(20px);
      transition: transform 0.3s ease;
    }

    .modal.show .modal-content {
      transform: translateY(0);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: var(--dark);
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px;
      border: 1px solid var(--grey);
      border-radius: 8px;
      transition: border 0.3s ease, box-shadow 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: var(--primary);
      outline: none;
      box-shadow: 0 0 0 3px rgba(36, 36, 118, 0.1);
    }

    .modal-buttons {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      margin-top: 20px;
    }

    .modal-button {
      padding: 12px 24px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .confirm-button {
      background: var(--primary);
      color: var(--light);
    }

    .confirm-button:hover {
      background: var(--light-primary);
      transform: translateY(-2px);
    }

    .cancel-button {
      background: var(--grey);
    }

    .cancel-button:hover {
      background: var(--dark-grey);
      color: var(--light);
    }

    .download-section {
      text-align: center;
      padding: 12px;
      background: var(--light);
      border-radius: 12px;
      margin-top: 10px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .download-section:hover {
      transform: translateY(-5px);
    }

    .section-title {
      font-size: 16px;
      font-weight: 600;
      margin: 15px 0 10px 0;
    }

    .download-button {
      background: var(--primary);
      color: var(--light);
      padding: 12px 24px;
      border-radius: 50px;
      border: none;
      cursor: pointer;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-weight: 500;
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .download-button:hover {
      background: var(--light-primary);
      transform: translateY(-2px);
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
    }

    .transaction-history {
      margin-top: 15px;
      flex: 1;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .transaction-table-container {
      flex: 1;
      overflow: auto;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
      background: var(--light);
    }

    .transaction-table {
      width: 100%;
      border-collapse: collapse;
      background: var(--light);
    }

    .transaction-table th {
      position: sticky;
      top: 0;
      background-color: var(--primary);
      color: var(--light);
      font-weight: 500;
      z-index: 10;
    }

    .transaction-table th, .transaction-table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid var(--grey);
    }

    .transaction-table tr:hover {
      background-color: rgba(36, 36, 118, 0.05);
    }

    .transaction-table tr:last-child td {
      border-bottom: none;
    }

    .transaction-amount {
      font-weight: 600;
    }

    .transaction-date {
      color: var(--dark-grey);
      font-size: 0.9em;
    }

    .no-transactions {
      padding: 20px;
      text-align: center;
      color: var(--dark-grey);
      font-style: italic;
    }

    .tabs {
      display: flex;
      border-bottom: 1px solid var(--grey);
      margin-bottom: 10px;
    }

    .tab {
      padding: 8px 15px;
      cursor: pointer;
      border-bottom: 3px solid transparent;
      margin-right: 10px;
      transition: all 0.3s ease;
    }

    .tab.active {
      border-bottom: 3px solid var(--primary);
      color: var(--primary);
      font-weight: 500;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="wallet-container">
      <div class="left-side">
        <div class="wallet-card">
          <div>Wallet Balance</div>
          <div class="balance">Rs. <?= number_format($data['bankDetails']['wallet_balance'], 2) ?></div>
          <div class="button-group">
            <button class="button" onclick="showWithdrawModal()">
              ↓ Withdraw
            </button>
          </div>
        </div>

        <div class="subscription-card">
          <div>
            <h2 style="margin: 0 0 10px 0;">Current Subscription</h2>
            <div style="margin: 10px 0;">
              <div style="font-size: 18px; font-weight: 600; margin-bottom: 5px;">Premium Plan</div>
              <div>Status: Active</div>
              <div>Expires: March 15, 2025</div>
              <div style="color: var(--dark-grey);">30 days remaining</div>
            </div>
            <button class="button">Renew Subscription</button>
          </div>
          <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" 
                  fill="#FFD700" stroke="#DAA520" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      </div>

      <div class="right-side">
        <div class="section-title">Payment Statistics</div>
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-header">
              <div class="stat-icon" style="background: var(--primary)">💰</div>
              <div>Holding Amount</div>
            </div>
            <div class="stat-amount">Rs. <?= number_format($data['bankDetails']['total_holding_amount'], 2) ?></div>
            <div><?= $data['bankDetails']['pending_transactions'] ?> pending transactions</div>
          </div>

          <div class="stat-card">
            <div class="stat-header">
              <div class="stat-icon" style="background: var(--success)">✓</div>
              <div>Completed Payments</div>
            </div>
            <div class="stat-amount">Rs. <?= number_format($data['bankDetails']['earnings'], 2) ?></div>
            <div><?= count($data['bankDetails']['transactions']) ?> transactions</div>
          </div>

          <div class="stat-card">
            <div class="stat-header">
              <div class="stat-icon" style="background: var(--warning)">↩</div>
              <div>Refunded Payments</div>
            </div>
            <div class="stat-amount">Rs. 800.00</div>
            <div>2 transactions</div>
          </div>

          <div class="stat-card">
            <div class="stat-header">
              <div class="stat-icon" style="background: var(--danger)">⚠</div>
              <div>Penalty Payments</div>
            </div>
            <div class="stat-amount">Rs. <?= number_format($data['bankDetails']['penalty_amount'], 2) ?></div>
            <div><?= $data['bankDetails']['penalty_transactions_count'] ?> transaction<?= $data['bankDetails']['penalty_transactions_count'] !== 1 ? 's' : '' ?></div>
          </div>
        </div>

        <div class="download-section">
          <h2 style="margin: 0 0 10px 0;">Download Reports</h2>
          <a href="<?= URLROOT ?>/accomadation/downloadTransactionReport" class="download-button">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 16L12 8M12 16L8 12M12 16L16 12M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" 
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Download Transaction History
          </a>
        </div>
      </div>
    </div>

    <div class="transaction-history">
      <div class="section-title">Transaction History</div>
      
      <div class="tabs">
        <div class="tab active" onclick="switchTab('withdrawals')">Withdrawals</div>
        <div class="tab" onclick="switchTab('all')">All Transactions</div>
      </div>
      
      <div id="withdrawals-tab" class="tab-content transaction-table-container">
        <?php if (!empty($data['bankDetails']['withdrawal_transactions'])): ?>
          <table class="transaction-table">
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
              <?php foreach($data['bankDetails']['withdrawal_transactions'] as $transaction): ?>
                <tr>
                  <td class="transaction-date"><?= date('M d, Y H:i', strtotime($transaction->transaction_date)) ?></td>
                  <td class="transaction-amount">Rs. <?= number_format($transaction->amount, 2) ?></td>
                  <td><?= $transaction->bank_name ?></td>
                  <td><?= substr($transaction->account_number, 0, 4) . '****' . substr($transaction->account_number, -4) ?></td>
                  <td><?= $transaction->status ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="no-transactions">No withdrawal transactions found</div>
        <?php endif; ?>
      </div>
      
      <div id="all-tab" class="tab-content transaction-table-container" style="display: none;">
        <?php if (!empty($data['bankDetails']['transactions'])): ?>
          <table class="transaction-table">
            <thead>
              <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data['bankDetails']['transactions'] as $transaction): ?>
                <tr>
                  <td class="transaction-date"><?= date('M d, Y H:i', strtotime($transaction->transaction_date)) ?></td>
                  <td><?= $transaction->transaction_type ?></td>
                  <td class="transaction-amount">Rs. <?= number_format($transaction->wallet_balance, 2) ?></td>
                  <td><?= $transaction->holding_amount > 0 ? 'Pending' : 'Completed' ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="no-transactions">No transactions found</div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div id="withdrawModal" class="modal">
    <div class="modal-content">
      <h2 style="margin-bottom: 20px;">Withdraw Funds</h2>
      
      <form id="withdrawForm">
        <div class="form-group">
          <label>Withdrawal Method</label>
          <select name="withdrawal_method">
            <option>Bank Transfer</option>
            <option>Credit Card</option>
          </select>
        </div>

        <div class="form-group">
          <label>Amount</label>
          <input type="number" name="amount" placeholder="Enter amount" required min="1000" 
                 max="<?= $data['bankDetails']['wallet_balance'] ?>">
          <small style="color: var(--dark-grey); display: block; margin-top: 5px;">Minimum withdrawal amount: Rs. 1,000</small>
        </div>
        <div class="form-group">
          <label>Bank</label>
          <input type="text" name="bank_name" placeholder="Bank Name" required>
        </div>
        <div class="form-group">
          <label>Account Number</label>
          <input type="number" name="account_number" placeholder="Account Number" required>
        </div>
        <div class="form-group">
          <label>Account Name</label>
          <input type="text" name="account_name" placeholder="Account Name" required>
        </div>
        <div class="form-group">
          <label>Branch </label>
          <input type="text" name="branch" placeholder="Branch name" required>
        </div>

        <div class="modal-buttons">
          <button type="button" class="modal-button cancel-button" onclick="hideWithdrawModal()">Cancel</button>
          <button type="submit" class="modal-button confirm-button">Confirm Withdrawal</button>
        </div>
      </form>
      
      <div id="withdrawalMessage" style="margin-top: 20px; display: none;"></div>
    </div>
  </div>

  <script>
    function showWithdrawModal() {
      const modal = document.getElementById('withdrawModal');
      modal.style.display = 'flex';
      setTimeout(() => {
        modal.classList.add('show');
      }, 10);
    }

    function hideWithdrawModal() {
      const modal = document.getElementById('withdrawModal');
      modal.classList.remove('show');
      setTimeout(() => {
        modal.style.display = 'none';
        // Reset form and hide any messages
        document.getElementById('withdrawForm').reset();
        document.getElementById('withdrawalMessage').style.display = 'none';
      }, 300);
    }

    window.onclick = function(event) {
      const modal = document.getElementById('withdrawModal');
      if (event.target == modal) {
        hideWithdrawModal();
      }
    }
    
    // Handle withdrawal form submission with AJAX
    document.getElementById('withdrawForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(this);
      
      // Disable submit button to prevent multiple submissions
      document.querySelector('.confirm-button').disabled = true;
      
      fetch('<?= URLROOT ?>/accomadation/processWithdrawal', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        const messageDiv = document.getElementById('withdrawalMessage');
        messageDiv.style.display = 'block';
        
        if (data.success) {
          // Success - show message and update balance display
          messageDiv.innerHTML = `<div style="color: green; padding: 10px; background: #e8f5e9; border-radius: 5px;">${data.message}</div>`;
          
          // Update wallet balance in wallet card
          document.querySelector('.balance').textContent = 'Rs. ' + numberFormat(data.new_balance);
          
          // Update card payments and cash payments
          const statAmounts = document.querySelectorAll('.stat-amount');
          
          // Update card payments (60% of wallet balance)
          statAmounts[0].textContent = 'Rs. ' + numberFormat(data.new_balance * 0.6);
          
          // Update cash payments (40% of wallet balance)
          statAmounts[1].textContent = 'Rs. ' + numberFormat(data.new_balance * 0.4);
          
          // Find and update the holding amount - in the right side stats grid
          const statsGridAmounts = document.querySelector('.right-side .stats-grid').querySelectorAll('.stat-amount');
          
          // First card is Holding Amount
          // Since holding amount doesn't change with withdrawal, we leave it as is
          
          // Second card is Completed Payments - update with new earnings
          statsGridAmounts[1].textContent = 'Rs. ' + numberFormat(data.new_earnings);
          
          // Close modal after 3 seconds on success
          setTimeout(hideWithdrawModal, 3000);
        } else {
          // Error - show message
          messageDiv.innerHTML = `<div style="color: red; padding: 10px; background: #ffebee; border-radius: 5px;">${data.message}</div>`;
          // Re-enable submit button on error
          document.querySelector('.confirm-button').disabled = false;
        }
      })
      .catch(error => {
        console.error('Error:', error);
        const messageDiv = document.getElementById('withdrawalMessage');
        messageDiv.style.display = 'block';
        messageDiv.innerHTML = '<div style="color: red; padding: 10px; background: #ffebee; border-radius: 5px;">An error occurred. Please try again.</div>';
        document.querySelector('.confirm-button').disabled = false;
      });
    });
    
    // Helper function to format numbers with commas
    function numberFormat(number) {
      return new Intl.NumberFormat('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(number);
    }

    function switchTab(tabName) {
      // Hide all tab contents
      document.querySelectorAll('.tab-content').forEach(tab => {
        tab.style.display = 'none';
      });
      
      // Remove active class from all tabs
      document.querySelectorAll('.tab').forEach(tab => {
        tab.classList.remove('active');
      });
      
      // Show selected tab content
      document.getElementById(tabName + '-tab').style.display = 'block';
      
      // Add active class to selected tab
      document.querySelector(`.tab[onclick="switchTab('${tabName}')"]`).classList.add('active');
    }
  </script>
</body>
</html>