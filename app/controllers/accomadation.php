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

public function deleteproperty($id) {
    if (isset($_SESSION['id'])) {
        // Attempt to delete the property
        $isDeleted = $this->accomadationModel->deleteProperty($id);

        if ($isDeleted) {
            echo "<script>alert('Property removed successfully'); window.location.href = '" . URLROOT . "/accomadation/myInventory';</script>";
        } else {
            echo "<script>alert('Cannot delete property with existing bookings'); window.location.href = '" . URLROOT . "/accomadation/myInventory';</script>";
        }
    } else {
        echo "<script>alert('Please log in to delete a property'); window.location.href = '" . URLROOT . "/ServiceProvider/login';</script>";
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

 



}
