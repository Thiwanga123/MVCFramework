// Global variables to store current property ID
let currentPropertyId = null;
const viewModal = document.getElementById('viewPropertyModal');
const editModal = document.getElementById('editPropertyModal');
const viewModalContent = document.getElementById('viewModalContent');
const editModalContent = document.getElementById('editModalContent');
const saveChangesBtn = document.getElementById('saveChangesBtn');

// Open view modal and load property details
function openViewModal(propertyId) {
    currentPropertyId = propertyId;
    viewModal.style.display = 'block';
    document.body.style.overflow = 'hidden';
    
    // Fetch property details
    fetchPropertyDetails(propertyId, 'view');
}

// Open edit modal and load property details in editable form
function openEditModal(propertyId) {
    currentPropertyId = propertyId;
    editModal.style.display = 'block';
    document.body.style.overflow = 'hidden';
    
    // Fetch property details for editing
    fetchPropertyDetails(propertyId, 'edit');
}

// Close view modal
function closeViewModal() {
    viewModal.style.display = 'none';
    document.body.style.overflow = 'auto';
    viewModalContent.innerHTML = '<div class="loading">Loading property details...</div>';
}

// Close edit modal
function closeEditModal() {
    editModal.style.display = 'none';
    document.body.style.overflow = 'auto';
    editModalContent.innerHTML = '<div class="loading">Loading edit form...</div>';
}

