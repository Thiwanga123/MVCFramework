<?php
class Core {

    // URL format controller/method/params
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->getURL();
        if ($url && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);

            // Unset 0 index
            unset($url[0]);

            // Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instantiate controller
            $this->currentController = new $this->currentController;
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