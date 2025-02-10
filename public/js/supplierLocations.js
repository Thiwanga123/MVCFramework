
document.addEventListener("DOMContentLoaded", function(){

    const searchBtn = document.getElementById("search-btn");
    const locationInput = document.getElementById("location");
    const startDateInput = document.getElementById("sDate");
    const endDateInput = document.getElementById("eDate");
    const map = document.getElementById("map");
    const filterBtn = document.getElementById("filter-btn");
    const filterBox = document.getElementById("filter-box");

    filterBtn.addEventListener("click", function () {
        console.log("clicked");
        filterBox.classList.toggle("show");
    });

    searchBtn.addEventListener("click", function (event){
        event.preventDefault();
        clearErrors();

        const location = locationInput.value.trim();
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);
        const today = new Date();

        let isValid = true;
        if (!location) {
            displayError("location", "Please enter a location.");
            isValid = false;
        }

        if (!startDateInput.value) {
            displayError("sDate", "Please select a start date.");
            isValid = false;
        } else if (startDate < today.setHours(0, 0, 0, 0)) {
            displayError("sDate", "Start Date cannot be in the past.");
            isValid = false;
        }

        if (!endDateInput.value) {
            displayError("eDate", "Please select an end date.");
            isValid = false;
        } else if (endDate < startDate) {
            displayError("eDate", "End Date cannot be before the Start Date.");
            isValid = false;
        }

        if (isValid) {
            map.style.display = "block";
            initMap(location);
        }

    });

    //Function to display the errors
    function displayError(field, message) {
        document.getElementById(`${field}-error`).innerText = message;
    }

    //Function to clear the errors
    function clearErrors() {
        const errorFields = document.querySelectorAll(".form-invalid"); 
        errorFields.forEach((field) => {
            field.textContent = ""; 
        });
    }

    if (google && google.maps && google.maps.places) {
        const autocomplete = new google.maps.places.Autocomplete(locationInput, {
            componentRestrictions: { country: "LK" },
        });

        autocomplete.addListener("place_changed", function () {
            const place = autocomplete.getPlace();
            if (!place.geometry) {
                displayError("location", "Please select a valid location.");
            } else {
                clearErrors();
            }
        });
    }

    function initMap(location) {
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({ address: location }, function (results, status) {
            if (status === "OK" && results[0]) {
                const mapOptions = {
                    center: results[0].geometry.location,
                    zoom: 14,
                };

                const mapInstance = new google.maps.Map(map, mapOptions);

                new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: mapInstance,
                    title: results[0].formatted_address,
                });
            } else {
                displayError("location", "Unable to find location on map.");
            }
        });
    }

})