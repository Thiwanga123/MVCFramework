<div id="addProductModal" class="modal-container">
        <div class="modal">
            <div class="modal-top">
                <h1>Update the Availability</h1>
                <span class="close" id="closeModal">&times;</span>
            </div>  

            <div class="modal-form">
                <form id="addProductForm" action="<?php echo URLROOT;?>/tour_guides/Add_Availability" method = "POST" enctype="multipart/form-data"> 
                    <div class="body">
                        <div class="left">
                            <label for="date">Available Date</label>
                            <input type="date" id="date" name="date" required>

                            <label for="time">Available Time</label>
                            <input type="text" id="time" name="time" required>
                
                            <label for="productRate">Charges Per Hour Unit(Rs.)</label>
                            <input type="text" id="rate" name="rate" required>
                
                           

                            <label for="location">Location</label>
                            <input type="text" id="location" name="location" required>
                            
                        </div>

                        
                    </div>

                    <div class="submit-btn">
                        <button type="submit" name="submit">Add</button>
                    </div>
                </form>
            </div> 
</div>
    