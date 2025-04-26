document.addEventListener('DOMContentLoaded', () => {
    const bookingModal = document.getElementById('bookingGuiderModal');
    const closeButton = document.querySelector('#bookingGuiderModal .close-btnn');
    const cancelButton = document.querySelector('#bookingGuiderModal .cancel-btn');
    const bookButtons = document.querySelectorAll('.book-guider-button'); // Add class to your "Book" buttons

    // Function to open the modal and store the guider ID
    function openBookingModal(guiderId) {
        const form = document.getElementById('bookingForm');
        form.dataset.guiderId = guiderId;
        bookingModal.style.display = 'flex';
    }

    // Attach open event to all book buttons
    bookButtons.forEach(button => {
        button.addEventListener('click', () => {
            const guiderId = button.dataset.guiderId;
            openBookingModal(guiderId);
        });
    });

    // Close modal functions
    function closeBookingModal() {
        bookingModal.style.display = 'none';
        document.getElementById('bookingForm').reset();
    }

    closeButton.addEventListener('click', closeBookingModal);
    cancelButton.addEventListener('click', closeBookingModal);
    window.addEventListener('click', (e) => {
        if (e.target === bookingModal) {
            closeBookingModal();
        }
    });

    // Form submission
    document.getElementById('bookingForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const pickupLocation = document.getElementById('pickupLocation').value;
        const destination = document.getElementById('destination').value;
        const guiderId = e.target.dataset.guiderId;

        if (!pickupLocation || !destination) {
            alert('Please fill in all fields');
            return;
        }

        const bookingData = {
            guiderId,
            pickupLocation,
            destination
        };


        try {
            const response = await fetch(`${URLROOT}/tour_guides/saveGuiderBooking`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(bookingData)
            });

            const result = await response.json();

            if (response.ok) {
                alert('Booking details saved successfully!');
                console.log('Session data:', result);
                closeBookingModal();
            } else {
                throw new Error(result.message || 'Error saving booking');
            }
        } catch (error) {
            console.error(error);
            alert('Something went wrong. Please try again.');
        }
    });
});