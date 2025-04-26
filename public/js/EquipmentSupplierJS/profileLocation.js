let map, marker;

function initMap() {
    const initialPosition = { lat: 6.9271, lng: 79.8612 }; 

    map = new google.maps.Map(document.getElementById("map"), {
        center: initialPosition,
        zoom: 8,
    });

    map.addListener("click", function (e) {
        const lat = e.latLng.lat();
        const lng = e.latLng.lng();

        if (marker) marker.setMap(null); // Remove previous

        marker = new google.maps.Marker({
            position: { lat, lng },
            map: map,
        });

        // Set values in hidden fields
        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value = lng;

        if (lat && lng) {
            document.getElementById("errorMessageContainer").style.display = "none"; 
        }
    });

    
}

document.getElementById("openMapBtn").addEventListener("click", function () {
    document.getElementById("mapModal").style.display = "block";
    setTimeout(() => {
        google.maps.event.trigger(map, "resize");
        map.setCenter(marker?.getPosition() || { lat: 6.9271, lng: 79.8612 });
    }, 300);
});

function closeMap() {
    document.getElementById("mapModal").style.display = "none";
}