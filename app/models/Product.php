<?php

 class Product{

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addProduct($supplierId, $productName, $rate, $category, $quantity, $description){
       try{
        $sql = "INSERT INTO products (supplier_id, product_name, rate, category_id, quantity, description) 
                    VALUES (?,?, ?, ?, ?, ?)";

        $this->db->query($sql);

        $this->db->bind(1, $supplierId);
        $this->db->bind(2, $productName);
        $this->db->bind(3, $rate);
        $this->db->bind(4, $category);
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
        
    public function addProductImage($productId, $imagePath) {
        try {
            $sql = "INSERT INTO product_images (product_id, image_path) VALUES (?, ?)";
            $this->db->query($sql);
            $this->db->bind(1, $productId);
            $this->db->bind(2, $imagePath);
    
            if ($this->db->execute()) {
                return true;
            } else {
                throw new Exception("Error inserting image path into the database.");
            }
    
        } catch (Exception $e) {
            return false;
        }
    }


    
}

?>
