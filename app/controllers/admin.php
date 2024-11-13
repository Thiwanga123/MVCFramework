<?php


class Admin extends Controller {

    private $adminModel;

    public function __construct() {
        $this->adminModel = $this->model('M_admin');
    }

    
   
    public function dashboard() {
        $this->view('admin/v_dashboard');
    }

    public function earnings() {
        $this->view('admin/v_earnings');
    }

    public function travelers() {
        $this->view('admin/v_travelers');
    }

    public function serviceProviders() {
        $this->view('admin/v_serviceProviders');
    }

    public function profile() {
        $this->view('admin/v_profile');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];
    
            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check if user exists
                if (!$this->adminModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'No user found';
                }
            }
    
            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
    
            // Check for errors
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Attempt to log in
                $loggedInUser = $this->adminModel->login($data['email'], $data['password']);
                if ($loggedInUser) {
                    // Create session
                    $this->createUserSession($loggedInUser);
                    //redirect('pages/index');
                    redirect('admin/dashboard');         
    
                } 
                
                
                else {
                    $data['password_err'] = 'Password hii';
                    // Load view with errors
                    $this->view('admin/v_login', $data);
                }
            } else {
                // Load view with errors
                $this->view('admin/v_login', $data);
            }
        } else {
            // Init data for GET request
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
    
            // Load view
            $this->view('admin/v_login', $data);
        }
    }
    
    
    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->traveler_id;
        $_SESSION['email'] = $user->email;
        $_SESSION['name'] = $user->name;
        redirect('admin/dashboard');
         
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        session_destroy();
        redirect('admin/login');
    }

    
}


?>