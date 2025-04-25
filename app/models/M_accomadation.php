<?php

class M_accomadation{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addProperty($data) {


            try {
            // Begin transaction

           
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
            $this->db->bind(':max_occupants',$data['guests']);
            $this->db->bind(':bathrooms',$data['bathrooms']);
            $this->db->bind(':children_allowed',$data['children']);
            $this->db->bind(':offers_ctos',$data['cots']);
            $this->db->bind(':apartment_size',$data['apartment_size']);
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
           
            $this->db->execute();

            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Rollback transaction on error
          
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


    public function getTotalAccomadation($userId) {
        try {
            $sql = "SELECT COUNT(*) as total_accomadation FROM properties WHERE service_provider_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $totalAccomadation = $this->db->single();

            print_r($totalAccomadation);

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

    public function getAllAccommodations(){
        $sql = "SELECT * FROM properties";
        try {
            $this->db->query($sql);
            $accommodations = $this->db->resultSet();
            return $accommodations;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

    public function getPropertyDetailsById($propertyId) {
        // SQL query to fetch property details by ID
        $sql = "SELECT * FROM properties WHERE property_id = ? LIMIT 1";
       
        try {
            $this->db->query($sql);
            $this->db->bind(1, $propertyId);
            $property = $this->db->single();
            return $property;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";    
            return null;
        }
    }
}

?>