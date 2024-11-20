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

    //register user
    public function register($data){
        $this->db->query('INSERT INTO traveler (name,  email, password,telephone_number,date_of_joined) VALUES(:name,  :email, :password, :telephone_number,CURRENT_DATE)');
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

           
           
            if ($password==$row->password) {
                return $row;
            } else {
               return false;
            }
        } 


    

}



?>