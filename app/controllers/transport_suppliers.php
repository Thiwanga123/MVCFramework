<?php

class Transport_suppliers extends Controller
{
    private $transportModel;
    private $reviewModel;

    public function __construct()
    {
        $this->transportModel = $this->model('TransportModel');
        $this->reviewModel = $this->model('ReviewModel');
    }

    public function index()
    {
        echo "hi";
    }

    public function dashboard() {
        if (isset($_SESSION['id'])) {
            $supplierId = $_SESSION['id'];
    
            // Load your TransportModel
            $this->transportModel = $this->model('TransportModel');
    
            // Get total vehicles
            $vehicleData = $this->transportModel->getTotalVehicle($supplierId);
    
            // Get total bookings for this supplier
            $bookingData = $this->transportModel->countBookingsBySupplier($supplierId);
     
            // Get detailed booking data to display in the table
            $detailedBookingData = $this->transportModel->getAllBookingsBySupplier($supplierId);
    
            // Prepare data to pass to view
            $data = [
                'vehicles' => $vehicleData->total_vehicles ?? 0,
                'bookings' => $bookingData->total ?? 0,
                'bookings_details' => $detailedBookingData // new data for displaying booking details
            ];
    
            // Load the dashboard view with data
            $this->view('transport_supplier/Dashboard', $data);
        } else {
            redirect('ServiceProvider');
        }
    }
    
    
    public function details($id)
    {
        if (isset($_SESSION['id'])) {
            $vehicle = $this->transportModel->getVehicleById($id);
            $currentPage = 'vehicles';
            $data = [
                'vehicle' => $vehicle,
                'currentPage' => $currentPage
            ];
            $this->view('transport_supplier/ViewVehicle', $data);
        } else {
            redirect('ServiceProvider');
        }
    }
    

    public function myInventory()
    {
        if (isset($_SESSION['id'])) {
            $supplierId = $_SESSION['id'];
            $vehicles = $this->transportModel->getAllVehicles($supplierId);
            $currentPage = 'vehicles';

            $data = [
                'vehicles' => $vehicles,
                'currentPage' => $currentPage
            ];
            $this->view('transport_supplier/MyInventory', $data);
        } else {
            redirect('ServiceProvider');
        }
    }

