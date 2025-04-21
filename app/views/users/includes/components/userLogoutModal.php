<div id="logoutConfirmModal" class="logoutConfirmModal">
    <div class="modal-content">
        <span class="close-button" id="closeLogoutModal">&times;</span>
        <div class="1" id="1">
            <div class="modal-icon">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 7L15.59 8.41L18.17 11H8V13H18.17L15.59 15.58L17 17L22 12L17 7Z" fill="#F44336"/>
                    <path d="M4 19H12V21H4C2.9 21 2 20.1 2 19V5C2 3.9 2.9 3 4 3H12V5H4V19Z" fill="#F44336"/>
                </svg>
            </div>
            <h2>Confirm Logout</h2>
            <p>Are you sure you want to log out of your account?</p>
            <div class="modal-buttons">
                <button id="cancelLogout" class="btn-cancel">Cancel</button>
                <form id="logoutForm" action="<?php echo URLROOT; ?>/users/logout" method="POST" style="display: none;"></form>
                <button id="confirmLogout" class="btn-logout">Logout</button>
            </div>
        </div>

        <div class="2" id="2" style="display: none;">
            <p>Logging out of the account. Please Wait</p>
        </div>
    </div>
</div>