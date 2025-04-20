<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Order.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <title>Home</title>
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            transition: color 0.3s;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-content p {
            line-height: 2;
        }

        .modal-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .modal-button {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .modal-button:hover {
            transform: translateY(-2px);
        }

        .delete-button {
            background: var(--danger);
            color: var(--light);
        }

        .delete-button:hover {
            background: #d32f2f;
        }

        /* Search and Filter Styles */
        .search-filter-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .search-box {
            flex: 1;
            min-width: 200px;
            display: flex;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .search-box button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .filter-container {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .filter-container select {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
            font-size: 14px;
        }

        /* View Button Styles */
        .view-btn {
            background-color: #3aafa9;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .view-btn:hover {
            background-color: #2b7a78;
            transform: translateY(-2px);
        }

        /* Status Styles */
        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
        }

        .status-completed {
            background-color: #c8e6c9;
            color: #2e7d32;
        }

        .status-upcoming {
            background-color: #bbdefb;
            color: #1565c0;
        }

        .status-canceled {
            background-color: #ffcdd2;
            color: #c62828;
        }

        /* Pagination Styles */
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .pagination-info {
            font-size: 14px;
            color: #666;
        }

        .pagination-controls {
            display: flex;
            gap: 10px;
        }

        .pagination-controls button {
            padding: 5px 15px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .pagination-controls button:hover {
            background-color: #e0e0e0;
        }

        .pagination-controls button.active {
            background-color: #3aafa9;
            color: white;
            border-color: #3aafa9;
        }

        .row-number {
            color: #666;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- SideBar -->
    <?php
        include('Sidebar.php');;
    ?>
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
            <p><?php echo $_SESSION['name'];?></p>
            <a href="#" class="profile">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>Bookings</h1>
                </div>
            </div>

            <div class="item-orders">
                <div>
                <div class="header">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    <h3>All Bookings</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                </div>

                <!-- Search and Filter Container -->
                <div class="search-filter-container">
                    <div class="search-box">
                        <input type="text" id="searchInput" placeholder="Search bookings...">
                        <button type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#666"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                        </button>
                    </div>
                    <div class="filter-container">
                        <label for="filterSelect">Filter by:</label>
                        <select id="filterSelect">
                            <option value="all">All</option>
                            <option value="traveler_name">Traveler Name</option>
                            <option value="booking_id">Booking ID</option>
                            <option value="property_type">Accommodation Type</option>
                            <option value="property_name">Accommodation Name</option>
                            <option value="status">Status</option>
                        </select>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Traveler Name</th>
                           
                            <th>Accomadation Type</th>
                            <th>Accommodation Name</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Full Amount</th>
                           
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="bookingTableBody">
                        <?php 
                        $counter = 1;
                        foreach ($data['accomadation'] as $accomadation):
                            // Determine status based on dates
                            $status = 'upcoming';
                            $statusClass = 'status-upcoming';
                            $statusText = 'Upcoming';
                            
                            $today = new DateTime();
                            $checkIn = new DateTime($accomadation->check_in);
                            
                            if (isset($accomadation->cancellation_date) && $accomadation->cancellation_date !== null) {
                                $status = 'canceled';
                                $statusClass = 'status-canceled';
                                $statusText = 'Canceled';
                            } elseif ($checkIn < $today) {
                                $status = 'completed';
                                $statusClass = 'status-completed';
                                $statusText = 'Completed';
                            }
                        ?>
                        <tr data-traveler="<?php echo strtolower(htmlspecialchars($accomadation->traveler_name)); ?>" 
                            data-booking="<?php echo strtolower(htmlspecialchars($accomadation->booking_id)); ?>"
                            data-type="<?php echo strtolower(htmlspecialchars($accomadation->property_type)); ?>"
                            data-name="<?php echo strtolower(htmlspecialchars($accomadation->property_name)); ?>"
                            data-status="<?php echo $status; ?>">
                            <td class="row-number"><?php echo $counter++; ?></td>
                            <td>
                                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg"><?php echo htmlspecialchars($accomadation->traveler_name); ?>
                            </td>
                            
                            <td><?php echo htmlspecialchars($accomadation->property_type); ?></td>
                            <td><?php echo htmlspecialchars($accomadation->property_name); ?></td>
                            <td><?php echo htmlspecialchars($accomadation->check_in); ?></td>
                            <td><?php echo htmlspecialchars($accomadation->check_out); ?></td>
                            <td>Rs.<?php echo htmlspecialchars($accomadation->amount); ?></td>
                            
                            <td><span class="status <?php echo $statusClass; ?>"><?php echo $statusText; ?></span></td>                         
                            <td class="action-btn">
                                <button class="view-btn" onclick="openModal(<?php echo htmlspecialchars(json_encode($accomadation)); ?>, '<?php echo $statusText; ?>')">View</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
                
                <!-- Pagination Controls -->
                <div class="pagination">
                    <div class="pagination-info">
                        Showing <span id="startRange">1</span> to <span id="endRange">10</span> of <span id="totalItems"><?php echo count($data['accomadation'] ?? []); ?></span> entries
                    </div>
                    <div class="pagination-controls" id="paginationControls">
                        <button id="prevPage" disabled>&laquo; Previous</button>
                        <button class="active">1</button>
                        <button id="nextPage">Next &raquo;</button>
                    </div>
                </div>
                
                </div>
            </div>
            
          </main>

     </div>

     <!-- Modal -->
     <div id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Booking Details</h2>
            <p id="bookingDetails"></p>
            <div class="modal-buttons">
                <button class="modal-button delete-button" onclick="deleteBooking()">Cancel Booking</button>
            </div>
        </div>
     </div>

     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            closeModal();
            setupPagination();
            setupSearch();
            setupFilter();
        });

        // Modal functions
        function openModal(accomadation, status) {
            document.getElementById('bookingDetails').innerHTML = `<br>
                <strong>Traveler Name:</strong> ${accomadation.traveler_name}<br>
                <strong>Booking ID:</strong> ${accomadation.booking_id}<br>
                <strong>Accommodation Type:</strong> ${accomadation.property_type}<br>
                <strong>Accommodation Name:</strong> ${accomadation.property_name}<br>
                <strong>Check-In:</strong> ${accomadation.check_in}<br>
                <strong>Check-Out:</strong> ${accomadation.check_out}<br>
                <strong>Full Amount:</strong> Rs.${accomadation.amount}<br>
                <strong>Paid Amount:</strong> Rs.${accomadation.paid}<br>
                <strong>Status:</strong> ${status}<br>
            `;
            
            // Hide cancel button for completed bookings
            const deleteButton = document.querySelector('.delete-button');
            if (status === 'Completed' || status === 'Canceled') {
                deleteButton.style.display = 'none';
            } else {
                deleteButton.style.display = 'block';
            }
            
            document.getElementById('bookingModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('bookingModal').style.display = 'none';
        }

        function deleteBooking() {
            if (confirm('Are you sure you want to cancel this booking?')) {
                alert('Booking canceled successfully!');
                closeModal();
                // In a real implementation, you would send an AJAX request to update the database
                // and then refresh the table or update the specific row
            }
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('bookingModal')) {
                closeModal();
            }
        }

        // Pagination functions
        function setupPagination() {
            const rowsPerPage = 10;
            let currentPage = 1;
            const table = document.getElementById('bookingTableBody');
            const rows = table.querySelectorAll('tr');
            const pageCount = Math.ceil(rows.length / rowsPerPage);
            
            const paginationControls = document.getElementById('paginationControls');
            
            // Create page buttons if there's more than one page
            if (pageCount > 1) {
                // Clear existing buttons except prev/next
                const buttons = paginationControls.querySelectorAll('button:not(#prevPage):not(#nextPage)');
                buttons.forEach(button => button.remove());
                
                // Add page buttons
                for (let i = 1; i <= pageCount; i++) {
                    const pageButton = document.createElement('button');
                    pageButton.textContent = i;
                    if (i === 1) pageButton.classList.add('active');
                    
                    pageButton.addEventListener('click', function() {
                        currentPage = i;
                        showPage(currentPage);
                        updateActiveButton();
                    });
                    
                    // Insert before the next button
                    paginationControls.insertBefore(pageButton, document.getElementById('nextPage'));
                }
            }
            
            // Show first page initially
            showPage(currentPage);
            
            // Setup prev/next buttons
            document.getElementById('prevPage').addEventListener('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    showPage(currentPage);
                    updateActiveButton();
                }
            });
            
            document.getElementById('nextPage').addEventListener('click', function() {
                if (currentPage < pageCount) {
                    currentPage++;
                    showPage(currentPage);
                    updateActiveButton();
                }
            });
            
            function showPage(page) {
                // Hide all rows
                rows.forEach(row => {
                    row.style.display = 'none';
                });
                
                // Show rows for current page
                const start = (page - 1) * rowsPerPage;
                const end = start + rowsPerPage;
                
                for (let i = start; i < end && i < rows.length; i++) {
                    rows[i].style.display = '';
                }
                
                // Update pagination info
                document.getElementById('startRange').textContent = start + 1;
                document.getElementById('endRange').textContent = Math.min(end, rows.length);
                
                // Enable/disable prev/next buttons
                document.getElementById('prevPage').disabled = page === 1;
                document.getElementById('nextPage').disabled = page === pageCount;
                
                // Update row numbers
                updateRowNumbers();
            }
            
            function updateActiveButton() {
                const buttons = paginationControls.querySelectorAll('button:not(#prevPage):not(#nextPage)');
                buttons.forEach((button, index) => {
                    if (index + 1 === currentPage) {
                        button.classList.add('active');
                    } else {
                        button.classList.remove('active');
                    }
                });
            }
        }
        
        // Search function
        function setupSearch() {
            const searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('keyup', function() {
                const searchValue = this.value.toLowerCase();
                const table = document.getElementById('bookingTableBody');
                const rows = table.querySelectorAll('tr');
                
                rows.forEach(row => {
                    const travelerName = row.getAttribute('data-traveler');
                    const bookingId = row.getAttribute('data-booking');
                    const propertyType = row.getAttribute('data-type');
                    const propertyName = row.getAttribute('data-name');
                    const status = row.getAttribute('data-status');
                    
                    // Check if any of the fields match the search value
                    if (travelerName.includes(searchValue) || 
                        bookingId.includes(searchValue) || 
                        propertyType.includes(searchValue) || 
                        propertyName.includes(searchValue) ||
                        status.includes(searchValue)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
                
                // Refresh pagination after search
                setupPagination();
            });
        }
        
        // Filter function
        function setupFilter() {
            const filterSelect = document.getElementById('filterSelect');
            filterSelect.addEventListener('change', function() {
                const filterValue = this.value;
                const searchInput = document.getElementById('searchInput');
                
                // If "All" is selected, show all rows
                if (filterValue === 'all') {
                    const table = document.getElementById('bookingTableBody');
                    const rows = table.querySelectorAll('tr');
                    rows.forEach(row => {
                        row.style.display = '';
                    });
                    searchInput.placeholder = "Search bookings...";
                } else {
                    // Update placeholder based on filter
                    switch(filterValue) {
                        case 'traveler_name':
                            searchInput.placeholder = "Search by traveler name...";
                            break;
                        case 'booking_id':
                            searchInput.placeholder = "Search by booking ID...";
                            break;
                        case 'property_type':
                            searchInput.placeholder = "Search by accommodation type...";
                            break;
                        case 'property_name':
                            searchInput.placeholder = "Search by accommodation name...";
                            break;
                        case 'status':
                            searchInput.placeholder = "Search by status...";
                            break;
                    }
                    
                    // Clear the search input
                    searchInput.value = '';
                    
                    // Trigger search to reset view
                    searchInput.dispatchEvent(new Event('keyup'));
                }
                
                // Refresh pagination after filter
                setupPagination();
            });
        }
        
        // Update row numbers function
        function updateRowNumbers() {
            const table = document.getElementById('bookingTableBody');
            const visibleRows = Array.from(table.querySelectorAll('tr')).filter(row => row.style.display !== 'none');
            
            visibleRows.forEach((row, index) => {
                const rowNumberCell = row.querySelector('td.row-number');
                if (rowNumberCell) {
                    rowNumberCell.textContent = index + 1;
                }
            });
        }
     </script>
</body>

</html>
