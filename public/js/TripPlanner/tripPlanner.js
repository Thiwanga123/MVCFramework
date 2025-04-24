let lat = null;
let lng = null;

function initMap() {
    const locationInput = document.getElementById('location');
    const options = {
        types: ['(cities)'],
        componentRestrictions: { country: "lk" }
    };

    const autocomplete = new google.maps.places.Autocomplete(locationInput, options);

    // Add listener to update lat and lng when a place is selected
    autocomplete.addListener('place_changed', function () {
        const place = autocomplete.getPlace();
        if (place.geometry) {
            // Only assign lat/lng if geometry is available
            lat = place.geometry.location.lat();
            lng = place.geometry.location.lng();

            console.log("Latitude: ", lat, "Longitude: ", lng); // Debugging line

        } else {
            console.error("Place does not have geometry: ", place);
            lat = null;
            lng = null;
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const locationInput = document.getElementById('location');
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');
    
    const today = new Date().toISOString().split('T')[0];
    startDateInput.setAttribute('min', today);

    startDateInput.addEventListener('change', function() {
        endDateInput.setAttribute('min', this.value);
    });


    document.getElementById('submitButton').addEventListener('click', function() {
        const location = document.getElementById('location').value;
        const startDate = startDateInput.value;
        const endDate = endDateInput.value;

        if (location === '' || startDate === '' || endDate === '') {
            alert('Please fill all fields');
        } else if (new Date(startDate) < new Date(today)) {
            alert('Start date cannot be in the past');
        } else if (new Date(endDate) < new Date(startDate)) {
            alert('End date cannot be before the start date');
        } else {
            const data = {
                location: location,
                startDate: startDate,
                endDate: endDate,
                latitude: lat,  // Ensure lat is updated with the correct value
                longitude: lng // Ensure lng is updated with the correct value
            };

            // Check if latitude and longitude are valid
            if (lat !== null && lng !== null) {
                // If both lat and lng are available, save the data in localStorage
                localStorage.setItem('data', JSON.stringify(data));
                window.location.href = redirectUrl; // Ensure you have defined redirectUrl properly
            } else {
                // If lat and lng are null, handle the error (maybe show a message to the user)
                alert("Unable to get geographical coordinates for the location. Please select a valid place.");
            }
        }
    });
});;