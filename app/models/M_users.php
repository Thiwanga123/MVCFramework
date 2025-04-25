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

    public function getUserDetailsById($userId){
        $sql = "SELECT * FROM traveler WHERE traveler_id = ?";
        try {
            $this->db->query($sql);
            $this->db->bind(1, $userId); 
            $result = $this->db->single();
            return $result;        
        } catch (Exception $e) {
            error_log("Error fetching user by ID: " . $e->getMessage());
            return [];
        }
    }

    public function findUsersByEmail($email,$table){
        $sql = "SELECT * FROM $table WHERE email = :email";
        try{
            $this->db->query($sql);
            $this->db->bind(':email', $email);
            $result = $this->db->single();
            return $result;
        } catch (Exception $e) {
            error_log("Error fetching users by email: " . $e->getMessage());
            return [];
        }
        
    }

    public function storeResetToken($email, $table, $token, $expiry){
        $sql = "INSERT INTO password_resets (email, user_type, token, expires_at)
                    VALUES (:email, :tableName, :token, :expiry)
                    ON DUPLICATE KEY UPDATE 
                    token = VALUES(token),
                    expires_at = VALUES(expires_at),
                    created_at = CURRENT_TIMESTAMP";
        try{
            $this->db->query($sql);
            $this->db->bind(':email', $email);
            $this->db->bind(':tableName', $table);
            $this->db->bind(':token', $token);
            $this->db->bind(':expiry', $expiry);
            return $this->db->execute();
        } catch (Exception $e) {
            error_log("Error storing reset token: " . $e->getMessage());
            return false;
        }
    }

    public function findUserByResetToken($token){
        echo($token);
        $sql = "SELECT * FROM password_resets WHERE token = :token";
        
        try{
            $this->db->query($sql);
            $this->db->bind(':token', $token);
            $result = $this->db->single();
            print_r($result);
            exit;
            return $result;
        } catch (Exception $e) {
            error_log("Error fetching user by reset token: " . $e->getMessage());
            return [];
        }
    }

    public function updateUserPassword($email, $password){
        $sql = "UPDATE traveler SET password = :password WHERE email = :email";
        try{
            $this->db->query($sql);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $password);
            return $this->db->execute();
        } catch (Exception $e) {
            error_log("Error updating user password: " . $e->getMessage());
            return false;
        }
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
        // Get booking history for the user
       
        $sql = "
        SELECT 
            pb.booking_id AS booking_id, 
            'Accommodation' AS type, 
            p.property_name AS name, 
            p.property_id AS id,
            pb.check_in AS start_date, 
            pb.check_out AS end_date, 
            pb.status, 
            pb.amount AS price
         FROM property_booking pb
         JOIN properties p ON pb.property_id = p.property_id
         WHERE pb.traveler_id = :traveler_id AND pb.status IS NOT NULL

        UNION ALL

        SELECT 
            vb.booking_id AS booking_id, 
            'Vehicle' AS type, 
            v.model AS name, 
            v.vehicle_id AS id,
            vb.check_in AS start_date, 
            vb.check_out AS end_date, 
            vb.status, 
            vb.amount AS price
         FROM vehicle_booking vb
         JOIN vehicles v ON vb.vehicle_id = v.vehicle_id
         WHERE vb.traveler_id = :traveler_id AND vb.status IS NOT NULL

        UNION ALL

        SELECT 
            eb.booking_id AS booking_id, 
            'Equipment' AS type, 
            e.rental_name AS name,
            e.id AS id,
            eb.start_date, 
            eb.end_date, 
            eb.status, 
            eb.total_price
         FROM rental_equipment_bookings eb
         JOIN rental_equipments e ON eb.equipment_id = e.id
         WHERE eb.user_id = :traveler_id AND eb.status IS NOT NULL

        UNION ALL

        SELECT 
            gb.booking_id AS booking_id, 
            'Guide' AS type, 
            g.name AS name, 
            g.id AS id,
            gb.check_in AS start_date,
            gb.check_out AS end_date, 
            gb.status, 
            gb.amount AS price
         FROM guider_booking gb
         JOIN tour_guides g ON gb.guider_id = g.id
         WHERE gb.traveler_id = :traveler_id AND gb.status IS NOT NULL

        ORDER BY start_date DESC
        ";
    


        try {
            $this->db->query($sql);
            $this->db->bind(':traveler_id', $id);

            $row = $this->db->resultSet();

            if (!$row) {
                error_log("No results found for traveler_id: " . $id);
                return [];
            }

            return $row;
        } catch (Exception $e) {
            error_log("Error executing query for booking history: " . $e->getMessage());
            return [];
        }
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

        

        
        $this->db->query('SELECT * FROM properties WHERE city = :city AND (singleprice <= :price OR doubleprice <= :price OR familyprice <= :price OR livingprice <= :price) ');
        //bind parameters indexes


        $this->db->bind(':city', $data[0]);
        $this->db->bind(':price', $data[1]);
        $this->db->bind(':people', $data[2]);

        return $this->db->resultSet();
       
    
        
    }

 

    //get the accomodation details
    public function getAccommodationById($property_id, $check_in = null, $check_out = null){
        // Get basic property information
        $this->db->query('SELECT * FROM properties WHERE property_id = :property_id');
        $this->db->bind(':property_id', $property_id);
        $property = $this->db->single();
        
        // If dates are provided, get room availability for those dates
        if ($check_in && $check_out) {
            $property->available_rooms = $this->getAvailableRooms($property_id, $check_in, $check_out);

        }
        
        return $property;
    }


    //get available rooms
    // public function getAvailableRooms($property_id) {
    //     // Get total rooms from properties table
    //     $this->db->query('SELECT single_bedrooms, double_bedrooms, family_rooms FROM properties WHERE property_id = :property_id');
    //     $this->db->bind(':property_id', $property_id);
    //     $property = $this->db->single();

    //     // Get booked rooms from property_booking table
    //     $this->db->query('SELECT 
    //                         SUM(singlerooms) AS booked_single_rooms, 
    //                         SUM(doublerooms) AS booked_double_rooms, 
    //                         SUM(familyrooms) AS booked_family_rooms 
    //                       FROM property_booking 
    //                       WHERE property_id = :property_id AND check_out >= CURDATE()');
    //     $this->db->bind(':property_id', $property_id);
    //     $bookings = $this->db->single();

    //     // Calculate available rooms
    //     $availableRooms = [
    //         'single_bedrooms' => $property->single_bedrooms - $bookings->booked_single_rooms,
    //         'double_bedrooms' => $property->double_bedrooms - $bookings->booked_double_rooms,
    //         'family_rooms' => $property->family_rooms - $bookings->booked_family_rooms
    //     ];

    //     return $availableRooms;

    // }

    //add a booking to the proerty_booking
    public function book_accomodation($data) {
 // Debugging line to check the data
        try {
           
            // Insert booking
            $this->db->query('INSERT INTO property_booking (traveler_id, property_id, supplier_id, check_in, check_out, amount,  singlerooms, doublerooms, familyrooms, totalrooms, payment_date, payment_status) 
                              VALUES (:traveler_id, :property_id, :service_provider_id, :check_in, :check_out, :total_price,  :singlerooms, :doublerooms, :familyrooms, :totalrooms, CURRENT_DATE, "charged")');
            
            $this->db->bind(':traveler_id', $data['user_id']);
            $this->db->bind(':property_id', $data['property_id']);
            $this->db->bind(':check_in', $data['check_in']);
            $this->db->bind(':check_out', $data['check_out']);          
            $this->db->bind(':total_price', $data['totalamount']);
            $this->db->bind(':totalrooms', $data['totalrooms']);
            $this->db->bind(':singlerooms', $data['single_rooms']);
            $this->db->bind(':doublerooms', $data['double_rooms']);
            $this->db->bind(':familyrooms', $data['family_rooms']); // Maps to familyrooms in table
            $this->db->bind(':service_provider_id', $data['service_provider_id']);

            if ($this->db->execute()) {

                
                $bookingId = $this->db->insertId(); // Assuming insertId() gets last inserted ID

                // Call function to hold payment (assuming it exists elsewhere)
                $this->holdPayment($bookingId, $data['totalamount'], $data['service_provider_id'], $data['user_id']);

                return ['success' => true, 'message' => 'Booking successful.', 'booking_id' => $bookingId];
            } else {
                return ['success' => false, 'message' => 'Failed to execute booking query.'];
            }
        } catch (Exception $e) {
            error_log("Error booking room: " . $e->getMessage());
            return ['success' => false, 'message' => 'Error booking room: ' . $e->getMessage()];
        }
    }

    // Reusable method to get available rooms (from previous response)
    public function getAvailableRooms($propertyId, $checkIn, $checkOut) {
        try {
            // Get total rooms from properties
            $this->db->query("SELECT single_bedrooms, double_bedrooms, family_rooms FROM properties WHERE property_id = :property_id");
            $this->db->bind(':property_id', $propertyId);
            $total = $this->db->single();
    
            // Calculate maximum booked rooms across the date range
            $this->db->query("SELECT 
                                 COALESCE(MAX(single_booked), 0) as booked_single,
                                 COALESCE(MAX(double_booked), 0) as booked_double,
                                 COALESCE(MAX(family_booked), 0) as booked_family
                              FROM (
                                  SELECT 
                                      SUM(pb.singlerooms) as single_booked,
                                      SUM(pb.doublerooms) as double_booked,
                                      SUM(pb.familyrooms) as family_booked
                                  FROM property_booking pb
                                  WHERE pb.property_id = :property_id
                                    AND pb.status IN ('pending', 'confirmed')
                                    AND (:check_in <= pb.check_out AND :check_out >= pb.check_in)
                                  GROUP BY DATE(pb.check_in)
                              ) as daily_bookings");
            $this->db->bind(':property_id', $propertyId);
            $this->db->bind(':check_in', $checkIn);
            $this->db->bind(':check_out', $checkOut);
            $booked = $this->db->single();
    
            // Calculate available rooms - ensure no negative values
            $availablerooms = [
                'single' => max(0, $total->single_bedrooms - ($booked->booked_single ?? 0)),
                'double' => max(0, $total->double_bedrooms - ($booked->booked_double ?? 0)),
                'family' => max(0, $total->family_rooms - ($booked->booked_family ?? 0))
            ];
    
            // Calculate the stay duration in nights
            
            
            return $availablerooms;
        } catch (Exception $e) {
            error_log("Error getting available rooms: " . $e->getMessage());
            return ['single' => 0, 'double' => 0, 'living' => 0, 'nights' => 0];
        }
    }
    //hold the payment
    public function holdPayment($bookingId, $totalamount, $providerId, $user_id){
     
        // Hold payment in the provider's wallet
        $this->db->query("INSERT INTO accomadation_wallet (provider_id,traveler_id, holding_amount, transaction_type, related_booking_id, transaction_date) VALUES (:provider_id, :traveler_id, :amount, 'deposit', :booking_id, CURRENT_DATE)");
        $this->db->bind(':amount', $totalamount);
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
        try{
            $this->db->query("SELECT v.*, 
            GROUP_CONCAT(vi.image_path) AS images 
            FROM vehicles v 
            LEFT JOIN vehicle_images vi 
            ON v.vehicle_id = vi.vehicle_id
            GROUP BY v.vehicle_id");

            $result = $this->db->resultSet();
            return $result;            


        }catch(Exception $e){
            $error_msg = $e->getMessage();
                echo "<script>alert('An error occurred: $error_msg');</script>";
                return false;
        }
    }

    public function uploadProfileImage($userId,$imagePath) {
        $sql = "UPDATE traveler SET profile_path = ? WHERE traveler_id = ?";
        try{
            $this->db->query($sql);
            $this->db->bind(1, $imagePath);
            $this->db->bind(2, $userId);
            $result = $this->db->execute();
            return $result;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }


    public function getVehicleById($id){
        $sql = 'SELECT * FROM vehicles WHERE vehicle_id = ?';
        try{
            $this->db->query($sql);
            $this->db->bind(1, $id);
            $result = $this->db->single();
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occurred: $error_msg');</script>";
            return false;
        }
    }

    //get guiders by id
    public function getGuiderById($id){
        $sql = 'SELECT * FROM tour_guides WHERE id = ?';
        try{
            $this->db->query($sql);
            $this->db->bind(1, $id);
            $result = $this->db->single();
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occurred: $error_msg');</script>";
            return false;
        }
    }
}

?>