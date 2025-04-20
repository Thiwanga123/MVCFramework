document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('imageChangeBtn').addEventListener('click', function() {
        document.getElementById('profileImageInput').click();
    });
    
    document.getElementById('profileImageInput').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('profileImagePreview').src = URL.createObjectURL(file);
        }
    });
    
})