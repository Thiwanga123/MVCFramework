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

    }


?>