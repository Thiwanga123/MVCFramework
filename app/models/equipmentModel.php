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


  
}

?>