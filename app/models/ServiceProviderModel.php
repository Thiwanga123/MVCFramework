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
        
        $this->db->query("SELECT * FROM $sptype WHERE email = :email");
        $this->db->bind(':email', $email);

        $this->db->execute();

        $rowCount = $this->db->rowCount();
        //check row
        if($rowCount > 0){
            return true;
        }else{
            
            return false;
        }
    }


    //register the service provider with the relavent service type
    public function register($data){
        $this->db->query("INSERT INTO ".$data['sptype']." (name, email, password, phone,address,nic,reg_number) VALUES(:name, :email, :password, :phone,:address,:nic,:reg_number)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':reg_number', $data['reg_number']);
        

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //get users
    


  
    
  
    }

?>