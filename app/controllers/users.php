<?php
class Users extends Controller {
    private $userModel;
    

    public function __construct() {

        $this->userModel = $this->model('M_users');
    }

    public function index() {

        $data = $this->userModel->getUsers();
        $this->view('pages/index', $data);
    }

    public function dashboard() {
        // Check if logged in
        if(isset($_SESSION['user_id'])) {
            $this->view('users/v_dashboard');
            
        }else{
            redirect('users/login');
        }
        
        
    }

    public function history() {
        //check if logged in
        if(isset($_SESSION['user_id'])) {
            $this->view('users/v_history');

        }else{
            redirect('users/login');
        }
    }

    public function accomadation() {

        if(isset($_SESSION['user_id'])) {
            //when Enter the location, number of guests, and the budget then click the search button, after that the system will display the available accomodations
            $this->view('users/v_accomadation');
        }else{
            redirect('users/login');
        }
        
    }

    public function search(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            


            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            
           
            // Get the form data
            $data=[
                $location = trim($_POST['location']),
                $budget = trim($_POST['budget']),
                $people = trim($_POST['people']),

            ];


            // Call the model to search for accommodations
            $accomadation=$this->userModel->searchAccommodations($data);

            $data = [
                'accomadation' => $accomadation
            ];
    
            // Load the view with the search results
            $this->view('users/v_accomadation',$data );
        } else {
            // If not a POST request, redirect to the form or show an error
            redirect('path/to/form');
        }

    }

    public function payments() {
        if(isset($_SESSION['user_id'])) {
            $this->view('users/payment');
        }else{
            redirect('users/login');
        }
        
    }

    public function vehicles(){
        if(isset($_SESSION['user_id'])) {
            $this->view('users/v_vehicles');
        }else{
            redirect('users/login');
        }
        
    }

    public function equipment_suppliers(){
        if(isset($_SESSION['user_id'])) {
            $this->view('users/v_equipment_suppliers');
        }else{
            redirect('users/login');
        }
        
    }

    public function guider(){
        if(isset($_SESSION['user_id'])) {
            $this->view('users/v_guider');
        }else{
            redirect('users/login');
        }
        
    }

    public function package(){
        if(isset($_SESSION['user_id'])) {
            $this->view('users/v_package');
        }else{
            redirect('users/login');
        }
        
    }
    
    public function contact(){
        if(isset($_SESSION['user_id'])) {
            $this->view('users/v_contact');
        }else{
            redirect('users/login');
        }
    }

    public function profile(){
        if(isset($_SESSION['user_id'])) {
            $this->view('users/v_profile');
        }else{
            redirect('users/login');
        }
    }

    public function reviews(){
        if(isset($_SESSION['user_id'])) {
            $this->view('users/v_reviews');
        }else{
            redirect('users/login');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'name' => trim($_POST['name']),
                'telephone_number' => trim($_POST['telephone_number']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'name_err' => '',
                'telephone_err' => '',
                'email_err' => '',
                'password_err' => ''
               
            ];

            // Validate name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

          

            // Make sure errors are empty
            if (empty($data['name_err']) && empty($data['telephone_err']) && empty($data['email_err']) && empty($data['password_err'])) {
                // Validated

                // Redirect to the login page
                if ($this->userModel->register($data)) {
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/v_register', $data);
            }
        } else {
            // Init data
            $data = [
                'name' => '',
                'telephone_number' => '',
                'email' => '',
                'password' => '',
                'name_err' => '',
                'telephone_err' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            // Load view
            $this->view('users/v_register', $data);
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
            if (!$this->userModel->findUserByEmail($data['email'])) {
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
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
            if ($loggedInUser) {
                // Create session
                $this->createUserSession($loggedInUser);
                //redirect('pages/index');
                redirect('users/dashboard');         

            } 
            
            
            else {
                $data['password_err'] = 'Password Incorrect';
                // Load view with errors
                $this->view('users/v_login', $data);
            }
        } else {
            // Load view with errors
            $this->view('users/v_login', $data);
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
        $this->view('users/v_login', $data);
    }
}


public function createUserSession($user) {
    $_SESSION['user_id'] = $user->traveler_id;
    $_SESSION['email'] = $user->email;
    $_SESSION['name'] = $user->name;
    redirect('pages/index');
  
}

public function logout() {
    if(isset($_SESSION['user_id'])) {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        session_destroy();
        redirect('users/login');
    }else{
        redirect('users/login');
    }

}

//get all the accomodations from the database
   // public function addAccommodationImage($accommodationId, $imagePath) {
    //     $userId = $_SESSION['id'];

    //     $isInserted = $this->accomadationModel->addAccommodationImage($userId, $accommodationId, $imagePath);

    //     if ($isInserted) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

 

}


?>