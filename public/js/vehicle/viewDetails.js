document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('editProductModal');
        const closeModal = document.getElementById('edit-closeModal');
        const box = document.querySelector('.box');
        const openEditModal = document.querySelectorAll('.edit'); // Select all buttons with the class 'view-btn'


        openEditModal.forEach(button =>{
            button.addEventListener('click',function(e){
                e.preventDefault();
                

                const productId = button.getAttribute('productId'); 
                const productName = button.getAttribute('productName'); 
                const productRate = button.getAttribute('productRate'); 
                const productQuantity = button.getAttribute('productQuantity');
                const productCategory = button.getAttribute('productCategory');
                const productDescription = button.getAttribute('productDescription');
                const productCategoryId = button.getAttribute('productCategoryId');   
   

                const modalProductId = modal.querySelector('#productIdEdit');
                const modalProductName = modal.querySelector('#productNameEdit');
                const modalProductRate = modal.querySelector('#productRateEdit');
                const modalProductCategory = modal.querySelector('#productCategoryEdit');
                const modalStockQuantity = modal.querySelector('#stockQuantityEdit');
                const modalProductDescription = modal.querySelector('#productDescriptionEdit');

                modalProductId.value = productId;
                modalProductName.value = productName;
                modalProductRate.value = productRate;
                modalProductCategory.value = productCategory;
                modalStockQuantity.value = productQuantity;
                modalProductDescription.value = productDescription;
                
                box.classList.add('blur');
                modal.classList.add('active'); 
                
                        
            });
        });
    
        closeModal.addEventListener('click', () => {
            box.classList.remove('blur');
            modal.classList.remove('active');
            document.querySelector('#productNameEdit').value = '';
            document.querySelector('#productRateEdit').value = '';
            document.querySelector('#productCategoryEdit').value = '';
            document.querySelector('#stockQuantityEdit').value = '';
            document.querySelector('#productDescriptionEdit').value = '';
        });

        window.onclick = function(event) {
            if (event.target == modal) {
                    modal.classList.remove("active");
                    box.classList.remove("blur"); 
            }
        }
        
        document.getElementById("editProductForm").onsubmit = function(e){
            modal.classList.remove("active");
            box.classList.remove("blur");
    }
    
        
    });