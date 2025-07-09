<?php

class M_accomadation {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addProperty($data) {
        try {
            // Insert property data into the main properties table
            $query = ('INSERT INTO properties(postal_code,city,property_name,property_type,address,service_provider_id,latitude,
            longitude,single_bedrooms,double_bedrooms,living_rooms,singleprice,doubleprice,familyprice,livingprice,family_rooms,max_occupants,
            bathrooms,children_allowed,offers_ctos,apartment_size,air_conditioning,heating,
            free_wifi,ev_charging,kitchen,kitchenette,washing_machine,flat_screen_tv,
            swimming_pool,hot_tub,minibar,sauna,smoking_allowed,parties_allowed,pets_allowed,check_in_from,
            check_in_until,check_out_from,check_out_until,balcony,garden_view,terrace,view, other_details,image_path ) 
            VALUES (:postal_code, :city, :property_name, :property_type, :address, :service_provider_id, 
            :latitude, :longitude, :single_bedrooms, :double_bedrooms, :living_rooms, :singleprice, :doubleprice, :familyprice, :livingprice, :family_rooms, 
            :max_occupants, :bathrooms, :children_allowed, :offers_ctos, :apartment_size, :air_conditioning, 
            :heating, :free_wifi, :ev_charging, :kitchen, :kitchenette, :washing_machine, :flat_screen_tv, 
            :swimming_pool, :hot_tub, :minibar, :sauna, :smoking_allowed, :parties_allowed, :pets_allowed, 
            :check_in_from, :check_in_until, :check_out_from, :check_out_until, :balcony, :garden_view, 
            :terrace, :view, :other_details, :image_path)');
            $this->db->query($query);

            // Bind values
            $this->db->bind(':postal_code', $data['postalCode']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':property_type', $data['type']);
            $this->db->bind(':property_name', $data['name']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':service_provider_id', $data['id']);
            $this->db->bind(':latitude', $data['latitude']);
            $this->db->bind(':longitude', $data['longitude']);
            $this->db->bind(':single_bedrooms', $data['single']);
            $this->db->bind(':singleprice', $data['singleprice']);
            $this->db->bind(':double_bedrooms', $data['double']);
            $this->db->bind(':doubleprice', $data['doubleprice']);
            $this->db->bind(':living_rooms', $data['living']);
            $this->db->bind(':livingprice', $data['livingprice']);
            $this->db->bind(':family_rooms', $data['family']);
            $this->db->bind(':familyprice', $data['familyprice']);
            $this->db->bind(':max_occupants', $data['guests']);
            $this->db->bind(':bathrooms', $data['bathrooms']);
            $this->db->bind(':children_allowed', $data['children']);
            $this->db->bind(':offers_ctos', $data['cots']);
            $this->db->bind(':apartment_size', $data['apartment_size']);
            $this->db->bind(':air_conditioning', $data['air_conditioning']);
            $this->db->bind(':heating', $data['heating']);
            $this->db->bind(':free_wifi', $data['wifi']);
            $this->db->bind(':ev_charging', $data['ev_charging']);
            $this->db->bind(':kitchen', $data['kitchen']);
            $this->db->bind(':kitchenette', $data['kitchenette']);
            $this->db->bind(':air_conditioning',$data['air_conditioning']);
            $this->db->bind(':heating',$data['heating']);
            $this->db->bind(':free_wifi',$data['wifi']);
            $this->db->bind(':ev_charging',$data['ev_charging']);
            $this->db->bind(':kitchen',$data['kitchen']);
            $this->db->bind(':kitchenette',$data['kitchenette']);
            $this->db->bind(':washing_machine',$data['washing_machine']);
            $this->db->bind(':flat_screen_tv',$data['tv']);
            $this->db->bind(':swimming_pool',$data['swimming_pool']);
            $this->db->bind(':hot_tub',$data['hot_tub']);
            $this->db->bind(':minibar',$data['minibar']);
            $this->db->bind(':sauna',$data['sauna']);
            $this->db->bind(':smoking_allowed',$data['smoking']);
            $this->db->bind(':parties_allowed',$data['parties']);
            $this->db->bind(':pets_allowed',$data['pets']);
            $this->db->bind(':check_in_from',$data['checkin_from']);
            $this->db->bind(':check_in_until',$data['checkin_until']);
            $this->db->bind(':check_out_from',$data['checkout_from']);
            $this->db->bind(':check_out_until',$data['checkout_until']);
            $this->db->bind(':balcony',$data['balcony']);
            $this->db->bind(':garden_view',$data['garden_view']);
            $this->db->bind(':terrace',$data['terrace']);
            $this->db->bind(':view',$data['view']);
            $this->db->bind(':other_details',$data['other_details']);
            $this->db->bind(':image_path',$data['imageUrls']);

            // Execute the query
            if ($this->db->execute()) {
                // Get the last inserted ID using a standard SQL query
                $this->db->query("SELECT LAST_INSERT_ID() as id");

               
                $result = $this->db->single();
                
                return $result->id;
            } else {
                // Return detailed error
                return ['error' => 'Database insertion failed. Please check your input data.'];
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            
            // Determine a user-friendly error message based on the exception
            $errorMessage = 'Database error occurred';
            
            // Check for specific error types
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                $errorMessage = 'This property already exists in the database.';
            } elseif (strpos($e->getMessage(), 'Data too long') !== false) {
                $errorMessage = 'Some input data exceeds the maximum allowed length.';
            } elseif (strpos($e->getMessage(), 'Cannot add or update a child row') !== false) {
                $errorMessage = 'Invalid reference data. Please check your inputs.';
            }
            
            return ['error' => $errorMessage];
        }
    }

