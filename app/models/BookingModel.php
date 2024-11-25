<?php

class BookingModel{

   private $db;

   public function __construct() {
       $this->db = new Database();
   }

   public function getBookings($guider_id){
//get the bookings from the database with the relavent guiderid
    $this->db->query('SELECT * FROM bookings WHERE guider_id = :guider_id');

    $this->db->bind(':guider_id', $guider_id);

    $results = $this->db->resultSet();
    return $results;
}

//get the bookings of the guider

public function getGuiderBookings($guider_id){
   
    //count the bookings by the guider id
    $this->db->query('SELECT COUNT(*) as number_of_bookings FROM bookings WHERE guider_id = :guider_id');

    $this->db->bind(':guider_id', $guider_id);

    $row = $this->db->single();

    return $row->number_of_bookings;
}



 


   
}

?>
