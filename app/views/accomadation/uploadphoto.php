<html>
 <head>
  <title>
   Upload Photos
  </title>
  <link rel="stylesheet" href="<?php echo URLROOT;?>/css/accomodation/uploadphoto.css">
  <style>

  </style>
 </head>
 <body>

 <?php require APPROOT . '/views/inc/components/startheader.php'; ?>
  <div class="container">
   <div class="upload-section">
    <h1>
     What does your place look like?
    </h1>
    <p>
     Upload at least 5 photos of your property. The more you upload, the more likely you are to get bookings. You can add more later.
    </p>
    <div class="upload-box">
     <img alt="Upload icon" height="50" src="https://storage.googleapis.com/a1aa/image/aBNA8zWRGO5XJFgGvliQFVyCeB1Sbcl9KR5XmQbo1MMo1D8JA.jpg" width="50"/>
     <p>
      Drag and drop or
     </p>
     <button class="upload-button" id="uploadButton">
      <i class="fas fa-upload">
      </i>
      Upload photos
     </button>
     <input type="file" id="fileInput" style="display: none;" multiple accept="image/jpeg, image/png">
     <p>
      The image type should be jpg/jpeg or png
     </p>
    </div>
    <div class="continue-button">
     <button class="disabled">
      <i class="fas fa-arrow-left">
      </i>
     </button>
     <button class="disabled">
      Continue
     </button>
    </div>
   </div>
   <div class="info-section">
    <h2>
     What if I don't have professional photos?
    </h2>
    <p>
     No problem! You can use a smartphone or a digital camera. Here are some tips for taking great photos of your property:
    </p>
    <a href="#">
     Here are some tips for taking great photos of your property
    </a>
    <p>
     If you don't know who took a photo, it's best to avoid using it. Only use photos others have taken if you have permission.
    </p>
   </div>
  </div>
  <script>
document.getElementById('uploadButton').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});
</script>
  
 </body>

</html>
