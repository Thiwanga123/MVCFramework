document.addEventListener('DOMContentLoaded', function () {
    // Get all "Book" buttons
    const bookButtons = document.querySelectorAll('.book-equipment-button');
    const modal = document.getElementById('confirmationModal');
    const calculatedPriceSpan = document.getElementById('calculatedPrice');
    const cancelBtn = document.getElementById('cancelBooking');
    const confirmBtn = document.getElementById('confirmBooking');
    
    // Get the start and end date values
    const startDateInput = document.getElementById('sDate');
    const endDateInput = document.getElementById('eDate');
    
    let selectedEquipment = null;

    // Function to calculate the price based on dates and price per day
    function calculatePrice(startDate, endDate, pricePerDay) {
        const start = new Date(startDate);
        const end = new Date(endDate);
        const timeDiff = end - start;
        const days = timeDiff / (1000 * 3600 * 24); // Convert time difference to days
        if (days < 1) {
            alert("End date must be later than start date.");
            return 0; // Invalid date range
        }
        return days * pricePerDay; // Return the total price
    }

    // Open the modal when "Book" is clicked
    bookButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Get the equipment details
            const pricePerDay = parseFloat(button.getAttribute('data-price-per-day'));
            const equipmentId = button.getAttribute('data-id');
            const supplierId = button.getAttribute('data-supplier-id');
            
            // Get the selected dates
            const startDate = startDateInput.value;
            const endDate = endDateInput.value;

            // Calculate the price
            if (startDate && endDate) {
                const totalPrice = calculatePrice(startDate, endDate, pricePerDay);
                if (totalPrice > 0) {
                    calculatedPriceSpan.textContent = totalPrice.toFixed(2); // Display the price in the modal
                } else {
                    return; // Do not proceed if price calculation is invalid (invalid date range)
                }
            } else {
                alert('Please select both start and end dates.');
                return;
            }


            // Show the modal
            modal.style.display = 'flex';
            selectedEquipment = { id: equipmentId, pricePerDay: pricePerDay, totalPrice: calculatedPriceSpan.textContent, supplierId }; // Save selected equipment info

        });
    });

    // Cancel the booking
    cancelBtn.addEventListener('click', function () {
        modal.style.display = 'none'; // Close the modal
        selectedEquipment = null; // Reset the selected equipment
    });

    // Confirm the booking
    confirmBtn.addEventListener('click', async function () {
        if (selectedEquipment) {
            const equipmentId = selectedEquipment.id;
            const startDate = startDateInput.value;
            const endDate = endDateInput.value;
            const totalPrice = selectedEquipment.totalPrice;
            const supplierId = selectedEquipment.supplierId; // Get the supplier ID

            // Prepare the data to send to the backend
            const bookingData = {
                equipmentId: equipmentId,
                startDate: startDate,
                endDate: endDate,
                totalPrice: totalPrice,
                supplierId: supplierId
            };

            try {
                // Send data to the server via AJAX (fetch API)
                const response = await fetch(`${URLROOT}/booking/saveEquipmentBooking`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json', // Set the content type as JSON
                    },
                    body: JSON.stringify(bookingData) // Convert the JavaScript object to JSON
                });

                const data = await response.json(); // Parse the JSON response

                if (data.success) {
                    // If booking is successful, you can display a confirmation message
                    alert('Booking confirmed for equipment ID: ' + equipmentId + '\nPrice: Rs. ' + totalPrice);
                    modal.style.display = 'none'; // Close the modal
                    selectedEquipment = null; // Reset the selected equipment
                } else {
                    alert('Error booking equipment: ' + data.message);
                }
            } catch (error) {
                // Handle any errors that occur during the fetch
                console.error('Error:', error);
                alert('An error occurred while booking the equipment.');
            }
        }
    });
});