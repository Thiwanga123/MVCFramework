document.addEventListener('DOMContentLoaded', function() {
    // Setup drag and drop area
    let dropArea = document.getElementById('drop-area');
    let fileInput = document.getElementById('fileInput');
    let previewContainer = document.getElementById('previewContainer');
    
    // Prevent default behaviors for drag events
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
    });
    
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    
    // Highlight drop area when item is dragged over it
    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });
    
    function highlight() {
        dropArea.classList.add('drop-highlight');
    }
    
    function unhighlight() {
        dropArea.classList.remove('drop-highlight');
    }
    
    // Handle dropped files
    dropArea.addEventListener('drop', handleDrop, false);
    
    function handleDrop(e) {
        let dt = e.dataTransfer;
        let files = dt.files;
        
        // Pass to the input file element to make submission easier
        fileInput.files = files;
        
        // Trigger change event to show previews
        fileInput.dispatchEvent(new Event('change'));
    }
    
    // Handle when files are selected through the file input
    fileInput.addEventListener('change', function() {
        displayImagePreviews(this.files);
    });
    
    // Display image previews
    function displayImagePreviews(files) {
        previewContainer.innerHTML = ''; // Clear previous previews
        
        if (files.length > 0) {
            for (let i = 0; i < files.length; i++) {
                if (files[i].type.match('image.*')) {
                    let reader = new FileReader();
                    
                    reader.onload = function(e) {
                        let img = document.createElement('img');
                        img.classList.add('image-preview');
                        img.file = files[i];
                        img.src = e.target.result;
                        
                        previewContainer.appendChild(img);
                    }
                    
                    reader.readAsDataURL(files[i]);
                }
            }
        }
    }
});
