
const modal = document.getElementById('addProductModal');
const openModalBtn = document.getElementById('add-btn');
const closeModal = document.getElementById('closeModal');


openModalBtn.addEventListener('click', () => {
        modal.style.display = 'block';
        document.body.classList.add('blur-background');
        modal.classList.add('active');  
});

closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
        document.body.classList.remove('blur-background');
        modal.classList.remove('active');
        
});
    
openModalBtn.onclick = function() {
        modal.classList.add("active");
        body.classList.add("blur"); 
}

closeModal.onclick = function() {
        modal.classList.remove("active");
        body.classList.remove("blur"); 

}

window.onclick = function(event) {
        if (event.target == modal) {
                modal.classList.remove("active");
                body.classList.remove("blur"); 
    }
}

document.getElementById("addProductForm").onsubmit = function(e) {
    e.preventDefault();
    modal.classList.remove("active");
    body.classList.remove("blur");
}