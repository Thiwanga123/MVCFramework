<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Reviews_ushan.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    
    <title>Home</title>
</head>
<body>
    <!-- SideBar -->
    <?php
        include('Sidebar.php');;
    ?>
          <!-- End Of Sidebar -->

     <!--Main Content-->
    

        <main>
        <hr>
            <div class="header">
                <div class="left">
                    <h1>Reviews & Ratings</h1>
                </div>

        
            </div>

            <div class="reviews">
                <div>
                <div class="header">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    <h3>All Reviews</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Product Id</th>
                            <th>Review</th>
                            <th>Date</th>
                            <th>Replies</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="customer">
                                <img src="Images/default profile.png"> 
                                <p>John Doe</p>
                            </td>
                            <td>E102</td>
                            <td class="rev">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam omnis reiciendis tenetur nihil saepe, recusandae necessitatibus tempora ea consectetur ut autem dolores voluptates fugiat, in ipsum culpa quae aliquam voluptatibus.</td>
                            <td>2024/05/05</td>
                            <td>0</td>
                            <td class="Action">
                                <a href="#" class="more">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M240-400q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm240 0q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm240 0q-33 0-56.5-23.5T640-480q0-33 23.5-56.5T720-560q33 0 56.5 23.5T800-480q0 33-23.5 56.5T720-400Z"/></svg>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="customer">
                                <img src="Images/default profile.png"> 
                                <p>John Doe</p>
                            </td>
                            <td>E102</td>
                            <td class="rev">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam omnis reiciendis tenetur nihil saepe, recusandae necessitatibus tempora ea consectetur ut autem dolores voluptates fugiat, in ipsum culpa quae aliquam voluptatibus.</td>
                            <td>2024/05/05</td>
                            <td>0</td>
                            <td class="Action">
                                <a href="#" class="more">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M240-400q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm240 0q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm240 0q-33 0-56.5-23.5T640-480q0-33 23.5-56.5T720-560q33 0 56.5 23.5T800-480q0 33-23.5 56.5T720-400Z"/></svg>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="customer">
                                <img src="Images/default profile.png"> 
                                <p>John Doe</p>
                            </td>
                            <td>E102</td>
                            <td class="rev">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam omnis reiciendis tenetur nihil saepe, recusandae necessitatibus tempora ea consectetur ut autem dolores voluptates fugiat, in ipsum culpa quae aliquam voluptatibus.</td>
                            <td>2024/05/05</td>
                            <td>0</td>
                            <td class="Action">
                                <a href="#" class="more">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M240-400q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm240 0q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm240 0q-33 0-56.5-23.5T640-480q0-33 23.5-56.5T720-560q33 0 56.5 23.5T800-480q0 33-23.5 56.5T720-400Z"/></svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table> 
                </div>
            </div>
            
          </main>

     </div>

     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script> 

</body>

</html>
