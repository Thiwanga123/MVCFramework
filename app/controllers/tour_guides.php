<?php
      class Tour_Guides extends Controller {
      
//creating the guider model
private $guiderModel;

public function __construct() {
    $this->guiderModel = $this->model('M_guider');
}



public function dashboard(){
    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/Dashboard');
    } else {
        redirect('ServiceProvider');
    }
}

public function mypayments(){
    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/MyPayments');
    } else {
        redirect('ServiceProvider');
    }
}

public function bankDetails(){
    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/bankdetails');
    } else {
        redirect('ServiceProvider');
    }
}

public function Bookings(){
    if (isset($_SESSION['id'])) {
        $this->view('tour_guides/Bookings');
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
        
        // Get current date for validation
        $currentDate = date('Y-m-d');
        
        // Process form
        $data = [
            'id' => trim($_POST['id']),
            'guider_id' => $_SESSION['id'],
            'date' => trim($_POST['available_date']),
            'time_from' => trim($_POST['available_time_from']),
            'time_to' => trim($_POST['available_time_to']),
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
        if (empty($data['date'])) {
            $data['date_err'] = 'Please select a date';
        } elseif ($data['date'] < $currentDate) {
            $data['date_err'] = 'Date cannot be in the past';
        }
        
        // Validate reason (this is the only visible field now)
        if (empty($data['reason'])) {
            $data['reason_err'] = 'Please provide a reason for unavailability';
        }
        
        // Skip detailed validation for hidden fields with default values
        // Just check if they exist, not their specific values
        if (empty($data['time_from'])) {
            $data['time_err'] = 'Time from is missing';
        }
        
        if (empty($data['time_to'])) {
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
            if ($this->guiderModel->editAvailability($data)) {
                // Redirect with success message
                redirect('Tour_Guides/Update_Availability?success=' . urlencode('Unavailability updated successfully'));
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

public function deleteAvailability() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get ID
        $id = trim($_POST['id']);
        
        if ($this->guiderModel->deleteGuiderAvailability($id)) {
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

//get the total number of bookings
public function getNumberOfBookings(){
    $guider_id = $_SESSION['id'];
    $bookings = $this->guiderModel->getBookings($guider_id);
    $this->view('tour_guides/Dashboard', $bookings);
}
}
?>