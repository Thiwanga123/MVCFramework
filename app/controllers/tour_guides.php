<?php
      class Tour_Guides extends Controller {
      
//if the guider logged in redirect to the dashboard

public function dashboard(){
    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/Dashboard');
    } else {
        redirect('ServiceProvider');
    }

}
public function mypayments(){

    if (isset($_SESSION['id'])) {
          $this->view('tour_guides/Mypayments');
    } else {
        redirect('ServiceProvider');
    }

}

public function Bookings(){
    
    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/Bookings');
    } else {
        redirect('ServiceProvider');
    }
    

}

public function reviews(){

    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/Reviews');
    } else {
        redirect('ServiceProvider');
    }

}

public function notifications(){

    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/Notifications');
    } else {
        redirect('ServiceProvider');
    }
    
}
public function Update_Availability(){

    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/Update_Availability');
    } else {
        redirect('ServiceProvider');
    }
    
}

public function profile(){

    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/Myprofile');
    } else {
        redirect('ServiceProvider');
    }
    

}

}