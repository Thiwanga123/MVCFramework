<div class="booking">
    <h2>Guider Booking</h2>
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
                    <input type="hidden" name="supplier_id" value="<?php echo htmlspecialchars($guiders->id); ?>">
                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($guiders->base_rate); ?>">
                    <input type="hidden" name="pickup_lat" id="pickup_lat">
                    <input type="hidden" name="pickup_lng" id="pickup_lng">
              

                    <div class="input">
                        <div class="start">
                            <label for="start_date">Start Date:</label>
                            <input type="date" id="booking_start_date" name="booking_start_date" required onchange="updateEndDateMin(); validateDates()">
                        </div>
                        <div class="end">
                            <label for="end_date">End Date:</label>
                            <input type="date" id="booking_end_date" name="booking_end_date" required onchange="validateDates()">
                        </div>
                        <script>
                            const unavailableDates = <?php echo json_encode($data['unavailabale']); ?>;
                            const bookings = <?php echo $data['bookings']; ?>;
                            
                            // Set minimum date to today for date inputs
                            document.addEventListener('DOMContentLoaded', function() {
                                const today = new Date().toISOString().split('T')[0];
                                document.getElementById('booking_start_date').min = today;
                                document.getElementById('booking_end_date').min = today;
                            });
                            
                            // Update end date minimum value when start date changes
                            function updateEndDateMin() {
                                const startDate = document.getElementById('booking_start_date').value;
                                if (startDate) {
                                    document.getElementById('booking_end_date').min = startDate;
                                }
                            }

                            function validateDates() {
                                const startDate = new Date(document.getElementById('booking_start_date').value);
                                const endDate = new Date(document.getElementById('booking_end_date').value);
                                const errorMessageContainer = document.getElementById('errorMessageContainer');

                                errorMessageContainer.style.display = 'none';
                                errorMessageContainer.innerHTML = '';

                                if (startDate && endDate) {
                                    if (startDate > endDate) {
                                        showErrorMessage('Start date cannot be after end date.');
                                        return;
                                    }

                                    // Check unavailable dates
                                    for (const date of unavailableDates) {
                                        const unavailableDate = new Date(date);
                                        if (startDate <= unavailableDate && unavailableDate <= endDate) {
                                            showErrorMessage('Selected dates overlap with unavailable dates.');
                                            return;
                                        }
                                    }

                                    // Check bookings, excluding cancelled and completed ones
                                    for (const booking of bookings) {
                                        // Skip cancelled and completed bookings
                                        if (booking.status === 'cancelled' || booking.status === 'completed') {
                                            continue;
                                        }

                                        const checkIn = new Date(booking.check_in);
                                        const checkOut = new Date(booking.check_out);
                                        if (
                                            (startDate >= checkIn && startDate <= checkOut) ||
                                            (endDate >= checkIn && endDate <= checkOut) ||
                                            (startDate <= checkIn && endDate >= checkOut)
                                        ) {
                                            showErrorMessage('Selected dates overlap with existing bookings.');
                                            return;
                                        }
                                    }
                                    
                                    // Calculate total days and price when dates are valid
                                    calculateTotalPrice();
                                }
                            }

                            function showErrorMessage(message) {
                                const errorMessageContainer = document.getElementById('errorMessageContainer');
                                errorMessageContainer.style.display = 'block';
                                errorMessageContainer.innerHTML = `<p>${message}</p>`;
                            }
                        </script>
                    </div>
                    <div class="pickup-location-container" style="margin-top: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
                        <label for="pickupLocation" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">Pickup Location:</label>
                        <input type="text" id="pickupLocation" name="pickupLocation" placeholder="Enter Pickup Location" 
                               style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;" 
                               onfocus="initAutocomplete('pickupLocation')">

                        <label for="tripDestination" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">Trip Destination:</label>
                        <input type="text" id="tripDestination" name="tripDestination" placeholder="Enter Trip Destination" 
                               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" 
                               onfocus="initAutocomplete('tripDestination')">
                    </div>

                    <script>
                        let autocompletePickup, autocompleteDestination;

                        function initAutocomplete(inputId) {
                            const input = document.getElementById(inputId);
                            const options = {
                                types: ['geocode'],
                                componentRestrictions: { country: "us" }
                            };

                            if (inputId === 'pickupLocation') {
                                autocompletePickup = new google.maps.places.Autocomplete(input, options);
                                autocompletePickup.addListener('place_changed', () => {
                                    const place = autocompletePickup.getPlace();
                                    document.getElementById('pickup_lat').value = place.geometry.location.lat();
                                    document.getElementById('pickup_lng').value = place.geometry.location.lng();
                                });
                            } else if (inputId === 'tripDestination') {
                                autocompleteDestination = new google.maps.places.Autocomplete(input, options);
                            }
                        }
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&libraries=places"></script>
                    <div class="totalPriceContainer" id="totalPriceContainer" style="display: none;">
                        <p>Total Days: <span id="totalDays"></span></p>
                        <p>Total Price: <span id="totalPrice"></span></p>
                    </div>
                    <div class="errorMessageContainer" id="errorMessageContainer" style="display: none;"></div>
                    <div class="cont">
                        <button type="submit" id="booknow">Book Now</button>
                    </div>

                    <input type="hidden" name="days" id="days">
                    <input type="hidden" name="totalPrice" id="totalPriceInput">
                    <input type="hidden" name="order_id" id="order_id" value="<?php echo isset($data['order_id']) ? $data['order_id'] : 'ORDER'.time(); ?>">
                    <input type="hidden" name="guider_id" id="guider_id" value="<?php echo $guiders->id; ?>">
                    <input type="hidden" name="guider_name" id="guider_name" value="<?php echo $guiders->name; ?>">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Existing Modals -->
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

