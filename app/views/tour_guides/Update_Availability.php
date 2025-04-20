<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/newbooking.css.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    <title>Guider Availability</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <style>
    
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            background: #f4f4f4;
        }
        .container {
            max-width: 10000px;
            margin: 0 auto;
        }
        .header {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px #17252a;
        }
        .add-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
            align-items: end;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background: #2b7a78;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #2b7a78;
        }
        .schedule-list {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px #17252a;
        }
        .schedule-item {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            padding: 15px;
            border-bottom: 1px solid #eee;
            align-items: center;
        }
        .schedule-item:last-child {
            border-bottom: none;
        }
        .delete-btn {
            background: #ff4444;
            padding: 5px 10px;
        }
        .delete-btn:hover {
            background: #cc0000;
        }
        .price {
            font-weight: bold;
            color: #3aafa9;
        }
        .location {
            color: #666;
            font-size: 0.9em;
        }
        .filters {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .filter-btn {
            background: #333;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9em;
        }
        .filter-btn.active {
            background: #3aafa9;
        }
        @media (max-width: 768px) {
            .schedule-item {
                grid-template-columns: 1fr;
            }
            .add-form {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- SideBar -->
    <?php include('Sidebar.php'); ?>
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
            <a href="#" class="profile">
            <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>
     <main>
            <div class="header">
                <div class="left">
<<<<<<< HEAD
            <h1>Guider Availability</h1>
=======
                    <h1>Update Availability</h1>
                </div>

                <div class="right">
                        <button class="add-btn" name ="add-btn" id="add-btn">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                            <h3>Add Availability</h3>
                        </button>
                </div>
            </div>

            <div class="Inventory ">
                <div>
                <div class="header">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    <h3>Guider Availability</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                </div>
                <table>
                    <thead>
                        <tr>
                           
                            
                            <th>Available Date</th>
                            <th>Available Time From</th>
                            <th>Available Time To</th>
                            <th>Chargers per hour</th>
                            <th>Location</th>
                           <th>Action</th>
                          
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach($availability as $available): ?>
                        <tr>
                           
                        
                            <td><?php echo $available->available_date; ?></td>
                            <td><?php echo $available->available_time_from; ?></td>
                            <td><?php echo $available->available_time_to; ?></td>
                            <td><?php echo $available->charges_per_hour; ?></td>
                            <td><?php echo $available->location; ?></td>
                            <td class="action-button">
                                <button class="edit-btn" name ="edit-btn" id="edit-btn" style="delete-btn {background-color: rgb(107, 239, 122);color: white; font-size: medium;cursor: pointer;padding: 5px 15px;border-radius: 20px;border-style: none; margin-top: 1rem;}">
        Edit
    </button>
                                <a href="<?php echo URLROOT; ?>/tour_guides/delete_availability/<?php echo $available->id; ?>"><button class="delete-btn" onclick="return confirm('Are u Sure?');" name ="delete-btn" id="delete-btn">
                                   Delete
                                </button></a>
                    </tr>
                    <?php endforeach; ?>
                  
                  
                  
                           
                       
                    </tbody>
                </table> 
                <div id="map" style="height: 500px; width: 100%;"></div>
            </div>
            </div>
>>>>>>> main
            
        </div>
        <div class="right">
                       
                        
                            
                </div>
            </div>
        <br>
        <div class="Inventory ">
                <div>
               
   
    <div class="container">
        <div class="header">
           
            <form id="scheduleForm" class="add-form">
                <div class="form-group">
                    <label for="day">Day</label>
                    <select id="day" required>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="startTime">Start Time</label>
                    <input type="time" id="startTime" required>
                </div>
                <div class="form-group">
                    <label for="endTime">End Time</label>
                    <input type="time" id="endTime" required>
                </div>
                <div class="form-group">
                    <label for="price">Price (LKR)</label>
                    <input type="number" id="price" min="0" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" required>
                    <button type="button" onclick="getCurrentLocation()" style="margin-top: 5px;">Use Current Location</button>
                </div>
                <div class="form-group">
                    <button type="submit">Add Schedule</button>
                </div>
            </form>
        </div>

        <div class="filters">
            <button class="filter-btn active" onclick="filterSchedule('all')">All Days</button>
            <button class="filter-btn" onclick="filterSchedule('weekday')">Weekdays</button>
            <button class="filter-btn" onclick="filterSchedule('weekend')">Weekends</button>
        </div>

        <div class="schedule-list" id="scheduleList"></div>
    </div>

    <script>
        let schedules = JSON.parse(localStorage.getItem('schedules')) || [];
        let currentFilter = 'all';

        function getCurrentLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    async (position) => {
                        try {
                            const response = await fetch(
                                `https://nominatim.openstreetmap.org/reverse?lat=${position.coords.latitude}&lon=${position.coords.longitude}&format=json`
                            );
                            const data = await response.json();
                            document.getElementById('location').value = data.display_name;
                        } catch (error) {
                            alert('Error getting location name. Please enter manually.');
                        }
                    },
                    (error) => {
                        alert('Error getting location. Please enter manually.');
                    }
                );
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        }

        document.getElementById('scheduleForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const day = document.getElementById('day').value;
            const startTime = document.getElementById('startTime').value;
            const endTime = document.getElementById('endTime').value;
            const price = parseFloat(document.getElementById('price').value);
            const location = document.getElementById('location').value;
            
            if (startTime >= endTime) {
                alert('End time must be after start time');
                return;
            }

            const schedule = {
                id: Date.now(),
                day,
                startTime,
                endTime,
                price,
                location
            };

            schedules.push(schedule);
            localStorage.setItem('schedules', JSON.stringify(schedules));
            updateScheduleDisplay();
            this.reset();
        });

        function deleteSchedule(id) {
            schedules = schedules.filter(schedule => schedule.id !== id);
            localStorage.setItem('schedules', JSON.stringify(schedules));
            updateScheduleDisplay();
        }

        function filterSchedule(filter) {
            currentFilter = filter;
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            updateScheduleDisplay();
        }

        function updateScheduleDisplay() {
            const listElement = document.getElementById('scheduleList');
            let filteredSchedules = [...schedules];

            if (currentFilter === 'weekday') {
                filteredSchedules = schedules.filter(schedule => 
                    !['Saturday', 'Sunday'].includes(schedule.day));
            } else if (currentFilter === 'weekend') {
                filteredSchedules = schedules.filter(schedule => 
                    ['Saturday', 'Sunday'].includes(schedule.day));
            }

            filteredSchedules.sort((a, b) => {
                const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                return days.indexOf(a.day) - days.indexOf(b.day) || a.startTime.localeCompare(b.startTime);
            });

            listElement.innerHTML = filteredSchedules.map(schedule => `
                <div class="schedule-item">
                    <div><strong>${schedule.day}</strong></div>
                    <div>${formatTime(schedule.startTime)} - ${formatTime(schedule.endTime)}</div>
                    <div class="price">LKR ${schedule.price.toFixed(2)}</div>
                    <div class="location">📍 ${schedule.location}</div>
                    <div>
                        <button class="delete-btn" onclick="deleteSchedule(${schedule.id})">Delete</button>
                    </div>
                </div>
            `).join('');
        }

        function formatTime(time) {
            return new Date(`2000-01-01T${time}`).toLocaleTimeString([], { 
                hour: 'numeric', 
                minute: '2-digit',
                hour12: true 
            });
        }

        // Initial display update
        updateScheduleDisplay();
    </script>
</body>
</html>
