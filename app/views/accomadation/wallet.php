<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    
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
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
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
      margin-bottom: 20px;
    }

    .wallet-card, .subscription-card {
      background: linear-gradient(135deg, var(--primary) 0%, var(--light-primary) 100%);
      border-radius: 15px;
      padding: 20px;
      color: var(--light);
      flex: 1;
      margin-right: 20px;
      margin-bottom: 20px;
      height: 80%;
      width: 400px;
    }

    .subscription-card {
      background: var(--light);
      color: var(--dark);
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
      flex: 0.5;
      padding: 20px;
      border-radius: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .balance {
      font-size: 32px;
      font-weight: bold;
      margin: 10px 0;
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
      margin-right: 20px;
    }

    .right-side {
      margin-left: 20px;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .payment-types-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .stat-card {
      background: var(--light);
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .stat-header {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 15px;
    }

    .stat-icon {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--light);
      font-size: 20px;
    }

    .stat-amount {
      font-size: 24px;
      font-weight: bold;
      margin: 10px 0;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      align-items: center;
      justify-content: center;
    }

    .modal-content {
      background: var(--light);
      padding: 30px;
      border-radius: 15px;
      width: 90%;
      max-width: 500px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid var(--grey);
      border-radius: 8px;
    }

    .modal-buttons {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
    }

    .modal-button {
      padding: 10px 20px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
    }

    .confirm-button {
      background: var(--primary);
      color: var(--light);
    }

    .cancel-button {
      background: var(--grey);
    }

    .download-section {
      text-align: center;
      padding: 20px;
      background: var(--light);
      border-radius: 12px;
      margin-top: 30px;
    }

    .section-title {
      font-size: 18px;
      font-weight: 600;
      margin: 30px 0 15px 0;
    }
  </style>
  
</head>
<body>

  <div class="container">
    <!-- <div class="header">
      <h1>Financial Dashboard</h1>
    </div> -->

    <div class="wallet-container">
      <div class="left-side">
        <!-- Wallet Card -->
        <div class="wallet-card">
          <div>Wallet Balance</div>
          <div class="balance">Rs. 15,750.00</div>
          <div class="button-group">
            <button class="button" onclick="showWithdrawModal()">
              ↓ Withdraw
            </button>
           
          </div>
        </div>

        <!-- Payment Types Section -->
        <div class="subscription-card">
          <div>
            <h2>Current Subscription</h2>
            <div style="margin: 20px 0;">
              <div style="font-size: 20px; font-weight: 600; margin-bottom: 10px;">Premium Plan</div>
              <div>Status: Active</div>
              <div>Expires: March 15, 2025</div>
              <div style="color: var(--dark-grey);">30 days remaining</div>
            </div>
            <button class="button">Renew Subscription</button>
          </div>
          <svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" 
          fill="#FFD700" stroke="#DAA520" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>


        </div>

        <!-- Payment Types Section -->
        <div class="section-title">Payment Methods</div>
        <div class="payment-types-grid">
          <div class="stat-card">
            <div class="stat-header">
              <div class="stat-icon" style="background: var(--primary)">💳</div>
              <div>Card Payments</div>
            </div>
            <div class="stat-amount">Rs. 8,250.00</div>
            <div>Last payment: Feb 12, 2025</div>
            <!-- <div style="margin-top: 10px">
              <div>Credit: Rs. 5,750.00</div>
              <div>Debit: Rs. 2,500.00</div>
            </div> -->
          </div>

          <div class="stat-card">
            <div class="stat-header">
              <div class="stat-icon" style="background: var(--success)">💵</div>
              <div>Cash Payments</div>
            </div>
            <div class="stat-amount">Rs. 7,500.00</div>
            <div>Last payment: Feb 14, 2025</div>
            <!-- <div style="margin-top: 10px">
              <div>Received: 12 transactions</div>
              <div>Average: Rs. 625.00</div>
            </div> -->
          </div>
        </div>
      </div>

      <div class="right-side">
        <!-- Payment Statistics -->
        <div class="section-title">Payment Statistics</div>
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-header">
              <div class="stat-icon" style="background: var(--primary)">💰</div>
              <div>Holding Amount</div>
            </div>
            <div class="stat-amount">Rs. 5,200.00</div>
            <div>3 pending transactions</div>
          </div>

          <div class="stat-card">
            <div class="stat-header">
              <div class="stat-icon" style="background: var(--success)">✓</div>
              <div>Completed Payments</div>
            </div>
            <div class="stat-amount">Rs. 12,450.00</div>
            <div>15 transactions</div>
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
            <div class="stat-amount">Rs. 150.00</div>
            <div>1 transaction</div>
          </div>
        </div>

        <!-- Download Report Section -->
        <div class="download-section">
          <h2 style="margin-bottom: 15px;">Download Reports</h2>
          <button class="button" style="background: var(--primary); margin: 0 auto;">
            Download Transaction History
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Withdraw Modal -->
  <div id="withdrawModal" class="modal">
    <div class="modal-content">
      <h2 style="margin-bottom: 20px;">Withdraw Funds</h2>
      
      <div class="form-group">
        <label>Withdrawal Method</label>
        <select>
          <option>Bank Transfer</option>
          <option>Credit Card</option>
        </select>
      </div>

      <div class="form-group">
        <label>Amount</label>
        <input type="number" placeholder="Enter amount">
      </div>
      <div class="form-group">
        <label>Bank</label>
        <input type="text" placeholder="Bank Name">
      </div>
      <div class="form-group">
        <label>Account Number</label>
        <input type="number" placeholder="Account Number">
      </div>
      <div class="form-group">
        <label>Account Name</label>
        <input type="text" placeholder="Account Name">
      </div>
      <div class="form-group">
        <label>Branch </label>
        <input type="text" placeholder="Branach name">
      </div>

      <div class="modal-buttons">
        <button class="modal-button cancel-button" onclick="hideWithdrawModal()">Cancel</button>
        <button class="modal-button confirm-button">Confirm Withdrawal</button>
      </div>
    </div>
  </div>

  <script>
    function showWithdrawModal() {
      document.getElementById('withdrawModal').style.display = 'flex';
    }

    function hideWithdrawModal() {
      document.getElementById('withdrawModal').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
      const modal = document.getElementById('withdrawModal');
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    }
  </script>
</body>
</html>