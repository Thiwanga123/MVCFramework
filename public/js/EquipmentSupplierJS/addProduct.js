
document.addEventListener('DOMContentLoaded', () => {
    const addRentalForm = document.getElementById("addRentalForm");
    const returnPolicySelect = document.getElementById('returnPolicy');
    const fullRefundSection = document.getElementById('fullRefundSection');
    const partialRefundSection = document.getElementById('partialRefundSection');

    function toggleRefundSections() {
        const selectedValue = returnPolicySelect.value;

        if (selectedValue === 'fullRefund') {
            fullRefundSection.style.display = 'block';
            partialRefundSection.style.display = 'none';
        } else if (selectedValue === 'partialRefund') {
            fullRefundSection.style.display = 'none';
            partialRefundSection.style.display = 'block';
        } else if (selectedValue === 'bothRefunds') {
            fullRefundSection.style.display = 'block';
            partialRefundSection.style.display = 'block';
        } else {
            fullRefundSection.style.display = 'none';
            partialRefundSection.style.display = 'none';
        }
    }

    // Initial toggle when the page loads
    toggleRefundSections();

    // Change event listener
    returnPolicySelect.addEventListener('change', toggleRefundSections);
    
    addRentalForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission
    
        if (validateForm(event)) {
            console.log("Form is valid, sending data to server...");
            const formData = new FormData(addRentalForm);
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`);
            } // Debugging log
            sendDataToServer(formData);  
        } else {
            console.log("Form is invalid, preventing submission...");
        }
    });
    

        function validateForm(event){
            console.log("Validating form...");

            let valid = true;
            cleanErrors();

            const name = document.getElementById("rentalName").value;
            const rentalType = document.getElementById("rentalType").value;
            const price = document.getElementById("pricePerDay").value;
            const maxRentalPeriod = document.getElementById("maximumRentalPeriod").value;
            const deliveryAvailableElement = document.querySelector('input[name="deliveryAvailable"]:checked');
            const deliveryAvailable = deliveryAvailableElement ? deliveryAvailableElement.value : null;

            const description = document.getElementById("rentalDescription").value;
            const returnPolicy = document.getElementById("returnPolicy").value;
            const damagePolicy = document.getElementById("damagePolicy").value;
            const files = document.getElementById("image").files;

            if (!name.trim()) {
                showError("rentalName", "Rental name is required.");
                valid = false;
            }

            if (!rentalType.trim()) {
                showError("rentalType", "Rental type is required.");
                valid = false;
            }
    
            if (!price.trim() || isNaN(price)|| price <= 0) {
                showError("pricePerDay", "Price per day must be greater than zero.");
                valid = false;
            }
    
            if (description.trim().length === 0) {
                showError("rentalDescription", "Description is required.");
                valid = false;
            }
    
            if (files.length === 0) {
                showError("image", "Please select at least one image.");
                valid = false;
            } else if (files.length > 6) {
                showError("image", "You can upload up to 6 images.");
                valid = false;
            }

            if (!returnPolicy) {
                showError("returnPolicy", "Return policy is required.");
                valid = false;
            }

            if(returnPolicy === "fullRefund"){
                const fullRefundDays = document.getElementById("fullRefundTime").value;  

                if (!fullRefundDays) {
                    showError("fullRefundTime", "Full refund cancel time is required.");
                    valid = false;
                }  
            }else if(returnPolicy === "partialRefund"){
                const partialRefundDays = document.getElementById("partialRefundTime").value;
                const partialRefundPercentage = document.getElementById("partialRefundPercentage").value;

                if (!partialRefundDays) {
                    showError("partialRefundTime", "Partial refund cancel time is required.");
                    valid = false;
                }
    
                if (!partialRefundPercentage || partialRefundPercentage <= 0 || partialRefundPercentage > 100) {
                    showError("partialRefundPercentage", "Partial refund percentage must be between 1 and 100.");
                    valid = false;
                }
            }else if(returnPolicy === "bothRefunds"){
                const fullRefundDays = document.getElementById("fullRefundTime").value;
                const partialRefundDays = document.getElementById("partialRefundTime").value;
                const partialRefundPercentage = document.getElementById("partialRefundPercentage").value;

                if (!fullRefundDays) {
                    showError("fullRefundTime", "Full refund cancel time is required.");
                    valid = false;
                }
    
                if (!partialRefundDays) {
                    showError("partialRefundTime", "Partial refund cancel time is required.");
                    valid = false;
                }

                if (partialRefundDays && fullRefundDays) {
                    const partialDays = parseInt(partialRefundDays);
                    const fullDays = parseInt(fullRefundDays);
                
                    if (!isNaN(partialDays) && !isNaN(fullDays) && partialDays >= fullDays) {
                        showError("partialRefundTime", "Partial refund cancel time must be less than full refund cancel time.");
                        valid = false;
                    }
                }
    
                if (!partialRefundPercentage || partialRefundPercentage <= 0 || partialRefundPercentage > 100) {
                    showError("partialRefundPercentage", "Partial refund percentage must be between 1% and 100%");
                    valid = false;
                }

            }


            if (!maxRentalPeriod.trim() || isNaN(maxRentalPeriod) || maxRentalPeriod <= 0) {
                showError("maximumRentalPeriod", "Maximum rental period must be a positive number.");
                valid = false;
            }
    
            if (!damagePolicy.trim()) {
                showError("damagePolicy", "Damage policy is required.");
                valid = false;
            }

        return valid
        }

        function showError(fieldId, message) {
            const errorSpan = document.getElementById(fieldId + "-error");
            console.log(`Setting error for: ${fieldId}`);  // Debugging log
            console.log(errorSpan); 
            if (errorSpan) {
                errorSpan.textContent = message;
                errorSpan.style.display = "block"; // Ensure it's visible
            } else {
                console.error(`Error span not found for ${fieldId}`);
            }
        }

        function cleanErrors(fieldId) {
            const errorSpan = document.getElementById(fieldId + "-error");
            if (errorSpan) {
                errorSpan.textContent = "";
                errorSpan.style.display = "none";
            }
        }

        async function sendDataToServer(formData){

            const submitButton = document.querySelector("#addRentalForm button[type='submit']");

            try{
                const response = await fetch(`${URLROOT}/product/addProduct`, {
                    method: "POST",
                    body: formData
                });

                console.log("Server response:", response);
                if(!response.ok){
                    console.log("Failed to send data to server.");
                    throw new Error("Failed to send data to server.");
                }

                const responseData = await response.json();
                console.log('Server response:', responseData);

                if(responseData.status === 'success'){
                    const successModal = document.getElementById("successModalContainer");
                    const box = document.getElementById("box");
                    successModal.classList.add("active");
                    box.classList.add("blur");

                    const okBtn = document.getElementById("okBtn");
                    okBtn.onclick = () => {
                        successModal.classList.remove("active"); 
                        box.classList.remove("blur");
                    };
                }

                return responseData;
            }catch(error){
                console.error("Error sending data to server: ", error);
            }
        }
        

});

