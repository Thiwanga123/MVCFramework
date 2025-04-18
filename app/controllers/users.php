<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Users extends Controller {
    private $userModel;
    private $equipmentModel;
    private $reviewModel;
    private $bookingModel;
    private $transportModel;
    

    public function __construct() {
        $this->userModel = $this->model('M_users');
        $this->equipmentModel = $this->model('equipmentModel');
        $this->reviewModel = $this->model('ReviewModel');
        $this->bookingModel = $this->model('BookingModel');
        $this->transportModel = $this->model('TransportModel');

    }

    public function index() {
        $data = $this->userModel->getUsers();
        $this->view('pages/index', $data);
    }

    public function dashboard() {
        // Check if logged in
        if(isset($_SESSION['user_id'])) {
            $data['currentPage'] = 'dashboard';
            $this->view('users/v_dashboard', $data);
            
        }else{
            redirect('users/login');
        }
        
        
    }

    public function history() {
        //check if logged in
        if(isset($_SESSION['user_id'])) {
             // Get booking history
        $userId = $_SESSION['user_id'];
        $bookings = $this->userModel->getBookingHistory($userId);
        $totalBookings = count($bookings);
        $currentPage = 'history';

        $data = [
            'bookings' => $bookings,
            'booking_count' => $totalBookings,
            'currentPage' => $currentPage
        ];

        $this->view('users/v_history', $data);
        }else{
            redirect('users/login');
        }
    }

    public function accomadation() {

        if(isset($_SESSION['user_id'])) {
            $currentPage = 'accomadation';

            $data = [
                'currentPage' => $currentPage
            ];

            //when Enter the location, number of guests, and the budget then click the search button, after that the system will display the available accomodations
            $this->view('users/v_accomadation', $data);
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
            $vehicles = $this->userModel->getAllvehicles($_SESSION['user_id']); 
            $currentPage = 'vehicles';

            $data = [
                'currentPage' => $currentPage,
                'vehicles' => $vehicles
            ];

            $this->view('users/v_vehicles',$data, $data);
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
            $currentPage = 'equipment_suppliers';

            $data = [
                'equipments' => $equipment,
                'categories' => $categories,
                'currentPage' => $currentPage
            ];
    
            $this->view('users/v_equipment_suppliers', $data);
        
        }else{
            redirect('users/login');
        }
        
    }

    public function guider(){
        if(isset($_SESSION['user_id'])) {
            $currentPage = 'guider';
            $data = [
                'currentPage' => $currentPage
            ];            
            $this->view('users/v_guider', $data);
        }else{
            redirect('users/login');
        }
        
    }

    public function package(){
        if(isset($_SESSION['user_id'])) {
            $currentPage = 'package';
            $data = [
                'currentPage' => $currentPage
            ];
            $this->view('users/v_package', $data);
        }else{
            redirect('users/login');
        }
        
    }
    
    public function contact(){
        if(isset($_SESSION['user_id'])) {
            $currentPage = 'contact';
            $data = [
                'currentPage' => $currentPage
            ];
            $this->view('users/v_contact', $data);
        }else{
            redirect('users/login');
        }
    }

    public function profile(){
        if(isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $details = $this->userModel->getUserDetailsById($userId);
            $currentPage = 'profile';
            $data = [
                'details' => $details,
                'currentPage' => $currentPage
            ];
            $this->view('users/v_profile', $data);
        }else{

            redirect('users/login');
        }
    }

    public function reviews(){
        if(isset($_SESSION['user_id'])) {
            $currentPage = 'revies';
            $data = [
                'currentPage' => $currentPage
            ];
            $this->view('users/v_reviews', $data);
        }else{
            redirect('users/login');
        }
    }

    public function viewProduct($equipmentId){
        if(isset($_SESSION['user_id'])){
            $details = $this->equipmentModel->getProductDetailsById($equipmentId);
            $bookings = $this->bookingModel->getBookingsByEquipmentId($equipmentId);
            $reviews = $this->reviewModel->getReviewsByEquipmentId($equipmentId);
            $ratings = $this->reviewModel->getRatingsByEquipmentId($equipmentId);
            $reviewCount = count($reviews);
            
            $totalRating = 0;
            $userReview = null;
            foreach ($reviews as $review) {
                $totalRating += $review->rating;
                if ($review->traveler_id == $_SESSION['user_id']) {
                    $userReview = $review;
                }
            }
            $averageRating = $reviewCount > 0 ? round($totalRating / $reviewCount, 1) : 0;

            $data = [
                'user_id' => $_SESSION['user_id'],
                'details' => $details,
                'bookings' => json_encode($bookings),
                'reviews' => $reviews,
                'userReview' => $userReview,
                'reviewCount' => $reviewCount,
                'averageRating' => $averageRating,
                'ratings' => $ratings
            ];

            $this->view('users/rentEquipment',$data);
        }else{
            redirect('users/login');
        }
    }

   public function viewVehicle($vehicleId) {
    if (isset($_SESSION['user_id'])) {
        // Get detailed info for one vehicle
        $vehicle = $this->transportModel->getVehicleWithImages($vehicleId);
        $bookings = $this->bookingModel->getBookingsByVehicleId($vehicleId);
        $reviews = $this->reviewModel->getReviewsByVehicleId($vehicleId);
        $ratings = $this->reviewModel->getRatingsByVehicleId($vehicleId);
        $reviewCount = count($reviews);

        $totalRating = 0;
        $userReview = null;

        foreach ($reviews as $review) {
            $totalRating += $review->rating;
            if ($review->user_id == $_SESSION['user_id']) {
                $userReview = $review;
            }
        }

        $averageRating = $reviewCount > 0 ? round($totalRating / $reviewCount, 1) : 0;

        $data = [
            'user_id' => $_SESSION['user_id'],
            'details' => $details,
            'bookings' => json_encode($bookings),
            'reviews' => $reviews,
            'userReview' => $userReview,
            'reviewCount' => $reviewCount,
            'averageRating' => $averageRating,
            'ratings' => $ratings
        ];

        $this->view('users/rentVehicle', $data);
    } else {
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


public function showuser()
{
    $data['activePage'] = 'My Inventory';
    if (isset($_SESSION['id'])) {
        $supplierId = $_SESSION['id'];
        $vehicles = $this->transportModel->getAllVehicles($supplierId);//Debugging
        $this->view('users/v_vehicles', ['vehicles' => $vehicles]);
    } else {
        redirect('ServiceProvider');
    }
}
public function bookings(){
    if(isset($_SESSION['user_id'])) {
        $this->view('users/booking');
    }else{
        redirect('users/login');
    }
}



public function myInventory()
{
    $data['activePage'] = 'My Inventory';
    if (isset($_SESSION['id'])) {
        $supplierId = $_SESSION['id'];
        $this->userModel = $this->model('M_users');
        $vehicles = $this->transportModel->getAllVehicles($supplierId);//Debugging
        $this->view('users/vehicles', ['vehicles' => $vehicles]);
    } else {
        redirect('ServiceProvider');
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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $email = trim($_POST['email']);
        
            $data = [
                'email' => $email,
                'table' => '',
                'email_err' => '',
                'success_msg' => '',
            ];

            if (empty($email)) {
                $data['email_err'] = 'Email is required.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Invalid email format.';
            }

            if (empty($data['email_err'])){
                $tables = ['traveler', 'accomadation', 'equipment_suppliers', 'tour_guides', 'transport_suppliers'];
                $user = null;

                foreach ($tables as $table) {
                    $user = $this->userModel->findUsersByEmail($email, $table);
                    
                    if ($user) {
                        $data['table'] = $table; // Store the table name where the user was found
                        break;
                    }
                }

                if($user){
                    $token = bin2hex(random_bytes(16));
                    $hashedToken = hash('sha256', $token);
                    date_default_timezone_set('Asia/Colombo'); 
                    $expiry = time() + 1800;
                    $expiryFormatted = date('Y-m-d H:i:s', $expiry);

                    $this->userModel->storeResetToken($email, $table, $hashedToken, $expiryFormatted);
                    $resetLink = URLROOT . "/users/resetPassword?token=$token" . urlencode($token);
                    
                    $this->sendPasswordResetEmail($email, $resetLink);
                    $data['success_msg'] = 'A reset link has been sent to your email address.';
                }
                else{
                    $data['email_err'] = 'No account found with that email address.';
                }
            }
            $this->view('users/v_forgot_password', $data);
        }
        else{
            $data = [
                'email' => '',
                'email_err' => '',
                'success_msg' => ''
            ];
            $this->view('users/v_forgot_password', $data);
        }
    }
    
    public function sendPasswordResetEmail($email, $resetLink) {
        $mail = new PHPMailer(true);  // Create a new PHPMailer instance
       
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Use your SMTP server here
            $mail->SMTPAuth = true;
            $mail->Username = 'journeybeyond.noreply@gmail.com';
            $mail->Password = 'dksv nbbg hvdy kjfp';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('journeybeyond.noreply@gmail.com', 'JourneyBeyond');
            $mail->addAddress($email);  // Add the recipient's email address

            $mail->isHTML(true);
            $mail->Subject = 'Your Link for Password Reset';
            $mail->Body    = "
                <html>
                <head>
                    <title>Password Reset</title>
                </head>
                <body>
                    <p>Hi,</p>
                    <p>You requested a password reset. Please click the link below to reset your password:</p>
                    <p><a href='$resetLink'>$resetLink</a></p>
                    <p>If you didn't request a password reset, please ignore this email.</p>
                </body>
                </html>
            ";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function validateResetToken($token){
        $hashedToken = hash('sha256', $token);
        echo ($token);
        echo ("<br>");
        echo ($hashedToken);
        echo ("<br>");
        $user = $this->userModel->findUserByResetToken($hashedToken);
        echo ("user is: " . $user);
        exit;
        if($user && $user['expires_at'] > time()){
            echo ("token is valid");
            return $user;
        }else{
            echo ("token is not valid");
            return false;
        }
    }

    public function resetPassword(){
        if(isset($_GET['token']) && !empty($_GET['token'])){
            $token = $_GET['token'];

            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $user = $this->validateResetToken($token);
               
                if($user){
                    $data = [
                        'email' => $user['email'],
                        'token' => $token,
                        'password_err' => '',
                    ];
                    $this->view('users/v_reset_password', $data);
                }
                else{
                    $data = [
                        'error_msg' => 'Invalid or expired token.',
                    ];
                    echo "<script>alert('Invalid or expired token.'); window.location.href = '" . URLROOT . "/users/forgotPassword';</script>";
                }
            }
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $newPassword = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirmPassword']);
            $data = [
                'password_err' => '',
                'success_msg' => '',
            ];
            $user = $this->validateResetToken($token);

            if($user){
                if(empty($newPassword)){
                    $data['password_err'] = 'Please enter a new password.';
                } elseif(strlen($newPassword) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters.';
                }

                if($newPassword !== $confirmPassword){
                    $data['password_err'] = 'Passwords do not match.';
                }

                if(empty($data['password_err'])){
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $result = $this->userModel->updatePassword($user['email'], $hashedPassword);
                    if($result){
                        $data['success_msg'] = 'Password reset successfully.';
                        $data['success_msg'] = 'Your password has been reset successfully. You can now log in with your new password.';
                    }
                else{
                    $this->view('users/v_reset_password', $data);
                    }
                }
            

            
            }
        
        }
    }



}
?>

