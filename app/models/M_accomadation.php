<?php

class M_accomadation{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addAccommodation($userId, $name, $price, $type, $location, $description, $quantity) {
        try {
            $sql = "INSERT INTO add_accomadation (user_id, name, price, type, location, description,quantity) 
                    VALUES (?, ?, ?, ?, ?, ?,?)";

            $this->db->query($sql);
            $this->db->bind(1, $userId);
            $this->db->bind(2, $name);
            $this->db->bind(3, $price);
            $this->db->bind(4, $type);
            $this->db->bind(5, $location);
            $this->db->bind(6, $description);
            $this->db->bind(7, $quantity);

            if ($this->db->execute()) {
                // Return the inserted accommodation ID
                return true;
            } else {
                throw new Exception("Error inserting accommodation.");
            }
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return false;
        }
    }

    // Add accommodation image
    public function addAccommodationImage($userId, $accommodationId, $imagePath) {
        try {
            $sql = "INSERT INTO accommodation_images (user_id, accommodation_id, image_path) 
                    VALUES (?, ?, ?)";

            $this->db->query($sql);
            $this->db->bind(1, $userId);
            $this->db->bind(2, $accommodationId);
            $this->db->bind(3, $imagePath);

            if ($this->db->execute()) {
                return true;
            } else {
                throw new Exception("Error inserting accommodation image.");
            }
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return false;
        }
    }

    //get the accomadation from the database with respect to the accomadation supplier
    public function getAccomadation($userId) {
        try {
            $sql = "SELECT * FROM add_accomadation WHERE user_id = ?";

            $this->db->query($sql);
            $this->db->bind(1, $userId);

            $accomadation = $this->db->resultSet();

            return $accomadation;
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: {$e->getMessage()}');</script>";
            return [];
        }
    }

}

?>