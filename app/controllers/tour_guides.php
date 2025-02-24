<?php
      class Tour_Guides extends Controller {
      
//creating the guider model
private $guiderModel;

public function __construct() {
    $this->guiderModel = $this->model('M_guider');
}



public function dashboard(){
    if (isset($_SESSION['id'])) {
       

        $this->view('tour_guides/Dashboard',);
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

    private $guideModel;

    public function __construct() {
        $this->guideModel = new GuideModel();
    }

    public function index() {
        session_start();
        if (!isset($_SESSION['trip_data'])) {
            header('Location: index.php');
            exit();
        }

        $tripData = $_SESSION['trip_data'];
        $guides = $this->guideModel->getGuides($tripData['destination'], $tripData['language'], $tripData['gender']);

        require APPROOT . '/views/guides.php';
    }
}


      

?>