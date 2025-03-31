<nav>
            <div class="logo-box">
                <a href="#" class="logo">
                    <img src="<?php echo URLROOT;?>/Images/Logo1.png">
                    <div class="logo-name">JOURNEY <br><span>BEYOND</span></div>
                </a>
            </div>

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

            <!-- <div class="profile-submenu">
                <div class="profile-info">
                    <div class="profile-pic">
                        <img src="<?php echo URLROOT . '/path/to/profile-pic.jpg'; ?>" alt="Profile Picture">
                    </div>
                    <h4><?php echo $_SESSION['username']; ?></h4>
                    <p><?php echo $_SESSION['email']; ?></p>
                </div>
                <ul>
                    <li><a href="profile.php">My Profile</a></li>
                    <li><a href="change-password.php">Change Password</a></li>
                    <li><a href="feedback.php">Give Feedback</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div> -->
        </nav>