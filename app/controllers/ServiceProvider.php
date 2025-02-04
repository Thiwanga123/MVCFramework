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
            }  
            
    
            if (empty($data['email_err']) && empty($data['sptype_err'])) {
                $existingUser = $this->serviceProviderModel->findUserByEmail($data['email'], $data['sptype']);
                if (!$existingUser) {
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
                    //redirect to the relevant dashboard
                    echo "here";

                    redirect($data['sptype'] . '/dashboard');
                   
                } else {
                    // If login fails (wrong password), set error message
                    $data['password_err'] = 'Incorrect password. Please try again.';
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
                'confirm_password'=>trim($_POST['confirm_password']),
                'sptype'=>trim($_POST['sptype']),
                'longitude' => $_POST['longitude'], 
                'latitude' => $_POST['latitude'],
                
                'sptype_err'=>'',
                'name_err' => '',
                'phone_err' => '',
                'email_err' => '',
                'password_err' => '',
                'nic_err'=>'',
                'confirmpassword_err'=>'',
                'reg_num_err'=>'',
                'address_err'=>'',
                'latitude_err' => '',
                'longitude_err' => '',
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

            if (!filter_var($data['latitude'], FILTER_VALIDATE_FLOAT)) {
                $data['latitude_err'] = 'Invalid latitude value';
            }
    
            if (!filter_var($data['longitude'], FILTER_VALIDATE_FLOAT)) {
                $data['longitude_err'] = 'Invalid longitude value';
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
            if(empty($data['name_err']) && empty($data['phone_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['nic_err']) && empty($data['reg_num_err']) && empty($data['address_err']) && empty($data['sptype_err']) && empty($data['langitude_err']) && empty($data['latitude_err'])){
                // Validated
               
                 // Hash the password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);


                // Redirect to the login page
                if ($this->serviceProviderModel->register($data,$data['sptype'])) {
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
            $this->view('serviceproviders/register_updated', $data);
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

        redirect('ServiceProvider/login');
        exit();
    }

    //view service provider details
    public function viewServiceProviderDetails(){
        $data = $this->serviceProviderModel->getUsers();
        $this->view('serviceproviders/sp_profile', $data);
    }

    public function validation() {

        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $currentStep = $_POST['current_step'];
    
            $errors = [];
    
            switch ($currentStep) {
                case 1:
                    if (empty($_POST['name'])) {
                        $errors['name'] = 'Business Name is required';
                    }
    
                    if (empty($_POST['email'])) {
                        $errors['email'] = 'Email is required';
                    }else {
                        $email = $_POST['email'];
                        $serviceType = $_POST['sptype']; 
    
                        if ($this->serviceProviderModel->findUserByEmail($email, $serviceType)) {
                            
                            $errors['email'] = 'This email is already registered for the selected service type';
                        }
                    }
    
                    if (empty($_POST['nic'])) {
                        $errors['nic'] = 'NIC Number is required';
                    }
    
                    if (empty($_POST['phone'])) {
                        $errors['phone'] = 'Contact Number is required';
                    }else{
                        if (!is_numeric($_POST['phone']) || strlen($_POST['phone']) !== 10) {
                            $errors['phone'] = 'Invalid contact number';
                        }
                    }
    
                    if (empty($_POST['sptype'])) {
                        $errors['sptype'] = 'Service Type is required';
                    }
    
                    break;
    
                case 2:
                    if (empty($_POST['address'])) {
                        $errors['address'] = 'Address is required';
                    }
    
                    if (empty($_POST['present_address'])) {
                        $errors['present_address'] = 'Present Address is required';
                    }
    
                    break;
    
                case 3:
                    if (empty($_POST['reg_num'])) {
                        $errors['reg_num'] = 'Government Registration Number is required';
                    }
    
                    if (empty($_POST['password'])) {
                        $errors['password'] = 'Password is required';
                    }
    
                    if ($_POST['password'] !== $_POST['confirm_password']) {
                        $errors['confirm_password'] = 'Passwords do not match';
                    }
    
                    if (empty($_FILES['pdfFile']['name'])) {
                        $errors['pdfFile'] = 'PDF file is required';
                    } elseif ($_FILES['pdfFile']['type'] !== 'application/pdf') {
                        $errors['pdfFile'] = 'Only PDF files are allowed';
                    }
    
                    break;
    
                default:
                    break;
            }
    
            if (!empty($errors)) {
                echo json_encode(['success' => false, 'errors' => $errors]);
            } else {
                echo json_encode(['success' => true]);
            }
        }
    }

}
?>
                   
