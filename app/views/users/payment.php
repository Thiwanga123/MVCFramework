<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    body {
      display: flex;
      justify-content: center;
      padding: 20px;
      background-color: #f9f9f9;
    }
    .container {
      display: flex;
      max-width: 900px;
      width: 100%;
      gap: 20px;
      flex-wrap: wrap;
    }
    .form-container, .summary-container {
      background-color: white;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-container {
      flex: 1;
      min-width: 300px;
    }
    .summary-container {
      flex: 0.4;
      min-width: 280px;
      background-color: rgb(21, 126, 126);
      color: white;
    }
    h2 {
      margin-top: 0;
    }
    .input-group {
      margin-bottom: 15px;
    }
    .input-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    .input-group input[type="text"],
    .input-group input[type="email"],
    .input-group input[type="number"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    .payment-methods {
      display: flex;
      gap: 10px;
      margin-bottom: 15px;
    }
    .payment-methods button {
      flex: 1;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      background-color: white;
      cursor: pointer;
      font-weight: bold;
    }
    .payment-methods .selected {
      background-color: rgb(21, 126, 126);
      color: white;
     
    }
    .terms {
      display: flex;
      align-items: center;
      font-size: 14px;
    }
    .terms input {
      margin-right: 10px;
    }
    .confirm-btn {
      width: 100%;
      padding: 12px;
      background-color: rgb(21, 126, 126);
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    .right{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
       
    }
    .order-summary {
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
      gap:20px;

    }
    .order-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }
    .order-total {
      font-weight: bold;
      font-size: 18px;
      margin-top: 15px;
    }
    .coupon {
      display: flex;
      gap: 10px;
      flex-direction: column;
      margin-top: 15px;
    }
    .coupon input {
      flex: 1;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    .coupon button {
      padding: 10px;
      background-color: rgb(21, 126, 126);
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .row {
      display: flex;
      gap: 10px;
    }
    .row input {
      width: 100%;
    }
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="form-container">
    <h2>Personal Information</h2>
    <div class="input-group">
      <label for="full-name">Full Name</label>
      <input type="text" id="full-name" placeholder=" Ex:ABC ">
    </div>
    <div class="input-group">
      <label for="email">Email Address</label>
      <input type="email" id="email" placeholder="Ex: abc@gmail.com">
    </div>

    <h2>Payment Details</h2>
    <div class="payment-methods">
      <button class="selected" onclick="selectPaymentMethod(this)">Visa </button>
      <button onclick="selectPaymentMethod(this)">Master</button>
    </div>
    <div class="input-group">
      <label for="cardholder-name">Cardholder Name</label>
      <input type="text" id="cardholder-name" placeholder="Cardholder Name">
    </div>
    <div class="input-group">
      <label for="card-number">Card Number</label>
     
      <input type="number" id="card-number" placeholder="0000 0000 0000 0000">
    </div>
    <div class="input-group row">
      <input type="text" placeholder="MM" id="expiry-month">
      <input type="text" placeholder="YYYY" id="expiry-year">
      <input type="text" placeholder="CVC" id="cvc">
    </div>
    <div class="terms">
      <input type="checkbox" id="terms">
      <label for="terms">I agree to the company's Terms of Service</label>
    </div>
    <br>
    <button class="confirm-btn">Confirm Payment</button>
  </div>

  <div class="right">
  <div class="summary-container">
    <h2>Order Summary</h2>
    <div class="order-summary">
      <div class="order-item">
        <span>Place:</span>
        <span>badulla</span>
      </div>
      <div class="order-item">
        <span>No of Dates:</span>
        <span>5</span>
      </div>
      <div class="order-item">
        <span>No of People</span>
        <span>4</span>
      </div>
      <div class="order-item">
        <span>Accomadation:</span>
        <span>$14.00</span>
      </div>
      <div class="order-item">
        <span>Guide:</span>
        <span>$14.00</span>
      </div>
      <div class="order-item">
        <span>Transport:</span>
        <span>$14.00</span>
      </div>
      <div class="order-item">
        <span>Equipment:</span>
        <span>$14.00</span>
      </div>
      <div class="order-item">
        <span>Package:</span>
        <span>$14.00</span>
      </div>
      
    </div>
    <div class="order-total">
      <span>Total Amount</span>
      <span>$53.00</span>
    </div>
    
    <!-- Coupon section moved inside summary-container and below the order total -->
    
  </div>
  
  <div class="coupon">
    <input type="text" placeholder="Enter code to get discount instantly">
    <button>Apply</button>
  </div>

</div>
</div>

<script>
  function selectPaymentMethod(button) {
    document.querySelectorAll('.payment-methods button').forEach(btn => btn.classList.remove('selected'));
    button.classList.add('selected');
  }
</script>

</body>
</html>
