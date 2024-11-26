
<div id="warningModalContainer" class="confirmModal">
    <div class="wrapper">
        <div class="modalContent">
            <img src="<?php echo URLROOT;?>/Images/warning.png">
            <h1>Are you sure?</h1>
            <p>Do you really want to delete this product?</p>
        </div>

        <div class="bottom">
            <button id="cancelDelete" class="cancel-btn">Cancel</button>
            <button id="confirmDelete" class="delete-btn">Delete</button>
        </div>
    </div>

    <form action="<?php echo URLROOT; ?>/product/delete" id="deleteForm" method="POST" style="display:none;">
        <input type="hidden" name="productId" id="productId">
    </form>
</div>

<style>
    *{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .confirmModal{
        position: fixed; 
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center; 
        align-items: center; 
        background-color: rgba(0, 0, 0, 0.4); 
        z-index: 9999; 
        opacity: 0; 
        pointer-events: none;
        transition: opacity 0.3s ease;  
        position: fixed; 
    }

    .confirmModal.active {
        opacity: 1;
        pointer-events: auto;   
       
    }

    .wrapper{
        position: relative;
        background-color: rgb(255, 255, 255);
        border-radius: 50px;
        padding: 40px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: auto; 
        max-width: 500px;
    }

    .modalContent{
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }

    .modalContent img{
        height: 100px;
    }

    .bottom{
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 3rem;
        margin-top: 1rem;
        
    }

    .delete-btn{
        background-color: rgb(228, 15, 15);
        color: white;
        font-size: medium;
        cursor: pointer; 
        padding: 5px 15px;   
        border-radius: 20px;
        border-style: none;
        margin-top: 1rem;
        
    }

    .cancel-btn{
        background-color: rgb(168, 168, 168);
        color: white;
        font-size: medium;
        cursor: pointer; 
        padding: 5px 15px;   
        border-radius: 20px;
        border-style: none;
        margin-top: 1rem;

    }

    .blur{
        filter: blur(5px); 
        transition: filter 0.3s ease; 
    }


</style>