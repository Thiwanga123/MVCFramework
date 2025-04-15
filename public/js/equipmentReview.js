document.addEventListener("DOMContentLoaded", function () {

    const reviewBtn = document.getElementById('reviewBtn');
    const reviewModal = document.getElementById('reviewModal');
    const closeBtn = document.getElementById('closeReviewModal');
    const statusMessage = document.getElementById('errorReviewContainer');

    console.log("Bookings", bookings);
    console.log("User ID", userId);
    
   
    reviewBtn.addEventListener('click', function() {
        const today = new Date();
        let userHasBooking = false;
        let canReview = false;

        for(let booking of bookings){
            const endDate = new Date(booking.end_date);
            const bookingUserId = booking.user_id;
            if (bookingUserId == userId) {
                userHasBooking = true;
                if (booking.status.toLowerCase() === 'completed' &&endDate < today) {
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
});