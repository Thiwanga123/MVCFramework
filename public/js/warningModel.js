
document.addEventListener('DOMContentLoaded', () =>{
    const modalContainer = document.getElementById('warningModalContainer');
    const deleteBtn = document.querySelectorAll('.delete');
    const confirmBtn = document.getElementById('confirmDelete');
    const cancelBtn = document.getElementById('cancelDelete');
    const box = document.querySelector('.box');

    let currentProductId = null;

    deleteBtn.forEach((deleteButton) => {
        deleteButton.addEventListener('click',(event) =>{
            event.preventDefault();
            currentProductId = deleteButton.getAttribute('productId');
            modalContainer.classList.add('active');  
        });
    });

    cancelBtn.addEventListener('click', () =>{
        modalContainer.classList.remove('active');
        currentProductId = null;
    });

    confirmBtn.addEventListener('click',() => {

        if(currentProductId){
            window.location.href = '<?php echo URLROOT; ?>/Product/delete/{$currentProductId}';
        }

        modalContainer.classList.remove('active');
        currentProductId = null;
    }); 

});