        <?php 
        if (!defined('APPROOT')) {
            define('APPROOT', dirname(dirname(dirname(__FILE__))));
        }
        include_once APPROOT . '/views/inc/components/calendar.php'; ?>                       
            <form action="<?php echo URLROOT; ?>/booking/process" method="POST">
                <label for="date">Select Date:</label>
                <input type="date" id="date" name="date" required>
                <button type="submit">Book Now</button>
            </form>