
document.addEventListener('DOMContentLoaded', () => {
    const driverContainer = document.getElementById('driverContainer');
    const driverAddContainer = document.getElementById('vehicleAddContainer');
    const addDriverBtn = document.getElementById('driver-add-btn');

    addDriverBtn.addEventListener('click', function () {
        driverContainer.style.display = "none";
        driverAddContainer.style.display = "flex"; // Or block, depending on your CSS
    });

    document.getElementById("addVehicleForm").onsubmit = function (e) {
        // Add success logic here if needed
        driverAddContainer.style.display = "none";
        driverContainer.style.display = "flex";
    };

    
});