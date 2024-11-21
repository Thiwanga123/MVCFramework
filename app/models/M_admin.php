<?php
    class M_admin{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getUsers(){
            $this->db->query("SELECT * FROM admin");
            return $this->db->resultSet();
        }
    
        //find user by email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM admin WHERE email = :email');
            $this->db->bind(':email', $email);
    
            $row = $this->db->single();
    
    
            //check row
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

         // Get user by ID
         public function getUserById($id){
            $this->db->query('SELECT * FROM admin WHERE admin_id = :admin_id');
            $this->db->bind(':admin_id', $id);
    
            $row = $this->db->single();
    
            return $row;
        }


         //login user

        public function login($email, $password) {
        $this->db->query('SELECT * FROM admin WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
                      
            if ($password==$row->password) {
                return $row;
            } else {
               return false;
            }
        } 

        //get Last theree users from the travelers table by traveler_id
        public function getLastThreeTravelers(){
            $this->db->query('SELECT * FROM last_joined_travelers');
            $results = $this->db->resultSet();
            return $results;
        }

        //get the number of travelers
        public function getNumberOfTravelers(){
            $this->db->query('SELECT COUNT(traveler_id) as number_of_travelers FROM traveler');
           
            $row=$this->db->single();

            return $row->number_of_travelers;
        }


        //get recennty within 7 days joined travelers
        public function getRecentlyJoinedTravelers(){
            $this->db->query('SELECT COUNT(traveler_id) as number_of_travelers FROM traveler WHERE date_of_joined BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()');
           
            $row=$this->db->single();

            return $row->number_of_travelers;
        }

        //delete the traveler by id
        public function deleteTravelerById($id){
            $this->db->query('DELETE FROM traveler WHERE traveler_id = :traveler_id');
            $this->db->bind(':traveler_id', $id);
    
            //execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }


        //update the admin profile
        public function updateProfile($data){
            $this->db->query('UPDATE admin SET name = :name,  phone_number = :phone_number, password = :password WHERE admin_id = :admin_id');
            // Bind values
            $this->db->bind(':admin_id', $data['admin_id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':phone_number', $data['phone_number']);
            $this->db->bind(':password', $data['password']);
    
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }


        //count the all registered accomadation suppliers
        public function getAccomadationSuppliers(){
           $this->db->query('SELECT COUNT(id) as accomadation_suppliers FROM accomadation');
           $row=$this->db->single();
            return $row->accomadation_suppliers;
        }

        //count the all registerd vehicle suppliers
        public function getVehicleSuppliers(){
            $this->db->query('SELECT COUNT(id) as vehicle_suppliers FROM vehicle_suppliers');
            $row=$this->db->single();
             return $row->vehicle_suppliers;
         }

         //count the all registerd equipment suppliers
        public function getEquipmentSuppliers(){
            $this->db->query('SELECT COUNT(id) as equipment_suppliers FROM equipment_suppliers');
            $row=$this->db->single();
             return $row->equipment_suppliers;
         }

            //count the all registerd tour guides
        public function getTourGuides(){
            $this->db->query('SELECT COUNT(id) as tour_guides FROM tour_guides');
            $row=$this->db->single();
             return $row->tour_guides;
         }

         //get the last three accomadation suppliers
         public function getLastThreeAccomadationSuppliers(){
            $this->db->query('SELECT * FROM last_joined_accomadation_suppliers');
            $results = $this->db->resultSet();
            return $results;
        }


        //get the details of selected service provider by the id from the relavant table of service provider
        public function getServiceProviderDetails($id,$type){
            if($type=='Accommodation'){
                $this->db->query('SELECT * FROM accomadation WHERE id = :id');
                $this->db->bind(':id', $id);
                $row = $this->db->single();
                return $row;
            }else if($type=='vehicle'){
                $this->db->query('SELECT * FROM vehicle_suppliers WHERE id = :id');
                $this->db->bind(':id', $id);
                $row = $this->db->single();
                return $row;
            }else if($type=='equipment'){
                $this->db->query('SELECT * FROM equipment_suppliers WHERE id = :id');
                $this->db->bind(':id', $id);
                $row = $this->db->single();
                return $row;
            }else if($type=='tourguide'){
                $this->db->query('SELECT * FROM tour_guides WHERE id = :id');
                $this->db->bind(':id', $id);
                $row = $this->db->single();
                return $row;
            }
        }


        //get the last there 3 joined service providers from the view of last_joined_serviceproviders
        public function getLastThreeServiceProviders(){
            $this->db->query('SELECT * FROM last_joined_serviceproviders');
            $results = $this->db->resultSet();
            return $results;
        }


    }


?>