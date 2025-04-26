<?php

class TransportModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // Assuming you have a Database class for database operations
    }

    public function getAllProducts($supplierId)
    {
        $this->db->query("SELECT * FROM products WHERE supplier_id = :supplierId");
        $this->db->bind(':supplierId', $supplierId);
        return $this->db->resultSet();
    }

    public function addVehicle($supplierId, $vehicleType, $vehicleModel, $vehicleMake, $plateNumber, $rate, $fuelType, $description, $availabilty,$driver, $cost, $location, $seating_capcity){
        try{
             $sql = "INSERT INTO vehicles (supplierId, type, model, make, license_plate_number, rate, fuel_type, description, availability, driver, cost, location, seating_capacity) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)";
 
             $this->db->query($sql);
 
             $this->db->bind(1, $supplierId);
             $this->db->bind(2, $vehicleType);
             $this->db->bind(3, $vehicleModel);
             $this->db->bind(4, $vehicleMake);
             $this->db->bind(5, $plateNumber);
             $this->db->bind(6, $rate);
             $this->db->bind(7, $fuelType);
             $this->db->bind(8, $description);
             $this->db->bind(9, $availabilty);
             $this->db->bind(10, $driver);
             $this->db->bind(11, $cost);
             $this->db->bind(12, $location);
             $this->db->bind(13, $seating_capcity);

             if ($this->db->execute()) {
                 // Get the inserted product ID
                 $vehicleId = $this->db->insertId();
                 return $vehicleId;
             } else {
                 throw new Exception("Error inserting product.");
             }
         }catch(Exception $e){
         return false;
         }
     }     
     public function updateVehicle($data) {
        try {
            $sql = "UPDATE vehicles
                    SET 
                        type = ?, 
                        model = ?, 
                        make = ?, 
                        license_plate_number = ?, 
                        rate = ?, 
                        fuel_type = ?, 
                        description = ?, 
                        availability = ?, 
                        driver = ?, 
                        cost = ?, 
                        location = ?, 
                        seating_capacity = ?, 
                        supplierId = ?
                    WHERE vehicle_id = ?";
            
            $this->db->query($sql);
    
            $this->db->bind(1, $data['vehicleType']);
            $this->db->bind(2, $data['vehicleModel']);
            $this->db->bind(3, $data['vehicleMake']);
            $this->db->bind(4, $data['plateNumber']);
            $this->db->bind(5, $data['rate']);
            $this->db->bind(6, $data['fuelType']);
            $this->db->bind(7, $data['description']);
            $this->db->bind(8, $data['availability']);
            $this->db->bind(9, $data['driver']);
            $this->db->bind(10, $data['cost']);
            $this->db->bind(11, $data['location']);
            $this->db->bind(12, $data['seating_capacity']);
            $this->db->bind(13, $data['supplierId']);
            $this->db->bind(14, $data['vehicleId']); // This was missing
    
            return $this->db->execute();
        } catch(Exception $e) {
            echo "<script>alert('An error occurred: " . $e->getMessage() . "');</script>";
            return false;
        }
    }
    
    
    
    
    
    public function addVehicleImage($supplierId, $vehicleId, $imagePath) {
        try {
            $sql = "INSERT INTO vehicle_images (supplier_id, vehicle_id, image_path) VALUES (?, ?, ?)";
            $this->db->query($sql);

            $this->db->bind(1, $supplierId);
            $this->db->bind(2, $vehicleId);
            $this->db->bind(3, $imagePath);
    
            if ($this->db->execute()) {
                return true;
            } else {
               throw new Exception("Error inserting image path into the database.");
            }
    
        } catch (Exception $e) {
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occurred: $error_msg');</script>";
            return false;
        }
    }

     public function getAllVehicles($supplierId){
        try{
            $sql = "SELECT v.*, i.image_path 
                    FROM vehicles v JOIN 
                    (SELECT vehicle_id, MIN(image_path) AS image_path 
                    FROM vehicle_images 
                    GROUP BY vehicle_id) i 
                    ON 
                    v.vehicle_id = i.vehicle_id
                     WHERE 
                    v.supplierId = ?";

            $this->db->query($sql);
            $this->db->bind(1,$supplierId);

            $result = $this->db->resultSet();

            return $result;            

        }catch(Exception $e){
            $error_msg = $e->getMessage();
                echo "<script>alert('An error occurred: $error_msg');</script>";
                return false;
        }
    }

    //delete a specific the availability of the tour guider with the relavannt of the guider by id

    public function deleteVehicleById($id) {
        try {
            $sql = "DELETE FROM vehicles WHERE vehicle_id = :vehicle_id";
            $this->db->query($sql);
            $this->db->bind(':vehicle_id', $id);
    
            return $this->db->execute();
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function deleteDriverById($id) {
        $this->db->query('DELETE FROM drivers WHERE id = :id');
        $this->db->bind(':id', $id);
    
        // Execute and return true if the query was successful
        return $this->db->execute();
    }
    
public function updateprofile($data){

    $this->db->query('UPDATE transport_suppliers SET name = :name, email = :email, password= :password, address = :address, phone = :phone, nic = :nic WHERE id = :id');

    $this->db->bind(':id', $data['id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':nic', $data['nic']);
    $this->db->bind(':password', $data['password']);

    if($this->db->execute()){
        return true;
        }else{
            return false;
            }
    }
  

    public function addriver($name, $phone, $email, $description,$supplierId,$driverLicense ) {


        try {
            $sql = "INSERT INTO drivers (name,phone, email, description, tSupplierId,driverLicense) VALUES (?, ?, ?, ?,?,?)";
    
            $this->db->query($sql);
    
            $this->db->bind(1, $name);
            $this->db->bind(2, $phone);
            $this->db->bind(3, $email);
            $this->db->bind(4, $description);
            $this->db->bind(5, $supplierId);
            $this->db->bind(6, $driverLicense);

            if ($this->db->execute()) {
                // Get the inserted driver ID
                return $this->db->insertId();
            } else {
                
                throw new Exception("Error inserting driver.");
            }
        } catch (Exception $e) {
            return false;
        }
    }
    
    
    public function getAlldrivers($supplierId){
        try{
            $sql = "SELECT * FROM drivers WHERE tSupplierId = ?";

            $this->db->query($sql);
            $this->db->bind(1,$supplierId);

            $result = $this->db->resultSet();

            return $result;            

        }catch(Exception $e){
            $error_msg = $e->getMessage();
                echo "<script>alert('An error occurred: $error_msg');</script>";
                return false;
        }
    }
  
    public function getVehicleWithImages($vehicleid){
        try {
            $this->db->query("SELECT v.*, 
                GROUP_CONCAT(vi.image_path) AS images 
                FROM vehicles v 
                LEFT JOIN vehicle_images vi 
                    ON v.vehicle_id = vi.vehicle_id 
                WHERE v.vehicle_id = :vehicleid 
                GROUP BY v.vehicle_id");
    
            $this->db->bind(':vehicleid', $vehicleid);
            $row = $this->db->single();
    
            // Convert comma-separated image paths into an array
            if ($row && isset($row->images)) {
                $row->images = explode(',', $row->images);
            } else {
                $row->images = [];
            }
    
            return $row;
    
        } catch (Exception $e) {
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occurred: $error_msg');</script>";
            return false;
        }
    }


    public function getVehicleById($id){
        $sql = 'SELECT * FROM vehicles WHERE vehicle_id = ?';
        try{
            $this->db->query($sql);
            $this->db->bind(1, $id);
            $result = $this->db->single();
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occurred: $error_msg');</script>";
            return false;
        }
    }

    public function getAvailableVehicles($startDate, $endDate){
        $sql = '
            SELECT v.* FROM vehicles v
            WHERE v.vehicle_id NOT IN (
                SELECT vb.vehicle_id 
                FROM vehicle_booking vb
                WHERE 
                    (vb.check_in <= :endDate AND vb.check_out >= :startDate)
                    AND vb.status != "cancelled"  
                    AND vb.deleted_at IS NULL
            )';
    
        try{// Bind the parameters
            $this->db->query($sql);
            $this->db->bind(':startDate', $startDate);
            $this->db->bind(':endDate', $endDate);
    
        return $this->db->resultSet();
        } catch (Exception $e) {
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occurred: $error_msg');</script>";
            return false;
        }
    }
    
    public function getTotalVehicle($supplierId) {
        try {
            $sql = "SELECT COUNT(*) as total_vehicles FROM vehicles WHERE supplierId = :supplierId";
            $this->db->query($sql);
            $this->db->bind(':supplierId', $supplierId);
    
            $result = $this->db->single();
    
            return $result; // returns an object with property total_vehicles
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return (object)['total_vehicles' => 0];
        }
    }
    
    public function getAllBookingsBySupplier($supplierId) {
        $this->db->query("SELECT * FROM vehicle_booking WHERE supplier_id = :supplier_id AND status != 'Cancelled'");
        $this->db->bind(':supplier_id', $supplierId);
        return $this->db->resultSet();
    }
    

public function countBookingsBySupplier($supplierId) {
    $this->db->query("SELECT COUNT(*) as total FROM vehicle_booking WHERE supplier_id = :supplier_id");
    $this->db->bind(':supplier_id', $supplierId);
    return $this->db->single();
}

// public function getVehicleById($vehicleId) {
//     $sql = "SELECT v.*, vi.image_path
//                 FROM vehicles v
//                 LEFT JOIN vehicle_images vi ON v.vehicle_id = vi.vehicle_id
//                 WHERE v.vehicle_id = ?";
//     try{
//         $this->db->query($sql);
//         $this->db->bind(1, $vehicleId);
//         return $this->db->single();
//     }catch(Exception $e){
//         $error_msg = $e->getMessage();
//         echo "<script>alert('An error occurred: $error_msg');</script>";
//         return false;
//     }
  
// }


}
