let isMapView = true;
let mapMarkers = [];    

document.addEventListener('DOMContentLoaded', function () {
    const script = document.createElement('script');
    script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&libraries=places`;
    script.async = true;
    script.defer = true;

    script.onload = function () {
        initMap();
    };

    let map;  // Global map variable
    let marker = null;  // Global marker variable

    function initMap() {
        const data = JSON.parse(localStorage.getItem('data'));

        if (data && data.location) {
            // Create map first with a default location
            map = new google.maps.Map(document.getElementById('mapdiv'), {
                center: { lat: 0, lng: 0 },
                zoom: 14
            });
            
            // Now create the PlacesService with the map DOM element
            const service = new google.maps.places.PlacesService(map);
    
            const request = {
                query: data.location,
                fields: ['geometry'],
            };
    
            service.findPlaceFromQuery(request, (results, status) => {
                if (status === google.maps.places.PlacesServiceStatus.OK && results[0]) {
                    const loc = results[0].geometry?.location;
    
                    // Update map center with the found location
                    map.setCenter(loc);
    
                    isMapView = true;
                    updateButtonText();
                    fetchNearbyPlaces(data.location, map); // Pass the map instance
                } else {
                    console.error('Failed to initialize map location:', status);
                }
            });
        }
    }

    function fetchNearbyPlaces(locationQuery, mapInstance) {
        // Use the map instance for PlacesService
        const service = new google.maps.places.PlacesService(mapInstance);

        const request = {
            query: locationQuery,
            fields: ['name', 'geometry'],
        };

        service.findPlaceFromQuery(request, (results, status) => {
            if (status !== google.maps.places.PlacesServiceStatus.OK || !results?.length) {
                console.error('Place search failed or returned no results:', status, results);
                alert('Place search failed. Please try again later.');
                return;
            }

            const firstResult = results[0];
            const loc = firstResult.geometry?.location;

            console.log('First result:', firstResult);
            console.log('Location:', loc);

            if (!loc) {
                console.error('No geometry.location found in first result:', firstResult);
                alert('No valid location data found.');
                return;
            }

            // Clear any existing markers
            clearMapMarkers();

            // Create a nearbySearch request
            const nearbyRequest = {
                location: loc,
                radius: 10000, // Search within a 10 km radius
                type: 'tourist_attraction',
            };

            // Use the map instance for the nearby search
            service.nearbySearch(nearbyRequest, (nearbyResults, nearbyStatus) => {
                if (nearbyStatus !== google.maps.places.PlacesServiceStatus.OK || !nearbyResults?.length) {
                    console.error('Nearby search failed:', nearbyStatus, nearbyResults);
                    alert('Nearby search failed. Please try again later.');
                    return;
                }

                if (!nearbyResults || nearbyResults.length === 0) {
                    console.error('No nearby places found.');
                    alert('No nearby places found.');
                    return;
                }

                console.log('Nearby places:', nearbyResults);

                const placesList = document.querySelector('.places-container');
                placesList.innerHTML = '';

                nearbyResults.sort((a, b) => (b.user_ratings_total || 0) - (a.user_ratings_total || 0));

                nearbyResults.slice(0, 8).forEach((place, index) => {
                    const placeItem = document.createElement('div');
                    placeItem.className = 'card';

                    const numberBadge = document.createElement('span');
                    numberBadge.className = 'place-number';
                    numberBadge.textContent = index + 1;

                    const placeImage = document.createElement('img');
                    const photoUrl = place.photos?.[0]?.getUrl({ maxWidth: 300 }) ?? 'https://via.placeholder.com/150';
                    
                    // Log the image URL to check if it's valid
                    console.log('Image URL for', place.name, ':', photoUrl);
                    placeImage.src = photoUrl;
                    placeImage.alt = place.name || 'No name';

                    const placeName = document.createElement('h3');
                    placeName.textContent = place.name;

                    const placeAddress = document.createElement('p');
                    placeAddress.textContent = `Location: ${place.vicinity || 'Unknown'}`;

                    const placeReviews = document.createElement('p');
                    placeReviews.textContent = `Reviews: ${place.user_ratings_total ?? 'N/A'}`;

                    placeItem.append(numberBadge, placeImage, placeName, placeAddress, placeReviews);
                    placesList.appendChild(placeItem);
                        
                    const marker = new google.maps.Marker({
                        position: place.geometry.location,
                        map: mapInstance,
                        label: {
                            text : `${index + 1}`,
                            color : '#ffffff',
                            fontweight: 'bold',
                        },
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            scale: 10,
                            fillColor: 'navy',
                            fillOpacity: 1,
                            strokeWeight: 2,
                            strokeColor: '#ffffff',
                        },
                        title: place.name,
                        zIndex: 1
                    });
                    mapMarkers.push(marker);

                    placeItem.addEventListener('click', function () {
                        mapInstance.setCenter(place.geometry.location);
                        mapInstance.setZoom(14);
                    });

                    marker.addListener('mouseover', function () {
                        this.setZIndex(google.maps.Marker.MAX_ZINDEX + 1); // bring to front
                    });
                    
                    marker.addListener('mouseout', function () {
                        this.setZIndex(1); // reset to default
                    });
                });
            });
        });
    }

    // Function to clear existing markers
    function clearMapMarkers() {
        for (let i = 0; i < mapMarkers.length; i++) {
            mapMarkers[i].setMap(null);
        }
        mapMarkers = [];
    }

    document.head.appendChild(script);
});

function toggleView() {
    if (isMapView) {
        showWeather();
    } else {
        showMap();
    }
}

function showWeather() {
    document.getElementById('mapdiv').style.display = 'none';
    document.getElementById('weatherDiv').style.display = 'flex';
    isMapView = false;
    updateButtonText();
    loadWeather();
}

function showMap() {
    document.getElementById('weatherDiv').style.display = 'none';
    document.getElementById('mapdiv').style.display = 'block';
    isMapView = true;
    updateButtonText();
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

function loadWeather() {
    const data = JSON.parse(localStorage.getItem('data'));
    if (data && data.location) {
        const weatherURL = `http://api.weatherapi.com/v1/current.json?key=${weatherAPIKey}&q=${encodeURIComponent(data.location)}`;

        fetch(weatherURL)
            .then(response => response.json())
            .then(weatherData => {
                console.log('Weather Data:', weatherData);
                if (weatherData && weatherData.location) {
                    document.querySelector('.location').textContent = `${weatherData.location.name}, ${weatherData.location.country}`;
                    document.querySelector('.temperature').textContent = `${weatherData.current.temp_c}°C`;
                    document.querySelector('.weather-condition').textContent = weatherData.current.condition.text;
                    document.querySelector('.humidity .detail-value').textContent = `${weatherData.current.humidity}%`;
                    document.querySelector('.wind-speed .detail-value').textContent = `${weatherData.current.wind_kph} kph`;
                    document.querySelector('.pressure .detail-value').textContent = `${weatherData.current.pressure_mb} hPa`;
                    document.querySelector('.uv-index .detail-value').textContent = `${weatherData.current.uv}`;
                } else {
                    console.error('Location data is missing from the API response.');
                }
            })
            .catch(error => {
                console.error('Error fetching weather data:', error);
            });
    }
}
