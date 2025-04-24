    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/planningSideBarHeader.css">
        <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">
        <link rel="stylesheet" href="<?php echo URLROOT;?>/css/userspage/content.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <title>Start Journey</title>

    </head>

    <body>
        <div class="box">
            <!-- <?php $currentPage = $data['currentPage']; ?> -->
        <!-- SideBar -->
            <?php require APPROOT . '/views/inc/components/planningSidebar.php'; ?>
            <!-- End Of Sidebar -->
                <main>
                    <div class="dashboard-container">
                        <div class="header">
                            <h1>Places</h1>
                        </div>

                        <div class="navigation-footer">
                            <div class="group">
                                <a href="<?php echo URLROOT;?>/users/planhome">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="m326.15-434.5 218.74 218.74L480-151.87 151.87-480 480-808.13l64.89 63.89L326.15-525.5h481.98v91H326.15Z"/></svg>
                                    <p>Previous</p>
                                </a>
                            </div>
                            <div class="group">
                                <a href="#" id="nextButton">
                                    <p>Next</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="M633.85-434.5H151.87v-91h481.98L415.11-744.24 480-808.13 808.13-480 480-151.87l-64.89-63.89 218.74-218.74Z"/></svg>
                                </a>
                            </div>
                        </div>

                        <div class="content-container">

        <!-- Left side - Map and Weather toggle -->
                            <div class="left-section">
                                <!-- Weather toggle button -->
                                <div class="weather-btn" id="weather-btn">
                                    <button class="weather" id="toggleButton" onclick="toggleView()">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M440-760v-160h80v160h-80Zm266 110-55-55 112-115 56 57-113 113Zm54 210v-80h160v80H760ZM440-40v-160h80v160h-80ZM254-652 140-763l57-56 113 113-56 54Zm508 512L651-255l54-54 114 110-57 59ZM40-440v-80h160v80H40Zm157 300-56-57 112-112 29 27 29 28-114 114Zm283-100q-100 0-170-70t-70-170q0-100 70-170t170-70q100 0 170 70t70 170q0 100-70 170t-170 70Zm0-80q66 0 113-47t47-113q0-66-47-113t-113-47q-66 0-113 47t-47 113q0 66 47 113t113 47Zm0-160Z"/></svg>
                                        <h4>Check Weather</h4>
                                    </button>
                                </div>

                                <div class="mapdiv" id="mapdiv">
                                    <iframe id="mapFrame" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>    
                                </div>
                                
                                
                                
                                <!-- Weather information (hidden by default) -->
                                <div id="weatherDiv" style="display: none;">
                                    <div class="weather-container">
                                        <div class="location">Loading...</div>
                                        <div class="temperature">Loading...</div>
                                        <div class="weather-condition">Loading...</div>
                                        <div class="details">
                                            <div class="detail-item humidity">
                                                <i class="fas fa-tint icon"></i>
                                                <div class="detail-label">Humidity</div>
                                                <div class="detail-value">Loading...</div>
                                            </div>
                                            <div class="detail-item wind-speed">
                                                <i class="fas fa-wind icon"></i>
                                                <div class="detail-label">Wind Speed</div>
                                                <div class="detail-value">Loading...</div>
                                            </div>
                                            <div class="detail-item pressure">
                                                <i class="fas fa-tachometer-alt icon"></i>
                                                <div class="detail-label">Pressure</div>
                                                <div class="detail-value">Loading...</div>
                                            </div>
                                            <div class="detail-item uv-index">
                                                <i class="fas fa-sun icon"></i>
                                                <div class="detail-label">UV Index</div>
                                                <div class="detail-value">Loading...</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Right side - Nearby places -->
                            <div class="right-section">
                                <h2>Near By Locations To Visit</h2>
                                <div class="places-container">
                                    <!-- Places will be loaded dynamically here -->
                                </div>
                            </div>
                        </div>

                        <!-- Navigation buttons -->
                    
                    
                    </div>
                </main>
            </div>
        </div>

        
        <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
        <script src="<?php echo URLROOT;?>/js/logout.js"></script>
        <script src="<?php echo URLROOT;?>/js/subMenu.js"></script>
        <script src="<?php echo URLROOT;?>/js/TripPlanner/nextBtn.js"></script>

        
        <script>const apiKey = "<?php echo API_KEY; ?>";</script>
        <script>const weatherAPIKey = "<?php echo WEATHER_API_KEY; ?>";</script>
        <script src="<?php echo URLROOT;?>/js/TripPlanner/places.js"></script>
        <script>const urlRoot = "<?php echo URLROOT; ?>";</script>


    </body>

    </html>

