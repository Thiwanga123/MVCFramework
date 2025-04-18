<?php

class Equipment_Suppliers extends Controller{

    private $productModel;
    private $userModel;
    private $supplierModel;
    private $bookingModel;

    public function __construct(){
        $this->productModel = $this->model('ProductModel');
        $this->supplierModel = $this->model('SupplierModel');
        $this->userModel = $this->model('ServiceProviderModel');
        $this->bookingModel = $this->model('BookingModel');

    }

    public function index(){
        echo "hi";
    }

    public function dashboard(){

        if (isset($_SESSION['id'])) {
            $this->view('equipment_supplier/Dashboard');
        } else {
            redirect('ServiceProvider');
        } 
    }



    // public function myInventory(){

    //     if (isset($_SESSION['id'])) {

    //         $supplierId = $_SESSION['id'];
    //         $this->productModel = $this->model('ProductModel');
    //         $products = $this->productModel->getAllProducts($supplierId);
    //         $data = [
    //             'products' => $products,
    //             'breadcrumbs' => $this->generateBreadcrumbs()
    //         ];
            
    //         $this->view('equipment_supplier/MyInventory',$data);

    //     } else {
    //         redirect('ServiceProvider');
    //     }

    // }

    
    public function myInventory(){
        if(isset($_SESSION['id'])){
            $rentals = $this->productModel->getAllProducts($_SESSION['id']);
            $categories = $this->productModel->getAllCategories();

            $data = [
                'rentals' =>  $rentals,
                'categories' => $categories,  
            ];
            
            $this->view('equipment_supplier/MyInventory', $data);
        }else{
            redirect("ServiceProvider");
        }
    }



    public function orders(){
        if (isset($_SESSION['id'])) {
            $currentPage = 'bookings';
            $bookings = $this->bookingModel->getBookingsBySupplierId($_SESSION['id']);
            
            $data =[
                'currentPage' => $currentPage,
                'bookings' => $bookings
            ];
            $this->view('equipment_supplier/Orders', $data);
        } else {
            redirect('ServiceProvider/login');
        }
        

    }

    public function reviews(){

        if (isset($_SESSION['id'])) {
            $this->view('equipment_supplier/Reviews');
        } else {
            redirect('ServiceProvider');
        }
    }

    public function bankdetails(){

        if (isset($_SESSION['id'])) {
            $this->view('equipment_supplier/bankdetails');
        } else {
            redirect('ServiceProvider');
        }
    }

    public function Mypayments(){

        if (isset($_SESSION['id'])) {
            $this->view('equipment_supplier/Mypayments');
        } else {
            redirect('ServiceProvider');
        }
    }

    public function notifications(){

        if (isset($_SESSION['id'])) {
            $this->view('equipment_supplier/Earnings');
        } else {
            redirect('ServiceProvider');
        }
        
    }

    public function profile(){

        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $type = $_SESSION['type'];
            $details = $this->getProfileDetails($id,$type);
            $this->view('equipment_supplier/Myprofile',['details' => $details]);
        } else {
            redirect('ServiceProvider');
        }
    }

    public function addProduct(){

        if (isset($_SESSION['id'])) {
            $supplierId = $_SESSION['id'];
            $this->productModel = $this->model('ProductModel');
            $categories = $this->productModel->getAllCategories();
            $data = [
                
            ];
            $this->view('equipment_supplier/AddProduct', $data);
        } else {
            redirect('ServiceProvider');
        }
    }

    public function generateBreadcrumbs(){
        $path = trim($_SERVER['REQUEST_URI'], '/');
        $parts = explode('/', $path);
        $url = URLROOT;
        $breadcrumbs = [];

        $breadcrumbs[] = ['name' => 'Home', 'url' => URLROOT];

        for($i = 0; $i <count($parts); $i++){
            $url .= "/". $parts[$i];

            $breadcrumbs[] = [
                'name' =>ucfirst(str_replace("-", " ", $parts[$i])), 
                'url' => $url
            ];
        }
        return $breadcrumbs;
    }

    public function getProfileDetails($id, $type){
        $data = $this->userModel->getUserData($id,$type);
        return $data;
    }

    public function getSuppliersByLocation(){

        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);


        if (!$data || !isset($data['latitude']) || !isset($data['longitude'])) {
            http_response_code(400); 
            echo json_encode(["error" => "Invalid input data"]);
            return;
        }

        $latitude = $data['latitude'];
        $longitude = $data['longitude'];
        $radius = 10;

        $suppliers = $this->supplierModel->getAllSuppliers();

        if (!$suppliers) {
            echo json_encode(["error" => "No suppliers found"]);
            exit;
        }

        $filteredSuppliers = [];

        foreach($suppliers as $supplier){
            $distance = $this->calculateDistance($latitude, $longitude, $supplier->latitude, $supplier->longitude);
            if($distance <= $radius){
                $supplier->distance = $distance;
                $filteredSuppliers[] = $supplier;
            }
        }

        usort($filteredSuppliers, function($a, $b) {
            return $a->distance <=> $b->distance;
        });
        
        header("Content-Type: application/json");
        echo json_encode(["suppliers" => $filteredSuppliers]);

    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2) {
        $earthRadius = 6371; 
    
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);
    
        $dLat = $lat2 - $lat1;
        $dLon = $lon2 - $lon1;
    
        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos($lat1) * cos($lat2) * 
             sin($dLon / 2) * sin($dLon / 2);
        
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
        return $earthRadius * $c;
    }
} 


?>