<?php

    class Booking extends Controller{

        private $equipmentModel;

        public function __construct(){
            $this->equipmentModel = $this->model('equipmentModel');
        }

<<<<<<< HEAD
=======
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

     //////////////////////////////////////////Equipment Booking Section//////////////////////////////////////////////////////////////////////////
>>>>>>> main

        public function addEquipmentBooking(){    
            header('Content-Type: application/json');        
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

                
                    $bookings = $this->equipmentModel->getBookingsByEquipmentId($data['product_id']);
                    $conflict = false;
            
                    foreach ($bookings as $booking) {
                        if (!($data['booking_end_date'] <= $booking->start_date || $data['booking_start_date'] >= $booking->end_date)) {
                            $conflict = true;
                            break;
                        }
                    }
            
                    if ($conflict) {
                        $response = [
                            'success' => false,
                            'message' => 'The selected dates are already booked'
                        ];
                        
                        echo json_encode($response);

                    } else {
                        $this->equipmentModel->addEquipmentBooking($data);
                        $response = [
                            'success' => true,
                            'message' => 'Booking successful'
                        ];
                        echo json_encode($response);
                    }
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Invalid request method'
                    ];
                    echo json_encode($response);
                }
            }else{
                redirect('users/login');
            } 
        }


    }
?>