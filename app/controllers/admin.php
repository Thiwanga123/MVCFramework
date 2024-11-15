<?php


class Admin extends Controller {

    private $adminModel;

    public function __construct() {
        $this->adminModel = $this->model('M_admin');
    }

    
   
    public function dashboard() {

        //if an admin is logged in
        if (isset($_SESSION['user_id'])) {
            $number_of_travelers = $this->adminModel->getNumberOfTravelers();
            $data=[
                'number_of_travelers'=>$number_of_travelers
            ];
            $this->view('admin/v_dashboard', $data);
        } else {
            redirect('admin/login');
        }

    }

    public function earnings() {
        //if an admin is logged in
        if (isset($_SESSION['user_id'])) {
            $this->view('admin/v_earnings');
        } else {
            redirect('admin/login');
        }
    }

    public function travelers() {
       //if an admin is logged in
        if (isset($_SESSION['user_id'])) {
            //get the last three travelers names, email, telephone number and date of joined
            $number_of_travelers = $this->adminModel->getNumberOfTravelers();
            $last_three_travelers = $this->adminModel->getLastThreeTravelers();
            $recently_joined_travelers = $this->adminModel->getRecentlyJoinedTravelers();

            $data=[
                'number_of_travelers'=>$number_of_travelers,
                'last_three_travelers'=>$last_three_travelers,
                'recently_joined_travelers'=>$recently_joined_travelers
            ];

            $this->view('admin/v_travelers', $data);
        } else {
            redirect('admin/login');
        }
   
    }

    public function serviceProviders() {
       //if an admin is logged in
        if (isset($_SESSION['user_id'])) {
            $this->view('admin/v_serviceproviders');
        } else {
            redirect('admin/login');
        }
    }

    public function profile() {
        //if an admin is logged in
        if (isset($_SESSION['user_id'])) {
            $this->view('admin/v_profile');
        } else {
            redirect('admin/login');
        }
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
                    $data['password_err'] = 'Password Incorrect';
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
        $_SESSION['user_id'] = $user->admin_id;
        $_SESSION['email'] = $user->email;
        $_SESSION['name'] = $user->name;
        redirect('admin/dashboard');
         
    }

    public function logout() {
        //if an admin is logged in
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        session_destroy();
        redirect('admin/login');
    }
  
    //get the last three travelers names, email, telephone number and date of joined
    public function getLastThreeTravelers(){
        $last_three_travelers = $this->adminModel->getLastThreeTravelers();
        $data=[
            'last_three_travelers'=>$last_three_travelers
        ];
        $this->view('admin/v_travelers', $data);
    }





    
}


?>