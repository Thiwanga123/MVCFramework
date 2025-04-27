<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Order.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventory_acc.css">
    <title>Home</title>
    <style>
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

        /* Message display styles */
        .message {
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: space-between;
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

     <!-- Modal using property-modal classes -->
     <div id="bookingModal" class="property-modal">
        <div class="property-modal-content">
            <div class="modal-header">
                <h2>Booking Details</h2>
                <span class="close-modal" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-body">
                <p id="bookingDetails"></p>
            </div>
            <div class="modal-footer">
                <button class="modal-button btn-danger" id="cancelBookingBtn" onclick="deleteBooking()">Cancel Booking</button>
                <button class="modal-button btn-secondary" onclick="closeModal()">Close</button>
            </div>
        </div>
     </div>

     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
     <script>
        let allTableRows = [];
        let filteredRows = [];

        document.addEventListener('DOMContentLoaded', function() {
            closeModal();
            // Store all rows for reference
            allTableRows = Array.from(document.getElementById('bookingTableBody').querySelectorAll('tr'));
            filteredRows = [...allTableRows]; // Start with all rows
            
            setupSearch();
            setupFilter();
            setupPagination(filteredRows); // Initial pagination setup
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
            const deleteButton = document.getElementById('cancelBookingBtn');
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
        function setupPagination(rowsToDisplay) {
            const rowsPerPage = 10;
            let currentPage = 1;
            const pageCount = Math.ceil(rowsToDisplay.length / rowsPerPage);
            
            const paginationControls = document.getElementById('paginationControls');
            
            // Clear existing page buttons
            const existingButtons = paginationControls.querySelectorAll('button:not(#prevPage):not(#nextPage)');
            existingButtons.forEach(button => button.remove());
            
            // Create page buttons if there's more than one page
            if (pageCount > 1) {
                // Add page buttons
                for (let i = 1; i <= pageCount; i++) {
                    const pageButton = document.createElement('button');
                    pageButton.textContent = i;
                    if (i === 1) pageButton.classList.add('active');
                    
                    pageButton.addEventListener('click', function() {
                        currentPage = i;
                        showPage(currentPage, rowsToDisplay);
                        updateActiveButton(i);
                    });
                    
                    // Insert before the next button
                    paginationControls.insertBefore(pageButton, document.getElementById('nextPage'));
                }
            }
            
            // Show first page initially
            showPage(1, rowsToDisplay);
            
            // Update total items count
            document.getElementById('totalItems').textContent = rowsToDisplay.length;
            
            // Setup prev/next buttons
            document.getElementById('prevPage').addEventListener('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    showPage(currentPage, rowsToDisplay);
                    updateActiveButton(currentPage);
                }
            });
            
            document.getElementById('nextPage').addEventListener('click', function() {
                if (currentPage < pageCount) {
                    currentPage++;
                    showPage(currentPage, rowsToDisplay);
                    updateActiveButton(currentPage);
                }
            });
            
            // Update prev/next button states
            document.getElementById('prevPage').disabled = true;
            document.getElementById('nextPage').disabled = pageCount <= 1;
            
            function updateActiveButton(page) {
                const buttons = paginationControls.querySelectorAll('button:not(#prevPage):not(#nextPage)');
                buttons.forEach(button => {
                    button.classList.remove('active');
                    if (parseInt(button.textContent) === page) {
                        button.classList.add('active');
                    }
                });
                
                // Enable/disable prev/next buttons
                document.getElementById('prevPage').disabled = page === 1;
                document.getElementById('nextPage').disabled = page === pageCount;
            }
        }
        
        function showPage(page, rowsToDisplay) {
            const rowsPerPage = 10;
            
            // Hide all rows first
            allTableRows.forEach(row => {
                row.style.display = 'none';
            });
            
            // Show only the rows for the current page
            const start = (page - 1) * rowsPerPage;
            const end = Math.min(start + rowsPerPage, rowsToDisplay.length);
            
            for (let i = start; i < end; i++) {
                rowsToDisplay[i].style.display = '';
            }
            
            // Update pagination info
            document.getElementById('startRange').textContent = rowsToDisplay.length > 0 ? start + 1 : 0;
            document.getElementById('endRange').textContent = end;
            
            // Update row numbers
            updateRowNumbers();
        }
        
        // Search function
        function setupSearch() {
            const searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('input', function() {
                const searchValue = this.value.toLowerCase().trim();
                const filterCriteria = document.getElementById('filterSelect').value;
                
                if (searchValue === '') {
                    // If search is empty, show all rows or respect current filter
                    if (filterCriteria === 'all') {
                        filteredRows = [...allTableRows];
                    } else {
                        // Keep current filter only
                        filteredRows = filterRows(filterCriteria, '');
                    }
                } else {
                    // Apply search with filter
                    filteredRows = filterRows(filterCriteria, searchValue);
                }
                
                // Refresh pagination with filtered rows
                setupPagination(filteredRows);
            });
        }
        
        // Filter function
        function setupFilter() {
            const filterSelect = document.getElementById('filterSelect');
            filterSelect.addEventListener('change', function() {
                const filterValue = this.value;
                const searchInput = document.getElementById('searchInput');
                const searchValue = searchInput.value.toLowerCase().trim();
                
                // Update placeholder based on filter
                updateSearchPlaceholder(filterValue);
                
                // Apply filter
                if (searchValue === '' && filterValue === 'all') {
                    filteredRows = [...allTableRows];
                } else {
                    filteredRows = filterRows(filterValue, searchValue);
                }
                
                // Refresh pagination with filtered rows
                setupPagination(filteredRows);
            });
        }
        
        function updateSearchPlaceholder(filterValue) {
            const searchInput = document.getElementById('searchInput');
            switch(filterValue) {
                case 'all':
                    searchInput.placeholder = "Search bookings...";
                    break;
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
        }
        
        function filterRows(criteria, searchValue) {
            return allTableRows.filter(row => {
                if (criteria === 'all') {
                    // Search in all fields
                    return ['traveler', 'booking', 'type', 'name', 'status'].some(attr => {
                        const value = row.getAttribute('data-' + attr);
                        return value && value.includes(searchValue);
                    });
                } else {
                    // Search in specific field based on criteria
                    const mappedCriteria = criteria.replace('traveler_name', 'traveler')
                                                  .replace('property_type', 'type')
                                                  .replace('property_name', 'name')
                                                  .replace('booking_id', 'booking');
                    
                    const value = row.getAttribute('data-' + mappedCriteria);
                    return searchValue === '' || (value && value.includes(searchValue));
                }
            });
        }
        
        // Update row numbers function
        function updateRowNumbers() {
            const visibleRows = Array.from(document.getElementById('bookingTableBody').querySelectorAll('tr'))
                                    .filter(row => row.style.display !== 'none');
            
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
