document.addEventListener("DOMContentLoaded", () =>{

    document.getElementById("details").style.display = "block";
    document.querySelector(".tab-button").classList.add("active");


});

function openTab(event,name){
    let tabContent = document.getElementsByClassName("tab-content");

    for(let i =0; i < tabContent.length; i++){
        tabContent[i].style.display = "none";
    }

    let tabButtons = document.getElementsByClassName("tab-button");
    for (let i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove("active");
    }

    document.getElementById(name).style.display = "block";
    event.currentTarget.classList.add("active");
}