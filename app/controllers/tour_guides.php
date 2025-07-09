<?php
      class Tour_Guides extends Controller {
      
//creating the guider model
private $guiderModel;

public function __construct() {
    $this->guiderModel = $this->model('M_guider');
}



public function dashboard(){
    if (isset($_SESSION['id'])) {
        $guider_id = $_SESSION['id'];
        
        // Get guider bookings for the table
        $bookings = $this->guiderModel->getGuiderBookings($guider_id);
        
        // Get total bookings count
        $totalBookings = $this->guiderModel->getGuiderBookingsCount($guider_id);
        
        // Get count of canceled bookings
        $canceledBookings = $this->guiderModel->getCanceledBookingsCount($guider_id);
        
        // Get unavailable dates for the calendar
        $unavailableDates = $this->guiderModel->getUnavailable($guider_id);
        $calendarUnavailableDates = [];
        
        if (!empty($unavailableDates)) {
            foreach ($unavailableDates as $date) {
                $calendarUnavailableDates[] = $date->available_date;
            }
        }
        
        // Get active booking dates (not completed or canceled)
        $activeBookings = $this->guiderModel->getActiveBookingDates($guider_id);
        $calendarBookingDates = [];
        
        if (!empty($activeBookings)) {
            foreach ($activeBookings as $booking) {
                // Get dates between check-in and check-out
                $checkIn = new DateTime($booking->check_in);
                $checkOut = new DateTime($booking->check_out);
                $interval = new DateInterval('P1D');
                $dateRange = new DatePeriod($checkIn, $interval, $checkOut);
                
                foreach ($dateRange as $date) {
                    $calendarBookingDates[] = $date->format('Y-m-d');
                }
                // Include checkout date
                $calendarBookingDates[] = $checkOut->format('Y-m-d');
            }
        }
        
        // Get wallet details for earnings
        $walletDetails = $this->guiderModel->getBankDetails($guider_id);
        
        // Prepare data for the view
        $data = [
            'totalBookings' => $totalBookings,
            'canceledBookings' => $canceledBookings,
            'recentBookings' => $bookings,
            'unavailableDates' => $calendarUnavailableDates,
            'bookingDates' => $calendarBookingDates,
            'earnings' => isset($walletDetails['earnings']) ? $walletDetails['earnings'] : 0,
            'walletBalance' => isset($walletDetails['wallet_balance']) ? $walletDetails['wallet_balance'] : 0
        ];
        
        $this->view('tour_guides/Dashboard', $data);
    } else {
        redirect('ServiceProvider');
    }
}

public function mypayments(){
    if (isset($_SESSION['id'])) {
        $userId = $_SESSION['id'];
        $bankDetails = $this->guiderModel->getBankDetails($userId);
        $data = [
            'bankDetails' => $bankDetails
        ];

        $this->view('tour_guides/bankdetails', $data);
    } else {
        redirect('ServiceProvider');
    }
}


public function Bookings() {
    if (isset($_SESSION['id'])) {
        $guider_id = $_SESSION['id'];
        $bookings = $this->guiderModel->getGuiderBookings($guider_id);
        $this->view('tour_guides/Bookings', $bookings);
    } else {
        redirect('ServiceProvider');
    }
}

public function reviews(){
    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/Reviews');
    } else {
        redirect('ServiceProvider');
    }
}

public function notifications(){
    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/Notifications');
    } else {
        redirect('ServiceProvider');
    }
}

public function Update_Availability(){
    if (isset($_SESSION['id'])) {
        $guider_id = $_SESSION['id'];
        $availabilities = $this->guiderModel->getAvailability($guider_id);
        
        $data = $availabilities;
        
        $this->view('tour_guides/Update_Availability', $data);
    } else {
        redirect('ServiceProvider');
    }
}

public function profile(){
    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/Myprofile');
    } else {
        redirect('ServiceProvider');
    }
}

