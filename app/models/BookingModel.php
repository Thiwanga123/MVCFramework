<?php

class BookingModel{

   private $db;

   public function __construct() {
       $this->db = new Database();
   }

   public function getBookings($guider_id){
//get the bookings from the database with the relavent guiderid
    $this->db->query('SELECT * FROM bookings WHERE id = :guider_id');

    $this->db->bind(':guider_id', $guider_id);

    $results = $this->db->resultSet();
    return $results;
}

//get the bookings of the guider

public function getGuiderBookings($guider_id){
   
    //count the bookings by the guider id
    $this->db->query('SELECT COUNT(*) as number_of_bookings FROM bookings WHERE id = :guider_id');

    $this->db->bind(':guider_id', $guider_id);

    $row = $this->db->single();

    return $row->number_of_bookings;
}

//get the available bookings with the relavannt of the guider
public function getAvailability($guider_id){
    $this->db->query('SELECT * FROM guider_availability WHERE id = :guider_id');

    $this->db->bind(':guider_id', $guider_id);

    $results = $this->db->resultSet();
    return $results;





}

//delete a specific the availability of the tour guider with the relavannt of the guider by id

public function deleteGuiderAvailability($id){
    $this->db->query('DELETE FROM guider_availability WHERE id = :id');

    $this->db->bind(':id', $id);

    $this->db->execute();
}

//add the availability of the guider


//id is auto increment
public function addAvailability($data){

  
    $this->db->query('INSERT INTO guider_availability(guider_id, available_date, charges_per_hour,location,available_time_from,available_time_to) VALUES (:guider_id, :available_date,  :charges_per_hour, :location,:available_time_from,:available_time_to)');

    $this->db->bind(':guider_id', $data['guider_id']);
    $this->db->bind(':available_date', $data['available_date']);
    $this->db->bind(':charges_per_hour', $data['charges_per_hour']);
    $this->db->bind(':location', $data['location']);
    $this->db->bind(':available_time_from', $data['available_time_from']);
    $this->db->bind(':available_time_to', $data['available_time_to']);
   
    $this->db->execute();

    if($this->db->rowCount() > 0){
        return true;
    } else {
        return false;
    }
}

//edit the availability to the  relavant guider

public function editAvailability($data){
    $this->db->query('UPDATE guider_availability SET available_date = :date, available_time = :time, charges_per_hour = :charges_per_hour, location = :location WHERE id = :id && guider_id = :guider_id');

    $this->db->bind(':date', $data['date']);
    $this->db->bind(':time', $data['time']);
    $this->db->bind(':charges_per_hour', $data['charges_per_hour']);
    $this->db->bind(':location', $data['location']);
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':guider_id', $data['guider_id']);

    $this->db->execute();

    if($this->db->rowCount() > 0){
        return true;
    } else {
        return false;
    }
}

public function updateProfile($data){
    $this->db->query('UPDATE tour_guides SET name = :name, address = :address, email = :email, phone = :phone, language = :language, password = :password WHERE id = :id');
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':language', $data['language']);
    $this->db->bind(':password', $data['password']);
    $this->db->execute();
    if($this->db->rowCount() > 0){
        return true;
    } else {
        return false;
    }

}



