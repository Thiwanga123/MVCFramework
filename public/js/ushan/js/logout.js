document.addEventListener('DOMContentLoaded', function() {
    const logoutConfirmModal = document.getElementById('logoutConfirmModal');
    const closeLogoutModal = document.getElementById('closeLogoutModal');
    const cancelLogoutBtn = document.getElementById('cancelLogout');
    const logoutLink = document.getElementById('logout');
    const confirmLogoutBtn = document.getElementById('confirmLogout');
    const submenu = document.getElementById('profileSubmenu');
    
    function openModal() {
        logoutConfirmModal.classList.add('show');
        submenu.style.display = "none";
    }
    
    function closeModal() {
        logoutConfirmModal.classList.remove('show');
    }
    
    logoutLink.addEventListener('click', openModal);
    closeLogoutModal.addEventListener('click', closeModal);
    cancelLogoutBtn.addEventListener('click', closeModal);

    confirmLogoutBtn.addEventListener('click', function() {
        delayedLogout();
    });

    
    function delayedLogout() {
        document.getElementById("2").style.display = "block";  
        document.getElementById("1").style.display = "none";   

        setTimeout(() => {
            document.getElementById('logoutForm').submit();
        }, 1000); 
    }
    
    window.addEventListener('click', function(event) {
        if (event.target === logoutConfirmModal) {
            closeModal();
        }
    });

    
    
});