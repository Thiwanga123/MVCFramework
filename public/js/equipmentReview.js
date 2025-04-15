document.addEventListener("DOMContentLoaded", function () {

    const reviewBtn = document.getElementById('reviewBtn');
    const reviewModal = document.getElementById('reviewModal');
    const closeBtn = document.getElementById('closeReviewModal');
    const statusMessage = document.getElementById('errorReviewContainer');

    console.log("Bookings", bookings);
    console.log("User ID", userId);
    
   //CHECKING THE IDEAL CONDITIONS TO LET A USER MAKE A REVIEW
    reviewBtn.addEventListener('click', function() {
        const today = new Date();
        let userHasBooking = false;
        let canReview = false;

        for(let booking of bookings){
            const endDate = new Date(booking.end_date);
            const bookingUserId = booking.user_id; 
            if (bookingUserId == userId) {  // Checking if the booking belongs to the current user
                userHasBooking = true;
                if (booking.status.toLowerCase() === 'completed' &&endDate < today) { //Checking if the booking is completed and the rental period is over
                    canReview = true;
                    break;
                }
            }
        }

        if (canReview) {
            reviewModal.style.display = 'flex';
            statusMessage.textContent = "";
            statusMessage.style.display = "none";
        } else if (userHasBooking) {
            statusMessage.textContent = "You can only add a review after your booking is completed and the rental period is over.";
            statusMessage.style.display = 'block';
        } else {
            statusMessage.textContent = "You have not made any bookings for this product.";
            statusMessage.style.display = 'block';
        }
       
    });

    closeBtn.addEventListener('click', function() {
        reviewModal.style.display = 'none';
    });

    //HANDLING THE STAR RATING SYSTEM IN REVIEWS
    const stars = document.querySelectorAll(".reviewStar");
    const ratingValueInput = document.getElementById("ratingValue");

    let selectedRating = 0;

    stars.forEach((star) => {
      star.addEventListener("mouseover", () => {
        const value = parseInt(star.getAttribute("data-value"));
        highlightStars(value);
      });

      star.addEventListener("mouseout", () => {
        highlightStars(selectedRating);
      });

      star.addEventListener("click", () => {
        selectedRating = parseInt(star.getAttribute("data-value"));
        ratingValueInput.value = selectedRating;
        highlightStars(selectedRating);
      });
    });

    function highlightStars(rating) {
      stars.forEach((star) => {
        const starValue = parseInt(star.getAttribute("data-value"));
        if (starValue <= rating) {
          star.style.color = "#f5c518"; 
        } else {
          star.style.color = "#ccc"; 
        }
      });
    }

    highlightStars(0);

});