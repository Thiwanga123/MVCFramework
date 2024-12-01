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
        
            $this->view('transport_supplier/Orders');
        
    }

    public function reviews()
    {
   
            $this->view('transport_supplier/Reviews');
        
    }

    public function notifications()
    {
        
            $this->view('transport_supplier/Notifications');

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
                'fuelType' => trim($_POST['fuelType']),
                'description' => trim($_POST['description']),
                'availability' => trim($_POST['availability']),
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
            $isInserted = $this->transportModel->addVehicle($data['id'], $data['vehicleType'], $data['vehicleModel'], $data['vehicleMake'], $data['plateNumber'], $data['rate'], $data['fuelType'], $data['description'], $data['availability']);
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
        
        $update = $this->transportModel->updateVehicle($data);
        if($update){
            echo "<script>
                alert('Vehicle Details updated successfully!');
             </script>";
             
            redirect('transport_suppliers/myInventory');
        }
}

}
}


    
    