    public function orders()
{
    $data['activePage'] = 'Orders';

    if (isset($_SESSION['id'])) {
        $supplierId = $_SESSION['id'];
        $this->transportModel = $this->model('TransportModel');

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cancel_booking_id'])) {
            $bookingId = $_POST['cancel_booking_id'];
            $this->transportModel->cancelBookingById($bookingId);
            redirect('transport_suppliers/orders');
        }

        $bookings = $this->transportModel->getAllBookingsBySupplier($supplierId);
        $this->view('transport_supplier/Orders', ['bookings' => $bookings]);
    } else {
        redirect('ServiceProvider');
    }
}



    public function driver()
    {       
        if(isset($_SESSION['id'])){
            $supplierId = $_SESSION['id'];
            $this->transportModel = $this->model('TransportModel');
            $drivers = $this->transportModel->getAllDrivers($supplierId);

            $data = [
                'drivers' => $drivers
            ];

            $this->view('transport_supplier/driver', $data);
            
            }else{
                redirect('users/login');
            }
        
    }
    public function drive()
    {       
        if(isset($_SESSION['id'])){
            $supplierId = $_SESSION['id'];
            $this->transportModel = $this->model('TransportModel');
            $drivers = $this->transportModel->getAllDrivers($supplierId);

            $data = [
                'drivers' => $drivers
            ];

            $this->view('transport_supplier/Addriver', $data);
            
            }else{
                redirect('users/login');
            }
        
    }

    public function profile(){

        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $type = $_SESSION['type'];
           
            $currentPage = 'profile';
            $data = [
               
                'currentPage' => $currentPage
            ];
            $this->view('transport_supplier/Myprofile',$data);
        } else {
            redirect('ServiceProvider');
        }
    }
    public function Mypayments()
    {
        
            $this->view('transport_supplier/Mypayments');
    }
    public function addVehicle(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
           
            $data = [
                'id'=> $_SESSION['id'],
                'vehicleType' => trim($_POST['vehicleType']),
                'vehicleModel' =>trim($_POST['vehicleModel']) ,
                'vehicleMake' => trim($_POST['vehicleMake']),    //These variables are used to store the values which are sent via the form data
                'plateNumber' => trim($_POST['licensePlateNumber']),
                'rate' => trim($_POST['vehicleRate']),
                'fuelType' => trim($_POST['fuelType']),
                'description' => trim($_POST['description']),
                'availability' => trim($_POST['availability']),
                'driver' => trim($_POST['driver']),
                'cost' => trim($_POST['vehicleCost']),
                'location' => trim($_POST['vehicleLocation']),
                'seating_capacity' => trim($_POST['seating_capacity']),

            ];

            if(empty($data['vehicleType'])){
                $errors[] = 'Vehicle Type is required';
            }

            if(empty($data['vehicleModel'])){
                $errors[] = 'Vehicle Model is required';
            }

            if(empty($data['vehicleMake'])){
                $errors[] = 'Vehicle Make is required';
            }

            if(empty($data['plateNumber'])){
                $errors[] = 'Vehicle License Plate Number is required';
            }

            if(empty($data['rate'])){
                $errors[] = 'Rate is required';
            }
          
          
            
            if(empty($data['fuelType'])){
                $errors[] = 'Fuel Type is required';
            }

            if(empty($data['description'])){
                $errors[] = 'Description is required';
            }

            if(empty($data['availability'])){
                $errors[] = 'Availability is required';
            }

            if(empty($data['driver'])){
                $errors[] = 'driver is required';
            }

            if(empty($data['cost'])){
                $errors[] = 'Driver Rates are required';
            }

            if(empty($data['location'])){
                $errors[] = 'Location is required';
            }
            if(empty($data['seating_capacity'])){
                $errors[] = 'seating_capcity is required';
            }

            $imageExtensions = ['jpeg','jpg','png']; //Extension array to check whether the uploaded files are eligible to upload
            $imagePaths = [];   //Array to store the paths of the uploaded images
            $images =  $_FILES['vehicleImages'];
   
            if(count($images['name']) > 5 ){
                $errors[] = 'Select only upto 5 images';
            }

            $supplierFolder = "Uploads/TransportSuppliers/{$data['id']}"; //Base folder for uploading the images

            if(!is_dir($supplierFolder)){           //Checking whether a folder for the supplieId exists already
                mkdir($supplierFolder,0777,true);    //If there is no folder, a folder is created to the supplierId
            }

             //Creating the model instance to interact with the database
            $isInserted = $this->transportModel->addVehicle($data['id'], $data['vehicleType'], $data['vehicleModel'], $data['vehicleMake'], $data['plateNumber'], $data['rate'], $data['fuelType'], $data['description'], $data['availability'], $data['driver'], $data['cost'],$data['location'],$data['seating_capacity']);
            if($isInserted){
                $vehicleId = $isInserted;
                $vehicleFolder = "$supplierFolder/$vehicleId";

                if (!is_dir($vehicleFolder)) {
                    mkdir($vehicleFolder, 0777, true);
                }

                for ($i = 0; $i < count($images['name']); $i++) {
                    if($images['error'][$i] == 0){
                        $filename = $images['name'][$i];
                        $fileTempName = $images['tmp_name'][$i];  //Storing the image properties
                        
                        $nameArray = explode('.',$filename);
                        //In here explode method seperates the image file name to an array based on '.' It returns an array of strings.
                        $fileExtension = strtolower(end($nameArray)); 
                    //In here a variable is used to store the extension part of the image. The extention part is the last element of the 
                    //array we got using the explode method.Here end method is used to get the last element of the array.

                        if(in_array($fileExtension,$imageExtensions)){
                            
                            $filepath = "$vehicleFolder/$filename";

                            if(move_uploaded_file($fileTempName,$filepath)){
                                $imagePaths[] = $filepath;
                                $imageInserted = $this->transportModel->addVehicleImage($data['id'],$vehicleId, $filepath);
                                
                                if ($imageInserted) {
                                    echo "Images Successfully inserted";
                                }
                                else{
                                    echo "Error inserting image into the database.$filename<br>";
                                }
                            }
                            else{
                                echo "Error in uploading the file: $filename<br>";   
                            }
                        }else{
                            echo "Invalid image type for: $filename<br>";    
                            
                        }
                    }else {
                        echo "<script type='text/javascript'>alert('Error with file upload for image $i.<br>');</script>";
                    }
                }
                
                echo "<script type='text/javascript'>alert('Vehicle added successfully!');</script>";
                redirect('transport_suppliers/myInventory');
            } else {
                echo "<script type='text/javascript'>alert('Failed to add vehicle.');</script>";
            }
        }
    }

    public function delete_availability($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->transportModel->deleteVehicleById($id)) {
                redirect('transport_suppliers/myinventory');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('transport_suppliers/myinventory');
        }
    }
    
    
    
    
    
    
   
    

