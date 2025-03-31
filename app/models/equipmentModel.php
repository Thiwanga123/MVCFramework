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
}

?>