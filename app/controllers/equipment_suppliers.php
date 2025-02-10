<?php

class Equipment_Suppliers extends Controller{

    private $productModel;
    private $userModel;
    private $supplierModel;

    public function __construct(){
        $this->productModel = $this->model('ProductModel');
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



    public function myInventory(){

        if (isset($_SESSION['id'])) {

            $supplierId = $_SESSION['id'];

            $this->productModel = $this->model('ProductModel');
            $products = $this->productModel->getAllProducts($supplierId);
            $this->view('equipment_supplier/MyInventory',['products' => $products]);

        } else {
            redirect('ServiceProvider');
        }

    }

    public function orders(){
        
        if (isset($_SESSION['id'])) {
            $this->view('equipment_supplier/Orders');
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

    public function getProfileDetails($id, $type){
        $this->userModel = $this->model('ServiceProviderModel');
        $data = $this->userModel->getUserData($id,$type);
        return $data;
    }

    public function getSuppliersByLocation(){
        $latitude = isset($_GET['lat']) ? $_GET['lat'] : null;
        $longitude = isset($_GET['lon']) ? $_GET['lon'] : null;

        if (!$latitude || !$longitude) {
            echo json_encode(["success" => false, "message" => "Invalid coordinates"]);
            return;
        }

        $this->supplierModel = $this->model('SupplierModel');
        $suppliers = $this->supplierModel->getSuppliersWithinRadius($latitude, $longitude);

        echo json_encode([
            "success" => true,
            "suppliers" => $suppliers
        ]);

    }
} 


?>