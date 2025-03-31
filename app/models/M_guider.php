<?php

class M_guider{
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


        public function getGuider(){
            $this->db->query("SELECT * FROM tour_guides");
            print_r($this->db->resultSet());
            return $this->db->resultSet();
        }
        
       
        
       
        

    

}






?>
