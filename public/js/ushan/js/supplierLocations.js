
document.addEventListener("DOMContentLoaded", function(){

    const searchBtn = document.getElementById("search-btn");
    const locationInput = document.getElementById("location");
    const startDateInput = document.getElementById("sDate");
    const endDateInput = document.getElementById("eDate");
    const map = document.getElementById("map");
    const filterBtn = document.getElementById("filter-btn");
    const filterBox = document.getElementById("filter-box");
    const supplierDetails = document.getElementById("supplier-details");

    filterBtn.addEventListener("click", function () {
        filterBox.classList.toggle("show");
    });

    //Validating the inputs
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

            document.querySelector(".map-section").classList.remove("shrink");
            supplierDetails.innerHTML = '';
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

    //Autocompleting Places
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

    //Displaying the map with the markers for suppliers
    function initMap(location) {
        const geocoder = new google.maps.Geocoder(); 
        geocoder.geocode({ address: location }, function (results, status) {
            if (status === "OK" && results[0]) {
                const latitude = results[0].geometry.location.lat();
                const longitude = results[0].geometry.location.lng();

                console.log(`Latitude : ${latitude}, Longitude : ${longitude}`);

                const mapOptions = {
                    center: results[0].geometry.location,
                    zoom: 14,
                };

                const mapInstance = new google.maps.Map(map, mapOptions);
                new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: mapInstance,
                    title: results[0].formatted_address,
                    icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                });

                fetch(URLROOT + "/equipment_suppliers/getSuppliersByLocation", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ latitude: latitude, longitude: longitude }),
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Suppliers:", data);
                
                        if (data.suppliers && data.suppliers.length > 0) {
                            data.suppliers.forEach(function (supplier, index) {
                               const supplierMarker =  new google.maps.Marker({
                                    position: {
                                        lat: parseFloat(supplier.latitude),
                                        lng: parseFloat(supplier.longitude),
                                    },
                                    map: mapInstance,
                                    title: supplier.name,
                                    icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png", // Red marker for suppliers
                                    label: {
                                        text: (index + 1).toString(),
                                        color: "white", 
                                        fontWeight: "bold", 
                                        fontSize: "14px",
                                        padding: "5px",
                                    },
                                });

                                supplierMarker.addListener("click", function() {
                                    console.log(`${supplier.name} clicked`);
                                
                                    document.querySelector("#map").style.width = "50%"; 
                                    document.querySelector("#supplier-details").classList.add("show"); 
                                
                                    const supplierName = document.getElementById("supplier-name");
                                    const supplierDetailsText = document.getElementById("supplier-details-text");
                                
                                    supplierName.innerHTML = supplier.name;
                                    supplierDetailsText.innerHTML = `
                                        <p>Location: ${supplier.address}</p>
                                        <p>Contact: ${supplier.contact}</p>
                                    `;
                                });
                            });
                        } else {
                            console.log("No nearby suppliers found.");
                        }
                    })
                    .catch(error => console.log("Error fetching suppliers:", error));
                } else {
                displayError("location", "Unable to find location on map.");
            }
        });
    }

})