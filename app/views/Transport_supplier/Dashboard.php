<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventorys.css">
    
    
    

    <title>Home</title>
</head>
<body>
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
                    <h1 id = "header-title"">Dashboard</h1>
                </div>
            </div>
        
            <!--Insights-->
            <ul class="insights">
                <li>
                    <div class="products">
                    
<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 252.094 252.094" xml:space="preserve">
<g>
	<path d="M196.979,146.785c-1.091,0-2.214,0.157-3.338,0.467l-4.228,1.165l-6.229-15.173c-3.492-8.506-13.814-15.426-23.01-15.426
		H91.808c-9.195,0-19.518,6.921-23.009,15.427l-6.218,15.145l-4.127-1.137c-1.124-0.31-2.247-0.467-3.338-0.467
		c-5.485,0-9.467,3.935-9.467,9.356c0,5.352,3.906,9.858,9.2,11.211c-2.903,8.017-5.159,20.034-5.159,27.929v32.287
		c0,6.893,5.607,12.5,12.5,12.5h4.583c6.893,0,12.5-5.607,12.5-12.5v-6.04h93.435v6.04c0,6.893,5.607,12.5,12.5,12.5h4.585
		c6.893,0,12.5-5.607,12.5-12.5v-32.287c0-7.887-2.252-19.888-5.15-27.905c5.346-1.32,9.303-5.85,9.303-11.235
		C206.445,150.72,202.464,146.785,196.979,146.785z M70.352,159.384l10.161-24.754c2.089-5.088,8.298-9.251,13.798-9.251h63.363
		c5.5,0,11.709,4.163,13.798,9.251l10.161,24.754c2.089,5.088-0.702,9.251-6.202,9.251H76.554
		C71.054,168.635,68.263,164.472,70.352,159.384z M97.292,199.635c0,2.75-2.25,5-5,5H71.554c-2.75,0-5-2.25-5-5v-8.271
		c0-2.75,2.25-5,5-5h20.738c2.75,0,5,2.25,5,5V199.635z M185.203,199.635c0,2.75-2.25,5-5,5h-20.736c-2.75,0-5-2.25-5-5v-8.271
		c0-2.75,2.25-5,5-5h20.736c2.75,0,5,2.25,5,5V199.635z"/>
	<path d="M246.545,71.538L131.625,4.175c-1.525-0.894-3.506-1.386-5.578-1.386c-2.072,0-4.053,0.492-5.578,1.386L5.549,71.538
		C2.386,73.392,0,77.556,0,81.223v160.582c0,4.135,3.364,7.5,7.5,7.5h12.912c4.136,0,7.5-3.365,7.5-7.5V105.917
		c0-1.378,1.121-2.5,2.5-2.5h191.268c1.379,0,2.5,1.122,2.5,2.5v135.888c0,4.135,3.364,7.5,7.5,7.5h12.913
		c4.136,0,7.5-3.365,7.5-7.5V81.223C252.094,77.556,249.708,73.392,246.545,71.538z"/>
</g>
</svg></svg></div>
                    <span class = "info">
                        <h3>9</h3>
                        <p>Total Vehicles</p>
                    </span>
                </li>
                <li>
                    <div class="view">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-80q-33 0-56.5-23.5T80-160v-640q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v640q0 33-23.5 56.5T800-80H160Zm0-80h640v-640H160v640Zm200-240q-17 0-28.5-11.5T320-440q0-17 11.5-28.5T360-480q17 0 28.5 11.5T400-440q0 17-11.5 28.5T360-400Zm240 0q-17 0-28.5-11.5T560-440q0-17 11.5-28.5T600-480q17 0 28.5 11.5T640-440q0 17-11.5 28.5T600-400ZM200-516v264q0 14 9 23t23 9h16q14 0 23-9t9-23v-48h400v48q0 14 9 23t23 9h16q14 0 23-9t9-23v-264l-66-192q-5-14-16.5-23t-25.5-9H308q-14 0-25.5 9T266-708l-66 192Zm106-64 28-80h292l28 80H306ZM160-800v640-640Zm120 420v-120h400v120H280Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>7</h3>
                        <p>Booked Vehicles</p>
                    </span>
                </li>
                <li>
                    <div class="earnings">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m140-220-60-60 300-300 160 160 284-320 56 56-340 384-160-160-240 240Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>Rs.30,000</h3>
                        <p>Earnings Received</p>
                    </span>
                </li>
                <li>
                    <div class="pendings">
                    
