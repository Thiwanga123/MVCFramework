<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/about.css">
    <title>About </title>

</head>
<body>
    <header>
        <div class="logo">
            <a href="/Landing Page/Home.html">
                <img src="<?php echo URLROOT;?>/Images/Logo1.png">
                <p>JOURNEY<br><span>BEYOND</span></p>
            </a>
        </div>

        <ul class="navbar">
            <li><a href="">Home</a></li>
            <li><a href="<?php echo URLROOT;?>/pages/about">About Us</a></li>
            <li><a href="">Features</a></li>
            <div class="links">
                <li><button class="SignIn" onclick="location.href='<?php echo URLROOT;?>/users/login'">Login</button></li>
                <li><button class="SignUp" onclick="location.href='<?php echo URLROOT;?>/users/register'">Sign Up</button></li>
            </div>
        </ul>
    </header>

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

    <footer>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f0f7fd;
            }
            .container {
                /* max-width: 1200px; */
                /* margin: 0 auto; */
                /* padding: 20px; */
                
                
            }
            .subscribe-section {
                background-color: #d6eaf8;
                padding: 50px 20px;
                text-align: center;
                display: flex;
                justify-content: space-around;
                align-items: center;
            }
            .subscribe-section .left {
                max-width: 100%;
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            .subscribe-section h2 {
                font-size: 24px;
                margin-bottom: 20px;
            }
            .subscribe-section input[type="email"] {
                padding: 10px;
                width: 300px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            .subscribe-section button {
                padding: 10px 20px;
                background-color: #2e8b57;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .subscribe-section button:hover {
                background-color: #236b46;
            }
            .subscribe-section img {
                max-width: 300px; /* Adjust image size */
                height: auto;
            }
            .footer {
                background-color: #ffffff;
                padding: 40px 20px;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                border-top: 1px solid #ccc;
            }
            .footer .logo {
                font-size: 20px;
                font-weight: bold;
            }
            .footer .logo span {
                color: #f39c12;
            }
            .footer .links ul, .footer .contact ul {
                list-style: none;
                padding: 0;
            }
            .footer .links ul li, .footer .contact ul li {
                margin-bottom: 10px;
            }
            .footer .social-icons img {
                width: 30px;
                margin-right: 10px;
            }
            .footer .contact p {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
    
        <div class="container">
            <!-- Subscription Section -->
            <div class="subscribe-section">
                <div class="left">
                    <div class="div 1">
                    <h2><c>Subscribe now to get useful traveling information</c></h2>
                    <c><input type="email" placeholder="Enter your email" /></c>
                    <button><c>Subscribe</c></button>
                    </div>
                    <div class="div 2">
                        <p><c>Stay updated with the latest travel tips, exclusive deals, and destination guides</c></p>
                    </div>
                </div>
                <!-- Image from your project folder -->
                <img src="<?php echo URLROOT;?>/Images/rear-view-back-young-asian-hiking-man-standing-riseup-hands-with-happy-peak-rocky-mountain-copy-space.jpg" alt="Logo2">        
            </div>
    
            <!-- Footer Section -->
            <div class="footer">
                <!-- Logo and About Section -->
                <div class="logo">
    
    
     <p>Journey<span> Beyond</span></p>
                                    <!-- Social Media Icons -->
                    <div class="social-icons">
                        <img src="https://img.icons8.com/color/48/000000/youtube-play.png" alt="YouTube">
                        <img src="https://img.icons8.com/color/48/000000/facebook-new.png" alt="Facebook">
                        <img src="https://img.icons8.com/color/48/000000/twitter.png" alt="Twitter">
                        <img src="https://img.icons8.com/color/48/000000/instagram-new.png" alt="Instagram">
                    </div>
                </div>
    
                <!-- Quick Links -->
                <div class="links">
                    <h3>Discover</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Tours</a></li>
                    </ul>
                </div>
    
                <!-- Quick Links -->
                <div class="links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Register</a></li>
                    </ul>
                </div>
    
                <!-- Contact Section -->
                <div class="contact">
                    <h3>Contact</h3>
                    <ul>
                        <li>Address: Colombo 7</li>
                        <li>Email: journeybeyond@mail.com</li>
                        <li>Phone: 011-230478941</li>
                    </ul>
                </div>
            </div>
    
            <!-- Footer Credits -->
            <div class="container">
                <p style="text-align: center;">© 2024 Journey Beyond. All Rights Reserved</p>
            </div>
        </div>
    
    </footer>


    
</body>
</html>