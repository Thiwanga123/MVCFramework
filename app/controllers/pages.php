<?php
    require_once '../libraries/Controller.php';

    class Pages extends Controller{
        private $pagesModel;
        public function __construct(){
            $this->pagesModel = $this->model('M_Pages');
        }

        public function index(){
            echo 'index method';
        }

        public function about($id){
          $this->view('v_about');
        }
    }

?>