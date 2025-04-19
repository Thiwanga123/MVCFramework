<?php
class Core {

    // URL format controller/method/params
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->getURL();
        
        if(empty($url[0])){
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;
            
            if (method_exists($this->currentController, $this->currentMethod)) {
                if (method_exists($this->currentController, $this->currentMethod)) {
                    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
                } else {
                    throw new Exception("Method {$this->currentMethod} does not exist in controller " . get_class($this->currentController));
                }
            } else {
                throw new Exception("Method {$this->currentMethod} does not exist in controller " . get_class($this->currentController));
            }
            return;
        }

        if ($url && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
    
            // Unset 0 index
            unset($url[0]);

            // Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instantiate controller
            $this->currentController = new $this->currentController;

            //check for methods in controller
            if (isset($url[1])) {
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }


            // Get params
            $this->params = $url ? array_values($url) : [];

            // Check if the method exists before calling it
            if (method_exists($this->currentController, $this->currentMethod)) {
                // Call method and pass in params
                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            } else {
                throw new Exception("Method {$this->currentMethod} does not exist in controller " . get_class($this->currentController));
            }
            
        }
    }

    public function getURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }

    
}
?>