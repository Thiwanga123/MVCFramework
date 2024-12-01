<?php

class ReviewModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getReviewsByTourGuideId($tourGuideId) {
        $sql = "SELECT * FROM reviews WHERE tour_guide_id = :tour_guide_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':tour_guide_id', $tourGuideId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReviewById($reviewId) {
        $sql = "SELECT * FROM reviews WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $reviewId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateReview($reviewId, $rating, $comment) {
        $sql = "UPDATE reviews SET rating = :rating, comment = :comment, updated_at = NOW() WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $reviewId);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':comment', $comment);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteReview($reviewId) {
        $sql = "DELETE FROM reviews WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $reviewId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function createReview($tourGuideId, $userId, $rating, $comment) {
        $sql = "INSERT INTO reviews (tour_guide_id, user_id, rating, comment, created_at) VALUES (:tour_guide_id, :user_id, :rating, :comment, NOW())";
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindParam(':tour_guide_id', $tourGuideId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':comment', $comment);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>