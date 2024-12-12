
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
