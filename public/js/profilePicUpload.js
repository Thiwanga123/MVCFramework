document.addEventListener('DOMContentLoaded', () => {

    const profileImageInput = document.getElementById("profileImage");
    const preview = document.getElementById("profilePreview");
    const imageActionButtons = document.getElementById("imageActionButtons");
    const cancelBtn = document.getElementById("cancelImageBtn");
    const imageChangeBtn = document.getElementById("imageChangeBtn");

    const originalImageSrc = preview.src;

    document.getElementById("imageChangeBtn").addEventListener("click", function () {
        profileImageInput.click();
    });

    profileImageInput.addEventListener("change", function () {
        const [file] = this.files;
        if (file) {
            preview.src = URL.createObjectURL(file);
            imageActionButtons.style.display = "flex";
            imageChangeBtn.style.display = "none";
        }
    });

    cancelBtn.addEventListener("click", function () {
        preview.src = originalImageSrc; 
        profileImageInput.value = '';   
        imageActionButtons.style.display = "none"; 
        imageChangeBtn.style.display = "block";

    });
})