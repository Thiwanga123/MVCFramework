let map, marker;

function initMap() {
    const defaultLocation = { lat: 6.9271, lng: 79.8612 };

    map = new google.maps.Map(document.getElementById("googleMap"), {
        defaultLocation,
        zoom: 2
    });
}

function openPickupMap() {
    // Show the modal
    document.getElementById("pickupMapModal").style.display = "block";

    // Delay map initialization if needed
    setTimeout(() => {
        if (!map) {  // Check if the map is not already initialized
            initMap();  // Initialize the map if not done already
        }

        // Add a listener to the map for placing a marker
        map.addListener("click", function (event) {
            placeMarker(event.latLng);
        });
    }, 300);
}

function placeMarker(location) {
    if (marker) {
        marker.setPosition(location);  // Move the existing marker
    } else {
        marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }

    document.getElementById("pickup_lat").value = location.lat();
    document.getElementById("pickup_lng").value = location.lng();
    document.getElementById("pickupLocationDisplay").innerText =
        `Lat: ${location.lat().toFixed(4)}, Lng: ${location.lng().toFixed(4)}`;
}

function closePickupMap() {
    // Hide the modal
    document.getElementById("pickupMapModal").style.display = "none";
}

function confirmPickupLocation() {
    if (!document.getElementById("pickup_lat").value) {
        alert("Please select a location on the map.");
    } else {
        closePickupMap();
    }
}