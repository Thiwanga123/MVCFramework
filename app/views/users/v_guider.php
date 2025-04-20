<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/userspage/tourguideSection.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Modals/logoutModal.css">

    <title>Guider</title>
</head>
<body>
<div class="box" id="box">
<?php $currentPage = $data['currentPage']; ?>
    <!-- SideBar -->
     <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
     <!-- End Of Sidebar -->
<<<<<<< HEAD
     <?php
$destinations = [
    'Kandy, Sri Lanka',
    'Colombo, Sri Lanka',
    'Galle, Sri Lanka',
    'Nuwara Eliya, Sri Lanka',
    'Sigiriya, Sri Lanka'
];
?>
     <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .header {
            text-align: center;
            color:rgb(235, 241, 240);
            background: #3aafa9;
            padding: 20px;
            margin: -30px -30px 30px;
            border-radius: 10px 10px 0 0;
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .step {
            text-align: center;
        }

        .step-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 5px;
        }

        .step.active .step-circle {
            background: #3aafa9;
            color: #17252a;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .date-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .time-picker {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .time-picker select {
            width: 60px;
        }

        .am-pm {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .am-pm.active {
            background: #2b7a78;
            color: white;
            border-color: #17252;
        }

        .passenger-counter {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .counter {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .counter button {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            border-radius: 50%;
            background: none;
            cursor: pointer;
        }

        .language-select {
            position: relative;
        }

        .checkbox-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .submit-btn {
            background:#3aafa9;
            color: #17252a;
            color:#17252a;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: right;
        }
    </style>

<body>
    <div class="container">
        <div class="header">
            <h1>Plan My Trip!</h1>
        </div>

        <div class="step-indicator">
            <div class="step active">
                <div class="step-circle">1</div>
                <span>Step 1</span>
            </div>
            <div class="step">
                <div class="step-circle">2</div>
                <span>Step 2</span>
            </div>
            <div class="step">
                <div class="step-circle">3</div>
                <span>Step 3</span>
            </div>
        </div>

        <form action="v_guider.php" method="POST">
            <div class="form-group">
                <label>I am travelling to</label>
                <select name="destination" required>
                    <option value="" selected>Select or type destination</option>
                    <?php foreach ($destinations as $destination): ?>
                        <option value="<?= htmlspecialchars($destination) ?>"><?= htmlspecialchars($destination) ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="text" name="destination" placeholder="Type destination" style="margin-top: 10px; width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" required>
            </div>
                    <script>
                        // Set minimum date for start date to today
                        const today = new Date().toISOString().split('T')[0];
                        document.getElementById('start_date').min = today;

                        // Update end date minimum when start date changes
                        document.getElementById('start_date').addEventListener('change', function() {
                            document.getElementById('end_date').min = this.value;
                        });
                    </script>

            <div class="date-grid">
                <div class="form-group">
                    <label>Arrival</label>
                    <div class="time-picker">
                        <select>
                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                <option><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                            <?php endfor; ?>
                        </select>
                        <select>
                            <option>00</option>
                            <option>15</option>
                            <option>30</option>
                            <option>45</option>
                        </select>
                        <div class="am-pm active">AM</div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Departure</label>
                    <div class="time-picker">
                        <select>
                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                <option><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                            <?php endfor; ?>
                        </select>
                        <select>
                            <option>00</option>
                            <option>15</option>
                            <option>30</option>
                            <option>45</option>
                        </select>
                        <div class="am-pm">PM</div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox"> Not yet sure about my timings
                </label>
            </div>

            <div class="passenger-counter">
                <div class="form-group">
                    <label>Adult</label>
                    <div class="counter">
                        <button type="button">-</button>
                        <span>1</span>
                        <button type="button">+</button>
                    </div>
                </div>
                <div class="form-group">
                    <label>Child (2-12y)</label>
                    <div class="counter">
                        <button type="button">-</button>
                        <span>0</span>
                        <button type="button">+</button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>I need a guide who speaks</label>
                <select name="language" required>
                    <option value="" selected>Select language</option>
                    <option value="English">English</option>
                    <option value="French">French</option>
                    <option value="German">German</option>
                </select>
            </div>

            <div class="form-group">
                <label>Gender of the Guider that you want</label>
                <div class="checkbox-group">
                    <button type="button" class="am-pm" name="gender" value="Male">Male</button>
                    <button type="button" class="am-pm" name="gender" value="Female">Female</button>
                    <button type="button" class="am-pm" name="gender" value="Female">Any</button>

                </div>
            </div>

            <button type="submit" class="submit-btn" style="margin-top: 10px;">Next</button>
        </form>
    </div>
   
    <div class="container" style="display: none;" id="step2-container">
        <div class="header">
            <h1>Step 2: Available Local Guides</h1>
        </div>

        <?php
        $maleGuides = [
            [
                'name' => 'Mohan Silva',
                'rating' => 4.9,
                'reviews' => 156,
                'languages' => ['English', 'Sinhala'],
                'location' => 'Galle, Sri Lanka',
                'specialties' => ['Heritage Sites', 'Local Cuisine'],
                'contact' => [
                    'email' => 'mohan.silva@email.com',
                    'phone' => '+94 77 123 4567'
                ],
                'price' => 1000,
                'experience' => 5,
                'tours' => 234
            ],
            // Add more guides here if needed
        ];

        foreach ($maleGuides as $guide): ?>
            <div class="guide-card" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
                <h3><?= htmlspecialchars($guide['name']) ?></h3>
                <p><strong>Rating:</strong> <?= htmlspecialchars($guide['rating']) ?> (<?= htmlspecialchars($guide['reviews']) ?> reviews)</p>
                <p><strong>Languages:</strong> <?= htmlspecialchars(implode(', ', $guide['languages'])) ?></p>
                <p><strong>Location:</strong> <?= htmlspecialchars($guide['location']) ?></p>
                <p><strong>Specialties:</strong> <?= htmlspecialchars(implode(', ', $guide['specialties'])) ?></p>
                <p><strong>Contact:</strong> Email: <?= htmlspecialchars($guide['contact']['email']) ?>, Phone: <?= htmlspecialchars($guide['contact']['phone']) ?></p>
                <p><strong>Price:</strong> Rs.<?= htmlspecialchars($guide['price']) ?>/hour</p>
                <p><strong>Experience:</strong> <?= htmlspecialchars($guide['experience']) ?> years</p>
                <p><strong>Tours Conducted:</strong> <?= htmlspecialchars($guide['tours']) ?></p>
            </div>
        <?php endforeach; ?>
        <?php
        $femaleGuides = [
            [
                'name' => 'Saduni Ranathunga',
                'rating' => 4.5,
                'reviews' => 156,
                'languages' => ['French', 'English'],
                'location' => 'Galle, Sri Lanka',
                'specialties' => ['Cultural Tours', 'Photography'],
                'contact' => [
                    'email' => 'saduni.ranathunga@email.com',
                    'phone' => '+94 77 987 6543'
                ],
                'price' => 1500,
                'experience' => 3,
                'tours' => 156
            ],
            // Add more female guides here if needed
        ];
        ?>

        <?php foreach ($femaleGuides as $guide): ?>
            <div class="guide-card" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
                <h3><?= htmlspecialchars($guide['name']) ?></h3>
                <p><strong>Rating:</strong> <?= htmlspecialchars($guide['rating']) ?> (<?= htmlspecialchars($guide['reviews']) ?> reviews)</p>
                <p><strong>Languages:</strong> <?= htmlspecialchars(implode(', ', $guide['languages'])) ?></p>
                <p><strong>Location:</strong> <?= htmlspecialchars($guide['location']) ?></p>
                <p><strong>Specialties:</strong> <?= htmlspecialchars(implode(', ', $guide['specialties'])) ?></p>
                <p><strong>Contact:</strong> Email: <?= htmlspecialchars($guide['contact']['email']) ?>, Phone: <?= htmlspecialchars($guide['contact']['phone']) ?></p>
                <p><strong>Price:</strong> Rs.<?= htmlspecialchars($guide['price']) ?>/hour</p>
                <p><strong>Experience:</strong> <?= htmlspecialchars($guide['experience']) ?> years</p>
                <p><strong>Tours Conducted:</strong> <?= htmlspecialchars($guide['tours']) ?></p>
            </div>
        <?php endforeach; ?>


        <button type="button" class="submit-btn" id="back-to-step1">Back</button>
        <button type="button" class="submit-btn" id="next-to-step3">Next</button>
        </form>

    </div>



   
<div class="container" style="display: none;" id="step3-container">
        <div class="header">
            <h1>Step 3: Select a Guide</h1>
        </div>
        <p>Please select a guide from the list below:</p>

        <div class="form-group">
            <label for="guide">Select a Guide:</label>
            <select name="guide" id="guide" required>
                <option value="" selected>Select a guide</option>
                <?php 
                $allGuides = array_merge($maleGuides, $femaleGuides);
                foreach ($allGuides as $guide): ?>
                    <option value="<?= htmlspecialchars($guide['name']) ?>"><?= htmlspecialchars($guide['name']) ?></option>
                <?php endforeach; ?>
            </select>
            
            <div class="button-group">
                
                <button class="btn btn-primary" style="background-color: #3aafa9; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;" onclick="showBookingForm('<?= $guide['name'] ?>')">
                    Book Now
                </button>
            </div>
       
    <script>
        function showBookingForm(guideName) {
            if (confirm(`Book ${guideName}? We'll contact you to confirm details.`)) {
                // Add actual booking logic here
                alert('Booking request sent! We will contact you shortly.');
            }
        }
    </script>

        </div>

        <button type="button" class="submit-btn" id="back-to-step2" style="margin-top: 10px;">Back</button>
        <button type="submit" class="submit-btn" style="margin-top: 10px;">Submit</button>
    </div>

    <script>
        const step1Container = document.querySelector('.container');
        const step2Container = document.getElementById('step2-container');
        const nextButton = document.querySelector('.submit-btn');
        const backButton = document.getElementById('back-to-step1');
        const nextToStep3Button = document.getElementById('next-to-step3');
        const step3Container = document.getElementById('step3-container');

        nextButton.addEventListener('click', (e) => {
            e.preventDefault();
            step1Container.style.display = 'none';
            step2Container.style.display = 'block';
        });

        backButton.addEventListener('click', () => {
            step2Container.style.display = 'none';
            step1Container.style.display = 'block';
        });

        nextToStep3Button.addEventListener('click', () => {
            step2Container.style.display = 'none';
            step3Container.style.display = 'block';
        });

        const backToStep2Button = document.getElementById('back-to-step2');
        backToStep2Button.addEventListener('click', () => {
            step3Container.style.display = 'none';
            step2Container.style.display = 'block';
        });
    </script>

    <script>
        // Add JavaScript for interactive elements
        document.querySelectorAll('.am-pm').forEach(btn => {
            btn.addEventListener('click', () => {
                btn.parentNode.querySelectorAll('.am-pm').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });

        document.querySelectorAll('.counter button').forEach(btn => {
            btn.addEventListener('click', () => {
                const span = btn.parentNode.querySelector('span');
                let count = parseInt(span.textContent);
                if (btn.textContent === '+') {
                    count++;
                } else {
                    count = Math.max(0, count - 1);
                }
                span.textContent = count;
            });
        });
    </script>
=======
     <main>
            <div class="guider-container">
                <div class="filter">
                    <h1>Tour Guides</h1>
                </div>

                <div class="guider-details">
                    <div class="bar">
                        <div class="inside">
                            <div class="search-item">
                                <p>Starting Date</p>
                                <div class="group">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62">
                                        <path d="M202.87-71.87q-37.78 0-64.39-26.61t-26.61-64.39v-554.26q0-37.78 26.61-64.39t64.39-26.61H240v-80h85.5v80h309v-80H720v80h37.13q37.78 0 64.39 26.61t26.61 64.39v554.26q0 37.78-26.61 64.39t-64.39 26.61H202.87Zm0-91h554.26V-560H202.87v397.13Zm0-477.13h554.26v-77.13H202.87V-640Zm0 0v-77.13V-640ZM480-398.09q-17.81 0-29.86-12.05T438.09-440q0-17.81 12.05-29.86T480-481.91q17.81 0 29.86 12.05T521.91-440q0 17.81-12.05 29.86T480-398.09Zm-160 0q-17.81 0-29.86-12.05T278.09-440q0-17.81 12.05-29.86T320-481.91q17.81 0 29.86 12.05T361.91-440q0 17.81-12.05 29.86T320-398.09Zm320 0q-17.48 0-29.7-12.05-12.21-12.05-12.21-29.86t12.21-29.86q12.22-12.05 29.82-12.05t29.7 12.05q12.09 12.05 12.09 29.86t-12.05 29.86q-12.05 12.05-29.86 12.05Zm-160 160q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm-160 0q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm320 0q-17.48 0-29.7-12.21-12.21-12.22-12.21-29.82t12.21-29.7q12.22-12.09 29.82-12.09t29.7 12.05q12.09 12.05 12.09 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Z"/>
                                    </svg>                            

                                    <input type="date" id="sDate" placeholder="Starting Date">
                                </div>
                                <span class="form-invalid" id="sDate-error"> </span>

                            </div>

                            <div class="search-item">
                                <p>End Date</p>
                                <div class="group">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62">
                                        <path d="M202.87-71.87q-37.78 0-64.39-26.61t-26.61-64.39v-554.26q0-37.78 26.61-64.39t64.39-26.61H240v-80h85.5v80h309v-80H720v80h37.13q37.78 0 64.39 26.61t26.61 64.39v554.26q0 37.78-26.61 64.39t-64.39 26.61H202.87Zm0-91h554.26V-560H202.87v397.13Zm0-477.13h554.26v-77.13H202.87V-640Zm0 0v-77.13V-640ZM480-398.09q-17.81 0-29.86-12.05T438.09-440q0-17.81 12.05-29.86T480-481.91q17.81 0 29.86 12.05T521.91-440q0 17.81-12.05 29.86T480-398.09Zm-160 0q-17.81 0-29.86-12.05T278.09-440q0-17.81 12.05-29.86T320-481.91q17.81 0 29.86 12.05T361.91-440q0 17.81-12.05 29.86T320-398.09Zm320 0q-17.48 0-29.7-12.05-12.21-12.05-12.21-29.86t12.21-29.86q12.22-12.05 29.82-12.05t29.7 12.05q12.09 12.05 12.09 29.86t-12.05 29.86q-12.05 12.05-29.86 12.05Zm-160 160q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm-160 0q-17.81 0-29.86-12.21-12.05-12.22-12.05-29.82t12.05-29.7q12.05-12.09 29.86-12.09t29.86 12.05q12.05 12.05 12.05 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Zm320 0q-17.48 0-29.7-12.21-12.21-12.22-12.21-29.82t12.21-29.7q12.22-12.09 29.82-12.09t29.7 12.05q12.09 12.05 12.09 29.86 0 17.48-12.05 29.7-12.05 12.21-29.86 12.21Z"/>
                                    </svg>
                                    <input type="date" id="eDate" placeholder="End Date">
                                </div>
                                <span class="form-invalid" id="eDate-error"> </span>

                            </div>

                            <div class="search-item">
                                <p>Category</p>    
                                <div class="group">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1d5a62">
                                        <path d="M80-140v-320h320v320H80Zm80-80h160v-160H160v160Zm60-340 220-360 220 360H220Zm142-80h156l-78-126-78 126ZM863-42 757-148q-21 14-45.5 21t-51.5 7q-75 0-127.5-52.5T480-300q0-75 52.5-127.5T660-480q75 0 127.5 52.5T840-300q0 26-7 50.5T813-204L919-98l-56 56ZM660-200q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM320-380Zm120-260Z"/>
                                    </svg>
                                                
                                    <select id="category">
                                        <option value="all" selected>All Categories</option>
                                            <?php foreach ($data['categories'] as $category) : ?>
                                        <option value="<?php echo htmlspecialchars($category->category_id); ?>">
                                            <?php echo htmlspecialchars($category->category_name); ?>
                                        </option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p>Showing All Tour Guides()</p>

                <div class="container1">
                    <?php if (!empty($data['equipments']) && is_array($data['equipments'])) : ?>
                    <?php foreach ($data['equipments'] as $equipment) : ?>

                    <div class="equipment-card">
                        <div class="image-container">
                            <?php
                                $images = !empty($equipment->images) ? explode(',', $equipment->images) : [];
                                $firstImage = !empty($images) ? trim($images[0]) : 'default.jpg';
                            ?>
                            <img src="<?php echo URLROOT . '/' . htmlspecialchars($firstImage); ?>" alt="equipment" class="equipment-image">
                        </div>
                        <div class="card-content">
                            <h3 class="product-name"><?php echo htmlspecialchars($equipment->rental_name); ?></h3>
                            <p class="rate">Rs. <?php echo htmlspecialchars($equipment->price_per_day); ?></p>
                            <div class="rating-container">
                                <div class="stars">★★★★☆</div> <!-- 4 out of 5 stars -->
                                <p class="rating-text">4.0</p>
                            </div>
                            <div class="bottom">
                            <a href="<?php echo URLROOT; ?>/users/viewProduct/<?php echo $equipment->id; ?>">                 
                                <button class="pay-button">View & Rent</button>
                            </a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                    <?php else : ?>
                        <p>No Guiders found.</p>
                
                    <?php endif; ?>
                </div>

            </div>
            </main>
        </div>      
</div>

     
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
     <script src="<?php echo URLROOT;?>/js/logout.js"></script>
    <script src="<?php echo URLROOT;?>/js/submenu.js"></script>
>>>>>>> main
</body>
</html>