public function addAvailability() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Get current date for validation
        $currentDate = date('Y-m-d');
        
        // Process form
        $data = [
            'guider_id' => $_SESSION['id'],
            'available_date' => trim($_POST['available_date']),
            'available_time_from' => trim($_POST['available_time_from']),
            'available_time_to' => trim($_POST['available_time_to']),
            'charges_per_hour' => trim($_POST['charges_per_hour']),
            'location' => trim($_POST['location']),
            'reason' => trim($_POST['reason'] ?? ''),
            'date_err' => '',
            'time_err' => '',
            'charges_err' => '',
            'location_err' => '',
            'reason_err' => ''
        ];
        
        // Validate date
        if (empty($data['available_date'])) {
            $data['date_err'] = 'Please select a date';
        } elseif ($data['available_date'] < $currentDate) {
            $data['date_err'] = 'Date cannot be in the past';
        }
        
        // Validate reason (this is the only visible field now)
        if (empty($data['reason'])) {
            $data['reason_err'] = 'Please provide a reason for unavailability';
        }
        
        // Skip detailed validation for hidden fields with default values
        // Just check if they exist, not their specific values
        if (empty($data['available_time_from'])) {
            $data['time_err'] = 'Time from is missing';
        }
        
        if (empty($data['available_time_to'])) {
            $data['time_err'] = 'Time to is missing';
        }
        
        if (empty($data['charges_per_hour'])) {
            $data['charges_err'] = 'Charges are missing';
        }
        
        if (empty($data['location'])) {
            $data['location_err'] = 'Location is missing';
        }
        
        // Make sure no errors
        if (empty($data['date_err']) && empty($data['time_err']) && 
            empty($data['charges_err']) && empty($data['location_err']) && 
            empty($data['reason_err'])) {
            // Validated
            if ($this->guiderModel->addAvailability($data)) {
                // Redirect with success message
                redirect('Tour_Guides/Update_Availability?success=' . urlencode('Date marked as unavailable successfully'));
            } else {
                // Redirect with error message
                redirect('Tour_Guides/Update_Availability?error=' . urlencode('Something went wrong, please try again'));
            }
        } else {
            // Load view with errors
            $error_message = '';
            if (!empty($data['date_err'])) $error_message .= $data['date_err'] . ' ';
            if (!empty($data['time_err'])) $error_message .= $data['time_err'] . ' ';
            if (!empty($data['charges_err'])) $error_message .= $data['charges_err'] . ' ';
            if (!empty($data['location_err'])) $error_message .= $data['location_err'] . ' ';
            if (!empty($data['reason_err'])) $error_message .= $data['reason_err'] . ' ';
            
            redirect('Tour_Guides/Update_Availability?error=' . urlencode($error_message));
        }
    } else {
        redirect('Tour_Guides/Update_Availability');
    }
}

public function editAvailability() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Process form
        $data = [
            'guider_id' => $_SESSION['id'],
            'available_date' => trim($_POST['available_date']),
            'available_time_from' => trim($_POST['available_time_from']),
            'available_time_to' => trim($_POST['available_time_to']),
            'charges_per_hour' => trim($_POST['charges_per_hour']),
            'location' => trim($_POST['location']),
            'reason' => trim($_POST['reason'] ?? ''),
            'date_err' => '',
            'reason_err' => ''
        ];

        // Validate date
        if (empty($data['available_date'])) {
            $data['date_err'] = 'Please select a date';
        }

        // Validate reason
        if (empty($data['reason'])) {
            $data['reason_err'] = 'Please provide a reason for unavailability';
        }

        // Make sure no errors
        if (empty($data['date_err']) && empty($data['reason_err'])) {
            // Validated
            if ($this->guiderModel->editAvailability($data)) {
                redirect('Tour_Guides/Update_Availability?success=' . urlencode('Unavailability updated successfully'));
            } else {
                redirect('Tour_Guides/Update_Availability?error=' . urlencode('Something went wrong, please try again'));
            }
        } else {
            // Redirect with error message
            $error_message = $data['date_err'] . ' ' . $data['reason_err'];
            redirect('Tour_Guides/Update_Availability?error=' . urlencode($error_message));
        }
    } else {
        redirect('Tour_Guides/Update_Availability');
    }
}

public function deleteAvailability() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get guider_id and available_date
        $data = [
            'guider_id' => $_SESSION['id'],
            'available_date' => trim($_POST['available_date'])
        ];

        // Attempt to delete the availability
        if ($this->guiderModel->deleteGuiderAvailability($data)) {
            redirect('Tour_Guides/Update_Availability?success=' . urlencode('Availability deleted successfully'));
        } else {
            redirect('Tour_Guides/Update_Availability?error=' . urlencode('Something went wrong, please try again'));
        }
    } else {
        redirect('Tour_Guides/Update_Availability');
    }
}

//delete the booking by id
public function deleteBooking($id){
    if($this->guiderModel->deleteBookingById($id)){
        redirect('Tour_Guides/Bookings');
    }else{
        die('Something went wrong');
    }
}

