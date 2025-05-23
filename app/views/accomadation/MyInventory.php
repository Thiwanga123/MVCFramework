<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventory_acc.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader_acc.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/addAccomodationModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/propertyModals.css">
    <title>Home</title>
    <style>
        .message {
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .close-message {
            background: none;
            border: none;
            color: inherit;
            font-size: 18px;
            cursor: pointer;
        }

        /* Delete confirmation modal styles */
        .delete-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        
        .delete-modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 400px;
            max-width: 80%;
            text-align: center;
        }
        
        .delete-modal-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .delete-modal-buttons {
            margin-top: 20px;
        }
        
        .btn-confirm-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            margin-right: 10px;
            cursor: pointer;
        }
        
        .btn-cancel-delete {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="box" id="box">
    <!-- SideBar -->
    <?php
        include('Sidebar.php');;
    ?>
    
     <!-- End Of Sidebar -->
   
     <!--Main Content-->
     <div class="content">
        <!--navbar-->
        <nav>
            <svg class="menu" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-269.23v-40h640v40H160ZM160-460v-40h640v40H160Zm0-190.77v-40h640v40H160Z"/></svg>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search ..">
                    <button class="search-btn" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                    </button>
                </div>
            </form>
            <a href="#" class="updates">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>
                <span class="count">12</span>
            </a>
            <p><?php echo $_SESSION['name'];?></p>
            <a href="#" class="profile">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>Update Accomadation</h1>
                </div>

                <div class="right">
                       <a href="<?php echo URLROOT;?>/accomadation/start" ><button class="add-btn" name ="add-acc-btn" id="add-acc-btn" >
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>                           
                            <h3>Add Accommodation</h3>
                        </button></a>
                </div>
            </div>
           
            <!-- Display messages -->
            <?php if(isset($_SESSION['success_message'])): ?>
                <div class="message success-message">
                    <span><?php echo $_SESSION['success_message']; ?></span>
                    <button class="close-message" onclick="this.parentElement.style.display='none';">&times;</button>
                </div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>
            
            <?php if(isset($_SESSION['error_message'])): ?>
                <div class="message error-message">
                    <span><?php echo $_SESSION['error_message']; ?></span>
                    <button class="close-message" onclick="this.parentElement.style.display='none';">&times;</button>
                </div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>
            
            <div class="Inventory">
                <div>
                <div class="header">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    <h3>All Accomadations</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                </div>
                <table style="font-family: Arial, sans-serif;">

               
                    <thead>
                        <tr>
                            <th>Accomodation Name</th>
                            <th>Location</th>
                            <th>Property-Id</th>
                            <th>Price</th>
                            <th>Number of Guests Can stay</th>
                            <th>Category</th>
                            <th>Action</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['accomadation'] as $accomadation):?>
                        <tr>
                            <td><?php echo $accomadation->property_name;?></td>
                            <td><?php echo $accomadation->address;?></td>
                            <td><?php echo $accomadation->property_id;?></td>
                            <td><?php echo $accomadation->price;?></td>
                            <td><?php echo $accomadation->max_occupants;?></td>
                            <td><?php echo $accomadation->property_type;?></td>
                            <td class="actionn">                   
                                <button class="btn btn-view" onclick="openViewModal(<?php echo $accomadation->property_id; ?>)">View</button>
                                <button class="btn btn-edit" onclick="openEditModal(<?php echo $accomadation->property_id; ?>)">Edit</button>
                                <button class="btn btn-delete" onclick="showDeleteConfirmation(<?php echo $accomadation->property_id; ?>, '<?php echo htmlspecialchars($accomadation->property_name, ENT_QUOTES); ?>')">Delete</button>
                            </td>                               
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table> 
            </div> 
            </div>
            
          </main>

     </div>
     </div>

     <!-- View Modal -->
     <div id="viewPropertyModal" class="property-modal">
         <div class="property-modal-content">
             <div class="modal-header">
                 <h2>Property Details</h2>
                 <span class="close-modal" onclick="closeViewModal()">&times;</span>
             </div>
             <div class="modal-body" id="viewModalContent">
                 <!-- Content will be loaded dynamically via AJAX -->
                 <div class="loading">Loading property details...</div>
             </div>
         </div>
     </div>

     <!-- Edit Modal -->
     <div id="editPropertyModal" class="property-modal">
         <div class="property-modal-content">
             <div class="modal-header">
                 <h2>Edit Property</h2>
                 <span class="close-modal" onclick="closeEditModal()">&times;</span>
             </div>
             <div class="modal-body" id="editModalContent">
                 <!-- Content will be loaded dynamically via AJAX -->
                 <div class="loading">Loading edit form...</div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Cancel</button>
                 <button type="button" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
             </div>
         </div>
     </div>

     <!-- Delete Confirmation Modal -->
     <div id="deleteConfirmationModal" class="delete-modal">
         <div class="delete-modal-content">
             <div class="delete-modal-title">Confirm Deletion</div>
             <p>Are you sure you want to delete the property "<span id="propertyNameToDelete"></span>"?</p>
             <p>This action cannot be undone.</p>
             <div class="delete-modal-buttons">
                 <button id="confirmDeleteBtn" class="btn-confirm-delete">Yes, Delete</button>
                 <button onclick="closeDeleteModal()" class="btn-cancel-delete">Cancel</button>
             </div>
         </div>
     </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 
    <script src="<?php echo URLROOT;?>/js/ImagePreview.js"></script>
    <script src="<?php echo URLROOT;?>/js/propertyModals.js"></script>

    <script>
        // Delete confirmation modal functionality
        let propertyIdToDelete = null;
        const deleteModal = document.getElementById('deleteConfirmationModal');
        const propertyNameSpan = document.getElementById('propertyNameToDelete');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        
        function showDeleteConfirmation(propertyId, propertyName) {
            propertyIdToDelete = propertyId;
            propertyNameSpan.textContent = propertyName;
            deleteModal.style.display = 'block';
        }
        
        function closeDeleteModal() {
            deleteModal.style.display = 'none';
        }
        
        confirmDeleteBtn.addEventListener('click', function() {
            if (propertyIdToDelete) {
                window.location.href = '<?php echo URLROOT; ?>/accomadation/deleteproperty/' + propertyIdToDelete;
            }
        });
        
        // Close modal if user clicks outside of it
        window.addEventListener('click', function(event) {
            if (event.target === deleteModal) {
                closeDeleteModal();
            }
        });
    </script>
</body>

</html>