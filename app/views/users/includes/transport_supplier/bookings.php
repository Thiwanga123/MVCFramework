<div class="booking">
        <h2>Rent Vehicle</h2>
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
        
                     
                        <input type="hidden" name="supplier_id" value="<?php echo htmlspecialchars($vehicles->supplierId); ?>">
                        
                        <!-- Store both rate types -->

                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($vehicles->vehicle_id); ?>">
                        <input type="hidden" name="with_driver_rate" value="<?php echo htmlspecialchars($vehicles->cost); ?>">
                        <input type="hidden" name="self_drive_rate" value="<?php echo htmlspecialchars($vehicles->rate); ?>">
                        <input type="hidden" name="price" id="selected_rate" value="<?php echo htmlspecialchars($vehicles->rate); ?>">
                        
                        <input type="hidden" name="pickup_lat" id="pickup_lat">
                        <input type="hidden" name="pickup_lng" id="pickup_lng">
                        <input type="hidden" name="sp_type" value="transport_supplier">
                        <input type="hidden" name="vehicle_name" value="<?php echo htmlspecialchars($vehicles->brand . ' ' . $vehicles->model); ?>">
                        <input type="hidden" name="days" id="days">
                        <input type="hidden" name="totalPrice" id="totalPriceInput">
                        <input type="hidden" name="order_id" id="order_id" value="<?php echo 'ORDER'.time(); ?>">
                        <input type="hidden" name="pickupLocation" id="hiddenPickupLocation">
                        <input type="hidden" name="tripDestination" id="hiddenTripDestination">
                       

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
                        
                        <!-- Driver options -->
                        <div class="driver-options" style="margin-top: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
                            <label style="display: block; margin-bottom: 10px; font-weight: bold; color: #333;">Select Driver Option:</label>
                            
                            <div class="option" style="margin-bottom: 8px;">
                                <input type="radio" id="with_driver" name="driver_option" value="with_driver" checked onchange="updateRate()">
                                <label for="with_driver">With Driver (Rs <?php echo number_format($vehicles->cost, 2); ?> per day)</label>
                            </div>
                            
                            <div class="option">
                                <input type="radio" id="without_driver" name="driver_option" value="without_driver" onchange="updateRate()">
                                <label for="without_driver">Without Driver (Rs <?php echo number_format($vehicles->rate, 2); ?> per day)</label>
                            </div>
                        </div>
                        
                        <!-- Location inputs -->
                        <div class="location-container" style="margin-top: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
                            <label for="pickupLocation" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">Pickup Location:</label>
                            <input type="text" id="pickupLocation" name="pickupLocation" placeholder="Enter Pickup Address" 
                                  style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">
                            
                            <label for="tripDestination" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">Destination Location:</label>
                            <input type="text" id="tripDestination" name="tripDestination" placeholder="Enter Destination Address" 
                                  style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>
                        
                        <div class="totalPriceContainer" id="totalPriceContainer" style="display: none; margin-top: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
                            <p>Total Days: <span id="totalDays"></span></p>
                            <p>Rate per day: Rs <span id="ratePerDay"></span></p>
                            <p>Total Price: <span id="totalPrice" style="font-weight: bold; color: #2e7d32;"></span></p>
                        </div>
                        
                        <div class="errorMessageContainer" id="errorMessageContainer" style="display: none;"></div>
                        
                        <div class="cont" style="margin-top: 15px;">
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

    <div id="pickupMapModal" class="modal" style="display: none;">
        <div class="modal-content" style="width: 90%; max-width: 600px;">
            <span class="close-button" onclick="closePickupMap()">&times;</span>
            <h3>Select Pickup Location</h3>
            <div id="googleMap" style="height: 400px;"></div>
            <button onclick="confirmPickupLocation()">Confirm Location</button>
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
        
        // Set initial rate display
        updateRate();
        
        // Update form submission logic
        bookingForm.addEventListener('submit', function(event) {
            // Prevent default submission for validation
            event.preventDefault();

            // Check required fields
            if (!startDateInput.value || !endDateInput.value) {
                showErrorMessage('Please select both start and end dates');
                return false;
            }
            
            // Check pickup and destination
            const pickupLocation = document.getElementById('pickupLocation').value;
            const tripDestination = document.getElementById('tripDestination').value;
            
            if (!pickupLocation || !tripDestination) {
                showErrorMessage('Please enter both pickup and destination locations');
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

            // Update hidden inputs with user-entered values
            document.getElementById('hiddenPickupLocation').value = pickupLocation;
            document.getElementById('hiddenTripDestination').value = tripDestination;
            
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
    
    function updateRate() {
        const withDriverRate = parseFloat(document.querySelector('input[name="with_driver_rate"]').value);
        const selfDriveRate = parseFloat(document.querySelector('input[name="self_drive_rate"]').value);
        const withDriverSelected = document.getElementById('with_driver').checked;
        
        // Update the selected rate
        if(withDriverSelected) {
            document.getElementById('selected_rate').value = withDriverRate;
            document.getElementById('ratePerDay').textContent = withDriverRate.toFixed(2);
        } else {
            document.getElementById('selected_rate').value = selfDriveRate;
            document.getElementById('ratePerDay').textContent = selfDriveRate.toFixed(2);
        }
        
        // Recalculate total price
        calculateTotalPrice();
    }
    
    function calculateTotalPrice() {
        const startDate = new Date(document.getElementById('booking_start_date').value);
        const endDate = new Date(document.getElementById('booking_end_date').value);
        const baseRate = parseFloat(document.getElementById('selected_rate').value);
        
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