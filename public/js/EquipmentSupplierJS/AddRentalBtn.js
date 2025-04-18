document.addEventListener('DOMContentLoaded', function() {
    const addBtn = document.getElementById('addRentalBtn');
    const backBtn = document.getElementById('backBtn');
    const inventoryContainer = document.getElementById('inventoryContainer');
    const addRentalContainer = document.getElementById('addRentalContainer');


    addBtn.addEventListener('click', function() {
        inventoryContainer.style.display = 'none';
        addRentalContainer.style.display = 'flex';
    })

    backBtn.addEventListener('click', function() {
        inventoryContainer.style.display = 'flex';
        addRentalContainer.style.display = 'none';
    })
});