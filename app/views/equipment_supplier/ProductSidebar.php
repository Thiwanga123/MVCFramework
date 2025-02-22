<div class="sidebar">
    <div class="top">
        <a href="#" class="logo">
            <img src="<?php echo URLROOT;?>/Images/Logo1.png">
            <div class="logo-name">JOURNEY <br><span>BEYOND</span></div>
        </a>
        <svg class="menu" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
        </svg>
    </div>

    <ul class="side-menu">
        <li>
            <a href="<?php echo URLROOT;?>/equipment_suppliers/">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                <path d="M120-160q-33 0-56.5-23.5T40-240v-560q0-33 23.5-56.5T120-880h200q43 0 80.5 16.5T464-824q27-19 64.5-31.5T600-868h240q33 0 56.5 23.5T920-788v548q0 33-23.5 56.5T840-160H600q-36 0-73.5 12.5T462-116q-38-27-75.5-40.5T300-170H120Zm0-80h180q45 0 85 14t75 38q36-25 75.5-38.5T600-240h240v-520H600q-48 0-91.5 21.5T432-678l-24 18-24-18q-37-28-80.5-49T200-760H120v520Zm0 0v-520 520Z"/>
            </svg>
                Details
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT;?>equipment_suppliers/">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path d="M160-120v-720h640v720H160Zm80-80h480v-560H240v560Zm80-120v-40h320v40H320Zm0-120v-40h320v40H320Zm0-120v-40h320v40H320Zm0-120v-40h320v40H320Z"/>
                </svg>
                Booking History
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT;?>equipment_suppliers/">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path d="m363-390 117-71 117 71-31-133 104-90-137-11-53-126-53 126-137 11 104 90-31 133ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Z"/>
                </svg>
                Reviews
            </a>
        </li>

        <li>
            <a href="<?php echo URLROOT;?>/equipment_suppliers/MyInventory">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path d="M480-160 200-440l56-56 184 184v-408L256-536l-56-56 280-280 280 280-56 56-184-184v408l184-184 56 56-280 280Z"/>
                </svg>
                Back to Products
            </a>
        </li>
    </ul>
</div>

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

            <div class="profile-submenu">
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
            </div>
        </nav>

     <script>
     document.addEventListener('DOMContentLoaded', function() {
        
        const rentalsLink = document.getElementById("rentalsLink");
        const submenu = document.querySelector(".submenu");
        const arrow = rentalsLink.querySelector(".arrow");

        rentalsLink.addEventListener("click", function(event) {
        event.preventDefault(); 
        
        submenu.classList.toggle("show");  
        arrow.style.transform = submenu.classList.contains("show") ? "rotate(180deg)" : "rotate(0deg)"; 
        
    });
});

</script>