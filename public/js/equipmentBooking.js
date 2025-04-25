document.addEventListener("DOMContentLoaded", function(){ 

    const form = document.getElementById("bookingForm");
    const submitButton = document.getElementById("booknow");

    const totalPriceContainer = document.getElementById("totalPriceContainer");
    const totalPriceElement = document.getElementById("totalPrice");
    const totalDaysElement = document.getElementById("totalDays");
    const pricePerDay = parseFloat(document.querySelector('input[name="price"]').value);
    const errorMessage = document.getElementById("errorMessageContainer");

    const startDateInput = document.getElementById("booking_start_date");
    const endDateInput = document.getElementById("booking_end_date");
    
    let totalPrice = null;

    startDateInput.addEventListener('change', updateTotalPrice);
    
    endDateInput.addEventListener('change', updateTotalPrice);

    submitButton.addEventListener("click", async function(event) {
        event.preventDefault();
        if(validateDates(startDateInput.value, endDateInput.value)){
            const formData = new FormData(form);
            formData.append("totalPrice", totalPrice);
            for (const [key, value] of formData.entries()) {
                console.log(key + ": " + value);
            }
            
            try {
                const response = await fetch(`${URLROOT}/booking/addEquipmentBooking`, {
                    method: "POST",
                    body: formData,
                });
            
                let resultText;
            
                if (response.ok) {
                    const contentType = response.headers.get("content-type");
                    
                    if (contentType && contentType.includes("application/json")) {
                        const result = await response.json();
                        console.log("JSON Response:", result);
            
                        resultText = result.message || "Booking Successful!";
            
                        if (result.success) {
                            showSuccessModal(resultText);
                        } else {
                            showErrorModal(resultText);
                        }
                    } else {
                        resultText = await response.text();
                        console.log("Response Text:", resultText);
                        showErrorModal("Non-JSON response received.");
                    }
                } else {
                    const errorResponse = await response.text();
                    console.log("Error Response:", errorResponse);
                    showErrorModal("Booking Failed! Please try again.");
                }
            } catch (error) {
                console.error("Error:", error);
                showErrorModal("An error occurred while processing your request. Please try again later.");
            }
        }
    });

    function validateDates(startDate, endDate){
        if(!startDate || !endDate) {
            errorMessage.textContent = "Please select both start and end dates.";
            errorMessage.style.display = "flex";
            errorMessage.style.opacity = "1";
            return false;
        }

        if(startDate > endDate) {
            errorMessage.textContent = "Start date cannot be later than end date.";
            errorMessage.style.display = "flex";
            errorMessage.style.opacity = "1";

            return false;
        }

        const currentDate = new Date();

        if(startDate < currentDate) {
            errorMessage.textContent = "Please select a valid date.";
            errorMessage.style.display = "flex";
            errorMessage.style.opacity = "1";

            return false;
        }

        for(let i = 0; i < bookings.length; i++){
            const bookingStart = new Date(bookings[i].start_date);
            const bookingEnd = new Date(bookings[i].end_date);

            if((new Date(startDate)) <= bookingEnd && (new Date(endDate)) >= bookingStart) {
                errorMessage.textContent = "Already booked for the selected dates. Please choose another date.";
                errorMessage.style.display = "flex";
                errorMessage.style.opacity = "1";

                return false;
            }
        }

        return true;
    }

    function updateTotalPrice() {
        const startDate = startDateInput.value;
        const endDate = endDateInput.value;

        errorMessage.textContent = "";
        errorMessage.style.display = "none";

        if (startDate && endDate && validateDates(startDate, endDate)) {
            const startDateObj = new Date(startDate);
            const endDateObj = new Date(endDate);

            const totalDays = calculateDays(startDateObj, endDateObj);
            totalPrice = totalDays * pricePerDay;

            totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
            totalDaysElement.textContent = `${totalDays} day(s)`;
            
            totalPriceContainer.style.display = 'flex';
        } else {
            totalPriceContainer.style.display = 'none';
        }
    }

    function calculateDays(startDate, endDate) {
        const timeDifference = endDate - startDate; 
        const days = timeDifference / (1000 * 3600 * 24); 
        return days + 1;  
    }

    function showSuccessModal(message) {
        const modal = document.getElementById("responseSuccessModal");
        const modalMessage = document.getElementById("successModalMessage");
        const closeModal = document.getElementById("closeSuccessModal");
    
        modalMessage.textContent = message;
        modal.style.display = "flex";
    
        closeModal.onclick = function () {
            modal.style.display = "none";
        };
    
        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
    }

    function showErrorModal(message) {
        const modal = document.getElementById("responseErrorModal");
        const modalMessage = document.getElementById("errorModalMessage");
        const closeModal = document.getElementById("closeErrorModal");
    
        modalMessage.textContent = message;
        modal.style.display = "flex";
    
        closeModal.onclick = function () {
            modal.style.display = "none";
        };
    
        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };  
    }
});