// Cancel booking with possible penalty
public function cancelBooking($id){
    if (!isset($_SESSION['id'])) {
        redirect('ServiceProvider');
        return;
    }
    
    $guider_id = $_SESSION['id'];
    
    // Get booking details
    $booking = $this->guiderModel->getBookingById($id);
    
    if (!$booking) {
        // Booking not found
        $_SESSION['booking_error'] = 'Booking not found';
        redirect('Tour_Guides/Bookings');
        return;
    }
    
    if ($booking->guider_id != $guider_id) {
        // Not authorized to cancel this booking
        $_SESSION['booking_error'] = 'You are not authorized to cancel this booking';
        redirect('Tour_Guides/Bookings');
        return;
    }
    
    // Check if booking is already cancelled
    if (strtolower($booking->status) == 'cancelled' || strtolower($booking->status) == 'canceled') {
        $_SESSION['booking_error'] = 'This booking has already been cancelled';
        redirect('Tour_Guides/Bookings');
        return;
    }
    
    // Calculate if penalty applies (within 3 days of check-in)
    $checkIn = new DateTime($booking->check_in);
    $today = new DateTime();
    $isPenaltyApplicable = ($checkIn->diff($today)->days <= 3);
    
    // Calculate penalty amount (20% of booking amount if applicable)
    $penaltyAmount = $isPenaltyApplicable ? ($booking->amount * 0.2) : 0;
    
    // Process cancellation with appropriate penalty
    if ($this->guiderModel->cancelBooking($id, $guider_id, $penaltyAmount)) {
        // Success
        if ($isPenaltyApplicable) {
            $_SESSION['booking_success'] = 'Booking cancelled successfully. A 20% penalty (Rs. ' . number_format($penaltyAmount, 2) . ') has been applied to your account. We have fully refunded the amount of Rs. ' . number_format($booking->amount, 2) . ' to the traveler.';
        } else {
            $_SESSION['booking_success'] = 'Booking cancelled successfully. We have fully refunded the amount of Rs. ' . number_format($booking->amount, 2) . ' to the traveler.';
        }
        redirect('Tour_Guides/Bookings');
    } else {
        // Error
        $_SESSION['booking_error'] = 'Something went wrong while cancelling the booking';
        redirect('Tour_Guides/Bookings');
    }
}

//get the total number of bookings
public function getNumberOfBookings(){
    $guider_id = $_SESSION['id'];
    $bookings = $this->guiderModel->getBookings($guider_id);
    $this->view('tour_guides/Dashboard', $bookings);
}


public function processWithdrawal() {
    if (!isset($_SESSION['id'])) {
        echo json_encode([
            'success' => false, 
            'message' => 'Not authorized'
        ]);
        return;
    }
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode([
            'success' => false, 
            'message' => 'Invalid request method'
        ]);
        return;
    }
    
    // Validate input
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
    
    // Check minimum withdrawal amount
    if ($amount < 1000) {
        echo json_encode([
            'success' => false, 
            'message' => 'Minimum withdrawal amount is Rs. 1,000'
        ]);
        return;
    }
    
    if ($amount <= 0) {
        echo json_encode([
            'success' => false, 
            'message' => 'Please enter a valid withdrawal amount'
        ]);
        return;
    }
    
    // Gather bank details
    $bankDetails = [
        'method' => $_POST['withdrawal_method'] ?? 'Bank Transfer',
        'bank_name' => $_POST['bank_name'] ?? '',
        'account_number' => $_POST['account_number'] ?? '',
        'account_name' => $_POST['account_name'] ?? '',
        'branch' => $_POST['branch'] ?? '',
        'withdrawal_date' => date('Y-m-d H:i:s')
    ];
    
    // Process the withdrawal
    $result = $this->guiderModel->processWithdrawal($_SESSION['id'], $amount, $bankDetails);
    
    // Return JSON response
    echo json_encode($result);
}

public function downloadTransactionReport() {
    if (!isset($_SESSION['id'])) {
        redirect('ServiceProvider/login');
        return;
    }
    
    $userId = $_SESSION['id'];
    
    // Get transaction history from model
    $transactions = $this->guiderModel->getTransactionHistory($userId);
    $bankDetails = $this->guiderModel->getBankDetails($userId);
    $walletTransactions = $bankDetails['transactions'];
    
    $data = [
        'transactions' => $transactions,
        'wallet_transactions' => $walletTransactions,
        'wallet_balance' => $bankDetails['wallet_balance'],
        'holding_amount' => $bankDetails['total_holding_amount'],
        'earnings' => $bankDetails['earnings'],
        'report_date' => date('F d, Y')
    ];
    
    // Load the transaction report view
    $this->view('tour_guides/transaction_report', $data);
}

public function getGuiderDetails(){
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    

    if (!$data || !isset($data['guiderId'])) {
        http_response_code(400);
        echo json_encode(['message' => 'Missing required data.']);
        return;
    }

  
    $guiderDetails = $this->guiderModel->getGuiderDetails($data['guiderId']);
    if ($guiderDetails) {
        echo json_encode(['success' => true, 'guider' => $guiderDetails]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Guider not found.']);
    }
}

        public function saveGuiderBooking()
        {
            // Read the raw POST body
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);

            if (!$data || !isset($data['guiderId']) || !isset($data['pickupLocation']) || !isset($data['destination'])) {
                http_response_code(400);
                echo json_encode(['message' => 'Missing required data.']);
                return;
            }
            // Sanitize input
            $guiderId = htmlspecialchars($data['guiderId']);
            $pickupLocation = htmlspecialchars($data['pickupLocation']);
            $destination = htmlspecialchars($data['destination']);

            // Save to session
            $_SESSION['guider_booking'] = [
                'guiderId' => $guiderId,
                'pickupLocation' => $pickupLocation,
                'destination' => $destination,
            ];

            // Response
            echo json_encode([
                'message' => 'Guider booking saved to session successfully!',
                'savedData' => $_SESSION['guider_booking']
            ]);
        }
    }


?>