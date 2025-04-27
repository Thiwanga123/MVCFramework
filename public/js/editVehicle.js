document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('editVehicleModal');
<<<<<<< HEAD
    const closeModal = document.getElementById('vehcileCloseModal');
    const box = document.querySelector('.box');
    const openEditModal = document.querySelectorAll('.vehicle-edit-btn'); // Select all buttons with the class 'view-btn'
=======
    const closeModal = document.getElementById('vehicleCloseModal');
    const box = document.querySelector('.box');
    const openEditModal = document.querySelectorAll('.vehicle-edit-btn');
>>>>>>> b6fa791 (new)


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
<<<<<<< HEAD
=======
            const vehicleCost = button.getAttribute('vehicleCost');
            const vehicleLocation = button.getAttribute('vehicleLocation');
            const driver = button.getAttribute('driver');
>>>>>>> b6fa791 (new)
            const availability = button.getAttribute('availability');
            const id = button.getAttribute('vid');
            const seating_capacity = button.getAttribute('seating_capacity');

<<<<<<< HEAD
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
=======

            console.log(vehicleType, vehicleMake, vehicleModel, licensePlateNumber, vehicleRate, fuelType, description, vehicleCost, vehicleLocation, driver, availability, id, seating_capacity,);

            // Set input values
            modal.querySelector('#vehicleType').value = vehicleType;
            modal.querySelector('#vehicleMake').value = vehicleMake;
            modal.querySelector('#vehicleModel').value = vehicleModel;
            modal.querySelector('#licensePlateNumber').value = licensePlateNumber;
            modal.querySelector('#vehicleRate').value = vehicleRate;
            modal.querySelector('#fuelType').value = fuelType;
            modal.querySelector('#description').value = description;
            modal.querySelector('#vehicleCost').value = vehicleCost;
            modal.querySelector('#vehicleLocation').value = vehicleLocation;
            modal.querySelector('#vehicleId').value = id;
            modal.querySelector('#seating_capacity').value = seating_capacity;


            // Set driver radio buttons
            const driverRadios = modal.querySelectorAll('input[name="driver"]');
            driverRadios.forEach(radio => {
                radio.checked = radio.value === driver;
            });

            // Set availability radio buttons
            const availabilityRadios = modal.querySelectorAll('input[name="availability"]');
            availabilityRadios.forEach(radio => {
                radio.checked = radio.value === availability;
            });
>>>>>>> b6fa791 (new)

            box.classList.add('blur');
            modal.classList.add('active'); 
            
                    
        });
    });

    closeModal.addEventListener('click', () => {
        box.classList.remove('blur');
        modal.classList.remove('active');
<<<<<<< HEAD
=======

        // Clear input values
>>>>>>> b6fa791 (new)
        document.querySelector('#vehicleType').value = '';
        document.querySelector('#vehicleMake').value = '';
        document.querySelector('#vehicleMake').value = '';
        document.querySelector('#licensePlateNumber').value = '';
        document.querySelector('#vehicleRate').value = '';
        document.querySelector('#fuelType').value = '';
        document.querySelector('#description').value = '';
<<<<<<< HEAD
=======
        document.querySelector('#vehicleCost').value = '';
        document.querySelector('#vehicleLocation').value = '';
        document.querySelector('#vehicleId').value = '';
        document.querySelector('#seating_capacity').value = '';


        // Clear radio selections
        document.querySelectorAll('input[name="driver"]').forEach(radio => {
            radio.checked = false;
        });

        document.querySelectorAll('input[name="availability"]').forEach(radio => {
            radio.checked = false;
        });
>>>>>>> b6fa791 (new)
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
<<<<<<< HEAD
}

    
});
=======
    }
});
>>>>>>> b6fa791 (new)