// Fetch property details from server
function fetchPropertyDetails(propertyId, mode) {
    // Replace with actual AJAX call to your server
    fetch(`${URLROOT}/accomadation/getPropertyDetails/${propertyId}?mode=${mode}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (mode === 'view') {
                displayPropertyDetails(data);
            } else {
                displayEditForm(data);
            }
        })
        .catch(error => {
            console.error('Error fetching property details:', error);
            if (mode === 'view') {
                viewModalContent.innerHTML = '<p class="error">Error loading property details. Please try again.</p>';
            } else {
                editModalContent.innerHTML = '<p class="error">Error loading edit form. Please try again.</p>';
            }
        });
}

// Display property details in view modal
function displayPropertyDetails(property) {
    let html = `
        <div class="property-details-section">
            <h3>Basic Information</h3>
            <div class="detail-row">
                <div class="detail-label">Property Name:</div>
                <div class="detail-value">${property.property_name}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Property Type:</div>
                <div class="detail-value">${property.property_type}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Property ID:</div>
                <div class="detail-value">${property.property_id}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Address:</div>
                <div class="detail-value">${property.address}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">City:</div>
                <div class="detail-value">${property.city}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Postal Code:</div>
                <div class="detail-value">${property.postal_code}</div>
            </div>
        </div>

        <div class="property-details-section">
            <h3>Room Information</h3>
            <div class="detail-row">
                <div class="detail-label">Single Bedrooms:</div>
                <div class="detail-value">${property.single_bedrooms} (Price: Rs. ${property.singleprice})</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Double Bedrooms:</div>
                <div class="detail-value">${property.double_bedrooms} (Price: Rs. ${property.doubleprice})</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Living Rooms:</div>
                <div class="detail-value">${property.living_rooms} (Price: Rs. ${property.livingprice})</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Family Rooms:</div>
                <div class="detail-value">${property.family_rooms} (Price: Rs. ${property.familyprice})</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Bathrooms:</div>
                <div class="detail-value">${property.bathrooms}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Max Occupants:</div>
                <div class="detail-value">${property.max_occupants}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Apartment Size:</div>
                <div class="detail-value">${property.apartment_size}</div>
            </div>
        </div>

        <div class="property-details-section">
            <h3>Check-in & Check-out</h3>
            <div class="detail-row">
                <div class="detail-label">Check-in Time:</div>
                <div class="detail-value">From ${property.check_in_from} until ${property.check_in_until}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Check-out Time:</div>
                <div class="detail-value">From ${property.check_out_from} until ${property.check_out_until}</div>
            </div>
        </div>

        <div class="property-details-section">
            <h3>Amenities & Features</h3>
            <div class="amenities-grid">
                ${generateAmenitiesList(property)}
            </div>
        </div>

        <div class="property-details-section">
            <h3>Rules & Policies</h3>
            <div class="detail-row">
                <div class="detail-label">Children Allowed:</div>
                <div class="detail-value">${property.children_allowed === '1' ? 'Yes' : 'No'}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Offers Cots:</div>
                <div class="detail-value">${property.offers_ctos === '1' ? 'Yes' : 'No'}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Smoking Allowed:</div>
                <div class="detail-value">${property.smoking_allowed === '1' ? 'Yes' : 'No'}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Parties Allowed:</div>
                <div class="detail-value">${property.parties_allowed === '1' ? 'Yes' : 'No'}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Pets Allowed:</div>
                <div class="detail-value">${property.pets_allowed === '1' ? 'Yes' : 'No'}</div>
            </div>
        </div>
    `;

    viewModalContent.innerHTML = html;
}

// Generate amenities list HTML
function generateAmenitiesList(property) {
    const amenities = [
        { name: 'Air Conditioning', value: property.air_conditioning },
        { name: 'Heating', value: property.heating },
        { name: 'Free WiFi', value: property.free_wifi },
        { name: 'EV Charging', value: property.ev_charging },
        { name: 'Kitchen', value: property.kitchen },
        { name: 'Kitchenette', value: property.kitchenette },
        { name: 'Washing Machine', value: property.washing_machine },
        { name: 'TV', value: property.flat_screen_tv },
        { name: 'Swimming Pool', value: property.swimming_pool },
        { name: 'Hot Tub', value: property.hot_tub },
        { name: 'Minibar', value: property.minibar },
        { name: 'Sauna', value: property.sauna },
        { name: 'Balcony', value: property.balcony },
        { name: 'Garden View', value: property.garden_view },
        { name: 'Terrace', value: property.terrace },
        { name: 'View', value: property.view }
    ];

    let html = '<div class="checkbox-group">';
    
    amenities.forEach(amenity => {
        const isAvailable = amenity.value === '1' || amenity.value === 1;
        html += `
            <div class="amenity-item">
                <span class="${isAvailable ? 'available' : 'unavailable'}">
                    ${isAvailable ? '✓' : '✗'} ${amenity.name}
                </span>
            </div>
        `;
    });
    
    html += '</div>';
    return html;
}

// Display edit form in edit modal
function displayEditForm(property) {
    let html = `
        <form id="editPropertyForm">
            <div class="edit-form-section">
                <h3>Basic Information</h3>
                <div class="form-group">
                    <label for="property_name">Property Name</label>
                    <input type="text" id="property_name" name="property_name" value="${property.property_name}" required>
                </div>
                <div class="form-group read-only-field">
                    <label for="property_type">Property Type</label>
                    <input type="text" id="property_type" name="property_type" value="${property.property_type}" disabled>
                </div>
                <div class="form-group read-only-field">
                    <label for="property_id">Property ID</label>
                    <input type="text" id="property_id" name="property_id" value="${property.property_id}" disabled>
                </div>
                <div class="form-group read-only-field">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" rows="2" disabled>${property.address}</textarea>
                </div>
                <div class="form-group read-only-field">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" value="${property.city}" disabled>
                </div>
                <div class="form-group read-only-field">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" id="postal_code" name="postal_code" value="${property.postal_code}" disabled>
                </div>
            </div>

            <div class="edit-form-section">
                <h3>Room Information</h3>
                <div class="form-group read-only-field">
                    <label for="single_bedrooms">Single Bedrooms</label>
                    <input type="number" id="single_bedrooms" name="single_bedrooms" value="${property.single_bedrooms}" disabled>
                </div>
                <div class="form-group">
                    <label for="singleprice">Single Room Price (Rs.)</label>
                    <input type="number" id="singleprice" name="singleprice" value="${property.singleprice}" required>
                </div>
                <div class="form-group read-only-field">
                    <label for="double_bedrooms">Double Bedrooms</label>
                    <input type="number" id="double_bedrooms" name="double_bedrooms" value="${property.double_bedrooms}" disabled>
                </div>
                <div class="form-group">
                    <label for="doubleprice">Double Room Price (Rs.)</label>
                    <input type="number" id="doubleprice" name="doubleprice" value="${property.doubleprice}" required>
                </div>
                <div class="form-group read-only-field">
                    <label for="living_rooms">Living Rooms</label>
                    <input type="number" id="living_rooms" name="living_rooms" value="${property.living_rooms}" disabled>
                </div>
                <div class="form-group">
                    <label for="livingprice">Living Room Price (Rs.)</label>
                    <input type="number" id="livingprice" name="livingprice" value="${property.livingprice}" required>
                </div>
                <div class="form-group read-only-field">
                    <label for="family_rooms">Family Rooms</label>
                    <input type="number" id="family_rooms" name="family_rooms" value="${property.family_rooms}" disabled>
                </div>
                <div class="form-group">
                    <label for="familyprice">Family Room Price (Rs.)</label>
                    <input type="number" id="familyprice" name="familyprice" value="${property.familyprice}" required>
                </div>
                <div class="form-group read-only-field">
                    <label for="bathrooms">Bathrooms</label>
                    <input type="number" id="bathrooms" name="bathrooms" value="${property.bathrooms}" disabled>
                </div>
                <div class="form-group">
                    <label for="max_occupants">Maximum Guests</label>
                    <input type="number" id="max_occupants" name="max_occupants" value="${property.max_occupants}" required>
                </div>
            </div>

            <div class="edit-form-section">
                <h3>Check-in & Check-out</h3>
                <div class="form-group">
                    <label for="check_in_from">Check-in From</label>
                    <input type="time" id="check_in_from" name="check_in_from" value="${property.check_in_from}" required>
                </div>
                <div class="form-group">
                    <label for="check_in_until">Check-in Until</label>
                    <input type="time" id="check_in_until" name="check_in_until" value="${property.check_in_until}" required>
                </div>
                <div class="form-group">
                    <label for="check_out_from">Check-out From</label>
                    <input type="time" id="check_out_from" name="check_out_from" value="${property.check_out_from}" required>
                </div>
                <div class="form-group">
                    <label for="check_out_until">Check-out Until</label>
                    <input type="time" id="check_out_until" name="check_out_until" value="${property.check_out_until}" required>
                </div>
            </div>

            <div class="edit-form-section">
                <h3>Amenities & Features</h3>
                <div class="checkbox-group">
                    ${generateAmenitiesCheckboxes(property)}
                </div>
            </div>

            <div class="edit-form-section">
                <h3>Rules & Policies</h3>
                <div class="form-group">
                    <label>Children Allowed</label>
                    <div class="radio-group">
                        <label><input type="radio" name="children_allowed" value="1" ${property.children_allowed === '1' ? 'checked' : ''}> Yes</label>
                        <label><input type="radio" name="children_allowed" value="0" ${property.children_allowed === '0' ? 'checked' : ''}> No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Offers Cots</label>
                    <div class="radio-group">
                        <label><input type="radio" name="offers_ctos" value="1" ${property.offers_ctos === '1' ? 'checked' : ''}> Yes</label>
                        <label><input type="radio" name="offers_ctos" value="0" ${property.offers_ctos === '0' ? 'checked' : ''}> No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Smoking Allowed</label>
                    <div class="radio-group">
                        <label><input type="radio" name="smoking_allowed" value="1" ${property.smoking_allowed === '1' ? 'checked' : ''}> Yes</label>
                        <label><input type="radio" name="smoking_allowed" value="0" ${property.smoking_allowed === '0' ? 'checked' : ''}> No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Parties Allowed</label>
                    <div class="radio-group">
                        <label><input type="radio" name="parties_allowed" value="1" ${property.parties_allowed === '1' ? 'checked' : ''}> Yes</label>
                        <label><input type="radio" name="parties_allowed" value="0" ${property.parties_allowed === '0' ? 'checked' : ''}> No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Pets Allowed</label>
                    <div class="radio-group">
                        <label><input type="radio" name="pets_allowed" value="1" ${property.pets_allowed === '1' ? 'checked' : ''}> Yes</label>
                        <label><input type="radio" name="pets_allowed" value="0" ${property.pets_allowed === '0' ? 'checked' : ''}> No</label>
                    </div>
                </div>
            </div>
            
            <div class="edit-form-section">
                <h3>Other Details</h3>
                <div class="form-group">
                    <label for="other_details">Additional Information</label>
                    <textarea id="other_details" name="other_details" rows="4">${property.other_details || ''}</textarea>
                </div>
            </div>
        </form>
    `;

    editModalContent.innerHTML = html;
}

// Generate amenities checkboxes HTML
function generateAmenitiesCheckboxes(property) {
    const amenities = [
        { id: 'air_conditioning', name: 'Air Conditioning', value: property.air_conditioning },
        { id: 'heating', name: 'Heating', value: property.heating },
        { id: 'free_wifi', name: 'Free WiFi', value: property.free_wifi },
        { id: 'ev_charging', name: 'EV Charging', value: property.ev_charging },
        { id: 'kitchen', name: 'Kitchen', value: property.kitchen },
        { id: 'kitchenette', name: 'Kitchenette', value: property.kitchenette },
        { id: 'washing_machine', name: 'Washing Machine', value: property.washing_machine },
        { id: 'flat_screen_tv', name: 'TV', value: property.flat_screen_tv },
        { id: 'swimming_pool', name: 'Swimming Pool', value: property.swimming_pool },
        { id: 'hot_tub', name: 'Hot Tub', value: property.hot_tub },
        { id: 'minibar', name: 'Minibar', value: property.minibar },
        { id: 'sauna', name: 'Sauna', value: property.sauna },
        { id: 'balcony', name: 'Balcony', value: property.balcony },
        { id: 'garden_view', name: 'Garden View', value: property.garden_view },
        { id: 'terrace', name: 'Terrace', value: property.terrace },
        { id: 'view', name: 'View', value: property.view }
    ];

    let html = '';
    
    amenities.forEach(amenity => {
        const isChecked = amenity.value === '1' || amenity.value === 1;
        html += `
            <div>
                <label>
                    <input type="checkbox" id="${amenity.id}" name="${amenity.id}" ${isChecked ? 'checked' : ''}>
                    ${amenity.name}
                </label>
            </div>
        `;
    });
    
    return html;
}

// Close modals when clicking outside
window.onclick = function(event) {
    if (event.target == viewModal) {
        closeViewModal();
    } else if (event.target == editModal) {
        closeEditModal();
    }
};

// Handle save changes button click
saveChangesBtn.addEventListener('click', function() {
    const form = document.getElementById('editPropertyForm');
    
    // Validate form
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    
    // Collect form data
    const formData = new FormData(form);
    formData.append('property_id', currentPropertyId);
    
    // Add checkbox values for amenities
    const checkboxes = form.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        formData.append(checkbox.name, checkbox.checked ? '1' : '0');
    });
    
    // Submit form data
    updateProperty(formData);
});

// Update property data
function updateProperty(formData) {
    fetch(`${URLROOT}/accomadation/updateProperty`, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert('Property updated successfully!');
            closeEditModal();
            // Reload the page to see the updates
            window.location.reload();
        } else {
            alert('Error updating property: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error updating property:', error);
        alert('Error updating property. Please try again.');
    });
}

// Define URLROOT for use in AJAX calls
const URLROOT = document.querySelector('link[href*="/css/Common/MyInventory.css"]')
    .getAttribute('href')
    .split('/css/Common/MyInventory.css')[0];
