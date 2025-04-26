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

                if (in_array($booking->status, ['cancelled', 'completed'])) {
                    echo json_encode(['success' => false, 'message' => 'Booking is already cancelled or completed']);
                    exit;
                }

                $product = $this->productModel->getDetailsForCancellations($booking->equipment_id);

                if (!$product) {
                    echo json_encode(['success' => false, 'message' => 'Product not found']);
                    exit;
                }

                date_default_timezone_set('Asia/Colombo');
                $bookingStartDate = new DateTime($booking->start_date);
                $currentDate = new DateTime();
                $interval = $currentDate->diff($bookingStartDate);
                $daysUntillBooking = (int)$interval->format('%r%a');

            }
        
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