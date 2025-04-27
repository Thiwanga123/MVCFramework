<?php

    class Booking extends Controller{

        private $equipmentModel;
        private $bookingModel;
        private $supplierModel;
        private $productModel;

        public function __construct(){
            $this->equipmentModel = $this->model('equipmentModel');
            $this->bookingModel = $this->model('BookingModel');
            $this->productModel = $this->model('ProductModel');
        }

        public function policyCheck(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = json_decode(file_get_contents("php://input"), true);

                if(isset($data['id']) && isset($data['type'])){
                    $id = $data['id'];
                    $table = $data['type'];

                    switch ($table) {
                        case 'Equipment':
                            // $result = $this->handleEquipmentPolicy($id);
                            break;
        
                        case 'Accommodation':
                            // $result = $this->handleAccommodationPolicy($id);
                            break;
        
                        case 'Vehicle':
                            // $result = $this->handleVehiclePolicy($id);
                            break;
        
                        case 'Guider':
                            // $result = $this->handleGuiderPolicy($id);
                            break;
        
                        default:
                            echo json_encode(['success' => false, 'message' => 'Unknown actor type.']);
                            return;
                    }

                }else{

                }
            }
        }

     /////////////////////////////////////////////////////////////Equipment Booking Section//////////////////////////////////////////////////////////////////////////

        public function addEquipmentBooking(){    
            if(isset($_SESSION['user_id'])) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = [
                        'user_id' => $_SESSION['user_id'],
                        'product_id' => $_POST['product_id'],
                        'supplier_id' => $_POST['supplier_id'],
                        'totalPrice' => $_POST['totalPrice'],
                        'booking_start_date' => $_POST['booking_start_date'],
                        'booking_end_date' => $_POST['booking_end_date']
                    ];
                
                    $bookings = $this->bookingModel->getBookingsByEquipmentId($data['product_id']);
                    $conflict = false;
            
                    foreach ($bookings as $booking) {
                        if (!($data['booking_end_date'] <= $booking->start_date || $data['booking_start_date'] >= $booking->end_date)) {
                            $conflict = true;
                            break;
                        }
                    }

                    if ($conflict) {
                        $response = ['success' => false, 'message' => 'The selected dates are already booked'];
                        echo json_encode($response);
                    } else {
                        $this->bookingModel->addEquipmentBooking($data);
                        $response = ['success' => true, 'message' => 'Booking successful'];
                        echo json_encode($response);
                    }
                } else {
                    $response = ['success' => false, 'message' => 'Invalid request method'];
                    echo json_encode($response);
                }
            }else{
                redirect('users/login');
            } 
        }


       public function cancelEquipmentBooking($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = json_decode(file_get_contents("php://input"), true);
                $bookingId = isset($data['booking_id']) ? (int) trim($data['booking_id']) : (int) $id;

                if (!$bookingId) {
                    echo json_encode(['success' => false, 'message' => 'Invalid booking ID']);
                    exit;
                }

                $booking = $this->bookingModel->getEquipmentBookingById($bookingId);

                if (!$booking) {
                    echo json_encode(['success' => false, 'message' => 'Booking not found']);
                    exit;
                }

                if (in_array(strtolower($booking->status), ['cancelled', 'completed'])) {
                    echo json_encode(['success' => false, 'message' => 'Booking is already cancelled or completed']);
                    exit;
                }

                // Ensure the supplier is the one who owns this booking
                if (!isset($_SESSION['id']) || $booking->supplier_id != $_SESSION['id']) {
                    echo json_encode(['success' => false, 'message' => 'You are not authorized to cancel this booking']);
                    exit;
                }

                // Calculate if penalty applies (within 3 days of start date)
                date_default_timezone_set('Asia/Colombo');
                $bookingStartDate = new DateTime($booking->start_date);
                $currentDate = new DateTime();
                $daysUntilBooking = $currentDate->diff($bookingStartDate)->days;
                $isPenaltyApplicable = ($daysUntilBooking <= 3 && $bookingStartDate > $currentDate);
                
                // Calculate penalty amount (20% of booking amount if applicable)
                $penaltyAmount = $isPenaltyApplicable ? ($booking->total_price * 0.2) : 0;
                
                // Process cancellation with appropriate penalty
                $result = $this->bookingModel->cancelEquipmentBooking($bookingId, $booking->supplier_id, $penaltyAmount);
                
                if ($result) {
                    // Create response message
                    if ($isPenaltyApplicable) {
                        $message = 'Booking cancelled successfully. A 20% penalty (Rs. ' . number_format($penaltyAmount, 2) . ') has been applied to your account. We have fully refunded the amount of Rs. ' . number_format($booking->total_price, 2) . ' to the traveler.';
                    } else {
                        $message = 'Booking cancelled successfully. We have fully refunded the amount of Rs. ' . number_format($booking->total_price, 2) . ' to the traveler.';
                    }
                    
                    echo json_encode(['success' => true, 'message' => $message]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Something went wrong while cancelling the booking']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid request method']);
            }
        }

        /**
         * Generate PayHere hash for secure payment
         */
        public function generateHash()
        {
            // Make sure this is a POST request with JSON content
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405);
                echo json_encode(['success' => false, 'message' => 'Method not allowed']);
                return;
            }
            
            // Get the JSON data
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);
            
            // Validate the data
            if (!isset($data['order_id']) || !isset($data['amount']) || !isset($data['currency'])) {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Missing required fields']);
                return;
            }
            
            // Set merchant details
            $merchant_id = '1229635';
            $merchant_secret = 'MzgwMDgyNjc2ODIwOTcyNzYwNjExODUyODIzOTYyNzY3NTk4ODY5';
            
            // Calculate the hash
            $hash = strtoupper(md5(
                $merchant_id . 
                $data['order_id'] . 
                number_format($data['amount'], 2, '.', '') . 
                $data['currency'] .  
                strtoupper(md5($merchant_secret)) 
            ));
            
            // Return the hash
            echo json_encode([
                'success' => true,
                'hash' => $hash
            ]);
        }


        
    


        public function saveEquipmentBooking(){
            $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['equipmentId'], $data['startDate'], $data['endDate'], $data['totalPrice'])) {
            $equipmentId = $data['equipmentId'];
            $startDate = $data['startDate'];
            $endDate = $data['endDate'];
            $totalPrice = $data['totalPrice'];
          
            $_SESSION['equipmentBooking'] = [
                'equipmentId' => $equipmentId,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'totalPrice' => $totalPrice
            ];

            // Send a success response back to the client
            echo json_encode(['success' => true, 'message' => 'Booking saved successfully in session']);
        } else {
            // Return an error response if the data is missing or invalid
            echo json_encode(['success' => false, 'message' => 'Invalid data received']);
        }
        }


    }
?>