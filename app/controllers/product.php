<?php

    class Product extends Controller{
        private $productModel;

        public function __construct(){
            $this->productModel = $this->model('ProductModel');
        }

        public function addProduct(){
        
            if(isset($_POST['submit'])){

                $data = [
                    'id'=> $_SESSION['id'],
                    'productname' => trim($_POST['productName']),
                    'rate' =>trim($_POST['productPrice']) ,
                    'category' => trim($_POST['productCategory']),    //These variables are used to store the values which are sent via the form data
                    'quantity' => trim($_POST['stockQuantity']),
                    'description' => trim($_POST['productDescription']),
                ];

                if(empty($data['productname'])){
                    $errors[] = 'Product name is required';
                }

                if(empty($data['rate']) || is_numeric($data['rate'])){
                    $errors[] = 'A valid rate for the product is required';
                }

                if(empty($data['category'])){
                    $errors[] = 'Product category is required';
                }

                if(empty($data['quantity']) || is_numeric($data['quantity'])){
                    $errors[] = 'A valid quantity for the product is required';
                }

                if(empty($data['description'])){
                    $errors[] = 'Product description is required';
                }


                $imageExtensions = ['jpeg','jpg','png']; //Extension array to check whether the uploaded files are eligible to upload
                $imagePaths = [];   //Array to store the paths of the uploaded images
                $images =  $_FILES['productImages'];
       
                if(count($images['name']) > 5 ){
                    $errors[] = 'Select only upto 5 images';
                }

                $supplierFolder = "Uploads/EquipmentSuppliers/{$data['id']}"; //Base folder for uploading the images

                if(!is_dir($supplierFolder)){           //Checking whether a folder for the supplieId exists already
                    mkdir($supplierFolder,0777,true);    //If there is no folder, a folder is created to the supplierId
                }

                 //Creating the model instance to interact with the database
                $isInserted = $this->productModel->addProduct($data['id'], $data['productname'], $data['rate'], $data['category'], $data['quantity'], $data['description']);
                
                if($isInserted){
                    $productId = $isInserted;
                    echo($productId);
                    $productFolder = "$supplierFolder/$productId";

                    if (!is_dir($productFolder)) {
                        mkdir($productFolder, 0777, true);
                    }

                    for ($i = 0; $i < count($images['name']); $i++) {
                        if($images['error'][$i] == 0){
                            $filename = $images['name'][$i];
                            $fileTempName = $images['tmp_name'][$i];  //Storing the image properties
                            
                            $nameArray = explode('.',$filename);
                            //In here explode method seperates the image file name to an array based on '.' It returns an array of strings.
                            $fileExtension = strtolower(end($nameArray)); 
                        //In here a variable is used to store the extension part of the image. The extention part is the last element of the 
                        //array we got using the explode method.Here end method is used to get the last element of the array.

                            if(in_array($fileExtension,$imageExtensions)){
                                
                                $filepath = "$productFolder/$filename";

                                if(move_uploaded_file($fileTempName,$filepath)){
                                    $imagePaths[] = $filepath;
                                    $imageInserted = $this->productModel->addProductImage($data['id'],$productId, $filepath);
                                    
                                    if ($imageInserted) {
                                        echo "Images Successfully inserted";
                                    }
                                    else{
                                        echo "Error inserting image into the database.$filename<br>";
                                    }
                                }
                                else{
                                    echo "Error in uploading the file: $filename<br>";   
                                }
                            }else{
                                echo "Invalid image type for: $filename<br>";    
                                
                            }
                        }else {
                            echo "<script type='text/javascript'>alert('Error with file upload for image $i.<br>');</script>";
                        }
                    }
                    
                    echo "<script type='text/javascript'>alert('Product added successfully!');</script>";
                    redirect('equipment_suppliers/MyInventory');
                } else {
                    echo "<script type='text/javascript'>alert('Failed to add product.');</script>";
                }
            }else{
                
                $this->view('equipment_supplier/AddProduct');
            }
        }

        public function delete(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $productId = $_POST['productId'];
                $supplierId = $_SESSION['id'];

                $productFolder = "Uploads/EquipmentSuppliers/{$supplierId}/{$productId}";

                $success = $this->productModel->deleteProductById($productId);

                if($success){
                    if(is_dir($productFolder)){
                        $this->deleteDirectory($productFolder);
                    }
                    echo "<script type='text/javascript'>alert('Product deleted successfully!');</script>";
                    redirect('equipment_suppliers/MyInventory');
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
                $productModel = $this->model('ProductModel');
                $product = $productModel->getProductDetailsById($productId);
        
                if ($product) {
                    $data = [
                        'product' => $product
                    ];
        
                    $this->view('equipment_supplier/viewProduct', $data);
                } else {
                    header('Location: ' . URLROOT . '/products');
                    exit();
                }
            }

       
}

?>