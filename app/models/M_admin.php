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


        

       
    }

?>