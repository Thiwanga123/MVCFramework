<?php

class ReviewModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getReviewsByItemId($itemId,$type){
        $sql = "SELECT r.* , t.name , t.profile_path
                FROM reviews r 
                JOIN traveler t ON r.traveler_id = t.traveler_id  
                WHERE r.item_id = ? AND r.type = ? ";    
                
        try{
            $this->db->query($sql);
            $this->db->bind(1,$itemId);
            $this->db->bind(2,$type);
            $result = $this->db->resultSet();
            return $result;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function getRatingsByitemId($itemId, $type){
        $sql = "SELECT rating, COUNT(*) as total
                FROM reviews
                WHERE item_id = ? AND type = ?
                GROUP BY rating
                ORDER BY rating DESC";

        try{
            $this->db->query($sql);
            $this->db->bind(1,$itemId);
            $this->db->bind(2,$type);
            $result = $this->db->resultSet();
            return $result; 
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }


    public function addItemReview($data){
        try{
            $sql = 'INSERT INTO reviews (type, supplier_id, item_id, traveler_id, rating, comment) VALUES (?, ?, ?, ?, ?,?)';
            $this->db->query($sql);
            $this->db->bind(1, $data['type']);
            $this->db->bind(2, $data['supplierId']);
            $this->db->bind(3, $data['productId']);
            $this->db->bind(4, $data['userId']);
            $this->db->bind(5, $data['rating']);
            $this->db->bind(6, $data['comment']);

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

    public function deleteItemReview($data){
        $sql = "DELETE FROM reviews WHERE review_id = ?";
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

    public function updateitemReview($data){
        $sql = "UPDATE reviews SET rating = ?, comment = ?, created_at = NOW() WHERE review_id = ?;";
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

    public function getEquipmentReviewsBySupplierId($supplierId, $sptype){
      
        $sql = 'SELECT r.*, e.rental_name AS item_name, c.name AS customer_name, c.email AS customer_email,
                ( SELECT i.image_path FROM rental_images i 
                  WHERE i.product_id = r.item_id 
                  LIMIT 1) AS image_path
                FROM reviews r
                JOIN rental_items e ON r.item_id = e.id
                JOIN traveler c ON r.traveler_id = c.traveler_id
                WHERE e.supplier_id = ? AND r.type = ?';

        try{
            $this->db->query($sql);
            $this->db->bind(1, $supplierId);
            $this->db->bind(2, $sptype);
           
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }
}
?>