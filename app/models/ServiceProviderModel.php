<?php
class ServiceProviderModel{

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getLastServiceProviderId($sptype) {
        $allowedTables = ['accomadation', 'equipment_suppliers', 'tour_guides', 'vehicle_suppliers']; 
        if (!in_array($sptype, $allowedTables)) {
            throw new Exception("Invalid service provider type.");
        }
    
        $sql = "SELECT MAX(id) AS last_id FROM $sptype";
        try {
            $this->db->query($sql);
            $result = $this->db->single();
            return $result && $result->last_id ? $result->last_id : null;
        } catch (Exception $e) {
            error_log("Error getting last service provider ID: " . $e->getMessage());
            return 1;
        }
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

    public function registerSupplier($data){
        
        $sptype = $data['sptype'];
        $sql = "INSERT INTO $sptype (name, nic, address, phone, email, password, reg_number, plan, document_path) 
                VALUES (:name, :nic, :address, :phone, :email, :password, :reg_num, :plan, :document_path)";
    
    
        try {
            $this->db->query($sql);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':reg_num', $data['reg_num']);
            $this->db->bind(':plan', $data['plan']);
            $this->db->bind(':document_path', $data['document_path']);
    
            return $this->db->execute();
        } catch (Exception $e) {
            error_log("Error registering service provider: " . $e->getMessage());
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
            return false;
        }
    }

    public function uploadProfileImage($userId,$imagePath,$sptype) {
        $sql = "UPDATE $sptype SET profile_path = ? WHERE id = ?";
       
        try{
            $this->db->query($sql);
            $this->db->bind(1, $imagePath);
            $this->db->bind(2, $userId);
            $result = $this->db->execute();
            return $result;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function updateSupplierProfile($data){
        $sql = "UPDATE equipment_suppliers SET name = :name, email = :email, address = :address, username = :username, phone = :telephone_number, reg_number = :gvtNo, 
                latitude = :latitude, 
                longitude = :longitude WHERE id = :id";

        try{
            $this->db->query($sql);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':telephone_number', $data['telephone_number']);
            $this->db->bind(':gvtNo', $data['gvtNo']);
            $this->db->bind(':latitude', $data['latitude']);
            $this->db->bind(':longitude', $data['longitude']);
            $this->db->bind(':id', $_SESSION['id']); 
    
            $result = $this->db->execute();
            return $result;
        }catch(Exception $e){
            error_log("Error updating supplier profile: " . $e->getMessage());
            return $e->getMessage(); 
        }
    }
}

  

    

?>