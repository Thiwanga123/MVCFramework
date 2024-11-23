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
            }
        }

        public function delete($productId){
            if($this->productModel->deleteProductById($productId)){
                echo "<script type='text/javascript'>alert('Product deleted successfully!');</script>";
                redirect('equipment_suppliers/MyInventory');
            }
        }


    }

?>