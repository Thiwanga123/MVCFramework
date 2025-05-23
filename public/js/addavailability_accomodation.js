
document.addEventListener('DOMContentLoaded', () => {

        const modal = document.getElementById('addaccModal');
        const openModalBtn = document.getElementById('add-acc-btn');
        const closeModal = document.getElementById('closeModal');
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

        document.getElementById("addaccForm").onsubmit = function(e) {
                modal.classList.remove("active");
                box.classList.remove("blur");
        }


});