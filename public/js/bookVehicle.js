document.addEventListener('DOMContentLoaded', () => {
    const bookingModal = document.getElementById('bookingModal');
    const closeButton = document.querySelector('#bookingModal .close-btnn');
    const cancelButton = document.querySelector('#bookingModal .cancel-btn');
    const bookButtons = document.querySelectorAll('.pay-button');
    const startDate = document.getElementById('sDate').value;
    const endDate = document.getElementById('eDate').value;
   

    // Function to open the booking modal and store data attributes
    function openBookingModal(vehicleId, supplierId, rate, availability, cost) {
        // Store data attributes in the form for submission
        const bookingForm = document.getElementById('bookingForm');
        bookingForm.dataset.vehicleId = vehicleId;
        bookingForm.dataset.supplierId = supplierId;
        bookingForm.dataset.rate = rate;
        bookingForm.dataset.availability = availability;
        bookingForm.dataset.cost = cost; // Assuming cost is also needed
        // Show the modal
        bookingModal.style.display = 'flex';
    }
    // Function to close the booking modal
    function closeBookingModal() {
        bookingModal.style.display = 'none';
        // Reset the form to clear inputs
        document.getElementById('bookingForm').reset();
    }

    // Add click event listeners to all "Book" buttons
    bookButtons.forEach(button => {
        button.addEventListener('click', () => {
            const vehicleId = button.dataset.id;
            const supplierId = button.dataset.supplierId;
            const rate = button.dataset.rate;
            const availability = button.dataset.availability;
            const cost = button.dataset.cost; // Assuming cost is also needed

            openBookingModal(vehicleId, supplierId, rate, availability, cost, rate);
        });
    });

    // Close the modal when the close button (×) is clicked
    closeButton.addEventListener('click', closeBookingModal);

    // Close the modal when the cancel button is clicked
    cancelButton.addEventListener('click', closeBookingModal);
    // Handle form submission
    document.getElementById('bookingForm').addEventListener('submit', async (e) => {
        e.preventDefault(); // Prevent default form submission
    
        const pickupLocation = document.getElementById('pickupLocation').value;
        const driverOption = document.querySelector('input[name="driverOption"]:checked')?.value;
        const vehicleId = e.target.dataset.vehicleId;
        const supplierId = e.target.dataset.supplierId;
        const rate = e.target.dataset.rate;
        const cost = e.target.dataset.cost;
        const availability = e.target.dataset.availability;
     
        if (!pickupLocation || !driverOption) {
            alert('Please fill in all required fields.');
            return;
        }
        const bookingData = {
            vehicleId,
            supplierId,
            rate,
            cost,
            availability,
            pickupLocation,
            driverOption
        };

       
  
        try {
            const response = await fetch(`${URLROOT}/transport_suppliers/saveVehicleDetails`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(bookingData)
            });
    
            const data = await response.json();
    
            if (response.ok) {
                alert('Booking information saved successfully!');
                console.log('Booking saved in session:', data);
            } else {
                throw new Error(data.message || 'Something went wrong');
            }
        } catch (error) {
            console.error('Error saving booking:', error);
            alert('There was an error. Please try again.');
        }
    
        // Close the modal after submission
        closeBookingModal();
    });

    // Close modal when clicking outside the modal content
    window.addEventListener('click', (e) => {
        if (e.target === bookingModal) {
            closeBookingModal();
        }
    });
});