<?php

class Equipment_Suppliers extends Controller{

    private $productModel;

    public function __construct(){
        $this->productModel = $this->model('ProductModel');
    }

    public function index(){
        echo "hi";
    }

    public function dashboard(){

        if (isset($_SESSION['id'])) {
            $this->view('equipment_supplier/Dashboard');
        } else {
            redirect('ServiceProvider/login');
        }
       
    }


    public function myInventory(){

        if (isset($_SESSION['id'])) {
            $this->view('equipment_supplier/MyInventory');
        } else {
            redirect('ServiceProvider');
        }

    }

    public function orders(){
    
        if (isset($_SESSION['id'])) {
            $this->view('equipment_supplier/Orders');
        } else {
            redirect('ServiceProvider');
        }
    
    }

    public function reviews(){

        if (isset($_SESSION['id'])) {
            $this->view('equipment_supplier/Reviews');
        } else {
            redirect('ServiceProvider');
        }

    }

    public function notifications(){

        if (isset($_SESSION['id'])) {
            $this->view('equipment_supplier/Notifications');
        } else {
            redirect('ServiceProvider');
        }
    
    }

    public function profile(){

        if (isset($_SESSION['id'])) {
            $this->view('equipment_supplier/Myprofile');
        } else {
            redirect('ServiceProvider');
        }
    }

}


?>