document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('editVehicleModal');
    const closeModal = document.getElementById('vehicleCloseModal');
    const box = document.querySelector('.box');
    const openEditModal = document.querySelectorAll('.vehicle-edit-btn');

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
            const driver = button.getAttribute('driver');
            const availability = button.getAttribute('availability');
            const id = button.getAttribute('vid');
            const seating_capacity = button.getAttribute('seating_capacity');


            console.log(vehicleType, vehicleMake, vehicleModel, licensePlateNumber, vehicleRate, fuelType, description, vehicleCost, vehicleLocation, driver, availability, id, seating_capacity);

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

            box.classList.add('blur');
            modal.classList.add('active');         
        });
    });

    closeModal.addEventListener('click', () => {
        box.classList.remove('blur');
        modal.classList.remove('active');

        // Clear input values
        document.querySelector('#vehicleType').value = '';
        document.querySelector('#vehicleMake').value = '';
        document.querySelector('#vehicleModel').value = '';
        document.querySelector('#licensePlateNumber').value = '';
        document.querySelector('#vehicleRate').value = '';
        document.querySelector('#fuelType').value = '';
        document.querySelector('#description').value = '';
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