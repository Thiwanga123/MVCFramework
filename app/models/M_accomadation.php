<?php

class M_accomadation {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addProperty($data) {
        try {
            // Insert property data into the main properties table
            $query = ('INSERT INTO properties(postal_code,city,property_name,property_type,address,service_provider_id,latitude,
            longitude,single_bedrooms,double_bedrooms,living_rooms,singleprice,doubleprice,familyprice,livingprice,family_rooms,max_occupants,
            bathrooms,children_allowed,offers_ctos,apartment_size,air_conditioning,heating,
            free_wifi,ev_charging,kitchen,kitchenette,washing_machine,flat_screen_tv,
            swimming_pool,hot_tub,minibar,sauna,smoking_allowed,parties_allowed,pets_allowed,check_in_from,
            check_in_until,check_out_from,check_out_until,balcony,garden_view,terrace,view, other_details,image_path ) 
            VALUES (:postal_code, :city, :property_name, :property_type, :address, :service_provider_id, 
            :latitude, :longitude, :single_bedrooms, :double_bedrooms, :living_rooms, :singleprice, :doubleprice, :familyprice, :livingprice, :family_rooms, 
            :max_occupants, :bathrooms, :children_allowed, :offers_ctos, :apartment_size, :air_conditioning, 
            :heating, :free_wifi, :ev_charging, :kitchen, :kitchenette, :washing_machine, :flat_screen_tv, 
            :swimming_pool, :hot_tub, :minibar, :sauna, :smoking_allowed, :parties_allowed, :pets_allowed, 
            :check_in_from, :check_in_until, :check_out_from, :check_out_until, :balcony, :garden_view, 
            :terrace, :view, :other_details, :image_path)');
            $this->db->query($query);

            // Bind values
            $this->db->bind(':postal_code', $data['postalCode']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':property_type', $data['type']);
            $this->db->bind(':property_name', $data['name']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':service_provider_id', $data['id']);
            $this->db->bind(':latitude', $data['latitude']);
            $this->db->bind(':longitude', $data['longitude']);
            $this->db->bind(':single_bedrooms', $data['single']);
            $this->db->bind(':singleprice', $data['singleprice']);
            $this->db->bind(':double_bedrooms', $data['double']);
            $this->db->bind(':doubleprice', $data['doubleprice']);
            $this->db->bind(':living_rooms', $data['living']);
            $this->db->bind(':livingprice', $data['livingprice']);
            $this->db->bind(':family_rooms', $data['family']);
            $this->db->bind(':familyprice', $data['familyprice']);
            $this->db->bind(':max_occupants', $data['guests']);
            $this->db->bind(':bathrooms', $data['bathrooms']);
            $this->db->bind(':children_allowed', $data['children']);
            $this->db->bind(':offers_ctos', $data['cots']);
            $this->db->bind(':apartment_size', $data['apartment_size']);
            $this->db->bind(':air_conditioning', $data['air_conditioning']);
            $this->db->bind(':heating', $data['heating']);
            $this->db->bind(':free_wifi', $data['wifi']);
            $this->db->bind(':ev_charging', $data['ev_charging']);
            $this->db->bind(':kitchen', $data['kitchen']);
            $this->db->bind(':kitchenette', $data['kitchenette']);
            $this->db->bind(':air_conditioning',$data['air_conditioning']);
            $this->db->bind(':heating',$data['heating']);
            $this->db->bind(':free_wifi',$data['wifi']);
            $this->db->bind(':ev_charging',$data['ev_charging']);
            $this->db->bind(':kitchen',$data['kitchen']);
            $this->db->bind(':kitchenette',$data['kitchenette']);
            $this->db->bind(':washing_machine',$data['washing_machine']);
            $this->db->bind(':flat_screen_tv',$data['tv']);
            $this->db->bind(':swimming_pool',$data['swimming_pool']);
            $this->db->bind(':hot_tub',$data['hot_tub']);
            $this->db->bind(':minibar',$data['minibar']);
            $this->db->bind(':sauna',$data['sauna']);
            $this->db->bind(':smoking_allowed',$data['smoking']);
            $this->db->bind(':parties_allowed',$data['parties']);
            $this->db->bind(':pets_allowed',$data['pets']);
            $this->db->bind(':check_in_from',$data['checkin_from']);
            $this->db->bind(':check_in_until',$data['checkin_until']);
            $this->db->bind(':check_out_from',$data['checkout_from']);
            $this->db->bind(':check_out_until',$data['checkout_until']);
            $this->db->bind(':balcony',$data['balcony']);
            $this->db->bind(':garden_view',$data['garden_view']);
            $this->db->bind(':terrace',$data['terrace']);
            $this->db->bind(':view',$data['view']);
            $this->db->bind(':other_details',$data['other_details']);
            $this->db->bind(':image_path',$data['imageUrls']);

            // Execute the query
            if ($this->db->execute()) {
                // Get the last inserted ID using a standard SQL query
                $this->db->query("SELECT LAST_INSERT_ID() as id");

               
                $result = $this->db->single();
                
                return $result->id;
            } else {
                // Return detailed error
                return ['error' => 'Database insertion failed. Please check your input data.'];
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            
            // Determine a user-friendly error message based on the exception
            $errorMessage = 'Database error occurred';
            
            // Check for specific error types
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                $errorMessage = 'This property already exists in the database.';
            } elseif (strpos($e->getMessage(), 'Data too long') !== false) {
                $errorMessage = 'Some input data exceeds the maximum allowed length.';
            } elseif (strpos($e->getMessage(), 'Cannot add or update a child row') !== false) {
                $errorMessage = 'Invalid reference data. Please check your inputs.';
            }
            
            return ['error' => $errorMessage];
        }
    }

