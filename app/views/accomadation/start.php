<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journey Beyond Accomodation Listing</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/accomodation/start.css">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/features.css"> -->
    

</head>
<body>
<?php require APPROOT . '/views/inc/components/startheader.php'; ?>

<div class="container">
<h1>List your Any Propoerty on <p>JOURNEY<span>BEYOND</span></p></h1>
    <div class="container1">
        <div class="feature">
        <img src="<?php echo URLROOT;?>/images/apartment.jpg" alt="apartment ">
        <h3>Apartment</h3>
        <p>Furnished accommodation, where guests rent the entire place.</p>
        <a href="<?php echo URLROOT;?>/accomadation/basicinfo"><button>List your property</button></a>
        </div>
        <div class="feature">
        <img src="<?php echo URLROOT;?>/images/home.jpg" alt="home ">
        <h3>Home</h3>
        <p>Properties like apartments, holiday homes, villas, etc.</p>
        <a href="<?php echo URLROOT;?>/accomadation/basicinfo"><button>List your property</button></a>
        </div>
        <div class="feature">
        <img src="<?php echo URLROOT;?>/images/hotel.jpg" alt="hotel">
        <h3>Hotel</h3>
        <p>Properties like hotels, B&Bs, guest houses, hostels, aparthotels, etc.</p>
        <a href="<?php echo URLROOT;?>/accomadation/basicinfo"><button>List your property</button></a>
        </div>
     </div>
     </div>
</body>
</html>