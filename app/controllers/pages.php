<?php
    class Pages extends Controller{
        public function __construct(){
            echo 'Pages loaded';
        }

        public function index(){
            echo 'index method';
        }

        public function about($id){
          $this->view('v_about');
        }
    }

?>