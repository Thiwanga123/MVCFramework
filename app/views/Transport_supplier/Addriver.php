<div id="addVehicleModal" class="vehicle-modal-container">
        <div class="vehicleModal">
            <div class="vehicleModal-top">
                <h1>Add New Driver</h1>
                <span class="close" id="closeModal">&times;</span>
            </div>  

            <div class="vehicle-modal-form">
            <form id="addVehicleForm" action="<?php echo URLROOT; ?>/transport_suppliers/addriver" method="POST">
            <div class="body">
            <div class="right">

    <label for="name">Driver Name</label>
    <input type="text" id="name" name="name" required>

    <label for="gender">Gender</label>
    <input type="text" id="gender" name="gender" required>

    <label for="phone">Phone number</label>
    <input type="text" id="phone" name="phone" required>

    <label for="email">Email</label>
    <input type="text" id="email" name="email" required>

    <label for="description">Description</label>
    <textarea id="description" name="description"  required></textarea>

    <p>Driver Availability</p>
                            <label for="yes">
                                <input type="radio" id="yes" name="drive" value="Yes">
                                Yes
                            </label>

                            <label for="no">
                                <input type="radio" id="no" name="drive" value="No">
                                No
                            </label>

    <button type="submit" name="submit">Add Driver</button>
</form>

                    </div>
            
    
                </form>
            </div> 
        </div>
    