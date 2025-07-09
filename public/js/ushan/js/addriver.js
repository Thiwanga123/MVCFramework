document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('addDriverModal'); // Changed to Driver Modal
    const openModalBtn = document.getElementById('driver-add-btn'); // Updated button ID
    const closeModal = document.getElementById('closeDriverModal'); // Updated close button ID
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

    document.getElementById("addDriverForm").onsubmit = function(e) { // Updated form ID
        modal.classList.remove("active");
        box.classList.remove("blur");
    }

});
