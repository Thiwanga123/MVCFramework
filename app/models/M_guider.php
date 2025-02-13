<?php

class guider{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }






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

    //update the profile of the guide
    public function updateProfile($data){
        $this->db->query('UPDATE tour_guide SET first_name = :first_name, last_name = :last_name, email = :email, phone_number = :phone_number WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone_number', $data['phone_number']);
        

    }

    

}






?>
