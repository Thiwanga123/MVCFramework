<?php

class EquipmentModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }

   
    public function getAllEquipment() {
        $this->db->query("SELECT r.*, 
                             GROUP_CONCAT(ri.image_path) AS images 
                            FROM rental_equipments r 
                            LEFT JOIN rental_images ri 
                            ON r.id = ri.product_id
                            GROUP BY r.id");
        return $this->db->resultSet();
    }

    // Fetch all categories from the database
    public function getAllCategories() {
        $this->db->query("SELECT * FROM equipment_categories"); 
        return $this->db->resultSet();
    }

    public function getProductDetailsById($productId){
        try{
            $sql = 'SELECT r.*, c.category_name, GROUP_CONCAT(i.image_path) AS image_paths
                    FROM rental_equipments r
                    JOIN equipment_categories c ON r.category_id = c.category_id
                    LEFT JOIN rental_images i ON r.id = i.product_id
                    WHERE r.id = ?
                    GROUP BY r.id';
                    
            $this->db->query($sql);
            $this->db->bind(1,$productId);
            $result = $this->db->single();
        
            if (!$result) {
                throw new Exception("Product not found.");
            }
            return $result; 

        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function addEquipmentBooking($data){
       
        $sql = "INSERT INTO rental_equipment_bookings (user_id, equipment_id, supplier_id, start_date, end_date, total_price) VALUES (?, ?, ?, ?, ?, ?)";
        try{
            $this->db->query($sql);
            $this->db->bind(1,$data['user_id']);
            $this->db->bind(2,$data['product_id']);
            $this->db->bind(3,$data['supplier_id']);
            $this->db->bind(4,$data['booking_start_date']);
            $this->db->bind(5,$data['booking_end_date']);
            $this->db->bind(6,$data['totalPrice']);
            return $this->db->execute();
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function getBookingsByEquipmentId($productId){
        $sql = "SELECT user_id, start_date, end_date, status FROM rental_equipment_bookings WHERE equipment_id = ?";
        try{
            $this->db->query($sql);
            $this->db->bind(1,$productId);
            $result = $this->db->resultSet();
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function getReviewsByEquipmentId($equipmentId){
       
        $sql = "SELECT r.* , t.name 
                FROM rental_equipments_reviews r 
                JOIN traveler t ON r.traveler_id = t.traveler_id  
                WHERE r.equipment_id = ?";
        try{
            $this->db->query($sql);
            $this->db->bind(1,$equipmentId);
            $result = $this->db->resultSet();
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function getRatingsByEquipmentId($equipmentId){
        $sql = "SELECT rating, COUNT(*) as total
                FROM rental_equipments_reviews
                WHERE equipment_id = ?
                GROUP BY rating
                ORDER BY rating DESC";

        try{
            $this->db->query($sql);
            $this->db->bind(1,$equipmentId);
            $result = $this->db->resultSet();
            return $result; 
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }
  
}

?>