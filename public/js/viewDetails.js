document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('viewDetailsModal');
        const closeModal = document.getElementById('closeModal');
        const box = document.querySelector('.box');
        const openModalBtns = document.querySelectorAll('.view-btn'); // Select all buttons with the class 'view-btn'
    
        openModalBtns.forEach(button => {
            button.addEventListener('click', () => {
                modal.style.display = 'block';
                box.classList.add('blur');
                modal.classList.add('active');
            });
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
    
        document.getElementById("viewProviderForm").onsubmit = function(e) {
            e.preventDefault();
            modal.classList.remove("active");
            box.classList.remove("blur");
        }
    });