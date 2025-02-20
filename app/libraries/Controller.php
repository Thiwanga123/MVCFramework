<?php
class Controller{

    public $breadcrumbs;

    public function __construct() {
        $this->breadcrumbs = $this->generateBreadcrumbs();
    }

    public function generateBreadcrumbs() {
        $path = trim($_SERVER['REQUEST_URI'], "/");
        $segments = explode("/", $path);
        $url = URLROOT;
        $breadcrumbs = [];
    
        $breadcrumbs[] = ['name' => 'Home', 'url' => URLROOT];
    
        for ($i = 0; $i < count($segments); $i++) {
            $url .= "/" . $segments[$i];
            $breadcrumbs[] = [
                'name' => ucfirst(str_replace("-", " ", $segments[$i])),
                'url' => $url
            ];
        }
    
        return $breadcrumbs;
    }
    
    public function model($model){
        require_once '../app/models/' . $model . '.php';

        //instatiate model and pass it to the controller
        return new $model();
    }

    //to load views
    public function view($view, $data = []){
        if(file_exists('../app/views/' . $view . '.php')){
            extract($data);
            require_once '../app/views/' . $view . '.php';
        }else{
            die('View does not exist');
        }
    }

}


?>