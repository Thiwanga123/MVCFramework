<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventory.css">
    <title>Travelers-Admin</title>
    <style>
        /* Custom Dialog Box Styles */
        .tl-dialog-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }
        
        .tl-dialog-overlay.tl-show {
            opacity: 1;
            visibility: visible;
        }
        
        .tl-dialog-box {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            padding: 0;
            overflow: hidden;
            transform: translateY(-20px);
            transition: transform 0.3s;
            animation: tl-bounce-in 0.5s forwards;
        }
        
        @keyframes tl-bounce-in {
            0% { transform: translateY(-50px); opacity: 0; }
            70% { transform: translateY(10px); opacity: 1; }
            100% { transform: translateY(0); opacity: 1; }
        }
        
        .tl-dialog-header {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #eaeaea;
        }
        
        .tl-dialog-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 12px;
        }
        
        .tl-dialog-icon svg {
            width: 20px;
            height: 20px;
        }
        
        .tl-dialog-title {
            font-size: 18px;
            font-weight: 600;
            flex-grow: 1;
        }
        
        .tl-dialog-body {
            padding: 20px;
            font-size: 16px;
            color: #4a4a4a;
            line-height: 1.5;
        }
        
        .tl-dialog-footer {
            padding: 15px 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            border-top: 1px solid #eaeaea;
        }
        
        .tl-dialog-btn {
            padding: 10px 16px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }
        
        .tl-dialog-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        /* Success Dialog */
        .tl-dialog-success .tl-dialog-header {
            background-color: #f0faf0;
        }
        
        .tl-dialog-success .tl-dialog-icon {
            background-color: #28a745;
            color: white;
        }
        
        .tl-dialog-success .tl-dialog-title {
            color: #28a745;
        }
        
        .tl-dialog-success .tl-dialog-btn-primary {
            background-color: #28a745;
            color: white;
        }
        
        .tl-dialog-success .tl-dialog-btn-primary:hover {
            background-color: #218838;
        }
        
        /* Error Dialog */
        .tl-dialog-error .tl-dialog-header {
            background-color: #fdf3f3;
        }
        
        .tl-dialog-error .tl-dialog-icon {
            background-color: #dc3545;
            color: white;
        }
        
        .tl-dialog-error .tl-dialog-title {
            color: #dc3545;
        }
        
        .tl-dialog-error .tl-dialog-btn-primary {
            background-color: #dc3545;
            color: white;
        }
        
        .tl-dialog-error .tl-dialog-btn-primary:hover {
            background-color: #c82333;
        }
        
        /* Confirm Dialog */
        .tl-dialog-confirm .tl-dialog-header {
            background-color: #f0f7fc;
        }
        
        .tl-dialog-confirm .tl-dialog-icon {
            background-color: #007bff;
            color: white;
        }
        
        .tl-dialog-confirm .tl-dialog-title {
            color: #007bff;
        }
        
        .tl-dialog-confirm .tl-dialog-btn-primary {
            background-color: #007bff;
            color: white;
        }
        
        .tl-dialog-confirm .tl-dialog-btn-primary:hover {
            background-color: #0069d9;
        }
        
        .tl-dialog-confirm .tl-dialog-btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        
        .tl-dialog-confirm .tl-dialog-btn-secondary:hover {
            background-color: #5a6268;
        }
        
        /* Traveler Table Styles */
        .tl-search-container {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .tl-search-input {
            flex-grow: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23aaa"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>');
            background-repeat: no-repeat;
            background-position: 10px center;
            background-size: 20px;
            padding-left: 40px;
        }
        
        .tl-search-input:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        
        .tl-travelers-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-bottom: 20px;
        }
        
        .tl-travelers-table th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: 600;
            text-align: left;
            padding: 12px 15px;
            border-bottom: 2px solid #dee2e6;
        }
        
        .tl-travelers-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #dee2e6;
            vertical-align: middle;
        }
        
        .tl-travelers-table tr:hover {
            background-color: #f5f5f5;
        }
        
        .tl-travelers-table .tl-action-cell {
            display: flex;
            gap: 8px;
        }
        
        .tl-view-btn, .tl-delete-btn, .tl-activate-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .tl-view-btn {
            background-color: #007bff;
            color: white;
        }
        
        .tl-view-btn:hover {
            background-color: #0069d9;
        }
        
        .tl-delete-btn {
            background-color: #dc3545;
            color: white;
        }
        
        .tl-delete-btn:hover {
            background-color: #c82333;
        }
        
        .tl-activate-btn {
            background-color: #28a745;
            color: white;
        }
        
        .tl-activate-btn:hover {
            background-color: #218838;
        }
        
        /* Modal for Traveler Details */
        .tl-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        
        .tl-modal-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: 90%;
            max-width: 600px;
            padding: 0;
            overflow: hidden;
            animation: tl-modal-in 0.3s forwards;
        }
        
        @keyframes tl-modal-in {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .tl-modal-header {
            padding: 15px 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .tl-modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #212529;
            margin: 0;
        }
        
        .tl-modal-close {
            background: none;
            border: none;
            font-size: 24px;
            color: #6c757d;
            cursor: pointer;
            padding: 0;
        }
        
        .tl-modal-close:hover {
            color: #343a40;
        }
        
        .tl-modal-body {
            padding: 20px;
        }
        
        .tl-traveler-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .tl-detail-item {
            margin-bottom: 10px;
        }
        
        .tl-detail-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
        }
        
        .tl-detail-value {
            color: #212529;
        }
        
        .tl-no-results {
            text-align: center;
            padding: 20px;
            color: #6c757d;
            font-style: italic;
        }
        
        /* Pagination Styles */
        .tl-pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 5px;
        }
        
        .tl-pagination-btn {
            padding: 8px 12px;
            border: 1px solid #dee2e6;
            background-color: #fff;
            color: #007bff;
            cursor: pointer;
            border-radius: 4px;
            transition: all 0.2s;
        }
        
        .tl-pagination-btn:hover {
            background-color: #e9ecef;
        }
        
        .tl-pagination-btn.tl-active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
        
        .tl-pagination-btn.tl-disabled {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
        }
    </style>
