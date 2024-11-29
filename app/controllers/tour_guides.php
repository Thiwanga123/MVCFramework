<?php
      class Tour_Guides extends Controller {
      
//creating the guider model


private $BookingModel;

public function __construct(){
    $this->BookingModel = $this->model('BookingModel');
}



public function dashboard(){
    if (isset($_SESSION['id'])) {

        //get all the number of bookings for the relavent guider
        $guider_id = $_SESSION['id'];
        $number_of_bookings = $this->BookingModel->getGuiderBookings($guider_id);
        //pass the data to the view
        $data = [
            'number_of_bookings' => $number_of_bookings,
        ];
        $this->view('tour_guides/Dashboard', $data);

    } else {
        redirect('ServiceProvider');
    }

}
public function mypayments(){

    if (isset($_SESSION['id'])) {
          $this->view('tour_guides/Mypayments');
    } else {
        redirect('ServiceProvider');
    }

}

public function Bookings(){
    
    if (isset($_SESSION['id'])) {
        //get the data from the bookings table with the relavent guider id
        $guider_id = $_SESSION['id'];
        //get the data from the bookings table with the relavent guider id
        $bookings = $this->BookingModel->getBookings($guider_id);
        //pass the data to the view
        $data=[
            'bookings'=>$bookings,
        ];
        
        $this->view('tour_guides/Bookings',$data);
    } else {
        redirect('ServiceProvider');
    }
    

}

public function logout() {
    //if the user is logged in and
    //they click the logout button, log them out
    if (isset($_SESSION['id'])) {
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        session_destroy();
        redirect('ServiceProvider');
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
        //get the availability information from the database with relavent guider id
        $guider_id = $_SESSION['id'];
        $availability = $this->BookingModel->getAvailability($guider_id);
        //pass the data to the view
        $data=[
            'availability'=>$availability,
        ];


        $this->view('tour_guides/Update_Availability',$data);
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


//delete an availability

public function delete_availability($id){

    if (isset($_SESSION['id'])) {
        $this->BookingModel->deleteGuiderAvailability($id);
        redirect('tour_guides/Update_Availability');
    } else {
        redirect('ServiceProvider');
    }

}

//add an availability

public function Add_Availability(){

    if (isset($_SESSION['id'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //get the data from the form
            $data = [
                'guider_id' => $_SESSION['id'],
                'date' => $_POST['date'],
                'time' => $_POST['time'],
                'charges_per_hour' => $_POST['rate'],
                'location' => $_POST['location'],
            ];
            //add the availability to the database
            $this->BookingModel->addAvailability($data);
            redirect('tour_guides/Update_Availability');
        } else {
            redirect('tour_guides/Update_Availability');
        }
        
    } else {
        redirect('ServiceProvider');
    }

}

//edit the availability
// public function edit_availability($id)
// {
//     if (isset($_SESSION['id'])) {
//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             //get the data from the form
//             $data = [
//                 'guider_id' => $_SESSION['id'],
//                 'id' => $id,
//                 'date' => $_POST['date'],
//                 'time' => $_POST['time'],
//                 'charges_per_hour' => $_POST['rate'],
//                 'location' => $_POST['location'],
//             ];
//             //update the availability
//             $this->BookingModel->editAvailability($data);
//             redirect('tour_guides/Update_Availability');
//         } else {
//             redirect('tour_guides/Update_Availability');
//         }
        
//     } else {
//         redirect('ServiceProvider');
//     }

// }

//update the profile

public function updateprofile(){

    if (isset($_SESSION['id'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //get the data from the form
            $data = [
                'id' => $_SESSION['id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'language' => $_POST['language'],
                'address' => $_POST['address'],
                'password' => $_POST['password'],
            ];
            //update the profile
            $this->BookingModel->updateProfile($data);
            redirect('tour_guides/logout');
        } else {
            redirect('tour_guides/profile');
        }
        
    } else {
        redirect('ServiceProvider');
    }

}

      }