public function logout() {
    //if an admin is logged in
    unset($_SESSION['user_id']);
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    session_destroy();
    redirect('ServiceProvider/login');
}




public function addriver() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        // Ensure the form fields are set before accessing them
        $data = [
            'id' => $_SESSION['id'] ?? null,
            'name' => isset($_POST['name']) ? trim($_POST['name']) : '',
            'phone' => isset($_POST['phone']) ? trim($_POST['phone']) : '',
            'driverLicense' => isset($_POST['driverLicense']) ? trim($_POST['driverLicense']) : '',
            'email' => isset($_POST['email']) ? trim($_POST['email']) : '',
            'description' => isset($_POST['description']) ? trim($_POST['description']) : '',
        ];

        $errors = [];

        // Validation checks
        if (empty($data['name'])) {
            $errors[] = 'Name is required';
        }


        if (empty($data['phone'])) {
            $errors[] = 'Phone number is required';
        } elseif (!preg_match('/^\d{10}$/', $data['phone'])) { // Example validation for a 10-digit phone number
            $errors[] = 'Invalid phone number format';
        }

        if (empty($data['email'])) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }

        if (empty($data['description'])) {
            $errors[] = 'Description is required';
        }

        if (empty($data['driverLicense'])) {
            $errors[] = 'driverLicense is required';
        }
        
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors; // Store errors in session
            redirect('transport_suppliers/driver'); // Redirect back to form page
        }
    
        // Insert driver details into the database
        $isInserted = $this->transportModel->addriver($data['name'], $data['phone'], $data['email'], $data['description'], $data['id'], $data['driverLicense'],);
      

        if ($isInserted) {
            $_SESSION['message'] = "Driver added successfully!";
            redirect('/transport_suppliers/driver');  
        } else {
            $_SESSION['message'] = "Failed to add driver.";
            redirect('transport_suppliers/driver');
        }
    }
   
   
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->transportModel->deleteDriverById($id)) {
                redirect('transport_suppliers/driver');
            } else {
                die("Something went wrong.");
            }
        } else {
            redirect('transport_suppliers/driver'); // prevent delete via GET
        }
    }

    public function editVehicle() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
            $data = [
                'vehicle_id' => trim($_POST['vehicleId']),
                'supplierId' => $_SESSION['id'],
                'type' => trim($_POST['vehicleType']),
                'model' => trim($_POST['vehicleModel']),
                'make' => trim($_POST['vehicleMake']),
                'license_plate_number' => trim($_POST['licensePlateNumber']),
                'rate' => trim($_POST['vehicleRate']),
                'fuel_type' => trim($_POST['fuelType']),
                'description' => trim($_POST['description']),
                'availability' => trim($_POST['availability']),
                'driver' => trim($_POST['driver']),
                'cost' => trim($_POST['vehicleCost']),
                'location' => trim($_POST['vehicleLocation']),
                'seating_capacity' => trim($_POST['seating_capacity'])
            ];

            // var_dump($data);
            // exit;

            if ($this->transportModel->updateVehicle($data)) {
                redirect('transport_suppliers/MyInventory');
            } else {
                die("Something went wrong updating the vehicle.");
            }
        } else {
            redirect('transport_suppliers/MyInventory');
        }
    }
    
    public function reviews(){

        if (isset($_SESSION['id'])) {
        
            $currentPage = 'reviews';
            $reviews = $this->reviewModel->getReviewsBySupplierId($_SESSION['id']);

            $data = [
                'currentPage' => $currentPage,
                'reviews' => $reviews
            ];

            $this->view('transport_supplier/Reviews', $data);
        } else {
            redirect('ServiceProvider');
        }
    }

    public function getVehicleDetails() {
        header('Content-Type: application/json');
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the raw POST body and decode JSON
            $input = json_decode(file_get_contents('php://input'), true);
    
            // Validate input
            if (!isset($input['vehicleId']) || empty($input['vehicleId'])) {
                // Return error response
                http_response_code(400);
                echo json_encode([
                    'success' => false,
                    'message' => 'Vehicle ID is required'
                ]);

                return;
            }
    
            $vehicleId = $input['vehicleId'];
    
            // Assuming your model is named TransportModel and it has a method to get vehicle details
            $vehicle = $this->transportModel->getVehicleById($vehicleId);
            if ($vehicle) {
                // Return success response with vehicle data
                echo json_encode([
                    'success' => true,
                    'message' => 'Vehicle details fetched successfully',
                    'data' => [
                        'supplier_id' => $vehicle->supplierId,
                        'vehicle_id' => $vehicle->vehicle_id,
                        'make' => $vehicle->make,
                        'model' => $vehicle->model,
                        'type' => $vehicle->type,
                        'fuel_type' => $vehicle->fuel_type,
                        'location' => $vehicle->location,
                        'cost' => $vehicle->cost,
                        'rate' => $vehicle->rate,
                        'availability' => $vehicle->availability,
                        'license_plate_number' => $vehicle->license_plate_number,
                        'seating_capacity' => $vehicle->seating_capacity,
                        'description' => $vehicle->description,
                        'driver' => $vehicle->driver,
                        'image_paths' => $vehicle->image_path 
                    ]
                ]);
            
            } else {
                http_response_code(404);
                echo json_encode([
                    'success' => false,
                    'message' => 'Vehicle not found'
                ]);
            }
        } else {
            http_response_code(405);
            echo json_encode([
                'success' => false,
                'message' => 'Method not allowed'
            ]);
        }
    }
    
    public function saveVehicleDetails()
    {
        // Make sure the request is POST and JSON
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Read the raw POST data       
            $input = file_get_contents('php://input');
            $bookingData = json_decode($input, true);

           
            // Optional: Validate required fields
            $requiredFields = ['vehicleId', 'supplierId', 'rate', 'pickupLocation', 'driverOption'];
            foreach ($requiredFields as $field) {
                if (empty($bookingData[$field])) {
                    http_response_code(400);
                    echo json_encode(['error' => "Missing field: $field"]);
                    return;
                }
            }
    
    
            // Save booking data to session
            $_SESSION['booking_vehicle_data'] = $bookingData;
    
            // Respond back to AJAX call
            echo json_encode([
                'status' => 'success',
                'message' => 'Booking data saved to session.',
                'data' => $bookingData
            ]);
        } else {
            http_response_code(405); // Method Not Allowed
            echo json_encode(['error' => 'Invalid request method.']);
        }
    }

