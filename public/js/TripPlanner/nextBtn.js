document.addEventListener("DOMContentLoaded", () => {
    const nextBtn = document.getElementById("nextButton");
    
    nextBtn.addEventListener("click", function (e) {
        e.preventDefault();
        console.log("Next button clicked"); // Debugging line

        const storedData = localStorage.getItem("data");

        if (storedData) {
            const locationData = JSON.parse(storedData);
            const { latitude, longitude } = locationData;

            if (latitude && longitude) {
                const url = `${urlRoot}/users/planaccomodation?lat=${latitude}&lon=${longitude}`;                
                window.location.href = url;
            } else {
                alert("Missing coordinates in trip data.");
            }
        } else {
            alert("No trip location data found in localStorage.");
        }
    });
});