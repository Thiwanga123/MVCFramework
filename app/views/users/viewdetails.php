<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Grand Kandyan</title>
    <style>
        :root {
            --primary-blue: #0071c2;
            --secondary-blue: #ebf3ff;
            --text-dark: #262626;
            --text-gray: #6b6b6b;
            --border-color: #e7e7e7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Section */
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
            color: var(--text-dark);
        }

        .airport-shuttle {
            color: var(--text-gray);
            font-size: 14px;
            margin-left: 8px;
        }

        .price-match {
            display: flex;
            align-items: center;
            color: var(--primary-blue);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        /* Location Section */
        .location {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            color: var(--text-gray);
            font-size: 14px;
        }

        .location a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
        }

        .location-divider {
            margin: 0 4px;
            color: var(--text-gray);
        }

        /* Gallery Section */
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
            grid-template-rows: 1fr 1fr 1fr;
            gap: 8px;
        }

        .thumbnail {
            width: 100%;
            height: 128px;
            object-fit: cover;
        }

        /* Property Highlights */
        .property-highlights {
            background: white;
            border-radius: 8px;
            padding: 24px;
            margin: 24px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .highlights-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .highlights-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
        }

        .highlight-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .highlight-icon {
            width: 24px;
            height: 24px;
            color: var(--text-gray);
        }

        .highlight-content h3 {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .highlight-content p {
            font-size: 14px;
            color: var(--text-gray);
        }

        /* Availability Section Improvements */
        .availability {
            background: white;
            border-radius: 8px;
            padding: 24px;
            margin-top: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .availability h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .availability-header {
            margin-bottom: 20px;
        }

        .search-container {
            border: 1px solid var(--border-color);
            border-radius: 4px;
            margin-bottom: 24px;
        }

        .search-inputs {
            display: flex;
            border-bottom: 1px solid var(--border-color);
        }

        .search-field {
            flex: 1;
            padding: 12px;
            border: none;
            border-right: 1px solid var(--border-color);
            font-size: 14px;
            color: var(--text-dark);
        }

        .search-field:last-child {
            border-right: none;
        }

        .search-button {
            width: 100%;
            padding: 12px;
            background: var(--primary-blue);
            color: white;
            border: none;
            font-weight: 500;
            cursor: pointer;
        }

        .room-list {
            margin-top: 20px;
        }

        .room-item {
            border-bottom: 1px solid var(--border-color);
            padding: 20px 0;
        }

        .room-item:last-child {
            border-bottom: none;
        }

        .room-title {
            color: var(--primary-blue);
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
            color: var(--text-gray);
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
            background: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
        }

        .offer-badge {
            display: inline-block;
            background: var(--secondary-blue);
            color: var(--primary-blue);
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 14px;
            margin-top: 8px;
        }

        /* Honeymoon Suite Special */
        .special-offer {
            background: var(--secondary-blue);
            border-radius: 4px;
            padding: 8px;
            margin-top: 8px;
            font-size: 14px;
            color: var(--primary-blue);
        }

        .info-icon {
            margin-left: 4px;
            cursor: help;
        }

        /* Reviews Section */
        .reviews {
            background: white;
            border-radius: 8px;
            padding: 16px;
            margin-top: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .review-score {
            background: var(--primary-blue);
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 700;
            font-size: 20px;
        }

        .review-text {
            font-size: 14px;
            color: var(--text-gray);
        }

        /* Map Section */
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

        /* Sign In Section */
        .sign-in-section {
            background: white;
            border-radius: 8px;
            padding: 24px;
            margin: 24px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .sign-in-content {
            flex: 1;
        }

        .sign-in-content h3 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .sign-in-content p {
            color: var(--text-gray);
            font-size: 14px;
            margin-bottom: 16px;
        }

        .sign-in-buttons {
            display: flex;
            gap: 12px;
        }

        .sign-in-btn,
        .register-btn {
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            font-size: 14px;
        }

        .sign-in-btn {
            background: var(--primary-blue);
            color: white;
            border: none;
        }

        .register-btn {
            background: white;
            color: var(--primary-blue);
            border: 1px solid var(--primary-blue);
        }

        .genius-icon {
            width: 80px;
            height: 80px;
            margin-left: 24px;
        }

        /* Facilities Grid */
        .facility-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 16px;
        }

        .facility-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--text-gray);
        }

        .facility-icon {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        /* Review Section Enhancement */
        .review-content {
            display: flex;
            flex-direction: column;
        }

        .review-content h3 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        /* Guest Reviews Section */
        .guest-reviews {
            background: white;
            border-radius: 8px;
            padding: 24px;
            margin-top: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .guest-comment {
            font-style: italic;
            color: var(--text-gray);
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
            color: var(--text-gray);
            font-size: 14px;
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
            <a href="#" class="price-match">We Price Match</a>
        </div>

        <!-- Location -->
        <div class="location">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
            </svg>
            89/10,Lady Gordon's Drive,Kandy, 20000 Kandy, Sri Lanka
            <a href="#">Great location - show map</a>
            <span class="location-divider">–</span>
            Railway access
        </div>

        <!-- Gallery -->
        <div class="gallery">
            <img src="/api/placeholder/800/400" alt="Hotel exterior" class="main-image">
            <div class="thumbnail-grid">
                <img src="/api/placeholder/400/130" alt="Hotel interior" class="thumbnail">
                <img src="/api/placeholder/400/130" alt="Hotel pool" class="thumbnail">
                <img src="/api/placeholder/400/130" alt="Hotel restaurant" class="thumbnail">
            </div>
        </div>
        <!-- Sign In Section -->
        <div class="sign-in-section">
            <div class="sign-in-content">
                <h3>Sign in, save money!</h3>
                <p>To see if you can save 10% or more at this property, sign in.</p>
                <div class="sign-in-buttons">
                    <button class="sign-in-btn">Sign in</button>
                    <button class="register-btn">Create account</button>
                </div>
            </div>
            <div class="genius-icon">
                <img src="/api/placeholder/80/80" alt="Genius logo">
            </div>
        </div>

        <!-- Property Highlights -->
        <div class="property-highlights">
            <h2 class="highlights-title">Property highlights</h2>
            <div class="highlights-grid">
                <div class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 6v6l4 2" />
                    </svg>
                    <div class="highlight-content">
                        <h3>Accessibility</h3>
                        <p>Wheelchair accessible, Lift, Emergency cord in bathroom</p>
                    </div>
                </div>
                <div class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20" />
                    </svg>
                    <div class="highlight-content">
                        <h3>Wellness</h3>
                        <p>Spa and wellness centre, Hot tub/Jacuzzi, Massage</p>
                    </div>
                </div>
                <!-- Add more highlights as needed -->
            </div>
        </div>
        <!-- Popular Facilities -->
        <div class="property-highlights">
            <h2 class="highlights-title">Most popular facilities</h2>
            <div class="facility-grid">
                <div class="facility-item">
                    <svg class="facility-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M2 20h20l-10-18L2 20z" />
                    </svg>
                    2 swimming pools
                </div>
                <div class="facility-item">
                    <svg class="facility-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 6v12" />
                    </svg>
                    Free WiFi
                </div>
                <div class="facility-item">
                    <svg class="facility-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    </svg>
                    Family rooms
                </div>
                <div class="facility-item">
                    <svg class="facility-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8h1a4 4 0 0 1 0 8h-1" />
                        <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z" />
                        <line x1="6" y1="1" x2="6" y2="4" />
                        <line x1="10" y1="1" x2="10" y2="4" />
                        <line x1="14" y1="1" x2="14" y2="4" />
                    </svg>
                    Tea/coffee maker
                </div>
                <div class="facility-item">
                    <svg class="facility-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 3h12l4 8-10 13L2 11l4-8z" />
                    </svg>
                    Spa and wellness
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

            <div class="room-list">
                <div class="room-item">
                    <a href="#" class="room-title">Deluxe Double or Twin Room with Balcony</a>
                    <div class="room-details">
                        <svg class="bed-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M2 4v16M22 4v16M2 12h20M6 8h4M14 8h4" />
                        </svg>
                        <span>3 single beds or 1 extra-large double bed</span>
                    </div>
                    <div class="occupancy-info">
                        <div class="person-count">
                            <svg class="person-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 21v-2a7 7 0 0 1 14 0v2" />
                            </svg>
                            <svg class="person-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 21v-2a7 7 0 0 1 14 0v2" />
                            </svg>
                        </div>
                        <button class="price-button">Show prices</button>
                    </div>
                </div>

                <div class="room-item">
                    <a href="#" class="room-title">Honeymoon Suite</a>
                    <div class="room-details">
                        <svg class="bed-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M2 4v16M22 4v16M2 12h20M6 8h4M14 8h4" />
                        </svg>
                        <span>1 extra-large double bed</span>
                    </div>
                    <div class="offer-badge">
                        15% discount on Lunch/Dinner + 10% discount on Spa + Daily happy hour
                    </div>
                    <div class="occupancy-info">
                        <div class="person-count">
                            <svg class="person-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 21v-2a7 7 0 0 1 14 0v2" />
                            </svg>
                            ×2
                        </div>
                        <button class="price-button">Show prices</button>
                    </div>
                </div>
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
                <img src="/api/placeholder/32/32" alt="Guest" class="guest-avatar">
                <div class="guest-country">
                    <img src="/api/placeholder/16/16" alt="Flag">
                    Romania
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-container">
            <img src="/api/placeholder/1120/300" alt="Map" class="map-placeholder">
        </div>
    </div>

    <script>
        // All the previous JavaScript event handlers
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
        // Add specific handlers for the availability section
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