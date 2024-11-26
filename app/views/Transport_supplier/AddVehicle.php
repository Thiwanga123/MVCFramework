<div id="addVehicleModal" class="modal-container">
        <div class="modal">
            <div class="modal-top">
                <h1>Add New Vehicle</h1>
                <span class="close" id="closeModal">&times;</span>
            </div>  

            <div class="modal-form">
                <form id="addVehicleForm" action="<?php echo URLROOT; ?>/transport_supplier/addVehicle" method = "post" enctype="multipart/form-data"> 
                    <div class="body">
                        <div class="left">
                       
                        <label for="vehicleType">Vehicle Type:</label>
                            <select id="vehicleType" name="vehicleType" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option value="" disabled selected>Select a category</option>
                                <option value="car">Car</option>
                                <option value="van">Van</option>
                                <option value="scooter">Scooter</option>
                                <option value="bus">Bus</option>
                            </select>

                        <label for="vehicleMake">Make:</label>
                            <select id="vehicleMake" name="vehicleMake" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option value="" disabled selected>Select a category</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Honda">Honda</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Mitsubishi">Mitsubishi</option>
                            </select>
                            <label for="model">Model</label>
                            <input type="text" id="model" name="model" required>

                            <label for="licenseNumber">License number</label>
                            <input type="text" id="plicenseNumber" name="licenseNumber" required>
                
            
                            <label for="vehicleRate">Rental Price</label>
                            <input type="text" id="vehicleRate" name="vehicleRate" required>
                            
                            <label for="seatingCapacity">Seating Capacity</label>
                            <input type="text" id="seatingCapacity" name="seatingCapacity" required>
                        </div>

                        <div class="right">
                        <label for="fuelType">Fuel Type:</label>
                            <select id="fuelType" name="fuelType" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option value="" disabled selected>Select a category</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Electric">Electric</option>
                            </select>

                            <label for="description">Description</label>
                            <textarea id="description" name="description" rows="9" required></textarea>
                            
                            <p>Availability</p>
                            <label for="yes">
                                <input type="radio" id="yes" name="availability" value="Yes">
                                Yes
                            </label>

                            <label for="no">
                                <input type="radio" id="no" name="availability" value="No">
                                No
                            </label></br>
                            <label for="vehicleImage">Vehicle Images</label>
                            <div id="uploadImagesContainer" style="margin-top: 5px; cursor: pointer;">
                                <svg id="uploadImagesIcon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-200h80v-167l64 64 56-57-160-160-160 160 57 56 63-63v167ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z"/></svg>
                                <input type="file" id="vehicleImage"  accept="image/*"  name="vehicleImage[]" multiple required style="background-color: white;">
                            </div>
                            
                            <div id="imagePreviewContainer"  style="margin-top: 10px; display: flex; flex-wrap: wrap;"></div>
            
                        </div>
                    </div>

                    <div class="submit-btn">
                        <button type="submit" name="submit">Add Vehicle</button>
                    </div>
                </form>
            </div> 
        </div>
    