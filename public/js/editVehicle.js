document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('editVehicleModal');
    const closeModal = document.getElementById('vehcileCloseModal');
    const box = document.querySelector('.box');
    const openEditModal = document.querySelectorAll('.vehicle-edit-btn'); // Select all buttons with the class 'view-btn'


    openEditModal.forEach(button =>{
        button.addEventListener('click',function(e){
            e.preventDefault();
            

            const vehicleType = button.getAttribute('vehicleType'); 
            const vehicleMake = button.getAttribute('vehicleMake'); 
            const vehicleModel = button.getAttribute('vehicleModel'); 
            const licensePlateNumber = button.getAttribute('licensePlateNumber');
            const vehicleRate = button.getAttribute('vehicleRate');
            const fuelType = button.getAttribute('fuelType');
            const description = button.getAttribute('description');   
            const availability = button.getAttribute('availability');
            const id = button.getAttribute('vid');

            console.log(vehicleType,vehicleMake,vehicleModel,licensePlateNumber,vehicleRate,fuelType,description,availability);

            const modalvehicleType = modal.querySelector('#vehicleType');
            const modalvehicleMake = modal.querySelector('#vehicleMake');
            const modalvehicleModel = modal.querySelector('#vehicleModel');
            const modallicensePlateNumber = modal.querySelector('#licensePlateNumber');
            const modalvehicleRate = modal.querySelector('#vehicleRate');
            const modalfuelType = modal.querySelector('#fuelType');
            const modaldescription = modal.querySelector('#description');
            const modalId = modal.querySelector('#vehicleId');
    
            modalvehicleType.value = vehicleType;
            modalvehicleMake.value = vehicleMake;
            modalvehicleModel.value = vehicleModel;
            modallicensePlateNumber.value = licensePlateNumber;
            modalvehicleRate.value = vehicleRate;
            modalfuelType.value = fuelType;
            modaldescription.value = description;
            modalId.value = id;

            box.classList.add('blur');
            modal.classList.add('active'); 
            
                    
        });
    });

    closeModal.addEventListener('click', () => {
        box.classList.remove('blur');
        modal.classList.remove('active');
        document.querySelector('#vehicleType').value = '';
        document.querySelector('#vehicleMake').value = '';
        document.querySelector('#vehicleMake').value = '';
        document.querySelector('#licensePlateNumber').value = '';
        document.querySelector('#vehicleRate').value = '';
        document.querySelector('#fuelType').value = '';
        document.querySelector('#description').value = '';
    });

    window.onclick = function(event) {
        if (event.target == modal) {
                modal.classList.remove("active");
                box.classList.remove("blur"); 
        }
    }
    
    document.getElementById("editVehicleForm").onsubmit = function(e){
        modal.classList.remove("active");
        box.classList.remove("blur");
}

    
});