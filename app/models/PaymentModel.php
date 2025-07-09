<?php

class PaymentModel {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function generatePaymentHash() {
        $config = include 'config/payhere.php';

        $order_id='ORDER123';
        $amount=1000;
        $merchant_id = '1229635';
        $currency = $config['currency'];
        $merchant_secret = 'MTc4NjQxNDY3MzExNTkxOTYxMzIyNjMzMDAzNzk1NDE3NTI3ODk5MA==';

        $hash = strtoupper(md5(
            $merchant_id . 
            $order_id . 
            $amount . 
            $currency . 
            strtoupper(md5($merchant_secret))
        ));

        $array = array(
            'merchant_id' => $merchant_id,
            'order_id' => $order_id,
            'amount' => $amount,
            'currency' => $currency,
            'hash' => $hash
        );

       //return $array;
       return $array;
    }

    public function handleIPN() {
        $postData = $_POST;

        $config = include 'config/payhere.php';
        $merchant_secret = $config['merchant_secret'];

        $local_md5sig = strtoupper(md5(
            $postData['merchant_id'] .
            $postData['order_id'] .
            $postData['payhere_amount'] .
            $postData['payhere_currency'] .
            $postData['status_code'] .
            strtoupper(md5($merchant_secret))
        ));

        if ($local_md5sig === $postData['md5sig'] && $postData['status_code'] == 2) {
            file_put_contents('payments.log', "Payment Success: Order " . $postData['order_id'] . "\n", FILE_APPEND);
        } else {
            file_put_contents('payments.log', "Payment Failed or Invalid Signature: Order " . $postData['order_id'] . "\n", FILE_APPEND);
        }
    }


    public function book_accomodation($booking_data) {

        // Check if required data is present
        print_r($booking_data); // Debugging line to check the data
        // Insert booking record
        $this->db->query('INSERT INTO property_booking (
                         property_id, 
                         traveler_id, 
                         supplier_id,
                         check_in, 
                         check_out, 
                         amount, 
                         totalrooms, 
                         singlerooms, 
                         doublerooms, 
                         familyrooms, 
                         guests, 
                         payment_date,
                         status, 
                         payment_status) 
                         VALUES (
                         :property_id, 
                         :traveler_id, 
                         :supplier_id,
                         :check_in, 
                         :check_out, 
                         :amount, 
                         :totalrooms, 
                         :singlerooms, 
                         :doublerooms, 
                         :familyrooms, 
                         :guests,
                         :payment_date,
                         :status, 
                         :payment_status)');
        
        // Bind values
        $this->db->bind(':property_id', $booking_data['property_id']);
        $this->db->bind(':traveler_id', $booking_data['user_id']);
        $this->db->bind(':supplier_id', $booking_data['service_provider_id']);
        $this->db->bind(':check_in', $booking_data['check_in']);
        $this->db->bind(':check_out', $booking_data['check_out']);
        $this->db->bind(':amount', $booking_data['amount']);
        $this->db->bind(':totalrooms', $booking_data['totalrooms']);
        $this->db->bind(':singlerooms', $booking_data['singlerooms'] ?? 0);
        $this->db->bind(':doublerooms', $booking_data['doublerooms'] ?? 0);
        $this->db->bind(':familyrooms', $booking_data['familyrooms'] ?? 0);
        $this->db->bind(':guests', $booking_data['guests'] ?? 1);
        $this->db->bind(':payment_date', date('Y-m-d'));
        $this->db->bind(':status', 'pending');
        $this->db->bind(':payment_status', 'charged');
        
        // Execute
        if ($this->db->execute()) {
            // Get the booking ID using a direct query
            $this->db->query('SELECT MAX(booking_id) as booking_id FROM property_booking 
                             WHERE property_id = :property_id 
                             AND traveler_id = :traveler_id 
                             AND supplier_id = :supplier_id
                             AND check_in = :check_in 
                             AND check_out = :check_out');
                             
            // Bind the same values to find the record
            $this->db->bind(':property_id', $booking_data['property_id']);
            $this->db->bind(':traveler_id', $booking_data['user_id']);
            $this->db->bind(':supplier_id', $booking_data['service_provider_id']);
            $this->db->bind(':check_in', $booking_data['check_in']);
            $this->db->bind(':check_out', $booking_data['check_out']);
            
            // Execute select query
            $result = $this->db->single();
            
            if ($result && isset($result->booking_id)) {
                return $result->booking_id;
            }
            
            return true; // Return true if we couldn't get the ID but insertion was successful
        } else {
            return false;
        }
    }
}
