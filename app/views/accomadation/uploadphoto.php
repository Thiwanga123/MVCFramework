<html>
<head>
    <title>Upload Photos</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/accomodation/uploadphoto.css">
    <style>
    </style>
</head>
<body>

<?php require APPROOT . '/views/inc/components/startheader.php'; ?>
<div class="container">
    <div class="upload-section">
        <h1>What does your place look like?</h1>
        <p>Upload at least 5 photos of your property. The more you upload, the more likely you are to get bookings. You can add more later.</p>
        <form id="uploadForm" action="<?php echo URLROOT;?>/accomadation/addProperty" method="POST" enctype="multipart/form-data">
            <div class="upload-box">
                <img alt="Upload icon" height="50" src="https://storage.googleapis.com/a1aa/image/aBNA8zWRGO5XJFgGvliQFVyCeB1Sbcl9KR5XmQbo1MMo1D8JA.jpg" width="50"/>
                <p>Drag and drop or</p>
                <button type="button" class="upload-button" id="uploadButton">
                    <i class="fas fa-upload"></i> Upload photos
                </button>
                <input type="file" id="fileInput" style="display: none;" multiple accept="image/jpeg, image/png" name="accommodationImages[]" multiple required>
                <p>The image type should be jpg/jpeg or png</p>
            </div>
            <button type="submit"  class="upload-button" id="uploadButton" >Submit</button>
        </form>
    </div>
</div>

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
        uploadphoto();
    });
});

function uploadphoto() {
    const form = document.getElementById('uploadForm');
    // const formData = new FormData(form);
    const finalData = JSON.parse(localStorage.getItem("propertyinfoData"));

     // Append additional data to formData
    //  for (const key in finalData) {
    //     if (finalData.hasOwnProperty(key)) {
    //         formData.append(key, finalData[key]);
    //     }
    // }
    
    
    fetch('<?php echo URLROOT;?>/accomadation/addProperty', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(finalData)
    }).then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();       
    })
    .then(data => {
        console.log("Response from server:", data);
        //check if the status is successful and redirect to the success page

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
        alert("An error occurred. Please try again Later." );
    });
}

</script>

</body>
</html>