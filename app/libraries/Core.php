<?php
class Core{
    //URLO format controller/method/params
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function _construct(){
        $this->getURL();

    }

    public function getURL(){
        echo $_GET['url'];
    }


}
?>