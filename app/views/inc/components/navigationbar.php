<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/navbar.css">
    <title>About </title>

</head>
<body>
    <header>
        <div class="logo">
            <a href="<?php echo URLROOT;?>/pages/home">
                <img src="<?php echo URLROOT;?>/Images/Logo1.png">
                <p>JOURNEY<br><span>BEYOND</span></p>
            </a>
        </div>

        <ul class="navbar">
            <li><a href="<?php echo URLROOT;?>/pages/home">Home</a></li>
            <li><a href="<?php echo URLROOT;?>/pages/about">About Us</a></li>
            <li><a href="<?php echo URLROOT;?>/pages/features">Features</a></li>
            <div class="links">
                <li><button class="SignIn" onclick="location.href='<?php echo URLROOT;?>/users/login'">Login</button></li>
                <li><button class="SignUp" onclick="location.href='<?php echo URLROOT;?>/users/register'">Sign Up</button></li>
            </div>
        </ul>
    </header>