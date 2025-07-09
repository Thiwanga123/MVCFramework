function initAutocomplete() {
    const input = document.getElementById('location');
    const latInput = document.getElementById('lat');
    const lngInput = document.getElementById('lng');

    const options = {
        types: ['(cities)'],
        componentRestrictions: { country: "lk" }
    };

    const autocomplete = new google.maps.places.Autocomplete(input, options);

    autocomplete.addListener('place_changed', () => {
        const place = autocomplete.getPlace();

        if (place.geometry) {
            const lat = place.geometry.location.lat();
            const lng = place.geometry.location.lng();

            latInput.value = lat;
            lngInput.value = lng;
        } else {
            latInput.value = '';
            lngInput.value = '';
        }
    });
}