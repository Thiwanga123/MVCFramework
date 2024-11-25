<?php
      class Tour_Guides extends Controller {
      
//if the guider logged in redirect to the dashboard


private $bookingModel;

public function __construct(){
    $this->BookingModel = $this->model('BookingModel');
}



public function dashboard(){
    if (isset($_SESSION['id'])) {
        //get all the number of bookings for the relavent guider
        $guider_id = $_SESSION['id'];
        $number_of_bookings = $this->BookingModel->getGuiderBookings($guider_id);
        //pass the data to the view
        $data = [
            'number_of_bookings' => $number_of_bookings,
        ];
        $this->view('tour_guides/Dashboard', $data);
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
        //get the data from the bookings table with the relavent guider id
        $guider_id = $_SESSION['id'];
        //get the data from the bookings table with the relavent guider id
        $bookings = $this->BookingModel->getBookings($guider_id);
        //pass the data to the view
        $data=[
            'bookings'=>$bookings,
        ];
        
        $this->view('tour_guides/Bookings',$data);
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
        //get the availability information from the database with relavent guider id
        $guider_id = $_SESSION['id'];
        $availability = $this->BookingModel->getAvailability($guider_id);
        //pass the data to the view
        $data=[
            'availability'=>$availability,
        ];


        $this->view('tour_guides/Update_Availability',$data);
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

//delete an availability

public function delete_availability($id){

    if (isset($_SESSION['id'])) {
        $this->BookingModel->deleteGuiderAvailability($id);
        redirect('TourGuides/Update_Availability');
    } else {
        redirect('ServiceProvider');
    }

}

}