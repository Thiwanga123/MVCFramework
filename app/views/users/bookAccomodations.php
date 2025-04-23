<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/userspage/AccomodationSSection.css">
    <title>Home</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Retrieve the location from local storage
            const data = JSON.parse(localStorage.getItem('data'));
            const location = data ? data.location : '';

            // Set the location value in the form
            const locationInput = document.createElement('input');
            locationInput.type = 'hidden';
            locationInput.name = 'location';
            locationInput.value = location;

            // Add event listener to the form to include location and other values in the submission
            const searchForm = document.getElementById('searchForm');
            searchForm.appendChild(locationInput);
            searchForm.addEventListener('submit', function(event) {
                const peopleInput = document.getElementById('people').value;
                const startDateInput = document.getElementById('startDate').value;
                const endDateInput = document.getElementById('endDate').value;

                // Create hidden input fields for people, start date, and end date
                const hiddenPeopleInput = document.createElement('input');
                hiddenPeopleInput.type = 'hidden';
                hiddenPeopleInput.name = 'people';
                hiddenPeopleInput.value = peopleInput;

                const hiddenStartDateInput = document.createElement('input');
                hiddenStartDateInput.type = 'hidden';
                hiddenStartDateInput.name = 'startDate';
                hiddenStartDateInput.value = startDateInput;

                const hiddenEndDateInput = document.createElement('input');
                hiddenEndDateInput.type = 'hidden';
                hiddenEndDateInput.name = 'endDate';
                hiddenEndDateInput.value = endDateInput;

                // Append hidden input fields to the form
                searchForm.appendChild(hiddenPeopleInput);
                searchForm.appendChild(hiddenStartDateInput);
                searchForm.appendChild(hiddenEndDateInput);
            });
        });
    </script>

