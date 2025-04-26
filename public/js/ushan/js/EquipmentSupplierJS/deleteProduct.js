document.addEventListener('DOMContentLoaded', () => {

    const deleteBtn = document.getElementById('delete-item-btn'); 
    const successModel = document.getElementById('responseSuccessModal');
    const errorModel = document.getElementById('responseErrorModal');
    const successMessage = document.getElementById('successModalMessage');
    const errorMessage = document.getElementById('errorModalMessage');
    const closeSuccessModal = document.getElementById('closeSuccessModal');
    const closeErrorModal = document.getElementById('closeErrorModal');

    
    deleteBtn.addEventListener('click', async function(){
        const productId = parseInt(deleteBtn.getAttribute('data-product-id'));

        try{
            const response = await fetch(`${URLROOT}/product/deleteProduct`, {
                method: "POST",
                headers : {
                    'Content-Type': 'application/json'
                },
                body : JSON.stringify({
                    id : productId
                })
            });

            const result = await response.json();
            if(result.success){
                alert("Success: " + result.message);
                window.location.href = `${URLROOT}/equipment_suppliers/MyInventory`;
            } else {
                alert("Error: " + result.message);
            }        
        }catch(error){
            alert("An error occurred. Please try again later.");
        }
    });

    closeSuccessModal.addEventListener('click', function() {
        successMessage.textContent = '';
        successModel.style.display = 'none';
        errorModel.style.display = 'none';

    });

    closeErrorModal.addEventListener('click', function(){
        errorMessage.textContent = '';
        errorModel.style.display = 'none';
        successModel.style.display = 'none';

    })


    function showSuccessModal(message){
        console.log("Success modal function triggered with:", message);
        successMessage.textContent = message;
        successModel.style.display = "flex";
    }

    function showErrorModal(message){
        console.log("Error modal function triggered with:", message);
    errorMessage.textContent = message;
    errorModel.style.display = "flex";
    }

});

   