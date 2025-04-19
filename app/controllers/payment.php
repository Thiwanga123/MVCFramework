<?php
// require_once 'app/models/PaymentModel.php';

class Payment extends Controller {

    private $PaymentModel;

    private $userModel;


    public function __construct(){
        $this->PaymentModel = $this->model('PaymentModel');
        $this->userModel = $this->model('M_users');
    }
    
    public function index(){
        $this->view('payment/payhere_form');
    }

  

    public function payment_accomodation(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get booking details from form
            $data = [
                'property_id' => $_POST['property_id'],
                'service_provider_id' => $_POST['service_provider_id'],
                'check_in' => $_POST['check_in'],
                'check_out' => $_POST['check_out'],
                'people' => $_POST['guests'],
                'price' => $_POST['totalamount'],
                'totalrooms' => $_POST['totalrooms'],
                'singlerooms' => $_POST['single_rooms'],
                'doublerooms' => $_POST['double_rooms'],
                'familyrooms' => $_POST['family_rooms'],
                'order_id' => 'ORDER' . time() . rand(1000, 9999),
                'amount' => $_POST['totalamount'],
                'currency' => 'LKR'
            ];

            // Debugging line to check the data

           
            $merchant_id = '1229635';
            $merchant_secret = 'MzgwMDgyNjc2ODIwOTcyNzYwNjExODUyODIzOTYyNzY3NTk4ODY5';
            
            $hash = strtoupper(md5(
                $merchant_id . 
                $data['order_id'] . 
                number_format($data['amount'], 2, '.', '') . 
                $data['currency'] .  
                strtoupper(md5($merchant_secret)) 
            ));
            
            $data['hash'] = $hash;
            $data['merchant_id'] = $merchant_id;


  
   
            
            // Pass data to payment form view
            $this->view('payment/payhere_form', $data);
        } else {
            // Redirect to accommodation page if accessed directly
            redirect('users/accomadation');
        }

    }

    public function success_accomodation() {
        // Check if order_id exists in URL and booking data exists in session
    if(isset($_GET['order_id']) && isset($_SESSION['booking_data'])) {
        $order_id = $_GET['order_id'];
        $booking_data = $_SESSION['booking_data'];

         // Debugging line to check the booking data         
        
        // Verify the order_id matches to prevent tampering
        if($booking_data['order_id'] == $order_id) {
            // Add user ID
            $booking_data['user_id'] = $_SESSION['user_id'];

        
            // Save the booking to database
            $booking_id = $this->userModel->book_accomodation($booking_data);

           // Debugging line to check the booking ID
            
            if($booking_id) {
                // Add booking_id to data for display
                $booking_data['booking_id'] = $booking_id;
                
                // Show success page with all booking details
                $this->view('payment/success', $booking_data);
                
                // Clear the session data after successful processing
                unset($_SESSION['booking_data']);
            } else {
                // If database insert fails
                $this->view('payment/failed', ['message' => 'Failed to save booking']);
            }
        } else {
            // If order_id doesn't match (possible tampering)
            $this->view('payment/failed', ['message' => 'Invalid order ID']);
        }
    } else {
        // If required data is missing
        redirect('users/accomadation');
    }
    }

    public function failed() {
        echo "Payment Failed!";
    }

    public function getHash() {

        $paymentModel = new PaymentModel();
        $hash = $paymentModel->generatePaymentHash();

       
    }

    public function notify() {
        $paymentModel = new PaymentModel();
        $paymentModel->handleIPN();
    }
}
