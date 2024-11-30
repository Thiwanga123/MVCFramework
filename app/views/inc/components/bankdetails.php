<html>
 <head>
  <title>
   Manage Bank Accounts
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5em;
            color: #333;
        }
        .form-container, .accounts-container {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2, .accounts-container h2 {
            margin-top: 0;
            font-size: 1.5em;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #2ba78;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
        .form-group button:hover {
            background-color: #3aafa9;
        }
        .accounts-list {
            list-style: none;
            padding: 0;
        }
        .accounts-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .accounts-list li:last-child {
            border-bottom: none;
        }
        .account-info {
            display: flex;
            align-items: center;
        }
        .account-info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .account-info .account-details {
            display: flex;
            flex-direction: column;
        }
        .account-info .account-details span {
            font-size: 1em;
            color: #333;
        }
        .account-info .account-details span.account-name {
            font-weight: 700;
        }
        .account-actions button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 0.9em;
        }
        .account-actions button:hover {
            background-color: #c82333;
        }
  </style>
 </head>
 <body>
  <div class="container">
   <div class="header">
    <h1>
     <i class="fas fa-university">
     </i>
     Manage Bank Accounts
    </h1>
   </div>
   <div class="form-container">
    <h2>
     <i class="fas fa-plus-circle">
     </i>
     Add New Bank Account
    </h2>
    <div class="form-group">
     <label for="bank-name">
      Bank Name
     </label>
     <input id="bank-name" placeholder="Enter bank name" type="text"/>
    </div>
    <div class="form-group">
     <label for="account-number">
      Account Number
     </label>
     <input id="account-number" placeholder="Enter account number" type="text"/>
    </div>
    <div class="form-group">
     <label for="account-holder">
      Account Holder Name
     </label>
     <input id="account-holder" placeholder="Enter account holder name" type="text"/>
    </div>
    <div class="form-group">
     <button onclick="addAccount()" type="button">
      <i class="fas fa-plus">
      </i>
      Add Account
     </button>
    </div>
   </div>
   <div class="accounts-container">
    <h2>
     <i class="fas fa-list">
     </i>
     My Bank Accounts
    </h2>
    <ul class="accounts-list" id="accounts-list">
     <li>
      <div class="account-info">
       <img alt="Bank logo placeholder" height="50" src="https://storage.googleapis.com/a1aa/image/UqBnOZuNAJLFIx8ARHs7MAx6tALvwM2NjiWA9bd5kMNBgi9E.jpg" width="50"/>
       <div class="account-details">
        <span class="account-name">
         Bank of Ceylon
        </span>
        <span>
         Account Number: 123456789
        </span>
        <span>
         Holder: Sanjula Ranathunga
        </span>
       </div>
      </div>
      <div class="account-actions">
       <button onclick="removeAccount(this)" type="button">
        <i class="fas fa-trash-alt">
        </i>
        Remove
       </button>
      </div>
     </li>
    
    </ul>
   </div>
  </div>
  <script>
   function addAccount() {
            const bankName = document.getElementById('bank-name').value;
            const accountNumber = document.getElementById('account-number').value;
            const accountHolder = document.getElementById('account-holder').value;

            if (bankName && accountNumber && accountHolder) {
                const accountsList = document.getElementById('accounts-list');
                const newAccount = document.createElement('li');
                newAccount.innerHTML = `
                    <div class="account-info">
                        <img alt="Bank logo placeholder" height="50" src="https://placehold.co/50x50" width="50"/>
                        <div class="account-details">
                            <span class="account-name">${bankName}</span>
                            <span>Account Number: ${accountNumber}</span>
                            <span>Holder: ${accountHolder}</span>
                        </div>
                    </div>
                    <div class="account-actions">
                        <button type="button" onclick="removeAccount(this)">
                            <i class="fas fa-trash-alt"></i>
                            Remove
                        </button>
                    </div>
                `;
                accountsList.appendChild(newAccount);

                // Clear the form fields
                document.getElementById('bank-name').value = '';
                document.getElementById('account-number').value = '';
                document.getElementById('account-holder').value = '';
            } else {
                alert('Please fill in all fields');
            }
        }

        function removeAccount(button) {
            const accountItem = button.closest('li');
            accountItem.remove();
        }
  </script>
 </body>
</html>