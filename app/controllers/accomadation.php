<?php

class Accomadation extends Controller{

    private $accomadationModel;

    public function __construct(){
        $this->accomadationModel = $this->model('M_accomadation');
    }


    public function dashboard(){

        if (isset($_SESSION['id'])) {
            $this->view('accomadation/Dashboard');
        } else {
            redirect('ServiceProvider/login');
        }
       
    
}


public function myInventory(){

    if (isset($_SESSION['id'])) {

        $supplierId = $_SESSION['id'];

        // $this->productModel = $this->model('ProductModel');
        // $products = $this->productModel->getAllProducts($supplierId);
        //var_dump ($products); //Debugging
        // $this->view('equipment_supplier/MyInventory',['products' => $products]);
            $this->view('accomadation/MyInventory');
    } else {
        redirect('ServiceProvider/login');
    }
}


    public function orders(){
        
        if (isset($_SESSION['id'])) {
            $this->view('accomadation/Orders');
        } else {
            redirect('ServiceProvider/login');
        }
    }

    public function reviews(){

        if (isset($_SESSION['id'])) {
            $this->view('accomadation/Reviews');
        } else {
            redirect('ServiceProvider');
        }
    }

    public function notifications(){

        if (isset($_SESSION['id'])) {
            $this->view('accomadation/Notifications');
        } else {
            redirect('ServiceProvider');
        }
        
    }

    public function profile(){

        if (isset($_SESSION['id'])) {
            $this->view('accomadation/Myprofile');
        } else {
            redirect('ServiceProvider');
        }
    }

    //logout
    public function logout(){
        session_destroy();  
        session_start();    

        redirect('ServiceProvider/login');
        exit();
    }


}


?>