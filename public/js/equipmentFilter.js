document.addEventListener("DOMContentLoaded", function () {
    const filterBtn = document.getElementById("filter-btn");
    const filterBox = document.getElementById("filter-box");

    filterBtn.addEventListener("click", function () {
        if (filterBox.classList.contains("show")) {
            filterBox.style.maxHeight = filterBox.scrollHeight + "px";
            setTimeout(function () {
                filterBox.classList.remove("show");
                filterBox.style.maxHeight = "0"; 
            }, 10); 
        } else {
            filterBox.classList.add("show");
            filterBox.style.maxHeight = filterBox.scrollHeight + "px"; 
        }
    });
});