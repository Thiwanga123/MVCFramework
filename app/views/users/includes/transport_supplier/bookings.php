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
                    <form action="<?php echo URLROOT; ?>/booking/addVehicleBooking" method="POST" class="bookingForm" id="bookingForm">
        
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($details->id); ?>">
                        <input type="hidden" name="supplier_id" value="<?php echo htmlspecialchars($details->supplier_id); ?>">
                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($details->price_per_day); ?>">
                        <input type="hidden" name="pickup_lat" id="pickup_lat">
                        <input type="hidden" name="pickup_lng" id="pickup_lng">

                        <div class="input">
                            <div class="start">
                                <label for="start_date">Start Date:</label>
                                <input type="date" id="booking_start_date" name="booking_start_date" required>
                            </div>
                            <div class="end">
                                <label for="end_date">End Date:</label>
                                <input type="date" id="booking_end_date" name="booking_end_date" required>
                            </div>
                        </div>
                        <div class="pickup-location-container">
                            <button type="button" class="pickup-btn" onclick="openPickupMap()">Set Pickup Location</button>
                            <p id="pickupLocationDisplay" style="margin-top: 5px;"></p>
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

    <div id="pickupMapModal" class="modal" style="display: none;">
        <div class="modal-content" style="width: 90%; max-width: 600px;">
            <span class="close-button" onclick="closePickupMap()">&times;</span>
            <h3>Select Pickup Location</h3>
            <div id="googleMap" style="height: 400px;"></div>
            <button onclick="confirmPickupLocation()">Confirm Location</button>
        </div>
    </div>