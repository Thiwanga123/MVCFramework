document.addEventListener("DOMContentLoaded", function () {

    const reviewBtn = document.getElementById('reviewBtn');
    const reviewModal = document.getElementById('reviewInsertModal');
    const closeBtn = document.getElementById('closeReviewInsertModal');
    const statusMessage = document.getElementById('errorReviewContainer');

    
   //CHECKING THE IDEAL CONDITIONS TO LET A USER MAKE A REVIEW AND THEN OPENING THE MODAL
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

    if(closeBtn){
      closeBtn.addEventListener('click', function() {
          reviewModal.style.display = 'none';
      });
    }

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

    //SENDING THE REVIEW TO THE SERVER FOR STORAGE
    const submitReviewBtn = document.getElementById("submitReviewBtn");
    const errorMessage = document.getElementById("validationErrorContainer");
    const reviewText = document.getElementById("reviewText");
    const starContainer = document.getElementById("reviewStarRating");
    const insertContent = document.getElementById('insertContent');
    const insertSuccessContent = document.getElementById('insertSuccessContent');
    const insertSuccessMessage = document.getElementById('insertSuccessModalMessage');
    const closeInsertSuccessModal = document.getElementById('closeReviewinsertSuccessModal');
    const closeInsertModal = document.getElementById('closeReviewInsertModal');

    reviewText.addEventListener("click", function() {
      errorMessage.textContent = "";
      errorMessage.style.display = "none";
    });

    starContainer.addEventListener("click", function() {
      errorMessage.textContent = "";
      errorMessage.style.display = "none";
    });

    if(closeInsertModal){
      closeInsertModal.addEventListener('click', function () {
        reviewModal.style.display = 'none';
      });
    }

    if(closeInsertSuccessModal){
      closeInsertSuccessModal.addEventListener('click', function () {
        reviewModal.style.display = 'none';
        location.reload();

      });
    }

    submitReviewBtn.addEventListener("click", async function() {
      // const userId = reviewModal.dataset.userId; // gETTING THE USER ID FROM THE STORED SESSION DATA
      const productId = reviewModal.dataset.productId;
      const rating = document.getElementById("ratingValue").value;
      const type = document.getElementById("reviewType").value;

      const comment = reviewText.value;

      if (!rating || comment.trim() === "") {
        errorMessage.textContent = "Please fill in all fields.";
        errorMessage.style.display = "block";
        return;
      }

      const formData = new FormData();
      formData.append("productId", productId);
      formData.append("rating", rating);
      formData.append("type", type);
      formData.append("comment", comment);
      
      try{
        const response = await fetch(`${URLROOT}/reviews/addReview`,{
          method: "POST",
          body: formData,
        });

        if(response.ok){
          const result = await response.json()
          console.log("JSON Response:", result);
        
          if(result.success){
            errorMessage.textContent = "";
            errorMessage.style.display = "none";
            insertContent.style.display = "none";
            insertSuccessContent.style.display = "flex";
            insertSuccessMessage.textContent = result.message || "Review submitted successfully!";
            insertSuccessMessage.style.display = "flex";
          }else{
            errorMessage.textContent = result.message || "Failed to submit review. Please try again.";
            errorMessage.style.display = "flex";
          }
        }else{
          const errorResponse = await response.text();
          console.log("Error Response:", errorResponse);
          errorMessage.textContent = "Failed to submit review. Please try again.";
          errorMessage.style.display = "flex";
        }
      }catch(error){
        console.error("Error:", error);
        errorMessage.textContent = "An error occurred while processing your request. Please try again later.";
        errorMessage.style.display = "block";
        return;
      }
    }); 

    //DELETING THE REVIEW
    const deleteBtn = document.getElementById("deleteReviewBtn");
    const deleteModal = document.getElementById('reviewDeleteModal');
    const closeDeleteModal = document.getElementById('closeReviewDeleteModal');
    const cancelBtn = document.getElementById('cancelDeleteBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    const content = document.getElementById('deleteContent');
    const successContent = document.getElementById('deleteSuccessContent');
    const deleteSuccessMessage = document.getElementById('deleteSuccessModalMessage');
    const deleteErrorMessage = document.getElementById('deleteModalErrorMessage');
    const closeDeleteSuccessModal = document.getElementById('closeReviewDeleteSuccessModal');
    let selectedReviewId = null; 

    if(deleteBtn){
      deleteBtn.addEventListener('click', function () {
        console.log(deleteModal);
        deleteModal.style.display = 'flex';
      });
    }

    closeDeleteModal.addEventListener('click', function () {
      deleteModal.style.display = 'none';
    });

    closeDeleteSuccessModal.addEventListener('click', function () {
      deleteModal.style.display = 'none';
    });

    cancelBtn.addEventListener('click', function () {
      deleteModal.style.display = 'none';
    });

    
      confirmDeleteBtn.addEventListener('click', async function () {
        const reviewId = deleteModal.getAttribute('data-review-id');
        const formData = new FormData();
        formData.append("reviewId", reviewId);

        try{
          const response = await fetch(`${URLROOT}/reviews/deleteReview`, {
            method : "POST",
            body : formData,
          });

          if(response.ok){
            const result = await response.json();
            console.log("JSON Response:", result);
            content.style.display = "none";
            successContent.style.display = "flex";
            deleteSuccessMessage.textContent = result.message || "Review deleted successfully!";

            location.reload();
          }else{
            const errorResponse = await response.text();
            console.log("Error Response:", errorResponse);
            content.style.display = "flex";
            successContent.style.display = "none";
            deleteErrorMessage.textContent = result.message || "Failed to delete review. Please try again.";
          }
        
        }catch(error){
          console.error("Error:", error);
          deleteErrorMessage.textContent = "An error occurred while processing your request. Please try again later.";
          content.style.display = "flex";
          return;
        }
    });
  
    //////////////////////////////////////EDITING THE REVIEW///////////////////////////////////////////////

    const reviewEditModal = document.getElementById('reviewEditModal');
    const closeEditModal = document.getElementById('closeReviewEditModal');
    const editBtn = document.getElementById('editReviewBtn');
    const saveBtn = document.getElementById('submitEditReviewBtn');
    const saveRatingValueInput = document.getElementById("editRatingValue");
    const editReviewText = document.getElementById('editReviewText');
    const editContent = document.getElementById('editContent');
    const editSuccessContent = document.getElementById('editSuccessContent');
    const editSuccessModalMessage = document.getElementById('editSuccessModalMessage');
    const editErrorContent = document.getElementById('editErrorContent');
    const editErrorModalMessage = document.getElementById('editErrorModalMessage');
    const closeReviewEditErrorModal = document.getElementById('closeReviewEditErrorModal');
    const closeReviewEditSuccessModal = document.getElementById('closeReviewEditSuccessModal');


    closeReviewEditErrorModal.addEventListener('click', function() {
      reviewEditModal.style.display = 'none';
    });
    
    if(editBtn){
      editBtn.addEventListener('click', function(){
        const ratingValueInput = document.getElementById("editRatingValue");
        let selectedRating = parseInt(ratingValueInput.value) || 0; 
        reviewEditModal.style.display = 'flex';
        highlightStars(selectedRating);

        stars.forEach((star) => {
          star.addEventListener("mouseover", () => {
            const value = parseInt(star.getAttribute("data-value"));
            highlightStars(value); // Highlight on hover
          });
        
          star.addEventListener("mouseout", () => {
            highlightStars(selectedRating); // Reset on mouse out
          });
        
          star.addEventListener("click", () => {
            selectedRating = parseInt(star.getAttribute("data-value"));
            saveRatingValueInput.value = selectedRating; // Set the selected rating to the hidden input
            highlightStars(selectedRating); // Update the stars
          });
        });

      });
    }

    if(saveBtn){
      saveBtn.addEventListener('click', async function(){
        const productId = reviewEditModal.dataset.productId;
        const reviewId = reviewEditModal.dataset.reviewId;
        const rating = saveRatingValueInput.value; 
        const comment = editReviewText.value;

        formData = new FormData();
        formData.append("reviewId", reviewId);
        formData.append("productId", productId);
        formData.append("rating", rating);
        formData.append("comment", comment);

        try {
          const response = await fetch(`${URLROOT}/reviews/editReview`, {
            method: "POST",
            body: formData,
          });
      
          if (response.ok) {
              const result = await response.json();
              console.log("JSON Response:", result);
              
            if(result.success){
              editContent.style.display = "none";
              editSuccessContent.style.display = "flex";
              editSuccessModalMessage.textContent = result.message || "Review Updated successfully!";
            }else{
              editContent.style.display = "none";
              editErrorContent.style.display = "flex"
              editErrorModalMessage.textContent = result.message || "Failed to submit review. Please try again.";
              editErrorModalMessage.style.display = "flex";
            }
          } else {
              const errorText = await response.text();
              console.log("Error Text:", errorText);
              editContent.style.display = "none";
              editErrorContent.style.display = "flex"
              editErrorModalMessage.textContent =  "An error occurred while processing your request. Please try again later.";
              editErrorModalMessage.style.display = "flex";
          }
        } catch (error) {
          console.error("Error occurred during fetch:", error);
              editContent.style.display = "none";
              editErrorContent.style.display = "flex"
              editErrorModalMessage.textContent =  "An error occurred while processing your request. Please try again later.";
              editErrorModalMessage.style.display = "flex";
        }
  });  
}

    closeEditModal.addEventListener('click', function(){
      reviewEditModal.style.display = 'none';
    });

    if(closeReviewEditSuccessModal){
      closeReviewEditSuccessModal.addEventListener('click',function() {
        editSuccessModalMessage.textContent = "";
        reviewEditModal.style.display = 'none';
        location.reload();
      });
    }

  
});

