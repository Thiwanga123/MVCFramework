document.addEventListener('DOMContentLoaded', function () {
    const revealBtn = document.querySelector('.revealBtn');
    const bottomSection = document.querySelector('.dashboard-container .bottom');

    if (revealBtn && bottomSection) {
        revealBtn.addEventListener('click', function () {
            bottomSection.classList.add('show');
        });
    }
});


