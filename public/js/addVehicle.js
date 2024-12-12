
document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('addVehicleModal');
<<<<<<< HEAD
    const openModalBtn = document.getElementById('add-btn');
=======
    const openModalBtn = document.getElementById('vehicle-add-btn');
>>>>>>> origin/main
    const closeModal = document.getElementById('closeModal')
    const box = document.getElementById('box');

    openModalBtn.addEventListener('click', () => {
            modal.style.display = 'block';
            box.classList.add('blur');
            modal.classList.add('active');  
    });

    closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
            box.classList.remove('blur');
            modal.classList.remove('active');
            
    });

    window.onclick = function(event) {
            if (event.target == modal) {
                    modal.classList.remove("active");
                    box.classList.remove("blur"); 
    }
    }

    document.getElementById("addVehicleForm").onsubmit = function(e) {
            modal.classList.remove("active");
            box.classList.remove("blur");
    }

});