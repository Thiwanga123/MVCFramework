<?php

 class ProductModel{

    private $db;
    private $errorMessage = ''; 

    public function __construct() {
        $this->db = new Database();
    }

    public function addProduct($data) {

        try {
            $supplierId = $data['id'];
            $rentalName = $data['rentalName'];
            $rentalType = $data['rentalType'];
            $pricePerDay = $data['pricePerDay'];
            $maximumRentalPeriod = $data['maximumRentalPeriod'];
            $deliveryAvailable = $data['deliveryAvailable'];
            $rentalDescription = $data['rentalDescription'];
            $returnPolicy = $data['returnPolicy'];
            $fullRefundTime = $data['fullRefundTime'];
            $partialRefundTime = $data['partialRefundTime'];
            $partialRefundPercentage = $data['partialRefundPercentage'];
            $damagePolicy = $data['damagePolicy'];

            $row = $this->getCategoryIdByName($rentalType);
    
            if (!$row || !isset($row->category_id)) {
                throw new Exception("Category not found.");
            }
    
            $categoryId = $row->category_id;
        
            $sql = "INSERT INTO rental_equipments
            (supplier_id, rental_name, category_id, price_per_day, maximum_rental_period, 
             delivery_available, rental_description, return_policy, full_refund_time, 
             partial_refund_time, partial_refund_percentage, damage_policy) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                // Execute the query
                $this->db->query($sql);
                $this->db->bind(1, $supplierId);
                $this->db->bind(2, $rentalName);
                $this->db->bind(3, $categoryId);
                $this->db->bind(4, $pricePerDay);
                $this->db->bind(5, $maximumRentalPeriod);
                $this->db->bind(6, $deliveryAvailable);
                $this->db->bind(7, $rentalDescription);
                $this->db->bind(8, $returnPolicy);
                $this->db->bind(9, $fullRefundTime);
                $this->db->bind(10, $partialRefundTime);
                $this->db->bind(11, $partialRefundPercentage);
                $this->db->bind(12, $damagePolicy);

                if ($this->db->execute()) {
                    $productId = $this->db->insertId();  // Get the ID of the newly inserted product
                    return $productId;
                } else {
                    throw new Exception("Error inserting product.");
                }
            } catch (Exception $e) {
                $this->errorMessage = $e->getMessage();
                return false;
            }
    }
        
    public function addProductImage($supplierId, $productId, $imagePath) {
        try {
           
            $sql = "INSERT INTO rental_images (supplier_id, product_id, image_path) VALUES (?, ?, ?)";
            $this->db->query($sql);

            $this->db->bind(1, $supplierId);
            $this->db->bind(2, $productId);
            $this->db->bind(3, $imagePath);
    
            if ($this->db->execute()) {
                return true;
            } else {
               throw new Exception("Error inserting image path into the database.");
            }
    
        } catch (Exception $e) {
            $this->errorMessage = $e->getMessage();
            return false;
        }
    }

    public function getAllCategories(){
        try{
            $sql = "SELECT * FROM equipment_categories";
            $this->db->query($sql);

            if ($this->db->execute()) {                
                $result = $this->db->resultSet();
                return $result;
            } 
        }catch(Exception $e){
            echo "Error: " . $e->getMessage() . "<br>";
        return false;
        }
    }

    public function getCategoryIdByName($category){
        try{
            $sql = "SELECT category_id FROM equipment_categories WHERE category_name = ?";
            $this->db->query($sql);

            $this->db->bind(1,$category);
            $result = $this->db->single();
            return $result;

        }catch(Exception $e){
            echo "Error in database. fnc getcategoryidbyname";
            return false;
        }
    }

    
    public function getEquipmentCountBySupplierId($supplierId){
        $sql = "SELECT COUNT(*) as equipment_count FROM rental_equipments WHERE supplier_id = :supplierId";
        try{
            $this->db->query($sql);
            $this->db->bind(':supplierId', $supplierId);
            $result = $this->db->single();
            exit;
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
            return false;
        }

    }


    public function getAllProducts($supplierId){
        try{
            $sql = "SELECT r.*, c.category_name, i.image_path 
                    FROM rental_equipments r
                    JOIN equipment_categories c ON r.category_id = c.category_id
                    LEFT JOIN (SELECT product_id, MIN(image_path) AS image_path FROM rental_images
                    GROUP BY product_id) i
                    ON r.id = i.product_id
                    WHERE r.supplier_id = ? AND r.deleted_at IS NULL";

            $this->db->query($sql);
            $this->db->bind(1,$supplierId);

            $result = $this->db->resultSet();

            return $result;            

        }catch(Exception $e){
            $this->errorMessage = $e->getMessage();
            return false;
        }
    }

    public function deleteProductById($productId){
        try{
            $sql = "DELETE FROM products WHERE product_id = ?";
            $this->db->query($sql);
            $this->db->bind(1,$productId);
            $result = $this->db->execute();

        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
        }
    }

    public function getProductDetailsById($productId){
        try{
            $sql = 'SELECT r.*, c.category_name, GROUP_CONCAT(i.image_path) AS image_paths
                    FROM rental_equipments r
                    JOIN equipment_categories c ON r.category_id = c.category_id
                    LEFT JOIN rental_images i ON r.id = i.product_id
                    WHERE r.id = ?
                    GROUP BY r.id';
                    
            $this->db->query($sql);
            $this->db->bind(1,$productId);
            $result = $this->db->single();

            if (!$result) {
                throw new Exception("Product not found.");
            }
            return $result; 

        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function updateProduct($id, $data)
    {
                try {
                    $sql = "UPDATE rentals 
                            SET rental_name = :rental_name,
                                price_per_day = :price_per_day,
                                category_name = :category_name,
                                maximum_rental_period = :maximum_rental_period,
                                delivery_available = :delivery_available,
                                rental_description = :rental_description,
                                return_policy = :return_policy,
                                full_refund_time = :full_refund_time,
                                partial_refund_time = :partial_refund_time,
                                partial_refund_percentage = :partial_refund_percentage,
                                damage_policy = :damage_policy
                            WHERE id = :id";

                    $this->db->query($sql);

                    // Bind parameters
                    $this->db->bind(':rental_name', $data['rental_name']);
                    $this->db->bind(':price_per_day', $data['price_per_day']);
                    $this->db->bind(':category_name', $data['category_name']);
                    $this->db->bind(':maximum_rental_period', $data['maximum_rental_period']);
                    $this->db->bind(':delivery_available', $data['delivery_available']);
                    $this->db->bind(':rental_description', $data['rental_description']);
                    $this->db->bind(':return_policy', $data['return_policy']);
                    $this->db->bind(':full_refund_time', $data['full_refund_time']);
                    $this->db->bind(':partial_refund_time', $data['partial_refund_time']);
                    $this->db->bind(':partial_refund_percentage', $data['partial_refund_percentage']);
                    $this->db->bind(':damage_policy', $data['damage_policy']);
                    $this->db->bind(':id', $id);

                    if ($this->db->execute()) {
                        return true;
                    } else {
                        throw new Exception("Failed to update rental product.");
                    }
                } catch (Exception $e) {
                    $error_msg = $e->getMessage();
                    echo "<script>alert('An error occurred: $error_msg');</script>";
                    return false;
                }
            }

    public function getDetailsForCancellations($productId){
    $sql = 'SELECT id, return_policy, full_refund_time, partial_refund_time, partial_refund_percentage 
            FROM rental_equipments 
            WHERE id = :id';
    try { 
        $this->db->query($sql);
        $this->db->bind(':id', $productId); // use named binding
        $result = $this->db->single();
        return $result;
    } catch(Error $e){
        $error_msg = $e->getMessage();
        echo "<script>alert('An error occurred: $error_msg');</script>";
        return false;
    }
}


    public function getErrorMessage() {
        return $this->errorMessage;
    }
        
    
    }

    

?>
