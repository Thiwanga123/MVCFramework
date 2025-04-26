<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/ushan/userspage/content.css">
    <title>Places</title>
    <script>
        function initMap(){
            const data=JSON.parse(localStorage.getItem('data'));
            if(data && data.location){
                const mapFrame=document.getElementById('mapFrame');
                mapFrame.src = `https://www.google.com/maps/embed/v1/place?key=<?php echo API_KEY; ?>&q=${encodeURIComponent(data.location)}`;
                isMapView = true;
                updateButtonText();
                fetchNearbyPlaces(data.location);
            }
        }

        function showWeather() {
            const data = JSON.parse(localStorage.getItem('data'));
            if (data && data.location) {
                const mapFrame = document.getElementById('mapFrame');
                mapFrame.src ="<?php echo URLROOT;?>/users/weather";
                isMapView = false;
                updateButtonText();
              
            }
        }

        function toggleView() {
            if (isMapView) {
                showWeather();
            } else {
                initMap();
            }
        }

        function updateButtonText() {
            const toggleButton = document.getElementById('toggleButton');
            toggleButton.innerHTML = isMapView ? `
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                    <path d="M440-760v-160h80v160h-80Zm266 110-55-55 112-115 56 57-113 113Zm54 210v-80h160v80H760ZM440-40v-160h80v160h-80ZM254-652 140-763l57-56 113 113-56 54Zm508 512L651-255l54-54 114 110-57 59ZM40-440v-80h160v80H40Zm157 300-56-57 112-112 29 27 29 28-114 114Zm283-100q-100 0-170-70t-70-170q0-100 70-170t170-70q100 0 170 70t70 170q0 100-70 170t-170 70Zm0-80q66 0 113-47t47-113q0-66-47-113t-113-47q-66 0-113 47t-47 113q0 66 47 113t113 47Zm0-160Z"/>
                </svg>
                <h4>Check Weather</h4>
            ` : `
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                    <path d="M440-760v-160h80v160h-80Zm266 110-55-55 112-115 56 57-113 113Zm54 210v-80h160v80H760ZM440-40v-160h80v160h-80ZM254-652 140-763l57-56 113 113-56 54Zm508 512L651-255l54-54 114 110-57 59ZM40-440v-80h160v80H40Zm157 300-56-57 112-112 29 27 29 28-114 114Zm283-100q-100 0-170-70t-70-170q0-100 70-170t170-70q100 0 170 70t70 170q0 100-70 170t-170 70Zm0-80q66 0 113-47t47-113q0-66-47-113t-113-47q-66 0-113 47t-47 113q0 66 47 113t113 47Zm0-160Z"/>
                </svg>
                <h4>Show Map</h4>
            `;
        }

        function fetchNearbyPlaces(location) {
    const service = new google.maps.places.PlacesService(document.createElement('div'));
    const request = {
        query: location,
        fields: ['name', 'geometry'],
    };

    service.findPlaceFromQuery(request, function(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            const nearbyLocation = results[0].geometry.location;
            const nearbyRequest = {
                location: nearbyLocation,
                radius: '10000', // 10 km radius
                type: ['tourist_attraction']
            };

            service.nearbySearch(nearbyRequest, function(nearbyResults, nearbyStatus) {
                if (nearbyStatus === google.maps.places.PlacesServiceStatus.OK) {
                    console.log('Nearby results:', nearbyResults); // Debugging log
                    const placesList = document.querySelector('.bottom1');
                    placesList.innerHTML = ''; // Clear existing content

                    // Sort the results by the number of user reviews in descending order
                    nearbyResults.sort((a, b) => b.user_ratings_total - a.user_ratings_total);

                    // Limit to 6 places
                    nearbyResults.slice(0, 6).forEach(place => {
                        console.log('Place name:', place.name); // Print location names to console

                        const placeItem = document.createElement('div');
                        placeItem.className = 'card';

                        const placeImage = document.createElement('img');
                        placeImage.src = place.photos ? place.photos[0].getUrl() : 'https://via.placeholder.com/150';
                        placeImage.alt = place.name;

                        const placeName = document.createElement('h3');
                        placeName.textContent = place.name;

                        const placeAddress = document.createElement('p');
                        placeAddress.textContent = `Location: ${place.vicinity}`;

                        const placeReviews = document.createElement('p');
                        placeReviews.textContent = `Reviews: ${place.user_ratings_total}`;

                        placeItem.appendChild(placeImage);
                        placeItem.appendChild(placeName);
                        placeItem.appendChild(placeAddress);
                        placeItem.appendChild(placeReviews);

                        placesList.appendChild(placeItem);
                    });
                } else {
                    console.error('Nearby search failed:', nearbyStatus); // Debugging log
                }
            });
        } else {
            console.error('Place search failed:', status); // Debugging log
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const script = document.createElement('script');
    script.src = `https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&libraries=places&callback=initMap`;
    script.async = true;
    script.defer = true;
    document.head.appendChild(script);
});
    </script>

</head>
<body>











    <header>
        <div class="logo">
            <a href="<?php echo URLROOT;?>/pages/home">
            <img src="<?php echo URLROOT;?>/Images/Logo1.png">
                <p>JOURNEY<br><span>BEYOND</span></p>
            </a>
        </div>
        <div class="nav">
            <ul class="navbar">
                <li>Destinations</li>
                <li>Accomodations</li>
                <li>Transportation</li>
                <li>Guider</li>
                <li>Equipment Rentals</li>
                <li>Overview</li>
            </ul>
        </div>
    </header>

    <div class="content">
        <div class="left">
            <div id = mpdiv></div>
            <iframe id="mapFrame"  
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
        </div>

        <div class="right">

            <div class="bottom">

                <div class="weather-btn" id="weather-btn">
                    <button class="weather" id="toggleButton" onclick="toggleView()" >
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M440-760v-160h80v160h-80Zm266 110-55-55 112-115 56 57-113 113Zm54 210v-80h160v80H760ZM440-40v-160h80v160h-80ZM254-652 140-763l57-56 113 113-56 54Zm508 512L651-255l54-54 114 110-57 59ZM40-440v-80h160v80H40Zm157 300-56-57 112-112 29 27 29 28-114 114Zm283-100q-100 0-170-70t-70-170q0-100 70-170t170-70q100 0 170 70t70 170q0 100-70 170t-170 70Zm0-80q66 0 113-47t47-113q0-66-47-113t-113-47q-66 0-113 47t-47 113q0 66 47 113t113 47Zm0-160Z"/></svg>
                        <h4>Check Weather</h4>
                    </button>
                </div>
                
             
                    <h2>Near By Locations To visit</h2>
                    <div class="bottom1">
                
                    </div>
               

                <div class="foot">
                    <div class="group">
                        <a href="<?php echo URLROOT;?>/users/dashboard">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="m326.15-434.5 218.74 218.74L480-151.87 151.87-480 480-808.13l64.89 63.89L326.15-525.5h481.98v91H326.15Z"/></svg>
                            <p>Previous</p>
                        </a>
                    </div>
                    <div class="group">
                        <a href="<?php echo URLROOT;?>/trips/accomodations">
                            <p>Next</p>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="M633.85-434.5H151.87v-91h481.98L415.11-744.24 480-808.13 808.13-480 480-151.87l-64.89-63.89L633.85-434.5Z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>

    </div>

   
</body>
</html>