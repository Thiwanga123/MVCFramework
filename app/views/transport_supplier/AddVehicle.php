<div id="addVehicleModal" class="vehicle-modal-container">
        <div class="vehicleModal">
            <div class="vehicleModal-top">
                <h1>Add New Vehicle</h1>
                <span class="close" id="closeModal">&times;</span>
            </div>  

            <div class="vehicle-modal-form">
                <form id="addVehicleForm" action="<?php echo URLROOT; ?>/transport_suppliers/addVehicle" method = "post" enctype="multipart/form-data"> 
                    <div class="body">
                        <div class="left">
                       
                        <label for="vehicleType">Vehicle Type</label>
                            <select id="vehicleType" name="vehicleType" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option value="" disabled selected>Select a category</option>
                                <option value="car">Car</option>
                                <option value="van">Van</option>
                                <option value="scooter">Scooter</option>
                                <option value="bus">Bus</option>
                                <option value="MotorCycle">MotorCycle</option>
                            </select>

                        <label for="vehicleMake">Make</label>
                            <select id="vehicleMake" name="vehicleMake" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option value="" disabled selected>Select a category</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Honda">Honda</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Benz">Benz</option>
                                <option value="BMW">BMW</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="KIA">KIA</option>
                                <option value="Jeep">Jeep</option>
                                <option value="Chervolet">Chervolet</option>
                                <option value="Lexus">Lexus</option>
                                <option value="Mazda">Mazda</option>
                                <option value="ford">Ford</option>
                                <option value="Audi">Audi</option>
                                <option value="Fiat">Fiat</option>
                                <option value="Skoda">Skoda</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Yamaha">Yamaha</option>
                                <option value="KTM">KTM</option>
                                <option value="Bajaj">Bajaj</option>
                                <option value="Mahindra">Mahindra</option>
                                <option value="Suzuki">Suzuki</option>
                                <option value="TVS">TVS</option>
                            </select>
                            <label for="vehicleModel">Model</label>
                            <input type="text" id="vehicleModel" name="vehicleModel" required>

                            <label for="licensePlateNumber">Vehicle Number</label>
                            <input type="text" id="licensePlateNumber" name="licensePlateNumber" required>
                
            
                            <label for="vehicleRate">Self Drive Rates Per Day</label>
                            <input type="text" id="vehicleRate" name="vehicleRate" required>

                        

                            <label for="fuelType">Fuel Type</label>
                            <select id="fuelType" name="fuelType" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option value="" disabled selected>Select a category</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Electric">Electric</option>
                            </select>
                        </div>
                        <div class="submit-btn">
                        <button type="submit" name="submit">Add Vehicle</button>
                    </div>
                        <div class="right">
    

                            <label for="description">Description</label>
                            <textarea id="description" name="description" rows="9" required></textarea>

                            <p>Driver Availability</p>
                            <label for="yes">
                                <input type="radio" id="yes" name="driver" value="Yes">
                                Yes
                            </label>

                            <label for="no">
                                <input type="radio" id="no" name="driver" value="No">
                                No
                            </label>

                            <label for="vehicleCost">With Driver Rates Per Day</label>
                            <input type="text" id="vehicleCost" name="vehicleCost" required>
</br>
                            <p>Vehicle Availability</p>
                            <label for="yes">
                                <input type="radio" id="yes" name="availability" value="Yes">
                                Yes
                            </label>

                            <label for="no">
                                <input type="radio" id="no" name="availability" value="No">
                                No
                            </label>
                            <label for="vehicleLocation">Vehicle Location</label>
                            <select id="vehicleLocation" name="vehicleLocation" required style="width: 100%; max-width: 300px; height: 40px;">
  <option value="colombo">Colombo</option>
  <option value="gampaha">Gampaha</option>
  <option value="kalutara">Kalutara</option>
  <option value="kandy">Kandy</option>
  <option value="matale">Matale</option>
  <option value="nuwara_eliya">Nuwara Eliya</option>
  <option value="galle">Galle</option>
  <option value="hambantota">Hambantota</option>
  <option value="matara">Matara</option>
  <option value="moneragala">Moneragala</option>
  <option value="badulla">Badulla</option>
  <option value="ratnapura">Ratnapura</option>
  <option value="kegalle">Kegalle</option>
  <option value="kurunegala">Kurunegala</option>
  <option value="anuradhapura">Anuradhapura</option>
  <option value="polonnaruwa">Polonnaruwa</option>
  <option value="trincomalee">Trincomalee</option>
  <option value="batticaloa">Batticaloa</option>
  <option value="ampara">Ampara</option>
  <option value="jaffna">Jaffna</option>
  <option value="mullaitivu">Mullaitivu</option>
  <option value="vavuniya">Vavuniya</option>
  <option value="kilinochchi">Kilinochchi</option>
  <option value="mannar">Mannar</option>
  <option value="puttalam">Puttalam</option>
  <option value="vavuniya">Vavuniya</option>
</select>
</div>
                            <label for="vehicleImage">Vehicle Images</label>
                            <div id="uploadImagesContainer" style="margin-top: 5px; cursor: pointer;">
                                <svg id="uploadImagesIcon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-200h80v-167l64 64 56-57-160-160-160 160 57 56 63-63v167ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z"/></svg>
                                <input type="file" id="vehicleImage"  accept="image/*"  name="vehicleImages[]" multiple required style="background-color: white;">
                            </div>
                            <div class="submit-btn">
                        <button type="submit" name="submit">Add Vehicle</button>
                    </div>
</div>
</div>
                         

            

                </form>
            </div> 
        </div>
    