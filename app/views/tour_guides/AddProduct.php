<div id="addProductModal" class="modal-container">
        <div class="modal">
            <div class="modal-top">
                <h1>Update the Availability</h1>
                <span class="close" id="closeModal">&times;</span>
            </div>  

            <div class="modal-form">
                <form id="addProductForm" action="<?php echo URLROOT;?>/tour_guides/add_Availability" method = "POST" enctype="multipart/form-data"> 
                    <div class="body">
                        <div class="left">
                            <label for="date">Available Date</label>
                            <input type="date" id="date" name="date" required>
                            

                            <label for="time">Available Time Slot</label>
                            <label for="time">From Hour</label>
                            <select id="from-time" name="available_time_from" required>
                                <option value="">Select Time</option>
                                <option value="6:00 AM">6:00 AM</option>
                                <option value="7:00 AM">7:00 AM</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="12:00 PM">12:00 PM</option>
                                <option value="13:00 PM">1:00 PM</option>
                                <option value="14:00 PM">2:00 PM</option>
                                <option value="15:00 PM">3:00 PM</option>
                                <option value="16:00 PM">4:00 PM</option>
                                <option value="17:00 PM">5:00 PM</option>
                                <option value="18:00 PM">6:00 PM</option>
                                <option value="19:00 PM">7:00 PM</option>
                                <option value="20:00 PM">8:00 PM</option>
                            </select>

                       
                                <label for="to-time">To Hour:</label>
                                <select id="to-time" name="available_time_to" required>
                                    <option value="">Select Time</option>
                                    <option value="6:00 AM">6:00 AM</option>
                                    <option value="7:00 AM">7:00 AM</option>
                                    <option value="8:00 AM">8:00 AM</option>
                                    <option value="9:00 AM">9:00 AM</option>
                                    <option value="10:00 AM">10:00 AM</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                    <option value="12:00 PM">12:00 PM</option>
                                    <option value="13:00 PM">1:00 PM</option>
                                    <option value="14:00 PM">2:00 PM</option>
                                    <option value="15:00 PM">3:00 PM</option>
                                    <option value="16:00 PM">4:00 PM</option>
                                    <option value="17:00 PM">5:00 PM</option>
                                    <option value="18:00 PM">6:00 PM</option>
                                    <option value="19:00 PM">7:00 PM</option>
                                    <option value="20:00 PM">8:00 PM</option>
                                </select>
                       
                            

                          
 
                
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
    