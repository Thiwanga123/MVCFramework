<?php
class M_guider {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    // Get all availabilities for a guider
    public function getAvailability($guider_id) {
        $this->db->query('SELECT * FROM guiders_availability WHERE guider_id = :guider_id ORDER BY available_date ASC');
        $this->db->bind(':guider_id', $guider_id);
        return $this->db->resultSet();
    }
    
    // Add a new availability
    public function addAvailability($data) {
        $this->db->query('INSERT INTO guiders_availability (guider_id, available_date, available_time_from, available_time_to, charges_per_hour, location, reason) 
                          VALUES (:guider_id, :available_date, :available_time_from, :available_time_to, :charges_per_hour, :location, :reason)');
        
        // Bind values
        $this->db->bind(':guider_id', $data['guider_id']);
        $this->db->bind(':available_date', $data['available_date']);
        $this->db->bind(':available_time_from', $data['available_time_from']);
        $this->db->bind(':available_time_to', $data['available_time_to']);
        $this->db->bind(':charges_per_hour', $data['charges_per_hour']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':reason', $data['reason'] ?? null);
        
        // Execute
        $this->db->execute();
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
    
    // Update an existing availability
    public function editAvailability($data) {
        $this->db->query('UPDATE guiders_availability 
                          SET available_time_from = :time_from, 
                              available_time_to = :time_to, 
                              charges_per_hour = :charges_per_hour, 
                              location = :location,
                              reason = :reason
                          WHERE guider_id = :guider_id AND available_date = :available_date');
        
        // Bind values
        $this->db->bind(':guider_id', $data['guider_id']);
        $this->db->bind(':available_date', $data['available_date']);
        $this->db->bind(':time_from', $data['available_time_from']);
        $this->db->bind(':time_to', $data['available_time_to']);
        $this->db->bind(':charges_per_hour', $data['charges_per_hour']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':reason', $data['reason'] ?? null);
        
        // Execute
        return $this->db->execute();
    }
    
    // Delete an availability
    public function deleteGuiderAvailability($data) {
        $this->db->query('DELETE FROM guiders_availability WHERE guider_id = :guider_id AND available_date = :available_date');
        $this->db->bind(':guider_id', $data['guider_id']);
        $this->db->bind(':available_date', $data['available_date']);
        
        // Execute
        return $this->db->execute();
    }
    
    // Delete a booking
    public function deleteBookingById($id) {
        $this->db->query("DELETE FROM guider_booking WHERE booking_id = :booking_id");
        $this->db->bind(':booking_id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    // Update the profile of the guide
    public function updateProfile($data) {
        $this->db->query('UPDATE tour_guide SET first_name = :first_name, last_name = :last_name, email = :email, phone_number = :phone_number WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone_number', $data['phone_number']);
        
        return $this->db->execute();
    }
    
    // Get all bookings for a guider with traveler details
    public function getGuiderBookings($guider_id) {
        $this->db->query('
            SELECT 
                gb.booking_id, 
                gb.check_in, 
                gb.check_out, 
                gb.amount, 
                gb.pickup,
                gb.destination,
                gb.status, 
                t.name AS traveler_name, 
                t.email AS traveler_email, 
                t.telephone_number AS traveler_phone
            FROM guider_booking gb
            JOIN traveler t ON gb.traveler_id = t.traveler_id
            WHERE gb.guider_id = :guider_id
            ORDER BY gb.check_in DESC
        ');
        $this->db->bind(':guider_id', $guider_id);
        return $this->db->resultSet();
    }
    
    // Get the bookings count of the guider
    public function getGuiderBookingsCount($guider_id) {
        $this->db->query('SELECT COUNT(*) as number_of_bookings FROM guider_booking WHERE guider_id = :guider_id');
        $this->db->bind(':guider_id', $guider_id);
        $row = $this->db->single();
        return $row->number_of_bookings;
    }
    
    // Get the guider
    public function getGuider() {
        $this->db->query("SELECT * FROM tour_guides");
        return $this->db->resultSet();
    }

    //get all guiders
    public function getAllGuiders() {
        $this->db->query("SELECT * FROM tour_guides");
        return $this->db->resultSet();
    }


    //get bookings by guider id
    public function getBookingsByGuiderId($guider_id) {
        $this->db->query("SELECT * FROM guider_booking WHERE guider_id = :guider_id");
        $this->db->bind(':guider_id', $guider_id);
        return $this->db->resultSet();
    }


    public function getUnavailable($guider_id){
        $this->db->query("SELECT available_date from guiders_availability WHERE guider_id= :guider_id");
        $this->db->bind('guider_id',$guider_id);
        return $this->db->resultSet();
    }




    public function getBankDetails($userId) {
        try {
            // Get the total wallet balance
            $walletBalanceSQL = "SELECT SUM(wallet_balance) as total_wallet_balance 
                               FROM guider_wallet 
                               WHERE provider_id = ?";
            $this->db->query($walletBalanceSQL);
            $this->db->bind(1, $userId);
            $walletBalance = $this->db->single();
            
            // Get provider earnings and penalty amount from tour_guides table
            $providerSQL = "SELECT earnings, penalty_amount FROM tour_guides WHERE id = ?";
            $this->db->query($providerSQL);
            $this->db->bind(1, $userId);
            $providerData = $this->db->single();
            $earnings = $providerData ? $providerData->earnings : 0;
            $penaltyAmount = $providerData ? $providerData->penalty_amount : 0;
            
            // Calculate net wallet balance (wallet balance minus earnings)
            $netWalletBalance = ($walletBalance ? $walletBalance->total_wallet_balance : 0) - $earnings;
            
            // Get the total holding amount
            $holdingAmountSQL = "SELECT SUM(holding_amount) as total_holding_amount 
                               FROM guider_wallet 
                               WHERE provider_id = ?";
            $this->db->query($holdingAmountSQL);
            $this->db->bind(1, $userId);
            $holdingAmount = $this->db->single();
            
            // Get all wallet transactions for this provider
            $transactionsSQL = "SELECT 
                               id, provider_id, traveler_id, holding_amount,
                               wallet_balance, transaction_type, related_booking_id,
                               transaction_date
                              FROM guider_wallet
                              WHERE provider_id = ?
                              ORDER BY transaction_date DESC";
                               
            $this->db->query($transactionsSQL);
            $this->db->bind(1, $userId);
            $transactions = $this->db->resultSet();
            
            // Get withdrawal transaction history
            $withdrawalTransactions = $this->getTransactionHistory($userId);
            
            // Get count of pending transactions (with holding amounts)
            $pendingCountSQL = "SELECT COUNT(*) as pending_count 
                              FROM guider_wallet 
                              WHERE provider_id = ? AND holding_amount > 0";
            $this->db->query($pendingCountSQL);
            $this->db->bind(1, $userId);
            $pendingCount = $this->db->single();
            
            // Count penalty transactions
            $penaltyTransactionsCount = $penaltyAmount > 0 ? 1 : 0;
            
            // Return all the data
            return [
                'wallet_balance' => $netWalletBalance,
                'total_holding_amount' => $holdingAmount ? $holdingAmount->total_holding_amount : 0,
                'earnings' => $earnings,
                'penalty_amount' => $penaltyAmount,
                'penalty_transactions_count' => $penaltyTransactionsCount,
                'pending_transactions' => $pendingCount ? $pendingCount->pending_count : 0,
                'transactions' => $transactions,
                'withdrawal_transactions' => $withdrawalTransactions
            ];
        } catch (Exception $e) {
            error_log($e->getMessage());
            return [
                'wallet_balance' => 0,
                'total_holding_amount' => 0,
                'earnings' => 0,
                'penalty_amount' => 0,
                'penalty_transactions_count' => 0,
                'pending_transactions' => 0,
                'transactions' => [],
                'withdrawal_transactions' => []
            ];
        }
    }

    private function createGuiderTransactionTable() {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS guider_transaction_acc (
                transaction_id INT AUTO_INCREMENT PRIMARY KEY,
                provider_id INT NOT NULL,
                amount DECIMAL(10,2) NOT NULL,
                transaction_type VARCHAR(50) NOT NULL,
                bank_name VARCHAR(100) NOT NULL,
                account_number VARCHAR(50) NOT NULL,
                account_name VARCHAR(100) NOT NULL,
                branch VARCHAR(100) NOT NULL,
                withdrawal_method VARCHAR(50) NOT NULL,
                transaction_date DATETIME NOT NULL,
                status VARCHAR(20) NOT NULL DEFAULT 'Completed'
            )";
            
            $this->db->query($sql);
            return $this->db->execute();
        } catch (Exception $e) {
            error_log("Failed to create transaction_acc table: " . $e->getMessage());
            return false;
        }
    }

    // Get transaction history for a provider
    public function getTransactionHistory($providerId) {
        try {
            // Ensure table exists
            $this->createGuiderTransactionTable();
            
            $sql = "SELECT * FROM guider_transaction_acc 
                    WHERE provider_id = ? 
                    ORDER BY transaction_date DESC";
                    
            $this->db->query($sql);
            $this->db->bind(1, $providerId);
            
            return $this->db->resultSet();
        } catch (Exception $e) {
            error_log("Failed to get transaction history: " . $e->getMessage());
            return [];
        }
    }


    public function processWithdrawal($userId, $amount, $bankDetails) {
        try {
            // First check if user has enough balance
            $currentBalanceSQL = "SELECT SUM(wallet_balance) as total_wallet_balance 
                                 FROM guider_wallet 
                                 WHERE provider_id = ?";
            $this->db->query($currentBalanceSQL);
            $this->db->bind(1, $userId);
            $walletBalance = $this->db->single();
            
            $currentBalance = $walletBalance ? $walletBalance->total_wallet_balance : 0;
            
            if ($currentBalance < $amount) {
                return [
                    'success' => false,
                    'message' => 'Insufficient funds. Your available balance is Rs. ' . number_format($currentBalance, 2)
                ];
            }
            
            // Get current earnings
            $currentEarningsSQL = "SELECT earnings FROM tour_guides WHERE id = ?";
            $this->db->query($currentEarningsSQL);
            $this->db->bind(1, $userId);
            $earningsResult = $this->db->single();
            $currentEarnings = $earningsResult ? $earningsResult->earnings : 0;
            
            // Update earnings in tour_guides table - ONLY update this table
            $updateEarningsSQL = "UPDATE tour_guides SET earnings = earnings + ? WHERE id = ?";
            $this->db->query($updateEarningsSQL);
            $this->db->bind(1, $amount);
            $this->db->bind(2, $userId);
            $updateSuccess = $this->db->execute();
            
            if (!$updateSuccess) {
                return [
                    'success' => false,
                    'message' => 'Failed to update earnings. Please try again.'
                ];
            }
            
            // Ensure transaction_acc table exists
            $this->createGuiderTransactionTable();
            
            // Store transaction details
            $insertTransactionSQL = "INSERT INTO guider_transaction_acc (
                provider_id, amount, transaction_type, bank_name, 
                account_number, account_name, branch, withdrawal_method, transaction_date
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $this->db->query($insertTransactionSQL);
            $this->db->bind(1, $userId);
            $this->db->bind(2, $amount);
            $this->db->bind(3, 'Withdrawal');
            $this->db->bind(4, $bankDetails['bank_name']);
            $this->db->bind(5, $bankDetails['account_number']);
            $this->db->bind(6, $bankDetails['account_name']);
            $this->db->bind(7, $bankDetails['branch']);
            $this->db->bind(8, $bankDetails['method']);
            $this->db->bind(9, date('Y-m-d H:i:s'));
            
            $transactionStored = $this->db->execute();
            
            if (!$transactionStored) {
                // Log error but continue - transaction history is secondary to the actual withdrawal
                error_log("Failed to store withdrawal transaction history for user $userId");
            }
            
            // Calculate new net wallet balance (total wallet balance minus new earnings)
            $newEarnings = $currentEarnings + $amount;
            $newNetWalletBalance = $currentBalance - $newEarnings;
            
            return [
                'success' => true,
                'message' => 'Withdrawal of Rs. ' . number_format($amount, 2) . ' processed successfully',
                'new_balance' => $newNetWalletBalance,
                'new_earnings' => $newEarnings
            ];
            
        } catch (Exception $e) {
            error_log($e->getMessage());
            return [
                'success' => false,
                'message' => 'An error occurred during withdrawal: ' . $e->getMessage()
            ];
        }
    }



    public function getGuiderDetails($id){
        $sql = "SELECT name, phone, email, address, language, years_experience, specializations, services, profile_path 
                FROM tour_guides 
                WHERE id = ?";
        try{
            $this->db->query($sql);
            $this->db->bind(1, $id);
            $result =  $this->db->single(); 
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occurred: $error_msg');</script>";
            return false;
        }
        
    }

    // Get active booking dates (not completed or canceled)
    public function getActiveBookingDates($guider_id) {
        $this->db->query('
            SELECT 
                booking_id, check_in, check_out, status
            FROM guider_booking 
            WHERE guider_id = :guider_id 
            AND status NOT IN ("completed", "cancelled", "canceled")
        ');
        $this->db->bind(':guider_id', $guider_id);
        return $this->db->resultSet();
    }

    // Get count of canceled bookings
    public function getCanceledBookingsCount($guider_id) {
        $this->db->query('SELECT COUNT(*) as canceled_count 
                          FROM guider_booking 
                          WHERE guider_id = :guider_id 
                          AND status IN ("cancelled", "canceled")');
        $this->db->bind(':guider_id', $guider_id);
        $row = $this->db->single();
        return $row->canceled_count;
    }
}



?>
