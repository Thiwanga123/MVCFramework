<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            padding: 20px;
            height: 100vh;
            /* overflow: hidden; */
        }

        .container {
            max-width: 1400px;
            height: calc(100vh - 20px);
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
        }

        .image-section {
            flex: 1;
            position: relative;
        }

        .property-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px 0 0 10px;
        }

        .property-details {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .property-title {
            color: #1a365d;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .property-location {
            color: #4a5568;
            margin-bottom: 20px;
        }

        .property-price {
            background-color: #2b6cb0;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 25px;
            padding: 15px 0;
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
        }

        .feature {
            color: #4a5568;
        }

        .feature span {
            display: block;
            font-weight: bold;
            color: #2b6cb0;
            margin-top: 5px;
        }

        .description {
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .amenities {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .amenity {
            background-color: #ebf8ff;
            color: #2b6cb0;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 14px;
        }

        @media (max-width: 968px) {
            .container {
                flex-direction: column;
                height: auto;
            }

            .image-section {
                height: 300px;
            }

            .property-image {
                border-radius: 10px 10px 0 0;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-section">
            <img src="<?php echo URLROOT;?>/Images/Accomadation.jpg" alt="Property View" class="property-image">
        </div>
        
        <div class="property-details">
            <h1 class="property-title">Luxury Ocean View Villa</h1>
            <p class="property-location">Beachfront, Maldives</p>
            
            <div class="property-price">$200 per Day</div>
            
            <div class="features">
                <div class="feature">
                    Available Single Rooms
                    <span>10</span>
                </div>
                <div class="feature">
                    Available Double Rooms
                    <span>10</span>
                </div>
                <div class="feature">
                    Available Family Rooms
                    <span>5</span>
                </div>
                <div class="feature">
                    Available Bathrooms
                    <span>3</span>
                </div>
                <div class="feature">
                    Available Guests
                    <span>8</span>
                </div>
                <div class="feature">
                    Check-in
                    <span>from:</span>
                    <span>to:</span>
                </div>
                <div class="feature">
                    Check-out
                    <span>from:</span>
                    <span>to:</span>
                </div>
                <div class="feature">
                    Smoking
                    <span>Allowed</span>
                </div>
                <div class="feature">
                    Pets
                    <span>Allowed</span>
                </div>
                <div class="feature">
                    Parties
                    <span>Allowed</span>
                </div>
                <div class="feature">
                    Children
                    <span>Allowed</span>
                </div>
                <div class="feature">
                    Cots
                    <span>No</span>
                </div>
            </div>
            
            <!-- <div class="description">
                Experience luxury living in this stunning beachfront villa. Featuring panoramic ocean views, 
                modern amenities, and direct beach access. Perfect for families and groups looking for an 
                unforgettable tropical getaway.
            </div> -->
            
            <div class="amenities">
                <div class="amenity">Private Pool</div>
                <div class="amenity">Beach Access</div>
                <div class="amenity">Free WiFi</div>
                <div class="amenity">Air Conditioning</div>
                <div class="amenity">Kitchen</div>
                <div class="amenity">Ocean View</div>
            </div>
        </div>
    </div>
</body>
</html>