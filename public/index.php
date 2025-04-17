<?php
session_start();
require_once __DIR__ . '/../app/bootloader.php';

// Debugging: Check resolved paths and request URI
//echo 'Resolved TripController Path: ' . realpath(__DIR__ . '/../app/controllers/TripController.php') . PHP_EOL;
//echo 'Resolved GuideController Path: ' . realpath(__DIR__ . '/../app/controllers/GuideController.php') . PHP_EOL;
echo 'Request URI: ' . $_SERVER['REQUEST_URI'] . PHP_EOL;

// Include necessary controllers
// require_once __DIR__ . '/../app/controllers/TripController.php'; // Removed as the file no longer exists
require_once __DIR__ . '/../app/controllers/ServiceProvider.php'; // Include ServiceProvider controller

// Normalize the request URI
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Extract controller and method from the URI
$url = explode('/', trim($requestUri, '/'));
$controllerName = !empty($url[1]) ? ucfirst($url[1]) : 'Home'; // Default to 'Home' controller
$methodName = !empty($url[2]) ? $url[2] : 'index'; // Default to 'index' method

// Build the controller class name
$controllerClass = $controllerName;


// Check if the controller class exists
if (file_exists(__DIR__ . '/../app/controllers/' . $controllerClass . '.php')) {
    require_once __DIR__ . '/../app/controllers/' . $controllerClass . '.php';

    // Instantiate the controller and call the method
    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();

        if (method_exists($controller, $methodName)) {
            $controller->$methodName();
        } else {
            http_response_code(404);
            echo '404 Method Not Found';
        }
    } else {
        http_response_code(404);
        echo '404 Controller Class Not Found';
    }
}
?>
