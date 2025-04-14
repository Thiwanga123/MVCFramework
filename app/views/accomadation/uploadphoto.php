<html>
<head>
    <title>Upload Photos</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/accomodation/uploadphoto.css">
    <style>
        .preview-container {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
            gap: 10px;
        }
        .image-preview {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .drop-highlight {
            border: 2px dashed #007bff !important;
            background-color: rgba(0, 123, 255, 0.1);
        }
    </style>
</head>
<body>

<?php require APPROOT . '/views/inc/components/startheader.php'; ?>
<div class="container">
    <div class="upload-section">
        <h1>What does your place look like?</h1>
        <p>Upload at least 5 photos of your property. The more you upload, the more likely you are to get bookings. You can add more later.</p>
        <form id="uploadForm" action="<?php echo URLROOT;?>/accomadation/addProperty" method="POST" enctype="multipart/form-data">
            <div class="upload-box" id="drop-area">
                <img alt="Upload icon" height="50" src="https://storage.googleapis.com/a1aa/image/aBNA8zWRGO5XJFgGvliQFVyCeB1Sbcl9KR5XmQbo1MMo1D8JA.jpg" width="50"/>
                <p>Drag and drop or</p>
                <button type="button" class="upload-button" id="uploadButton">
                    <i class="fas fa-upload"></i> Upload photos
                </button>
                <input type="file" id="fileInput" style="display: none;" multiple accept="image/jpeg, image/png" name="propertyImages[]" required>
                <p>The image type should be jpg/jpeg or png</p>
            </div>
            <div id="previewContainer" class="preview-container"></div>
            <button type="submit" class="upload-button" style="margin-top: 20px;">Submit</button>
        </form>
    </div>
</div>

<script src="<?php echo URLROOT;?>/js/imageUploader.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('uploadForm');
    const fileInput = document.getElementById('fileInput');
    const uploadButton = document.getElementById('uploadButton');

    uploadButton.addEventListener('click', function() {
        fileInput.click();
    });

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        if (fileInput.files.length < 1) {
            alert("Please upload at least one image");
            return;
        }
        
        uploadProperty();
    });
});

function uploadProperty() {
    const form = document.getElementById('uploadForm');
    const fileInput = document.getElementById('fileInput');
    const formData = new FormData();
    
    // Get data from localStorage
    const propertyData = JSON.parse(localStorage.getItem("propertyinfoData"));
    
    // Add all property data to formData
    for (const key in propertyData) {
        if (propertyData.hasOwnProperty(key)) {
            formData.append(key, propertyData[key]);
        }
    }
    
    // Add all files to formData
    for (let i = 0; i < fileInput.files.length; i++) {
        formData.append("propertyImages[]", fileInput.files[i]);
    }
    
    fetch('<?php echo URLROOT;?>/accomadation/addProperty', {
        method: 'POST',
        body: formData // Use FormData for file uploads instead of JSON
    }).then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();       
    })
    .then(data => {
        console.log("Response from server:", data);
        
        if (data.status === 'success') {
            alert("Property has been added successfully");
            window.location.href = "<?php echo URLROOT;?>/accomadation/success";
            localStorage.clear(); // Clear localStorage on success
        } else {
            const errorMessage = Array.isArray(data.message) ? data.message.join(', ') : data.message;
            alert("An error occurred: " + errorMessage);
        }
    })
    .catch(error => {
        console.error("Error:", error);  
        alert("An error occurred. Please try again later.");
    });
}
</script>

</body>
</html>