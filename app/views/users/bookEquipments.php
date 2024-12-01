<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <<link rel="stylesheet" href="<?php echo URLROOT;?>/css/userspage/AccomodationSSection.css">
    <title>Home</title>

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
                    <h4>Product Type</h4>
                    <select id="equipmentCategory">
                        <option value="camping">Camping Gear</option>
                        <option value="hiking">Hiking Gear</option>
                        <option value="bicycles">Bicycles</option>
                        <option value="water-sports">Water Sports Equipment</option>
                        <option value="skiing">Skiing Equipment</option>
                        <option value="fishing">Fishing Gear</option>
                        <option value="climbing">Climbing Gear</option>
                    </select>
                </div>
            
                
                <div class="filter-section">
                    <h4>Transmission</h4>
                    <label><input type="radio" name="transmission" value="manual"> Manual</label><br>
                    <label><input type="radio" name="transmission" value="automatic"> Automatic</label>
                </div>
            
                
                <div class="filter-section">
                    <h4>Fuel Type</h4>
                    <label><input type="checkbox" value="petrol"> Petrol</label><br>
                    <label><input type="checkbox" value="diesel"> Diesel</label><br>
                    <label><input type="checkbox" value="electric"> Electric</label><br>
                    <label><input type="checkbox" value="hybrid"> Hybrid</label>
                </div>
              </div>
            
        </div>
        <div class="right">
            <div class="top">
                
            </div>

            <div class="navigation">
                <div class="group">
                    <a href="<?php echo URLROOT;?>/trips/transportation">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="m326.15-434.5 218.74 218.74L480-151.87 151.87-480 480-808.13l64.89 63.89L326.15-525.5h481.98v91H326.15Z"/></svg>
                        <p>Previous</p>
                    </a>
                </div>
                <div class="group">
                    <a href="<?php echo URLROOT;?>/trips/overview">
                        <p>Next</p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62"><path d="M633.85-434.5H151.87v-91h481.98L415.11-744.24 480-808.13 808.13-480 480-151.87l-64.89-63.89L633.85-434.5Z"/></svg>
                    </a>
                </div>
            </div>
            
            <div class="bottom">
                <div class="card">
                    <img src="/camping.jpg" alt="equipment">
                    <h3>Camping Tent</h3>
                    <p>Size:Large</p>
                    <br>
                    <p>Price:Rs.10,000</p>
                    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
                    border-radius: 30px;
                    border: none;
                    margin-top: 1rem;
                    cursor: pointer;
                    padding: 0 10px;
                    transition: all 0.3s ease;">Book & Pay Now</button></a>
                </div>

                <div class="card">
                    <img src="/camping.jpg" alt="equipment">
                    <h3>Camping Tent</h3>
                    <p>Size:Large</p>
                    <br>
                    <p>Price:Rs.10,000</p>
                    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
                    border-radius: 30px;
                    border: none;
                    margin-top: 1rem;
                    cursor: pointer;
                    padding: 0 10px;
                    transition: all 0.3s ease;">Book & Pay Now</button></a>
                </div>

                <div class="card">
                    <img src="/camping.jpg" alt="equipment">
                    <h3>Camping Tent</h3>
                    <p>Size:Large</p>
                    <br>
                    <p>Price:Rs.10,000</p>
                    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
                    border-radius: 30px;
                    border: none;
                    margin-top: 1rem;
                    cursor: pointer;
                    padding: 0 10px;
                    transition: all 0.3s ease;">Book & Pay Now</button></a>
                </div>

                <div class="card">
                    <img src="/camping.jpg" alt="equipment">
                    <h3>Camping Tent</h3>
                    <p>Size:Large</p>
                    <br>
                    <p>Price:Rs.10,000</p>
                    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
                    border-radius: 30px;
                    border: none;
                    margin-top: 1rem;
                    cursor: pointer;
                    padding: 0 10px;
                    transition: all 0.3s ease;">Book & Pay Now</button></a>
                </div>

                <div class="card">
                    <img src="/camping.jpg" alt="equipment">
                    <h3>Camping Tent</h3>
                    <p>Size:Large</p>
                    <br>
                    <p>Price:Rs.10,000</p>
                    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
                    border-radius: 30px;
                    border: none;
                    margin-top: 1rem;
                    cursor: pointer;
                    padding: 0 10px;
                    transition: all 0.3s ease;">Book & Pay Now</button></a>
                </div>

                <div class="card">
                    <img src="/camping.jpg" alt="equipment">
                    <h3>Camping Tent</h3>
                    <p>Size:Large</p>
                    <br>
                    <p>Price:Rs.10,000</p>
                    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
                    border-radius: 30px;
                    border: none;
                    margin-top: 1rem;
                    cursor: pointer;
                    padding: 0 10px;
                    transition: all 0.3s ease;">Book & Pay Now</button></a>
                </div>

                <div class="card">
                    <img src="/camping.jpg" alt="equipment">
                    <h3>Camping Tent</h3>
                    <p>Size:Large</p>
                    <br>
                    <p>Price:Rs.10,000</p>
                    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
                    border-radius: 30px;
                    border: none;
                    margin-top: 1rem;
                    cursor: pointer;
                    padding: 0 10px;
                    transition: all 0.3s ease;">Book & Pay Now</button></a>
                </div>

                <div class="card">
                    <img src="/camping.jpg" alt="equipment">
                    <h3>Camping Tent</h3>
                    <p>Size:Large</p>
                    <br>
                    <p>Price:Rs.10,000</p>
                    <a href="<?php echo URLROOT;?>/users/payments"><button class="pay-btn" style=" background-color: rgb(21, 126, 126);color: white;font-size: medium;height: 30px;
                    border-radius: 30px;
                    border: none;
                    margin-top: 1rem;
                    cursor: pointer;
                    padding: 0 10px;
                    transition: all 0.3s ease;">Book & Pay Now</button></a>
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>