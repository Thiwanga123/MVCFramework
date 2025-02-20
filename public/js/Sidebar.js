
document.addEventListener('DOMContentLoaded', () => {



//Checking Logout 
const sideLinks = document.querySelectorAll('.sidebar .side-menu li a');
sideLinks.forEach((item) =>{
    const li = item.parentElement;
    item.addEventListener('click', (event) => {

        if(item.classList.contains('logout')){
            const confirmLogout = confirm('Are you sure you want to Log Out?');

            if(!confirmLogout){
                event.preventDefault();
                return;
            }
        }
    });
});

// Making sidebar slide on and off
const sideBar = document.querySelector('.sidebar');
const menuButtons = document.querySelectorAll('.menu');

if (localStorage.getItem('sidebarState') === 'closed') {
    sideBar.classList.add('close');
}

menuButtons.forEach(menuButton => {
    menuButton.addEventListener('click', () => {
        sideBar.classList.toggle('close');
        localStorage.setItem('sidebarState', sideBar.classList.contains('close') ? 'closed' : 'open');
    });

});


function resize(){
    if (window.innerWidth <= 768) {
        sideBar.classList.add('close');
        localStorage.setItem('sidebarState', 'closed');
    }
}

resize();
window.addEventListener('resize',resize);


//Changing the active status dynamically when click on a menu

const items = document.querySelectorAll('.side-menu li');

items.forEach(item=>{
    item.addEventListener('click',function(){

        items.forEach(menu =>menu.classList.remove('active'));
        item.classList.add('active');
    });
});

// document.querySelector('.dropdown-btn').addEventListener('click', function() {
//     var subMenu = this.nextElementSibling;
//     subMenu.classList.toggle('active');
// });

})