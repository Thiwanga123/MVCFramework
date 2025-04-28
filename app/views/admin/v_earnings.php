<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard.css">
    <title>Earnings-Admin</title>
</head>
<body>
    <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/adminsidebar.php'; ?>
     <!-- End Of Sidebar -->

     <!--Main Content-->
     <div class="content">
        <!--navbar-->
        <nav>
            <svg class="menu" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-269.23v-40h640v40H160ZM160-460v-40h640v40H160Zm0-190.77v-40h640v40H160Z"/></svg>
            <form action="#">
            <div class="hotline">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path d="M798-120q-125 0-246-58.5T330-329Q229-430 170.5-551T112-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T386-386q31 26 65 47.5t72 38.5l95-98q9-9 21.5-13.5T670-418l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12Z"/>
                </svg>
                <span>Hotline: 011-4392831</span>
            </div>
            </form>
            
            <p>Hii Welcome <?php echo isset($_SESSION['name']) ? ' ' . htmlspecialchars($_SESSION['name']) : ''; ?> </p>
            <a href="#" class="profile">
            <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1 id = "header-title"> Earnings</h1>
                </div>
            </div>
        
            <?php if(isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <!--Insights-->
            <ul class="insights">
                <li>
                    <div class="products">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M441-120v-86q-53-12-91.5-46T293-348l74-30q15 48 44.5 73t77.5 25q41 0 69.5-18.5T587-356q0-35-22-55.5T463-458q-86-27-118-64.5T313-614q0-65 42-101t86-41v-84h80v84q50 8 82.5 36.5T651-650l-74 32q-12-32-34-48t-60-16q-44 0-67 19.5T393-614q0 33 30 52t104 40q69 20 104.5 63.5T667-358q0 71-42 108t-104 46v84h-80Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>Rs.150,000.00</h3>
                        <p> Current Month Earnings </p>
                    </span>
                </li>
                <li>
                    <div class="view">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M440-200h80v-40h40q17 0 28.5-11.5T600-280v-120q0-17-11.5-28.5T560-440H440v-40h160v-80h-80v-40h-80v40h-40q-17 0-28.5 11.5T360-520v120q0 17 11.5 28.5T400-360h120v40H360v80h80v40ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-560v-160H240v640h480v-480H520ZM240-800v160-160 640-640Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>Rs.100,000.00</h3>
                        <p>Last Month Earnings</p>
                    </span>
                </li>
                <li>
                    <div class="earnings">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m140-220-60-60 300-300 160 160 284-320 56 56-340 384-160-160-240 240Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>Rs.100,0000.00</h3>
                        <p>Payments for Service Providers</p>
                    </span>
                </li>
                <li>
                    <div class="pendings">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M640-520q17 0 28.5-11.5T680-560q0-17-11.5-28.5T640-600q-17 0-28.5 11.5T600-560q0 17 11.5 28.5T640-520Zm-320-80h200v-80H320v80ZM180-120q-34-114-67-227.5T80-580q0-92 64-156t156-64h200q29-38 70.5-59t89.5-21q25 0 42.5 17.5T720-820q0 6-1.5 12t-3.5 11q-4 11-7.5 22.5T702-751l91 91h87v279l-113 37-67 224H480v-80h-80v80H180Zm60-80h80v-80h240v80h80l62-206 98-33v-141h-40L620-720q0-20 2.5-38.5T630-796q-29 8-51 27.5T547-720H300q-58 0-99 41t-41 99q0 98 27 191.5T240-200Zm240-298Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>Rs.50,000.00</h3>
                        <p>Total Profit</p>
                    </span>
                </li>
            </ul>
            <!--End of Insights-->
        
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M120-80v-800l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v800l-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h480v-80H240v80Zm0-160h480v-80H240v80Zm0-160h480v-80H240v80Zm-40 404h560v-568H200v568Zm0-568v568-568Z"/></svg>
                        <h3>Refund Requests</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Booking Type</th>
                                <th>User Name</th>
                                <th>Amount</th>
                                <th>Request Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data['refundRequests'] as $request): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($request->id); ?></td>
                                <td><?php echo htmlspecialchars($request->booking_type); ?></td>
                                <td><?php echo htmlspecialchars($request->user_name); ?></td>
                                <td>Rs.<?php echo htmlspecialchars($request->amount); ?></td>
                                <td><?php echo date('Y-m-d H:i', strtotime($request->request_date)); ?></td>
                                <td>
                                    <span class="status-badge status-<?php echo strtolower($request->status); ?>">
                                        <?php echo htmlspecialchars($request->status); ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo URLROOT; ?>/admin/getRefundDetails/<?php echo $request->id; ?>" class="btn-view">View</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
        
                <!--Recent updates-->
                <div class="reminders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h440l200 200v440q0 33-23.5 56.5T760-120H200Zm0-80h560v-400H600v-160H200v560Zm80-80h400v-80H280v80Zm0-320h200v-80H280v80Zm0 160h400v-80H280v80Zm-80-320v160-160 560-560Z"/></svg>
                        <h3>Earnings Summary</h3>
        
                    </div>
                    <ul class="update-list">
                        <li>Total Earnings: Rs.100,00,000.00</li>
                        <li>Total Expenses: Rs.50,00,000.00</li>
                        <li>Net Earnings: Rs.50,00,000.00</li>
                       
                    </ul>
                    <div class="earnings-image">
                        <img src="<?php echo URLROOT;?>/Images/earnings.jpg" alt="Earnings">
                    </div>
                </div>
            </div>
        
          </main>

     </div>

    
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>

    <!-- Refund Details Modal -->
    <div id="refundDetailsModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); z-index: 1000; width: 80%; max-width: 800px;">
        <div class="modal-header">
            <h2>Refund Request Details</h2>
            <button id="closeRefundModal" style="background: none; border: none; font-size: 24px; cursor: pointer;">&times;</button>
        </div>
        <div class="modal-content">
            <div class="booking-details">
                <h3>Booking Information</h3>
                <div id="bookingDetails"></div>
            </div>
            <div class="refund-details">
                <h3>Refund Information</h3>
                <div id="refundDetails"></div>
            </div>
            <div class="bank-details">
                <h3>Bank Details</h3>
                <form id="bankDetailsForm">
                    <div class="form-group">
                        <label for="bankName">Bank Name</label>
                        <input type="text" id="bankName" name="bankName" required>
                    </div>
                    <div class="form-group">
                        <label for="accountNumber">Account Number</label>
                        <input type="text" id="accountNumber" name="accountNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="accountHolder">Account Holder Name</label>
                        <input type="text" id="accountHolder" name="accountHolder" required>
                    </div>
                    <div class="form-group">
                        <label for="adminNotes">Admin Notes</label>
                        <textarea id="adminNotes" name="adminNotes" rows="3"></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" id="processRefund" class="btn-success">Process Refund</button>
                        <button type="button" id="rejectRefund" class="btn-danger">Reject Refund</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .modal-content {
            max-height: 70vh;
            overflow-y: auto;
        }
        .booking-details, .refund-details, .bank-details {
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 4px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .btn-success {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-danger {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }
        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load refund requests
            loadRefundRequests();

            // Close modal
            document.getElementById('closeRefundModal').addEventListener('click', function() {
                document.getElementById('refundDetailsModal').style.display = 'none';
            });

            // Process refund
            document.getElementById('processRefund').addEventListener('click', function() {
                const bankDetails = {
                    bankName: document.getElementById('bankName').value,
                    accountNumber: document.getElementById('accountNumber').value,
                    accountHolder: document.getElementById('accountHolder').value,
                    adminNotes: document.getElementById('adminNotes').value
                };

                // Send to server
                processRefund(bankDetails);
            });

            // Reject refund
            document.getElementById('rejectRefund').addEventListener('click', function() {
                const adminNotes = document.getElementById('adminNotes').value;
                rejectRefund(adminNotes);
            });
        });

        function loadRefundRequests() {
            fetch('<?php echo URLROOT; ?>/admin/getRefundRequests')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('refundRequestsTable');
                    tableBody.innerHTML = '';

                    data.forEach(request => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${request.id}</td>
                            <td>${request.booking_type}</td>
                            <td>${request.user_name}</td>
                            <td>Rs.${request.amount}</td>
                            <td>${new Date(request.request_date).toLocaleDateString()}</td>
                            <td><span class="status-badge status-${request.status.toLowerCase()}">${request.status}</span></td>
                            <td>
                                <button onclick="viewRefundDetails(${request.id})" class="btn-view">View</button>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                });
        }

        function viewRefundDetails(requestId) {
            // Store the request ID in the modal
            document.getElementById('refundDetailsModal').setAttribute('data-request-id', requestId);

            fetch(`<?php echo URLROOT; ?>/admin/getRefundDetails/${requestId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('bookingDetails').innerHTML = `
                        <p><strong>Booking ID:</strong> ${data.booking_id}</p>
                        <p><strong>Service Type:</strong> ${data.booking_type}</p>
                        <p><strong>User:</strong> ${data.user_name}</p>
                        <p><strong>Amount:</strong> Rs.${data.amount}</p>
                        <p><strong>Request Date:</strong> ${new Date(data.request_date).toLocaleString()}</p>
                    `;

                    document.getElementById('refundDetails').innerHTML = `
                        <p><strong>Status:</strong> ${data.status}</p>
                        <p><strong>Refund Amount:</strong> Rs.${data.refund_amount}</p>
                    `;

                    document.getElementById('refundDetailsModal').style.display = 'block';
                });
        }

        function processRefund(bankDetails) {
            const requestId = document.getElementById('refundDetailsModal').getAttribute('data-request-id');
            const data = {
                request_id: requestId,
                ...bankDetails
            };

            // Send to server
            fetch('<?php echo URLROOT; ?>/admin/processRefund', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessMessage('Refund processed successfully');
                    document.getElementById('refundDetailsModal').style.display = 'none';
                    loadRefundRequests();
                } else {
                    showErrorMessage(data.message || 'Failed to process refund');
                }
            });
        }

        function rejectRefund(adminNotes) {
            const requestId = document.getElementById('refundDetailsModal').getAttribute('data-request-id');
            const data = {
                request_id: requestId,
                admin_notes: adminNotes
            };

            fetch('<?php echo URLROOT; ?>/admin/rejectRefund', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessMessage('Refund request rejected');
                    document.getElementById('refundDetailsModal').style.display = 'none';
                    loadRefundRequests();
                } else {
                    showErrorMessage(data.message || 'Failed to reject refund');
                }
            });
        }

        function showSuccessMessage(message) {
            // Create and show success message
            const successDiv = document.createElement('div');
            successDiv.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background-color: #4CAF50;
                color: white;
                padding: 15px 25px;
                border-radius: 4px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                z-index: 1000;
            `;
            successDiv.textContent = message;
            document.body.appendChild(successDiv);

            setTimeout(() => {
                successDiv.remove();
            }, 3000);
        }

        function showErrorMessage(message) {
            const errorDiv = document.createElement('div');
            errorDiv.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background-color: #f44336;
                color: white;
                padding: 15px 25px;
                border-radius: 4px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                z-index: 1000;
            `;
            errorDiv.textContent = message;
            document.body.appendChild(errorDiv);

            setTimeout(() => {
                errorDiv.remove();
            }, 3000);
        }
    </script>
</body>

</html>
