    <?php

    class Accomadation extends Controller{

        private $accomadationModel;

        public function __construct(){
            $this->accomadationModel = $this->model('M_accomadation');
        }


        public function dashboard(){
            if (isset($_SESSION['id'])) {
                $userId = $_SESSION['id'];

                // // Get total accommodations
                // $totalAccommodations = $this->accomadationModel->getTotalAccommodation($userId);

                // Get total bookings
                // $totalBookings = $this->accomadationModel->getTotalBookings($userId);

            // Get total earnings
            // $totalEarnings = $this->accomadationModel->getTotalEarnings($userId);

            // $data = [
            //     'totalAccommodations' => $totalAccommodations,
            //     'totalBookings' => $totalBookings,
            
            //     ];

                $this->view('accomadation/Dashboard');
            } else {
                redirect('ServiceProvider/login');
            }
        
        
    }


    public function myInventory(){

        if (isset($_SESSION['id'])) {

            $userId = $_SESSION['id'];

            $accomadation=$this->accomadationModel->getAccomadation($userId);
            $data=[
                'accomadation'=>$accomadation,
            ];
                $this->view('accomadation/MyInventory',$data);
        } else {
            redirect('ServiceProvider/login');
        }
    }

    public function deleteproperty($id) {
        if (isset($_SESSION['id'])) {
            // Attempt to delete the property
            $isDeleted = $this->accomadationModel->deleteProperty($id);

            if ($isDeleted) {
                echo "<script>alert('Property removed successfully'); window.location.href = '" . URLROOT . "/accomadation/myInventory';</script>";
            } else {
                // Set session variable for delete error
                $_SESSION['delete_error'] = true;
                echo "<script>window.location.href = '" . URLROOT . "/accomadation/myInventory';</script>";
            }
        } else {
            echo "<script>alert('Please log in to delete a property'); window.location.href = '" . URLROOT . "/ServiceProvider/login';</script>";
        }
    }


    public function myPayments(){
        if (isset($_SESSION['id'])) {

            
                $userId = $_SESSION['id'];

                $payments=$this->accomadationModel->getpayments($userId);

                // Calculate total earnings
                    $totalEarnings = array_reduce($payments, function($sum, $payment) {
                        return $sum + $payment->paid;
                    }, 0);


                // Calculate total amount to be received
            $totalToBeReceived = array_reduce($payments, function($sum, $payment) {
                return $sum + ($payment->amount - $payment->paid);
            }, 0);
                    
                $data=[
                    'payments'=>$payments,
                    'totalEarnings' => $totalEarnings,
                    'totalToBeReceived' => $totalToBeReceived
                ];
            $this->view('accomadation/Mypayments',$data);
        } else {
            redirect('ServiceProvider/login');
        }
    }


        public function orders(){
            
            if (isset($_SESSION['id'])) {
                $userId = $_SESSION['id'];

                $accomadation=$this->accomadationModel->getBookings($userId);
                $data=[
                    'accomadation'=>$accomadation,
                ];
                $this->view('accomadation/Orders',$data);
            } else {
                redirect('ServiceProvider/login');
            }
        }

        public function reviews(){

            if (isset($_SESSION['id'])) {
                $this->view('accomadation/Reviews');
            } else {
                redirect('ServiceProvider');
            }
        }

        public function notifications(){

            if (isset($_SESSION['id'])) {
                $this->view('accomadation/Notifications');
            } else {
                redirect('ServiceProvider');
            }
            
        }


        public function profile(){

            if (isset($_SESSION['id'])) {
                $this->view('accomadation/Myprofile');
            } else {
                redirect('ServiceProvider');
            }
        }

        public function viewdetails($property_id){
            if (isset($_SESSION['id'])) {

            
        
                $accomadation=$this->accomadationModel->viewdetails($property_id);

                $data=[
                    'accomadation'=>$accomadation,
                ];
                
                    $this->view('accomadation/viewdetails',$data);
            } else {
                redirect('ServiceProvider/login');
            }
        
                
        
        }


        public function Inventorytable(){

        
                $this->view('accomadation/Inventorytable');
        
        }

        //logout
        public function logout(){
            session_destroy();  
            session_start();    

            redirect('ServiceProvider/login');
            exit();
        }

        //start
        public function start(){
            if (isset($_SESSION['id'])) {
                $this->view('accomadation/start');
            } else {
                redirect('ServiceProvider');
            }
            
        
        }

        // public function paymenthistory(){
        //     if (isset($_SESSION['id'])) {
            
        //             $userId = $_SESSION['id'];
        
        //             $payments=$this->accomadationModel->getpayments($userId);
        
        //             $data=[
        //                 'payments'=>$payments,
        //             ];

        //         $this->view('accomadation/paymenthistory',$data);
        //     } else {
        //         redirect('ServiceProvider');
        //     }
            
        // }

        public function basicinfo(){
            if (isset($_SESSION['id'])) {
                $this->view('accomadation/basicinformation');
            } else {
                redirect('ServiceProvider');
            }
            
        }

        public function propertyinfo(){
            if (isset($_SESSION['id'])) {
                $this->view('accomadation/propertyInformation');
            } else {
                redirect('ServiceProvider');
            }
            
        }

        public function uploadphoto(){
            if (isset($_SESSION['id'])) {
                $this->view('accomadation/uploadphoto');
            } else {
                redirect('ServiceProvider');
            }
            
        }

        public function success(){
            if (isset($_SESSION['id'])) {
                $this->view('accomadation/successful');
            } else {
                redirect('ServiceProvider');
            }
            
        }


        public function addProperty(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the JSON data from the frontend

            $finalData = json_decode(file_get_contents("php://input"), true);

                $data = [
                    'id' => $finalData['id'],
                    'type' => $finalData['type'],
                    'name' => $finalData['propertyname'],
                    'address' => $finalData['address'],
                    'postalCode' => $finalData['postalcode'],
                    'city' => $finalData['city'],
                    'latitude' => $finalData['latitude'],
                    'longitude' => $finalData['longitude'],
                    'single' => $finalData['single'],
                    'singleprice' => $finalData['singleprice'],
                    'double' => $finalData['double'],
                    'doubleprice' => $finalData['doubleprice'],
                    'living' => $finalData['living'],
                    'livingprice' => $finalData['livingprice'],
                    'family' => $finalData['family'],
                    'familyprice' => $finalData['familyprice'],
                    'guests' => $finalData['guests'],
                    'bathrooms' => $finalData['bathrooms'],
                    'children' => $finalData['children'],
                    'cots' => $finalData['cots'],
                    'apartment_size' => $finalData['apartment_size'],
                    'air_conditioning' => $finalData['air_conditioning'],
                    'heating' => $finalData['heating'],
                    'wifi' => $finalData['wifi'],
                    'ev_charging' => $finalData['ev_charging'],
                    'kitchen' => $finalData['kitchen'],
                    'kitchenette' => $finalData['kitchenette'],
                    'washing_machine' => $finalData['washing_machine'],
                    'tv' => $finalData['tv'],
                    'swimming_pool' => $finalData['swimming_pool'],
                    'hot_tub' => $finalData['hot_tub'],
                    'minibar' => $finalData['minibar'],
                    'sauna' => $finalData['sauna'],
                    'smoking' => $finalData['smoking'],
                    'parties' => $finalData['parties'],
                    'pets' => $finalData['pets'],
                    'checkin_from' => $finalData['checkin_from'],
                    'checkin_until' => $finalData['checkin_until'],
                    'checkout_from' => $finalData['checkout_from'],
                    'checkout_until' => $finalData['checkout_until'],
                    'languages' => $finalData['languages'],
                    'balcony' => $finalData['balcony'],
                    'garden_view' => $finalData['garden_view'],
                    'terrace' => $finalData['terrace'],
                    'view' => $finalData['view'],
                    'other_details' => $finalData['other_details'],
                    'imageUrls' => $finalData['imageUrls']
                ];


                

                // Validate input fields
                $errors = [];

                if (empty($data['name'])) {
                    $errors[] = 'Property name is required';
                }


                if (empty($data['address'])) {
                    $errors[] = 'Address is required';
                }

                if (empty($data['postalCode'])) {
                    $errors[] = 'Postal code is required';
                }

                if (empty($data['city'])) {
                    $errors[] = 'City is required';
                }
            
                if (empty($data['single'])) {
                    $errors[] = 'Single room is required';
                }

                if (empty($data['double'])) {
                    $errors[] = 'Double room is required';
                }

                if (empty($data['living'])) {
                    $errors[] = 'Living room is required';
                }

                if (empty($data['family'])) {
                    $errors[] = 'Family room is required';
                }

                if (empty($data['guests'])) {
                    $errors[] = 'Guests is required';
                }

                if (empty($data['bathrooms'])) {
                    $errors[] = 'Bathrooms is required';
                }

                if (empty($data['checkin_from'])) {
                    $errors[] = 'Checkin from is required';
                }

                if (empty($data['checkin_until'])) {
                    $errors[] = 'Checkin until is required';
                }

                if (empty($data['checkout_from'])) {
                    $errors[] = 'Checkout from is required';
                }

                if (empty($data['checkout_until'])) {
                    $errors[] = 'Checkout until is required';
                }


                //send the data to the model
                if (empty($errors)) {
                    $isInserted = $this->accomadationModel->addProperty($data);

                    if ($isInserted) {
                        echo json_encode(['status' => 'success', 'message' => 'Data added successfully']);
                    
                    
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'An error occurred. Please try again']);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => $errors]);
                

                }

            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
            }
        }


        public function getPropertyDetails() {
            $data = json_decode(file_get_contents("php://input"));
            // Check if the propertyId is provided in the request
          
            if (isset($data->propertyId)) {
                $propertyId = $data->propertyId;
                $property = $this->accomadationModel->getPropertyDetailsById($propertyId);
                if ($property) {
                    echo json_encode([
                       'success' => true,
                        'property_name' => $property->property_name,  // Object syntax for property_name
                        'address' => $property->address,              // Object syntax for address
                        'city' => $property->city,                    // Object syntax for city
                        'postal_code' => $property->postal_code,      // Object syntax for postal_code
                        'max_occupants' => $property->max_occupants,  // Object syntax for max_occupants
                        'single_bedrooms' => $property->single_bedrooms, // Object syntax for single_bedrooms
                        'double_bedrooms' => $property->double_bedrooms, // Object syntax for double_bedrooms
                        'family_rooms' => $property->family_rooms,    // Object syntax for family_rooms
                        'bathrooms' => $property->bathrooms,          // Object syntax for bathrooms
                        'swimming_pool' => $property->swimming_pool,  // Object syntax for swimming_pool
                        'smoking_allowed' => $property->smoking_allowed, // Object syntax for smoking_allowed
                        'check_in_from' => $property->check_in_from,  // Object syntax for check_in_from
                        'check_out_from' => $property->check_out_from, // Object syntax for check_out_from
                        'singleprice' => $property->singleprice,      // Object syntax for singleprice
                        'doubleprice' => $property->doubleprice,      // Object syntax for doubleprice
                        'livingprice' => $property->livingprice,      // Object syntax for livingprice
                        'familyprice' => $property->familyprice,      // Object syntax for familyprice
                        'other_details' => $property->other_details,  // Object syntax for other_details
                        'service_provider_id' => $property->service_provider_id, // Object syntax for service_provider_id
                        'image_path' => $property->image_path   
                    ]);
                } else {
                    echo json_encode([
                        'success' => false,  // Indicating failure
                        'error' => 'Property not found.'
                    ]);
                }
            } else {
                echo json_encode([
                    'success' => false,  // Indicating failure
                    'error' => 'Property ID is required.'
                ]);
            }
        }

        public function bookRoom(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $propertyId = $_POST['propertyId'];
                $serviceProviderId = $_POST['serviceProviderId'];
                $singleRooms = $_POST['singleRooms'];
                $doubleRooms = $_POST['doubleRooms'];
                $familyRooms = $_POST['familyRooms'];

                $_SESSION['trip']['propertyId'] = $_POST['propertyId'] ?? null;
                $_SESSION['trip']['accomodationProviderId'] = $_POST['serviceProviderId'] ?? null;
                $_SESSION['trip']['singleRooms'] = $_POST['singleRooms'] ?? 0;
                $_SESSION['trip']['doubleRooms'] = $_POST['doubleRooms'] ?? 0;
                $_SESSION['trip']['familyRooms'] = $_POST['familyRooms'] ?? 0;

                // Validate and process the data...
                // Return JSON response
                echo json_encode(['success' => true]);
                exit;
            }
        
            echo json_encode(['success' => false, 'error' => 'Invalid request']);
            exit;
        }
        
    }

    




