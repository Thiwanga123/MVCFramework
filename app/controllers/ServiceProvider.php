<?php

class ServiceProvider extends Controller {
    private $serviceProviderModel;
    

    public function __construct() {
        $this->serviceProviderModel = $this->model('ServiceProviderModel');
    }

    public function index() {
        $this->view('serviceproviders/sp_login');
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
 
    public function register() {
        //check If the submitted method is PoST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $data = [
                    'name' => trim($_POST['name']),
                    'phone' => trim($_POST['phone']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'nic'=>trim($_POST['nic']),
                    'reg_number'=>trim($_POST['reg_num']),
                    'address'=>trim($_POST['address']),
                    'confrim_password'=>trim($_POST['confirm_password']),
                    'sptype'=>trim($_POST['sptype']),
                    
                    'sptype_err'=>'',
                    'name_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'nic_err'=>'',
                    'confirmpassword_err'=>'',
                    'reg_num_err'=>'',
                    'address_err'=>''
                   
                ];
    
                // Validate name
                if (empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }

                // Validate phone number
                if (empty($data['phone'])) {
                    $data['phone_err'] = 'Please enter phone number';
                }

                // Validate NIC
                if (empty($data['nic'])) {
                    $data['nic_err'] = 'Please enter NIC number';
                }

                // Validate registration number
                if (empty($data['reg_number'])) {
                    $data['reg_num_err'] = 'Please enter registration number';
                }

                // Validate address
                if (empty($data['address'])) {
                    $data['address_err'] = 'Please enter address';
                }

                // Validate service type
                if (empty($data['sptype'])) {
                    $data['sptype_err'] = 'Please select a service type';
                }


    
                // Validate email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    if ($this->serviceProviderModel->findUserByEmail($data['email'],$data['sptype'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }
    
                // Validate password
                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                //validate confirm password
                if (empty($data['confirm_password'])) {
                    $data['confirmpassword_err'] = 'Please confirm password';
                } else {
                    if ($data['password'] != $data['confirm_password']) {
                        $data['confirmpassword_err'] = 'Passwords do not match';
                    }
                }
    
                // Make sure errors are empty
              if(empty($data['name_err']) && empty($data['phone_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['nic_err']) && empty($data['reg_num_err']) && empty($data['address_err']) && empty($data['sptype_err'])){
                    // Validated
    
                    // Redirect to the login page
                    if ($this->serviceProviderModel->register($data)) {
                        //display success message
                                                    
                            $message = "Your Registration is Successful.!";

                            // Output JavaScript code for the alert
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            

                        redirect('ServiceProvider/login');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('serviceproviders/sp_register', $data);
                }
            } else {
                // Init data
                $data = [
                    'name' => '',
                    'phone' => '',
                    'email' => '',
                    'password' => '',
                    'nic'=>'',
                    'reg_number'=>'',
                    'address'=>'',
                    'confirm_password'=>'',
                    'sptype'=>'',
                    'name_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'nic_err'=>'',
                    'confirmpassword_err'=>'',
                    'reg_num_err'=>'',
                    'address_err'=>''
                ];
    
                // Load view
                $this->view('serviceproviders/sp_register', $data);
            
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