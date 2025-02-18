<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Users extends Controller {
    private $userModel;
    private $equipmentModel;
    

    public function __construct() {

        $this->userModel = $this->model('M_users');
        $this->equipmentModel = $this->model('equipmentModel');
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
             // Get booking history
        $userId = $_SESSION['user_id'];
        $bookingHistory = $this->userModel->getBookingHistory($userId);

        // Pass data to view
        $data = [
            'bookingHistory' => $bookingHistory
        ];

        $this->view('users/v_history', $data);

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
            if($accomadation=$this->userModel->searchAccommodations($data)){
                // If the search is successful, load the view with the search results
                $data = [
                    'accomadation' => $accomadation
                ];
        
                // Load the view with the search results
                $this->view('users/v_accomadation',$data );
            } else {
                // If the search is not successful, load the view with an error message
                $this->view('users/notfound');
            }
            

           
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

    public function viewdetails($property_id){
        if(isset($_SESSION['user_id'])) {
            $availableRooms = $this->userModel->getAvailableRooms($property_id);
            $accomadation = $this->userModel->getAccommodationById($property_id);
            $data=[
                'accomadation' => $accomadation,
                'availableRooms' => $availableRooms
            ];
            $this->view('users/viewdetails',$data);
        }else{
            redirect('users/login');
        }
        
    }

    public function equipment_suppliers(){
        if(isset($_SESSION['user_id'])) {
            $equipment = $this->equipmentModel->getAllEquipment();
            $categories = $this->equipmentModel->getAllCategories();
    
            $data = [
                'equipments' => $equipment,
                'categories' => $categories
            ];
    
            $this->view('users/v_equipment_suppliers', $data);
        
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
               
            ];


          $errors=[];

            // Validate name
            if (empty($data['name'])) {
                $errors[] = 'Please enter name';
            }

            // Validate email
            if (empty($data['email'])) {
                $errors[] = 'Please enter email';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $errors[] = 'Email is already taken';
                }
            }

            // Validate password
            if (empty($data['password'])) {
                $errors[] = 'Please enter password';
            }

          

            // Make sure errors are empty
            if (empty($errors)) {
                // Validated

                // Hash the password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                $isInserted = $this->userModel->register($data);

               

                if ($isInserted) {
                    redirect('users/login');
                } else {
                    print_r('Something went wrong');
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

public function notfound() {
    $this->view('users/notfound');
}

//cancel the booking
public function cancelBooking() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Process form
        $bookingId = trim($_POST['booking_id']);

        // Cancel the booking
        if ($this->userModel->cancelBooking($bookingId)) {
            echo "<script>alert('Booking cancelled successfully'); window.location.href = '" . URLROOT . "/users/history';</script>";
        } else {
            echo "<script>alert('An error occurred. Please try again'); window.location.href = '" . URLROOT . "/users/history';</script>";
        }
    } else {
        redirect('users/v_history');
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

 



public function book(){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data = [
            'property_id' => trim($_POST['property_id']),
            'check_in' => trim($_POST['check-in-date']),
            'check_out' => trim($_POST['check-out-date']),
            'people' => trim($_POST['guests']),
            'price' => trim($_POST['totalamount']),
            'user_id' => $_SESSION['user_id'],
            'paid' => trim($_POST['totalpaid']),
            'totalrooms' => trim($_POST['totalrooms']),
            'singleamount'=> trim($_POST['singleamount']),
            'doubleamount'=> trim($_POST['doubleamount']),
            'familyamount'=> trim($_POST['familyamount']),
            'service_provider_id'=> trim($_POST['service_provider_id']),
        ];



        $errors=[] ;

        // Validate check in date
        if (empty($data['check_in'])) {
            $errors[] = 'Please enter check in date';
        }

        // Validate check out date
        if (empty($data['check_out'])) {
            $errors[] = 'Please enter check out date';
        }

        // Validate number of guests
        if (empty($data['people'])) {
            $errors[] = 'Please enter number of guests';
        }

        // Validate total amount    
        if (empty($data['price'])) {
            $errors[] = 'Please enter total amount';
        }   

        // Validate total paid

        if (empty($data['paid'])) {
            $errors[] = 'Please enter total paid';
        }

        // Validate total rooms

        if (empty($data['totalrooms'])) {
            $errors[] = 'Please enter total rooms';
        }

        if(empty($errors)){
            print_r('no errors');
            $isInserted = $this->userModel->book($data);
            if($isInserted){
                redirect('users/history');
            }else{
                print_r('Something went wrong');
            }
}else{
    redirect('users/login');
}
    }

else{
    print_r('method is not POST');
}

}

public function weather(){
    if(isset($_SESSION['user_id'])) {
        $this->view('users/weatherView');
    }else{
        redirect('users/login');
    }
}


public function planhome(){
    if(isset($_SESSION['user_id'])) {
        $this->view('users/planHome');
    }else{
        redirect('users/login');
    }
}

public function showaccommodation(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get the form data
        $data=[
            $location = trim($_POST['location']),
            $people = trim($_POST['people']),
            $start_date = trim($_POST['startDate']),
            $end_date = trim($_POST['endDate']),
        ];

     

        // Call the model to search for accommodations
        if($showaccomadation=$this->userModel->showAccommodation($data)){
            // If the search is successful, load the view with the search results
            $data = [
                'showaccomadation' => $showaccomadation
            ];

            //print the data
            
            // Load the view with the search results
            $this->view('users/bookAccomodations',$data );
        } else {
            // If the search is not successful, load the view with an error message
            $this->view('users/notfound');
        }


}

}


public function showGuider(){
    if(isset($_SESSION['user_id'])) {
        $guide=$this->userModel->getGuider();


   
        $data = [
            'guide' => $guide
        ];
        $this->view('users/bookguider',$data);
    }else{
        redirect('users/login');
    }
}


public function forgotPassword(){
    $data = json_decode(file_get_contents('php://input'), true);
    
    if($data){
        $step = $data['step'];
        if ($step == 'email') {

            $email = $data['email'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(['error' => 'Invalid email format.']);
                return;
            }

            $user = $this->userModel->findUserByEmail($email);
            if (!$user) {
                echo json_encode(['error' => 'This email does not exist.']);
                return;
            }

            // Send OTP (dummy code, replace with real OTP generation and sending logic)
            $otp = rand(100000, 999999);
            // Assume this function sends the OTP to the user.

            // Return success and indicate to move to OTP step
            if($this->sendOtpToEmail($email, $otp)){
                echo json_encode(['success' => true, 'step' => 'email']);
            }
            else{
                echo json_encode(['success' => false, 'step' => 'email']);
            }
        } 
    }else{
        $this->view('users/v_forgot_password');
    }
}

public function sendOtpToEmail($email, $otp) {
    $mail = new PHPMailer(true);  // Create a new PHPMailer instance

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Use your SMTP server here
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@example.com';
        $mail->Password = 'your_password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('no-reply@journeybeyond.com', 'No Reply');
        $mail->addAddress($email);  // Add the recipient's email address

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Password Reset';
        $mail->Body    = "Use the following OTP to reset your password: $otp";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
}


?>

