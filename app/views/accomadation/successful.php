<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Accommodation Added Successfully</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #cce0ff, #80b3ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #f0f4ff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }
        .icon {
            font-size: 50px;
            color: green;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
        }
        .image-container {
            margin: 20px 0;
        }
        .image-container img {
            width: 100%;
            border-radius: 10px;
        }
        .description {
            font-size: 16px;
            color: #555;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color:rgb(14, 93, 212);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .button:hover {
            background-color:rgb(100, 144, 233);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="title">
            Accommodation Added Successfully!
        </div>
        <div class="image-container">
            <img src="https://storage.googleapis.com/a1aa/image/Z51M6fSD2hxUNSiEWjSXwCA5T6YtdLX1XceXfYbfWk6VYDffE.jpg" alt="A beautiful mountain landscape with a small cabin and a colorful sky at sunset" width="400" height="300">
        </div>
        <div class="description">
            Your accommodation has been successfully added to journeybeyond. Thank you for contributing to our community!
        </div>
        <a href="<?php echo URLROOT;?>/accomadation/myInventory" class="button">Go to My Inventory</a>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>