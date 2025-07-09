
document.addEventListener('DOMContentLoaded', () => {

        const vehicleContainer = document.getElementById('vehicleContainer');
        const addVehicleContainer = document.getElementById('vehicleAddContainer');
        const addBtn = document.getElementById('vehicle-add-btn');

        addBtn.addEventListener('click', function(){
                vehicleContainer.style.display = "none";
                addVehicleContainer.style.display = "flex";
        })



    document.getElementById("addVehicleForm").onsubmit = function(e) {
            modal.classList.remove("active");
            box.classList.remove("blur");
    }

});