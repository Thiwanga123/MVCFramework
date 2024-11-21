<div id="viewDetailsModal" class="modal-container">
        <div class="modal">
            <div class="modal-top">
                <h1>Service Provider Details</h1>
                <span class="close" id="closeModal">&times;</span>
            </div>  

            <div class="modal-form">
                <form id="viewProviderForm" enctype="multipart/form-data"> 
                    <div class="body">
                        <div class="left">
                            <label for="Name">Service Provider Name</label>
                            <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($data['name']); ?>">
                
                            <label for="SP_id">Service Provider ID</label>
                            <input type="text" id="id" name="id" required>

                            <label for="sptype">Service Type</label>
                            <input type="text" id="sptype" name="sptype" required>

                            <label for="joined_date">Joined Date</label>
                            <input type="text" id="date_of_joined" name="date_of_joined" required>

                            <label for="phone">Telephone Number</label>
                            <input type="text" id="phone" name="phone" required>
    
                        </div>

                        <div class="right">
                            
                        
                            <label for="Profile photo">Profile Photo</label>
                            
                            
                            <div id="imagePreviewContainer"  style="margin-top: 40px; display: flex; flex-wrap: wrap;"></div>
                            
                            <label for="reg_no">Government Registerd Number</label>
                            <input type="text" id="reg_no" name="reg_no" required>

                            <label for="charging_rates">Charging Rates</label>
                            <input type="text" id="charging_rates" name="charging_rates" required>

                            <label for="certificates">Certificates</label>
                            <!-- download the Certificates -->

                            <input type="file" id="pdfFile" name="pdfFile" accept="application/pdf" required>



                        </div>
                    </div>

                    <!-- <div class=" submit-btn">
                        <button  name="submit">Close</button>
                    </div> -->
                </form>
            </div> 
        </div>
    