<?php

    class Product extends Controller{
        private $productModel;

        public function __construct(){
            $this->productModel = $this->model('Product');
        }

        public function addProduct(){
            
            if(isset($_POST['submit'])){
                var_dump($_POST);  // This will output the POST data to the screen
                 exit; 
                //$supplierId = $_SESSION['supplier_id']; //Getting the Supplier ID from the session
                $supplierId = 1;
                $productname = $_POST['productName'];
                $rate = $_POST['productPrice'];
                $category = $_POST['productCategory'];     //These variables are used to store the values which are sent via the form data
                $quantity = $_POST['stockQuantity'];
                $description = $_POST['productDescription'];

                $imageExtensions = ['jpeg','jpg','png']; //Extension array to check whether the uploaded files are eligible to upload
                $imagePaths = [];   //Array to store the paths of the uploaded images
                $images =  $_FILES['productImage'];

                //Checking if there are more than 5 images uploaded to the server
                if(count($images['name']) > 5 ){
                    echo "You can only select upto 5 images";
                    exit;
                }
                
                $supplierFolder = "Uploads/EquipmentSuppliers/$supplierId"; //Base folder for uploading the images

                if(!is_dir($supplierFolder)){             //Checking whether a folder for the supplieId exists already
                    mkdir($supplierFolder,0777,true);    //If there is no folder, a folder is created to the supplierId
                }
 
                 //Creating the model instance to interact with the database
                $isInserted = $this->productModel->addProduct($supplierId, $productname, $rate, $category, $quantity, $description);

                if($isInserted){
                    $productId = $isInserted;
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
                                $uniquename = uniqid('',true).'.'.$fileExtension;
                                $filepath = "$productFolder/$uniquename";

                                if(move_uploaded_file($fileTempName,$filepath)){
                                    $imagePaths[] = $filepath;
                                    $imageInserted = $this->productModel->addProductImage($productId, $filepath);

                                    if (!$imageInserted) {
                                        echo "Error inserting image into the database.";
                                        exit;
                                    }
                                }else{
                                    echo "Error in uploading the file: $filename";
                                    exit;
                                }
                            }else{
                                echo "Invalid image type";
                                exit;
                            }
                        }
                    }

                    echo "Product added successfully!";
                } else {
                    echo "Failed to add product.";
                }
            }
        }
    }

?>