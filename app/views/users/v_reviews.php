<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventory.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>Reviews</title>
</head>
<body>
    <div class="box">
    <?php $currentPage = $data['currentPage']; ?>

    <!-- SideBar -->
    <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
    
     <!-- End Of Sidebar -->
   
     <!--Main Content-->
    

        <main>
            <div class="header">
                <div class="left">
                    <h1>Reviews for the Services</h1>
                </div>

                <div class="right">
                        <button class="add-btn" name ="add-btn" id="add-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                            <h3>Add Review</h3>
                        </button>
                </div>
            </div>
           
            <div class="Inventory">
                <div>
                <div class="header">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    <h3>All Reviews</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Trip ID</th>
                            <th>Service Type</th>
                            <th>Service Provider ID</th>
                            <th>Description</th>
                            <th>Number of Stars</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        <tr>
                            <td>T01</td>
                            <td>Transport</td>
                            <td>SP01</td>
                            <td>Good Service</td>
                            <td><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFF55"><path d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143ZM233-120l65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Zm247-350Z"/></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFF55"><path d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143ZM233-120l65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Zm247-350Z"/></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFF55"><path d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143ZM233-120l65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Zm247-350Z"/></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFF55"><path d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143ZM233-120l65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Zm247-350Z"/></svg></td>
                            <td>
                                <button class="edit-btn" name ="edit-btn" id="edit-btn">
                                    
                                    <h3>Edit</h3>
                                </button>
                                <button class="delete-btn" name ="delete-btn" id="delete-btn">
                                    
                                    <h3>Delete</h3>
                                </button>
                            </td>
                           


                                
                        </tr>
                       
                    </tbody>
                </table> 
            </div> 
            </div>
            
          </main>

     </div>
     </div>
     <!--Modal Structure-->
    

    <?php
        include('Warning_Modal.php');;
    ?>

     <?php
        include('AddProduct.php');;
    ?>


    

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
    <script src="<?php echo URLROOT;?>/js/addProduct.js"></script>
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js"></script>
    <script src="<?php echo URLROOT;?>/js/warningModel.js"></script>
    <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
     
</body>

</html>
