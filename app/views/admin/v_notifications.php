<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <title>Dashboard-Admin</title>
    <style>
        .notification-container {
            width: 90%;
            margin: 20px auto;
            font-family: 'Arial', sans-serif;
        }
        
        .notification-header {
            background-color: #4a6fa5;
            color: white;
            padding: 15px 20px;
            border-radius: 8px 8px 0 0;
            font-size: 20px;
            font-weight: bold;
        }
        
        .notification-tabs {
            display: flex;
            background-color: #f1f1f1;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }
        
        .tab {
            padding: 12px 20px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
            text-align: center;
            flex: 1;
        }
        
        .tab:hover {
            background-color: #ddd;
        }
        
        .tab.active {
            background-color: #fff;
            border-bottom: 3px solid #4a6fa5;
        }
        
        .notification-content {
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 8px 8px;
            padding: 15px;
            background-color: #fff;
        }
        
        .notification-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }
        
        .notification-item:hover {
            background-color: #f9f9f9;
        }
        
        .notification-item:last-child {
            border-bottom: none;
        }
        
        .notification-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .refund-icon {
            background-color: #ffecb3;
            color: #ff9800;
        }
        
        .subscription-icon {
            background-color: #e3f2fd;
            color: #2196f3;
        }
        
        .system-icon {
            background-color: #e8f5e9;
            color: #4caf50;
        }
        
        .notification-details {
            flex-grow: 1;
        }
        
        .notification-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .notification-desc {
            color: #666;
            font-size: 14px;
        }
        
        .notification-time {
            color: #999;
            font-size: 12px;
            text-align: right;
            width: 100px;
            flex-shrink: 0;
        }
        
        .notification-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
        }
        
        .action-btn {
            padding: 8px 15px;
            margin-left: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .accept-btn {
            background-color: #4caf50;
            color: white;
        }
        
        .reject-btn {
            background-color: #f44336;
            color: white;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .unread {
            position: relative;
        }
        
        .unread::after {
            content: '';
            position: absolute;
            top: 15px;
            right: 15px;
            width: 10px;
            height: 10px;
            background-color: #f44336;
            border-radius: 50%;
        }
    </style>
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
            <div class="notification-container">
                <div class="notification-header">
                    Notifications
                </div>
                
                <div class="notification-tabs">
                    <div class="tab active" onclick="openTab('all')">All</div>
                    <div class="tab" onclick="openTab('refunds')">Refund Requests</div>
                    <div class="tab" onclick="openTab('subscriptions')">Subscriptions</div>
                    <div class="tab" onclick="openTab('system')">System</div>
                </div>
                
                <div class="notification-content">
                    <!-- All Notifications Tab -->
                    <div id="all" class="tab-content active">
                        <div class="notification-item unread">
                            <div class="notification-icon refund-icon">₨</div>
                            <div class="notification-details">
                                <div class="notification-title">Refund Request from Kumara Perera</div>
                                <div class="notification-desc">Customer requested a refund for Sigiriya Tour Package (ID: SGR-789) due to weather conditions.</div>
                            </div>
                            <div class="notification-time">10 min ago</div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon subscription-icon">S</div>
                            <div class="notification-details">
                                <div class="notification-title">Subscription Expiring: Lakeside Villa</div>
                                <div class="notification-desc">Premium listing for Thisara Fernando's property will expire in 3 days.</div>
                            </div>
                            <div class="notification-time">1 hour ago</div>
                        </div>
                        
                        <div class="notification-item unread">
                            <div class="notification-icon refund-icon">₨</div>
                            <div class="notification-details">
                                <div class="notification-title">Refund Request from Dilshan Gunathilaka</div>
                                <div class="notification-desc">Customer requested a refund for Kandy Tour Equipment rental (ID: KDY-456) due to booking error.</div>
                            </div>
                            <div class="notification-time">2 hours ago</div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon system-icon">!</div>
                            <div class="notification-details">
                                <div class="notification-title">System Update Complete</div>
                                <div class="notification-desc">The system has been updated to version 2.4.0 successfully.</div>
                            </div>
                            <div class="notification-time">Yesterday</div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon subscription-icon">S</div>
                            <div class="notification-details">
                                <div class="notification-title">New Premium Subscription</div>
                                <div class="notification-desc">Malinga Bandara has upgraded to Premium Tour Guide listing.</div>
                            </div>
                            <div class="notification-time">2 days ago</div>
                        </div>
                    </div>
                    
                    <!-- Refund Requests Tab -->
                    <div id="refunds" class="tab-content">
                        <div class="notification-item unread">
                            <div class="notification-icon refund-icon">₨</div>
                            <div class="notification-details">
                                <div class="notification-title">Refund Request from Kumara Perera</div>
                                <div class="notification-desc">Customer requested a refund for Sigiriya Tour Package (ID: SGR-789) due to weather conditions.</div>
                                <div class="notification-actions">
                                    <button class="action-btn accept-btn">Approve</button>
                                    <button class="action-btn reject-btn">Reject</button>
                                </div>
                            </div>
                            <div class="notification-time">10 min ago</div>
                        </div>
                        
                        <div class="notification-item unread">
                            <div class="notification-icon refund-icon">₨</div>
                            <div class="notification-details">
                                <div class="notification-title">Refund Request from Dilshan Gunathilaka</div>
                                <div class="notification-desc">Customer requested a refund for Kandy Tour Equipment rental (ID: KDY-456) due to booking error.</div>
                                <div class="notification-actions">
                                    <button class="action-btn accept-btn">Approve</button>
                                    <button class="action-btn reject-btn">Reject</button>
                                </div>
                            </div>
                            <div class="notification-time">2 hours ago</div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon refund-icon">₨</div>
                            <div class="notification-details">
                                <div class="notification-title">Refund Request from Chamari Athapaththu</div>
                                <div class="notification-desc">Customer requested a refund for Galle Fort Tour (ID: GFT-234) due to illness.</div>
                                <div class="notification-actions">
                                    <button class="action-btn accept-btn">Approve</button>
                                    <button class="action-btn reject-btn">Reject</button>
                                </div>
                            </div>
                            <div class="notification-time">3 days ago</div>
                        </div>
                    </div>
                    
                    <!-- Subscriptions Tab -->
                    <div id="subscriptions" class="tab-content">
                        <div class="notification-item">
                            <div class="notification-icon subscription-icon">S</div>
                            <div class="notification-details">
                                <div class="notification-title">Subscription Expiring: Lakeside Villa</div>
                                <div class="notification-desc">Premium listing for Thisara Fernando's property will expire in 3 days.</div>
                                <div class="notification-actions">
                                    <button class="action-btn accept-btn">Send Reminder</button>
                                </div>
                            </div>
                            <div class="notification-time">1 hour ago</div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon subscription-icon">S</div>
                            <div class="notification-details">
                                <div class="notification-title">New Premium Subscription</div>
                                <div class="notification-desc">Malinga Bandara has upgraded to Premium Tour Guide listing.</div>
                            </div>
                            <div class="notification-time">2 days ago</div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon subscription-icon">S</div>
                            <div class="notification-details">
                                <div class="notification-title">Subscription Renewed</div>
                                <div class="notification-desc">Anura Dissanayake has renewed their Premium Hotel listing for 12 months.</div>
                            </div>
                            <div class="notification-time">5 days ago</div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon subscription-icon">S</div>
                            <div class="notification-details">
                                <div class="notification-title">Subscription Expiring: Colombo City Tour</div>
                                <div class="notification-desc">Sanath Jayasuriya's Featured Tour Package will expire in 7 days.</div>
                                <div class="notification-actions">
                                    <button class="action-btn accept-btn">Send Reminder</button>
                                </div>
                            </div>
                            <div class="notification-time">1 week ago</div>
                        </div>
                    </div>
                    
                    <!-- System Tab -->
                    <div id="system" class="tab-content">
                        <div class="notification-item">
                            <div class="notification-icon system-icon">!</div>
                            <div class="notification-details">
                                <div class="notification-title">System Update Complete</div>
                                <div class="notification-desc">The system has been updated to version 2.4.0 successfully.</div>
                            </div>
                            <div class="notification-time">Yesterday</div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon system-icon">!</div>
                            <div class="notification-details">
                                <div class="notification-title">Backup Completed</div>
                                <div class="notification-desc">Weekly database backup has been completed successfully.</div>
                            </div>
                            <div class="notification-time">4 days ago</div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon system-icon">!</div>
                            <div class="notification-details">
                                <div class="notification-title">New Feature Added</div>
                                <div class="notification-desc">A new payment gateway (LankaPay) has been integrated to the system.</div>
                            </div>
                            <div class="notification-time">1 week ago</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                function openTab(tabName) {
                    var i, tabcontent, tablinks;
                    
                    // Hide all tab content
                    tabcontent = document.getElementsByClassName("tab-content");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].className = tabcontent[i].className.replace(" active", "");
                    }
                    
                    // Remove active class from all tabs
                    tablinks = document.getElementsByClassName("tab");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    
                    // Show the current tab and add active class
                    document.getElementById(tabName).className += " active";
                    
                    // Find and activate the clicked tab
                    for (i = 0; i < tablinks.length; i++) {
                        if (tablinks[i].textContent.toLowerCase().includes(tabName)) {
                            tablinks[i].className += " active";
                        }
                    }
                }
            </script>
        </main>
     </div>
     
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
</body>
</html>