</head>
<body>

<div class="box">
    <!-- SideBar -->
    <?php require APPROOT . '/views/inc/components/adminsidebar.php'; ?>
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
            <p>Hii Welcome <?php echo isset($_SESSION['name']) ? ' ' . htmlspecialchars($_SESSION['name']) : ''; ?> </p>
            <a href="#" class="profile">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1 id="header-title">Travelers</h1>
                </div>
            </div>
        
            <!--Insights-->
            <ul class="insights">
                <li>
                    <div class="products">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-120q-138 0-240.5-91.5T122-440h82q14 104 92.5 172T480-200q117 0 198.5-81.5T760-480q0-117-81.5-198.5T480-760q-69 0-129 32t-101 88h110v80H120v-240h80v94q51-64 124.5-99T480-840q75 0 140.5 28.5t114 77T812-620t28 140q0 75-28.5 140.5t-77.5 114t-114 77T480-120Zm112-192L440-464v-216h80v184l128 128-56 56Z"/></svg>
                    </div>
                    <span class="info">
                        <h3><?php echo $data['number_of_travelers'];?></h3>
                        <p>Registered Travelers</p>
                    </span>
                </li>
                <li>
                    <div class="view">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-80q-83 0-141.5-58.5T280-280q0-83 58.5-141.5T480-480q83 0 141.5 58.5T680-280q0 83-58.5 141.5T480-80ZM200-440q-33 0-56.5-23.5T120-520v-240q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v240q0 33-23.5 56.5T760-440H200Zm0-80h560v-240H200v240Zm280 240Z"/></svg>
                    </div>
                    <span class="info">
                        <h3><?php echo $data['recently_joined_travelers'];?></h3>
                        <p>Recently joined</p>
                    </span>
                </li>
                <li>
                    <div class="earnings">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M560-440q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM280-320q-33 0-56.5-23.5T200-400v-320q0-33 23.5-56.5T280-800h560q33 0 56.5 23.5T920-720v320q0 33-23.5 56.5T840-320H280Zm80-80h400q0-33 23.5-56.5T840-480v-160q-33 0-56.5-23.5T760-720H360q0 33-23.5 56.5T280-640v160q33 0 56.5 23.5T360-400Zm440 320H120q-33 0-56.5-23.5T40-160v-400q0-17 11.5-28.5T80-600q17 0 28.5 11.5T120-560v400h680q17 0 28.5 11.5T840-120q0 17-11.5 28.5T800-80ZM280-400v-320 320Z"/></svg>
                    </div>
                    <span class="info">
                        <h3>Rs.30,000</h3>
                        <p>Earnings Received</p>
                    </span>
                </li>
                <li>
                    <div class="pendings">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Zm-40 120v-240h80v240h-80Zm40 80q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Z"/></svg>
                    </div>
                    <span class="info">
                        <h3>2</h3>
                        <p>Pending Trips</p>
                    </span>
                </li>
            </ul>
            <!--End of Insights-->
        
            <!-- All Travelers Table Section -->
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <h3>All Travelers</h3>
                    </div>
                    
                    <!-- Search Container -->
                    <div class="tl-search-container">
                        <input type="text" id="tl-search-input" class="tl-search-input" placeholder="Search by name, ID or phone number...">
                    </div>
                    
                    <!-- Travelers Table -->
                    <table class="tl-travelers-table" id="tl-travelers-table">
                        <thead>
                            <tr>
                                <th>Traveler ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Date Joined</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tl-travelers-tbody">
                            <!-- Table rows will be populated dynamically -->
                        </tbody>
                    </table>
                    
                    <!-- Pagination -->
                    <div class="tl-pagination" id="tl-pagination">
                        <!-- Pagination buttons will be added dynamically -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Traveler Details Modal -->