// Cancel booking with possible penalty
public function cancelBooking($id){
    if (!isset($_SESSION['id'])) {
        redirect('ServiceProvider');
        return;
    }
    
    $supplier_id = $_SESSION['id'];
    
    // Get booking details
    $booking = $this->transportModel->getBookingById($id);
    
    if (!$booking) {
        // Booking not found
        $_SESSION['booking_error'] = 'Booking not found';
        redirect('transport_suppliers/dashboard'); // Redirecting to dashboard as it shows bookings
        return;
    }
    
    if ($booking->supplier_id != $supplier_id) {
        // Not authorized to cancel this booking
        $_SESSION['booking_error'] = 'You are not authorized to cancel this booking';
        redirect('transport_suppliers/dashboard');
        return;
    }
    
    // Check if booking is already cancelled
    if (strtolower($booking->status) == 'cancelled' || strtolower($booking->status) == 'canceled') {
        $_SESSION['booking_error'] = 'This booking has already been cancelled';
        redirect('transport_suppliers/dashboard');
        return;
    }
    
    // Calculate if penalty applies (within 3 days of check-in)
    $checkIn = new DateTime($booking->check_in);
    $today = new DateTime();
    $isPenaltyApplicable = ($checkIn->diff($today)->days <= 3);
    
    // Calculate penalty amount (20% of booking amount if applicable)
    $penaltyAmount = $isPenaltyApplicable ? ($booking->amount * 0.2) : 0;
    
    // Process cancellation with appropriate penalty
    if ($this->transportModel->cancelBooking($id, $supplier_id, $penaltyAmount)) {
        // Success
        if ($isPenaltyApplicable) {
            $_SESSION['booking_success'] = 'Booking cancelled successfully. A 20% penalty (Rs. ' . number_format($penaltyAmount, 2) . ') has been applied to your account. We have fully refunded the amount of Rs. ' . number_format($booking->amount, 2) . ' to the traveler.';
        } else {
            $_SESSION['booking_success'] = 'Booking cancelled successfully. We have fully refunded the amount of Rs. ' . number_format($booking->amount, 2) . ' to the traveler.';
        }
        redirect('transport_suppliers/dashboard');
    } else {
        // Error
        $_SESSION['booking_error'] = 'Something went wrong while cancelling the booking';
        redirect('transport_suppliers/dashboard');
    }
}
}