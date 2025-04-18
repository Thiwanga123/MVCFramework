<?php

class BookingModel{

   private $db;

   public function __construct() {
       $this->db = new Database();
   }

   public function getBookings($guider_id){
//get the bookings from the database with the relavent guiderid
    $this->db->query('SELECT * FROM bookings WHERE id = :guider_id');

    $this->db->bind(':guider_id', $guider_id);

    $results = $this->db->resultSet();
    return $results;
}

//get the bookings of the guider

public function getGuiderBookings($guider_id){
   
    //count the bookings by the guider id
    $this->db->query('SELECT COUNT(*) as number_of_bookings FROM bookings WHERE id = :guider_id');

    $this->db->bind(':guider_id', $guider_id);

    $row = $this->db->single();

    return $row->number_of_bookings;
}

//get the available bookings with the relavannt of the guider
public function getAvailability($guider_id){
    $this->db->query('SELECT * FROM guider_availability WHERE id = :guider_id');

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


//id is auto increment
public function addAvailability($data){

  
    $this->db->query('INSERT INTO guider_availability(guider_id, available_date, charges_per_hour,location,available_time_from,available_time_to) VALUES (:guider_id, :available_date,  :charges_per_hour, :location,:available_time_from,:available_time_to)');

    $this->db->bind(':guider_id', $data['guider_id']);
    $this->db->bind(':available_date', $data['available_date']);
    $this->db->bind(':charges_per_hour', $data['charges_per_hour']);
    $this->db->bind(':location', $data['location']);
    $this->db->bind(':available_time_from', $data['available_time_from']);
    $this->db->bind(':available_time_to', $data['available_time_to']);
   
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
    $this->db->query('UPDATE tour_guides SET name = :name, address = :address, email = :email, phone = :phone, language = :language, password = :password WHERE id = :id');
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':language', $data['language']);
    $this->db->bind(':password', $data['password']);
    $this->db->execute();
    if($this->db->rowCount() > 0){
        return true;
    } else {
        return false;
    }

}



//////////////////////////////////////////////////////////// EQUIPMENT BOOKINGS////////////////////////////////////////////////////////////////////////////

    public function addEquipmentBooking($data){   
        $sql = "INSERT INTO rental_equipment_bookings (user_id, equipment_id, supplier_id, start_date, end_date, total_price) VALUES (?, ?, ?, ?, ?, ?)";
        try{
            $this->db->query($sql);
            $this->db->bind(1,$data['user_id']);
            $this->db->bind(2,$data['product_id']);
            $this->db->bind(3,$data['supplier_id']);
            $this->db->bind(4,$data['booking_start_date']);
            $this->db->bind(5,$data['booking_end_date']);
            $this->db->bind(6,$data['totalPrice']);
            return $this->db->execute();
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function getBookingsByEquipmentId($productId){
        $sql = "SELECT user_id, start_date, end_date, status FROM rental_equipment_bookings WHERE equipment_id = ?";
        try{
            $this->db->query($sql);
            $this->db->bind(1,$productId);
            $result = $this->db->resultSet();
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function getBookingsBySupplierId($supplierId){
        $sql = "SELECT b.*, ri.image_path
                FROM rental_equipment_bookings b 
                LEFT JOIN rental_images ri ON b.equipment_id = ri.product_id
                AND ri.image_id = (SELECT MIN(image_id) FROM rental_images WHERE product_id = b.equipment_id)
                WHERE b.supplier_id = ?";
        try{
            $this->db->query($sql);
            $this->db->bind(1, $supplierId);
            $result = $this->db->resultSet();
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }


}
?>

 


   



