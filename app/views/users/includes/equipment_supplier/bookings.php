<div class="booking">
        <h2>Rent Equipment</h2>
        <div class="div">
            <div class="left">
                <div class="cal">
                    <?php 
                    if (!defined('APPROOT')) {
                        define('APPROOT', dirname(dirname(dirname(__FILE__))));
                    }

                    include_once APPROOT . '/views/inc/components/calendar.php'; ?> 
                </div>
            </div>
            <div class="right">
                <div class="booking-form">
                    <form action="<?php echo URLROOT; ?>/users/summary" method="POST" class="bookingForm" id="bookingForm">
        
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($details->id); ?>">
                        <input type="hidden" name="supplier_id" value="<?php echo htmlspecialchars($details->supplier_id); ?>">
                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($details->price_per_day); ?>">
                        <input type="hidden" name="sp_type" value="equipment_supplier">
                        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($details->name); ?>">
                        <input type="hidden" name="days" id="days">
                        <input type="hidden" name="totalPrice" id="totalPriceInput">
                        <input type="hidden" name="order_id" id="order_id" value="<?php echo 'ORDER'.time(); ?>">

                        <div class="input">
                            <div class="start">
                                <label for="start_date">Start Date:</label>
                                <input type="date" id="booking_start_date" name="booking_start_date" required min="<?php echo date('Y-m-d'); ?>" onchange="calculateTotalPrice()">
                            </div>
                            <div class="end">
                                <label for="end_date">End Date:</label>
                                <input type="date" id="booking_end_date" name="booking_end_date" required min="<?php echo date('Y-m-d'); ?>" onchange="calculateTotalPrice()">
                            </div>
                        </div>
                        <div class="totalPriceContainer" id="totalPriceContainer" style="display: none;">
                            <p>Total Days : <span id="totalDays"></span></p>
                            <p>Total Price : <span id="totalPrice"></span></p>
                        </div>
                        <div class="errorMessageContainer" id="errorMessageContainer" style="display: none;"></div>
                        <div class="cont">
                            <button type="submit" id="booknow">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="responseSuccessModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-button" id="closeSuccessModal">&times;</span>
            <img src="<?php echo URLROOT;?>/Images/1930264_check_complete_done_green_success_icon.png" alt="">
            <p id="successModalMessage"></p>
        </div>
    </div>

    <div id="responseErrorModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-button" id="closeErrorModal">&times;</span>
            <img src="<?php echo URLROOT;?>/Images/warning.png" alt="">

            <p id="errorModalMessage"></p>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the form element
        const bookingForm = document.getElementById('bookingForm');
        
        // Get date input elements
        const startDateInput = document.getElementById('booking_start_date');
        const endDateInput = document.getElementById('booking_end_date');
        const totalPriceInput = document.getElementById('totalPriceInput');
        
        // Update form submission logic
        bookingForm.addEventListener('submit', function(event) {
            // Prevent default submission for validation
            event.preventDefault();

            // Validate required fields
            if (!startDateInput.value || !endDateInput.value) {
                showErrorMessage('Please select both start and end dates');
                return false;
            }

            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            
            // Validate date range
            if (startDate > endDate) {
                showErrorMessage('Start date cannot be after end date');
                return false;
            }

            // Calculate pricing info
            const pricingInfo = calculateTotalPrice();
            if (!pricingInfo) {
                showErrorMessage('Please select valid dates');
                return false;
            }

            // Update hidden fields
            document.getElementById('days').value = pricingInfo.days;
            totalPriceInput.value = pricingInfo.price.toFixed(2);
            
            // Submit the form
            bookingForm.submit();
        });

        // Initialize calculation if dates are already set
        if (startDateInput.value && endDateInput.value) {
            calculateTotalPrice();
        }
    });
    
    function showErrorMessage(message) {
        const errorMessageContainer = document.getElementById('errorMessageContainer');
        errorMessageContainer.style.display = 'block';
        errorMessageContainer.innerHTML = `<p>${message}</p>`;
    }
    
    function calculateTotalPrice() {
        const startDate = new Date(document.getElementById('booking_start_date').value);
        const endDate = new Date(document.getElementById('booking_end_date').value);
        const baseRate = parseFloat(document.querySelector('input[name="price"]').value);
        
        // Check if both dates are valid
        if (startDate && endDate && startDate <= endDate) {
            // Calculate the difference in days
            const diffTime = Math.abs(endDate - startDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            // Calculate total price
            const totalPrice = diffDays * baseRate;

            // Update the display
            document.getElementById('totalDays').textContent = diffDays;
            document.getElementById('totalPrice').textContent = 'Rs ' + totalPrice.toFixed(2);
            document.getElementById('totalPriceContainer').style.display = 'block';
            
            // Update hidden input for form submission
            document.getElementById('days').value = diffDays;
            document.getElementById('totalPriceInput').value = totalPrice.toFixed(2);
            
            return {
                days: diffDays,
                price: totalPrice
            };
        }
        
        return null;
    }
    </script>