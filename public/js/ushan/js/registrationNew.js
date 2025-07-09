document.addEventListener('DOMContentLoaded', () => {
    const fullFormData = {};

    document.getElementById("step1-next-btn").addEventListener("click", () => {
        validateAndMoveToNextStep(1);
    });

    document.getElementById("step2-next-btn").addEventListener("click", () => {
        validateAndMoveToNextStep(2);
    });

    document.getElementById("step3-next-btn").addEventListener("click", async () => {
        const valid = await validateAndMoveToNextStep(3); // Step 3 validation and backend submission
        
    });

    document.querySelectorAll('.choose-btn').forEach(button => {
        button.addEventListener('click', (event) => {
            const plan = event.target.closest('.plan-card');
            const planId = plan.id; // The ID will tell us which plan was selected (free-plan, basic-plan, pro-plan)
            document.getElementById('selected-plan').value = planId; // Update the hidden input field
        });
    });


    async function validateAndMoveToNextStep(step) {
        console.log("Arrived at step :", step);
        let valid = true;
        const commonError1 = document.getElementById("step1-common-error");
        const commonError2 = document.getElementById("step2-common-error");

        
        // Collecting fields for each step
        const name = document.getElementById("name");
        const email = document.getElementById("email");
        const nic = document.getElementById("nic");
        const phone = document.getElementById("phone");
        const sptype = document.getElementById("sptype");
        const address = document.getElementById("address");
        const city = document.getElementById("city");
        const postalCode = document.getElementById("postalCode");
        
        // Reset all error messages
        resetErrors();

        if (step === 1) {
            // Step 1 Validation
            const isNameEmpty = name.value.trim() === "";
            const isEmailEmpty = email.value.trim() === "";
            const isNicEmpty = nic.value.trim() === "";
            const isPhoneEmpty = phone.value.trim() === "";
            const isTypeEmpty = sptype.value === "";
            const isAddressEmpty = sptype.value === "";


            if (isNameEmpty || isEmailEmpty || isNicEmpty || isPhoneEmpty || isTypeEmpty  || isAddressEmpty) {
                commonError1.textContent = "Please fill in all required fields.";
                valid = false;
            } else {
                // Validate email format
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email.value)) {
                    document.getElementById("email-error").textContent = "Enter a valid email.";
                    valid = false;
                }

                // Validate NIC
                const nicPattern = /^[0-9]{9}[vVxX]?$|^[0-9]{12}$/;
                if (!nicPattern.test(nic.value)) {
                    document.getElementById("nic-error").textContent = "Enter a valid NIC number.";
                    valid = false;
                }

                // Validate phone number
                const phonePattern = /^[0-9]{10}$/;
                if (!phonePattern.test(phone.value)) {
                    document.getElementById("phone-error").textContent = "Enter a valid 10-digit phone number.";
                    valid = false;
                }
                // Validate service type
                if (sptype.value === "") {
                    document.getElementById("sptype-error").textContent = "Please select a service type.";
                    valid = false;
                }
            }
        }

        if (step === 2) {
            // Step 2 Validation
            const regNum = document.getElementById("reg_num");
            const pdfFile = document.getElementById("pdfFile");
            const password = document.getElementById("password");
            const confirmPassword = document.getElementById("confirm_password");

            const isRegNumEmpty = regNum.value.trim() === "";
            const isPdfFileEmpty = pdfFile.value === "";
            const isPasswordEmpty = password.value.trim() === "";
            const isConfirmPasswordEmpty = confirmPassword.value.trim() === "";

            if (isRegNumEmpty || isPdfFileEmpty || isPasswordEmpty || isConfirmPasswordEmpty) {
                commonError2.textContent = "Please fill in all required fields.";
                valid = false;
            } else {
                if (password.value.length < 6) {
                    document.getElementById("password-error").textContent = "Password must be at least 6 characters.";
                    valid = false;
                }

                if (password.value !== confirmPassword.value) {
                    document.getElementById("confirm_password-error").textContent = "Passwords do not match.";
                    valid = false;
                }

                const pdfPattern = /\.pdf$/i;
                if (!pdfPattern.test(pdfFile.value)) {
                    document.getElementById("pdfFile-error").textContent = "Please upload a valid PDF file.";
                    valid = false;
                }
            }
        }
    
        if (step === 3) {
            const selectedPlan = document.getElementById("selected-plan").value;
            document.getElementById("subscription-error").textContent = "";
    
            if (!selectedPlan) {
                 document.getElementById("subscription-error").textContent = "Please select a subscription plan.";
                return false;
            }
    
            fullFormData.selectedPlan = selectedPlan;
    
            const finalResponse = await sendDataToBackend(fullFormData, step);
            console.log("Final Backend Response:", finalResponse);
    
            if (finalResponse.success) {
                console.log("Registration successful!");
                alert("Registration successful!");
                window.location.href = URLROOT + "/ServiceProvider/login";
                 return true;
            } else {
                handleBackendErrors(finalResponse.errors);
                return false;
            }
        }
        
        // If validation passed, send data to backend
        if (valid) {
            const stepData = collectFormData(step);
            const backendResponse = await sendDataToBackend(stepData, step);
    
            console.log("Backend Response: ", backendResponse);
            if (backendResponse.success) {
                Object.assign(fullFormData, stepData);
                console.log("Full data so far :", fullFormData);
    
                if (step === 1) {
                    document.getElementById("step-1").style.display = "none";
                    document.getElementById("step-2").style.display = "block";
                } else if (step === 2) {
                    document.getElementById("step-2").style.display = "none";
                    document.getElementById("step-3").style.display = "block";
                }
            } else {
                handleBackendErrors(backendResponse.errors);
            }
        }
    }

    // Function to collect form data for the current step
    function collectFormData(step) {
        const name = document.getElementById("name");
        const email = document.getElementById("email");
        const nic = document.getElementById("nic");
        const phone = document.getElementById("phone");
        const sptype = document.getElementById("sptype");
        const address = document.getElementById("address");
        const regNum = document.getElementById("reg_num");
        const pdfFile = document.getElementById("pdfFile");
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirm_password");
        const selectedPlan = document.getElementById("selected-plan");

        let formData = {};

        if (step === 1) {
            formData = {
                name: name.value,
                email: email.value,
                nic: nic.value,
                phone: phone.value,
                sptype: sptype.value,
                address: address.value
            };
        } else if (step === 2) {
            formData = {
                reg_num: regNum.value,
                pdfFile: pdfFile.files[0],
                password: password.value,
                confirm_password: confirmPassword.value
            };
        }else if (step === 3) {
            formData = {
                selectedPlan: selectedPlan.value
            };
        }

        return formData;
    }

    // Function to send form data to backend
    async function sendDataToBackend(formData, step) {
        
        try {
            if(step === 3){
                const finalFormData = new FormData();
                for (const key in formData) {
                    if (key === "pdfFile" && formData[key] instanceof File) {
                        finalFormData.append(key, formData[key]);
                    } else {
                        finalFormData.append(key, formData[key]);
                    }
                }

                console.log("sending data to database...............");

                const response = await fetch(URLROOT + "/ServiceProvider/registerUpdated", {
                    method: 'POST',
                    body: finalFormData,
                });
    
                const data = await response.json();
                return data;
            }
            else{
                const payload = {
                    step: step,
                    ...formData
                };

                console.log("Sending data : ", payload);
                
                const response = await fetch(URLROOT + "/ServiceProvider/validationNew", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(payload),
                });

                const data = await response.json();
                return data;
            }
        } catch (error) {
            console.error("Error sending data to backend:", error);
            return { success: false, errors: { common: "An error occurred while submitting the data." } };
        }
    
    }

    // Function to handle backend errors and display them
    function handleBackendErrors(errors) {
        if (errors.email) {
            document.getElementById("email-error").textContent = errors.email;
        }
        if (errors.nic) {
            document.getElementById("nic-error").textContent = errors.nic;
        }
        if (errors.phone) {
            document.getElementById("phone-error").textContent = errors.phone;
        }
        if (errors.address) {
            document.getElementById("address-error").textContent = errors.address;
        }
        if (errors.city) {
            document.getElementById("city-error").textContent = errors.city;
        }
        if (errors.postalCode) {
            document.getElementById("postalCode-error").textContent = errors.postalCode;
        }
        if (errors.common1) {
            document.getElementById("step1-common-error").textContent = errors.common1;
        }
        if (errors.common2) {
            document.getElementById("step2-common-error").textContent = errors.common2;
        }
    }

    // Reset all error messages
    function resetErrors() {

        document.getElementById("name-error").textContent = "";
        document.getElementById("email-error").textContent = "";
        document.getElementById("nic-error").textContent = "";
        document.getElementById("phone-error").textContent = "";
        document.getElementById("sptype-error").textContent = "";
        document.getElementById("address-error").textContent = "";
        document.getElementById("reg_num-error").textContent = "";
        document.getElementById("pdfFile-error").textContent = "";
        document.getElementById("password-error").textContent = "";
        document.getElementById("confirm_password-error").textContent = "";
        document.getElementById("step2-common-error").textContent = "";

    }

});