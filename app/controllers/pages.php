<?php
    class Pages{
        public function __construct(){
            echo 'Pages loaded';
        }

        public function index(){
            echo 'index method';
        }

        public function about($id){
            echo 'about method';
            echo $id;
        }
    }

?>