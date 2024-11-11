<?php
class Controller{
    public function model($model){
        require_once '../app/models/' . $model . '.php';

        //instatiate model and pass it to the controller
        return new $model();
    }

    //to load views
    public function view($view){
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            die('View does not exist');
        }
    }

}


?>