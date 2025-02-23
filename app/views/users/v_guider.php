<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/features.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/sidebarHeader.css">
    <title>Equipment</title>
</head>
<body>
    <!-- SideBar -->
    <?php require APPROOT . '/views/inc/components/usersidebar.php'; ?>
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
            <p>Hii Welcome <?php echo isset($_SESSION['name']) ? ' ' . htmlspecialchars($_SESSION['name']) : ''; ?> </p>
            <a href="#" class="profile">
                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>


        <main>
            <?php require APPROOT . '/views/inc/components/topbar.php'; ?>
            <section id="features" class="features">
       

            <?php
            
    
$destinations = [
    'Kandy, Sri Lanka',
    'Colombo, Sri Lanka',
    'Galle, Sri Lanka',
    'Nuwara Eliya, Sri Lanka',
    'Sigiriya, Sri Lanka'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Planner</title>
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
</head>
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

        <form action="v_guider2.php" method="POST">
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
                <select>
                    <option>Select language</option>
                    <option>English</option>
                    <option>French</option>
                    <option>German</option>
                </select>
            </div>

            <div class="form-group">
                <label>Gender of the Guider that you want</label>
                <div class="checkbox-group">
                    <button type="button" class="am-pm">Male</button>
                    <button type="button" class="am-pm">Female</button>
                </div>
            </div>

            <button type="submit" class="submit-btn" style="margin-top: 10px;">Next</button>
        </form>
    </div>

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