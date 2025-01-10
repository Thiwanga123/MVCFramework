<html>
<head>
    <title>Basic Information</title>

    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/accomodation/basic.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap" async defer></script>
</head>
<body>
    <?php require APPROOT . '/views/inc/components/startheader.php'; ?>
    <div class="container">
        <h1>Basic Information</h1>
        <form>
            <div class="form-group">
                <label for="property-name">Property Name</label>
                <input type="text" id="property-name" name="property-name" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="postal-code">Postal Code</label>
                <input type="text" id="postal-code" name="postal-code" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" onchange="geocodeCity()"  required>
            </div>
            <!-- <div class="form-group">
                <label for="price">Price (LKR)</label>
                <input type="text" id="Price" name="Price" required>
            </div> -->
            <div class="form-group">
                <label for="location">Pin the Location of the Property</label>
                <div id="map" class="map-container" style="height: 500px; width: 100%;"></div>
            </div>
            <div class="form-group">
           <button type="button" onclick="basicinfo()"> Next</button></a>
            </div>
        </form>
    </div>


    <script>
    
    let map;
        let marker;
        let geocoder;

        function initMap() {
            const initialLocation = { lat: 7.8731, lng: 80.7718 };
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: initialLocation
            });

            geocoder = new google.maps.Geocoder();

            marker = new google.maps.Marker({
                map: map,
            });

            map.addListener('click', function(event) {
                placeMarker(event.latLng);
                localStorage.setItem('latitude', event.latLng.lat());
                localStorage.setItem('longitude', event.latLng.lng());

                alert("Location fetched successfully!");
            });
        }

        function placeMarker(location) {
            marker.setPosition(location);
            map.setCenter(location);
        }

        function geocodeCity() {
    const city = document.getElementById('city').value;
    if (!city.trim()) {
        alert("Please enter a city.");
        return;
    }

    geocoder.geocode({ address: city }, function (results, status) {
        if (status === 'OK') {
            const location = results[0].geometry.location;
            const viewport = results[0].geometry.viewport;

            // Adjust map bounds to fit the city's viewport
            map.fitBounds(viewport);

            // Place a marker at the center of the city
            placeMarker(location);

            // Save latitude and longitude to localStorage
            localStorage.setItem('latitude', location.lat());
            localStorage.setItem('longitude', location.lng());

          
        } else {
            alert('Could not find the city for the following reason: ' + status);
        }
    });

}


    function basicinfo(){
        const propertyname=document.getElementById('property-name').value;
        const address=document.getElementById('address').value;
        const postalcode=document.getElementById('postal-code').value;
        const city=document.getElementById('city').value;
        // const Price=document.getElementById('Price').value;
        // const location=document.getElementById('location').value;
        const startpageData=JSON.parse(localStorage.getItem("startpageData"));
        const basicinfoData={...startpageData,propertyname,address,postalcode,city,latitude:localStorage.getItem('latitude'),longitude:localStorage.getItem('longitude')};
        localStorage.setItem("basicinfoData",JSON.stringify(basicinfoData));
        window.location.href="<?php echo URLROOT;?>/accomadation/propertyinfo";

    }



console.log("Stored data:", JSON.parse(localStorage.getItem("basicinfoData")));
</script>



</body>
</html>