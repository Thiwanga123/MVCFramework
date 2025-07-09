document.addEventListener("DOMContentLoaded", function () {
    const replyButtons = document.querySelectorAll(".btn-reply");
    const modal = document.getElementById("replyModal");

    replyButtons.forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            
            const row = this.closest(".review-row");
            const id = row.dataset.id;
            const name = row.dataset.name;
            const date = row.dataset.reviewDate
            const image = row.dataset.image;
            const comment = row.dataset.comment;
            const rating = parseInt(row.dataset.rating);

            document.getElementById("modalCustomerName").textContent = name;
            document.getElementById("modalProfileImage").src = image;
            document.getElementById("modalReviewId").value = id;
            document.getElementById("modalReviewDate").textContent = date;
            document.getElementById("modalComment").textContent = comment;
            document.getElementById("modalReviewId").value = id;
            document.getElementById("replyForm").action = `<?= URLROOT; ?>/reviews/reply/${id}`;

            // Generate stars
            const ratingContainer = document.getElementById("modalRating");
            ratingContainer.innerHTML = '';
            for (let i = 1; i <= 5; i++) {
                const star = document.createElement('span');
                star.className = 'star' + (i <= rating ? ' filled' : '');
                star.innerHTML = '&#9733;';
                ratingContainer.appendChild(star);
            }

            // Show modal
            modal.style.display = "flex";
        });
    });
});

function closeModal() {
    document.getElementById("replyModal").style.display = "none";
}
window.onclick = function(event) {
    const modal = document.getElementById("replyModal");
    if (event.target === modal) {
        closeModal();
    }
};