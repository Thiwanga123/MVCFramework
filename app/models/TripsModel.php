<?php

 class TripsModel{

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getGuider(){
        $this->db->query('SELECT * FROM tour_guides');
    
        return $this->db->resultSet();
        
    }

 }
 class Trip {
    // ... existing code ...

    public function getPendingTripsByDestinationGender($destination, $gender) {
        $query = "SELECT * FROM trips 
                 WHERE destination = :destination
                 AND gender_preference = :gender
                 AND status = 'Pending'";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':destination' => $destination,
            ':gender' => $gender
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCompletedTripsWithRequirements() {
        $query = "SELECT destination, special_requirements 
                 FROM trips 
                 WHERE status = 'Completed'";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
