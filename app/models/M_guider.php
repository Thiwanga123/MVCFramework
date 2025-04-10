<?php

require_once __DIR__ . '/../../config/Database.php';

class M_guider {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Retrieve the bookings from the booking table
    public function getBookings() {
        $this->db->query("SELECT COUNT(*) FROM booking");
        return $this->db->resultSet();
    }

    // Delete the booking from the booking table
    public function deleteBooking($id) {
        $this->db->query("DELETE FROM booking WHERE booking_id = :booking_id");
        $this->db->bind(':booking_id', $id);

        return $this->db->execute();
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

    // Get the bookings of the guider
    public function getGuiderBookings($guider_id) {
        $this->db->query('SELECT COUNT(*) as number_of_bookings FROM bookings WHERE id = :guider_id');
        $this->db->bind(':guider_id', $guider_id);

        $row = $this->db->single();
        return $row->number_of_bookings;
    }

    // Get the availability of the guider
    public function getAvailability($guider_id) {
        $this->db->query('SELECT * FROM guider_availability WHERE guider_id = :guider_id');
        $this->db->bind(':guider_id', $guider_id);

        return $this->db->resultSet();
    }

    // Delete a specific availability of the tour guider by ID
    public function deleteGuiderAvailability($id) {
        $this->db->query('DELETE FROM guider_availability WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    // Add the availability of the guider
    public function addAvailability($data) {
        $this->db->query('INSERT INTO guider_availability (guider_id, available_date, charges_per_hour, location, available_time_from, available_time_to) VALUES (:guider_id, :available_date, :charges_per_hour, :location, :available_time_from, :available_time_to)');

        $this->db->bind(':guider_id', $data['guider_id']);
        $this->db->bind(':available_date', $data['available_date']);
        $this->db->bind(':charges_per_hour', $data['charges_per_hour']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':available_time_from', $data['available_time_from']);
        $this->db->bind(':available_time_to', $data['available_time_to']);

        $this->db->execute();
        return $this->db->rowCount() > 0;
    }

    // Edit the availability of the relevant guider
    public function editAvailability($data) {
        $this->db->query('UPDATE guider_availability SET available_date = :available_date, available_time_from = :available_time_from, available_time_to = :available_time_to, charges_per_hour = :charges_per_hour, location = :location WHERE id = :id AND guider_id = :guider_id');

        $this->db->bind(':available_date', $data['available_date']);
        $this->db->bind(':available_time_from', $data['available_time_from']);
        $this->db->bind(':available_time_to', $data['available_time_to']);
        $this->db->bind(':charges_per_hour', $data['charges_per_hour']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':guider_id', $data['guider_id']);

        $this->db->execute();
        return $this->db->rowCount() > 0;
    }

    // Get all guides
    public function getGuider() {
        $this->db->query("SELECT * FROM tour_guides");
        return $this->db->resultSet();
    }

    // Get guides based on location, language, and gender
    public function getGuides($location, $language, $gender) {
        $this->db->query("SELECT * FROM guides WHERE location = :location AND FIND_IN_SET(:language, languages) > 0 AND gender = :gender");
        $this->db->bind(':location', $location);
        $this->db->bind(':language', $language);
        $this->db->bind(':gender', $gender);

        return $this->db->resultSet();
    }
}

       
        

    









