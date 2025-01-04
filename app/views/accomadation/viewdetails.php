<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/accomodation/viewdetails.css">
    <title>Property Details</title>
    <style>
    </style>
</head>
<body>
    <div class="container">
        <div class="image-section">
            <img src="<?php echo URLROOT;?>/Images/Accomadation.jpg" alt="Property View" class="property-image">
        </div>
       
        <div class="property-details">
            <h1 class="property-title"><?php echo $accomadation->property_name;?></h1>
            <p class="property-location"><?php echo $accomadation->address;?></p>
            <p class="property-location"><?php echo $accomadation->city;?></p>
            
            <div class="property-price">LKR <?php echo $accomadation->price;?> per Day</div>
            
            <div class="features">
           
                <div class="feature">
                    Available Single Rooms
                    <span><?php echo $accomadation->single_bedrooms;?></span>
                </div>
                <div class="feature">
                    Available Double Rooms
                    <span><?php echo $accomadation->double_bedrooms;?></span>
                </div>
                <div class="feature">
                    Available Family Rooms
                    <span><?php echo $accomadation->family_rooms;?></span>
                </div>
                <div class="feature">
                    Available Bathrooms
                    <span><?php echo $accomadation->bathrooms;?></span>
                </div>
                <div class="feature">
                    Available Guests
                    <span><?php echo $accomadation->max_occupants;?></span>
                </div>
                <div class="feature">
                    Check-in
                    <span>from: <?php echo $accomadation->check_in_from;?></span>
                    <span>to: <?php echo $accomadation->check_in_until;?></span>
                </div>
                <div class="feature">
                    Check-out
                    <span>from: <?php echo $accomadation->check_out_from;?></span>
                    <span>to: <?php echo $accomadation->check_out_until;?></span>
                </div>
                <div class="feature">
                    Smoking
                    <span><?php echo $accomadation->smoking_allowed;?></span>
                </div>
                <div class="feature">
                    Pets
                    <span><?php echo $accomadation->pets_allowed;?></span>
                </div>
                <div class="feature">
                    Parties
                    <span><?php echo $accomadation->parties_allowed;?></span>
                </div>
                <div class="feature">
                    Children
                    <span><?php echo $accomadation->children_allowed;?></span>
                </div>
                <div class="feature">
                    Cots
                    <span><?php echo $accomadation->offers_ctos;?></span>
                </div>
            </div>
                                  
            <div class="amenities">
                <?php if ($accomadation->free_wifi == 1): ?>
                    <div class="amenity">Free Wifi</div>
                <?php endif; ?>
                <?php if ($accomadation->air_conditioning == 1): ?>
                    <div class="amenity">Air Conditioning</div>
                <?php endif; ?>
                <?php if ($accomadation->ev_charging == 1): ?>
                    <div class="amenity">EV Charging</div>
                <?php endif; ?>
                <?php if ($accomadation->kitchen == 1): ?>
                    <div class="amenity">Kitchen</div>
                <?php endif; ?>
                <?php if ($accomadation->kitchenette == 1): ?>
                    <div class="amenity">Kitchenette</div>
                <?php endif; ?>
                <?php if ($accomadation->washing_machine == 1): ?>
                    <div class="amenity">Washing Machine</div>
                <?php endif; ?>
                <?php if ($accomadation->flat_screen_tv == 1): ?>
                    <div class="amenity">TV</div>
                <?php endif; ?>
                <?php if ($accomadation->swimming_pool == 1): ?>
                    <div class="amenity">Swimming Pool</div>
                <?php endif; ?>
                <?php if ($accomadation->heating == 1): ?>
                    <div class="amenity">Heating</div>
                <?php endif; ?>
                <?php if ($accomadation->hot_tub == 1): ?>
                    <div class="amenity">Hot Tub</div>
                <?php endif; ?>
                <?php if ($accomadation->minibar == 1): ?>
                    <div class="amenity">Minibar</div>
                <?php endif; ?>
                <?php if ($accomadation->sauna == 1): ?>
                    <div class="amenity">Sauna</div>
                <?php endif; ?>
            </div>
        </div>
       
    </div>
</body>
</html>