<!-- Edit Vehicle Modal -->
<div id="editVehicleModal" class="vehicle-edit-modal-container">
        <div class="vehicleEditModal">
            <div class="vehicleEditModal-top">
                <h1>Edit Vehicle</h1>
                <span class="close" id="vehicleCloseModal">&times;</span>
            </div>  

            <div class="vehicle-edit-modal-form">
                <form id="editVehicleForm" action="<?php echo URLROOT; ?>/transport_suppliers/editVehicle" method="post" enctype="multipart/form-data"> 
                    <div class="body">
                        <div class="left">
                            <label for="vehicleId" style="display: none;">Id</label>
                            <input type="text" id="vehicleId" name="vehicleId" value="" hidden readonly>
   
                            <label for="vehicleType">Vehicle Type</label>
                            <select id="vehicleType" name="vehicleType" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option disabled selected>Choose a type</option>
                                <option value="car">Car</option>
                                <option value="van">Van</option>
                                <option value="scooter">Scooter</option>
                                <option value="bus">Bus</option>
                                <option value="MotorCycle">MotorCycle</option>
                            </select>

                            <label for="vehicleMake">Make</label>
                            <select id="vehicleMake" name="vehicleMake" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option disabled selected>Choose a make</option>
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
                            <input type="text" id="vehicleModel" name="vehicleModel" value="" required>

                            <label for="licensePlateNumber">License Plate Number</label>
                            <input type="text" id="licensePlateNumber" name="licensePlateNumber" value="" readonly>
                
                            <label for="vehicleRate">Self Drive Rate (Per Day)</label>
                            <input type="text" id="vehicleRate" name="vehicleRate" value="" readonly>

                            <label for="fuelType">Fuel Type</label>
                            <select id="fuelType" name="fuelType" required style="width: 100%; max-width: 300px; height: 40px;">
                                <option disabled selected>Choose fuel type</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Electric">Electric</option>
                            </select>
                        </div>

                        <div class="right">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" rows="9" required></textarea>
                            
                            <p>Driver Availability</p>
                            <label for="yes">
                                <input type="radio" id="yes" name="driver" value="Yes"> Yes
                            </label>
                            <label for="no">
                                <input type="radio" id="no" name="driver" value="No"> No
                            </label>
                            
                           <label for="vehicleCost">With Driver Rate (Per Day)</label>
                            <input type="text" id="vehicleCost" name="vehicleCost" value="" readonly>

                            <p>Vehicle Availability</p>
                            <label for="yes">
                                <input type="radio" id="yes" name="availability" value="Yes"> Yes
                            </label>
                            <label for="no">
                                <input type="radio" id="no" name="availability" value="No"> No
                            </label>

                            <label for="vehicleLocation">Vehicle Location</label>
                <select id="vehicleLocation" name="vehicleLocation" required>
                    <option value="" disabled selected>Select a location</option>
                    <option value="colombo">Colombo</option>
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
                    <!-- Add all other districts here -->
                </select>
                        </div>
                    </div>

                    <div class="submit-btn">
                        <button type="submit" name="submit">Update Vehicle</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>