    public function addPropertyImage($propertyId, $imagePath) {
        try {
            // Insert into property_images table
            $sql = "INSERT INTO property_images (property_id, image_path) VALUES (?, ?)";
            $this->db->query($sql);
            $this->db->bind(1, $propertyId);
            $this->db->bind(2, $imagePath);
            
            if ($this->db->execute()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
    public function deleteProperty($propertyId) {
        try {
            // Check for existing bookings with check_out date today or in the future
            $sql = "SELECT * FROM property_booking WHERE property_id = ? AND check_out >= CURDATE()";
            $this->db->query($sql);
            $this->db->bind(1, $propertyId);
            $existingBookings = $this->db->resultSet();
    
            if (!empty($existingBookings)) {
                // If there are existing bookings, do not allow deletion
                echo "<script>alert('Cannot delete property with existing bookings.');</script>";
                return false;
            }
    
            // If no existing bookings, proceed with deletion
            $sql = "DELETE FROM properties WHERE property_id = ?";
            $this->db->query($sql);
            $this->db->bind(1, $propertyId);
            $this->db->execute();
    
            return true;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return false;
        }
    }    
        
    

    //get the accomadation from the database with respect to the accomadation supplier
    public function getAccomadation($userId) {
        try {
            $sql = "SELECT * FROM properties WHERE service_provider_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $accomadation = $this->db->resultSet();

            return $accomadation;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

    public function viewdetails($property_id){
        try {
            $sql = "SELECT * FROM properties WHERE property_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $property_id);

            $result= $this->db->single();

            return $result;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }


    //get the bookings from the property_booking table to the related service provider
    public function getBookings($userId) {
        try {
            $sql = "SELECT pb.*, t.name as traveler_name, p.property_name, p.property_type
                FROM property_booking pb
                JOIN traveler t ON pb.traveler_id = t.traveler_id
                JOIN properties p ON pb.property_id = p.property_id
                WHERE pb.supplier_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $bookings = $this->db->resultSet();

            return $bookings;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

    public function getTotalBookings($userId) {
        try {
            $sql = "SELECT COUNT(*) as total_bookings FROM property_booking WHERE supplier_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $totalBookings = $this->db->single();

            return $totalBookings;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

    //get the last theree bookings by the checking check_in and check_out dates
    public function getRecentBookings($userId) {
        try {
            $sql = "SELECT pb.*, p.property_name, t.name as traveler_name 
                    FROM property_booking pb
                    JOIN properties p ON pb.property_id = p.property_id
                    JOIN traveler t ON pb.traveler_id = t.traveler_id
                    WHERE pb.supplier_id = ? 
                    ORDER BY pb.check_in DESC 
                    LIMIT 5";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $lastThreeBookings = $this->db->resultSet();

 // Debugging line to check the result

            return $lastThreeBookings;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }


    public function getTotalAccomadation($userId) {
        try {
            $sql = "SELECT COUNT(*) as total_accomadation FROM properties WHERE service_provider_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $totalAccomadation = $this->db->single();

          

            return $totalAccomadation;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

    //get the Payments from the property_booking table to the related service provider

    public function getPayments($userId) {
        try {
            $sql = "SELECT p.*, t.name as traveler_name, pr.property_name
            FROM property_booking p
            JOIN traveler t ON p.traveler_id = t.traveler_id
            JOIN properties pr ON p.property_id = pr.property_id
            WHERE p.supplier_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $payments = $this->db->resultSet();

            return $payments;

        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

    public function releaseHoldingAmount() {
        $currentDate = date('Y-m-d 10:59:59');
        $this->db->query("SELECT * FROM property_booking WHERE status = 'Pending' AND check_in <= :current_date");
        $this->db->bind(':current_date', $currentDate);
        $bookings = $this->db->resultSet();

        foreach ($bookings as $booking) {
            $this->db->query("UPDATE accomadation_wallet SET wallet_balance = wallet_balance + holding_amount, holding_amount = 0 WHERE provider_id = :provider_id");
            $this->db->bind(':provider_id', $booking['supplier_id']);
            $this->db->execute();

            $this->db->query("UPDATE property_booking SET status = 'Confirmed' WHERE booking_id = :id");
            $this->db->bind(':id', $booking['booking_id']);
            $this->db->execute();
        }
    }

    public function createReleaseHoldingAmountEvent() {
        $this->db->query("
            CREATE EVENT IF NOT EXISTS release_holding_amount_event
            ON SCHEDULE EVERY 1 DAY
            STARTS CURRENT_DATE + INTERVAL 10 HOUR
            DO
            BEGIN
                DECLARE current_date DATETIME;
                SET current_date = NOW();
                
                UPDATE accomadation_wallet aw
                JOIN property_booking pb ON aw.provider_id = pb.supplier_id
                SET aw.wallet_balance = aw.wallet_balance + aw.holding_amount, 
                    aw.holding_amount = 0,
                    pb.status = 'Confirmed'
                WHERE pb.status = 'Pending' AND pb.check_in <= current_date;
            END
        ");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getBookingDates($userId) {
        try {
            $sql = "SELECT check_in, check_out FROM property_booking WHERE supplier_id = ?";
            $this->db->query($sql);
            $this->db->bind(1, $userId);
            $bookings = $this->db->resultSet();

            $dates = [];
            foreach ($bookings as $booking) {
                $start = new DateTime($booking->check_in);
                $end = new DateTime($booking->check_out);
                while ($start <= $end) {
                    $dates[] = $start->format('Y-m-d');
                    $start->modify('+1 day');
                }
            }
            return $dates;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public function updateProperty($data) {
        try {
            $this->db->query('UPDATE properties SET 
                property_name = :property_name,
                singleprice = :singleprice,
                doubleprice = :doubleprice,
                livingprice = :livingprice,
                familyprice = :familyprice,
                max_occupants = :max_occupants,
                children_allowed = :children_allowed,
                offers_ctos = :offers_ctos,
                air_conditioning = :air_conditioning,
                heating = :heating,
                free_wifi = :free_wifi,
                ev_charging = :ev_charging,
                kitchen = :kitchen,
                kitchenette = :kitchenette,
                washing_machine = :washing_machine,
                flat_screen_tv = :flat_screen_tv,
                swimming_pool = :swimming_pool,
                hot_tub = :hot_tub,
                minibar = :minibar,
                sauna = :sauna,
                smoking_allowed = :smoking_allowed,
                parties_allowed = :parties_allowed,
                pets_allowed = :pets_allowed,
                check_in_from = :check_in_from,
                check_in_until = :check_in_until,
                check_out_from = :check_out_from,
                check_out_until = :check_out_until,
                balcony = :balcony,
                garden_view = :garden_view,
                terrace = :terrace,
                view = :view,
                other_details = :other_details
            WHERE property_id = :property_id');

            // Bind values
            $this->db->bind(':property_id', $data['property_id']);
            $this->db->bind(':property_name', $data['property_name']);
            $this->db->bind(':singleprice', $data['singleprice']);
            $this->db->bind(':doubleprice', $data['doubleprice']);
            $this->db->bind(':livingprice', $data['livingprice']);
            $this->db->bind(':familyprice', $data['familyprice']);
            $this->db->bind(':max_occupants', $data['max_occupants']);
            $this->db->bind(':children_allowed', $data['children_allowed']);
            $this->db->bind(':offers_ctos', $data['offers_ctos']);
            $this->db->bind(':air_conditioning', $data['air_conditioning']);
            $this->db->bind(':heating', $data['heating']);
            $this->db->bind(':free_wifi', $data['free_wifi']);
            $this->db->bind(':ev_charging', $data['ev_charging']);
            $this->db->bind(':kitchen', $data['kitchen']);
            $this->db->bind(':kitchenette', $data['kitchenette']);
            $this->db->bind(':washing_machine', $data['washing_machine']);
            $this->db->bind(':flat_screen_tv', $data['flat_screen_tv']);
            $this->db->bind(':swimming_pool', $data['swimming_pool']);
            $this->db->bind(':hot_tub', $data['hot_tub']);
            $this->db->bind(':minibar', $data['minibar']);
            $this->db->bind(':sauna', $data['sauna']);
            $this->db->bind(':smoking_allowed', $data['smoking_allowed']);
            $this->db->bind(':parties_allowed', $data['parties_allowed']);
            $this->db->bind(':pets_allowed', $data['pets_allowed']);
            $this->db->bind(':check_in_from', $data['check_in_from']);
            $this->db->bind(':check_in_until', $data['check_in_until']);
            $this->db->bind(':check_out_from', $data['check_out_from']);
            $this->db->bind(':check_out_until', $data['check_out_until']);
            $this->db->bind(':balcony', $data['balcony']);
            $this->db->bind(':garden_view', $data['garden_view']);
            $this->db->bind(':terrace', $data['terrace']);
            $this->db->bind(':view', $data['view']);
            $this->db->bind(':other_details', $data['other_details']);

            // Execute the query
            $this->db->execute();

            return true;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

}

?>