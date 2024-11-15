<?php

 class Supplier extends Controller{
   

    public function dashboard(){

            $this->view('equipment_supplier/Dashboard');
        
    }

    
    public function myInventory(){

        $this->view('equipment_supplier/MyInventory');
    
    }

    public function orders(){

        $this->view('equipment_supplier/Orders');
    
    }

    public function reviews(){

        $this->view('equipment_supplier/Reviews');
    
    }

    public function notifications(){

        $this->view('equipment_supplier/Notifications');
    
    }

    public function profile(){

        $this->view('equipment_supplier/Myprofile');
    
    }

    
        
    }

?>