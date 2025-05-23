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

    public function addVehicle($supplierId, $vehicleType, $vehicleModel, $vehicleMake, $plateNumber, $rate, $litre, $fuelType, $description, $availabilty,$driver, $cost, $location){
        try{
             $sql = "INSERT INTO vehicles (supplierId, type, model, make, license_plate_number, rate, litre, fuel_type, description, availability, driver, cost, location) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)";
 
             $this->db->query($sql);
 
             $this->db->bind(1, $supplierId);
             $this->db->bind(2, $vehicleType);
             $this->db->bind(3, $vehicleModel);
             $this->db->bind(4, $vehicleMake);
             $this->db->bind(5, $plateNumber);
             $this->db->bind(6, $rate);
             $this->db->bind(7, $litre);
             $this->db->bind(8, $fuelType);
             $this->db->bind(9, $description);
             $this->db->bind(10, $availabilty);
             $this->db->bind(11, $driver);
             $this->db->bind(12, $cost);
             $this->db->bind(13, $location);
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
                    v.id = i.vehicle_id
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

public function deleteVehicleAvailability($id){
    $this->db->query('DELETE FROM vehicles WHERE id = :id');
    $this->db->bind(':id', $id);
    $this->db->execute();
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
    public function updateVehicle($data){
        try{
           

            $sql = "UPDATE vehicles
                SET type = ?, model = ?, make = ?, license_plate_number = ?, rate= ?, litre=?, fuel_type=?, description=?, driver=?, availability =? 
                WHERE supplierId = ? AND id = ? ";

               

            $this->db->query($sql);

            $this->db->bind(1, $data['vehicleType']);
            $this->db->bind(2, $data['vehicleModel']);
            $this->db->bind(3, $data['vehicleMake']);
            $this->db->bind(4, $data['plateNumber']);
            $this->db->bind(5, $data['rate']);
            $this->db->bind(6, $data['fuelType']);
            $this->db->bind(7, $data['description']);
            $this->db->bind(8, $data['driver']);
            $this->db->bind(9, $data['availability']);
            $this->db->bind(10, $data['id']);
            $this->db->bind(11, $data['vid']);
            
            if ($this->db->execute()) {
                return true;
            } else {
               throw new Exception("Error in updating Vehicle details");
            }

        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    
    }

    public function addriver($name, $gender, $phone, $email, $description, $drive, $supplierId ) {


        try {
            $sql = "INSERT INTO drivers (name, gender, phone, email, description, drive, tSupplierId) VALUES (?, ?, ?, ?,?,?,?)";
    
            $this->db->query($sql);
    
            $this->db->bind(1, $name);
            $this->db->bind(2, $gender);
            $this->db->bind(3, $phone);
            $this->db->bind(4, $email);
            $this->db->bind(5, $description);
            $this->db->bind(6, $drive);
            $this->db->bind(7, $supplierId);

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
  
    

}
