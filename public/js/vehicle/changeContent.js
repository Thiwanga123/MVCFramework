document.addEventListener("DOMContentLoaded", () => {
    const savedTab = localStorage.getItem("activeTab") || "details";

    let tabContent = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
    }

    let tabButtons = document.getElementsByClassName("tab-button");
    for (let i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove("active");
    }

    document.getElementById(savedTab).style.display = "block";

    for (let i = 0; i < tabButtons.length; i++) {
        if (tabButtons[i].getAttribute("onclick").includes(savedTab)) {
            tabButtons[i].classList.add("active");
            break;
        }
    }
});

window.openTab = function(event, name){
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
    localStorage.setItem("activeTab", name);
}