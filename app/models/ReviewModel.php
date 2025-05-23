<?php

class ReviewModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /////////////////////////////////////////      EQUIPMENT REVIEWS SECTION      /////////////////////////////////////////

    public function getReviewsByEquipmentId($equipmentId){
       
        $sql = "SELECT r.* , t.name 
                FROM rental_equipments_reviews r 
                JOIN traveler t ON r.traveler_id = t.traveler_id  
                WHERE r.equipment_id = ?";
        try{
            $this->db->query($sql);
            $this->db->bind(1,$equipmentId);
            $result = $this->db->resultSet();
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function getRatingsByEquipmentId($equipmentId){
        $sql = "SELECT rating, COUNT(*) as total
                FROM rental_equipments_reviews
                WHERE equipment_id = ?
                GROUP BY rating
                ORDER BY rating DESC";

        try{
            $this->db->query($sql);
            $this->db->bind(1,$equipmentId);
            $result = $this->db->resultSet();
            return $result; 
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }


    public function addEquipmentReview($data){
        try{
            $sql = 'INSERT INTO rental_equipments_reviews (equipment_id, traveler_id, rating, comment) VALUES (?, ?, ?, ?)';
            $this->db->query($sql);
            $this->db->bind(1, $data['productId']);
            $this->db->bind(2, $data['userId']);
            $this->db->bind(3, $data['rating']);
            $this->db->bind(4, $data['comment']);

            $result = $this->db->execute();
            if($result){
                return true;
            }else{
                throw new Exception("Error in inserting review into the database.");
            }
        }catch(Exception $e){
            echo "Error: " . $e->getMessage() . "<br>";
            return false;
        }
    }

    public function deleteEquipmentReview($data){
        $sql = "DELETE FROM rental_equipments_reviews WHERE review_id = ?";
        try{
            $this->db->query($sql);
            $this->db->bind(1, $data['reviewId']);
            $result = $this->db->execute();
            if($result){
                return true;
            }else{
                throw new Exception("Error in deleting review from the database.");
            }
        }catch(Exception $e){
            echo "Error: " . $e->getMessage() . "<br>";
            return false;
        }
    }

    public function updateEquipmentReview($data){
        $sql = "UPDATE rental_equipments_reviews SET rating = ?, comment = ?, created_at = NOW() WHERE review_id = ?;";
        try{
            $this->db->query($sql);
            $this->db->bind(1, $data['rating']);
            $this->db->bind(2, $data['comment']);
            $this->db->bind(3, $data['reviewId']);

            $result = $this->db->execute();
            if($result){
                return true;
            }else{
                throw new Exception("Error in deleting review from the database.");
            }
        }catch(Exception $e){
            echo "Error: " . $e->getMessage() . "<br>";
            return false;
        }
    }

    public function getReviewsBySupplierId($supplierId){

        $sql = "SELECT rer.*, ri.image_path, re.rental_name
                FROM rental_equipments_reviews r
                LEFT JOIN rental_images ri ON r.equipment_id = ri.product_id
                AND ri.image_id = (SELECT MIN(image_id) FROM rental_images WHERE product_id = r.equipment_id)
                WHERE r.supplier_id = ?";

        try{
            $this->db->query($sql);
            $this->db->bind(1, $supplierId);
            $result = $this->db->resultSet();
            print_r($result);
            exit;
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }


}
?>