
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
