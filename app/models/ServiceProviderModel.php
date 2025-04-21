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
    public function checkSubscriptionStatus($email, $sptype) {
        $this->db->query("SELECT sub FROM $sptype WHERE email = :email");
        $this->db->bind(':email', $email);
        $row = $this->db->single();

       
        
        if ($row && $row->sub === 'true') {
            return true;
        } else {
            return false;
        }
    }


    public function getSubscriptionDetails($email, $sptype) {
        $this->db->query("SELECT * FROM $sptype WHERE email = :email");
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if ($row) {
            return $row;
        } else {
            return null;
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
        $sql = "INSERT INTO $sptype (name, nic, address, phone, email, password, reg_number, plan, document_path, date_of_joined) 
                VALUES (:name, :nic, :address, :phone, :email, :password, :reg_num, :plan, :document_path, CURRENT_DATE)";
    
    
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
        } catch (PDOException $e) {
           return $e->getMessage();
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

    public function updateSubscriptionStatus($email, $sptype) {
        $this->db->query("UPDATE $sptype SET sub = 'true' WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->execute();
    }

    public function updateSubscriptionPlan($id, $plan, $price, $name, $sptype) {
        try {
            $duration = null;

            //print the data
            echo "<script>console.log('ID: $id, Plan: $plan, Price: $price, Email: $name, Service Type: $sptype');</script>";
            // Calculate duration based on the plan
            switch ($plan) {
                case '3month':
                    $duration = date('Y-m-d', strtotime('+3 months'));
                    break;
                case '6month':
                    $duration = date('Y-m-d', strtotime('+6 months'));
                    break;
                case '12month':
                    $duration = date('Y-m-d', strtotime('+12 months'));
                    break;
                default:
                    throw new Exception("Invalid plan type.");
            }

            $this->db->query("INSERT INTO subscription_plans (sp_id, name, price, duration, created_at, sptype, plan) 
                              VALUES (:sp_id, :name, :price, :duration, NOW(), :sptype, :plan)");
            $this->db->bind(':plan', $plan);
            $this->db->bind(':name', $name);
            $this->db->bind(':price', $price);
            $this->db->bind(':sp_id', $id);
            $this->db->bind(':sptype', $sptype);
            $this->db->bind(':duration', $duration);

            return $this->db->execute();
        } catch (Exception $e) {
            error_log("Error updating subscription plan: " . $e->getMessage());
            return "Error: " . $e->getMessage();
        }
    }

}

    

?>