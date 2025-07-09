<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventory.css">
    <title>Service Providers-Admin</title>
    <style>
        /* Custom Alert Dialog Styles */
        .tl-alert-overlay {
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
        
        .tl-alert-overlay.tl-show {
            opacity: 1;
            visibility: visible;
        }
        
        .tl-alert-box {
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
        
        .tl-alert-header {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #eaeaea;
        }
        
        .tl-alert-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 12px;
        }
        
        .tl-alert-icon svg {
            width: 20px;
            height: 20px;
        }
        
        .tl-alert-title {
            font-size: 18px;
            font-weight: 600;
            flex-grow: 1;
        }
        
        .tl-alert-body {
            padding: 20px;
            font-size: 16px;
            color: #4a4a4a;
            line-height: 1.5;
        }
        
        .tl-alert-footer {
            padding: 15px 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            border-top: 1px solid #eaeaea;
        }
        
        .tl-alert-btn {
            padding: 10px 16px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }
        
        .tl-alert-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        /* Success Alert */
        .tl-alert-success .tl-alert-header {
            background-color: #f0faf0;
        }
        
        .tl-alert-success .tl-alert-icon {
            background-color: #28a745;
            color: white;
        }
        
        .tl-alert-success .tl-alert-title {
            color: #28a745;
        }
        
        .tl-alert-success .tl-alert-btn-primary {
            background-color: #28a745;
            color: white;
        }
        
        .tl-alert-success .tl-alert-btn-primary:hover {
            background-color: #218838;
        }
        
        /* Error Alert */
        .tl-alert-error .tl-alert-header {
            background-color: #fdf3f3;
        }
        
        .tl-alert-error .tl-alert-icon {
            background-color: #dc3545;
            color: white;
        }
        
        .tl-alert-error .tl-alert-title {
            color: #dc3545;
        }
        
        .tl-alert-error .tl-alert-btn-primary {
            background-color: #dc3545;
            color: white;
        }
        
        .tl-alert-error .tl-alert-btn-primary:hover {
            background-color: #c82333;
        }
        
        /* Info Alert */
        .tl-alert-info .tl-alert-header {
            background-color: #f0f7fc;
        }
        
        .tl-alert-info .tl-alert-icon {
            background-color: #17a2b8;
            color: white;
        }
        
        .tl-alert-info .tl-alert-title {
            color: #17a2b8;
        }
        
        .tl-alert-info .tl-alert-btn-primary {
            background-color: #17a2b8;
            color: white;
        }
        
        .tl-alert-info .tl-alert-btn-primary:hover {
            background-color: #138496;
        }
        
        /* Warning Alert */
        .tl-alert-warning .tl-alert-header {
            background-color: #fffbf0;
        }
        
        .tl-alert-warning .tl-alert-icon {
            background-color: #ffc107;
            color: #212529;
        }
        
        .tl-alert-warning .tl-alert-title {
            color: #856404;
        }
        
        .tl-alert-warning .tl-alert-btn-primary {
            background-color: #ffc107;
            color: #212529;
        }
        
        .tl-alert-warning .tl-alert-btn-primary:hover {
            background-color: #e0a800;
        }
        
        /* Confirm Alert */
        .tl-alert-confirm .tl-alert-header {
            background-color: #f0f7fc;
        }
        
        .tl-alert-confirm .tl-alert-icon {
            background-color: #007bff;
            color: white;
        }
        
        .tl-alert-confirm .tl-alert-title {
            color: #007bff;
        }
        
        .tl-alert-confirm .tl-alert-btn-primary {
            background-color: #007bff;
            color: white;
        }
        
        .tl-alert-confirm .tl-alert-btn-primary:hover {
            background-color: #0069d9;
        }
        
        .tl-alert-confirm .tl-alert-btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        
        .tl-alert-confirm .tl-alert-btn-secondary:hover {
            background-color: #5a6268;
        }
        
        /* Modal Styles Enhancement */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(173, 216, 230, 0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        
        .modal-content {
            background: #f0f8ff;
            padding: 25px;
            border-radius: 12px;
            width: 90%;
            max-width: 1100px;
            min-width: 800px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            text-align: left;
            position: relative;
            animation: fadeIn 0.3s ease-in-out;
            overflow-x: auto;
        }
        
        .modal-content h2 {
            margin-top: 0;
            font-size: 24px;
            color: #0056b3;
            border-bottom: 2px solid #87ceeb;
            padding-bottom: 10px;
        }
        
        .modal-content p {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }
        
        .modal-actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        
        .approve-btn-modal, .reject-btn-modal {
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        
        .approve-btn-modal {
            background-color: #28a745;
            color: #fff;
        }
        
        .approve-btn-modal:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        
        .reject-btn-modal {
            background-color: #dc3545;
            color: #fff;
        }
        
        .reject-btn-modal:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }
        
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 22px;
            font-weight: bold;
            color: #0056b3;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .close-btn:hover {
            color: #ff4500;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .modal-content table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
            margin-top: 20px;
        }
        
        .modal-content table th,
        .modal-content table td {
            white-space: nowrap;
            font-size: 15px;
        }
        
        .modal-content table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        
        .modal-content .view-btn, .modal-content .delete-btn, .modal-content .activate-btn {
            padding: 10px 15px;
            font-size: 14px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        
        .modal-content .view-btn {
            background-color: #007bff;
            color: #fff;
        }
        
        .modal-content .view-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        
        .modal-content .delete-btn {
            background-color: #dc3545;
            color: #fff;
        }
        
        .modal-content .delete-btn:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }
        
        .modal-content .activate-btn {
            background-color: #28a745;
            color: #fff;
        }
        
        .modal-content .activate-btn:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        
        /* Search input styles */
        .search-container {
            margin-bottom: 15px;
            position: relative;
        }
        
        .search-container input {
            padding: 10px 30px 10px 10px;
            width: 100%;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 14px;
        }
        
        .search-container input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }
        
        #clear-search {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
            color: #999;
            display: none;
        }
        
        #clear-search:hover {
            color: #555;
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
                    <h1 id = "header-title"> Service Providers</h1>
                </div>
            </div>
        
            <!--Insights-->
            <ul class="insights">
                <li>
                    <div class="products" data-type="Accommodation">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M120-120v-560h160v-160h400v320h160v400H520v-160h-80v160H120Zm80-80h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 320h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 480h80v-80h-80v80Zm0-160h80v-80h-80v80Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3><?php echo $data['accomadation_suppliers'];?></h3>
                        <p> Accomodation Supppliers</p>
                    </span>
                </li>
                <li>
                    <div class="view" data-type="Vehicle Supplier">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M240-200v40q0 17-11.5 28.5T200-120h-40q-17 0-28.5-11.5T120-160v-320l84-240q6-18 21.5-29t34.5-11h440q19 0 34.5 11t21.5 29l84 240v320q0 17-11.5 28.5T800-120h-40q-17 0-28.5-11.5T720-160v-40H240Zm-8-360h496l-42-120H274l-42 120Zm-32 80v200-200Zm100 160q25 0 42.5-17.5T360-380q0-25-17.5-42.5T300-440q-25 0-42.5 17.5T240-380q0 25 17.5 42.5T300-320Zm360 0q25 0 42.5-17.5T720-380q0-25-17.5-42.5T660-440q-25 0-42.5 17.5T600-380q0 25 17.5 42.5T660-320Zm-460 40h560v-200H200v200Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3><?php echo $data['vehicle_suppliers'];?></h3>
                        <p>Transport Suppliers</p>
                    </span>
                </li>
                <li>
                    <div class="earnings" data-type="Tour Guide">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m600-120-240-84-186 72q-20 8-37-4.5T120-170v-560q0-13 7.5-23t20.5-15l212-72 240 84 186-72q20-8 37 4.5t17 33.5v560q0 13-7.5 23T812-192l-212 72Zm-40-98v-468l-160-56v468l160 56Zm80 0 120-40v-474l-120 46v468Zm-440-10 120-46v-468l-120 40v474Zm440-458v468-468Zm-320-56v468-468Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3><?php echo $data['tour_guides'];?></h3>
                        <p>Guide Services</p>
                    </span>
                </li>
                <li>
                    <div class="pendings" data-type="Equipment Supplier">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M754-81q-8 0-15-2.5T726-92L522-296q-6-6-8.5-13t-2.5-15q0-8 2.5-15t8.5-13l85-85q6-6 13-8.5t15-2.5q8 0 15 2.5t13 8.5l204 204q6 6 8.5 13t2.5 15q0 8-2.5 15t-8.5 13l-85 85q-6 6-13 8.5T754-81Zm0-95 29-29-147-147-29 29 147 147ZM205-80q-8 0-15.5-3T176-92l-84-84q-6-6-9-13.5T80-205q0-8 3-15t9-13l212-212h85l34-34-165-165h-57L80-765l113-113 121 121v57l165 165 116-116-43-43 56-56H495l-28-28 142-142 28 28v113l56-56 142 142q17 17 26 38.5t9 45.5q0 24-9 46t-26 39l-85-85-56 56-42-42-207 207v84L233-92q-6 6-13 9t-15 3Zm0-96 170-170v-29h-29L176-205l29 29Zm0 0-29-29 15 14 14 15Zm549 0 29-29-29 29Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3><?php echo $data['equipment_suppliers'];?></h3>
                        <p>Equipment Suppliers</p>
                    </span>
                </li>
            </ul>
            <!--End of Insights-->
        
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M120-80v-800l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v800l-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h480v-80H240v80Zm0-160h480v-80H240v80Zm0-160h480v-80H240v80Zm-40 404h560v-568H200v568Zm0-568v568-568Z"/></svg>
                        <h3>Recently Joined</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Service Provider Name</th>
                                <th>Date of Joined</th>
                                <th>Status</th>
                                <th>Service Type</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                <?php foreach($data['last_three_service_providers'] as $last_three_service_providers) : ?>
                            <tr>
                                <td>
                                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <p><?php echo htmlspecialchars($last_three_service_providers->name); ?></p>
                                </td>
                                <td><?php echo htmlspecialchars(date("Y/m/d", strtotime($last_three_service_providers->date_of_joined))); ?></td>
                                <td><?php echo htmlspecialchars($last_three_service_providers->action); ?></td>
                                <td><?php echo htmlspecialchars($last_three_service_providers->sptype); ?></td>
                                <!-- <td class="action-buttons">
                                
                                <button class="view-btn">View</button>
                                <button class="delete-btn" id="delete-btn">Delete</button> -->
                                </td>
                            </tr>
                <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>
        
                <!--Recent updates-->
                <div class="reminders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M222-200 80-342l56-56 85 85 170-170 56 57-225 226Zm0-320L80-662l56-56 85 85 170-170 56 57-225 226Zm298 240v-80h360v80H520Zm0-320v-80h360v80H520Z"/></svg>
                        <h3>List to Approve</h3>
        
                    </div>
                    <ul class="update-list">
                        <?php foreach ($data['unapproved_service_providers'] as $unapproved_service_providers) : ?>
                        <li>
                            <div class="update" 
                                 data-sptype="<?php echo htmlspecialchars($unapproved_service_providers->sptype); ?>" 
                                 data-email="<?php echo htmlspecialchars($unapproved_service_providers->email); ?>" 
                                 data-phone="<?php echo htmlspecialchars($unapproved_service_providers->phone); ?>" 
                                 data-nic="<?php echo htmlspecialchars($unapproved_service_providers->nic); ?>" 
                                 data-reg-number="<?php echo htmlspecialchars($unapproved_service_providers->reg_number); ?>" 
                                 data-address="<?php echo htmlspecialchars($unapproved_service_providers->address); ?>" 
                                 data-plan="<?php echo htmlspecialchars($unapproved_service_providers->plan); ?>" 
                                 data-sub="<?php echo htmlspecialchars($unapproved_service_providers->sub); ?>" 
                                 data-document-path="<?php echo URLROOT . '/' . htmlspecialchars($unapproved_service_providers->document_path); ?>"
                                 data-id="<?php echo htmlspecialchars($unapproved_service_providers->serviceProviderId); ?>">
                                <img src="<?php echo URLROOT; ?>/Images/Profile pic.jpg">
                                <div class="update-info">
                                    <div class="name-info">
                                        <p><?php echo htmlspecialchars($unapproved_service_providers->name); ?></p>
                                    </div>
                                    <div class="service-info">
                                        <p><?php echo htmlspecialchars($unapproved_service_providers->sptype); ?></p>
                                    </div>
                                    <div class="action-buttons">
                                    
                                        <button class="view-btn">View</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        
          </main>

     </div>
     </div>   

    <!-- Modal for viewing details -->
    <div id="view-modal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Service Provider Details</h2>
            <div id="modal-details">
                <!-- Details will be dynamically populated here -->
            </div>
            <div class="modal-actions">
                <button class="approve-btn-modal">Approve</button>
                <button class="reject-btn-modal">Reject</button>
            </div>
        </div>
    </div>

    <!-- Modal for service provider table -->
    <div id="service-provider-modal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2 id="modal-title">Service Providers</h2>
            
            <!-- Add search input -->
            <div class="search-container">
                <input type="text" id="provider-search" placeholder="Search providers...">
                <span id="clear-search" style="display: none;">✕</span>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>NIC</th>
                        <th>Reg No</th>
                        <th>Address</th>
                        <th>Earnings</th>
                        <th>Subscription</th>
                        <th>Penalty</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="modal-table-body">
                    <!-- Rows will be dynamically populated -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Custom Alert Dialog Container -->
    <div id="tl-alert-container"></div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('view-modal');
            const closeModal = document.querySelector('.close-btn');
            const viewButtons = document.querySelectorAll('.view-btn');
            const approveModalButton = document.querySelector('.approve-btn-modal');
            const rejectModalButton = document.querySelector('.reject-btn-modal');

            // Alert Dialog System
            const alertSystem = {
                container: document.getElementById('tl-alert-container'),
                
                // Create alert dialog HTML
                createAlertHTML: function(type, title, message, buttons) {
                    // Define icons based on alert type
                    const icons = {
                        success: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>',
                        error: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 15h2v2h-2zm0-8h2v6h-2zm.99-5C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/></svg>',
                        info: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>',
                        warning: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/></svg>',
                        confirm: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>'
                    };
                    
                    // Create buttons HTML
                    let buttonsHTML = '';
                    buttons.forEach(button => {
                        const btnClass = button.primary ? 'tl-alert-btn-primary' : 'tl-alert-btn-secondary';
                        buttonsHTML += `<button class="tl-alert-btn ${btnClass}" data-action="${button.action}">${button.text}</button>`;
                    });
                    
                    // Return complete alert HTML
                    return `
                        <div class="tl-alert-overlay">
                            <div class="tl-alert-box tl-alert-${type}">
                                <div class="tl-alert-header">
                                    <div class="tl-alert-icon">
                                        ${icons[type]}
                                    </div>
                                    <div class="tl-alert-title">${title}</div>
                                </div>
                                <div class="tl-alert-body">
                                    ${message}
                                </div>
                                <div class="tl-alert-footer">
                                    ${buttonsHTML}
                                </div>
                            </div>
                        </div>
                    `;
                },
                
                // Show alert dialog
                show: function(options) {
                    const defaults = {
                        type: 'info',
                        title: 'Information',
                        message: '',
                        buttons: [
                            { text: 'OK', action: 'close', primary: true }
                        ],
                        onAction: null
                    };
                    
                    const settings = { ...defaults, ...options };
                    
                    // Create alert element
                    const alertElement = document.createElement('div');
                    alertElement.innerHTML = this.createAlertHTML(
                        settings.type, 
                        settings.title, 
                        settings.message, 
                        settings.buttons
                    );
                    
                    // Add to container
                    this.container.appendChild(alertElement);
                    
                    // Show alert with animation
                    setTimeout(() => {
                        const overlay = alertElement.querySelector('.tl-alert-overlay');
                        overlay.classList.add('tl-show');
                    }, 10);
                    
                    // Add event listeners to buttons
                    const buttons = alertElement.querySelectorAll('.tl-alert-btn');
                    buttons.forEach(button => {
                        button.addEventListener('click', () => {
                            const action = button.dataset.action;
                            
                            // Close the alert
                            const overlay = alertElement.querySelector('.tl-alert-overlay');
                            overlay.classList.remove('tl-show');
                            
                            setTimeout(() => {
                                alertElement.remove();
                            }, 300);
                            
                            // Call the callback if provided
                            if (settings.onAction) {
                                settings.onAction(action);
                            }
                        });
                    });
                    
                    // Close on overlay click if it's not a confirmation
                    if (settings.type !== 'confirm') {
                        const overlay = alertElement.querySelector('.tl-alert-overlay');
                        overlay.addEventListener('click', (e) => {
                            if (e.target === overlay) {
                                overlay.classList.remove('tl-show');
                                setTimeout(() => {
                                    alertElement.remove();
                                }, 300);
                                
                                if (settings.onAction) {
                                    settings.onAction('close');
                                }
                            }
                        });
                    }
                },
                
                // Shorthand methods for different alert types
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
                
                info: function(message, callback) {
                    this.show({
                        type: 'info',
                        title: 'Information',
                        message: message,
                        onAction: callback
                    });
                },
                
                warning: function(message, callback) {
                    this.show({
                        type: 'warning',
                        title: 'Warning',
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

            viewButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    const parent = e.target.closest('.update');
                    const name = parent.querySelector('.name-info p').textContent;
                    const serviceType = parent.dataset.sptype;

                    const email = parent.dataset.email;
                    const phone = parent.dataset.phone;
                    const nic = parent.dataset.nic;
                    const regNumber = parent.dataset.regNumber;
                    const address = parent.dataset.address;
                    const documentPath = parent.dataset.documentPath;
                    const plan = parent.dataset.plan;
                    const sub = parent.dataset.sub === 'true' ? 'Yes' : 'No';
                    const serviceProviderId = parent.dataset.id;

                    // Populate modal with all details
                    const modalDetails = document.getElementById('modal-details');
                    modalDetails.dataset.serviceProviderId = serviceProviderId; // Set data-id
                    modalDetails.dataset.sptype = serviceType; // Set data-sptype
                    modalDetails.innerHTML = `
                        <p><strong>Service Provider ID:</strong> ${serviceProviderId}</p>
                        <p><strong>Name:</strong> ${name}</p>
                        <p><strong>Service Type:</strong> ${serviceType}</p>
                        <p><strong>Email:</strong> ${email}</p>
                        <p><strong>Phone:</strong> ${phone}</p>
                        <p><strong>NIC:</strong> ${nic}</p>
                        <p><strong>Registration Number:</strong> ${regNumber}</p>
                        <p><strong>Address:</strong> ${address}</p>
                        <p><strong>Subscription Plan:</strong> ${plan}</p>
                        <p><strong>Subscription Purchased:</strong> <span style="color: ${sub === 'Yes' ? 'green' : 'red'};">${sub}</span></p>
                        ${
                            documentPath
                                ? `<p><strong>Document:</strong> <a href="${documentPath}" target="_blank" style="color: #007BFF; text-decoration: underline;">View Document</a></p>`
                                : ''
                        }
                    `;

                    // Show modal
                    modal.style.display = 'flex';
                });
            });

            approveModalButton.addEventListener('click', () => {
                // Retrieve the service provider ID and type from the modal
                const modalDetails = document.getElementById('modal-details');
                const serviceProviderId = modalDetails.dataset.serviceProviderId;
                const sptype = modalDetails.dataset.sptype;

                if (!serviceProviderId || !sptype) {
                    alertSystem.error('Missing service provider ID or type.');
                    return;
                }

                alertSystem.confirm('Are you sure you want to approve this service provider?', (confirmed) => {
                    if (confirmed) {
                        // Send an AJAX request to approve the service provider
                        fetch('<?php echo URLROOT; ?>/admin/approveServiceProvider', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({ serviceProviderId: serviceProviderId, sptype: sptype, action: 'approve' }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                modal.style.display = 'none';
                                alertSystem.success('Service provider approved successfully!', () => {
                                    window.location.reload(); // Reload the page to reflect changes
                                });
                            } else {
                                alertSystem.error('Failed to approve service provider. Check logs for details.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alertSystem.error('An error occurred while approving the service provider.');
                        });
                    }
                });
            });

            rejectModalButton.addEventListener('click', () => {
                // Retrieve the service provider ID and type from the modal
                const modalDetails = document.getElementById('modal-details');
                const serviceProviderId = modalDetails.dataset.serviceProviderId;
                const sptype = modalDetails.dataset.sptype;

                if (!serviceProviderId || !sptype) {
                    alertSystem.error('Missing service provider ID or type.');
                    return;
                }

                alertSystem.confirm('Are you sure you want to reject this service provider?', (confirmed) => {
                    if (confirmed) {
                        // Send an AJAX request to reject the service provider
                        fetch('<?php echo URLROOT; ?>/admin/approveServiceProvider', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({ serviceProviderId: serviceProviderId, sptype: sptype, action: 'reject' }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                modal.style.display = 'none';
                                alertSystem.success('Service provider rejected successfully!', () => {
                                    window.location.reload(); // Reload the page to reflect changes
                                });
                            } else {
                                alertSystem.error('Failed to reject service provider. Check logs for details.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alertSystem.error('An error occurred while rejecting the service provider.');
                        });
                    }
                });
            });

            closeModal.addEventListener('click', () => {
                modal.style.display = 'none';
            });

            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });

            const serviceProviderModal = document.getElementById('service-provider-modal');
            const serviceProviderCloseModal = serviceProviderModal.querySelector('.close-btn');
            const cards = document.querySelectorAll('.insights div[data-type]');
            const modalTitle = document.getElementById('modal-title');
            const modalTableBody = document.getElementById('modal-table-body');
            
            // Add search functionality
            const providerSearch = document.getElementById('provider-search');
            const clearSearch = document.getElementById('clear-search');
            
            if (providerSearch) {
                providerSearch.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const tableRows = document.querySelectorAll('#modal-table-body tr');
                    let matchCount = 0;
                    
                    tableRows.forEach(row => {
                        let found = false;
                        // Search through all cells in the row
                        row.querySelectorAll('td').forEach(cell => {
                            if (cell.textContent.toLowerCase().includes(searchTerm)) {
                                found = true;
                            }
                        });
                        
                        // Show or hide row based on search match
                        row.style.display = found ? '' : 'none';
                        if (found) matchCount++;
                    });
                    
                    // Check if we need to show "no results" message
                    let noResultsRow = document.getElementById('no-results-row');
                    
                    if (matchCount === 0) {
                        if (!noResultsRow) {
                            noResultsRow = document.createElement('tr');
                            noResultsRow.id = 'no-results-row';
                            const cell = document.createElement('td');
                            cell.colSpan = 11; // Match the number of columns in your table
                            cell.textContent = 'No matching service providers found';
                            cell.style.textAlign = 'center';
                            cell.style.padding = '20px';
                            noResultsRow.appendChild(cell);
                            document.getElementById('modal-table-body').appendChild(noResultsRow);
                        }
                        noResultsRow.style.display = '';
                    } else if (noResultsRow) {
                        noResultsRow.style.display = 'none';
                    }
                    
                    // Show/hide clear button
                    if (clearSearch) {
                        clearSearch.style.display = this.value ? 'block' : 'none';
                    }
                });
            }
            
            if (clearSearch && providerSearch) {
                // Clear search when the X is clicked
                clearSearch.addEventListener('click', function() {
                    providerSearch.value = '';
                    providerSearch.dispatchEvent(new Event('input'));
                    this.style.display = 'none';
                });
            }

            cards.forEach(card => {
                card.addEventListener('click', () => {
                    const type = card.dataset.type;
                    
                    // Clear previous search
                    if (providerSearch) {
                        providerSearch.value = '';
                        if (clearSearch) clearSearch.style.display = 'none';
                    }

                    // Set modal title
                    modalTitle.textContent = `${type} Service Providers`;

                    // Fetch service providers for the selected type
                    fetch(`<?php echo URLROOT; ?>/admin/getServiceProvidersByType`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ type })
                    })
                    .then(response => response.json())
                    .then(data => {
                        modalTableBody.innerHTML = ''; // Clear previous rows
                        
                        if (data.length === 0) {
                            alertSystem.info(`No ${type} service providers found.`);
                            serviceProviderModal.style.display = 'none';
                            return;
                        }
                        
                        data.forEach(provider => {
                            const action = provider.action === 'deleted' ? 'Activate' : 'Delete';
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${provider.id}</td>
                                <td>${provider.name}</td>
                                <td>${provider.email}</td>
                                <td>${provider.phone}</td>
                                <td>${provider.nic}</td>
                                <td>${provider.reg_number}</td>
                                <td>${provider.address}</td>
                                <td>${provider.earnings}</td>
                                <td>${provider.plan}</td>
                                <td>${provider.penalty_amount}</td>
                                <td>${renderActionButton(action, provider.id, type, provider.action)}</td>
                            `;
                            modalTableBody.appendChild(row);
                        });
                        
                        // Show modal
                        serviceProviderModal.style.display = 'flex';
                    })
                    .catch(error => {
                        console.error('Error fetching service providers:', error);
                        alertSystem.error('Error loading service provider data. Please try again.');
                    });
                });
            });

            serviceProviderCloseModal.addEventListener('click', () => {
                serviceProviderModal.style.display = 'none';
            });

            window.addEventListener('click', (e) => {
                if (e.target === serviceProviderModal) {
                    serviceProviderModal.style.display = 'none';
                }
            });

            modalTableBody.addEventListener('click', (e) => {
                if (e.target.classList.contains('delete-btn')) {
                    const id = e.target.dataset.id;
                    const type = e.target.dataset.type;
                    const currentStatus = e.target.dataset.status;
                    const action = currentStatus === 'deleted' ? 'activate' : 'delete';

                    alertSystem.confirm(`Are you sure you want to ${action} this service provider?`, (confirmed) => {
                        if (confirmed) {
                            fetch(`<?php echo URLROOT; ?>/admin/toggleServiceProviderStatus`, {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({ id, type, action })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alertSystem.success(`Service provider ${action}d successfully!`);
                                    e.target.textContent = action === 'delete' ? 'Activate' : 'Delete';
                                    e.target.dataset.status = action === 'delete' ? 'deleted' : 'active';
                                    e.target.style.backgroundColor = action === 'delete' ? '#28a745' : '#dc3545'; // Green for Activate, Red for Delete
                                    e.target.style.color = '#fff';
                                } else {
                                    alertSystem.error(`Failed to ${action} service provider.`);
                                }
                            })
                            .catch(error => {
                                console.error(`Error ${action}ing service provider:`, error);
                                alertSystem.error(`An error occurred while ${action}ing the service provider.`);
                            });
                        }
                    });
                }
            });

            function renderActionButton(action, id, type, status) {
                const color = action === 'Activate' ? '#28a745' : '#dc3545'; // Green for Activate, Red for Delete
                return `<button 
                            class="delete-btn" 
                            data-id="${id}" 
                            data-type="${type}" 
                            data-status="${status}" 
                            style="background-color: ${color}; color: #fff; border: none; padding: 10px 15px; border-radius: 3px; cursor: pointer;">
                            ${action}
                        </button>`;
            }

            document.querySelectorAll('.action-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const type = this.getAttribute('data-type');
                    const currentStatus = this.getAttribute('data-status');
                    const newAction = currentStatus === 'deleted' ? 'activate' : 'delete';

                    alertSystem.confirm(`Are you sure you want to ${newAction} this service provider?`, (confirmed) => {
                        if (confirmed) {
                            // Call your backend API to update the status
                            fetch('/admin/toggleServiceProviderStatus', {
                                method: 'POST',
                                headers: {'Content-Type': 'application/json'},
                                body: JSON.stringify({id: id, type: type, action: newAction})
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alertSystem.success(`Service provider ${newAction}d successfully!`, () => {
                                        location.reload();
                                    });
                                } else {
                                    alertSystem.error(`Failed to ${newAction} service provider.`);
                                }
                            })
                            .catch(error => {
                                console.error(`Error ${newAction}ing service provider:`, error);
                                alertSystem.error(`An error occurred while ${newAction}ing the service provider.`);
                            });
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
