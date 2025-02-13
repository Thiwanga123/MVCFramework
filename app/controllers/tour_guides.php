<?php
      class Tour_Guides extends Controller {
      
//creating the guider model
private $guiderModel;

public function __construct() {
    $this->guiderModel = $this->model('BookingModel');
}



public function dashboard(){
    if (isset($_SESSION['id'])) {
        $data = $this->guiderModel->getBookings();
        $this->view('tour_guides/Dashboard',$data);
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

//delete the booking by id
public function deleteBooking($id){
    if($this->guiderModel->deleteBookingById($id)){
        redirect('Tour_Guides/Bookings');
    }else{
        die('Something went wrong');
    }

}
public function showGuider(){
    if(isset($_SESSION['user_id'])) {
        $guide=$this->guiderModel->getGuider();
        print_r($guide);
        $data = [
            'guide' => $guide
        ];
        $this->view('users/bookguider',$data);
    }else{
        redirect('users/login');
    }
}
      }

?>