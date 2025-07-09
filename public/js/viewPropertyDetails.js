document.addEventListener('DOMContentLoaded', () => {
    const viewButtons = document.querySelectorAll('.view-btn');
    const bookButtons = document.querySelectorAll('.pay-button');

    viewButtons.forEach(button => {
        button.addEventListener('click', async function () {
            const propertyId = this.getAttribute('data-id');

            try {
                // Fetch data from the server
                const response = await fetch(`${URLROOT}/accomadation/getPropertyDetailsDiv`, {
                    method: 'POST', // Assuming POST request, modify as necessary
                    headers: {
                        'Content-Type': 'application/json', // Ensure proper content type
                    },
                    body: JSON.stringify({ propertyId }) // Send the propertyId in the request body
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                // Parse the response as JSON
                const propertyData = await response.json();
                // Check if the response indicates success
                console.log(propertyData);
                if (!propertyData.success) {
                    alert(propertyData.error || 'Failed to load property details.');
                    return;
                }

                // Populate the modal with the property details
                document.getElementById('modalName').textContent = propertyData.property_name;
                document.getElementById('modalAddress').textContent = propertyData.address;
                document.getElementById('modalCity').textContent = propertyData.city;
                document.getElementById('modalSingleBedrooms').textContent = propertyData.single_bedrooms;
                document.getElementById('modalSingleBedroomsPrice').textContent = propertyData.singleprice                ;
                document.getElementById('modalDoubleBedrooms').textContent = propertyData.double_bedrooms;
                document.getElementById('modalDoubleBedroomsPrice').textContent = propertyData.doubleprice;
                document.getElementById('modalFamilyRooms').textContent = propertyData.family_rooms;
                document.getElementById('modalFamilyRoomsPrice').textContent = propertyData.familyprice;                ;
                document.getElementById('modalBathrooms').textContent = propertyData.bathrooms;
                document.getElementById('modalSwimmingPool').textContent = propertyData.swimming_pool ? 'Yes' : 'No';
                document.getElementById('modalSmokingAllowed').textContent = propertyData.smoking_allowed;
                document.getElementById('modalCheckInFrom').textContent = propertyData.check_in_from;
                document.getElementById('modalCheckOutFrom').textContent = propertyData.check_out_from;
                document.getElementById('modalOtherDetails').textContent = propertyData.other_details || 'No additional details available.';

                // Set the image if available
                document.getElementById('modalImage').src = propertyData.image_path
                    ? `/yourproject/${propertyData.image_path}`
                    : '/yourproject/public/images/default.jpg';

                // Show modal
                document.getElementById('modalOverlay').style.display = 'flex';

            } catch (error) {
                console.error('Error fetching property details:', error);
                alert('Failed to load property details.');
            }
        });
    });


    
    bookButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Retrieve propertyId and serviceProviderId from button's data attributes
            const propertyId = this.getAttribute('data-id');
            const serviceProviderId = this.getAttribute('data-spid');
            const singleMax = parseInt(this.getAttribute('data-single')) || 0;
            const doubleMax = parseInt(this.getAttribute('data-double')) || 0;
            const familyMax = parseInt(this.getAttribute('data-family')) || 0;

            // Open the booking modal
            openBookingModal(propertyId, serviceProviderId, singleMax, doubleMax, familyMax)
        });
    });

    function populateSelectOptions(selectId, max) {
        const select = document.getElementById(selectId);
        if (!select) return;
    
        // Clear previous options
        select.innerHTML = '';
    
        for (let i = 0; i <= max; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            select.appendChild(option);
        }
    
        // Update Max text
        const group = select.closest('.input-group');
        const span = group.querySelector('span');
        if (span) {
            span.textContent = `Max: ${max}`;
        }
    }

    // Function to open the booking modal and populate data
    function openBookingModal(propertyId, serviceProviderId, singleMax, doubleMax, familyMax) {
        // Populate the hidden fields with property and service provider data
        document.getElementById('propertyId').value = propertyId;
        document.getElementById('serviceProviderId').value = serviceProviderId;

        populateSelectOptions('singleRooms', singleMax);
        populateSelectOptions('doubleRooms', doubleMax);
        populateSelectOptions('familyRooms', familyMax);    
        // Display the booking modal
        document.getElementById('bookingModalOverlay').style.display = 'flex';
    }


    // Handle form submission for booking
    document.getElementById('bookingForm').addEventListener('submit', async function (event) {
        event.preventDefault();

        // Gather form data
        const formData = new FormData(this);
        
        // Send the booking data to the server
        const response = await fetch(`${URLROOT}/accomadation/bookRoom`, {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            alert('Failed to book accommodation.');
            return;
        }

        const bookingData = await response.json();
        if (bookingData.success) {
            alert('Booking successful!');
            document.getElementById('bookingModalOverlay').style.display = 'none'; // Close the modal
        } else {
            alert(bookingData.error || 'An error occurred during booking.');
        }
    });
});
