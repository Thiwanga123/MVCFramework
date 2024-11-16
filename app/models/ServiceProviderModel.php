<?php
class ServiceProviderModel{

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    
    public function login($email, $password, $sptype) {
        $table = $this->getServiceProviderTable($sptype);

        $this->db->query("SELECT * FROM $table WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($password == $row->password) {
            return $row;
        } else {
            return false;
        }
    } 

    private function getServiceProviderTable($sptype){
        switch ($sptype) {
            case 'accomodation':
                return 'accommodation_providers';
            case 'equipmentsupplier':
                return 'equipment_suppliers';
            case 'tourguide':
                return 'tour_guides';
            case 'vehiclesupplier':
                return 'vehicle_suppliers';
            default:
                return null;
        }
    }

      //find user by email
      public function findUserByEmail($email,$sptype){
        $table = $this->getServiceProviderTable($sptype);

        $this->db->query("SELECT * FROM $table WHERE email = :email");
        $this->db->bind(':email', $email);

        //check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


    //get all users
    public function getUsers(){
        $this->db->query("SELECT * FROM traveler");
        return $this->db->resultSet();
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