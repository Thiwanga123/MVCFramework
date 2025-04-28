<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Original CSS Files -->
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard_t.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Commoon/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventorys.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Commoon/calendar.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">
    
    <!-- Additional CSS Files from Tour Guide Dashboard -->
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Orders.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/RecentBookings.css">

    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Orders.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/RecentBookings.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/cancellationModal.css">
    
    <style>
        /* Calendar styles */
        .calendar {
            width: 100%;
            margin-top: 20px;
        }
        
        .calendar .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 5px;
        }
        
        .calendar .header button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
        }
        
        .calendar .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }
        
        .calendar .day {
            text-align: center;
            padding: 8px;
            border-radius: 5px;
        }
        
        /* Legend styles */
        .calendar-legend {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 10px 0;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
        }
        
        .color-box {
            display: inline-block;
            width: 15px;
            height: 15px;
            border-radius: 3px;
        }
        
        .color-box.unavailable {
            background-color: #FF6B6B;
        }
        
        .color-box.booking {
            background-color: #4CAF50;
        }
        
        /* Button styling */
        .btn-cancel {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 12px;
        }
        
        .btn-cancel:hover {
            background-color: #d32f2f;
        }
        
        /* Status styling */
        .status {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status.pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status.completed, .status.confirmed {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status.cancelled, .status.canceled {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        /* Fix table layout */
        .recent-bookings-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .recent-bookings-table th, 
        .recent-bookings-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .recent-bookings-table thead th {
            background-color: #f2f2f2;
            font-weight: 600;
        }
    </style>

    <title>Transport Supplier Dashboard</title>
</head>
<body>
    <!-- SideBar -->
    <?php require APPROOT . '/views/inc/components/vehiclesupplier_sidebar.php'; ?>
    <!-- End Of Sidebar -->

    <!--Main Content-->
    <!-- <div class="content"> -->
        <!--navbar-->
        <!-- <nav>
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
                <span class="count">0</span>
            </a>
            <p><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Transport Supplier'; ?></p>
            <a href="<?php echo URLROOT;?>/transport_suppliers/myprofile" class="profile">
                <img src="<?php echo URLROOT;?>/Images/default profile.png">
            </a>
        </nav> -->

        <main>
            <div class="header">
                <div class="left">
                    <h1 id="header-title">Dashboard</h1>
                </div>
            </div>
        
            <!--Insights-->
            <ul class="insights">
                <li>
                    <div class="products">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h80v-40q0-17 11.5-28.5T320-880q17 0 28.5 11.5T360-840v40h240v-40q0-17 11.5-28.5T640-880q17 0 28.5 11.5T680-840v40h80q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 280q-17 0-28.5-11.5T440-400q0-17 11.5-28.5T480-440q17 0 28.5 11.5T520-400q0 17-11.5 28.5T480-360Zm-160 0q-17 0-28.5-11.5T280-400q0-17 11.5-28.5T320-440q17 0 28.5 11.5T360-400q0 17-11.5 28.5T320-360Zm320 0q-17 0-28.5-11.5T600-400q0-17 11.5-28.5T640-440q17 0 28.5 11.5T680-400q0 17-11.5 28.5T640-360ZM480-200q-17 0-28.5-11.5T440-240q0-17 11.5-28.5T480-280q17 0 28.5 11.5T520-240q0 17-11.5 28.5T480-200Zm-160 0q-17 0-28.5-11.5T280-240q0-17 11.5-28.5T320-280q17 0 28.5 11.5T360-240q0 17-11.5 28.5T320-200Zm320 0q-17 0-28.5-11.5T600-240q0-17 11.5-28.5T640-280q17 0 28.5 11.5T680-240q0 17-11.5 28.5T640-200Z"></path></svg>
                    </div>
                    <span class="info">
                        <h3><?php echo isset($data['vehicles']) ? $data['vehicles'] : 'N/A'; ?></h3>
                        <p>Total Vehicles</p>
                    </span>
                </li>
                <li>
                    <div class="view">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M160-80q-33 0-56.5-23.5T80-160v-640q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v640q0 33-23.5 56.5T800-80H160Zm0-80h640v-640H160v640Zm200-240q-17 0-28.5-11.5T320-440q0-17 11.5-28.5T360-480q17 0 28.5 11.5T400-440q0 17-11.5 28.5T360-400Zm240 0q-17 0-28.5-11.5T560-440q0-17 11.5-28.5T600-480q17 0 28.5 11.5T640-440q0 17-11.5 28.5T600-400ZM200-516v264q0 14 9 23t23 9h16q14 0 23-9t9-23v-48h400v48q0 14 9 23t23 9h16q14 0 23-9t9-23v-264l-66-192q-5-14-16.5-23t-25.5-9H308q-14 0-25.5 9T266-708l-66 192Zm106-64 28-80h292l28 80H306ZM160-800v640-640Zm120 420v-120h400v120H280Z"/></svg>
                    </div>
                    <span class="info">
                        <h3><?php echo isset($data['bookings']) ? $data['bookings'] : '0'; ?></h3>
                        <p>Booked Vehicles</p>
                    </span>
                </li>
                <li>
                    <div class="earnings">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m140-220-60-60 300-300 160 160 284-320 56 56-340 384-160-160-240 240Z"/></svg>
                    </div>
                    <span class="info">
                        <h3>Rs.30,000</h3>
                        <p>Earnings Received</p>
                    </span>
                </li>
                <li>
                    <div class="pendings">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-420q17 0 28.5-11.5T320-460q0-17-11.5-28.5T280-500q-17 0-28.5 11.5T240-460q0 17 11.5 28.5T280-420Zm0 180q17 0 28.5-11.5T320-280q0-17-11.5-28.5T280-320q-17 0-28.5 11.5T240-280q0 17 11.5 28.5T280-240ZM480-420q17 0 28.5-11.5T520-460q0-17-11.5-28.5T480-500q-17 0-28.5 11.5T440-460q0 17 11.5 28.5T480-420Zm0 180q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240ZM680-420q17 0 28.5-11.5T720-460q0-17-11.5-28.5T680-500q-17 0-28.5 11.5T640-460q0 17 11.5 28.5T680-420Zm0 180q17 0 28.5-11.5T720-280q0-17-11.5-28.5T680-320q-17 0-28.5 11.5T640-280q0 17 11.5 28.5T680-240ZM160-120q-33 0-56.5-23.5T80-200v-560q0-33 23.5-56.5T160-840h640q33 0 56.5 23.5T880-760v560q0 33-23.5 56.5T800-120H160Zm0-80h640v-400H160v400Zm0-480h640v-80H160v80Zm0 0v-80 80Z"/></svg>
                    </div>
                    <span class="info">
                        <h3>2</h3>
                        <p>Available Vehicles</p>
                    </span>
                </li>
            </ul>
            <!--End of Insights-->
        
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M120-80v-800l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v800l-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h480v-80H240v80Zm0-160h480v-80H240v80Zm0-160h480v-80H240v80Zm-40 404h560v-568H200v568Zm0-568v568-568Z"/></svg>
                        <h3>Recent Bookings</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                    </div>
                    <table class="recent-bookings-table">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Pickup Location</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data['bookings_details'])): ?>
                                <?php foreach ($data['bookings_details'] as $booking): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($booking->name); ?></td>
                                        <td><?php echo htmlspecialchars($booking->phone_number); ?></td>
                                        <td><?php echo htmlspecialchars($booking->email); ?></td>
                                        <td><?php echo htmlspecialchars($booking->pickup); ?></td>
                                        <td><?php echo htmlspecialchars($booking->check_in); ?></td>
                                        <td><?php echo htmlspecialchars($booking->check_out); ?></td>
                                        <td><span class="status <?php echo strtolower($booking->status); ?>"><?php echo $booking->status; ?></span></td>
                                        <td>
                                            <?php 
                                                $status = strtolower($booking->status);
                                                if ($status != 'cancelled' && $status != 'canceled'): 
                                            ?>
                                                <button class="btn-cancel" onclick="openCancellationModal('<?php echo $booking->booking_id; ?>')">
                                                    Cancel
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">No bookings available.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
        
                <!--Calendar Widget-->
                <div class="reminders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h440l200 200v440q0 33-23.5 56.5T760-120H200Zm0-80h560v-400H600v-160H200v560Zm80-80h400v-80H280v80Zm0-320h200v-80H280v80Zm0 160h400v-80H280v80Zm-80-320v160-160 560-560Z"/>
                        </svg>
                        <h3>Calendar View</h3>
                    </div>
                    <div class="calendar-legend">
                        <div class="legend-item">
                            <span class="color-box unavailable"></span>
                            <span>Unavailable</span>
                        </div>
                        <div class="legend-item">
                            <span class="color-box booking"></span>
                            <span>Active Bookings</span>
                        </div>
                    </div>
                    <div class="calendar" id="calendar"></div>
                    <input type="hidden" id="bookingDates" value='<?php 
                        $dates = [];
                        if(isset($data['bookings_details'])) {
                            foreach($data['bookings_details'] as $booking) {
                                // Skip canceled bookings
                                if(strtolower($booking->status) == 'cancelled' || strtolower($booking->status) == 'canceled') {
                                    continue;
                                }
                                
                                // Convert date range to array of dates
                                $start = new DateTime($booking->check_in);
                                $end = new DateTime($booking->check_out);
                                $interval = new DateInterval('P1D');
                                $dateRange = new DatePeriod($start, $interval, $end);
                                
                                foreach($dateRange as $date) {
                                    $dates[] = $date->format('Y-m-d');
                                }
                                // Include the end date
                                $dates[] = $end->format('Y-m-d');
                            }
                        }
                        echo json_encode($dates);
                    ?>'>
                </div>
            </div>
        </main>
     </div>

     <!-- Cancellation Warning Modal -->
     <div id="cancellationModal" class="confirmModal" style="display: none;">
         <div class="wrapper">
             <div class="modalContent">
                 <img src="<?php echo URLROOT;?>/Images/warning.png" alt="Warning">
                 <h1>Are you sure?</h1>
                 <p>Do you really want to cancel this booking?</p>
                 <p>Cancellations within 3 days of check-in will incur a 20% penalty.</p>
                 <input type="hidden" id="bookingIdToCancel" value="">
             </div>

             <div class="bottom">
                 <button id="cancelCancellation" class="cancel-btn">No, Keep Booking</button>
                 <button id="confirmCancellation" class="delete-btn">Yes, Cancel Booking</button>
             </div>
         </div>
     </div>

     <style>
         .confirmModal {
             position: fixed; 
             top: 0;
             left: 0;
             width: 100%;
             height: 100%;
             display: flex;
             justify-content: center; 
             align-items: center; 
             background-color: rgba(0, 0, 0, 0.4);
             z-index: 1000;
         }
         
         .wrapper {
             width: 400px;
             background-color: #fff;
             border-radius: 10px;
             padding: 20px;
             box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         }
         
         .modalContent {
             display: flex;
             flex-direction: column;
             align-items: center;
             text-align: center;
         }
         
         .modalContent img {
             width: 80px;
             margin-bottom: 15px;
         }
         
         .modalContent h1 {
             font-size: 24px;
             margin-bottom: 10px;
             color: #dc3545;
         }
         
         .modalContent p {
             margin-bottom: 15px;
             color: #333;
         }
         
         .bottom {
             display: flex;
             justify-content: space-between;
             margin-top: 20px;
         }
         
         .cancel-btn {
             background-color: #6c757d;
             color: white;
             border: none;
             padding: 10px 15px;
             border-radius: 5px;
             cursor: pointer;
         }
         
         .delete-btn {
             background-color: #dc3545;
             color: white;
             border: none;
             padding: 10px 15px;
             border-radius: 5px;
             cursor: pointer;
         }
     </style>

     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
     <!-- Custom calendar script -->
     <script>
     document.addEventListener("DOMContentLoaded", function () {
         const calendar = document.getElementById("calendar");
         const bookingDates = JSON.parse(document.getElementById("bookingDates").value);
         let currentDate = new Date();

         function renderCalendar(date) {
             calendar.innerHTML = "";

             const month = date.toLocaleString("default", { month: "long" });
             const year = date.getFullYear();

             // Create header
             const header = document.createElement("div");
             header.className = "header";

             const prevButton = document.createElement("button");
             prevButton.textContent = "<";
             prevButton.addEventListener("click", () => {
                 currentDate.setMonth(currentDate.getMonth() - 1);
                 renderCalendar(currentDate);
             });

             const nextButton = document.createElement("button");
             nextButton.textContent = ">";
             nextButton.addEventListener("click", () => {
                 currentDate.setMonth(currentDate.getMonth() + 1);
                 renderCalendar(currentDate);
             });

             const title = document.createElement("span");
             title.textContent = `${month} ${year}`;

             header.appendChild(prevButton);
             header.appendChild(title);
             header.appendChild(nextButton);
             calendar.appendChild(header);

             // Create days container
             const daysContainer = document.createElement("div");
             daysContainer.className = "days";

             // Days of the week
             const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
             daysOfWeek.forEach(day => {
                 const dayElement = document.createElement("div");
                 dayElement.className = "day";
                 dayElement.textContent = day;
                 daysContainer.appendChild(dayElement);
             });

             // Get the first day of the month
             const firstDay = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
             const daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

             // Add empty slots for days before the first day
             for (let i = 0; i < firstDay; i++) {
                 const emptySlot = document.createElement("div");
                 emptySlot.className = "day";
                 daysContainer.appendChild(emptySlot);
             }

             // Add days of the month
             for (let i = 1; i <= daysInMonth; i++) {
                 const dayElement = document.createElement("div");
                 dayElement.className = "day";
                 const currentDateString = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
                 dayElement.textContent = i;

                 // Check if date has active bookings
                 if (bookingDates.includes(currentDateString)) {
                     dayElement.style.backgroundColor = "#4CAF50"; // Green for booking dates
                     dayElement.style.color = "white";
                 }

                 daysContainer.appendChild(dayElement);
             }

             calendar.appendChild(daysContainer);
         }

         renderCalendar(currentDate);

         // Function to open cancellation modal
         window.openCancellationModal = function(bookingId) {
             document.getElementById('bookingIdToCancel').value = bookingId;
             document.getElementById('cancellationModal').style.display = 'flex';
         };
         
         // Close modal when clicking "No, Keep Booking" button
         document.getElementById('cancelCancellation').addEventListener('click', function() {
             document.getElementById('cancellationModal').style.display = 'none';
         });
         
         // Handle cancellation confirmation
         document.getElementById('confirmCancellation').addEventListener('click', function() {
             const bookingId = document.getElementById('bookingIdToCancel').value;
             if (bookingId) {
                 window.location.href = '<?php echo URLROOT; ?>/transport_suppliers/cancelBooking/' + bookingId;
             }
         });
     });
     </script>
</body>
</html>