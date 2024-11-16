<?php

class Equipment_Suppliers extends Controller{
    
    public function dashboard(){

        if (isset($_SESSION['user_id'])) {
            $this->view('equipment_supplier/Dashboard');
        } else {
            redirect('ServiceProvider');
        }
       
    
}


public function myInventory(){

    if (isset($_SESSION['user_id'])) {
        $this->view('equipment_supplier/MyInventory');
    } else {
        redirect('ServiceProvider');
    }

}

public function orders(){
    
    if (isset($_SESSION['user_id'])) {
        $this->view('equipment_supplier/Orders');
    } else {
        redirect('ServiceProvider');
    }
    

}

public function reviews(){

    if (isset($_SESSION['user_id'])) {
        $this->view('equipment_supplier/Reviews');
    } else {
        redirect('ServiceProvider');
    }

}

public function notifications(){

    if (isset($_SESSION['user_id'])) {
        $this->view('equipment_supplier/Notifications');
    } else {
        redirect('ServiceProvider');
    }
    
}

public function profile(){

    if (isset($_SESSION['user_id'])) {
        $this->view('equipment_supplier/Myprofile');
    } else {
        redirect('ServiceProvider');
    }
    

}

}


?>