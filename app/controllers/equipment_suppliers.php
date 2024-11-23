<?php

class Equipment_Suppliers extends Controller{
    
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
        redirect('ServiceProvider/login');
    }

}

public function orders(){
    
    if (isset($_SESSION['id'])) {
        $this->view('equipment_supplier/Orders');
    } else {
        redirect('ServiceProvider/login');
    }
    

}

public function reviews(){

    if (isset($_SESSION['id'])) {
        $this->view('equipment_supplier/Reviews');
    } else {
        redirect('ServiceProvider/login');
    }

}

public function notifications(){

    if (isset($_SESSION['id'])) {
        $this->view('equipment_supplier/Notifications');
    } else {
        redirect('ServiceProvider/login');
    }
    
}

public function profile(){

    if (isset($_SESSION['id'])) {
        $this->view('equipment_supplier/Myprofile');
    } else {
        redirect('ServiceProvider/login');
    }
    

}

}


?>