<!-- Updated JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the form and modal elements
        const bookingForm = document.getElementById('bookingForm');
        
        // Get date input elements
        const startDateInput = document.getElementById('booking_start_date');
        const endDateInput = document.getElementById('booking_end_date');
        const totalPriceInput = document.getElementById('totalPriceInput');
        
        // Update form submission logic
        bookingForm.addEventListener('submit', function(event) {
            // Prevent default form submission to validate first
            event.preventDefault();

            // Get form data for validation
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            const pickupLocation = document.getElementById('pickupLocation').value;
            const tripDestination = document.getElementById('tripDestination').value;

            // Check if required fields are filled
            if (!startDateInput.value || !endDateInput.value || !pickupLocation || !tripDestination) {
                showErrorMessage('Please fill in all required fields');
                return false;
            }

            // Calculate pricing info
            const pricingInfo = calculateTotalPrice();
            if (!pricingInfo) {
                showErrorMessage('Please select valid dates');
                return false;
            }

            // Update hidden fields with calculated values
            document.getElementById('days').value = pricingInfo.days;
            totalPriceInput.value = pricingInfo.price.toFixed(2);
            
            // Allow the form to submit normally to users/summary
            bookingForm.submit();
        });

        // Initialize calculation if dates are already set
        if (startDateInput.value && endDateInput.value) {
            calculateTotalPrice();
        }
    });
    
    // Function to calculate days and total price
    function calculateTotalPrice() {
        const startDate = new Date(document.getElementById('booking_start_date').value);
        const endDate = new Date(document.getElementById('booking_end_date').value);
        const baseRate = parseFloat(document.querySelector('input[name="price"]').value);
        
        // Check if both dates are valid
        if (startDate && endDate && startDate <= endDate) {
            // Calculate the difference in days - including both start and end dates
            const diffTime = Math.abs(endDate - startDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // Adding 1 to include the end date
            
            // Calculate total price
            const totalPrice = diffDays * baseRate;

            // Update the display
            document.getElementById('totalDays').textContent = diffDays;
            document.getElementById('totalPrice').textContent = 'Rs' + totalPrice.toFixed(2);
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

