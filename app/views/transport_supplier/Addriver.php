<div class="initial-container" id="vehicleAddContainer" style="display: none;">
    <div class="header">
        <div class="left">
            <h1>Drivers</h1>
        </div>
    </div>

    <div class="vehicle-form-container">
        <div class="form-header">
        <h1>Add Drivers</h1>
        
        </div>
            <form id="addVehicleForm" action="<?php echo URLROOT; ?>/transport_suppliers/addriver" method="post" class="driver-form">
                <div class="form-section">
                    <div class="form-left">
                        <label for="name">Driver Name</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Driver Email</label>
                        <input type="text" id="email" name="email" required>

                        <label for="phone">Driver Phone Number</label>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="e.g. 0771234567" required>

                        <label for="driverLicense">Driver License Number</label>
                        <input type="text" id="driverLicense" name="driverLicense" required>

                        <!-- New textarea for description -->
                        <label for="description">Driver Description</label>
                        <textarea id="description" name="description" rows="4" placeholder="Add a brief description..."></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="submit-button">Add Driver</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
