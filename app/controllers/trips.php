<?php

class Trips extends Controller{
    private $tripModel;

    public function __construct(){
        $this->tripModel = $this->model('TripsModel');
    }

    public function locations(){
        if (isset($_SESSION['user_id'])) {
            $this->view('users/planHome');
        } else {
            redirect('users/login');
        }
    }

    public function accomodations(){
        if (isset($_SESSION['user_id'])) {
            $this->view('users/bookAccomodations');
        } else {
            redirect('users/login');
        }
    }

    public function transportation(){
        if (isset($_SESSION['user_id'])) {
            $this->view('users/bookTransportation');
        } else {
            redirect('users/login');
        }
    }

    public function guider(){
        if (isset($_SESSION['user_id'])) {
            $guides=$this->tripModel->getGuider();


   
            $data = [
                'guides' => $guides
            ];
            $this->view('users/bookguider',$data);
        } else {
            redirect('users/login');
        }
    }

    public function equipmentRentals(){
        if (isset($_SESSION['user_id'])) {
            $this->view('users/bookEquipments');
        } else {
            redirect('users/login');
        }
    }

    public function overview(){
        if (isset($_SESSION['user_id'])) {
            $this->view('users/overview');
        } else {
            redirect('users/login');
        }
    }

    // public function showaccommodation(){
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Sanitize POST data
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    //         // Get the form data
    //         $data=[
    //             $location = trim($_POST['location']),
    //             $people = trim($_POST['people']),
    //             $start_date = trim($_POST['startDate']),
    //             $end_date = trim($_POST['endDate']),
    //         ];
    
    //         // Call the model to search for accommodations
    //         if($showaccomadation=$this->tripModel->showAccommodation($data)){
    //             // If the search is successful, load the view with the search results
    //             $data = [
    //                 'showaccomadation' => $showaccomadation
    //             ];
        
    //             // Load the view with the search results
    //             $this->view('users/bookAccomodations',$data );
    //         } else {
    //             // If the search is not successful, load the view with an error message
    //             $this->view('users/notfound');
    //         }
    
    
    // }
    
    // }
}