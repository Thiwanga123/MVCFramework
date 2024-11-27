<?php

class Accomadation extends Controller{

    private $accomadationModel;

    public function __construct(){
        $this->accomadationModel = $this->model('M_accomadation');
    }


    public function dashboard(){

        if (isset($_SESSION['id'])) {
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


    public function orders(){
        
        if (isset($_SESSION['id'])) {
            $this->view('accomadation/Orders');
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

    //logout
    public function logout(){
        session_destroy();  
        session_start();    

        redirect('ServiceProvider/login');
        exit();
    }

    public function addAccommodation() {
        if (isset($_POST['submit'])) {
            $data = [
                'id' => $_SESSION['id'], // User ID
                'name' => trim($_POST['accommodationName']),
                'price' => trim($_POST['accommodationPrice']),
                'type' => trim($_POST['accommodationType']),
                'location' => trim($_POST['accommodationLocation']),
                'description' => trim($_POST['accommodationDescription']),
                'quantity' => trim($_POST['quantity']),
            ];

            $errors = [];

            // Validate input fields
            if (empty($data['name'])) {
                $errors[] = 'Accommodation name is required';
            }

            if (empty($data['price']) || !is_numeric($data['price'])) {
                $errors[] = 'A valid price is required';
            }

            if (empty($data['type'])) {
                $errors[] = 'Accommodation type is required';
            }

            if (empty($data['location'])) {
                $errors[] = 'Accommodation location is required';
            }

            if (empty($data['description'])) {
                $errors[] = 'Accommodation description is required';
            }

            if (empty($data['quantity']) || !is_numeric($data['quantity'])) {
                $errors[] = 'A valid quantity is required';
            }

            // Image handling
            $imageExtensions = ['jpeg', 'jpg', 'png'];
            $imagePaths = [];
            $images = $_FILES['accommodationImages'];

            if (count($images['name']) > 5) {
                $errors[] = 'You can upload up to 5 images only.';
            }

            $userFolder = "Uploads/AccomodationProviders/{$data['id']}";

            if (!is_dir($userFolder)) {
                mkdir($userFolder, 0777, true);
            }

           
            

            if (empty($errors)) {
                $isInserted = $this->accomadationModel->addAccommodation(
                    $data['id'], $data['name'], $data['price'],$data['type'], $data['location'], $data['description'],$data['quantity']
                );

                if ($isInserted) {
                    $accommodationId = $isInserted;
                    $accommodationFolder = "$userFolder/$accommodationId";

                    if (!is_dir($accommodationFolder)) {
                        mkdir($accommodationFolder, 0777, true);

                         //add the image path to the database using the addAccommodationImage method
                    // for ($i = 0; $i < count($images['name']); $i++) {
                    //     if ($images['error'][$i] == 0) {
                    //         $filename = $images['name'][$i];
                    //         $fileTempName = $images['tmp_name'][$i];

                    //         $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
                    //         $newFilename = "image_" . $i . "." . $fileExtension;
                    //         $newFilePath = "$accommodationFolder/$newFilename";

                    //         if (move_uploaded_file($fileTempName, $newFilePath)) {
                    //             $this->addAccommodationImage($accommodationId, $newFilePath);
                    //         }
                    //     }
                       

                    }

                   

                    echo "<script>alert('Accommodation added successfully!');</script>";
                    redirect('accomadation/myInventory');
                } else {
                    echo "<script>alert('Failed to add accommodation.');</script>";
                }
            } else {
                foreach ($errors as $error) {
                    echo "<script>alert('$error');</script>";
                }
            }
        }
    }


    // get the accomadation from the database with respect to the accomadation supplier
    // public function getAccomadation(){
    //     $user=$_SESSION['id'];
    //     $accomadation=$this->accomadationModel->getAccomadation($user);
    //     $data=[
    //         'accomadation'=>$accomadation,
    //     ];
    //     $this->view('accomadation/MyInventory',$data);
    // }

    //add the accomodation_image path to the database
    public function addAccommodationImage($accommodationId, $imagePath) {
        $userId = $_SESSION['id'];

        $isInserted = $this->accomadationModel->addAccommodationImage($userId, $accommodationId, $imagePath);

        if ($isInserted) {
            return true;
        } else {
            return false;
        }
    }


}

?>