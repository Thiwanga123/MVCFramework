    document.addEventListener('DOMContentLoaded', function() {
        const locationInput = document.getElementById('location');
        const startDateInput = document.getElementById('startDate');
        const endDateInput = document.getElementById('endDate');
    
        const today = new Date().toISOString().split('T')[0];
        startDateInput.setAttribute('min', today);
    
        startDateInput.addEventListener('change', function() {
            endDateInput.setAttribute('min', this.value);
        });



        tripForm.addEventListener('submit', function(e) {
            clearErrorMessage();
            e.preventDefault(); // Prevent form submission for validation

    
      
        
        document.getElementById('submitButton').addEventListener('click', function() {

            const location = document.getElementById('location').value;
            const startDate = startDateInput.value;
            const endDate = endDateInput.value;
    
            if (location === '' || startDate === '' || endDate === '') {
                alert('Please fill all fields');
            } else if (new Date(startDate) < new Date(today)) {
                alert('Start date cannot be in the past');
            } else if (new Date(endDate) < new Date(startDate)) {
                alert('End date cannot be before the start date');
            } else {
                const data = {
                    location: location,
                    startDate: startDate,
                    endDate: endDate
                };


                // Check if latitude and longitude are valid
                if (lat !== null && lng !== null) {
                    // If both lat and lng are available, save the data in localStorage
                    localStorage.setItem('data', JSON.stringify(data));
                    tripForm.submit(); // Submit the form
                } else {
                    // If lat and lng are null, handle the error (maybe show a message to the user)
                    alert("Unable to get geographical coordinates for the location. Please select a valid place.");
                }
    
                localStorage.setItem('data', JSON.stringify(data));
                window.location.href = redirectUrl;

            }
        });
    });
