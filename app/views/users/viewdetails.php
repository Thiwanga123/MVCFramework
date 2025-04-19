<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Hotel Booking</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap" async defer></script>
    <script>
        function initMap() {
            const latitude = <?php echo $data['accomadation']->latitude; ?>;
            const longitude = <?php echo $data['accomadation']->longitude; ?>;
            const location = { lat: latitude, lng: longitude };

            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: location
            });

            const marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
 
        function goBack() {
            window.history.back();
        }

        function setMinDates() {
            const today = new Date().toISOString().split('T')[0];
            const tomorrow = new Date(Date.now() + 86400000).toISOString().split('T')[0]; // 86400000 ms = 1 day

            const checkInInput = document.querySelector('input[name="check-in-date"]');
            const checkOutInput = document.querySelector('input[name="check-out-date"]');

            checkInInput.setAttribute('min', today);
            checkOutInput.setAttribute('min', tomorrow);

            checkInInput.addEventListener('change', function() {
                const checkInDate = new Date(this.value);
                const minCheckOutDate = new Date(checkInDate.getTime() + 86400000).toISOString().split('T')[0];
                checkOutInput.setAttribute('min', minCheckOutDate);
            });
        }

        document.addEventListener('DOMContentLoaded', setMinDates);
   
    </script>
    <style>
        body {
            background-color: #f5f5f5;
            color: #262626;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .hotel-title {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .rating-stars {
            color: #febb02;
            font-size: 18px;
        }

        .hotel-name {
            font-size: 24px;
            font-weight: 700;
            color: #262626;
        }

        .airport-shuttle {
            color: #6b6b6b;
            font-size: 14px;
            margin-left: 8px;
        }

        .location {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            color: #6b6b6b;
            font-size: 14px;
        }

        .location a {
            color: #0071c2;
            text-decoration: none;
            font-weight: 500;
        }

        .location-divider {
            margin: 0 4px;
            color: #6b6b6b;
        }

        .gallery {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 8px;
            margin-bottom: 24px;
        }

        .gallery img {
            border-radius: 4px;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .gallery img:hover {
            opacity: 0.9;
        }

        .main-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .thumbnail-grid {
            display: grid;
            grid-template-rows: 1fr 1fr;
            gap: 8px;
        }

        .thumbnail {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .property-highlights, .popular-facilities, .availability, .reviews, .guest-reviews {
            background: white;
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .highlights-title, .availability h2, .reviews h3, .guest-reviews h2 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .highlights-grid, .facility-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 10px;
        }
        .facility-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 10px;
}

.facility-item {
    display: flex;
    align-items: center;
}

.facility-icon {
    margin-right: 10px;
}

.facility-item p {
    margin: 0;
}

        .highlight-item, .facility-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .highlight-icon, .facility-icon {
            width: 24px;
            height: 24px;
            color: #6b6b6b;
        }

        .highlight-content h3, .facility-item h3 {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .highlight-content p, .facility-item p {
            font-size: 14px;
            color: #6b6b6b;
        }

        .availability-header {
            margin-bottom: 20px;
        }

        .search-container {
            border: 1px solid #e7e7e7;
            border-radius: 4px;
            margin-bottom: 24px;
        }

        .search-inputs {
            display: flex;
            border-bottom: 1px solid #e7e7e7;
        }

        .search-field {
            flex: 1;
            padding: 12px;
            border: none;
            border-right: 1px solid #e7e7e7;
            font-size: 14px;
            color: #262626;
        }

        .search-field:last-child {
            border-right: none;
        }

        .search-button {
            width: 100%;
            padding: 12px;
            background: #0071c2;
            color: white;
            border: none;
            font-weight: 500;
            cursor: pointer;
        }

        .room-list {
            margin-top: 20px;
        }

        .room-item {
            border-bottom: 1px solid #e7e7e7;
            padding: 20px 0;
        }

        .room-item:last-child {
            border-bottom: none;
        }

        .room-title {
            color: #0071c2;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 8px;
            display: inline-block;
        }

        .room-details {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-top: 8px;
            color: #6b6b6b;
        }

        .bed-icon {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        .occupancy-info {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 20px;
            margin-top: 12px;
        }

        .person-count {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .person-icon {
            width: 20px;
            height: 20px;
        }

        .price-button {
            padding: 8px 16px;
            background: #0071c2;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
        }

        .offer-badge {
            display: inline-block;
            background: #ebf3ff;
            color: #0071c2;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 14px;
            margin-top: 8px;
        }

        .special-offer {
            background: #ebf3ff;
            border-radius: 4px;
            padding: 8px;
            margin-top: 8px;
            font-size: 14px;
            color: #0071c2;
        }

        .info-icon {
            margin-left: 4px;
            cursor: help;
        }

        .review-score {
            background: #0071c2;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 700;
            font-size: 20px;
        }

        .review-content{
            display: grid;
            grid-template-columns:  repeat(auto-fill, minmax(240px, 1fr));

        }

        .review-text {
            font-size: 14px;
            color: #6b6b6b;
        }

        .map-container {
            margin-top: 24px;
            border-radius: 8px;
            overflow: hidden;
            height: 300px;
            background: #eee;
        }

        .map-placeholder {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .guest-comment {
            font-style: italic;
            color: #6b6b6b;
            margin-top: 8px;
        }

        .guest-info {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 12px;
        }

        .guest-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        .guest-country {
            display: flex;
            align-items: center;
            gap: 4px;
            color: #6b6b6b;
            font-size: 14px;
        }

        .availability-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .availability-table th,
        .availability-table td {
            border: 1px solid #e7e7e7;
            padding: 12px;
            text-align: left;
        }

        .availability-table th {
            background-color: #ebf3ff;
            color: #0071c2;
            font-weight: 700;
        }

        .availability-table td {
            background-color: white;
            color: #262626;
        }

        .availability-table .book-button {
            padding: 8px 16px;
            background: #0071c2;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
        }

        .order-summary {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #dee2e6;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 1rem 0;
            font-weight: bold;
        }

        .pay-button {
            width: 100%;
            background: #0071c2;
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            margin-top: 1rem;
        }

        .fixed-button {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #0071c2;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <div class="container">

        <!-- Header -->
        <div class="header">
            <div class="hotel-title">
                <div class="rating-stars">★★★★★</div><br>
                <h1 class="hotel-name"><?php echo $data['accomadation']->property_name; ?>
                    <span class="airport-shuttle"><?php echo $data['accomadation']->property_type; ?></span>
                </h1>
            </div>
        </div>

        <!-- Location -->
        <div class="location">
            <i class="fas fa-map-marker-alt"></i>
            <?php echo $data['accomadation']->property_name; ?>
            <a href="#">Great location - show map</a>
            <span class="location-divider">–</span>
           
        </div>

        <!-- Gallery -->
        <div class="gallery">
            <img src="https://storage.googleapis.com/a1aa/image/BGUTWdrCTfTKF6woZn3veW1MCHXtEe69wofWZ0xg6tqceFFgC.jpg" alt="Hotel exterior with a grand entrance and lush greenery" class="main-image">
            <div class="thumbnail-grid">
                <img src="https://storage.googleapis.com/a1aa/image/PhJfiTVqnNRNEqHAlM8TFtyFQFzQzSX4Ve2GRv1JsC6pvoAUA.jpg" alt="Luxurious hotel interior with elegant decor" class="thumbnail">
                <img src="https://storage.googleapis.com/a1aa/image/rCmxzow1OcJbHxjc7oEks0pTbJOjXLfghNuyI86oYgCyXUAKA.jpg" alt="Hotel pool area with sun loungers and umbrellas" class="thumbnail">
            </div>
        </div>

        <!-- Property Highlights -->
        <div class="property-highlights">
            <h2 class="highlights-title">Property Overview</h2>
            <p>Welcome to <?php echo $data['accomadation']->property_name; ?>, a stunning <?php echo $data['accomadation']->property_type; ?> nestled in the heart of <?php echo $data['accomadation']->city; ?>, at <?php echo $data['accomadation']->address; ?>, <?php echo $data['accomadation']->postal_code; ?>. This delightful property offers the perfect retreat, whether you're traveling solo, as a couple, with family, or with friends. Boasting spacious accommodations, including <?php echo $data['accomadation']->single_bedrooms; ?> single bedrooms, <?php echo $data['accomadation']->double_bedrooms; ?> double bedrooms, <?php echo $data['accomadation']->living_rooms; ?> living rooms, and <?php echo $data['accomadation']->family_rooms; ?> family rooms, there's plenty of room for everyone. With a total of <?php echo $data['accomadation']->bathrooms; ?> bathrooms and a maximum capacity of <?php echo $data['accomadation']->max_occupants; ?> occupants, comfort is guaranteed.

            Enjoy a range of modern amenities designed for your convenience and relaxation, including air conditioning, heating, free Wi-Fi, and a fully equipped kitchen or kitchenette for home-cooked meals. Dive into ultimate leisure with features like a swimming pool, hot tub, sauna, or unwind on your private balcony or terrace with breathtaking garden views. The property spans a generous <?php echo $data['accomadation']->apartment_size; ?> sqm, ensuring ample space to make yourself at home.

            Perfect for families and groups, <?php echo $data['accomadation']->property_name; ?> welcomes children and offers thoughtful touches like EV charging, a washing machine, and a flat-screen TV for entertainment. For those who crave a little indulgence, a minibar and luxurious views await, ensuring a stay tailored to your needs.

            Convenient check-in is available between <?php echo $data['accomadation']->check_in_from; ?> and <?php echo $data['accomadation']->check_in_until; ?>, with check-out between <?php echo $data['accomadation']->check_out_from; ?> and <?php echo $data['accomadation']->check_out_until; ?>. Starting at just <?php echo $data['accomadation']->price; ?> per night, <?php echo $data['accomadation']->property_name; ?> is the perfect choice for your next getaway. Book now and experience the unparalleled charm of this exceptional property!</p>
        </div>

        <!-- Popular Facilities -->
        <div class="popular-facilities">
            <h2 class="highlights-title">Most popular facilities</h2>
            <div class="facility-grid">
    <?php if ($data['accomadation']->free_wifi == 1): ?>
        <div class="facility-item">
            <i class="fas fa-wifi facility-icon"></i>
            <p>Free Wifi</p>
        </div>
    <?php endif; ?>
    <?php if ($data['accomadation']->air_conditioning == 1): ?>
        <div class="facility-item">
            <i class="fas fa-wind facility-icon"></i>
            <p>Air Conditioning</p>
        </div>
    <?php endif; ?>
    <?php if ($data['accomadation']->ev_charging == 1): ?>
        <div class="facility-item">
            <i class="fas fa-charging-station facility-icon"></i>
            <p>EV Charging</p>
        </div>
    <?php endif; ?>
    <?php if ($data['accomadation']->kitchen == 1): ?>
        <div class="facility-item">
            <i class="fas fa-utensils facility-icon"></i>
            <p>Kitchen</p>
        </div>
    <?php endif; ?>
    <?php if ($data['accomadation']->kitchenette == 1): ?>
        <div class="facility-item">
            <i class="fas fa-blender facility-icon"></i>
            <p>Kitchenette</p>
        </div>
    <?php endif; ?>
    <?php if ($data['accomadation']->washing_machine == 1): ?>
        <div class="facility-item">
            <i class="fas fa-washer facility-icon"></i>
            <p>Washing Machine</p>
        </div>
    <?php endif; ?>
    <?php if ($data['accomadation']->flat_screen_tv == 1): ?>
        <div class="facility-item">
            <i class="fas fa-tv facility-icon"></i>
            <p>TV</p>
        </div>
    <?php endif; ?>
    <?php if ($data['accomadation']->swimming_pool == 1): ?>
        <div class="facility-item">
            <i class="fas fa-swimming-pool facility-icon"></i>
            <p>Swimming Pool</p>
        </div>
    <?php endif; ?>
    <?php if ($data['accomadation']->heating == 1): ?>
        <div class="facility-item">
            <i class="fas fa-fire facility-icon"></i>
            <p>Heating</p>
        </div>
    <?php endif; ?>
    <?php if ($data['accomadation']->hot_tub == 1): ?>
        <div class="facility-item">
            <i class="fas fa-hot-tub facility-icon"></i>
            <p>Hot Tub</p>
        </div>
    <?php endif; ?>
    <?php if ($data['accomadation']->minibar == 1): ?>
        <div class="facility-item">
            <i class="fas fa-cocktail facility-icon"></i>
            <p>Minibar</p>
        </div>
    <?php endif; ?>
    <?php if ($data['accomadation']->sauna == 1): ?>
        <div class="facility-item">
            <i class="fas fa-hot-tub facility-icon"></i>
            <p>Sauna</p>
        </div>
    <?php endif; ?>
</div>
        </div>

        <!-- Availability Section -->
        <div class="availability">
            <div class="availability-header">
                <h2>Availability</h2>
                
            </div>

          
            <div class="overflow-x-auto">
                <table class="availability-table">
                    <thead>
                        <tr>
                            <th>Room type</th>
                            <th>Price per room</th>
                            <th>Available Rooms</th>
                            <th>Number of Rooms</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Single Room (1 person)</td>
                            <td>LKR.<?php echo $data['accomadation']->singleprice; ?></td>
                            <td><?php echo $data['accomadation']->available_rooms['single']; ?></td>
                            <td><input type="number" min="0" max="<?php echo $data['accomadation']->available_rooms['single']; ?>" id="singleRoomInput" name="singleamount" value="0" readonly></td>
                            <td>
                                <button type="button" class="book-button" onclick="addRoom('single', <?php echo $data['accomadation']->singleprice; ?>, <?php echo $data['accomadation']->available_rooms['single']; ?>)">Add</button>
                                <button type="button" class="book-button" onclick="removeRoom('single', <?php echo $data['accomadation']->singleprice; ?>)">Remove</button>
                        
                        </td>
                        </tr>
                        <tr>
    <td>Double Room (2 persons)</td>
    <td>LKR.<?php echo $data['accomadation']->doubleprice; ?></td>
    <td><?php echo $data['accomadation']->available_rooms['double']; ?></td>
    <td><input type="number" min="0" max="<?php echo $data['accomadation']->available_rooms['double']; ?>" id="doubleRoomInput" name="doubleamount" value="0" readonly></td>
    <td>
        <button type="button" class="book-button" onclick="addRoom('double', <?php echo $data['accomadation']->doubleprice; ?>, <?php echo $data['accomadation']->available_rooms['double']; ?>)">Add</button>
        <button type="button" class="book-button" onclick="removeRoom('double', <?php echo $data['accomadation']->doubleprice; ?>)">Remove</button>
    </td>
</tr>
<tr>
    <td>Family Room (4 persons)</td>
    <td>LKR.<?php echo $data['accomadation']->familyprice; ?></td>
    <td><?php echo $data['accomadation']->available_rooms['family']; ?></td>
    <td><input type="number" min="0" max="<?php echo $data['accomadation']->available_rooms['family']; ?>" id="familyRoomInput" name="family_rooms" value="0" readonly></td>
    <td>
        <button type="button" class="book-button" onclick="addRoom('family', <?php echo $data['accomadation']->familyprice; ?>, <?php echo $data['accomadation']->available_rooms['family']; ?>)">Add</button>
        <button type="button" class="book-button" onclick="removeRoom('family', <?php echo $data['accomadation']->familyprice; ?>)">Remove</button>
    </td>
</tr>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="reviews">
        <h3>Property Policies</h3>
            <div class="review-content">
                
                <p class="review-text">Children : <?php echo $accomadation->children_allowed; ?> </p>
                <p class="review-text">Parties : <?php echo $accomadation->parties_allowed; ?> </p>
                <p class="review-text">Smoking :<?php echo $accomadation->smoking_allowed; ?> </p>
                <p class="review-text">Pets :<?php echo $accomadation->pets_allowed; ?> </p>

            </div>
            <h3>Order Summary</h3>
            <form action="<?php echo URLROOT; ?>/payment/payment_accomodation" method="POST">
            <div class="order-summary">
                    
                    <div class="summary-row">
                        <span>Room charges</span>
                        <span id="roomCharges">LKR 0</span>
                    </div>
                    <div class="summary-row">
                        <span>Total Number of Rooms</span>
                        <span id="totalRooms">0</span>
                        <input type="hidden" id="totalrooms" name="totalrooms" value="0">

                    </div>
                    <div class="total-row">
                        <span>Total Amount</span>
                        <span id="totalAmount" style="color: #0071c2;">LKR.0</span>
                        <input type="hidden" id="totalamount" name="totalamount" value="0">

                    </div>
                    <!-- <div class="total-row">
                        <span>Amount Should Pay Now (50%)</span>
                        <span id="pay" style="color: #0071c2;">LKR.0</span>
                        <input type="hidden" id="totalpaid" name="totalpaid" value="">

                    </div> -->

                    <input type="hidden" name="property_id" value="<?php echo $data['accomadation']->property_id; ?>">
                    <input type="hidden" name="service_provider_id" value="<?php echo $data['accomadation']->service_provider_id; ?>">
                    <input type="hidden" name="property_name" value="<?php echo $data['accomadation']->property_name; ?>">
                    <input type="hidden" name="check_in" value="<?php echo $data['check_in']; ?>">
                    <input type="hidden" name="check_out" value="<?php echo $data['check_out']; ?>">
                    <input type="hidden" name="single_rooms" id="single_rooms" value="0">
                    <input type="hidden" name="double_rooms" id="double_rooms" value="0">
                    <input type="hidden" name="family_rooms" id="family_rooms" value="0">
        

                    <button type="submit" class="pay-button">Pay & Book Now</button>
                    </form>
                </div>
           
        </div>

        <!-- Guest Reviews -->
        <div class="guest-reviews">
            <div class="review-header">
                <h2>Guest reviews</h2>
                <div class="review-score">8.3</div>
            </div>
            <div class="guest-comment">
                "Great location! Hotel with big, clean and comfortable rooms. Pool with nice view"
            </div>
            <div class="guest-info">
                <img src="https://storage.googleapis.com/a1aa/image/RKqSWqHEctrZE50PA46uyJilRmemhPRMeVNYWhISKMxrvoAUA.jpg" alt="Guest avatar" class="guest-avatar">
                <div class="guest-country">
                    
                   Sri Lanka
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-container" id="map" style="height: 400px; width: 100%;" >
            
        </div>
    </div>

   

    <!-- Fixed Back to Search Button -->
    <button class="fixed-button" onclick="goBack()">Back to search</button></a>

    <script>
        let totalAmount = 0;
        let totalRooms = 0;

        function addRoom(type, price, max) {
    let inputId = type + 'RoomInput';
    let roomInput = document.getElementById(inputId);
    let numberOfRooms = parseInt(roomInput.value);
    
    // Check if numberOfRooms is valid and less than maximum
    if (!isNaN(numberOfRooms) && numberOfRooms >= 0 && numberOfRooms < max) {
        numberOfRooms++;
        roomInput.value = numberOfRooms;
        totalAmount += price;
        totalRooms++;
        
        // Update display values
        document.getElementById('totalAmount').innerText = 'LKR ' + totalAmount;
        document.getElementById('totalamount').value = totalAmount;
        document.getElementById('totalRooms').innerText = totalRooms;
        document.getElementById('totalrooms').value = totalRooms;
        document.getElementById('roomCharges').innerHTML = 'LKR ' + totalAmount;
        
        // Update hidden fields for room counts
        document.getElementById(type + '_rooms').value = numberOfRooms;
    } else {
        alert('No more rooms of this type available.');
    }
}

function removeRoom(type, price) {
    let inputId = type + 'RoomInput';
    let roomInput = document.getElementById(inputId);
    let numberOfRooms = parseInt(roomInput.value);
    
    if (!isNaN(numberOfRooms) && numberOfRooms > 0) {
        numberOfRooms--;
        roomInput.value = numberOfRooms;
        totalAmount -= price;
        totalRooms--;
        
        // Update display values
        document.getElementById('totalAmount').innerText = 'LKR ' + totalAmount;
        document.getElementById('totalamount').value = totalAmount;
        document.getElementById('totalRooms').innerText = totalRooms;
        document.getElementById('totalrooms').value = totalRooms;
        document.getElementById('roomCharges').innerHTML = 'LKR ' + totalAmount;
        
        // Update hidden fields for room counts
        document.getElementById(type + '_rooms').value = numberOfRooms;
    }
}
    </script>

    <!-- <script>
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', () => {
                console.log(`Clicked: ${button.textContent}`);
            });
        });

        document.querySelectorAll('.search-input').forEach(input => {
            input.addEventListener('click', () => {
                console.log(`Clicked: ${input.placeholder}`);
            });
        });

        document.querySelectorAll('.gallery img').forEach(img => {
            img.addEventListener('click', () => {
                console.log('Opening gallery view');
            });
        });

        document.querySelectorAll('.info-icon').forEach(icon => {
            icon.addEventListener('mouseover', () => {
                console.log('Showing tooltip');
            });
        });

        document.querySelectorAll('.search-field').forEach(input => {
            input.addEventListener('click', (e) => {
                const type = e.target.placeholder.includes('date') ? 'date picker' : 'guest selector';
                console.log(`Opening ${type}`);
            });
        });

        document.querySelectorAll('.price-button').forEach(button => {
            button.addEventListener('click', () => {
                console.log('Showing room prices');
            });
        });
    </script> -->
</body>
</html>