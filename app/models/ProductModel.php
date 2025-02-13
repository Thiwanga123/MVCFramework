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

    public function getAllProducts($supplierId){
        try{
            $sql = "SELECT p.*, c.category_name, i.image_path 
                    FROM products p
                    JOIN equipment_categories c ON p.category_id = c.category_id
                    LEFT JOIN (SELECT product_id, MIN(image_path) AS image_path FROM product_images
                    GROUP BY product_id) i
                    ON p.product_id = i.product_id
                    WHERE p.supplier_id = ?";

            $this->db->query($sql);
            $this->db->bind(1,$supplierId);

            $result = $this->db->resultSet();

            return $result;            

        }catch(Exception $e){
            $error_msg = $e->getMessage();
                echo "<script>alert('An error occurred: $error_msg');</script>";
                return false;
        }
    }

    public function deleteProductById($productId){

        try{
            $finalResult = false;

            $sql = "DELETE FROM products WHERE product_id = ?";
            $this->db->query($sql);
            $this->db->bind(1,$productId);
            $result = $this->db->execute();

            if($result){
                $sql2 = "DELETE FROM product_images WHERE product_id = ?";
                $this->db->query($sql2);
                $this->db->bind(1,$productId);
                $finalResult = $this->db->execute();
                
                if(!$finalResult){
                    throw new Exception("Failed to delete the images");
                }
            }

            return $finalResult;
        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
    }

    public function getProductDetailsById($productId){
        try{
            $sql = 'SELECT p.*, c.category_name
                    FROM products p
                    JOIN equipment_categories c ON p.category_id = c.category_id
                    WHERE p.product_id = ?';
                    
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

    public function updateProduct($supplierId, $productId, $productname, $rate, $category, $quantity, $description){
        try{
            $row = $this->getCategoryIdByName($category);
            $categoryId = $row->category_id;
            
            if(!$categoryId){
                throw new Exception("Category not found.");
            }


            $sql = "UPDATE products 
                SET product_name = ?, rate = ?, category_id = ?, quantity = ?, description = ?
                WHERE supplier_id = ? AND product_id = ? ";

            $this->db->query($sql);

            $this->db->bind(1, $productname);
            $this->db->bind(2, $rate);
            $this->db->bind(3, $categoryId);
            $this->db->bind(4, $quantity);
            $this->db->bind(5, $description);
            $this->db->bind(6, $supplierId);
            $this->db->bind(7, $productId);

            if ($this->db->execute()) {
                return true;
            } else {
               throw new Exception("Error in updating product details");
            }

        }catch(Exception $e){
            $error_msg = $e->getMessage();
            echo "<script>alert('An error occured: $error_msg');</script>";
            return false;
        }
        }
    }


?>
