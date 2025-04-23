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
            <form action="<?php echo URLROOT; ?>/booking/addGuiderBooking" method="POST" class="bookingForm" id="bookingForm">
    
             
            <input type="hidden" name="supplier_id" value="<?php echo htmlspecialchars($details->id); ?>">
            <input type="hidden" name="price" value="<?php echo htmlspecialchars($details->base_rate); ?>">
            <input type="hidden" name="pickup_lat" id="pickup_lat">
            <input type="hidden" name="pickup_lng" id="pickup_lng">
          

            <div class="input">
                <div class="start">
                <label for="start_date">Start Date:</label>
                <input type="date" id="booking_start_date" name="booking_start_date" required onchange="validateDates()">
                </div>
                <div class="end">
                <label for="end_date">End Date:</label>
                <input type="date" id="booking_end_date" name="booking_end_date" required onchange="validateDates()">
                </div>
                <script>
                const unavailableDates = <?php echo json_encode($data['unavailabale']); ?>;
                const bookings = <?php echo $data['bookings']; ?>;

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

                    for (const date of unavailableDates) {
                        const unavailableDate = new Date(date);
                        if (startDate <= unavailableDate && unavailableDate <= endDate) {
                        showErrorMessage('Selected dates overlap with unavailable dates.');
                        return;
                        }
                    }

                    for (const booking of bookings) {
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
    <div class="modal-content"></div>
        <span class="close-button" id="closeSuccessModal">&times;</span>
        <img src="<?php echo URLROOT;?>/Images/1930264_check_complete_done_green_success_icon.png" alt="">
        <p id="successModalMessage"></p>
    </div>
    </div>

    <div id="responseErrorModal" class="modal" style="display: none;">
    <div class="modal-content"></div>
        <span class="close-button" id="closeErrorModal">&times;</span>
        <img src="<?php echo URLROOT;?>/Images/warning.png" alt="">

        <p id="errorModalMessage"></p>
    </div>
    </div>
