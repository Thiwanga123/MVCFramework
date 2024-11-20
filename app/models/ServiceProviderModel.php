<?php
class ServiceProviderModel{

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    
    public function login($email, $password, $sptype) {
       
        $this->db->query("SELECT * FROM $sptype WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($password == $row->password) {
            return $row;
        } else {
            return false;
        }
    } 

   
      //find user by email
      public function findUserByEmail($email,$sptype){
        
        $this->db->query("SELECT * FROM $sptype WHERE email = ?");
        $this->db->bind('1', $email);

        $this->db->execute();

        $rowCount = $this->db->rowCount();
        //check row
        if($rowCount > 0){
            return true;
        }else{
            
            return false;
        }
    }

  
    //register user
    public function register($data){
        $this->db->query('INSERT INTO traveler (name,  email, password,telephone_number) VALUES(:name,  :email, :password, :telephone_number)');
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
    //login user
    }

?>