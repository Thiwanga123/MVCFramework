
document.addEventListener('DOMContentLoaded', () =>{
    const modalContainer = document.getElementById('warningModalContainer');
    const deleteBtn = document.querySelectorAll('.delete');
    const confirmBtn = document.getElementById('confirmDelete');
    const cancelBtn = document.getElementById('cancelDelete');
    const box = document.getElementById('box');
    const deleteForm = document.getElementById('deleteForm');
    const idInput = document.getElementById('productId');

    let currentProductId = null;

    deleteBtn.forEach((deleteButton) => {
        deleteButton.addEventListener('click',(event) =>{
            event.preventDefault();
            currentProductId = deleteButton.getAttribute('productId');
            modalContainer.classList.add('active');  
            box.classList.add('blur');
        });
    });

    cancelBtn.addEventListener('click', () =>{
        modalContainer.classList.remove('active');
        box.classList.remove('blur');
        currentProductId = null;
    });

    confirmBtn.addEventListener('click',() => {
        if(currentProductId){
            idInput.value = currentProductId;
            deleteForm.submit();
        }

        modalContainer.classList.remove('active');
        box.classList.remove('blur');
        currentProductId = null;
    }); 
});