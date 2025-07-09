document.addEventListener('DOMContentLoaded', () => {
    const viewButtons = document.querySelectorAll('.vehicle-view-btn'); // Get all view buttons
    const modal = document.getElementById('vehicleModal'); // Get the modal element
    const closeBtn = modal.querySelector('.close-btn'); // Get the close button inside the modal

    viewButtons.forEach(button => {
        button.addEventListener('click', async function () {
            const vehicleId = this.dataset.id; // Get vehicle ID from data attribute
            try {
                const response = await fetch(`${URLROOT}/transport_suppliers/getVehicleDetails`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ vehicleId }) // Send vehicle ID in request body
                });

                if (!response.ok) throw new Error('Failed to fetch vehicle data');

                // Parse JSON response
                const data = await response.json();
                console.log(data); 
                
                if (data.success) {
                    // Fill in modal content
                    document.getElementById('vehicleMakeModel').textContent = `${data.data.make} ${data.data.model}`;
                    document.getElementById('vehicleType').textContent = data.data.type;
                    document.getElementById('vehicleFuelType').textContent = data.data.fuel_type;
                    document.getElementById('vehicleLocation').textContent = data.data.location;
                    document.getElementById('vehicleCost').textContent = `Rs. ${data.data.cost}`;
                    document.getElementById('vehicleRate').textContent = data.data.rate;
                    document.getElementById('vehicleAvailability').textContent = data.data.availability;
                    
                    const availabilityElement = document.getElementById('vehicleAvailability');
                    if (data.data.availability === 'Available') {
                        availabilityElement.classList.add('available');
                        availabilityElement.classList.remove('unavailable');
                    } else {
                        availabilityElement.classList.add('unavailable');
                        availabilityElement.classList.remove('available');
                    }

                    // Optionally, display image if available
                    const vehicleImage = document.getElementById('vehicleImage'); // Get the image element by ID
                    if (data.data.image_path) {
                        vehicleImage.src = data.data.image_path; // Set image source to the returned image path
                        vehicleImage.style.display = 'block'; // Show the image if it exists
                    } else {
                        vehicleImage.style.display = 'none'; // Hide the image if no image path exists
                    }

                    // Show the modal
                    modal.style.display = 'flex';
                } else {
                    alert(data.message || 'An error occurred while fetching vehicle details.');
                }

            } catch (err) {
                // Log and alert any errors
                console.error(err);
                alert('Unable to load vehicle details.');
            }
        });
    });

    // Close modal when close button is clicked
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Close modal if clicked outside of it
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    
});