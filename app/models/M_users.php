<?php
class M_users{

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

  



    //get all users
    public function getUsers(){
        $this->db->query("SELECT * FROM traveler");
        return $this->db->resultSet();
    }

    //find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM traveler WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();


        //check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    //get the booking history of the user
    public function getBookingHistory($id){
        $this->db->query('SELECT * FROM user_bookings WHERE TravelerID = :traveler_id');
        $this->db->bind(':traveler_id', $id);

        return $this->db->resultSet();
    }

    //register user
    public function register($data){
        //print the data
    
        
        $this->db->query('INSERT INTO traveler(name,  email, password, telephone_number, date_of_joined) VALUES(:name,  :email, :password, :telephone_number, CURRENT_DATE)');
        //bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':telephone_number', $data['telephone_number']);



        //execute
        if($this->db->execute()){
            return true;
           
        }else{
            return false;
        }
    }


   

     // Get user by ID
        public function getUserById($id){
            $this->db->query('SELECT * FROM traveler WHERE traveler_id = :traveler_id');
            $this->db->bind(':traveler_id', $id);
    
            $row = $this->db->single();
    
            return $row;
        }
    //login user


    public function login($email, $password) {
        $this->db->query('SELECT * FROM traveler WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

           
           
           
    if ($row) {
        $hashedPassword = $row->password;
        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    } else {
        return false;
    }
        }
        
    //get all the accomodations from the database
    public function searchAccommodations($data){

        
        $this->db->query('SELECT * FROM properties WHERE city = :city AND (singleprice <= :price OR doubleprice <= :price OR familyprice <= :price OR livingprice <= :price) AND max_occupants >= :people');
        //bind parameters indexes


        $this->db->bind(':city', $data[0]);
        $this->db->bind(':price', $data[1]);
        $this->db->bind(':people', $data[2]);

        return $this->db->resultSet();
       
    
        
    }

    //get the accomodation details
    public function getAccommodationById($property_id){
        $this->db->query('SELECT * FROM properties WHERE property_id = :property_id');
        $this->db->bind(':property_id', $property_id);

        $row = $this->db->single();

        return $row;
    }


    //get available rooms
    public function getAvailableRooms($property_id) {
        // Get total rooms from properties table
        $this->db->query('SELECT single_bedrooms, double_bedrooms, family_rooms FROM properties WHERE property_id = :property_id');
        $this->db->bind(':property_id', $property_id);
        $property = $this->db->single();

        // Get booked rooms from property_booking table
        $this->db->query('SELECT 
                            SUM(singlerooms) AS booked_single_rooms, 
                            SUM(doublerooms) AS booked_double_rooms, 
                            SUM(familyrooms) AS booked_family_rooms 
                          FROM property_booking 
                          WHERE property_id = :property_id AND check_out >= CURDATE()');
        $this->db->bind(':property_id', $property_id);
        $bookings = $this->db->single();

        // Calculate available rooms
        $availableRooms = [
            'single_bedrooms' => $property->single_bedrooms - $bookings->booked_single_rooms,
            'double_bedrooms' => $property->double_bedrooms - $bookings->booked_double_rooms,
            'family_rooms' => $property->family_rooms - $bookings->booked_family_rooms
        ];

        return $availableRooms;

    }

    //add a booking to the proerty_booking
    public function book($data){

        $this->db->query('INSERT INTO property_booking(traveler_id, property_id, supplier_id, check_in, check_out, amount, guests, singlerooms, doublerooms, familyrooms, totalrooms, paid, payment_date, payment_status) 
        VALUES(:traveler_id, :property_id, :service_provider_id, :check_in, :check_out, :total_price, :no_of_people, :singleroom, :doubleroom, :familyroom, :totalrooms, :paid, CURRENT_DATE, "charged")');
        //bind values and after excution get the booking_id

        $this->db->bind(':traveler_id', $data['user_id']);
        $this->db->bind(':property_id', $data['property_id']);
        $this->db->bind(':check_in', $data['check_in']);
        $this->db->bind(':check_out', $data['check_out']);
        $this->db->bind(':no_of_people', $data['people']);
        $this->db->bind(':total_price', $data['price']);
        $this->db->bind(':totalrooms', $data['totalrooms']);
        $this->db->bind(':singleroom', $data['singleamount']);
        $this->db->bind(':doubleroom', $data['doubleamount']);
        $this->db->bind(':familyroom', $data['familyamount']);
        $this->db->bind(':service_provider_id', $data['service_provider_id']);
        $this->db->bind(':paid', $data['paid']);
    
        //call the function to hold the payment
        

        //execute
        if($this->db->execute()){
            $booking= $this->db->insertId();{
                return $booking;
            }
        }else{
            return false;
        }
}

    //hold the payment
    public function holdPayment($amount, $providerId, $user_id,$bookingId){ {
     
        // Hold payment in the provider's wallet
        $this->db->query("INSERT INTO accomadation_wallet (provider_id,traveler_id, holding_amount, transaction_type, related_booking_id, transaction_date) VALUES (:provider_id, :traveler_id, :amount, 'deposit', :booking_id, CURRENT_DATE)");
        $this->db->bind(':amount', $amount);
        $this->db->bind(':provider_id', $providerId);
        $this->db->bind(':booking_id', $bookingId);
        $this->db->bind(':traveler_id', $user_id);
        //execute
        if($this->db->execute()){
            //print the data
            
            return true;
        }else{
            return false;
        }
    }
}

    //cancel the booking
   
        public function cancelBooking($bookingId, $travelerId) {
            try {
                // Fetch booking details
                $this->db->query("SELECT check_in, amount, supplier_id, status FROM property_booking WHERE booking_id = :booking_id AND traveler_id = :traveler_id");
                $this->db->bind(':booking_id', $bookingId);
                $this->db->bind(':traveler_id', $travelerId);
                $booking = $this->db->single();
    
                if (!$booking || $booking['status'] !== 'pending') {
                    return ['success' => false, 'message' => 'Booking not found or already processed.'];
                }
    
                $daysDiff = (strtotime($booking['check_in']) - time()) / (60 * 60 * 24);
                $refund = ($daysDiff > 3) ? $booking['amount'] : $booking['amount'] * 0.9;
    
                // Update booking with cancellation details
                $this->db->query("UPDATE property_booking 
                                  SET status = 'cancelled', 
                                      refund_amount = :refund, 
                                      cancellation_date = NOW(), 
                                      cancellation_by = 'user' 
                                  WHERE booking_id = :booking_id");
                $this->db->bind(':refund', $refund);
                $this->db->bind(':booking_id', $bookingId);
                $this->db->execute();
    
                // If within 3 days, retain 10% in provider's wallet (already in holding_amount, will release via event)
                return [
                    'success' => true,
                    'message' => 'Booking cancelled successfully.',
                    'refund' => $refund
                ];
            } catch (Exception $e) {
                error_log("Error cancelling booking: " . $e->getMessage());
                return ['success' => false, 'message' => 'Error cancelling booking: ' . $e->getMessage()];
            }
        }
    



    //show the accomodation details
    public function showAccommodation($data){
        //select the properties that relavant place and start date and end date
        $this->db->query('SELECT * FROM properties WHERE city = :city AND  max_occupants >= :people');
        //bind parameters 
        $this->db->bind(':city', $data[0]);
        $this->db->bind(':people', $data[1]);

        //print the result
        print($this->db->resultSet());
        return $this->db->resultSet();

    

}

public function getAllVehicles($supplierId){
    try {
        $sql = "SELECT v.*, i.image_path 
                FROM vehicles v 
                LEFT JOIN vehicle_images i ON v.id = i.vehicle_id 
                WHERE v.supplierId = ? 
                GROUP BY v.id"; // Ensure unique vehicles

        $this->db->query($sql);
        $this->db->bind(1, $supplierId);
        return $this->db->resultSet();
    } catch (Exception $e) {
        error_log("Error fetching vehicles: " . $e->getMessage());
        return [];
    }
}
}

?>