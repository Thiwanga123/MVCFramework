<?php

    class Booking extends Controller{

        private $equipmentModel;

        public function __construct(){
            $this->equipmentModel = $this->model('equipmentModel');
        }


        public function addEquipmentBooking(){
            if(isset($_SESSION['user_id'])) {
                
                $data = [
                    'product_id' => $_POST['product_id'],
                    'start_date' => $_POST['start_date'],
                    'end_date' => $_POST['end_date'],
                ];

                $bookings = $this->equipmentModel->getBookingsByEquipmentId($data['product_id']);
                print_r($bookings);
                exit;

                $conflict = false;
                foreach ($bookings as $booking) {
                    if (!($data['end_date'] < $booking->start_date || $data['start_date'] > $booking->end_date)) {
                        $conflict = true;
                        break;
                    }
                }

                if($conflict){
                    $data['error'] = 'The selected dates are already booked.';
                }
               
            }else{
                redirect('users/login');
            }

           
        }
    }
?>