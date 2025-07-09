<?php

class Accomadation extends Controller{

    private $accomadationModel;

    public function __construct(){
        $this->accomadationModel = $this->model('M_accomadation');
    }


    public function dashboard(){
        if (isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];

            // Get total accommodations
            $totalAccommodations = $this->accomadationModel->getTotalAccomadation($userId)->total_accomadation;

            // Get total bookings
            $totalBookings = $this->accomadationModel->getTotalBookings($userId)->total_bookings;

            // Get the last 3 bookings
            $recentBookings = $this->accomadationModel->getRecentBookings($userId);

            // Get booking dates
            $bookingDates = $this->accomadationModel->getBookingDates($userId);

            $data = [
                'totalAccommodations' => $totalAccommodations,
                'totalBookings' => $totalBookings,
                'recentBookings' => $recentBookings,
                'bookingDates' => $bookingDates
            ];

            $this->view('accomadation/Dashboard', $data);
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
            // Set success message in session
            $_SESSION['success_message'] = 'Property removed successfully';
            redirect('accomadation/myInventory');
        } else {
            // Set error message in session
            $_SESSION['error_message'] = 'Failed to delete property. It may have active bookings.';
            redirect('accomadation/myInventory');
        }
    } else {
        // Set error message for unauthorized access
        $_SESSION['error_message'] = 'Please log in to delete a property';
        redirect('ServiceProvider/login');
    }
}

