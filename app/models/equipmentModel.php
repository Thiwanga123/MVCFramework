<?php

class EquipmentModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }

   
    public function getAllEquipment() {
        $this->db->query("SELECT * FROM products");
        return $this->db->resultSet();
    }

    // Fetch all categories from the database
    public function getAllCategories() {
        $this->db->query("SELECT * FROM equipment_categories"); 
        return $this->db->resultSet();
    }
}

?>