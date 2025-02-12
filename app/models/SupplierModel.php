<?php

class SupplierModel{

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllSuppliers(){
        $this->db->query("SELECT id, name, nic, address, phone, email, reg_number, latitude, longitude FROM equipment_suppliers");
        return $this->db->resultSet();
    }
}

?>