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

//add the availability of the guider

public function addAvailability($data){
    $this->db->query('INSERT INTO guider_availability (guider_id, available_date, available_time,charges_per_hour,location) VALUES (:guider_id, :date, :time, :charges_per_hour, :location)');

    $this->db->bind(':guider_id', $data['guider_id']);
    $this->db->bind(':date', $data['date']);
    $this->db->bind(':time', $data['time']);
    $this->db->bind(':charges_per_hour', $data['charges_per_hour']);
    $this->db->bind(':location', $data['location']);

    $this->db->execute();

    if($this->db->rowCount() > 0){
        return true;
    } else {
        return false;
    }
}

//edit the availability to the  relavant guider

public function editAvailability($data){
    $this->db->query('UPDATE guider_availability SET available_date = :date, available_time = :time, charges_per_hour = :charges_per_hour, location = :location WHERE id = :id && guider_id = :guider_id');

    $this->db->bind(':date', $data['date']);
    $this->db->bind(':time', $data['time']);
    $this->db->bind(':charges_per_hour', $data['charges_per_hour']);
    $this->db->bind(':location', $data['location']);
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':guider_id', $data['guider_id']);

    $this->db->execute();

    if($this->db->rowCount() > 0){
        return true;
    } else {
        return false;
    }
}

public function updateProfile($data){
    $this->db->query('UPDATE tour_guides SET name = :name, address = :address, email = :email, phone_number = :phone_number,laguage=:language,password=:password WHERE id = :id');

    $this->db->bind(':id', $data['id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone_number', $data['phone']);
    $this->db->bind(':language', $data['language']);
    $this->db->bind(':password', $data['password']);
    $this->db->execute();
    if($this->db->rowCount() > 0){
        return true;
    } else {
        return false;
    }

}


}
?>

 


   



