function nextStep(step) {
    // Validate the current step before moving to the next
    if (step === 2 && !validateStep1()) {
        return; // Stop if validation fails
    }
    if (step === 3 && !validateStep2()) {
        return; // Stop if validation fails
    }

    // Hide the current step
    document.getElementById(`step-${step - 1}`).style.display = 'none';
    // Show the next step
    document.getElementById(`step-${step}`).style.display = 'block';
}

function prevStep(step) {
    // Hide the current step
    document.getElementById(`step-${step + 1}`).style.display = 'none';
    // Show the previous step
    document.getElementById(`step-${step}`).style.display = 'block';
}

function validateStep1() {
    let isValid = true;

    // Get values from inputs
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const nic = document.getElementById('nic').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const sptype = document.getElementById('sptype').value;

    // Clear previous error messages
    clearErrors();

    // Validate Business Name
    if (name === '') {
        showError('name', 'Business Name is required');
        isValid = false;
    }

    // Validate Email
    if (email === '') {
        showError('email', 'Email is required');
        isValid = false;
    }

    // Validate NIC Number
    if (nic === '') {
        showError('nic', 'NIC Number is required');
        isValid = false;
    }

    // Validate Phone Number
    if (phone === '') {
        showError('phone', 'Contact Number is required');
        isValid = false;
    }

    // Validate Service Type
    if (sptype === '') {
        showError('sptype', 'Service Type is required');
        isValid = false;
    }

    return isValid;
}

function validateStep2() {
    let isValid = true;

    // Get values from inputs
    const address = document.getElementById('address').value.trim();
    const presentAddress = document.getElementById('present_address').value.trim();

    // Clear previous error messages
    clearErrors();

    // Validate Address
    if (address === '') {
        showError('address', 'Address is required');
        isValid = false;
    }

    // Validate Present Address
    if (presentAddress === '') {
        showError('present_address', 'Present Address is required');
        isValid = false;
    }

    return isValid;
}

function validateStep3() {
    let isValid = true;

    // Get values from inputs
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirm_password').value.trim();

    // Clear previous error messages
    clearErrors();

    // Validate Password
    if (password === '') {
        showError('password', 'Password is required');
        isValid = false;
    } else if (password.length < 8) {
        showError('password', 'Password must be at least 8 characters long');
        isValid = false;
    } else if (!/[A-Z]/.test(password)) {
        showError('password', 'Password must contain at least one uppercase letter');
        isValid = false;
    } else if (!/[a-z]/.test(password)) {
        showError('password', 'Password must contain at least one lowercase letter');
        isValid = false;
    } else if (!/[0-9]/.test(password)) {
        showError('password', 'Password must contain at least one number');
        isValid = false;
    } else if (!/[!@#$%^&*]/.test(password)) {
        showError('password', 'Password must contain at least one special character (e.g., !@#$%^&*)');
        isValid = false;
    }

    // Validate Confirm Password
    if (confirmPassword === '') {
        showError('confirm_password', 'Please confirm your password');
        isValid = false;
    } else if (password !== confirmPassword) {
        showError('confirm_password', 'Passwords do not match');
        isValid = false;
    }

    return isValid;
}

function showError(fieldId, message) {
    const errorSpan = document.querySelector(`#${fieldId} + .form-invalid`);
    if (errorSpan) {
        errorSpan.textContent = message;
    }
}

function clearErrors() {
    const errorSpans = document.querySelectorAll('.form-invalid');
    errorSpans.forEach(span => {
        span.textContent = '';
    });
}

function showError(fieldId, message) {
    const errorSpan = document.querySelector(`#${fieldId} + .form-invalid`);
    if (errorSpan) {
        errorSpan.textContent = message;
    }
}

function clearErrors() {
    const errorSpans = document.querySelectorAll('.form-invalid');
    errorSpans.forEach(span => {
        span.textContent = '';
    });
}
function initMap() {
    let map, marker;
    let geocoder = new google.maps.Geocoder();

    // Default location (Colombo, Sri Lanka)
    const defaultLocation = { lat: 6.9271, lng: 79.8612 };

    map = new google.maps.Map(document.getElementById("map"), {
        center: defaultLocation,
        zoom: 13,
    });

    marker = new google.maps.Marker({
        position: defaultLocation,
        map: map,
        draggable: true,
    });

    const addressInput = document.getElementById("address");
    const presentAddressInput = document.getElementById("present_address");
    const latitudeInput = document.getElementById("latitude");
    const longitudeInput = document.getElementById("longitude");

    const autocomplete = new google.maps.places.Autocomplete(addressInput);
    autocomplete.bindTo("bounds", map);

    autocomplete.addListener("place_changed", function () {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            alert("No details available for this location.");
            return;
        }

        map.setCenter(place.geometry.location);
        map.setZoom(15);
        marker.setPosition(place.geometry.location);

        latitudeInput.value = place.geometry.location.lat();
        longitudeInput.value = place.geometry.location.lng();
        presentAddressInput.value = addressInput.value; 
    });

    google.maps.event.addListener(marker, "dragend", function () {
        const newPosition = marker.getPosition();
        latitudeInput.value = newPosition.lat();
        longitudeInput.value = newPosition.lng();

        geocoder.geocode({ location: newPosition }, function (results, status) {
            if (status === "OK") {
                if (results[0]) {
                    presentAddressInput.value = results[0].formatted_address;
                } else {
                    presentAddressInput.value = "Address not found";
                }
            } else {
                console.error("Geocoder failed due to: " + status);
            }
        });
    });
}

document.addEventListener("DOMContentLoaded", initMap);