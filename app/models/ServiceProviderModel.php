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
        $this->db->query("INSERT INTO ".$data['sptype']." (name, email, password, phone,address,nic,reg_number,action,date_of_joined) VALUES(:name, :email, :password, :phone,:address,:nic,:reg_number,DEFAULT,CURRENT_DATE)");
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
      
    //login user


    public function getUserData($id,$type){
        try{
            $sql = "SELECT * FROM $type WHERE id = ?";
            $this->db->query($sql);
            $this->db->bind(1, $id);
            return $this->db->single();
        }catch(Exception $e){
            $err_msg = $e->getMessage();
        }
    }
    }

?>