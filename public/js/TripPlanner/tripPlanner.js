    document.addEventListener('DOMContentLoaded', function() {
        const locationInput = document.getElementById('location');
        const startDateInput = document.getElementById('startDate');
        const endDateInput = document.getElementById('endDate');
    
        const today = new Date().toISOString().split('T')[0];
        startDateInput.setAttribute('min', today);
    
        startDateInput.addEventListener('change', function() {
            endDateInput.setAttribute('min', this.value);
        });
    
        if(locationInput){
            const autoComplete = new google.maps.places.AutoComplete(locationInput, {
                componentRestrictions : {country : 'LK'}
            });  
        }
        
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
    
                localStorage.setItem('data', JSON.stringify(data));
                window.location.href = redirectUrl;
            }
        });
    });
