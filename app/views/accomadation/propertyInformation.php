<html>
<head>
    <title>Property Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/accomodation/property.css">
</head>
<body>
<?php require APPROOT . '/views/inc/components/startheader.php'; ?>
    <div class="container">
        <div class="content">
            <h2>Property Details</h2>
            <div class="section">
                <label>Where can people sleep?</label>
                <div class="sleeping-places">
                    <div class="place">
                        <label>Single Bedroom</label>
                        <input type="number" name="single" id="single">
                    </div>
                    <div class="place">
                        <label>Double Bedroom</label>
                        <input type="number" name="double" id="double">
                    </div>
                    <div class="place">
                        <label>Living Room</label>
                        <input type="number" name="living" id="living">
                    </div>
                    <div class="place">
                        <label>Family Bedroom</label>
                        <input type="number" name="family" id="family">
                    </div>
                </div>
            </div>
            <div class="section">
                <label>How many guests can stay?</label>
                <div class="counter">
                    <input type="number" id="guests" name="guests">
                </div>
            </div>
            <div class="section">
                <label>How many bathrooms are there?</label>
                <div class="counter">
                    <input type="number" id="bathrooms" name="bathrooms">
                </div>
            </div>
            <div class="section">
                <label>Do you allow children?</label>
                <div class="radio-group">
                    <label><input type="radio" id="children_yes" name="children" value="yes" checked> Yes</label>
                    <label><input type="radio" id="children_no" name="children" value="no"> No</label>
                </div>
            </div>
            <div class="section">
                <label>Do you offer cots?</label>
                <div class="radio-group">
                    <label><input type="radio" id="cots_yes" name="cots" value="yes" checked> Yes</label>
                    <label><input type="radio" id="cots_no" name="cots" value="no"> No</label>
                </div>
            </div>
            <div class="section">
                <label>How big is this apartment?</label>
                <input type="text" id="apartment_size" name="apartment_size" placeholder="Apartment size - optional">
                <select id="apartment_unit" name="apartment_unit">
                    <option value="square metres">square metres</option>
                    <option value="square feet">square feet</option>
                </select>
            </div>
            <div class="section">
                <h2>Facilities</h2>
                <div class="checkbox-group">
                    <label><input type="checkbox" id="air_conditioning" name="facilities[]" value="air_conditioning"> Air conditioning</label>
                    <label><input type="checkbox" id="heating" name="facilities[]" value="heating"> Heating</label>
                    <label><input type="checkbox" id="wifi" name="facilities[]" value="wifi"> Free WiFi</label>
                    <label><input type="checkbox" id="ev_charging" name="facilities[]" value="ev_charging"> Electric vehicle charging station</label>
                </div>
            </div>
            <div class="section">
                <label>Cooking and cleaning</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" id="kitchen" name="cooking_cleaning[]" value="kitchen"> Kitchen</label>
                    <label><input type="checkbox" id="kitchenette" name="cooking_cleaning[]" value="kitchenette"> Kitchenette</label>
                    <label><input type="checkbox" id="washing_machine" name="cooking_cleaning[]" value="washing_machine"> Washing machine</label>
                </div>
            </div>
            <div class="section">
                <label>Entertainment</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" id="tv" name="entertainment[]" value="tv"> Flat-screen TV</label>
                    <label><input type="checkbox" id="swimming_pool" name="entertainment[]" value="swimming_pool"> Swimming pool</label>
                    <label><input type="checkbox" id="hot_tub" name="entertainment[]" value="hot_tub"> Hot tub</label>
                    <label><input type="checkbox" id="minibar" name="entertainment[]" value="minibar"> Minibar</label>
                    <label><input type="checkbox" id="sauna" name="entertainment[]" value="sauna"> Sauna</label>
                </div>
            </div>
           
            
        </div>
        <div class="content">
            <h2>House Rules</h2>
            <div class="section">
                <label>Smoking allowed</label>
                <div class="radio-group">
                    <label><input type="radio" id="smoking_yes" name="smoking" value="yes" checked> Yes</label>
                    <label><input type="radio" id="smoking_no" name="smoking" value="no"> No</label>
                </div>
            </div>
            <div class="section">
                <label>Parties/events allowed</label>
                <div class="radio-group">
                    <label><input type="radio" id="parties_yes" name="parties" value="yes" checked> Yes</label>
                    <label><input type="radio" id="parties_no" name="parties" value="no"> No</label>
                </div>
            </div>
            <div class="section">
                <label>Do you allow pets?</label>
                <div class="radio-group">
                    <label><input type="radio" id="pets_request" name="pets" value="request" checked> Upon request</label>
                    <label><input type="radio" id="pets_no" name="pets" value="no"> No</label>
                </div>
            </div>
            <div class="section">
                
                
            </div>
            <div class="section">
                <label>Check in</label>
                <div class="check-in-out">
                    <div>
                        <label>From</label>
                        <input type="time" id="checkin_from" name="checkin_from" >
                    </div>
                    <div>
                        <label>Until</label>
                        <input type="time" id="checkin_until" name="checkin_until">
                    </div>
                </div>
            </div>
            <div class="section">
                <label>Check out</label>
                <div class="check-in-out">
                    <div>
                        <label>From</label>
                        <input type="time" id="checkout_from" name="checkout_from">
                    </div>
                    <div>
                        <label>Until</label>
                        <input type="time" id="checkout_until" name="checkout_until">
                    </div>
                </div>
            </div>
            <h2>Other things</h2>
            <br>
            <div class="section">
                <label>What languages do you or your staff speak?</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" id="english" name="languages[]" value="english"> English</label>
                    <label><input type="checkbox" id="french" name="languages[]" value="french"> French</label>
                    <label><input type="checkbox" id="german" name="languages[]" value="german"> German</label>
                    <label><input type="checkbox" id="hindi" name="languages[]" value="hindi"> Hindi</label>
                </div>
            </div>

            <div class="section">
                <label>Outside and view</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" id="balcony" name="outside_view[]" value="balcony"> Balcony</label>
                    <label><input type="checkbox" id="garden_view" name="outside_view[]" value="garden_view"> Garden view</label>
                    <label><input type="checkbox" id="terrace" name="outside_view[]" value="terrace"> Terrace</label>
                    <label><input type="checkbox" id="view" name="outside_view[]" value="view"> View</label>
                </div>

                
            </div>
            <div class="next-button-container">
            <a href="<?php echo URLROOT;?>/accomadation/uploadphoto"><button class="next-button">Next</button></a>
            </div>
            

        </div>
        

    </div>
    
</body>
</html>
