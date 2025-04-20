document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('editVehicleModal');
    const closeModal = document.getElementById('vehicleCloseModal'); // Corrected typo
    const box = document.querySelector('.box');
    const openEditModal = document.querySelectorAll('.vehicle-edit-btn'); // Select all buttons with the class 'vehicle-edit-btn'

    openEditModal.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const vehicleType = button.getAttribute('vehicleType'); 
            const vehicleMake = button.getAttribute('vehicleMake'); 
            const vehicleModel = button.getAttribute('vehicleModel'); 
            const licensePlateNumber = button.getAttribute('licensePlateNumber');
            const vehicleRate = button.getAttribute('vehicleRate');
            const fuelType = button.getAttribute('fuelType');
            const description = button.getAttribute('description');   
            const vehicleCost = button.getAttribute('vehicleCost');
            const vehicleLocation = button.getAttribute('vehicleLocation');
           
            const id = button.getAttribute('vid');

            console.log(vehicleType, vehicleMake, vehicleModel, licensePlateNumber, vehicleRate, fuelType, description,vehicleCost,vehicleLocation,vehicleId,);

            const modalvehicleType = modal.querySelector('#vehicleType');
            const modalvehicleMake = modal.querySelector('#vehicleMake');
            const modalvehicleModel = modal.querySelector('#vehicleModel');
            const modallicensePlateNumber = modal.querySelector('#licensePlateNumber');
            const modalvehicleRate = modal.querySelector('#vehicleRate');
            const modalfuelType = modal.querySelector('#fuelType');
            const modaldescription = modal.querySelector('#description');
            const modalvehicleCost = modal.querySelector('#vehicleCost');
            const modalvehicleLocation = modal.querySelector('#vehicleLocation');
            const modalId = modal.querySelector('#vehicleId');

            modalvehicleType.value = vehicleType;
            modalvehicleMake.value = vehicleMake;
            modalvehicleModel.value = vehicleModel;
            modallicensePlateNumber.value = licensePlateNumber;
            modalvehicleRate.value = vehicleRate;
            modalfuelType.value = fuelType;
            modaldescription.value = description;
            modalvehicleCost.value = vehicleCost;
            modalvehicleLocation.value = vehicleLocation;
          
            modalId.value = id;

            box.classList.add('blur');
            modal.classList.add('active');         
        });
    });

    closeModal.addEventListener('click', () => {
        box.classList.remove('blur');
        modal.classList.remove('active');
        // Reset all form fields when modal is closed
        document.querySelector('#vehicleType').value = '';
        document.querySelector('#vehicleMake').value = '';
        document.querySelector('#vehicleModel').value = '';
        document.querySelector('#licensePlateNumber').value = '';
        document.querySelector('#vehicleRate').value = '';
        document.querySelector('#fuelType').value = '';
        document.querySelector('#description').value = '';
        document.querySelector('#vehicleCost').value = '';
        document.querySelector('#vehicleLocation').value = '';
       
        document.querySelector('#vehicleId').value = ''; // Reset vehicle ID as well
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