<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 258.103 258.103" xml:space="preserve">
<g>
	<path d="M248.904,71.976c-0.974,0-1.972,0.14-2.969,0.414l-11.278,3.106l-11.713-28.531c-3.317-8.082-13.125-14.657-21.862-14.657
		H91.474c-8.736,0-18.545,6.575-21.863,14.657L57.915,75.457L46.777,72.39c-0.997-0.274-1.995-0.414-2.969-0.414
		c-5.33,0-9.198,4.072-9.198,9.683v6.649c0,0.272,0.022,0.539,0.041,0.808c-4.643,2.927-9.001,6.375-12.977,10.351
		C7.698,113.442,0,132.026,0,151.793c0,19.768,7.698,38.351,21.675,52.326c13.978,13.977,32.561,21.676,52.327,21.676
		c19.766,0,38.35-7.698,52.327-21.676c8.147-8.146,14.142-17.865,17.742-28.465h68.937v14.154c0,6.549,5.328,11.877,11.877,11.877
		h15.511c6.549,0,11.877-5.328,11.877-11.877v-56.68c0-8.118-2.507-20.831-5.59-28.34l-1.891-4.604h1.434
		c6.549,0,11.877-5.328,11.877-11.877v-6.649C258.103,76.048,254.234,71.976,248.904,71.976z M84.147,50.58
		c1.984-4.835,7.885-8.79,13.11-8.79h98.041c5.226,0,11.126,3.955,13.11,8.79l17.717,43.154c1.984,4.835-0.668,8.79-5.894,8.79
		h-91.024c-0.931-1.04-1.885-2.064-2.879-3.059c-13.979-13.978-32.562-21.675-52.327-21.675c-0.347,0-0.689,0.02-1.035,0.025
		L84.147,50.58z M74.002,203.646c-13.85,0-26.871-5.395-36.665-15.189c-9.794-9.793-15.187-22.813-15.187-36.664
		s5.394-26.871,15.187-36.665c9.794-9.793,22.815-15.187,36.665-15.187s26.871,5.394,36.665,15.187
		c9.793,9.794,15.187,22.814,15.187,36.665s-5.393,26.871-15.187,36.664C100.872,198.251,87.852,203.646,74.002,203.646z
		 M229.413,148.318c0,2.613-2.138,4.751-4.751,4.751h-33.653c-2.613,0-4.751-2.138-4.751-4.751v-16.152
		c0-2.613,2.138-4.751,4.751-4.751h33.653c2.613,0,4.751,2.138,4.751,4.751V148.318z"/>
	<path d="M108.154,121.659c-4.234-3.108-10.187-2.198-13.297,2.037L67.7,160.676l-16.626-12.093
		c-4.247-3.091-10.197-2.152-13.287,2.098c-3.09,4.248-2.151,10.197,2.098,13.287l22.229,16.167
		c2.134,1.554,4.616,2.303,7.078,2.303c3.714,0,7.383-1.704,9.739-4.914l31.261-42.567
		C113.301,130.723,112.389,124.769,108.154,121.659z"/>
</g>
</svg> </div>
                    <span class = "info">
                        <h3>2</h3>
                        <p>Available Vehicles</p>
                    </span>
                </li>
            </ul>
            <!--End of Insights-->
        
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M120-80v-800l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v800l-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h480v-80H240v80Zm0-160h480v-80H240v80Zm0-160h480v-80H240v80Zm-40 404h560v-568H200v568Zm0-568v568-568Z"/></svg>
                        <h3>Recent Orders</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>License Number</th>
                                <th>model</th>
                                <th>Make</th>
                                <th>Rental Price</th>
                                <th>Order Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <p>Ushan</p>
                                </td>
                                <td>KV 2156</td>
                                <td>Benz</td>
                                <td>cla</td>
                                <td>5000</td>
                                <td>21-08-2024</td>
                                <td>
                                    <span class="status completed">Completed</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <p>Thiwanga</p>
                                </td>
                                <td>RQ 2525</td>
                                <td>Toyota</td>
                                <td>Aqua</td>
                                <td>4000</td>
                                <td>14-07-2024</td>
                                <td>
                                    <span class="status pending">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <p>Ruvin</p>
                                </td>
                                <td>CAA 61616</td>
                                <td>Honda</td>
                                <td>civic</td>
                                <td>8000</td>
                                <td>01-01-2024</td>
                                <td>
                                    <span class="status cancelled">Cancelled</span>
                                </td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
        
                <!--Recent updates-->
                <div class="reminders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h440l200 200v440q0 33-23.5 56.5T760-120H200Zm0-80h560v-400H600v-160H200v560Zm80-80h400v-80H280v80Zm0-320h200v-80H280v80Zm0 160h400v-80H280v80Zm-80-320v160-160 560-560Z"/></svg>
                        <h3>Recent Updates</h3>
        
                    </div>
                    <ul class="update-list">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        
          </main>

     </div>

     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>

</body>

</html>