//////////////////////////////////////////////////////////// EQUIPMENT BOOKINGS   ////////////////////////////////////////////////////////////////////////////

    public function addEquipmentBooking($data){   
        $sql = "INSERT INTO rental_equipment_bookings (user_id, equipment_id, supplier_id, start_date, end_date, total_price) VALUES (?, ?, ?, ?, ?, ?)";
        try{
            $this->db->query($sql);
            $this->db->bind(1,$data['user_id']);
            $this->db->bind(2,$data['product_id']);
            $this->db->bind(3,$data['supplier_id']);
            $this->db->bind(4,$data['booking_start_date']);
            $this->db->bind(5,$data['booking_end_date']);
            $this->db->bind(6,$data['totalPrice']);
            return $this->db->execute();
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function getBookingsByEquipmentId($productId){
        $sql = "SELECT user_id, start_date, end_date, status FROM rental_equipment_bookings WHERE equipment_id = ?";
        try{
            $this->db->query($sql);
            $this->db->bind(1,$productId);
            $result = $this->db->resultSet();
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function getBookingsBySupplierId($supplierId){
        $sql = "SELECT b.*, ri.image_path
                FROM rental_equipment_bookings b 
                LEFT JOIN rental_images ri ON b.equipment_id = ri.product_id
                AND ri.image_id = (SELECT MIN(image_id) FROM rental_images WHERE product_id = b.equipment_id)
                WHERE b.supplier_id = ?";
        try{
            $this->db->query($sql);
            $this->db->bind(1, $supplierId);
            $result = $this->db->resultSet();
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function upcomingBookingsBySupplierId($supplierId){
        $sql = 'SELECT * FROM rental_equipment_bookings WHERE supplier_id = ? AND start_date > CURRENT_DATE';
        try{
            $this->db->query($sql);
            $this->db->bind(1, $supplierId);
            $result = $this->db->resultSet();
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function getBookingsByVehicleId($id){
        $sql = "SELECT user_id, start_date, end_date, status FROM vehicle_bookings WHERE vehicle_id = ?";
        try{
            $this->db->query($sql);
            $this->db->bind(1,$id);
            $result = $this->db->resultSet();
            return $result;

            }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;

        }

    }

    public function checkBooking($productId){
        $sql = "SELECT COUNT(*) AS booking_count FROM rental_equipment_bookings WHERE equipment_id = ? AND status IN ('booked', 'active')";
        try{
            $this->db->query($sql);
            $this->db->bind(1, $productId);
            $result = $this->db->single();
            return $result -> booking_count;

        
        } catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occurred: $error_msg');</script>";
            return false;
        }
    }


    public function softDeleteProduct($productId) {
        $sql = "UPDATE rental_equipments SET deleted_at = NOW() WHERE id = ?";

        try {
            $this->db->query($sql);
            $this->db->bind(1, $productId);
            $result  = $this->db->execute();
            return $result;
        } catch (Exception $e) {
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occurred: $error_msg');</script>";
            return false;
        }
    }

    public function getEquipmentBookingById($booking_id) {
        $sql = "SELECT 
                    reb.booking_id, 
                    reb.equipment_id,
                    reb.supplier_id,
                    reb.user_id,
                    reb.start_date, 
                    reb.end_date, 
                    reb.total_price, 
                    reb.status, 
                    t.name, 
                    t.email, 
                    t.telephone_number
                FROM rental_equipment_bookings reb
                JOIN traveler t ON reb.user_id = t.traveler_id
                WHERE reb.booking_id = ?";
        try {
            $this->db->query($sql);
            $this->db->bind(1, $booking_id);
            return $this->db->single();
        } catch (Exception $e) {
            $error_msg = $e->getMessage();
            error_log('Error in getEquipmentBookingById: ' . $error_msg);
            return false;
        }
    }




    public function book_guider($data){
        $sql = "INSERT INTO guider_booking (traveler_id, guider_id, check_in, check_out, amount, pickup, destination) VALUES (:traveler_id, :guider_id, :check_in, :check_out, :amount, :pickup, :destination)";
        try{
            $this->db->query($sql);
            $this->db->bind(':traveler_id',$data['user_id']);
            $this->db->bind(':guider_id',$data['service_id']);
            $this->db->bind(':check_in',$data['start_date']);
            $this->db->bind(':check_out',$data['end_date']);
            $this->db->bind(':amount',$data['total_price']);
            $this->db->bind(':pickup',$data['pickup_location']);
            $this->db->bind(':destination',$data['destination']);
            if ($this->db->execute()) {

                
                $bookingId = $this->db->insertId();
                  // Call function to hold payment (assuming it exists elsewhere)
                $this->holdPaymentGuider($bookingId, $data['total_price'], $data['service_id'], $data['user_id']);
                return ['success' => true, 'message' => 'Booking successful.', 'booking_id' => $bookingId];
            } else {
                return ['success' => false, 'message' => 'Failed to execute booking query.'];
            }
        } catch (Exception $e) {
            error_log("Error booking guider: " . $e->getMessage());
            return ['success' => false, 'message' => 'Error booking guider: ' . $e->getMessage()];
        }
    }

    public function book_vehicle($data){

        $sql = "INSERT INTO vehicle_booking (traveler_id, vehicle_id, check_in, check_out, amount, pickup, destination,supplier_id) VALUES (:traveler_id, :vehicle_id, :check_in, :check_out, :amount, :pickup, :destination, :supplier_id)";
         // Prepare the SQL statement
        
        try{
            $this->db->query($sql);
            $this->db->bind(':traveler_id',$data['user_id']);
            $this->db->bind(':vehicle_id',$data['product_id']);
            $this->db->bind(':check_in',$data['start_date']);
            $this->db->bind(':check_out',$data['end_date']);
            $this->db->bind(':amount',$data['total_price']);
            $this->db->bind(':pickup',$data['pickup_location']);
            $this->db->bind(':destination',$data['destination']);
            $this->db->bind(':supplier_id',$data['service_provider_id']);
            if ($this->db->execute()) {
                $bookingId = $this->db->insertId();



                $this->holdPaymentVehicle($bookingId, $data['total_price'], $data['service_provider_id'], $data['user_id']);
                return ['success' => true, 'message' => 'Booking successful.', 'booking_id' => $bookingId];
            } else {
                return ['success' => false, 'message' => 'Failed to execute booking query.'];
            }
        } catch (Exception $e) {
            error_log("Error booking vehicle: " . $e->getMessage());
            return ['success' => false, 'message' => 'Error booking vehicle: ' . $e->getMessage()];
        }
    }


    public function book_equipment($data){
        $sql = "INSERT INTO equipment_booking (traveler_id, equipment_id, check_in, check_out, amount) VALUES (:traveler_id, :equipment_id, :check_in, :check_out, :amount)";
        try{
            $this->db->query($sql);
            $this->db->bind(':traveler_id',$data['user_id']);
            $this->db->bind(':equipment_id',$data['service_id']);
            $this->db->bind(':check_in',$data['start_date']);
            $this->db->bind(':check_out',$data['end_date']);
            $this->db->bind(':amount',$data['total_price']);
            if ($this->db->execute()) {
                $bookingId = $this->db->insertId();
                $this->holdPaymentEquipment($bookingId, $data['total_price'], $data['service_id'], $data['user_id']);
                return ['success' => true, 'message' => 'Booking successful.', 'booking_id' => $bookingId];
            } else {
                return ['success' => false, 'message' => 'Failed to execute booking query.'];
            }
        } catch (Exception $e) {
            error_log("Error booking equipment: " . $e->getMessage());
            return ['success' => false, 'message' => 'Error booking equipment: ' . $e->getMessage()];
        }
    }



public function holdPaymentGuider($bookingId, $totalamount, $providerId, $user_id){
     
    // Hold payment in the provider's wallet
    $this->db->query("INSERT INTO guider_wallet (provider_id,traveler_id, holding_amount, transaction_type, related_booking_id, transaction_date) VALUES (:provider_id, :traveler_id, :amount, 'deposit', :booking_id, CURRENT_DATE)");
    $this->db->bind(':amount', $totalamount);
    $this->db->bind(':provider_id', $providerId);
    $this->db->bind(':booking_id', $bookingId);
    $this->db->bind(':traveler_id', $user_id);
    //execute
    if($this->db->execute()){
        return ['success' => true, 'message' => 'Booking successful.', 'booking_id' => $bookingId];
    } else {
        return ['success' => false, 'message' => 'Failed to execute booking query.'];
    }
}

public function holdPaymentVehicle($bookingId, $totalamount, $providerId, $user_id){
    try {
        // Hold payment in the provider's wallet
        $this->db->query("INSERT INTO vehicle_wallet (provider_id, traveler_id, holding_amount, transaction_type, related_booking_id, transaction_date) VALUES (:provider_id, :traveler_id, :amount, 'deposit', :booking_id, CURRENT_DATE)");
        $this->db->bind(':amount', $totalamount);
        $this->db->bind(':provider_id', $providerId);
        $this->db->bind(':booking_id', $bookingId);
        $this->db->bind(':traveler_id', $user_id);
        //execute
        if($this->db->execute()){
            return ['success' => true, 'message' => 'Booking successful.', 'booking_id' => $bookingId];
        } else {
            return ['success' => false, 'message' => 'Failed to execute booking query.'];
        }
    } catch (Exception $e) {
        error_log("Error holding payment for vehicle: " . $e->getMessage());
        echo "<script>console.error('Error holding payment for vehicle: " . $e->getMessage() . "');</script>";
        return ['success' => false, 'message' => 'Error holding payment for vehicle: ' . $e->getMessage()];
    }
}


public function holdPaymentEquipment($bookingId, $totalamount, $providerId, $user_id){
    // Hold payment in the provider's wallet
    $this->db->query("INSERT INTO equipment_wallet (provider_id, traveler_id, holding_amount, transaction_type, related_booking_id, transaction_date) VALUES (:provider_id, :traveler_id, :amount, 'deposit', :booking_id, CURRENT_DATE)");
    $this->db->bind(':amount', $totalamount);
    $this->db->bind(':provider_id', $providerId);
    $this->db->bind(':booking_id', $bookingId);
    $this->db->bind(':traveler_id', $user_id);
    //execute
    if($this->db->execute()){
        return ['success' => true, 'message' => 'Booking successful.', 'booking_id' => $bookingId];
    } else {
        return ['success' => false, 'message' => 'Failed to execute booking query.'];
    }
}
// Removed misplaced catch block as it is not part of a valid try-catch structure
        
        

public function cancelEquipmentBooking($booking_id, $supplier_id, $penaltyAmount) {
    try {
        // Start transaction
        $this->db->beginTransaction();
        
        // 1. Update booking status to 'cancelled'
        $this->db->query('UPDATE rental_equipment_bookings SET status = ? WHERE booking_id = ?');
        $this->db->bind(1, 'cancelled');
        $this->db->bind(2, $booking_id);
        
        if (!$this->db->execute()) {
            $this->db->rollBack();
            return false;
        }
        
        // 2. If penalty amount is applicable, update the supplier's penalty_amount if there's a column for it
        if ($penaltyAmount > 0) {
            // Check if there's a penalty_amount column in the equipment supplier table
            // If there isn't, you might need to add it or handle penalties differently
            $this->db->query('UPDATE equipment_suppliers SET penalty_amount = COALESCE(penalty_amount, 0) + ? WHERE id = ?');
            $this->db->bind(1, $penaltyAmount);
            $this->db->bind(2, $supplier_id);
            
            if (!$this->db->execute()) {
                // If this fails, it might be because the column doesn't exist
                // We can still proceed with the cancellation
                error_log('Unable to apply penalty to equipment supplier ID ' . $supplier_id);
            }
        }
        
        // 3. Get the booking's wallet entry (if any)
        $this->db->query('SELECT id, holding_amount FROM equipment_wallet WHERE related_booking_id = ? AND provider_id = ?');
        $this->db->bind(1, $booking_id);
        $this->db->bind(2, $supplier_id);
        $walletEntry = $this->db->single();
        
        // 4. If wallet entry exists, update refund_amount (always full amount)
        if ($walletEntry) {
            $holdingAmount = $walletEntry->holding_amount;
            
            if ($holdingAmount > 0) {
                // Always set the full amount as refund_amount
                $this->db->query('
                    UPDATE equipment_wallet 
                    SET holding_amount = 0, 
                        refund_amount = ?, 
                        transaction_type = ?
                    WHERE id = ?
                ');
                $this->db->bind(1, $holdingAmount); // Full refund to traveler
                $this->db->bind(2, 'refund');
                $this->db->bind(3, $walletEntry->id);
                
                if (!$this->db->execute()) {
                    $this->db->rollBack();
                    return false;
                }
            }
        }
        
        // Commit transaction
        $this->db->commit();
        return true;
        
    } catch (Exception $e) {
        // Roll back transaction on error
        $this->db->rollBack();
        error_log("Error cancelling equipment booking: " . $e->getMessage());
        return false;
    }
}

}

?>

 


   