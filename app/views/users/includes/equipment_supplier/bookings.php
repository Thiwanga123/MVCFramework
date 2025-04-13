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
                    <form action="<?php echo URLROOT; ?>/booking/addEquipmentBooking" method="POST" class="bookingForm">
        
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($details->id); ?>">

                        <div class="input">
                            <div class="start">
                                <label for="start_date">Start Date:</label>
                                <input type="date" id="start_date" name="start_date" required>
                            </div>
                            <div class="end">
                                <label for="end_date">End Date:</label>
                                <input type="date" id="end_date" name="end_date" required>
                            </div>
                        </div>
                        <div class="cont">
                            <button type="submit">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>