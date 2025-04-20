document.addEventListener('DOMContentLoaded', function() {
    const logoutConfirmModal = document.getElementById('logoutConfirmModal');
    const closeLogoutModal = document.getElementById('closeLogoutModal');
    const cancelLogoutBtn = document.getElementById('cancelLogout');
    const confirmLogoutBtn = document.getElementById('confirmLogout');
    const logoutLink = document.getElementById('logout');
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
        console.log('User confirmed logout');
        closeModal();
    });
    
    window.addEventListener('click', function(event) {
        if (event.target === logoutConfirmModal) {
            closeModal();
        }
    });
    
});