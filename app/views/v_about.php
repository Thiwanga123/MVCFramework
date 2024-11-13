<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/about.css">
    <title>About </title>

</head>
<body>
    <?php require APPROOT . '/views/inc/components/navigationbar.php'; ?>

    <main>
        <section id="Hero" class="Hero">
            <div class="hero-content">
                
                <h1>About<span> US</span></h1>
            </div>

            <div class="about">
                <div class="about-content">
                    <div class="mission">
                        <h1>Who <span>We Are?</span></h1>
                        <p>We’re all about creating unforgettable experiences for our <br>
                            guests. Our journey began with a simple passion for <br>
                            exploring the beauty of the World. </p>
                    </div>
                    <div class="mission">
                        <h1>Our <span>Mision</span></h1>
                        <p>We believe that travel is not just about visiting new places,<br> 
                            but about immersing yourself in new cultures, connecting <br>
                            with nature, and making memories that last a lifetime.</p>
                    </div>
                </div>


                <div class="image">
                    <img src="<?php echo URLROOT;?>/Images/Sigiriya.jpg" width="544px" height="350px">
            </div>

            
            </div>
            <div class="features">
                <div class="topic">
                    <h2><span>What we serve</span> <br><br>
                        We offer Our best<br>
                        services
                    </h2>
                </div>
                <div class="boxes">
                <div class="box">
                    <div class="icon">
                        <img src="<?php echo URLROOT;?>/Images/cloudy_1163610.png"><br>
                    </div>
                    <div class="description">
                        <h3>Weather & <br> Near By Locations</h3><br>
                        <p>Get real-time weather updates and discover nearby attractions effortlessly.</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <img src="<?php echo URLROOT;?>/Images/customer-service_3632552.png">
                    </div>
                    <div class="description">
                        <h3>Best Service Providers</h3><br><br>
                        <p>Connect with the best service providers for a seamless travel experience.</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <img src="<?php echo URLROOT;?>/Images/package_1067555.png">
                    </div>
                    <div class="description">
                        <h3>Package &<br>Customization</h3><br>
                        <p>Choose from curated packages or customize your trip to suit your needs.</p>
                    </div>
                </div>
            </div>
            </div>
                
        </section>




    </main>
    <?php require APPROOT . '/views/inc/components/footer.php'; ?>

</body>
</html>