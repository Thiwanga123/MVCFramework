document.addEventListener('DOMContentLoaded', () => {
    const viewButtons = document.querySelectorAll('.view-btn');

    viewButtons.forEach(button => {
        button.addEventListener('click', async function () {
            const propertyId = this.getAttribute('data-id');

            try {
                // Fetch data from the server
                const response = await fetch(`${URLROOT}/accomadation/getPropertyDetails`, {
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
});