<div class="tl-modal-overlay" id="tl-traveler-modal">
    <div class="tl-modal-container">
        <div class="tl-modal-header">
            <h2 class="tl-modal-title">Traveler Details</h2>
            <button class="tl-modal-close">&times;</button>
        </div>
        <div class="tl-modal-body">
            <div class="tl-traveler-details" id="tl-traveler-details">
                <!-- Traveler details will be populated dynamically -->
            </div>
        </div>
    </div>
</div>

<!-- Custom Dialog Container -->
<div id="tl-dialog-container"></div>

<script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Dialog System
    const dialogSystem = {
        container: document.getElementById('tl-dialog-container'),
        
        // Create dialog HTML
        createDialogHTML: function(type, title, message, buttons) {
            // Define icons based on dialog type
            const icons = {
                success: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>',
                error: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 15h2v2h-2zm0-8h2v6h-2zm.99-5C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/></svg>',
                confirm: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>'
            };
            
            // Create buttons HTML
            let buttonsHTML = '';
            buttons.forEach(button => {
                const btnClass = button.primary ? 'tl-dialog-btn-primary' : 'tl-dialog-btn-secondary';
                buttonsHTML += `<button class="tl-dialog-btn ${btnClass}" data-action="${button.action}">${button.text}</button>`;
            });
            
            // Return complete dialog HTML
            return `
                <div class="tl-dialog-overlay">
                    <div class="tl-dialog-box tl-dialog-${type}">
                        <div class="tl-dialog-header">
                            <div class="tl-dialog-icon">
                                ${icons[type]}
                            </div>
                            <div class="tl-dialog-title">${title}</div>
                        </div>
                        <div class="tl-dialog-body">
                            ${message}
                        </div>
                        <div class="tl-dialog-footer">
                            ${buttonsHTML}
                        </div>
                    </div>
                </div>
            `;
        },
        
        // Show dialog
        show: function(options) {
            const defaults = {
                type: 'confirm',
                title: 'Confirmation',
                message: '',
                buttons: [
                    { text: 'OK', action: 'close', primary: true }
                ],
                onAction: null
            };
            
            const settings = { ...defaults, ...options };
            
            // Create dialog element
            const dialogElement = document.createElement('div');
            dialogElement.innerHTML = this.createDialogHTML(
                settings.type, 
                settings.title, 
                settings.message, 
                settings.buttons
            );
            
            // Add to container
            this.container.appendChild(dialogElement);
            
            // Show dialog with animation
            setTimeout(() => {
                const overlay = dialogElement.querySelector('.tl-dialog-overlay');
                overlay.classList.add('tl-show');
            }, 10);
            
            // Add event listeners to buttons
            const buttons = dialogElement.querySelectorAll('.tl-dialog-btn');
            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const action = button.dataset.action;
                    
                    // Close the dialog
                    const overlay = dialogElement.querySelector('.tl-dialog-overlay');
                    overlay.classList.remove('tl-show');
                    
                    setTimeout(() => {
                        dialogElement.remove();
                    }, 300);
                    
                    // Call the callback if provided
                    if (settings.onAction) {
                        settings.onAction(action);
                    }
                });
            });
        },
        
        // Shorthand methods
        success: function(message, callback) {
            this.show({
                type: 'success',
                title: 'Success',
                message: message,
                onAction: callback
            });
        },
        
        error: function(message, callback) {
            this.show({
                type: 'error',
                title: 'Error',
                message: message,
                onAction: callback
            });
        },
        
        confirm: function(message, callback) {
            this.show({
                type: 'confirm',
                title: 'Confirmation',
                message: message,
                buttons: [
                    { text: 'Yes', action: 'yes', primary: true },
                    { text: 'No', action: 'no', primary: false }
                ],
                onAction: (action) => {
                    if (callback) {
                        callback(action === 'yes');
                    }
                }
            });
        }
    };

    // Travelers data handling
    let allTravelers = [];
    let currentPage = 1;
    const rowsPerPage = 10;

    // Fetch all travelers
    function fetchAllTravelers() {
        fetch('<?php echo URLROOT; ?>/admin/getAllTravelers')
            .then(response => response.json())
            .then(data => {
                allTravelers = data;
                renderTravelers(allTravelers);
                setupPagination(allTravelers);
            })
            .catch(error => {
                console.error('Error fetching travelers:', error);
                dialogSystem.error('Failed to load travelers data. Please try again.');
            });
    }

    // Render travelers table
    function renderTravelers(travelers, page = 1) {
        const tableBody = document.getElementById('tl-travelers-tbody');
        tableBody.innerHTML = '';
        
        if (travelers.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="7" class="tl-no-results">No travelers found</td>
                </tr>
            `;
            return;
        }
        
        // Calculate pagination
        const startIndex = (page - 1) * rowsPerPage;
        const endIndex = Math.min(startIndex + rowsPerPage, travelers.length);
        const paginatedTravelers = travelers.slice(startIndex, endIndex);
        
        paginatedTravelers.forEach(traveler => {
            const row = document.createElement('tr');
            
            const statusClass = traveler.action === 'deleted' ? 'text-danger' : 'text-success';
            const statusText = traveler.action === 'deleted' ? 'Deleted' : 'Active';
            
            row.innerHTML = `
                <td>${traveler.traveler_id}</td>
                <td>${traveler.name}</td>
                <td>${traveler.email}</td>
                <td>${traveler.telephone_number}</td>
                <td>${new Date(traveler.date_of_joined).toLocaleDateString()}</td>
                <td class="${statusClass}">${statusText}</td>
                <td class="tl-action-cell">
                    <button class="tl-view-btn" data-id="${traveler.traveler_id}">View</button>
                    ${
                        traveler.action === 'deleted' 
                        ? `<button class="tl-activate-btn" data-id="${traveler.traveler_id}">Activate</button>` 
                        : `<button class="tl-delete-btn" data-id="${traveler.traveler_id}">Delete</button>`
                    }
                </td>
            `;
            
            tableBody.appendChild(row);
        });
        
        // Add event listeners to action buttons
        addActionButtonListeners();
    }

    // Setup pagination
    function setupPagination(travelers) {
        const paginationContainer = document.getElementById('tl-pagination');
        paginationContainer.innerHTML = '';
        
        const totalPages = Math.ceil(travelers.length / rowsPerPage);
        
        if (totalPages <= 1) {
            return;
        }
        
        // Previous button
        const prevButton = document.createElement('button');
        prevButton.classList.add('tl-pagination-btn');
        prevButton.textContent = '«';
        prevButton.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderTravelers(travelers, currentPage);
                updatePaginationButtons();
            }
        });
        paginationContainer.appendChild(prevButton);
        
        // Page buttons
        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.classList.add('tl-pagination-btn');
            pageButton.textContent = i;
            pageButton.addEventListener('click', () => {
                currentPage = i;
                renderTravelers(travelers, currentPage);
                updatePaginationButtons();
            });
            paginationContainer.appendChild(pageButton);
        }
        
        // Next button
        const nextButton = document.createElement('button');
        nextButton.classList.add('tl-pagination-btn');
        nextButton.textContent = '»';
        nextButton.addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                renderTravelers(travelers, currentPage);
                updatePaginationButtons();
            }
        });
        paginationContainer.appendChild(nextButton);
        
        // Initial update
        updatePaginationButtons();
        
        function updatePaginationButtons() {
            const buttons = paginationContainer.querySelectorAll('.tl-pagination-btn');
            
            buttons.forEach((button, index) => {
                // Skip first (prev) and last (next) buttons
                if (index === 0) {
                    button.classList.toggle('tl-disabled', currentPage === 1);
                } else if (index === buttons.length - 1) {
                    button.classList.toggle('tl-disabled', currentPage === totalPages);
                } else {
                    const pageNum = index;
                    button.classList.toggle('tl-active', pageNum === currentPage);
                }
            });
        }
    }

    // Add event listeners to action buttons
    function addActionButtonListeners() {
        // View buttons
        document.querySelectorAll('.tl-view-btn').forEach(button => {
            button.addEventListener('click', () => {
                const travelerId = button.dataset.id;
                viewTravelerDetails(travelerId);
            });
        });
        
        // Delete buttons
        document.querySelectorAll('.tl-delete-btn').forEach(button => {
            button.addEventListener('click', () => {
                const travelerId = button.dataset.id;
                dialogSystem.confirm('Are you sure you want to delete this traveler?', (confirmed) => {
                    if (confirmed) {
                        deleteTraveler(travelerId);
                    }
                });
            });
        });
        
        // Activate buttons
        document.querySelectorAll('.tl-activate-btn').forEach(button => {
            button.addEventListener('click', () => {
                const travelerId = button.dataset.id;
                dialogSystem.confirm('Are you sure you want to activate this traveler?', (confirmed) => {
                    if (confirmed) {
                        activateTraveler(travelerId);
                    }
                });
            });
        });
    }

    // View traveler details
    function viewTravelerDetails(travelerId) {
        fetch(`<?php echo URLROOT; ?>/admin/getTravelerDetails/${travelerId}`)
            .then(response => response.json())
            .then(traveler => {
                const detailsContainer = document.getElementById('tl-traveler-details');
                
                if (!traveler) {
                    detailsContainer.innerHTML = '<p>Traveler not found</p>';
                    return;
                }
                
                detailsContainer.innerHTML = `
                    <div class="tl-detail-item">
                        <div class="tl-detail-label">ID</div>
                        <div class="tl-detail-value">${traveler.traveler_id}</div>
                    </div>
                    <div class="tl-detail-item">
                        <div class="tl-detail-label">Name</div>
                        <div class="tl-detail-value">${traveler.name}</div>
                    </div>
                    <div class="tl-detail-item">
                        <div class="tl-detail-label">Email</div>
                        <div class="tl-detail-value">${traveler.email}</div>
                    </div>
                    <div class="tl-detail-item">
                        <div class="tl-detail-label">Phone</div>
                        <div class="tl-detail-value">${traveler.telephone_number}</div>
                    </div>
                    <div class="tl-detail-item">
                        <div class="tl-detail-label">Date Joined</div>
                        <div class="tl-detail-value">${new Date(traveler.date_of_joined).toLocaleDateString()}</div>
                    </div>
                    <div class="tl-detail-item">
                        <div class="tl-detail-label">Status</div>
                        <div class="tl-detail-value">${traveler.action === 'deleted' ? 'Deleted' : 'Active'}</div>
                    </div>
                    <div class="tl-detail-item">
                        <div class="tl-detail-label">Address</div>
                        <div class="tl-detail-value">${traveler.address || 'Not provided'}</div>
                    </div>
                    <div class="tl-detail-item">
                        <div class="tl-detail-label">Total Trips</div>
                        <div class="tl-detail-value">${traveler.total_trips || '0'}</div>
                    </div>
                `;
                
                // Show modal
                document.getElementById('tl-traveler-modal').style.display = 'flex';
            })
            .catch(error => {
                console.error('Error fetching traveler details:', error);
                dialogSystem.error('Failed to load traveler details. Please try again.');
            });
    }

    // Delete traveler
    function deleteTraveler(travelerId) {
        fetch(`<?php echo URLROOT; ?>/admin/updateTravelerStatus`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ 
                traveler_id: travelerId,
                action: 'delete'
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                dialogSystem.success('Traveler has been deleted successfully.', () => {
                    fetchAllTravelers(); // Refresh the table
                });
            } else {
                dialogSystem.error('Failed to delete traveler. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error deleting traveler:', error);
            dialogSystem.error('An error occurred while deleting the traveler.');
        });
    }

    // Activate traveler
    function activateTraveler(travelerId) {
        fetch(`<?php echo URLROOT; ?>/admin/updateTravelerStatus`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ 
                traveler_id: travelerId,
                action: 'activate'
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                dialogSystem.success('Traveler has been activated successfully.', () => {
                    fetchAllTravelers(); // Refresh the table
                });
            } else {
                dialogSystem.error('Failed to activate traveler. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error activating traveler:', error);
            dialogSystem.error('An error occurred while activating the traveler.');
        });
    }

    // Search functionality
    const searchInput = document.getElementById('tl-search-input');
    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.toLowerCase();
        
        if (searchTerm.trim() === '') {
            renderTravelers(allTravelers, 1);
            setupPagination(allTravelers);
            return;
        }
        
        const filteredTravelers = allTravelers.filter(traveler => {
            return (
                traveler.name.toLowerCase().includes(searchTerm) ||
                traveler.traveler_id.toString().includes(searchTerm) ||
                traveler.telephone_number.toLowerCase().includes(searchTerm)
            );
        });
        
        currentPage = 1;
        renderTravelers(filteredTravelers, 1);
        setupPagination(filteredTravelers);
    });

    // Modal close functionality
    const modal = document.getElementById('tl-traveler-modal');
    const closeButton = document.querySelector('.tl-modal-close');
    
    closeButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });
    
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Initial load
    fetchAllTravelers();
});
</script>
</body>
</html>
