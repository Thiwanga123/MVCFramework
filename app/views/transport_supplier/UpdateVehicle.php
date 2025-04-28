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
                            <select id="vehicleType" name="vehicleType" required style="width: 100%; max-width: 300px; height: 40px;" disabled>
                                <option disabled selected>Choose a type</option>
                                <option value="car">Car</option>
                                <option value="van">Van</option>
                                <option value="scooter">Scooter</option>
                                <option value="bus">Bus</option>
                                <option value="MotorCycle">MotorCycle</option>
                            </select>
                            <!-- Hidden input to ensure the value is still submitted -->
                            <input type="hidden" name="vehicleType" id="vehicleTypeHidden">

                            <label for="vehicleMake">Make</label>
                            <select id="vehicleMake" name="vehicleMake" required style="width: 100%; max-width: 300px; height: 40px;" disabled>
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
                            <!-- Hidden input to ensure the value is still submitted -->
                            <input type="hidden" name="vehicleMake" id="vehicleMakeHidden">

                            <label for="vehicleModel">Model</label>
                            <input type="text" id="vehicleModel" name="vehicleModel" value="" readonly>

                            <label for="seating_capacity">Seats</label>
                            <input type="text" id="seating_capacity" name="seating_capacity" value="" readonly>

                            <label for="licensePlateNumber">License Plate Number</label>
                            <input type="text" id="licensePlateNumber" name="licensePlateNumber" value="" readonly>
                
                            <label for="vehicleRate">Self Drive Rate (Per Day)</label>
                            <input type="text" id="vehicleRate" name="vehicleRate" value="" required>

                            <label for="fuelType">Fuel Type</label>
                            <select id="fuelType" name="fuelType" required style="width: 100%; max-width: 300px; height: 40px;" disabled>
                                <option disabled selected>Choose fuel type</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Electric">Electric</option>
                            </select>
                            <!-- Hidden input to ensure the value is still submitted -->
                            <input type="hidden" name="fuelType" id="fuelTypeHidden">
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
                            <input type="text" id="vehicleCost" name="vehicleCost" value="" required>

                            <p>Vehicle Availability</p>
                            <label for="availability_yes">
                                <input type="radio" id="availability_yes" name="availability" value="Yes"> Yes
                            </label>
                            <label for="availability_no">
                                <input type="radio" id="availability_no" name="availability" value="No"> No
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

<script>
// Add event listeners to copy values from disabled selects to hidden inputs
document.addEventListener("DOMContentLoaded", function() {
    // Vehicle type select to hidden input
    var vehicleTypeSelect = document.getElementById('vehicleType');
    var vehicleTypeHidden = document.getElementById('vehicleTypeHidden');
    
    if (vehicleTypeSelect && vehicleTypeHidden) {
        vehicleTypeSelect.addEventListener('change', function() {
            vehicleTypeHidden.value = this.value;
        });
        // Set initial value
        if (vehicleTypeSelect.value) {
            vehicleTypeHidden.value = vehicleTypeSelect.value;
        }
    }
    
    // Vehicle make select to hidden input
    var vehicleMakeSelect = document.getElementById('vehicleMake');
    var vehicleMakeHidden = document.getElementById('vehicleMakeHidden');
    
    if (vehicleMakeSelect && vehicleMakeHidden) {
        vehicleMakeSelect.addEventListener('change', function() {
            vehicleMakeHidden.value = this.value;
        });
        // Set initial value
        if (vehicleMakeSelect.value) {
            vehicleMakeHidden.value = vehicleMakeSelect.value;
        }
    }
    
    // Fuel type select to hidden input
    var fuelTypeSelect = document.getElementById('fuelType');
    var fuelTypeHidden = document.getElementById('fuelTypeHidden');
    
    if (fuelTypeSelect && fuelTypeHidden) {
        fuelTypeSelect.addEventListener('change', function() {
            fuelTypeHidden.value = this.value;
        });
        // Set initial value
        if (fuelTypeSelect.value) {
            fuelTypeHidden.value = fuelTypeSelect.value;
        }
    }
});
</script>

