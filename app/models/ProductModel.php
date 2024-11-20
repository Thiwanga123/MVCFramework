<?php

 class ProductModel{

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addProduct($supplierId, $productName, $rate, $category, $quantity, $description){
       try{
            $row = $this->getCategoryIdByName($category);
            $categoryId = $row->category_id;
            
            if(!$categoryId){
                throw new Exception("Category not found.");
            }

            $sql = "INSERT INTO products (supplier_id, product_name, rate, category_id, quantity, description) 
                        VALUES (?, ?, ?, ?, ?, ?)";

            $this->db->query($sql);

            $this->db->bind(1, $supplierId);
            $this->db->bind(2, $productName);
            $this->db->bind(3, $rate);
            $this->db->bind(4, $categoryId);
            $this->db->bind(5, $quantity);
            $this->db->bind(6, $description);

            if ($this->db->execute()) {
                // Get the inserted product ID
                $productId = $this->db->insertId();
                return $productId;
            } else {
                throw new Exception("Error inserting product.");
            }
        }catch(Exception $e){
        return false;
        }
    }     
        
    public function addProductImage($supplierId, $productId, $imagePath) {
        try {
            $sql = "INSERT INTO product_images (supplier_id, product_id, image_path) VALUES (?, ?, ?)";
            $this->db->query($sql);

            $this->db->bind(1, $supplierId);
            $this->db->bind(2, $productId);
            $this->db->bind(3, $imagePath);
    
            if ($this->db->execute()) {
                echo "Done";
                return true;
            } else {
               throw new Exception("Error inserting image path into the database.");
            }
    
        } catch (Exception $e) {
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occurred: $error_msg');</script>";
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


    
}

?>
