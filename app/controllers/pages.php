<?php
    // require_once '../libraries/Controller.php';

    class Pages extends Controller{
        private $pagesModel;
        public function __construct(){
            $this->pagesModel = $this->model('M_Pages');
        }

        public function index(){
            $this->view('v_home');
        }

        public function about(){          
            $this->view('v_about');
        }

        public function features(){
            $this->view('v_features');
        }

        
       
    }

?>