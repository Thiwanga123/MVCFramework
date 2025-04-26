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

                document.getElementById('lat').value = lat;
                document.getElementById('lng').value = lng;
                console.log("Latitude: ", lat, "Longitude: ", lng); // Debugging line

            } else {
                console.error("Place does not have geometry: ", place);
                lat = null;
                lng = null;
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        // const locationInput = document.getElementById('location');
        const startDateInput = document.getElementById('startDate');
        const endDateInput = document.getElementById('endDate');
        const tripForm = document.getElementById('tripForm');
        
        const today = new Date().toISOString().split('T')[0];
        startDateInput.setAttribute('min', today);

        startDateInput.addEventListener('change', function() {
            endDateInput.setAttribute('min', this.value);
        });


        tripForm.addEventListener('submit', function(e) {
            clearErrorMessage();
            e.preventDefault(); // Prevent form submission for validation
            const location = document.getElementById('location').value;
            const startDate = startDateInput.value;
            const endDate = endDateInput.value;

            if (location === '' || startDate === '' || endDate === '') {
                showErrorMessage('Please fill all fields.');
                e.preventDefault();
            } else if (new Date(startDate) < new Date(today)) {
                showErrorMessage('Start date cannot be in the past.');                
                e.preventDefault();
            } else if (new Date(endDate) < new Date(startDate)) {
                showErrorMessage('End date cannot be before the start date.');
                e.preventDefault();
            } else if (lat === null || lng === null) {
                showErrorMessage('Please select a valid location.');
                e.preventDefault();
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
                    tripForm.submit(); // Submit the form
                } else {
                    // If lat and lng are null, handle the error (maybe show a message to the user)
                    alert("Unable to get geographical coordinates for the location. Please select a valid place.");
                }
            }
        });

        function showErrorMessage(message) {
            errorMessageContainer.style.display = 'block';
            errorMessageContainer.innerText = message;
        }
    
        function clearErrorMessage() {
            errorMessageContainer.innerText = '';
            errorMessageContainer.style.display = 'none';
        }
    });;