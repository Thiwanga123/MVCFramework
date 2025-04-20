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
</body>
</html>