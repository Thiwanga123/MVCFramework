<?php 

class Reviews extends Controller{
    private $reviewModel;

    public function __construct(){
        $this->reviewModel = $this->model('ReviewModel');
    }

    //////////////////////////////////////////////     EQUIPMENT REVIEWS SECTION     ///////////

    public function addReview(){
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $productId = isset($_POST['productId']) ? trim($_POST['productId']) : null;
            $rating = isset($_POST['rating']) ? trim($_POST['rating']) : null;
            $comment = isset($_POST['comment']) ? trim($_POST['comment']) : null;
            $type = isset($_POST['type']) ? trim($_POST['type']) : null;

            $id = $_SESSION['id'];

            $data = [
                'supplierId' => $id,
                'userId' => $_SESSION['user_id'],
                'productId' => htmlspecialchars($productId),
                'rating' => htmlspecialchars($rating),
                'type' => htmlspecialchars($type),
                'comment' => htmlspecialchars($comment)
            ];

            if(!$data['rating'] || $data['comment'] == ''){
                echo json_encode(['success' => false, 'message' =>'Please fill in all fields.']);
                return;
            }

            $result = $this->reviewModel->addItemReview($data);

            if($result){
                echo json_encode(['success' => true, 'message' => 'Review added successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to add review.']);
            } 
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        }
    }

    public function deleteReview(){
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $reviewId = isset($_POST['reviewId']) ? trim($_POST['reviewId']) : null;
            $data = [
                'userId' => $_SESSION['user_id'],
                'reviewId' => htmlspecialchars($reviewId),
            ];

            $result = $this->reviewModel->deleteItemReview($data);

            if($result){
                echo json_encode(['success' => true, 'message' => 'Review deleted successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete review.']);
            } 
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        }
    }

    public function editReview(){
        header('Content-Type: application/json');

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $reviewId = isset($_POST['reviewId']) ? trim($_POST['reviewId']) : null;
            $productId = isset($_POST['productId']) ? trim($_POST['productId']) : null;
            $rating = isset($_POST['rating']) ? trim($_POST['rating']) : null;
            $comment = isset($_POST['comment']) ? trim($_POST['comment']) : null;
           
            $data = [
                'userId' => $_SESSION['user_id'],
                'reviewId' => htmlspecialchars($reviewId),
                'productId' => htmlspecialchars($productId),
                'rating' => htmlspecialchars($rating),
                'comment' => htmlspecialchars($comment)
            ];

            if(!$data['rating'] || $data['comment'] == ''){
                echo json_encode(['success' => false, 'message' =>'Please fill in all fields.']);
                return;
            }

            $result = $this->reviewModel->updateReview($data);

            if($result){
                echo json_encode(['success' => true, 'message' => 'Review updated successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update review.']);
            } 
        }else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        }
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}
?>