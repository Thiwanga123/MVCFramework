<?php

class ServiceProvider extends Controller {
    private $serviceProviderModel;
    

    public function __construct() {
        $this->serviceProviderModel = $this->model('ServiceProviderModel');
    }

    public function index() {
        $data = $this->serviceProviderModel->getUsers();
        $this->view('serviceproviders/sp_login', $data);
    }


    public function login() {

        // Check if the form was submitted (POST request)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
    
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Init data array with POST values
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'sptype' => trim($_POST['sptype']),
                'email_err' => '',
                'password_err' => '',
                'sptype_err' => '',
            ];
           
         
            // Check if the email, password, and service type fields are not empty
            if (empty($data['email']) || empty($data['password']) || empty($data['sptype'])) {
                // Set error message for empty fields
                if (empty($data['email'])) $data['email_err'] = 'Please enter your email.';
                if (empty($data['password'])) $data['password_err'] = 'Please enter your password.';
                if (empty($data['sptype'])) $data['sptype_err'] = 'Please select a service type.';
            } else {
                // Check if email exists in the database for the given service type
                $existing = $this->serviceProviderModel->findUserByEmail($data['email'], $data['sptype']);
                 
                if (!$existing) {
                    $data['email_err'] = 'No user found with that email for the selected service type.';
                }
            }
    
            // Proceed with login if there are no errors
            if (empty($data['email_err']) && empty($data['password_err']) && empty($data['sptype_err'])) {
                // Attempt to log in the user
                $loggedInUser = $this->serviceProviderModel->login($data['email'], $data['password'], $data['sptype']);
                
                if ($loggedInUser) {
                    // Create session for the logged-in user and redirect
                    $this->createUserSession($loggedInUser, $data['sptype']);
                   
                } else {
                    // If login fails (wrong password), set error message
                    $data['password_err'] = 'Incorrect password. Please try again.';
                    $this->view('serviceproviders/sp_login', $data); // Re-render the login view with the error
                }
            } else {
                // If there are any errors, re-render the login form with validation errors
                $this->view('serviceproviders/sp_login', $data);
            }
        } else {
            // If it's a GET request, initialize empty data for the form
            $data = [
                'email' => '',
                'password' => '',
                'sptype' => '',
                'email_err' => '',
                'password_err' => '',
                'sptype_err' => ''
            ];
    
            // Load the login view
            $this->view('serviceproviders/sp_login', $data);
        }
    }
    


public function createUserSession($user,$sptype) {
    $_SESSION['id'] = $user-> id;
    $_SESSION['email'] = $user->email;
    $_SESSION['name'] = $user->name;
    $_SESSION['type'] = $sptype;
    redirect($sptype .'/dashboard');
}

public function logout(){
        session_destroy();  
        session_start();    

        redirect('ServiceProvider');
        exit();
}
}


?>