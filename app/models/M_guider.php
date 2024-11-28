<?php

class guider{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

<<<<<<< HEAD


public function getBookings(){
    $this->db->query('SELECT * FROM booking');
    $results = $this->db->resultSet();
    return $results;
=======
    //retrive the bookings from the bookingTable
    public function getBookings(){
        $this->db->query("SELECT COUNT(*) FROM booking");
        return $this->db->resultSet();


    }

    //delete the booking from the bookingTable
    public function deleteBooking($id){
        $this->db->query("DELETE FROM booking WHERE booking_id = :booking_id");
        $this->db->bind(':booking_id', $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    
>>>>>>> main
}

}




?>
