<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Grand Kandyan</title>
    <style>
        body {
            background-color: #f5f5f5;
            color: #262626;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .hotel-title {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .rating-stars {
            color: #febb02;
            font-size: 18px;
        }

        .hotel-name {
            font-size: 24px;
            font-weight: 700;
            color: #262626;
        }

        .airport-shuttle {
            color: #6b6b6b;
            font-size: 14px;
            margin-left: 8px;
        }

        .location {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            color: #6b6b6b;
            font-size: 14px;
        }

        .location a {
            color: #0071c2;
            text-decoration: none;
            font-weight: 500;
        }

        .location-divider {
            margin: 0 4px;
            color: #6b6b6b;
        }

        .gallery {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 8px;
            margin-bottom: 24px;
        }

        .gallery img {
            border-radius: 4px;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .gallery img:hover {
            opacity: 0.9;
        }

        .main-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .thumbnail-grid {
            display: grid;
            grid-template-rows: 1fr 1fr;
            gap: 8px;
        }

        .thumbnail {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .property-highlights, .popular-facilities, .availability, .reviews, .guest-reviews {
            background: white;
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .highlights-title, .availability h2, .reviews h3, .guest-reviews h2 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .highlights-grid, .facility-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
        }

        .highlight-item, .facility-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .highlight-icon, .facility-icon {
            width: 24px;
            height: 24px;
            color: #6b6b6b;
        }

        .highlight-content h3, .facility-item h3 {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .highlight-content p, .facility-item p {
            font-size: 14px;
            color: #6b6b6b;
        }

        .availability-header {
            margin-bottom: 20px;
        }

        .search-container {
            border: 1px solid #e7e7e7;
            border-radius: 4px;
            margin-bottom: 24px;
        }

        .search-inputs {
            display: flex;
            border-bottom: 1px solid #e7e7e7;
        }

        .search-field {
            flex: 1;
            padding: 12px;
            border: none;
            border-right: 1px solid #e7e7e7;
            font-size: 14px;
            color: #262626;
        }

        .search-field:last-child {
            border-right: none;
        }

        .search-button {
            width: 100%;
            padding: 12px;
            background: #0071c2;
            color: white;
            border: none;
            font-weight: 500;
            cursor: pointer;
        }

        .room-list {
            margin-top: 20px;
        }

        .room-item {
            border-bottom: 1px solid #e7e7e7;
            padding: 20px 0;
        }

        .room-item:last-child {
            border-bottom: none;
        }

        .room-title {
            color: #0071c2;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 8px;
            display: inline-block;
        }

        .room-details {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-top: 8px;
            color: #6b6b6b;
        }

        .bed-icon {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        .occupancy-info {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 20px;
            margin-top: 12px;
        }

        .person-count {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .person-icon {
            width: 20px;
            height: 20px;
        }

        .price-button {
            padding: 8px 16px;
            background: #0071c2;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
        }

        .offer-badge {
            display: inline-block;
            background: #ebf3ff;
            color: #0071c2;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 14px;
            margin-top: 8px;
        }

        .special-offer {
            background: #ebf3ff;
            border-radius: 4px;
            padding: 8px;
            margin-top: 8px;
            font-size: 14px;
            color: #0071c2;
        }

        .info-icon {
            margin-left: 4px;
            cursor: help;
        }

        .review-score {
            background: #0071c2;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 700;
            font-size: 20px;
        }

        .review-text {
            font-size: 14px;
            color: #6b6b6b;
        }

        .map-container {
            margin-top: 24px;
            border-radius: 8px;
            overflow: hidden;
            height: 300px;
            background: #eee;
        }

        .map-placeholder {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .guest-comment {
            font-style: italic;
            color: #6b6b6b;
            margin-top: 8px;
        }

        .guest-info {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 12px;
        }

        .guest-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        .guest-country {
            display: flex;
            align-items: center;
            gap: 4px;
            color: #6b6b6b;
            font-size: 14px;
        }

        .availability-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .availability-table th,
        .availability-table td {
            border: 1px solid #e7e7e7;
            padding: 12px;
            text-align: left;
        }

        .availability-table th {
            background-color: #ebf3ff;
            color: #0071c2;
            font-weight: 700;
        }

        .availability-table td {
            background-color: white;
            color: #262626;
        }

        .availability-table .book-button {
            padding: 8px 16px;
            background: #0071c2;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
        }

        .fixed-button {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #0071c2;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="hotel-title">
                <div class="rating-stars">★★★★★</div>
                <h1 class="hotel-name">The Grand Kandyan
                    <span class="airport-shuttle">Airport shuttle</span>
                </h1>
            </div>
        </div>

        <!-- Location -->
        <div class="location">
            <i class="fas fa-map-marker-alt"></i>
            89/10, Lady Gordon's Drive, Kandy, 20000 Kandy, Sri Lanka
            <a href="#">Great location - show map</a>
            <span class="location-divider">–</span>
            Railway access
        </div>

        <!-- Gallery -->
        <div class="gallery">
            <img src="https://storage.googleapis.com/a1aa/image/BGUTWdrCTfTKF6woZn3veW1MCHXtEe69wofWZ0xg6tqceFFgC.jpg" alt="Hotel exterior with a grand entrance and lush greenery" class="main-image">
            <div class="thumbnail-grid">
                <img src="https://storage.googleapis.com/a1aa/image/PhJfiTVqnNRNEqHAlM8TFtyFQFzQzSX4Ve2GRv1JsC6pvoAUA.jpg" alt="Luxurious hotel interior with elegant decor" class="thumbnail">
                <img src="https://storage.googleapis.com/a1aa/image/rCmxzow1OcJbHxjc7oEks0pTbJOjXLfghNuyI86oYgCyXUAKA.jpg" alt="Hotel pool area with sun loungers and umbrellas" class="thumbnail">
            </div>
        </div>

        <!-- Property Highlights -->
        <div class="property-highlights">
            <h2 class="highlights-title">Property highlights</h2>
            <div class="highlights-grid">
                <div class="highlight-item">
                    <i class="fas fa-wheelchair highlight-icon"></i>
                    <div class="highlight-content">
                        <h3>Accessibility</h3>
                        <p>Wheelchair accessible, Lift, Emergency cord in bathroom</p>
                    </div>
                </div>
                <div class="highlight-item">
                    <i class="fas fa-spa highlight-icon"></i>
                    <div class="highlight-content">
                        <h3>Wellness</h3>
                        <p>Spa and wellness centre, Hot tub/Jacuzzi, Massage</p>
                    </div>
                </div>
                <div class="highlight-item">
                    <i class="fas fa-utensils highlight-icon"></i>
                    <div class="highlight-content">
                        <h3>Dining</h3>
                        <p>On-site restaurant, Bar, Room service</p>
                    </div>
                </div>
                <div class="highlight-item">
                    <i class="fas fa-dumbbell highlight-icon"></i>
                    <div class="highlight-content">
                        <h3>Leisure</h3>
                        <p>Outdoor pool, Fitness centre, Garden</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Facilities -->
        <div class="popular-facilities">
            <h2 class="highlights-title">Most popular facilities</h2>
            <div class="facility-grid">
                <div class="facility-item">
                    <i class="fas fa-swimming-pool facility-icon"></i>
                    <p>2 swimming pools</p>
                </div>
                <div class="facility-item">
                    <i class="fas fa-wifi facility-icon"></i>
                    <p>Free WiFi</p>
                </div>
                <div class="facility-item">
                    <i class="fas fa-users facility-icon"></i>
                    <p>Family rooms</p>
                </div>
                <div class="facility-item">
                    <i class="fas fa-coffee facility-icon"></i>
                    <p>Tea/coffee maker</p>
                </div>
                <div class="facility-item">
                    <i class="fas fa-spa facility-icon"></i>
                    <p>Spa and wellness</p>
                </div>
            </div>
        </div>

        <!-- Availability Section -->
        <div class="availability">
            <div class="availability-header">
                <h2>Availability</h2>
            </div>

            <div class="search-container">
                <div class="search-inputs">
                    <input type="text" class="search-field" placeholder="Check-in - Check-out date">
                    <input type="text" class="search-field" placeholder="2 adults · 0 children · 1 room">
                </div>
                <button class="search-button">Search</button>
            </div>

            <div class="overflow-x-auto">
                <table class="availability-table">
                    <thead>
                        <tr>
                            <th>Room type</th>
                            <th>Price per room</th>
                            <th>Book</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Deluxe Double or Twin Room with Balcony</td>
                            <td>$120</td>
                            <td><button class="book-button">Book</button></td>
                        </tr>
                        <tr>
                            <td>Honeymoon Suite</td>
                            <td>$200</td>
                            <td><button class="book-button">Book</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="reviews">
            <div class="review-content">
                <h3>Very good</h3>
                <p class="review-text">2,611 reviews</p>
            </div>
            <div class="review-score">8.3</div>
        </div>

        <!-- Guest Reviews -->
        <div class="guest-reviews">
            <div class="review-header">
                <h2>Guest reviews</h2>
                <div class="review-score">8.3</div>
            </div>
            <div class="guest-comment">
                "Great location! Hotel with big, clean and comfortable rooms. Pool with nice view"
            </div>
            <div class="guest-info">
                <img src="https://storage.googleapis.com/a1aa/image/RKqSWqHEctrZE50PA46uyJilRmemhPRMeVNYWhISKMxrvoAUA.jpg" alt="Guest avatar" class="guest-avatar">
                <div class="guest-country">
                    
                    Romania
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-container">
            <img src="https://storage.googleapis.com/a1aa/image/DD0m6qZDbhInGFvKEE8EnI2R5Duh6lmEZbDrYspXvLK7LKAF.jpg" alt="Map showing the location of the hotel" class="map-placeholder">
        </div>
    </div>

    <!-- Fixed Back to Search Button -->
    <a href="<?php echo URLROOT;?>/users/accomadation"><button class="fixed-button">Back to search</button></a>

    <script>
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', () => {
                console.log(`Clicked: ${button.textContent}`);
            });
        });

        document.querySelectorAll('.search-input').forEach(input => {
            input.addEventListener('click', () => {
                console.log(`Clicked: ${input.placeholder}`);
            });
        });

        document.querySelectorAll('.gallery img').forEach(img => {
            img.addEventListener('click', () => {
                console.log('Opening gallery view');
            });
        });

        document.querySelectorAll('.info-icon').forEach(icon => {
            icon.addEventListener('mouseover', () => {
                console.log('Showing tooltip');
            });
        });

        document.querySelectorAll('.search-field').forEach(input => {
            input.addEventListener('click', (e) => {
                const type = e.target.placeholder.includes('date') ? 'date picker' : 'guest selector';
                console.log(`Opening ${type}`);
            });
        });

        document.querySelectorAll('.price-button').forEach(button => {
            button.addEventListener('click', () => {
                console.log('Showing room prices');
            });
        });
    </script>
</body>
</html>