<?php

class M_accomadation{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addProperty($data) {

            try {
            // Begin transaction
           
            // Insert property data into the main properties table
            $query = ('INSERT INTO properties(postal_code,city,property_name,property_type,address,service_provider_id) VALUES (:postal_code, :city, :property_name, :property_type, :address, :service_provider_id)');
            $this->db->query($query);

            // Bind values

            $this->db->bind(':postal_code', $data['postalCode']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':property_type', $data['type']);
            $this->db->bind(':property_name', $data['name']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':service_provider_id', $data['id']);



            // Execute the query
           
            $this->db->execute();

            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Rollback transaction on error
          
            error_log($e->getMessage());
            return false;
        }
    }

    
       
            
        
        
    

    //get the accomadation from the database with respect to the accomadation supplier
    public function getAccomadation($userId) {
        try {
            $sql = "SELECT * FROM add_accomadation WHERE user_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $accomadation = $this->db->resultSet();

            return $accomadation;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

}

?>