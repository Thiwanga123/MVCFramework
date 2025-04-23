<?php
    // require_once '../libraries/Controller.php';

    class Packages extends Controller{
        private $packageModel;

        public function __construct(){
            $this->packageModel = $this->model('M_package');
        }
       
        public function getPackages(){
            if(isset($_SESSION['user_id']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
                $latitude = $_POST['latitude'];
                $longitude = $_POST['longitude'];
                $startDate = $_POST['start_date'];
                $endDate = $_POST['end_date'];
                $radius = 10; 

                $nearbyProperties = $this->nearByProperties($latitude, $longitude, $radius);
                $nearbySuppliers = $this->nearBySuppliers($latitude, $longitude, $radius);

                $availableProperties = $this->packageModel->getAvailableProperties($nearbyProperties, $startDate, $endDate);
                $availableEquipment = $this->packageModel->getAvailableEquipment($nearbySuppliers, $startDate, $endDate);

                $availableVehicles = $this->packageModel->getAvailableVehicles($startDate, $endDate);
                $availableGuiders = $this->packageModel->getAvailableGuides($startDate, $endDate);


            }else{
                redirect('users/login');
            }
        }


        public function nearByProperties($latitude, $longitude, $radius){
            $properties = $this->packageModel->getAllProperties();
            $nearbyProperties = [];
            foreach ($properties as $property) {
                $distance = $this->haversine($latitude, $longitude, $property['latitude'], $property['longitude']);
                
                if ($distance <= $radius) {
                    $nearbyProperties[] = $property;
                }
            }

            return $nearbyProperties;
        }

        public function nearBySuppliers($latitude, $longitude, $radius){
            $suppliers = $this->packageModel->getAllSuppliers();
            $nearbySuppliers = [];
            foreach ($suppliers as $supplier) {
                $distance = $this->haversine($latitude, $longitude, $supplier['latitude'], $supplier['longitude']);
                
                if ($distance <= $radius) {
                    $nearbySuppliers[] = $supplier;
                }
            }
            
            return $nearbySuppliers;
        }

       



        public function haversine($lat1, $lon1, $lat2, $lon2) {
            $earthRadius = 6371; 
            
            // Convert latitude and longitude from degrees to radians
            $lat1 = deg2rad($lat1);
            $lon1 = deg2rad($lon1);
            $lat2 = deg2rad($lat2);
            $lon2 = deg2rad($lon2);
            
            // Differences in coordinates
            $dlat = $lat2 - $lat1;
            $dlon = $lon2 - $lon1;
            
            // Haversine formula
            $a = sin($dlat / 2) * sin($dlat / 2) +
                 cos($lat1) * cos($lat2) *
                 sin($dlon / 2) * sin($dlon / 2);
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
            
            // Calculate the distance
            $distance = $earthRadius * $c; // Distance in kilometers
            
            return $distance; // In kilometers
        }
       
    }

?>