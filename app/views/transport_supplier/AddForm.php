<div class="initial-container" id = "vehicleAddContainer" style="display: none;">
    <div class="header">
        <div class="left">
            <h1>My Vehicles</h1>
        </div>
                            
        <div class="right">
            <button class="add-btn" name ="vehicle-add-btn" id="vehicle-add-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                <h3>Add Vehicle</h3>
            </button>
        </div>
</div>

<div class="vehicle-form-container">
    <div class="form-header">
        <h1>Add Vehicle</h1>
        <button class="back-button" id="vehicle-back-btn">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
            </svg>
            <span>Back to Vehicles</span>
        </button>
    </div>

    <form id="addVehicleForm" action="<?php echo URLROOT; ?>/transport_suppliers/addVehicle" method="post" enctype="multipart/form-data" class="vehicle-form">
        <div class="form-section">
            <div class="form-left">
                <label for="vehicleType">Vehicle Type</label>
                <select id="vehicleType" name="vehicleType" required>
                    <option value="" disabled selected>Select a type</option>
                    <option value="car">Car</option>
                    <option value="van">Van</option>
                    <option value="scooter">Scooter</option>
                    <option value="bus">Bus</option>
                    <option value="MotorCycle">MotorCycle</option>
                </select>

                <label for="vehicleMake">Make</label>
                <select id="vehicleMake" name="vehicleMake" required>
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

                <label for="vehicleRate">Self Drive Rate (Per Day)</label>
                <input type="text" id="vehicleRate" name="vehicleRate" required>

                <label for="fuelType">Fuel Type</label>
                <select id="fuelType" name="fuelType" required>
                    <option value="" disabled selected>Select fuel type</option>
                    <option value="Hybrid">Hybrid</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Petrol">Petrol</option>
                    <option value="Electric">Electric</option>
                </select>
            </div>

            <div class="form-right">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" required></textarea>

                <p>Driver Availability</p>
                <label><input type="radio" name="driver" value="Yes"> Yes</label>
                <label><input type="radio" name="driver" value="No"> No</label>

                <label for="vehicleCost">With Driver Rate (Per Day)</label>
                <input type="text" id="vehicleCost" name="vehicleCost" required>

                <p>Vehicle Availability</p>
                <label><input type="radio" name="availability" value="Yes"> Yes</label>
                <label><input type="radio" name="availability" value="No"> No</label>

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

                <label for="vehicleImage">Vehicle Images</label>
                <input type="file" id="vehicleImage" name="vehicleImages[]" multiple required accept="image/*">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="submit-button">Add Vehicle</button>
        </div>
    </form>
</div>

</div>

