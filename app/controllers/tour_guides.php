<?php
      class Tour_Guides extends Controller {
      
//creating the guider model
private $guiderModel;

public function __construct() {
    $this->guiderModel = $this->model('M_guider');
}



public function dashboard(){
    if (isset($_SESSION['id'])) {
        // $guider=($_SESSION['id']);
        // $totalBookings = $this->guiderModel->getBookings($guider);
        // $data=[
        //     'totalBookings' => $totalBookings,
        // ];

        $this->view('tour_guides/Dashboard');
    } else {
        redirect('ServiceProvider');
    }

}
public function mypayments(){

    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/MyPayments');
    } else {
        redirect('ServiceProvider');
    }

}

public function bankDetails(){

    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/bankdetails');
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


//get the total number of bookings
public function getNumberOfBookings(){
    $guider_id = $_SESSION['id'];
    $bookings = $this->guiderModel->getBookings($guider_id);
    $this->view('tour_guides/Dashboard', $bookings);
       



    }

}

?>