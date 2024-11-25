<?php

class guider{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }



public function getBookings(){
    $this->db->query('SELECT * FROM booking');
    $results = $this->db->resultSet();
    return $results;
}

}




?>
