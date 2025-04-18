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

    public function findUsersByNIC($nic,$sptype){
        
        $this->db->query("SELECT * FROM $sptype WHERE nic = :nic");
        $this->db->bind(':nic', $nic);

        $this->db->execute();

        $rowCount = $this->db->rowCount();
        //check row
        if($rowCount > 0){
            return true;
        }else{
            return false;
        }
    }
     //find user by name
    public function findUserByName($name,$sptype){

        $this->db->query("SELECT * FROM $sptype WHERE name = :name");
        $this->db->bind(':name', $name);

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
        
        $this->db->query("INSERT INTO ".$data['sptype']." (name, email, password, phone,address,nic,reg_number,action,date_of_joined,latitude,longitude, plan) VALUES(:name, :email, :password, :phone,:address,:nic,:reg_number,DEFAULT,CURRENT_DATE, :latitude, :longitude, :plan)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':phone', $data['phone']);
       // $this->db->bind(':address', $data['address']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':reg_number', $data['reg_number']);
       // $this->db->bind(':latitude', $data['latitude']);
       // $this->db->bind(':longitude', $data['longitude']);
       $this->db->bind(':plan', $data['plan']);
        

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

    public function updateProfileImage($userType, $userId, $filename) {
        $allowedTables = ['equipment_suppliers', 'tour_guides', 'vehicle_suppliers', 'accomadation']; 
    
        if (!in_array($userType, $allowedTables)) {
            return false;
        }
    
        $sql = "UPDATE $userType SET profile_pic = :filename WHERE id = :id";
    
        $this->db->query($sql);
        $this->db->bind(':filename', $filename);
        $this->db->bind(':id', $userId);
    
        return $this->db->execute();
    }

}

    

?>