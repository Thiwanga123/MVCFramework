<div id="addpaymentdetails" class="modal-container">
        <div class="modal">
            <div class="modal-top">
                <h1>payment Details</h1>
                <span class="close" id="closeModal">&times;</span>
            </div>  

            <div class="modal-form">
                <form id="addpaymentdetailForm" action="<?php echo URLROOT;?>/tour_guides/addpaymentdetails" method = "POST" enctype="multipart/form-data"> 
                    <div class="body">
                        <div class="left">
                            <label for="name">Customer Name</label>
                            <input type="name" id="name" name="name" required>
                            <label for="payment method">Payment Method</label>
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
