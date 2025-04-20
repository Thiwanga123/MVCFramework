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
                    redirect($data['sptype'] . '/dashboard');
                   
                } else {
                    // If login fails (wrong password), set error messagee
                    $data['password_err'] = 'Incorrect password. Please try again.';
                    $this->view('serviceproviders/sp_login', $data);
                    return;
                }
            }else{
                $this->view('serviceproviders/sp_login', $data);
                return;
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
                //'address'=>trim($_POST['address']),
                'confirm_password'=>trim($_POST['confirm_password']),
                'sptype'=>trim($_POST['sptype']),
                //'longitude' => $_POST['longitude'], 
                //'latitude' => $_POST['latitude'],
                
                'sptype_err'=>'',
                'name_err' => '',
                'phone_err' => '',
                'email_err' => '',
                'password_err' => '',
                'nic_err'=>'',
                'confirmpassword_err'=>'',
                'reg_num_err'=>'',
                //'address_err'=>'',
                //'latitude_err' => '',
                //'longitude_err' => '',
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
        
    // redirect($sptype .'/dashboard');
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

    
    public function registerUpdated() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize form inputs
            $name = trim(htmlspecialchars($_POST['name'] ?? ''));
            $email = trim(htmlspecialchars($_POST['email'] ?? ''));
            $nic = trim(htmlspecialchars($_POST['nic'] ?? ''));
            $phone = trim(htmlspecialchars($_POST['phone'] ?? ''));
            $sptype = trim(htmlspecialchars($_POST['sptype'] ?? ''));
            $address = trim(htmlspecialchars($_POST['address'] ?? ''));
            $reg_num = trim(htmlspecialchars($_POST['reg_num'] ?? ''));
            $password = trim($_POST['password'] ?? '');
            $confirm_password = trim($_POST['confirm_password'] ?? '');
            $selectedPlan = trim($_POST['selectedPlan'] ?? '');
    
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            // Handle file upload
            if (isset($_FILES['pdfFile']) && $_FILES['pdfFile']['error'] === 0) {
                $baseUploadDir = 'Uploads/Documents/';
                $typeFolder = $baseUploadDir . $sptype . '/';
    
                if (!file_exists($typeFolder)) {
                    mkdir($typeFolder, 0777, true);
                }
    
                // Get the last ID from the relevant service provider table
                $lastId = $this->serviceProviderModel->getLastServiceProviderId($sptype);
                $nextId = $lastId + 1;
    
                // Build the new file path (e.g., Uploads/Documents/drivers/driver_12.pdf)
                $pdfFilename = strtolower($sptype) . '_' . $nextId . '.pdf';
                $pdfPath = $typeFolder . $pdfFilename;
    
                // Move the uploaded file to the target path
                if (!move_uploaded_file($_FILES['pdfFile']['tmp_name'], $pdfPath)) {
                    echo json_encode(['success' => false, 'errors' => ['pdfFile' => 'Failed to upload file.']]);
                    exit; // Ensure the script stops after sending the response
                }
            } else {
                echo json_encode(['success' => false, 'errors' => ['pdfFile' => 'No file uploaded.']]);
                exit;
            }
    
            // Prepare data for registration
            $data = [
                'sptype' => $sptype,
                'name' => $name,
                'nic' => $nic,
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
                'password' => $hashedPassword,
                'reg_num' => $reg_num,
                'plan' => $selectedPlan,
                'document_path' => $pdfPath
            ];

            // Insert user data
            if ($this->serviceProviderModel->registerSupplier($data)) {
                echo json_encode(['success' => true, 'message' => 'Registration successful!']);
                exit; // Ensure the script stops after sending the response
            } else {
                echo json_encode(['success' => false, 'errors' => ['database' => 'Failed to register. Try again later.']]);
                exit;
            }
        }
    }



    public function uploadImage() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_image'])) {
            $file = $_FILES['profile_image'];
            $allowedTypes = ['jpg', 'jpeg', 'png'];
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
            if (in_array($extension, $allowedTypes)) {
                $userId = $_SESSION['id'];
                $userType = $_SESSION['type'];
                $baseDir = 'Uploads/ProfilePictures/';
                $userDir = $baseDir . $userType . '/' . $userId . '/';
                
                if (!is_dir($userDir)) {
                    mkdir($userDir, 0777, true); // Create directory recursively
                }

                $uniqueName = uniqid() . '.' . $extension;
                $targetFilePath = $userDir . $uniqueName;
    
                if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                    $relativePath = $userType . '/' . $userId . '/' . $uniqueName;
                    $this->serviceProviderModel->updateProfileImage($userType, $userId, $relativePath);
    
                    header('Location: ' . URLROOT . '/profile');
                    exit;
                } else {
                    die('Error uploading file.');
                }
            } else {
                die('Invalid file type.');
            }
        }
    }

    public function validationNew() {
        header('Content-Type: application/json');
    
        // Ensure the request method is POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            $data = json_decode(file_get_contents('php://input'), true);
            $errors = [];        
            $step = isset($data['step']) ? intval($data['step']) : 0;
        
            if ($step === 1) {
                // Step 1: Basic info
                if (empty(trim($data['name'] ?? ''))) {
                    $errors['name'] = 'Name is required.';
                }
        
                if (empty(trim($data['email'] ?? ''))) {
                    $errors['email'] = 'Email is required.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = 'Invalid email format.';
                } else{
                    $email = $data['email'];
                    $serviceType = $data['sptype']; 
                    
                    if ($this->serviceProviderModel->findUserByEmail($email, $serviceType)) {
                        $errors['email'] = 'This email is already registered for the selected service type.';
                    }
                }
        
                if (empty(trim($data['nic'] ?? '')) || !preg_match('/^[0-9]{9}[vVxX]?$|^[0-9]{12}$/', $data['nic'])) {
                    $errors['nic'] = 'Invalid NIC number.';
                }
        
                if (empty(trim($data['phone'] ?? '')) || !preg_match('/^[0-9]{10}$/', $data['phone'])) {
                    $errors['phone'] = 'Phone number must be 10 digits.';
                }
        
                if (empty(trim($data['sptype'] ?? ''))) {
                    $errors['sptype'] = 'Service type is required.';
                }
            }
        
            if ($step === 2) {
                // Step 2: Address info
                if (empty(trim($data['reg_num'] ?? ''))) {
                    $errors['reg_num'] = 'Government Registration Number is required.';
                }
            
                // // Validate PDF File
                // if (empty($data['pdfFile'] ?? '')) {
                //     $errors['pdfFile'] = 'Document is required.';
                // } elseif (!preg_match('/\.pdf$/i', $data['pdfFile'])) {
                //     $errors['pdfFile'] = 'Only PDF files are allowed.';
                // }
            
                // Validate Password
                if (empty(trim($data['password'] ?? ''))) {
                    $errors['password'] = 'Password is required.';
                } elseif (strlen($data['password']) < 6) {
                    $errors['password'] = 'Password must be at least 6 characters.';
                }
            
                // Validate Confirm Password
                if (empty(trim($data['confirm_password'] ?? ''))) {
                    $errors['confirm_password'] = 'Confirm Password is required.';
                } elseif ($data['password'] !== $data['confirm_password']) {
                    $errors['confirm_password'] = 'Passwords do not match.';
                }
            }

            if (!empty($errors)) {
                echo json_encode(['success' => false, 'errors' => $errors]);
            } else {
                echo json_encode(['success' => true]);
            }
        }else{
            echo json_encode(['success' => false, 'errors' => ['common' => 'Invalid request method.']]);
            http_response_code(405); 
            return;
    }
}
}

?>
                   
