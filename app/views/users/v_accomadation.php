<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/userspage/AccomodationsSection.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/features.css">

    <title>Accomadations</title>
</head>
<body>
<div class="box" id="box">
<?php $currentPage = $data['currentPage']; ?>
    <!-- SideBar -->
     <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
     <!-- End Of Sidebar -->
     <main>
          
        <?php include 'topbar_acc.php';
          ?>
           
        
        <section id = "features" class="features">
        

<div class="container1">
<?php if (!empty($data['accomadation'])): ?>
<?php foreach ($data['accomadation'] as $accomadation):?>
<div class="feature">
    <img src="<?php echo URLROOT;?>/images/Accomadation.jpg" alt="Accommodation ">
    <h3><?php echo $accomadation->property_name;?></h3>
    <p>Location:<?php echo $accomadation->city;?></p>
    <br>
    <p>Price:Rs.<?php echo $accomadation->singleprice;?> per person</p>
    <p>Price:Rs.<?php echo $accomadation->doubleprice;?> per 2 persons</p>
    <p>Type:<?php echo $accomadation->property_type;?></p>



    
    <a href="<?php echo URLROOT;?>/users/viewdetails/<?php echo $accomadation->property_id;?>" 
       onclick="this.href += '?budget=' + localStorage.getItem('budget') + '&check_in=' + localStorage.getItem('check_in') + '&check_out=' + localStorage.getItem('check_out');">
     </a>   <button class="pay-btn" style="background-color: rgb(21, 126, 126); color: white; font-size: medium; height: 30px; border-radius: 30px; border: none; margin-top: 1rem; cursor: pointer; padding: 0 10px; transition: all 0.3s ease;">
            View & Book
        </button>
    </a>

</div>
<?php endforeach; ?>
<?php else: ?>
    
<?php endif; ?>
</div>

          </main>

          </main>

     </div>

     
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
     <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
</body>

</html>
