<?php

class EquipmentModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }

   
    public function getAllEquipment() {
        $this->db->query("SELECT p.*, 
                             GROUP_CONCAT(pi.image_path) AS images 
                            FROM products p 
                            LEFT JOIN product_images pi 
                            ON p.product_id = pi.product_id
                            GROUP BY p.product_id");
        return $this->db->resultSet();
    }

    // Fetch all categories from the database
    public function getAllCategories() {
        $this->db->query("SELECT * FROM equipment_categories"); 
        return $this->db->resultSet();
    }
}

?>