    public function addPropertyImage($propertyId, $imagePath) {
        try {
            // Insert into property_images table
            $sql = "INSERT INTO property_images (property_id, image_path) VALUES (?, ?)";
            $this->db->query($sql);
            $this->db->bind(1, $propertyId);
            $this->db->bind(2, $imagePath);
            
            if ($this->db->execute()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
    public function deleteProperty($propertyId) {
        try {
            // Check for existing bookings with check_out date today or in the future
            $sql = "SELECT * FROM property_booking WHERE property_id = ? AND check_out >= CURDATE()";
            $this->db->query($sql);
            $this->db->bind(1, $propertyId);
            $existingBookings = $this->db->resultSet();
    
            if (!empty($existingBookings)) {
                // If there are existing bookings, do not allow deletion
                echo "<script>alert('Cannot delete property with existing bookings.');</script>";
                return false;
            }
    
            // If no existing bookings, proceed with deletion
            $sql = "DELETE FROM properties WHERE property_id = ?";
            $this->db->query($sql);
            $this->db->bind(1, $propertyId);
            $this->db->execute();
    
            return true;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return false;
        }
    }    
        
    

    //get the accomadation from the database with respect to the accomadation supplier
    public function getAccomadation($userId) {
        try {
            $sql = "SELECT * FROM properties WHERE service_provider_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $accomadation = $this->db->resultSet();

            return $accomadation;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

    public function viewdetails($property_id){
        try {
            $sql = "SELECT * FROM properties WHERE property_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $property_id);

            $result= $this->db->single();

            return $result;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }


    //get the bookings from the property_booking table to the related service provider
    public function getBookings($userId) {
        try {
            $sql = "SELECT pb.*, t.name as traveler_name, p.property_name, p.property_type
                FROM property_booking pb
                JOIN traveler t ON pb.traveler_id = t.traveler_id
                JOIN properties p ON pb.property_id = p.property_id
                WHERE pb.supplier_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $bookings = $this->db->resultSet();

            return $bookings;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

    public function getTotalBookings($userId) {
        try {
            $sql = "SELECT COUNT(*) as total_bookings FROM property_booking WHERE supplier_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $totalBookings = $this->db->single();

            return $totalBookings;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

    //get the last theree bookings by the checking check_in and check_out dates
    public function getRecentBookings($userId) {
        try {
            $sql = "SELECT pb.*, p.property_name, t.name as traveler_name 
                    FROM property_booking pb
                    JOIN properties p ON pb.property_id = p.property_id
                    JOIN traveler t ON pb.traveler_id = t.traveler_id
                    WHERE pb.supplier_id = ? 
                    ORDER BY pb.check_in DESC 
                    LIMIT 5";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $lastThreeBookings = $this->db->resultSet();

 // Debugging line to check the result

            return $lastThreeBookings;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }


    public function getTotalAccomadation($userId) {
        try {
            $sql = "SELECT COUNT(*) as total_accomadation FROM properties WHERE service_provider_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $totalAccomadation = $this->db->single();

          

            return $totalAccomadation;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

    //get the Payments from the property_booking table to the related service provider

    public function getPayments($userId) {
        try {
            $sql = "SELECT p.*, t.name as traveler_name, pr.property_name
            FROM property_booking p
            JOIN traveler t ON p.traveler_id = t.traveler_id
            JOIN properties pr ON p.property_id = pr.property_id
            WHERE p.supplier_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $payments = $this->db->resultSet();

            return $payments;

        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

    public function releaseHoldingAmount() {
        $currentDate = date('Y-m-d 10:59:59');
        $this->db->query("SELECT * FROM property_booking WHERE status = 'Pending' AND check_in <= :current_date");
        $this->db->bind(':current_date', $currentDate);
        $bookings = $this->db->resultSet();

        foreach ($bookings as $booking) {
            $this->db->query("UPDATE accomadation_wallet SET wallet_balance = wallet_balance + holding_amount, holding_amount = 0 WHERE provider_id = :provider_id");
            $this->db->bind(':provider_id', $booking['supplier_id']);
            $this->db->execute();

            $this->db->query("UPDATE property_booking SET status = 'Confirmed' WHERE booking_id = :id");
            $this->db->bind(':id', $booking['booking_id']);
            $this->db->execute();
        }
    }

    public function createReleaseHoldingAmountEvent() {
        $this->db->query("
            CREATE EVENT IF NOT EXISTS release_holding_amount_event
            ON SCHEDULE EVERY 1 DAY
            STARTS CURRENT_DATE + INTERVAL 10 HOUR
            DO
            BEGIN
                DECLARE current_date DATETIME;
                SET current_date = NOW();
                
                UPDATE accomadation_wallet aw
                JOIN property_booking pb ON aw.provider_id = pb.supplier_id
                SET aw.wallet_balance = aw.wallet_balance + aw.holding_amount, 
                    aw.holding_amount = 0,
                    pb.status = 'Confirmed'
                WHERE pb.status = 'Pending' AND pb.check_in <= current_date;
            END
        ");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getBookingDates($userId) {
        try {
            $sql = "SELECT check_in, check_out FROM property_booking WHERE supplier_id = ?";
            $this->db->query($sql);
            $this->db->bind(1, $userId);
            $bookings = $this->db->resultSet();

            $dates = [];
            foreach ($bookings as $booking) {
                $start = new DateTime($booking->check_in);
                $end = new DateTime($booking->check_out);
                while ($start <= $end) {
                    $dates[] = $start->format('Y-m-d');
                    $start->modify('+1 day');
                }
            }
            return $dates;
        } catch (Exception $e) {
            error_log($e->getMessage());

        }

    }

    public function updateProperty($data) {
        try {
            $this->db->query('UPDATE properties SET 
                property_name = :property_name,
                singleprice = :singleprice,
                doubleprice = :doubleprice,
                livingprice = :livingprice,
                familyprice = :familyprice,
                max_occupants = :max_occupants,
                children_allowed = :children_allowed,
                offers_ctos = :offers_ctos,
                air_conditioning = :air_conditioning,
                heating = :heating,
                free_wifi = :free_wifi,
                ev_charging = :ev_charging,
                kitchen = :kitchen,
                kitchenette = :kitchenette,
                washing_machine = :washing_machine,
                flat_screen_tv = :flat_screen_tv,
                swimming_pool = :swimming_pool,
                hot_tub = :hot_tub,
                minibar = :minibar,
                sauna = :sauna,
                smoking_allowed = :smoking_allowed,
                parties_allowed = :parties_allowed,
                pets_allowed = :pets_allowed,
                check_in_from = :check_in_from,
                check_in_until = :check_in_until,
                check_out_from = :check_out_from,
                check_out_until = :check_out_until,
                balcony = :balcony,
                garden_view = :garden_view,
                terrace = :terrace,
                view = :view,
                other_details = :other_details
            WHERE property_id = :property_id');

            // Bind values
            $this->db->bind(':property_id', $data['property_id']);
            $this->db->bind(':property_name', $data['property_name']);
            $this->db->bind(':singleprice', $data['singleprice']);
            $this->db->bind(':doubleprice', $data['doubleprice']);
            $this->db->bind(':livingprice', $data['livingprice']);
            $this->db->bind(':familyprice', $data['familyprice']);
            $this->db->bind(':max_occupants', $data['max_occupants']);
            $this->db->bind(':children_allowed', $data['children_allowed']);
            $this->db->bind(':offers_ctos', $data['offers_ctos']);
            $this->db->bind(':air_conditioning', $data['air_conditioning']);
            $this->db->bind(':heating', $data['heating']);
            $this->db->bind(':free_wifi', $data['free_wifi']);
            $this->db->bind(':ev_charging', $data['ev_charging']);
            $this->db->bind(':kitchen', $data['kitchen']);
            $this->db->bind(':kitchenette', $data['kitchenette']);
            $this->db->bind(':washing_machine', $data['washing_machine']);
            $this->db->bind(':flat_screen_tv', $data['flat_screen_tv']);
            $this->db->bind(':swimming_pool', $data['swimming_pool']);
            $this->db->bind(':hot_tub', $data['hot_tub']);
            $this->db->bind(':minibar', $data['minibar']);
            $this->db->bind(':sauna', $data['sauna']);
            $this->db->bind(':smoking_allowed', $data['smoking_allowed']);
            $this->db->bind(':parties_allowed', $data['parties_allowed']);
            $this->db->bind(':pets_allowed', $data['pets_allowed']);
            $this->db->bind(':check_in_from', $data['check_in_from']);
            $this->db->bind(':check_in_until', $data['check_in_until']);
            $this->db->bind(':check_out_from', $data['check_out_from']);
            $this->db->bind(':check_out_until', $data['check_out_until']);
            $this->db->bind(':balcony', $data['balcony']);
            $this->db->bind(':garden_view', $data['garden_view']);
            $this->db->bind(':terrace', $data['terrace']);
            $this->db->bind(':view', $data['view']);
            $this->db->bind(':other_details', $data['other_details']);

            // Execute the query
            $this->db->execute();

            return true;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    // Method to create transaction_acc table if it doesn't exist
    private function createTransactionTable() {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS transaction_acc (
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
            $this->createTransactionTable();
            
            $sql = "SELECT * FROM transaction_acc 
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

    public function getBankDetails($userId) {
        try {
            // Get the total wallet balance
            $walletBalanceSQL = "SELECT SUM(wallet_balance) as total_wallet_balance 
                               FROM accomadation_wallet 
                               WHERE provider_id = ?";
            $this->db->query($walletBalanceSQL);
            $this->db->bind(1, $userId);
            $walletBalance = $this->db->single();
            
            // Get provider earnings and penalty amount from accomadation table
            $providerSQL = "SELECT earnings, penalty_amount FROM accomadation WHERE id = ?";
            $this->db->query($providerSQL);
            $this->db->bind(1, $userId);
            $providerData = $this->db->single();
            $earnings = $providerData ? $providerData->earnings : 0;
            $penaltyAmount = $providerData ? $providerData->penalty_amount : 0;
            
            // Calculate net wallet balance (wallet balance minus earnings)
            $netWalletBalance = ($walletBalance ? $walletBalance->total_wallet_balance : 0) - $earnings;
            
            // Get the total holding amount
            $holdingAmountSQL = "SELECT SUM(holding_amount) as total_holding_amount 
                               FROM accomadation_wallet 
                               WHERE provider_id = ?";
            $this->db->query($holdingAmountSQL);
            $this->db->bind(1, $userId);
            $holdingAmount = $this->db->single();
            
            // Get all wallet transactions for this provider
            $transactionsSQL = "SELECT 
                               id, provider_id, traveler_id, holding_amount,
                               wallet_balance, transaction_type, related_booking_id,
                               transaction_date
                              FROM accomadation_wallet
                              WHERE provider_id = ?
                              ORDER BY transaction_date DESC";
                               
            $this->db->query($transactionsSQL);
            $this->db->bind(1, $userId);
            $transactions = $this->db->resultSet();
            
            // Get withdrawal transaction history
            $withdrawalTransactions = $this->getTransactionHistory($userId);
            
            // Get count of pending transactions (with holding amounts)
            $pendingCountSQL = "SELECT COUNT(*) as pending_count 
                              FROM accomadation_wallet 
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

    public function processWithdrawal($userId, $amount, $bankDetails) {
        try {
            // First check if user has enough balance
            $currentBalanceSQL = "SELECT SUM(wallet_balance) as total_wallet_balance 
                                 FROM accomadation_wallet 
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
            $currentEarningsSQL = "SELECT earnings FROM accomadation WHERE id = ?";
            $this->db->query($currentEarningsSQL);
            $this->db->bind(1, $userId);
            $earningsResult = $this->db->single();
            $currentEarnings = $earningsResult ? $earningsResult->earnings : 0;
            
            // Update earnings in accomadation table - ONLY update this table
            $updateEarningsSQL = "UPDATE accomadation SET earnings = earnings + ? WHERE id = ?";
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
            $this->createTransactionTable();
            
            // Store transaction details
            $insertTransactionSQL = "INSERT INTO transaction_acc (
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

    public function getPropertyDetailsById($propertyId) {
        // SQL query to fetch property details by ID
        $sql = "SELECT * FROM properties WHERE property_id = ? LIMIT 1";
       
        try {
            $this->db->query($sql);
            $this->db->bind(1, $propertyId);
            $property = $this->db->single();
            return $property;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";    
            return null;
        }
    }

    
    public function getAllAccommodations(){
        $sql = "SELECT * FROM properties";
        try {
            $this->db->query($sql);
            $accommodations = $this->db->resultSet();
            return $accommodations;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }
}

?>