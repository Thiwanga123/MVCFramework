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
            $total_service_providers = $this->adminModel->getTotalServiceProviders();
            $data=[
                'number_of_travelers'=>$number_of_travelers,
                'total_service_providers'=>$total_service_providers
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
          //get all registered accomadations
            $accomadation_suppliers = $this->adminModel->getAccomadationSuppliers();
        //get all registered vehicle suppliers
            $vehicle_suppliers = $this->adminModel->getVehicleSuppliers();
        //get all registered equipment suppliers
            $equipment_suppliers = $this->adminModel->getEquipmentSuppliers();
        //get all registered tour guides
            $tour_guides = $this->adminModel->getTourGuides();
        //get the last 3 joined serviceproviders
            $last_three_service_providers = $this->adminModel->getLastThreeServiceProviders();
    
            

            $data=[
                'accomadation_suppliers'=>$accomadation_suppliers,
                'vehicle_suppliers'=>$vehicle_suppliers,
                'equipment_suppliers'=>$equipment_suppliers,
                'tour_guides'=>$tour_guides,
                'last_three_service_providers'=>$last_three_service_providers,
            ];

            $this->view('admin/serviceproviders', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function profile() {
        //if an admin is logged in
        if (isset($_SESSION['user_id'])) {
            $name=$_SESSION['name'];
            $email=$_SESSION['email'];
            $phone_number=$_SESSION['phone_number'];
            $nic=$_SESSION['nic'];
            

            $data=[
                'name'=>$name,
                'email'=>$email,
                'phone_number'=>$phone_number,
                'nic'=>$nic,
                
            ];


            $this->view('admin/v_profile', $data);
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
        $_SESSION['phone_number'] = $user->phone_number;
        $_SESSION['nic'] = $user->nic;
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


    public function deleteTraveler($id) {
        //if an admin is logged in
        if (isset($_SESSION['user_id'])) {
            
                if($this->adminModel->deleteTravelerById($id)) {
                    redirect('admin/travelers');
                } else {
                    die('Something went wrong');
                }
            
        } else {
            redirect('admin/login');
        }
    }


    public function updateprofile(){
      //after update the profile the admin automatically logout and redirect to login page
        if (isset($_SESSION['user_id'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
                // Init data
                $data = [
                    'id' => $_SESSION['user_id'],
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'phone_number' => trim($_POST['phone_number']),
                    'nic' => trim($_POST['nic']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'phone_number_err' => '',
                    'nic_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
        
                // Validate name
                if (empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }
        
                // Validate email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check email
                    if ($this->adminModel->findUserByEmail($data['email'])) {
                        if ($data['email'] != $_SESSION['email']) {
                            $data['email_err'] = 'Email is already taken';
                        }
                    }
                }
        
                // Validate phone number
                if (empty($data['phone_number'])) {
                    $data['phone_number_err'] = 'Please enter phone number';
                }
        
                // Validate NIC
                if (empty($data['nic'])) {
                    $data['nic_err'] = 'Please enter NIC';
                }
        
               
        
                // Validate confirm password
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
        
                // Make sure errors are empty
                if (empty($data['name_err']) && empty($data['email_err']) && empty($data['phone_number_err']) && empty($data['nic_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated
                    //no nedd to hash password

        
                    // Register User
                    if ($this->adminModel->updateProfile($data)) {
                        // Redirect to the login page
                        redirect('admin/logout');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('admin/v_profile', $data);
                }

            } else {
                // Init data
                $data = [
                    'id' => $_SESSION['user_id'],
                    'name' => $_SESSION['name'],
                    'email' => $_SESSION['email'],
                    'phone_number' => $_SESSION['phone_number'],
                    'nic' => $_SESSION['nic'],
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'phone_number_err' => '',
                    'nic_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
        
                // Load view
                $this->view('admin/v_profile', $data);
            }
        } else {
            redirect('admin/v_profile');
        }
    }

    


  



    //show all accomadation suppliers
    public function accomadationSuppliers() {
        //if an admin is logged in
        if (isset($_SESSION['user_id'])) {
            $accomadation_suppliers = $this->adminModel->getAccomadationSuppliers();
            $data=[
                'accomadation_suppliers'=>$accomadation_suppliers
            ];
            $this->view('admin/v_serviceproviders', $data);
        } else {
            redirect('admin/login');
        }
    }


    //view service provider details
    public function viewServiceProviderDetails($id,$sptype){
        // Check if an admin is logged in
    if (isset($_SESSION['user_id'])) {
        // Retrieve the data from the model
        $serviceprovider = $this->adminModel->getServiceProviderDetails($id, $sptype);
        
        // Prepare the data
        $data = [
            'name' => $serviceprovider->name,
            'id' => $serviceprovider->id,
            'sptype' => $serviceprovider->sptype,
            'date_of_joined' => $serviceprovider->date_of_joined,
            'phone' => $serviceprovider->phone,
        ];

        // Send the data as JSON
        header('Content-Type: application/json');
        json_encode($data);
    } else {
        redirect('admin/login');
    }
    }


    

}

?>