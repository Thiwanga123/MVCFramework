function toggleMap(selectElement) {
    const mapSection = document.getElementById('map_section');
    if (selectElement.value === 'Other') {
        mapSection.style.display = 'block';
        initMap(); // initialize map
    } else {
        mapSection.style.display = 'none';
        document.getElementById('custom_location').value = '';
    }
}

function initMap() {
    const defaultLatLng = { lat: 6.9271, lng: 79.8612 }; // e.g., Colombo
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: defaultLatLng,
    });

    const marker = new google.maps.Marker({
        position: defaultLatLng,
        map: map,
        draggable: true
    });

    document.getElementById('custom_location').value = `${defaultLatLng.lat}, ${defaultLatLng.lng}`;

    marker.addListener('dragend', function (event) {
        const lat = event.latLng.lat();
        const lng = event.latLng.lng();
        document.getElementById('custom_location').value = `${lat}, ${lng}`;
    });

    map.addListener("click", (e) => {
        const lat = e.latLng.lat();
        const lng = e.latLng.lng();
        marker.setPosition(e.latLng);
        document.getElementById('custom_location').value = `${lat}, ${lng}`;
    });
}
