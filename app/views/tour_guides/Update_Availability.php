<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventory.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <title>Update Availability</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        /* Internal CSS for the page */
        :root {
            --primary-color: #1a73e8;
            --primary-hover: #0d5bdd;
            --danger-color: #dc3545;
            --danger-hover: #c82333;
            --info-color: #17a2b8;
            --info-hover: #138496;
            --light-bg: #f5f5f5;
            --white: #ffffff;
            --dark: #343a40;
            --border-color: #dee2e6;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --blue-theme: #e8f0fe;
            --blue-border: #4285f4;
            --blue-text: #1a73e8;
        }

        h1 {
            color: #00897B;
            margin-bottom: 20px;
            border-bottom: 3px solid #00897B;
            display: inline-block;
            padding-bottom: 5px;
        }

        /* Content area */
        .content main {
            padding: 20px;
            background-color: var(--light-bg);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        /* Two-column layout container */
        .two-column-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        /* Calendar container - left column */
        .calendar-container {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: var(--shadow);
            padding: 20px;
            margin-bottom: 30px;
            border-top: 4px solid var(--blue-border);
            flex: 1;
            min-width: 300px;
            max-width: 100%;
        }

        /* Table container - right column */
        .unavailable-dates-container {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: var(--shadow);
            padding: 20px;
            border-top: 4px solid var(--blue-border);
            flex: 1;
            min-width: 300px;
            max-width: 100%;
        }

        /* Responsive adjustments */
        @media (min-width: 992px) {
            .calendar-container {
                flex: 1;
                max-width: 48%;
            }
            .unavailable-dates-container {
                flex: 1;
                max-width: 48%;
            }
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .calendar-header h3 {
            color: var(--blue-text);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1.25rem;
            margin: 0;
        }

        .calendar-instructions {
            margin-bottom: 15px;
            padding: 10px;
            background-color: var(--blue-theme);
            border-left: 4px solid var(--blue-border);
            border-radius: 4px;
            color: #333;
        }

        .calendar-instructions p {
            margin: 0;
            display: flex;
            align-items: center;
        }

        .calendar-instructions i {
            margin-right: 8px;
            color: var(--blue-text);
        }

        /* Calendar styling */
        #availability-calendar {
            width: 100%;
            margin: 0 auto;
        }

        .flatpickr-calendar {
            box-shadow: var(--shadow) !important;
            border-radius: 8px !important;
            border: 1px solid #ddd !important;
            margin: 0 auto !important;
            width: 100% !important;
        }

        .flatpickr-day {
            border-radius: 4px !important;
            margin: 2px !important;
        }

        .flatpickr-day.unavailable {
            background-color: #ffebee !important;
            color: var(--danger-color) !important;
            border: 1px dashed var(--danger-color) !important;
        }

        .calendar-legend {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            justify-content: center;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .legend-color {
            width: 16px;
            height: 16px;
            border-radius: 4px;
        }

        .legend-available {
            background-color: #ffffff;
            border: 1px solid #ddd;
        }

        .legend-unavailable {
            background-color: #ffebee;
            border: 1px solid var(--danger-color);
        }

        /* Table for unavailable dates */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead {
            background-color: var(--primary-color);
            color: var(--white);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        tbody tr:hover {
            background-color: var(--blue-theme);
        }

        .action-button {
            display: flex;
            gap: 10px;
        }

        .edit-btn {
            background-color: var(--info-color);
            color: var(--white);
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.875rem;
        }

        .delete-btn {
            background-color: var(--danger-color);
            color: var(--white);
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.875rem;
        }

        /* Modal styling */
        dialog {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 0;
            max-width: 400px;
            width: 100%;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: 0;
        }

        dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: var(--primary-color);
            color: white;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .modal-title {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .close-modal {
            background: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: white;
        }

        .modal-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.15s ease-in-out;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(26, 115, 232, 0.25);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            padding: 15px 20px;
            border-top: 1px solid var(--border-color);
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            border: none;
            transition: var(--transition);
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background-color: var(--danger-hover);
        }

        /* Animation for dialog */
        @keyframes fadeIn {
            from { opacity: 0; transform: translate(-50%, -60%); }
            to { opacity: 1; transform: translate(-50%, -50%); }
        }

        dialog[open] {
            animation: fadeIn 0.3s ease-out;
        }

        .reason-badge {
            display: inline-block;
            padding: 4px 8px;
            background-color: #ffebee;
            border-radius: 4px;
            border-left: 3px solid var(--danger-color);
            font-size: 14px;
            color: var(--danger-color);
        }

        .empty-state {
            padding: 30px;
            text-align: center;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.5;
            color: var(--primary-color);
        }

        /* Date display in modal */
        .selected-date-display {
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 15px;
            color: var(--primary-color);
            text-align: center;
            padding: 8px;
            background-color: var(--blue-theme);
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="box">
    <!-- SideBar -->
    <?php include('Sidebar.php'); ?>
    
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
            <a href="#" class="profile">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>Update Availability</h1>
                </div>
            </div>

            <div class="two-column-container">
                <div class="calendar-container">
                    <div class="calendar-header">
                        <h3><i class="fas fa-calendar-alt"></i> Manage Your Availability</h3>
                    </div>
                    <div class="calendar-instructions">
                        <p><i class="fas fa-info-circle"></i> Click on dates to mark them as unavailable. You'll be prompted to provide a reason for your unavailability.</p>
                    </div>
                    <div id="availability-calendar"></div>
                    <div class="calendar-legend">
                        <div class="legend-item">
                            <div class="legend-color legend-available"></div>
                            <span>Available</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color legend-unavailable"></div>
                            <span>Unavailable</span>
                        </div>
                    </div>
                </div>

                <div class="unavailable-dates-container">
                    <div class="table-header">
                        <h3><i class="fas fa-calendar-times"></i> Unavailable Dates</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="unavailable-dates-table">
                            <?php if(isset($data) && !empty($data)) : ?>
                                <?php foreach($data as $available): ?>
                                    <tr>
                                        <td><?php echo date('Y-m-d', strtotime($available->available_date)); ?></td>
                                        <td>
                                            <div class="reason-badge">
                                                <?php echo !empty($available->reason) ? $available->reason : 'No reason provided'; ?>
                                            </div>
                                        </td>
                                        <td class="action-button">
                                            <button class="edit-btn" 
                                                data-id="<?php echo $available->id; ?>"
                                                data-date="<?php echo $available->available_date; ?>"
                                                data-reason="<?php echo $available->reason; ?>">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button class="delete-btn" data-id="<?php echo $available->id; ?>">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="3" class="empty-state">
                                        <i class="fas fa-calendar-check"></i>
                                        <p>No unavailable dates found. Click on dates in the calendar to mark them as unavailable.</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
     </div>
    </div>

    <!-- Add Unavailable Date Modal -->
    <dialog id="addUnavailableDateModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-calendar-times"></i> Mark Date as Unavailable</h5>
                <button type="button" class="close-modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="addUnavailableDateForm" action="<?php echo URLROOT; ?>/Tour_Guides/addAvailability" method="post">
                <div class="modal-body">
                    <div class="selected-date-display" id="display_selected_date"></div>
                    <input type="hidden" id="selected_date" name="available_date">
                    
                    <!-- Adding required hidden fields with default values -->
                    <input type="hidden" id="available_time_from" name="available_time_from" value="09:00">
                    <input type="hidden" id="available_time_to" name="available_time_to" value="17:00">
                    <input type="hidden" id="charges_per_hour" name="charges_per_hour" value="1500">
                    <input type="hidden" id="location" name="location" value="Default Location">
                    
                    <div class="form-group">
                        <label for="reason"><i class="fas fa-exclamation-circle"></i> Reason for Unavailability</label>
                        <textarea class="form-control" id="reason" name="reason" placeholder="Please provide a reason why you're unavailable on this date" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal">Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-calendar-times"></i> Mark as Unavailable</button>
                </div>
            </form>
        </div>
    </dialog>

    <!-- Edit Unavailable Date Modal -->
    <dialog id="editUnavailableDateModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Unavailable Date</h5>
                <button type="button" class="close-modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="editUnavailableDateForm" action="<?php echo URLROOT; ?>/Tour_Guides/editAvailability" method="post">
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="selected-date-display" id="edit_display_selected_date"></div>
                    <input type="hidden" id="edit_available_date" name="available_date">
                    
                    <!-- Adding required hidden fields with default values -->
                    <input type="hidden" id="edit_available_time_from" name="available_time_from" value="09:00">
                    <input type="hidden" id="edit_available_time_to" name="available_time_to" value="17:00">
                    <input type="hidden" id="edit_charges_per_hour" name="charges_per_hour" value="1500">
                    <input type="hidden" id="edit_location" name="location" value="Default Location">
                    
                    <div class="form-group">
                        <label for="edit_reason"><i class="fas fa-exclamation-circle"></i> Reason for Unavailability</label>
                        <textarea class="form-control" id="edit_reason" name="reason" placeholder="Please provide a reason why you're unavailable on this date" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal">Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </dialog>

    <!-- Delete Confirmation Modal -->
    <dialog id="deleteConfirmModal">
        <div class="modal-content">
            <div class="modal-header error-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close-modal" aria-label="Close" style="color: white;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this unavailable date record?</p>
                <form id="deleteUnavailableDateForm" action="<?php echo URLROOT; ?>/Tour_Guides/deleteAvailability" method="post">
                    <input type="hidden" id="delete_id" name="id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </dialog>

    <!-- Success Message Dialog -->
    <dialog id="successModal">
        <div class="modal-content">
            <div class="modal-header success-header">
                <h5 class="modal-title">Success</h5>
                <button type="button" class="close-modal" aria-label="Close" style="color: white;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p id="successMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success close-modal">OK</button>
            </div>
        </div>
    </dialog>

    <!-- Error Message Dialog -->
    <dialog id="errorModal">
        <div class="modal-content">
            <div class="modal-header error-header">
                <h5 class="modal-title">Error</h5>
                <button type="button" class="close-modal" aria-label="Close" style="color: white;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p id="errorMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger close-modal">OK</button>
            </div>
        </div>
    </dialog>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal elements
        const addUnavailableDateModal = document.getElementById('addUnavailableDateModal');
        const editUnavailableDateModal = document.getElementById('editUnavailableDateModal');
        const deleteConfirmModal = document.getElementById('deleteConfirmModal');
        const successModal = document.getElementById('successModal');
        const errorModal = document.getElementById('errorModal');
        
        // Buttons
        const editBtns = document.querySelectorAll('.edit-btn');
        const deleteBtns = document.querySelectorAll('.delete-btn');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        const closeModalBtns = document.querySelectorAll('.close-modal');
        
        // Forms
        const addUnavailableDateForm = document.getElementById('addUnavailableDateForm');
        const editUnavailableDateForm = document.getElementById('editUnavailableDateForm');
        const deleteUnavailableDateForm = document.getElementById('deleteUnavailableDateForm');
        
        // Get unavailable dates from PHP with reasons
        let unavailableDates = [];
        <?php if(isset($data) && !empty($data)) : ?>
            <?php foreach($data as $available): ?>
                unavailableDates.push({
                    date: "<?php echo date('Y-m-d', strtotime($available->available_date)); ?>",
                    id: "<?php echo $available->id; ?>",
                    reason: "<?php echo isset($available->reason) ? addslashes($available->reason) : ''; ?>"
                });
            <?php endforeach; ?>
        <?php endif; ?>
        
        // Initialize calendar with flatpickr
        const calendar = flatpickr("#availability-calendar", {
            inline: true,
            mode: "single",
            dateFormat: "Y-m-d",
            minDate: "today",
            enable: [
                function(date) {
                    // Enable all future dates
                    return date >= new Date();
                }
            ],
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                // Mark unavailable dates in red
                const formattedDate = dayElem.dateObj.toISOString().split('T')[0];
                const isUnavailable = unavailableDates.some(date => date.date === formattedDate);
                
                if (isUnavailable) {
                    dayElem.classList.add('unavailable');
                }
            },
            onChange: function(selectedDates, dateStr, instance) {
                // Handle date selection
                const selectedDate = selectedDates[0];
                const formattedDate = selectedDate.toISOString().split('T')[0];
                const displayDate = selectedDate.toLocaleDateString('en-US', { 
                    weekday: 'long', 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric' 
                });
                
                // Check if the date is already unavailable
                const unavailableDate = unavailableDates.find(date => date.date === formattedDate);
                
                if (unavailableDate) {
                    // Date is already unavailable, show edit modal
                    document.getElementById('edit_id').value = unavailableDate.id;
                    document.getElementById('edit_available_date').value = formattedDate;
                    document.getElementById('edit_display_selected_date').textContent = displayDate;
                    document.getElementById('edit_reason').value = unavailableDate.reason;
                    
                    editUnavailableDateModal.showModal();
                } else {
                    // Date is available, show add modal
                    document.getElementById('selected_date').value = formattedDate;
                    document.getElementById('display_selected_date').textContent = displayDate;
                    
                    addUnavailableDateModal.showModal();
                }
            }
        });
        
        // Show Edit Unavailable Date Modal
        editBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const date = this.getAttribute('data-date');
                const reason = this.getAttribute('data-reason');
                
                const displayDate = new Date(date).toLocaleDateString('en-US', { 
                    weekday: 'long', 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric' 
                });
                
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_available_date').value = date;
                document.getElementById('edit_display_selected_date').textContent = displayDate;
                document.getElementById('edit_reason').value = reason;
                
                editUnavailableDateModal.showModal();
            });
        });
        
        // Show Delete Confirmation Modal
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                document.getElementById('delete_id').value = id;
                deleteConfirmModal.showModal();
            });
        });
        
        // Confirm Delete
        confirmDeleteBtn.addEventListener('click', function() {
            deleteUnavailableDateForm.submit();
        });
        
        // Close all modals
        closeModalBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const modal = this.closest('dialog');
                modal.close();
            });
        });
        
        // Form Validation for Add Form
        addUnavailableDateForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const reasonInput = document.getElementById('reason');
            
            // Validate reason
            if (!reasonInput.value.trim()) {
                showError('Please provide a reason for unavailability.');
                return;
            }
            
            // Add a small delay before submitting to ensure all data is captured
            setTimeout(() => {
                this.submit();
            }, 100);
        });
        
        // Form Validation for Edit Form
        editUnavailableDateForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const reasonInput = document.getElementById('edit_reason');
            
            // Validate reason
            if (!reasonInput.value.trim()) {
                showError('Please provide a reason for unavailability.');
                return;
            }
            
            // Add a small delay before submitting to ensure all data is captured
            setTimeout(() => {
                this.submit();
            }, 100);
        });
        
        // Show error message
        function showError(message) {
            document.getElementById('errorMessage').textContent = message;
            errorModal.showModal();
        }
        
        // Show success message if available in URL params
        const urlParams = new URLSearchParams(window.location.search);
        const successMsg = urlParams.get('success');
        const errorMsg = urlParams.get('error');
        
        if (successMsg) {
            document.getElementById('successMessage').textContent = decodeURIComponent(successMsg);
            successModal.showModal();
        }
        
        if (errorMsg) {
            document.getElementById('errorMessage').textContent = decodeURIComponent(errorMsg);
            errorModal.showModal();
        }
    });
    </script>
</body>
</html>
