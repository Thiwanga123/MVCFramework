document.addEventListener("DOMContentLoaded", function () {
    
    window.nextStep = function (currentStep) {
        if (validateStep(currentStep)) {
            if (currentStep === 3) {
                sendDataToServer(currentStep).then(serverValidationSuccess => {
                    if (serverValidationSuccess) {
                        document.getElementById("registration-form").submit();
                    }
                });
            } else {
                sendDataToServer(currentStep).then(serverValidationSuccess => {
                    if (serverValidationSuccess) {
                        document.getElementById(`step-${currentStep}`).style.display = "none";
                        document.getElementById(`step-${currentStep + 1}`).style.display = "block";
                    }
                });
            }
        }
    };
    

    window.prevStep = function (currentStep) {
        if (currentStep > 1) {
            document.getElementById(`step-${currentStep}`).style.display = "none";
            document.getElementById(`step-${currentStep - 1}`).style.display = "block";
        }
    };

    document.getElementById("registration-form").addEventListener("submit", function(event) {
        event.preventDefault();
        if (validateStep(3)) {
            sendDataToServer(3).then(serverValidationSuccess => {
                if (serverValidationSuccess) {
                    this.submit();
                }
            });
        }
    });

    function validateStep(currentStep) {
        let isValid = true;
        switch (currentStep) {
            case 1:
                console.log("step1");
                isValid = validateStep1();
                break;
    
            case 2:
                console.log("step2");
                isValid = validateStep2();
                break;
    
            case 3:
                console.log("step3");
                isValid = validateStep3();
                break;
        }
    
        return isValid;
    }
    
    function validateStep1() {
        let isValid = true;
    
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const nic = document.getElementById("nic").value;
        const phone = document.getElementById("phone").value;
        const serviceType = document.getElementById("sptype").value;
    
        if (!name) {
            displayError('name', 'Business Name is required');
            isValid = false;
        } else {
            clearError('name');
        }
    
        if (!email) {
            displayError('email', 'Email is required');
            isValid = false;
        } else {
            clearError('email');
        }
    
        if (!nic) {
            displayError('nic', 'NIC Number is required');
            isValid = false;
        } else {
            clearError('nic');
        }
    
        if (!phone) {
            displayError('phone', 'Phone Number is required');
            isValid = false;
        } else {
            clearError('phone');
        }
    
        if (!serviceType) {
            displayError('sptype', 'Service Type is required');
            isValid = false;
        } else {
            clearError('sptype');
        }
    
        return isValid;
    }
    
    function validateStep2() {
        let isValid = true;
    
        const address = document.getElementById("address").value;
        const presentAddress = document.getElementById("present_address").value;
        const latitude = document.getElementById("latitude").value;
        const longitude = document.getElementById("longitude").value;
    
        if (!address) {
            displayError('address', 'Address is required');
            isValid = false;
        } else {
            clearError('address');
        }
    
        if (!presentAddress) {
            displayError('presentaddress', 'Present Address is required. Please pin your location on the map');
            isValid = false;
        } else {
            clearError('presentaddress');
        }

        if (!latitude || !longitude) {
            displayError('map', 'Pin your location on the map');
            isValid = false;
        } else {
            clearError('map');
        }
    
        return isValid;
    }
    
    function validateStep3() {
        let isValid = true;
    
        const regNum = document.getElementById("reg_num").value;
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm_password").value;
        const pdfFile = document.getElementById("pdfFile").files[0];
    
        if (!regNum) {
            displayError('reg_num', 'Government Registration Number is required');
            isValid = false;
        } else {
            clearError('reg_num');
        }
    
        if (!password) {
            displayError('password', 'Password is required');
            isValid = false;
        } else if (password.length < 8) {
            displayError('password', 'Password must be at least 8 characters long');
            isValid = false;
        } else {
            clearError('password');
        }

        if (!confirmPassword) {
            displayError('confirm_password', 'Re-enter the password');
            isValid = false;
        } else if (password !== confirmPassword) {
            displayError('confirm_password', 'Passwords do not match');
            isValid = false;
        } else {
            clearError('confirm_password');
        }

    
        if (!pdfFile) {
            displayError('pdfFile', 'Please upload a relevant documents');
            isValid = false;
        } else {
            clearError('pdfFile');
        }
    
        return isValid;
    }
    
    function displayError(field, message) {
        document.getElementById(`${field}-error`).innerText = message;
    }
    
    function clearError(field) {
        document.getElementById(`${field}-error`).innerText = '';
    }
    
    function sendDataToServer(currentStep) {
        return new Promise((resolve) => {
            const formData = new FormData(document.getElementById("registration-form"));
            formData.append("current_step", currentStep);

            //Debugging
            console.log(`Sending data for step ${currentStep}:`);
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`);
            }

            const xhr = new XMLHttpRequest();
            xhr.open("POST", URLROOT + "/ServiceProvider/validation", true);

            xhr.onload = function () {
                if (xhr.status === 200) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        
                        //Debugging
                        console.log("Parsed Response:", response);
                        if (response.success) {
                            resolve(true);
                        } else {
                            displayServerErrors(response.errors);
                            resolve(false);
                        }
                    } catch (error) {
                        console.error("Failed to parse response:", error);
                        resolve(false);
                    }
                } else {
                    resolve(false);
                }
            };

            xhr.send(formData);
        });
    }

    
    function displayServerErrors(errors) {
        console.log("Server Errors:", errors);
        for (const field in errors) {
            if (errors.hasOwnProperty(field)) {
                displayError(field, errors[field]);
            } 
        }
    }
    

    function initMap() {
        let map, marker;
        let geocoder = new google.maps.Geocoder();

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
    initMap();
});