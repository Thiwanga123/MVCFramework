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
        $sql = "SELECT name, email, username, telephone_number, date_of_joined FROM traveler WHERE traveler_id = ?";
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
        $sql = "
        (SELECT 
            pb.booking_id AS booking_id, 
            'Accommodation' AS type, 
            p.property_name AS name, 
            pb.check_in AS start_date, 
            pb.check_out AS end_date, 
            pb.status, 
            pb.paid AS price
         FROM property_booking pb
         JOIN properties p ON pb.property_id = p.property_id
         WHERE pb.traveler_id = :traveler_id)

        UNION ALL

        (SELECT 
            vb.booking_id AS booking_id, 
            'Vehicle' AS type, 
            v.model AS name, 
            vb.check_in AS start_date, 
            vb.check_out AS end_date, 
            vb.status, 
            vb.paid AS price
         FROM vehicle_booking vb
         JOIN vehicles v ON vb.vehicle_id = v.id
         WHERE vb.traveler_id = :traveler_id)

        UNION ALL

        (SELECT 
            eb.booking_id AS booking_id, 
            'Equipment' AS type, 
            e.rental_name AS name,
            eb.start_date, 
            eb.end_date, 
            eb.status, 
            eb.total_price
         FROM rental_equipment_bookings eb
         JOIN rental_equipments e ON eb.equipment_id = e.id
         WHERE eb.user_id = :traveler_id)

        UNION ALL

        (SELECT 
            gb.booking_id AS booking_id, 
            'Guide' AS type, 
            g.name AS name, 
            gb.check_in AS start_date,
            gb.check_out AS end_date, 
            gb.status, 
            gb.paid AS price
         FROM guider_booking gb
         JOIN tour_guides g ON gb.guider_id = g.id
         WHERE gb.traveler_id = :traveler_id)

        ORDER BY start_date DESC
    ";

        $this->db->query($sql);
        $this->db->bind(':traveler_id', $id);

        $row = $this->db->resultSet();

        return $row;
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

        //print the data
        print_r($data);
        $this->db->query('INSERT INTO property_booking(traveler_id, property_id, supplier_id,check_in, check_out,amount, guests,singlerooms,doublerooms,familyrooms,totalrooms,paid,payment_date) 
        VALUES(:traveler_id, :property_id, :service_provider_id, :check_in, :check_out, :total_price , :no_of_people , :singleroom, :doubleroom, :familyroom, :totalrooms, :paid, CURRENT_DATE)');
        //bind values
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
        $this->db->bind(':paid',$data['paid']);
        

        //execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //cancel the booking
    public function cancelBooking($bookingId) {
        // Get the booking details
        $this->db->query('SELECT * FROM property_booking WHERE booking_id = :booking_id');
        $this->db->bind(':booking_id', $bookingId);
        $booking = $this->db->single();

        if ($booking) {
            // Update the deleted_at column
            $this->db->query('UPDATE property_booking SET deleted_at = NOW() WHERE booking_id = :booking_id');
            $this->db->bind(':booking_id', $bookingId);
            $this->db->execute();

            // Release the rooms
            $this->db->query('UPDATE properties SET 
                                single_bedrooms = single_bedrooms + :single_rooms, 
                                double_bedrooms = double_bedrooms + :double_rooms, 
                                family_rooms = family_rooms + :family_rooms 
                              WHERE property_id = :property_id');
            $this->db->bind(':single_rooms', $booking->single_rooms);
            $this->db->bind(':double_rooms', $booking->double_rooms);
            $this->db->bind(':family_rooms', $booking->family_rooms);
            $this->db->bind(':property_id', $booking->property_id);
            $this->db->execute();

            return true;
        } else {
            return false;
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