public function bankdetails(){
    if (isset($_SESSION['id'])) {
        $userId = $_SESSION['id'];
        $bankDetails = $this->accomadationModel->getBankDetails($userId);
        $data = [
            'bankDetails' => $bankDetails
        ];

        $this->view('accomadation/bankdetails', $data);
    } else {
        redirect('ServiceProvider');
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



    // public function wallet(){
    //     if (isset($_SESSION['id'])) {
    //         $userId = $_SESSION['id'];
    //         $bankDetails = $this->accomadationModel->getBankDetails($userId);
    //         $data = [
    //             'bankDetails' => $bankDetails
    //         ];

    //         $this->view('accomadation/wallet', $data);
    //     } else {
    //         redirect('ServiceProvider');
    //     }
        
    // }

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
            // Check if this is a JSON request or a form data with files
            if (!empty($_FILES['propertyImages']['name'][0])) {
                // This is a form submission with files
                
                // Get property data from POST
                $data = [
                    'id' => $_POST['id'],
                    'type' => $_POST['type'],
                    'name' => $_POST['propertyname'],
                    'address' => $_POST['address'],
                    'postalCode' => $_POST['postalcode'],
                    'city' => $_POST['city'],
                    'latitude' => $_POST['latitude'],
                    'longitude' => $_POST['longitude'],
                    'single' => $_POST['single'],
                    'singleprice' => $_POST['singleprice'],
                    'double' => $_POST['double'],
                    'doubleprice' => $_POST['doubleprice'],
                    'living' => $_POST['living'],
                    'livingprice' => $_POST['livingprice'],
                    'family' => $_POST['family'],
                    'familyprice' => $_POST['familyprice'],
                    'guests' => $_POST['guests'],
                    'bathrooms' => $_POST['bathrooms'],
                    'children' => $_POST['children'],
                    'cots' => $_POST['cots'],
                    'apartment_size' => $_POST['apartment_size'],
                    'air_conditioning' => $_POST['air_conditioning'],
                    'heating' => $_POST['heating'],
                    'wifi' => $_POST['wifi'],
                    'ev_charging' => $_POST['ev_charging'],
                    'kitchen' => $_POST['kitchen'],
                    'kitchenette' => $_POST['kitchenette'],
                    'washing_machine' => $_POST['washing_machine'],
                    'tv' => $_POST['tv'],
                    'swimming_pool' => $_POST['swimming_pool'],
                    'hot_tub' => $_POST['hot_tub'],
                    'minibar' => $_POST['minibar'],
                    'sauna' => $_POST['sauna'],
                    'smoking' => $_POST['smoking'],
                    'parties' => $_POST['parties'],
                    'pets' => $_POST['pets'],
                    'checkin_from' => $_POST['checkin_from'],
                    'checkin_until' => $_POST['checkin_until'],
                    'checkout_from' => $_POST['checkout_from'],
                    'checkout_until' => $_POST['checkout_until'],
                    'languages' => $_POST['languages'],
                    'balcony' => $_POST['balcony'],
                    'garden_view' => $_POST['garden_view'],
                    'terrace' => $_POST['terrace'],
                    'view' => $_POST['view'],
                    'other_details' => $_POST['other_details'],
                    'imageUrls' => '' // Will be set as the first image for display in property listing
                ];
                
                // Validate data
                $errors = [];
                
                // Add your validation here (similar to existing validation)
                
                if (empty($errors)) {
                    // Handle file uploads
                    $images = $_FILES['propertyImages'];
                    $imagePaths = [];
                    $uploadDir = 'uploads/properties/' . $data['id'] . '/';
                    $fullUploadPath = dirname(dirname(dirname(__FILE__))) . '/public/' . $uploadDir;
                    
                    // Ensure upload directory exists
                    if (!is_dir($fullUploadPath)) {
                        mkdir($fullUploadPath, 0777, true);
                    }
                    
                    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                    
                    // Process each uploaded file
                    for ($i = 0; $i < count($images['name']); $i++) {
                        if ($images['error'][$i] === 0) {
                            // Check if file type is allowed
                            if (in_array($images['type'][$i], $allowedTypes)) {
                                // Create unique filename
                                $newFilename = uniqid() . '_' . $images['name'][$i];
                                $destination = $fullUploadPath . $newFilename;
                                
                                if (move_uploaded_file($images['tmp_name'][$i], $destination)) {
                                    $imagePaths[] = $uploadDir . $newFilename;
                                } else {
                                    $errors[] = "Failed to move uploaded file {$images['name'][$i]}";
                                }
                            } else {
                                $errors[] = "File type not allowed for {$images['name'][$i]}";
                            }
                        } else {
                            $errors[] = "Error with file upload: {$images['name'][$i]}";
                        }
                    }
                    
                    if (!empty($imagePaths)) {
                        // Set the first image as the main property image
                        $data['imageUrls'] = $imagePaths[0];
                        
                        // Add property to database
                        $result = $this->accomadationModel->addProperty($data);
                        
                        if (is_numeric($result) && $result > 0) {
                            // Success case - $result contains the property ID
                            // Add additional images to property_images table
                            foreach ($imagePaths as $path) {
                                $this->accomadationModel->addPropertyImage($result, $path);
                            }
                            
                            echo json_encode(['status' => 'success', 'message' => 'Property added successfully']);
                        } else {
                            // Error case - check if it's an array with error details
                            $errorMessage = is_array($result) && isset($result['error']) ? 
                                $result['error'] : 'Failed to add property. Database error occurred.';
                            echo json_encode(['status' => 'error', 'message' => $errorMessage]);
                        }
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'No valid images were uploaded']);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => $errors]);
                }
            } else {
                // Handle the existing JSON-based request for backward compatibility
                $finalData = json_decode(file_get_contents("php://input"), true);
                
                // Process existing data format
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
                    $result = $this->accomadationModel->addProperty($data);

                    if (is_numeric($result) && $result > 0) {
                        echo json_encode(['status' => 'success', 'message' => 'Data added successfully']);
                    } else {
                        // Error case - check if it's an array with error details
                        $errorMessage = is_array($result) && isset($result['error']) ? 
                            $result['error'] : 'An error occurred while adding the property. Please try again.';
                        echo json_encode(['status' => 'error', 'message' => $errorMessage]);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => $errors]);
                

                }
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
        }
    }

    // Get property details for modals
    public function getPropertyDetails($id) {
        if (!isset($_SESSION['id'])) {
            $response = [
                'success' => false,
                'message' => 'Not authorized'
            ];
            echo json_encode($response);
            return;
        }


        public function getPropertyDetailsDiv() {
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

        // Return property details as JSON
        echo json_encode($propertyDetails);
    }



    // Update property details
    public function updateProperty() {
        if (!isset($_SESSION['id'])) {
            $response = [
                'success' => false,
                'message' => 'Not authorized'
            ];
            echo json_encode($response);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $response = [
                'success' => false,
                'message' => 'Invalid request method'
            ];
            echo json_encode($response);
            return;
        }

        // Get property ID
        $propertyId = $_POST['property_id'] ?? null;
        if (!$propertyId) {
            $response = [
                'success' => false,
                'message' => 'Property ID is required'
            ];
            echo json_encode($response);
            return;
        }

        // Check if property exists and belongs to this user
        $property = $this->accomadationModel->viewdetails($propertyId);
        if (!$property || $property->service_provider_id != $_SESSION['id']) {
            $response = [
                'success' => false,
                'message' => 'Property not found or access denied'
            ];
            echo json_encode($response);
            return;
        }

        // Prepare data for update, only include editable fields
        $data = [
            'property_id' => $propertyId,
            'property_name' => $_POST['property_name'] ?? $property->property_name,
            'singleprice' => $_POST['singleprice'] ?? $property->singleprice,
            'doubleprice' => $_POST['doubleprice'] ?? $property->doubleprice,
            'livingprice' => $_POST['livingprice'] ?? $property->livingprice,
            'familyprice' => $_POST['familyprice'] ?? $property->familyprice,
            'max_occupants' => $_POST['max_occupants'] ?? $property->max_occupants,
            'children_allowed' => $_POST['children_allowed'] ?? $property->children_allowed,
            'offers_ctos' => $_POST['offers_ctos'] ?? $property->offers_ctos,
            'air_conditioning' => isset($_POST['air_conditioning']) ? $_POST['air_conditioning'] : $property->air_conditioning,
            'heating' => isset($_POST['heating']) ? $_POST['heating'] : $property->heating,
            'free_wifi' => isset($_POST['free_wifi']) ? $_POST['free_wifi'] : $property->free_wifi,
            'ev_charging' => isset($_POST['ev_charging']) ? $_POST['ev_charging'] : $property->ev_charging,
            'kitchen' => isset($_POST['kitchen']) ? $_POST['kitchen'] : $property->kitchen,
            'kitchenette' => isset($_POST['kitchenette']) ? $_POST['kitchenette'] : $property->kitchenette,
            'washing_machine' => isset($_POST['washing_machine']) ? $_POST['washing_machine'] : $property->washing_machine,
            'flat_screen_tv' => isset($_POST['flat_screen_tv']) ? $_POST['flat_screen_tv'] : $property->flat_screen_tv,
            'swimming_pool' => isset($_POST['swimming_pool']) ? $_POST['swimming_pool'] : $property->swimming_pool,
            'hot_tub' => isset($_POST['hot_tub']) ? $_POST['hot_tub'] : $property->hot_tub,
            'minibar' => isset($_POST['minibar']) ? $_POST['minibar'] : $property->minibar,
            'sauna' => isset($_POST['sauna']) ? $_POST['sauna'] : $property->sauna,
            'smoking_allowed' => $_POST['smoking_allowed'] ?? $property->smoking_allowed,
            'parties_allowed' => $_POST['parties_allowed'] ?? $property->parties_allowed,
            'pets_allowed' => $_POST['pets_allowed'] ?? $property->pets_allowed,
            'check_in_from' => $_POST['check_in_from'] ?? $property->check_in_from,
            'check_in_until' => $_POST['check_in_until'] ?? $property->check_in_until,
            'check_out_from' => $_POST['check_out_from'] ?? $property->check_out_from,
            'check_out_until' => $_POST['check_out_until'] ?? $property->check_out_until,
            'balcony' => isset($_POST['balcony']) ? $_POST['balcony'] : $property->balcony,
            'garden_view' => isset($_POST['garden_view']) ? $_POST['garden_view'] : $property->garden_view,
            'terrace' => isset($_POST['terrace']) ? $_POST['terrace'] : $property->terrace,
            'view' => isset($_POST['view']) ? $_POST['view'] : $property->view,
            'other_details' => $_POST['other_details'] ?? $property->other_details
        ];

        // Update property in database
        $isUpdated = $this->accomadationModel->updateProperty($data);
        
        if ($isUpdated) {
            $response = [
                'success' => true,
                'message' => 'Property updated successfully'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to update property'
            ];
        }
        
        echo json_encode($response);
    }

    public function processWithdrawal() {
        if (!isset($_SESSION['id'])) {
            echo json_encode([
                'success' => false, 
                'message' => 'Not authorized'
            ]);
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                'success' => false, 
                'message' => 'Invalid request method'
            ]);
            return;
        }
        
        // Validate input
        $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
        
        // Check minimum withdrawal amount
        if ($amount < 1000) {
            echo json_encode([
                'success' => false, 
                'message' => 'Minimum withdrawal amount is Rs. 1,000'
            ]);
            return;
        }
        
        if ($amount <= 0) {
            echo json_encode([
                'success' => false, 
                'message' => 'Please enter a valid withdrawal amount'
            ]);
            return;
        }
        
        // Gather bank details
        $bankDetails = [
            'method' => $_POST['withdrawal_method'] ?? 'Bank Transfer',
            'bank_name' => $_POST['bank_name'] ?? '',
            'account_number' => $_POST['account_number'] ?? '',
            'account_name' => $_POST['account_name'] ?? '',
            'branch' => $_POST['branch'] ?? '',
            'withdrawal_date' => date('Y-m-d H:i:s')
        ];
        
        // Process the withdrawal
        $result = $this->accomadationModel->processWithdrawal($_SESSION['id'], $amount, $bankDetails);
        
        // Return JSON response
        echo json_encode($result);
    }

    public function downloadTransactionReport() {
        if (!isset($_SESSION['id'])) {
            redirect('ServiceProvider/login');
            return;
        }
        
        $userId = $_SESSION['id'];
        
        // Get transaction history from model
        $transactions = $this->accomadationModel->getTransactionHistory($userId);
        $bankDetails = $this->accomadationModel->getBankDetails($userId);
        $walletTransactions = $bankDetails['transactions'];
        
        $data = [
            'transactions' => $transactions,
            'wallet_transactions' => $walletTransactions,
            'wallet_balance' => $bankDetails['wallet_balance'],
            'holding_amount' => $bankDetails['total_holding_amount'],
            'earnings' => $bankDetails['earnings'],
            'report_date' => date('F d, Y')
        ];
        
        // Load the transaction report view
        $this->view('accomadation/transaction_report', $data);
    }


    public function getPropertyDetailsDiv() {
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

            $_SESSION['acomodation_booking'] = [
                'propertyId' => $propertyId,
                'serviceProviderId' => $serviceProviderId,
                'singleRooms' => $singleRooms,
                'doubleRooms' => $doubleRooms,
                'familyRooms' => $familyRooms
            ];


            // Validate and process the data...
            // Return JSON response
            echo json_encode(['success' => true]);
            exit;
        }
    
        echo json_encode(['success' => false, 'error' => 'Invalid request']);
        exit;
    }

}
