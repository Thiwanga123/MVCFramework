<?php

class Guider{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    //retrive the bookings from the bookingTable
    public function getBookings(){
        $this->db->query("SELECT COUNT(*) FROM bookings");
        return $this->db->resultSet();


    }

    //delete the booking from the bookingTable
    public function deleteBooking($id){
        $this->db->query("DELETE FROM bookings WHERE booking_id = :booking_id");
        $this->db->bind(':booking_id', $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    
}

?>