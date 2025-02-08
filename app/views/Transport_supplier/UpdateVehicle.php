<div id="editVehicleModal" class="vehicle-edit-modal-container">
    <div class="vehicleEditModal">
        <div class="vehicleEditModal-top">
            <h1>Edit Vehicle</h1>
            <span class="close" id="vehcileCloseModal">&times;</span>
        </div>  

        <div class="vehicle-edit-modal-form">
            <form id="editVehicleForm" action="<?php echo URLROOT; ?>/transport_suppliers/editVehicle" method = "post" enctype="multipart/form-data"> 
                <div class="body">
                    <div class="left">
                        <label for="vehicleId" style="display: none;">Id</label>
                        <input type="text" id="vehicleId" name="vehicleId" value="<?php echo $vehicle->id; ?>" hidden readonly>
   
                        <label for="vehicleType">Vehicle Type</label>
                        <select id="vehicleType" name="vehicleType" required style="width: 100%; max-width: 300px; height: 40px;">
                            <option disabled selected><?php echo $vehicle->type; ?></option>
                            <option value="car">Car</option>
                            <option value="van">Van</option>
                            <option value="scooter">Scooter</option>
                            <option value="bus">Bus</option>
                            <option value="MotorCycle">MotorCycle</option>
                        </select>

                        <label for="vehicleMake">Make</label>
                        <select id="vehicleMake" name="vehicleMake" required style="width: 100%; max-width: 300px; height: 40px;">
                            <option disabled selected><?php echo $vehicle->make; ?></option>
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
                        <input type="text" id="vehicleModel" name="vehicleModel" value="<?php echo $vehicle->model; ?>" required>

                        <label for="licensePlateNumber">License Plate Number</label>
                        <input type="text" id="licensePlateNumber" name="licensePlateNumber" value="<?php echo $vehicle->license_plate_number; ?>" readonly>
                
                        <label for="vehicleRate">Rental Price</label>
                        <input type="text" id="vehicleRate" name="vehicleRate" value ="<?php echo $vehicle->rate; ?>" readonly>

                        <label for="fuelType">Fuel Type</label>
                        <select id="fuelType" name="fuelType" required style="width: 100%; max-width: 300px; height: 40px;" disabled>
                            <option disabled selected><?php echo $vehicle->rate; ?></option>
                            <option value="Hybrid">Hybrid</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Electric">Electric</option>
                        </select>
                    </div>

                    <div class="right">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="9" required><?php echo $vehicle->description; ?></textarea>
                            
                        <p>Driver Availability</p>
                        <label for="yes">
                            <input type="radio" id="yes" name="driver" value="Yes">
                            Yes
                        </label>

                        <label for="no">
                            <input type="radio" id="no" name="driver" value="No">
                            No
                        </label>
                        <p>Vehicle Availability</p>
                        <label for="yes">
                            <input type="radio" id="yes" name="availability" value="Yes">
                            Yes
                        </label>

                        <label for="no">
                            <input type="radio" id="no" name="availability" value="No">
                            No
                        </label>
                    </div>
                </div>

                <div class="submit-btn">
                    <button type="submit" name="submit">Update Vehicle</button>
                </div>
            </form>
        </div> 
    </div>
</div>
