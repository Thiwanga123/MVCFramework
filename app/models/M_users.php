<?php
class M_users{

    private $db;

    public function __construct(){
        $this->db = new Database;
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

    public function login($email,$password){
        $this->db->query('SELECT * FROM traveler WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        }else{
            return false;
    }
}
}
?>