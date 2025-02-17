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
?>