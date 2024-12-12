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
            $this->view('users/bookguider');
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
}