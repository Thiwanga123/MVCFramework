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

//get the available bookings with the relavannt of the guider
public function getAvailability($guider_id){
    $this->db->query('SELECT * FROM guider_availability WHERE guider_id = :guider_id');

    $this->db->bind(':guider_id', $guider_id);

    $results = $this->db->resultSet();
    return $results;



}

//delete a specific the availability of the tour guider with the relavannt of the guider by id

public function deleteGuiderAvailability($id){
    $this->db->query('DELETE FROM guider_availability WHERE id = :id');

    $this->db->bind(':id', $id);

    $this->db->execute();
}


}
?>

 


   



