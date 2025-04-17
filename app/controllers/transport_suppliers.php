<?php

class Transport_suppliers extends Controller
{
    private $transportModel;

    public function __construct()
    {
        $this->transportModel = $this->model('TransportModel');
    }

    public function index()
    {
        echo "hi";
    }

    public function dashboard()
    {
        $this->view('transport_supplier/Dashboard');
    }

    public function myInventory()
    {
        $data['activePage'] = 'My Inventory';
        if (isset($_SESSION['id'])) {
            $supplierId = $_SESSION['id'];
            $this->transportModel = $this->model('TransportModel');
            $vehicles = $this->transportModel->getAllVehicles($supplierId);//Debugging
            $this->view('transport_supplier/MyInventory', ['vehicles' => $vehicles]);
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
            $vehicles = $this->transportModel->getAllVehicles($supplierId);//Debugging
            $this->view('transport_supplier/Orders', ['vehicles' => $vehicles]);
        } else {
            redirect('ServiceProvider');
        }
        
    }

    public function reviews()
    {   
        
   
            $this->view('transport_supplier/Reviews');
        
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

    public function Myprofile()
    {
        
            $this->view('transport_supplier/Myprofile');
    }
    public function Mypayments()
    {
        
            $this->view('transport_supplier/Mypayments');
    }
    public function addVehicle(){
        
        if(isset($_POST['submit'])){

            $data = [
                'id'=> $_SESSION['id'],
                'vehicleType' => trim($_POST['vehicleType']),
                'vehicleModel' =>trim($_POST['vehicleModel']) ,
                'vehicleMake' => trim($_POST['vehicleMake']),    //These variables are used to store the values which are sent via the form data
                'plateNumber' => trim($_POST['licensePlateNumber']),
                'rate' => trim($_POST['vehicleRate']),
                'litre' => trim($_POST['vehicleLitre']),
                'fuelType' => trim($_POST['fuelType']),
                'description' => trim($_POST['description']),
                'availability' => trim($_POST['availability']),
                'driver' => trim($_POST['driver']),
                'cost' => trim($_POST['vehicleCost']),
                'location' => trim($_POST['vehicleLocation']),
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
          
            if(empty($data['litre'])){
                $errors[] = 'Litre is required';
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
            $isInserted = $this->transportModel->addVehicle($data['id'], $data['vehicleType'], $data['vehicleModel'], $data['vehicleMake'], $data['plateNumber'], $data['rate'], $data['litre'], $data['fuelType'], $data['description'], $data['availability'], $data['driver'], $data['cost'],$data['location']);
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


    public function delete_availability($id){

        if (isset($_SESSION['id'])) {
            $this->transportModel->deleteVehicleAvailability($id);
            redirect('transport_suppliers/myInventory');
        } else {
            redirect('ServiceProvider');
        }
    }
   
    public function updateprofile()
{
    if (isset($_SESSION['id'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //get the data from the form
            $data = [
                'id' => $_SESSION['id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'password' => $_POST['password'],
                'nic' => $_POST['nic'],
                'phone' => $_POST['phone'],
            ];
            //update the profile
            $this->transportModel->updateprofile($data);
            redirect('transport_suppliers/logout');
        } else {
            redirect('transport_suppliers/profile');
        }
    } else {
        redirect('ServiceProvider');
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

public function editVehicle(){

    if (isset($_SESSION['id'])) {
        $data = [
            'id'=> $_SESSION['id'],
            'vid' => trim($_POST['vehicleId']),
            'vehicleType' => trim($_POST['vehicleType']),
            'vehicleModel' =>trim($_POST['vehicleModel']) ,
            'vehicleMake' => trim($_POST['vehicleMake']),    //These variables are used to store the values which are sent via the form data
            'plateNumber' => trim($_POST['licensePlateNumber']),
            'rate' => trim($_POST['vehicleRate']),
            'fuelType' => trim($_POST['fuelType']),
            'description' => trim($_POST['description']),
            'availability' => trim($_POST['availability']),
            'driver' => trim($_POST['driver']),

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
        
        $update = $this->transportModel->updateVehicle($data);
        if($update){
            echo "<script>
                alert('Vehicle Details updated successfully!');
             </script>";
             
            redirect('transport_suppliers/myInventory');
        }
}

}
public function addriver() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        // Ensure the form fields are set before accessing them
        $data = [
            'id' => $_SESSION['id'] ?? null,
            'name' => isset($_POST['name']) ? trim($_POST['name']) : '',
            'gender' => isset($_POST['gender']) ? trim($_POST['gender']) : '',
            'phone' => isset($_POST['phone']) ? trim($_POST['phone']) : '',
            'email' => isset($_POST['email']) ? trim($_POST['email']) : '',
            'description' => isset($_POST['description']) ? trim($_POST['description']) : '',
            'drive' => isset($_POST['drive']) ? trim($_POST['drive']) : '',
        ];

        $errors = [];

        // Validation checks
        if (empty($data['name'])) {
            $errors[] = 'Name is required';
        }

        if (empty($data['gender'])) {
            $errors[] = 'Gender is required';
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

        if (empty($data['drive'])) {
            $errors[] = 'Driver is required';
        }


        if (!empty($errors)) {
            $_SESSION['errors'] = $errors; // Store errors in session
            redirect('transport_suppliers/driver'); // Redirect back to form page
        }
    
        // Insert driver details into the database
        $isInserted = $this->transportModel->addriver($data['name'], $data['gender'], $data['phone'], $data['email'], $data['description'], $data['drive'], $data['id']);
      

        if ($isInserted) {
            $_SESSION['message'] = "Driver added successfully!";
            redirect('/transport_suppliers/driver');  
        } else {
            $_SESSION['message'] = "Failed to add driver.";
            redirect('transport_suppliers/driver');
        }
    }
    
}




    
    


