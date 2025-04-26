<?php

    class Product extends Controller{
        private $productModel;
        private $bookingModel;
        private $equipmentModel;
        private $reviewModel;

        public function __construct(){
            $this->productModel = $this->model('ProductModel');
            $this->bookingModel = $this->model('BookingModel');
            $this->reviewModel = $this->model('ReviewModel');
            $this->equipmentModel = $this->model('EquipmentModel');
        }

        public function addProduct(){

            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $data = [
                    'id'=> $_SESSION['id'],
                    'rentalName' => isset($_POST['rentalName']) ? trim($_POST['rentalName']) : null,
                    'rentalType' => isset($_POST['rentalType']) ? trim($_POST['rentalType']) : null,
                    'pricePerDay' => isset($_POST['pricePerDay']) ? trim($_POST['pricePerDay']) : null,
                    'maximumRentalPeriod' => isset($_POST['maximumRentalPeriod']) ? trim($_POST['maximumRentalPeriod']) : null,
                    'deliveryAvailable' => isset($_POST['deliveryAvailable']) ? trim($_POST['deliveryAvailable']) : null,
                    'rentalDescription' => isset($_POST['rentalDescription']) ? trim($_POST['rentalDescription']) : null,
                    'returnPolicy' => isset($_POST['returnPolicy']) ? trim($_POST['returnPolicy']) : null,
                    'fullRefundTime' => isset($_POST['fullRefundTime']) ? trim($_POST['fullRefundTime']) : null,
                    'partialRefundTime' => isset($_POST['partialRefundTime']) ? trim($_POST['partialRefundTime']) : null,
                    'partialRefundPercentage' => isset($_POST['partialRefundPercentage']) ? trim($_POST['partialRefundPercentage']) : null,
                    'damagePolicy' => isset($_POST['damagePolicy']) ? trim($_POST['damagePolicy']) : null,
                ];

                

                $images = $_FILES['image'];
                $errors = [];
                
                // Validate rentalName
                if (empty($data['rentalName'])) {
                    $errors['rentalName'] = 'Rental name is required.';
                }

                // Validate rentalType
                if (empty($data['rentalType'])) {
                    $errors['rentalType'] = 'Rental type is required.';
                }

                // Validate pricePerDay (must be a number greater than 0)
                if (empty($data['pricePerDay']) || !is_numeric($data['pricePerDay']) || $data['pricePerDay'] <= 0) {
                    $errors['pricePerDay'] = 'Price per day must be a number greater than zero.';
                }

                // Validate maximumRentalPeriod (must be a positive number)
                if (empty($data['maximumRentalPeriod']) || !is_numeric($data['maximumRentalPeriod']) || $data['maximumRentalPeriod'] <= 0) {
                    $errors['maximumRentalPeriod'] = 'Maximum rental period must be a positive number.';
                }

                // Validate deliveryAvailable (ensure it's yes or no)
                if (!in_array($data['deliveryAvailable'], ['yes', 'no'])) {
                    $errors['deliveryAvailable'] = 'Delivery availability must be either "yes" or "no".';
                }

                // Validate rentalDescription
                if (empty($data['rentalDescription'])) {
                    $errors['rentalDescription'] = 'Rental description is required.';
                }

                // Validate returnPolicy (check if it's a valid policy)
                if (empty($data['returnPolicy']) || !in_array($data['returnPolicy'], ['fullRefund', 'partialRefund', 'bothRefunds'])) {
                    $errors['returnPolicy'] = 'Valid return policy is required (fullRefund, partialRefund, or bothRefunds).';
                }

                // Policy-specific validation:

                if ($data['returnPolicy'] === 'fullRefund') {
                    // Full Refund requires fullRefundTime
                    if (empty($data['fullRefundTime'])) {
                        $errors['fullRefundTime'] = 'Full refund cancel time is required.';
                    }
                } elseif ($data['returnPolicy'] === 'partialRefund') {
                    if (empty($data['partialRefundTime'])) {
                        $errors['partialRefundTime'] = 'Partial refund cancel time is required.';
                    }
                    if (empty($data['partialRefundPercentage']) || !is_numeric($data['partialRefundPercentage']) || $data['partialRefundPercentage'] <= 0 || $data['partialRefundPercentage'] > 100) {
                        $errors['partialRefundPercentage'] = 'Partial refund percentage must be a number between 1 and 100.';
                    }
                } elseif ($data['returnPolicy'] === 'bothRefunds') {
                    if (empty($data['fullRefundTime'])) {
                        $errors['fullRefundTime'] = 'Full refund cancel time is required.';
                    }
                    if (empty($data['partialRefundTime'])) {
                        $errors['partialRefundTime'] = 'Partial refund cancel time is required.';
                    }
                    if (empty($data['partialRefundPercentage']) || !is_numeric($data['partialRefundPercentage']) || $data['partialRefundPercentage'] <= 0 || $data['partialRefundPercentage'] > 100) {
                        $errors['partialRefundPercentage'] = 'Partial refund percentage must be a number between 1 and 100.';
                    }

                    if (!empty($data['fullRefundTime']) && !empty($data['partialRefundTime'])) {
                        $fullRefundTime = (int)$data['fullRefundTime'];
                        $partialRefundTime = (int)$data['partialRefundTime'];
                        if ($partialRefundTime >= $fullRefundTime) {
                            $errors['partialRefundTime'] = 'Partial refund cancel time must be less than full refund cancel time.';
                        }
                    }
                }

                // Validate damagePolicy
                if (empty($data['damagePolicy'])) {
                    $errors['damagePolicy'] = 'Damage policy is required.';
                }

                // Validate number of images (limit 6 images)
                if (count($images['name']) > 6) {
                    $errors[] = 'You can upload up to 6 images only.';
                }
                //$productId = $this->productModel->addProduct($data);
               
                $imageExtensions = ['jpeg', 'jpg', 'png'];
                $imagePaths = [];
                
                // Validate images
                $imageUploadErrors = [];
                for ($i = 0; $i < count($images['name']); $i++) {
                    $filename = $images['name'][$i];
                    $fileTempName = $images['tmp_name'][$i];
                    $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                    if ($images['error'][$i] === 0) {
                        // Check if file extension is valid
                        if (!in_array($fileExtension, $imageExtensions)) {
                            $imageUploadErrors[] = "Invalid image type for: $filename. Allowed types: .jpeg, .jpg, .png.";
                        }
                        // Check file size (max 5MB)
                        if ($images['size'][$i] > 5 * 1024 * 1024) {  // 5MB
                            $imageUploadErrors[] = "The file $filename exceeds the maximum size limit of 5MB.";
                        }
                    } else {
                        $imageUploadErrors[] = "Error uploading image: $filename.";
                    }
                }

                // If there are image upload errors
                if (!empty($imageUploadErrors)) {
                    $errors['imageErrors'] = $imageUploadErrors; 
                    echo json_encode(['status' => 'error', 'errors' => $errors]);
                    exit;
                }

                $productId = $this->productModel->addProduct($data); 
               
                if ($productId) {
                      // Process the images and move to appropriate folder
                    $supplierFolder = "Uploads/EquipmentSuppliers/{$data['id']}";
                    if (!is_dir($supplierFolder)) {
                        mkdir($supplierFolder, 0777, true);
                    }

                    $productFolder = "$supplierFolder/$productId";
                    if (!is_dir($productFolder)) {
                        mkdir($productFolder, 0777, true);
                    }

                    foreach ($images['name'] as $i => $filename) {
                                
                                $fileTempName = $images['tmp_name'][$i];
                                $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                                $filepath = "$productFolder/$filename";

                                if (move_uploaded_file($fileTempName, $filepath)) {
                                    $imageSuccess = $this->productModel->addProductImage($data['id'], $productId, $filepath);

                                    if (!$imageSuccess) {
                                        $imageUploadErrors[] = "Error inserting image path into the database for: $filename.";
                                    }else{
                                        $imagePaths[] = $filepath;
                                    } 

                                }else{
                                    $imageUploadErrors[] = "Error uploading image: $filename.";
                                }
                    }
                   
                        if (!empty($imageUploadErrors)) {
                            $errors['imageErrors'] = $imageUploadErrors;
                            $this->productModel->deleteProductById($productId);
                            echo json_encode(['status' => 'error', 'errors' => $errors]);
                        } else {
                            // echo("product added sccessfully with the images.");
                            // echo("<br>");
                            echo json_encode(['status' => 'success', 'message' => 'Product added successfully.']);
                        }
                } else {
                    echo json_encode(['status' => 'error', 'error' => $this->productModel->getErrorMessage()]);
                }
            } else {
                $this->view('equipment_supplier/AddProduct');
            }
    }

        public function deleteProduct(){
            header('Content-Type: application/json');
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $data = json_decode(file_get_contents('php://input'),true);
                $productId = $data['id'];
                $supplierId = $_SESSION['id'];

                if($productId == null){
                    echo json_encode(['success' => false, 'message' => 'Invalid product ID']);
                    return;
                }

                $hasBookings = $this->bookingModel->checkBooking($productId);

                if($hasBookings > 0){
                    echo json_encode(['success' => false, 'message' => 'Cannot delete product. It has active or booked reservations.']);
                    return;
                }

                $delete = $this->bookingModel->softDeleteProduct($productId);
                if ($delete) {
                    echo json_encode(['success' => true, 'message' => 'Product deleted successfully']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to delete product']);
                }
            }
        }

        private function deleteDirectory($directory){
            if(is_dir($directory)){
                $files = array_diff(scandir($directory),['.','..']);
                foreach($files as $file){
                    $filepath = $directory.DIRECTORY_SEPARATOR.$file;
                    if (is_dir($filepath)) {
                        $this->deleteDirectory($filepath); 
                    } else {
                        unlink($filepath); 
                    }
                }

                rmdir($directory);
            }
        }

        public function updateProduct()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Sanitize and validate inputs
                $productId = trim($_POST['productId']);
                $productName = trim($_POST['productName']);
                $category = trim($_POST['productCategory']);
                $rate = trim($_POST['productRate']);
                $quantity = trim($_POST['stockQuantity']);
                $description = trim($_POST['productDescription']);
        
                $errors = [];
        
                // Validate Product Name
                if (empty($productName)) {
                    $errors['nameError'] = "Product name is required.";
                }
        
                // Validate Category
                if (empty($category)) {
                    $errors['categoryError'] = "Category is required.";
                }
        
                // Validate Quantity
                if (!is_numeric($quantity)) {
                    $errors['quantityError'] = "Quantity must be a number.";
                } elseif ($quantity < 1 || $quantity > 15) {
                    $errors['quantityError'] = "Stock quantity must be between 1 and 15.";
                }
        
                // Validate Description
                if (empty($description)) {
                    $errors['descriptionError'] = "Description is required.";
                }
        
                if (empty($rate)) {
                    $errors['rateError'] = "Rate is required.";
                }
        
                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                    $_SESSION['old_input'] = $_POST; 
                    header("Location: " . URLROOT . "/product/edit/$productId");
                    exit();
                }
        
                if ($this->productModel->updateProduct($productId, $productName, $category, $rate, $quantity, $description)) {
                    $_SESSION['success'] = "Product updated successfully!";
                    header("Location: " . URLROOT . "/product/edit/$productId");
                    exit();
                } else {
                    $_SESSION['error'] = "Failed to update the product.";
                    header("Location: " . URLROOT . "/product/edit/$productId");
                    exit();
                }
            }
        }

        public function viewProduct($productId) {
            $sptype = 'equipment';
            $details = $this->equipmentModel->getProductDetailsById($productId);
            $bookings = $this->bookingModel->getBookingsByEquipmentId($productId);
            $reviews = $this->reviewModel->getReviewsByItemId($productId,$sptype);
            $ratings = $this->reviewModel->getRatingsByItemId($productId, $sptype);
            
            $reviewCount = count($reviews);
            $totalRating = 0;
        
            $averageRating = $reviewCount > 0 ? $totalRating / $reviewCount : 0;
        
            // Pass all data to the view
            $data = [
                'id' => $_SESSION['id'],
                'details' => $details,
                'bookings' => json_encode($bookings),
                'reviews' => $reviews,
                'reviewCount' => $reviewCount,
                'averageRating' => $averageRating,
                'ratings' => $ratings
            ];

            $this->view('equipment_supplier/viewProduct',$data);
        }

        public function bookings($productId){
            $bookingModel = $this->model('BookingModel');
            // $bookings = $bookingModel->getProductBookings($productId);

            // if($bookings){
            //    $data = [
            //        'bookings' => $bookings
            //    ];

                $this->view('equipment_supplier/bookings');
            //  }else{
            //     header('Location: ' . URLROOT . '/viewProduct');
            //    exit();
            // }
        }       
}

?>