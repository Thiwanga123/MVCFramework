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

        public function saveGuiderBooking()
        {
            // Read the raw POST body
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);

            if (!$data || !isset($data['guiderId']) || !isset($data['pickupLocation']) || !isset($data['destination'])) {
                http_response_code(400);
                echo json_encode(['message' => 'Missing required data.']);
                return;
            }
            // Sanitize input
            $guiderId = htmlspecialchars($data['guiderId']);
            $pickupLocation = htmlspecialchars($data['pickupLocation']);
            $destination = htmlspecialchars($data['destination']);

            // Save to session
            $_SESSION['guider_booking'] = [
                'guiderId' => $guiderId,
                'pickupLocation' => $pickupLocation,
                'destination' => $destination,
            ];

            // Response
            echo json_encode([
                'message' => 'Guider booking saved to session successfully!',
                'savedData' => $_SESSION['guider_booking']
            ]);
        }
    }

?>