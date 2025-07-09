<?php
    class M_package{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }
       
        public function getAllProperies(){
            $sql = 'SELECT * FROM properties';
            try{
                $this->db->query($sql);
                $results = $this->db->resultSet();
                return $results;
            } catch (Exception $e) {
                error_log("Error fetching properties: " . $e->getMessage());
                return false; // or handle the error as needed
            }
        }

        public function getAllSuppliers(){
            $sql = 'SELECT * FROM equipment_suppliers';
            try{
                $this->db->query($sql);
                $results = $this->db->resultSet();
                return $results;
            } catch (Exception $e) {
                error_log("Error fetching suppliers: " . $e->getMessage());
                return false; // or handle the error as needed
            }
        }

        public function getAvailableVehicles($startDate, $endDate){
            $sql = 'SELECT * FROM vehicles WHERE vehicle_id NOT IN (SELECT vehicle_id FROM vehicle_bookings WHERE (start_date <= :endDate AND end_date >= :startDate))';
            try{
                $this->db->query($sql);
                $this->db->bind(':startDate', $startDate);
                $this->db->bind(':endDate', $endDate);
                $results = $this->db->resultSet();
                return $results;
            } catch (Exception $e) {
                error_log("Error fetching available vehicles: " . $e->getMessage());
                return false; // or handle the error as needed
            }
        }
        public function getAvailableGuides($startDate, $endDate){
            $sql = 'SELECT * FROM tour_guides WHERE id NOT IN (SELECT guider_id FROM guider_booking WHERE (start_date <= :endDate AND end_date >= :startDate))';
            try{
                $this->db->query($sql);
                $this->db->bind(':startDate', $startDate);
                $this->db->bind(':endDate', $endDate);
                $results = $this->db->resultSet();
                return $results;
            } catch (Exception $e) {
                error_log("Error fetching available guides: " . $e->getMessage());
                return false; // or handle the error as needed
            }
        }

        public function getAvailableProperties($nearbyProperties, $startDate, $endDate) {
            $availableProperties = [];
        
            foreach ($nearbyProperties as $property) {
                $propertyId = $property['property_id'];
        
                $sql = 'SELECT * FROM properties WHERE property_id = :property_id AND NOT EXISTS (
                        SELECT 1 FROM property_booking
                        WHERE property_id = :property_id 
                        AND (start_date <= :endDate AND end_date >= :startDate))';
        
                try {
                    $this->db->query($sql);
                    $this->db->bind(':property_id', $propertyId);
                    $this->db->bind(':startDate', $startDate);
                    $this->db->bind(':endDate', $endDate);
        
                    $results = $this->db->resultSet();
        
                    if (!empty($results)) {
                        $availableProperties[] = $results[0]; // Assuming you want the first result
                    }
                } catch (Exception $e) {
                    error_log("Error fetching available properties: " . $e->getMessage());
                }
            }
        
            return $availableProperties;
        }

        public function getAvailableEquipment($nearbySuppliers, $startDate, $endDate) {
            $availableEquipment = [];
        
            foreach ($nearbySuppliers as $supplier) {
                $supplierId = $supplier['id'];
        
                $sql = 'SELECT * FROM rental_equipment WHERE id = :supplier_id AND NOT EXISTS (
                        SELECT 1 FROM equipment_booking
                        WHERE supplier_id = :supplier_id 
                        AND (start_date <= :endDate AND end_date >= :startDate))';
        
                try {
                    $this->db->query($sql);
                    $this->db->bind(':supplier_id', $supplierId);
                    $this->db->bind(':startDate', $startDate);
                    $this->db->bind(':endDate', $endDate);
        
                    $results = $this->db->resultSet();
        
                    if (!empty($results)) {
                        $availableEquipment[] = $results[0]; // Assuming you want the first result
                    }
                } catch (Exception $e) {
                    error_log("Error fetching available equipment: " . $e->getMessage());
                }
            }
        
            return $availableEquipment;
        }
    }

?>