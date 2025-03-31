<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/home.css">
    <title>Bar</title>

    <!-- jQuery & jQuery UI for Date Picker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!-- Google Maps API (Replace YOUR_API_KEY with actual key) -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWPZDukN31Cm_aSc5ZBkEw65wzpaA27cE&libraries=places&callback=initMap" async defer></script>

    <style>
        #map {
            height: 300px;
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="bar">
    <ul class="bar-in">
        <!-- Location (Google Map) -->
        <li>
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#1d5a62">
                <path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/>
            </svg>
            <div class="group">
                <p>Select Your Pick up Location</p>
                <input id="location-input" type="text" placeholder="Search location">
                <div id="map"></div>
                <p id="selected-location"></p>
            </div>
        </li>

        <!-- Start Date -->
        <li>
            <p>Start Date</p>
            <input type="text" id="start-date" placeholder="Select Start Date">
        </li>

        <!-- End Date + Total Cost -->
        <li>
            <p>End Date</p>
            <input type="text" id="end-date" placeholder="Select End Date">
            <span id="total-cost" style="font-weight: bold; color: #1d5a62; margin-left: 10px;">Total Cost: $0</span>
        </li>

        <!-- Confirm Booking Button -->
       <!-- Confirm Booking Button -->
<li>
    <button class="book-confirm" onclick="redirectToPayment()">Confirm Booking</button>
</li>

    </ul>
</div>

<!-- JavaScript for Google Map & Date Picker -->
<script>
   function initMap() {
    var defaultLocation = { lat: 7.8731, lng: 80.7718 }; // Sri Lanka's center
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 8,
        center: defaultLocation,
    });

    var input = document.getElementById("location-input");
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo("bounds", map);

    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29),
        draggable: true, // Allow marker dragging
        visible: false,  // Initially hide the marker until a location is selected
    });

    autocomplete.addListener("place_changed", function () {
        var place = autocomplete.getPlace();
        if (!place.geometry) return;

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(15);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        // Update the selected location
        updateSelectedLocation(place.geometry.location.lat(), place.geometry.location.lng(), place.formatted_address);
    });

    // Allow users to click anywhere on the map to select a location
    map.addListener("click", function (event) {
        marker.setPosition(event.latLng);
        marker.setVisible(true);

        // Reverse Geocode to get the address
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ location: event.latLng }, function (results, status) {
            if (status === "OK" && results[0]) {
                document.getElementById("location-input").value = results[0].formatted_address;
                updateSelectedLocation(event.latLng.lat(), event.latLng.lng(), results[0].formatted_address);
            } else {
                document.getElementById("location-input").value = "Unknown location";
                updateSelectedLocation(event.latLng.lat(), event.latLng.lng(), "Unknown location");
            }
        });
    });

    // Update the displayed location (address, lat, lng)
    function updateSelectedLocation(lat, lng, address) {
        document.getElementById("selected-location").innerText = `Selected: ${address} (Lat: ${lat}, Lng: ${lng})`;
    }


}
 

    $(function () {
        const costPerDay = 50;

        $("#start-date").datepicker({
            dateFormat: "yy-mm-dd",
            onSelect: function (selectedDate) {
                $("#end-date").datepicker("option", "minDate", selectedDate);
                calculateTotalCost();
            }
        });

        $("#end-date").datepicker({
            dateFormat: "yy-mm-dd",
            onSelect: function () {
                calculateTotalCost();
            }
        });

        function calculateTotalCost() {
            let startDate = $("#start-date").datepicker("getDate");
            let endDate = $("#end-date").datepicker("getDate");

            if (startDate && endDate) {
                let timeDiff = endDate - startDate;
                let daysDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
                
                if (daysDiff > 0) {
                    let totalCost = daysDiff * costPerDay;
                    $("#total-cost").text("Total: $" + totalCost);
                } else {
                    $("#total-cost").text("Total: $0");
                }
            } else {
                $("#total-cost").text("Total: $0");
            }
        }
    });

    
    
    function redirectToPayment() {
        // You can pass the necessary data, like the selected location and total cost, to the payment page via query parameters or session storage
        const selectedLocation = document.getElementById("selected-location").innerText;
        const totalCost = document.getElementById("total-cost").innerText;
        
        // Example: Redirect to payment page with query parameters
        window.location.href = `payments?location=${encodeURIComponent(selectedLocation)}&totalCost=${encodeURIComponent(totalCost)}`;
    }




</script>

</body>
</html>
