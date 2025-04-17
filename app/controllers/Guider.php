<?php
require_once '../app/helpers/url_helper.php';

class Guider extends Controller {
    private $guiderModel;

    public function __construct() {
        $this->guiderModel = $this->model('M_guider');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process login
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $loggedInUser = $this->guiderModel->login($email, $password);

            if ($loggedInUser) {
                // Create session
                session_start();
                $_SESSION['id'] = $loggedInUser->id;
                $_SESSION['sptype'] = 'guider';

                // Redirect to dashboard
                redirect('guiders/dashboard');
            } else {
                // Invalid login
                $this->view('guiders/login', ['error' => 'Invalid credentials']);
            }
        } else {
            // Load login form
            $this->view('guiders/login');
        }
    }
}
?>
