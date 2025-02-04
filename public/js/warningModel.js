document.addEventListener('DOMContentLoaded', () => {
    const modalContainer = document.getElementById('warningModalContainer');
    const deleteBtn = document.getElementById('delete'); 
    const confirmBtn = document.getElementById('confirmDelete');
    const cancelBtn = document.getElementById('cancelDelete');
    const box = document.getElementById('box');
    const deleteForm = document.getElementById('deleteForm');
    const idInput = document.getElementById('productId');

    let currentProductId = null;

    if (deleteBtn) {
        deleteBtn.addEventListener('click', (event) => {
            event.preventDefault();
            currentProductId = deleteBtn.getAttribute('data-product-id'); 
            if (currentProductId) {
                modalContainer.classList.add('active');
                box.classList.add('blur');
            }
        });
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', () => {
            modalContainer.classList.remove('active');
            box.classList.remove('blur');
            currentProductId = null;
        });
    }

    if (confirmBtn) {
        confirmBtn.addEventListener('click', () => {
            if (currentProductId) {
                idInput.value = currentProductId;
                deleteForm.submit();
            }

            modalContainer.classList.remove('active');
            box.classList.remove('blur');
            currentProductId = null;
        });
    }
});