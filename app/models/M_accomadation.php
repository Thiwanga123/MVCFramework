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
            $query = ('INSERT INTO properties(postal_code,city,property_name,property_type,address,service_provider_id,price,latitude,
            longitude,single_bedrooms,double_bedrooms,living_rooms,family_rooms,max_occupants,
            bathrooms,children_allowed,offers_ctos,apartment_size,air_conditioning,heating,
            free_wifi,ev_charging,kitchen,kitchenette,washing_machine,flat_screen_tv,
            swimming_pool,hot_tub,minibar,sauna,smoking_allowed,parties_allowed,pets_allowed,check_in_from,
            check_in_until,check_out_from,check_out_until,balcony,garden_view,terrace,view, other_details,image_path ) 
            VALUES (:postal_code, :city, :property_name, :property_type, :address, :service_provider_id, :price, 
            :latitude, :longitude, :single_bedrooms, :double_bedrooms, :living_rooms, :family_rooms, 
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
            $this->db->bind(':price', $data['Price']);
            $this->db->bind(':latitude', $data['latitude']);
            $this->db->bind(':longitude', $data['longitude']);
            $this->db->bind(':single_bedrooms', $data['single']);
            $this->db->bind(':double_bedrooms', $data['double']);
            $this->db->bind(':living_rooms', $data['living']);
            $this->db->bind(':family_rooms', $data['family']);
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

}

?>