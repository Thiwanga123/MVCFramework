document.addEventListener('DOMContentLoaded', function() {
    const profileBtn = document.querySelector('.profile');
    const submenu = document.getElementById('profileSubmenu');

    profileBtn.addEventListener('click', function (e) {
        e.preventDefault(); 
        submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
    });

    document.addEventListener('click', function (e) {
        const isClickInsideProfile = profileBtn.contains(e.target);
        const isClickInsideMenu = submenu.contains(e.target);

        if (!isClickInsideProfile && !isClickInsideMenu) {
            submenu.style.display = 'none';
        }
    });
});