</head>
<body>
    <header>
        <div class="logo">
            <a href="<?php echo URLROOT;?>/pages/home">
            <img src="<?php echo URLROOT;?>/Images/Logo1.png">
                <p>JOURNEY<br><span>BEYOND</span></p>
            </a>
        </div>
        <div class="nav">
            <ul class="navbar">
                <li>Destinations</li>
                <li>Accomodations</li>
                <li>Transportation</li>
                <li>Guider</li>
                <li>Equipment Rentals</li>
                <li>Overview</li>
            </ul>
        </div>
    </header>

    <div class="content">
        <div class="left">
            <div class="filter-container">
                <h3>Filters</h3>
                <div class="filter-section">
                  <h4>Price Range</h4>
                  <input type="range" id="priceMin" min="0" max="1000" value="100" step="10">
                  <input type="range" id="priceMax" min="0" max="1000" value="900" step="10">
                  <p>Price: LKR<span id="priceMinLabel">1000</span> - LKR<span id="priceMaxLabel">100,000</span></p>
                </div>
            
                
                <div class="filter-section">
                  <h4>Accommodation Type</h4>
                  <label><input type="checkbox" value="hotel"> Hotel</label><br>
                  <label><input type="checkbox" value="apartment"> Apartment</label><br>
                  <label><input type="checkbox" value="villa"> Villa</label>
                </div>
            
                
                <div class="filter-section">
                  <h4>Star Rating</h4>
                  <label><input type="radio" name="rating" value="5"> 5 Stars</label><br>
                  <label><input type="radio" name="rating" value="4"> 4 Stars</label><br>
                  <label><input type="radio" name="rating" value="3"> 3 Stars</label>
                </div>
            
                
                <div class="filter-section">
                  <h4>Amenities</h4>
                  <label><input type="checkbox" value="wifi"> Free Wi-Fi</label><br>
                  <label><input type="checkbox" value="parking"> Parking</label><br>
                  <label><input type="checkbox" value="pool"> Pool</label>
                </div>
              </div>
            
        </div>
        <div class="right">
        
        <form id="searchForm" action="<?php echo URLROOT;?>/users/showaccommodation" method="POST">
            <div class="top">
            
                <ul class="bar-in">

           
              
                    <li>
                        <div class="group">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg>
                            <p>People</p>
                        </div>
                        <input type="text" id="people" placeholder="How Many People ?">
                        
                    </li>

                    <li>
                        <div class="group">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="M202.87-71.87q-37.78 0-64.39-26.61t-26.61-64.39v-554.26q0-37.78 26.61-64.39t64.39-26.61H240v-80h85.5v80h309v-80H720v80h37.13q37.78 0 64.39 26.61t26.61 64.39v554.26q0 37.78-26.61 64.39t-64.39 26.61H202.87Zm0-91h554.26V-560H202.87v397.13Zm0-477.13h554.26v-77.13H202.87V-640Zm0 0v-77.13V-640ZM480-398.09q-17.81 0-29.86-12.05T438.09-440q0-17.81 12.05-29.86T480-481.91q17.81 0 29.86 12.05T521.91-440q0 17.81-12.05 29.86T480-398.09Zm-160 0q-17.81 0-29.86-12.05T278.09-440q0-17.81 12.05-29.86T320-481.91q17.81 0 29.86 12.05T361.91-440q0 17.81-12.05 29.86T320-398.09Zm320 0q-17.48 0-29.7-12.05-12.21-12.05-12.21-29.86t12.21-29.86q12.22-12.05 29.82-12.05t29.7 12.05q12.09 12.05 12.09 29.86t-12.05 29.86q-12.05 12.05-29.86 12.05Zm-160 160q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm-160 0q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm320 0q-17.48 0-29.7-12.21-12.21-12.22-12.21-29.82t12.21-29.7q12.22-12.09 29.82-12.09t29.7 12.05q12.09 12.05 12.09 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Z"/></svg>                            
                            <p>Check-In Date</p>
                        </div>
                        <input type="date" id="startDate" placeholder="2024/01/01">
                    </li>

                    <li>
                        <div class="group">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="M202.87-71.87q-37.78 0-64.39-26.61t-26.61-64.39v-554.26q0-37.78 26.61-64.39t64.39-26.61H240v-80h85.5v80h309v-80H720v80h37.13q37.78 0 64.39 26.61t26.61 64.39v554.26q0 37.78-26.61 64.39t-64.39 26.61H202.87Zm0-91h554.26V-560H202.87v397.13Zm0-477.13h554.26v-77.13H202.87V-640Zm0 0v-77.13V-640ZM480-398.09q-17.81 0-29.86-12.05T438.09-440q0-17.81 12.05-29.86T480-481.91q17.81 0 29.86 12.05T521.91-440q0 17.81-12.05 29.86T480-398.09Zm-160 0q-17.81 0-29.86-12.05T278.09-440q0-17.81 12.05-29.86T320-481.91q17.81 0 29.86 12.05T361.91-440q0 17.81-12.05 29.86T320-398.09Zm320 0q-17.48 0-29.7-12.05-12.21-12.05-12.21-29.86t12.21-29.86q12.22-12.05 29.82-12.05t29.7 12.05q12.09 12.05 12.09 29.86t-12.05 29.86q-12.05 12.05-29.86 12.05Zm-160 160q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm-160 0q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm320 0q-17.48 0-29.7-12.21-12.21-12.22-12.21-29.82t12.21-29.7q12.22-12.09 29.82-12.09t29.7 12.05q12.09 12.05 12.09 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Z"/></svg>                            
                            <p>Check-Out Date</p>
                        </div>
                        <input type="date" id="endDate" placeholder="2024/01/01">
                    </li>

                    <li><button class="search" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                    </button></li>
                
                </ul>
                
            </div>
            </form>

            <div class="navigation">
                <div class="group">
                <a href="<?php echo URLROOT;?>/trips/locations">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="m326.15-434.5 218.74 218.74L480-151.87 151.87-480 480-808.13l64.89 63.89L326.15-525.5h481.98v91H326.15Z"/></svg>
                        <p>Previous</p>
                    </a>
                </div>
                <div class="group">
                <a href="<?php echo URLROOT;?>/trips/transportation">
                        <p>Next</p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="M633.85-434.5H151.87v-91h481.98L415.11-744.24 480-808.13 808.13-480 480-151.87l-64.89-63.89L633.85-434.5Z"/></svg>
                    </a>
                </div>
            </div>

            <div class="bottom">
            <?php if (isset($data['showaccomadation']) && is_array($data['showaccomadation']) && !empty($data['showaccomadation'])): ?>
                <?php foreach($data['showaccomadation'] as $showaccomodation): ?>

                    <div class="card">
                        <img src="<?php echo URLROOT;?>/Images/Accomadation.jpg" alt="Accommodation ">
                        <h3><?php echo $showaccomodation->property_name?></h3>
                        <p>Location:<?php echo $showaccomodation->city?></p>
                        <br>
                        <p>Price:Rs.<?php echo $showaccomodation->singleprice?>,00 per person</p>
                        <a href="<?php echo URLROOT;?>/users/viewdetails/<?php echo $showaccomodation->property_id;?>"><button class="book-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
                        border-radius: 30px;
                        border: none;
                        margin-top: 1rem;
                        cursor: pointer;
                        padding: 0 10px;
                        transition: all 0.3s ease;">View & Book</button></a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No accommodations available at the moment.</p>
            <?php endif; ?>
               
            </div>
        </div>
    </div>
    

</body>
</html>