<?php
class M_guider {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    // Get all availabilities for a guider
    public function getAvailability($guider_id) {
        $this->db->query('SELECT * FROM guiders_availability WHERE guider_id = :guider_id ORDER BY available_date ASC');
        $this->db->bind(':guider_id', $guider_id);
        return $this->db->resultSet();
    }
    
    // Add a new availability
    public function addAvailability($data) {
        $this->db->query('INSERT INTO guiders_availability (guider_id, available_date, available_time_from, available_time_to, charges_per_hour, location, reason) 
                          VALUES (:guider_id, :available_date, :available_time_from, :available_time_to, :charges_per_hour, :location, :reason)');
        
        // Bind values
        $this->db->bind(':guider_id', $data['guider_id']);
        $this->db->bind(':available_date', $data['available_date']);
        $this->db->bind(':available_time_from', $data['available_time_from']);
        $this->db->bind(':available_time_to', $data['available_time_to']);
        $this->db->bind(':charges_per_hour', $data['charges_per_hour']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':reason', $data['reason'] ?? null);
        
        // Execute
        $this->db->execute();
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
    
    // Update an existing availability
    public function editAvailability($data) {
        $this->db->query('UPDATE guiders_availability 
                          SET available_date = :date, 
                              available_time_from = :time_from, 
                              available_time_to = :time_to, 
                              charges_per_hour = :charges_per_hour, 
                              location = :location,
                              reason = :reason
                          WHERE id = :id AND guider_id = :guider_id');
        
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':guider_id', $data['guider_id']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':time_from', $data['time_from']);
        $this->db->bind(':time_to', $data['time_to']);
        $this->db->bind(':charges_per_hour', $data['charges_per_hour']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':reason', $data['reason'] ?? null);
        
        // Execute
        $this->db->execute();
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
    
    // Delete an availability
    public function deleteGuiderAvailability($id) {
        $this->db->query('DELETE FROM guiders_availability WHERE id = :id');
        $this->db->bind(':id', $id);
        
        // Execute
        return $this->db->execute();
    }
    
    // Delete a booking
    public function deleteBookingById($id) {
        $this->db->query("DELETE FROM booking WHERE booking_id = :booking_id");
        $this->db->bind(':booking_id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    // Update the profile of the guide
    public function updateProfile($data) {
        $this->db->query('UPDATE tour_guide SET first_name = :first_name, last_name = :last_name, email = :email, phone_number = :phone_number WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone_number', $data['phone_number']);
        
        return $this->db->execute();
    }
    
    // Get the bookings of the guider
    public function getGuiderBookings($guider_id) {
        $this->db->query('SELECT COUNT(*) as number_of_bookings FROM bookings WHERE id = :guider_id');
        $this->db->bind(':guider_id', $guider_id);
        $row = $this->db->single();
        return $row->number_of_bookings;
    }
    
    // Get the guider
    public function getGuider() {
        $this->db->query("SELECT * FROM tour_guides");
        return $this->db->resultSet();
    }
}
?>
