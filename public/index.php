<?php
 require_once '../app/bootloader.php';

    //init Core library
    $init = new Core();
  
 // Add these routes
switch ($_SERVER['REQUEST_URI']) {
    case '/trip/create':
        (new TripController())->create();
        break;

    case '/guides/list':
        (new GuideController())->list();
        break;

    // Add error handling
    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}
?>
