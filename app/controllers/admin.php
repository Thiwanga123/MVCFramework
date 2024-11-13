<?php


class Admin extends Controller {

    private $adminModel;

    public function __construct() {
        $this->adminModel = $this->model('M_admin');
    }

  
    public function dashboard() {
        $this->view('admin/v_dashboard');
    }

    public function earnings() {
        $this->view('admin/v_earnings');
    }

    public function travelers() {
        $this->view('admin/v_travelers');
    }

    public function serviceProviders() {
        $this->view('admin/v_serviceProviders');
    }

    
}


?>