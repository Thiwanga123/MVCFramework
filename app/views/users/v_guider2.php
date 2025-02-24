<?php

// MUST BE THE FIRST LINE
session_start();

// Check if session data exists
if (!isset($_SESSION['trip_data'])) {
    header('Location: v_guider.php');
    exit;
}

// Use $_SESSION['trip_data'] to display guides...

$guides = [
    [
        'name' => 'John Silva',
        'rating' => 4.8,
        'reviews' => 156,
        'languages' => ['English', 'Sinhala'],
        'location' => 'Galle, Sri Lanka',
        'specialties' => ['Heritage Sites', 'Local Cuisine'],
        'contact' => [
            'email' => 'john.silva@email.com',
            'phone' => '+94 77 123 4567'
        ],
        'price' => 50,
        'experience' => 5,
        'tours' => 234
    ],
    [
        'name' => 'Marie Curie',
        'rating' => 4.5,
        'reviews' => 156,
        'languages' => ['French', 'English'],
        'location' => 'Galle, Sri Lanka',
        'specialties' => ['Cultural Tours', 'Photography'],
        'contact' => [
            'email' => 'marie.curie@email.com',
            'phone' => '+94 77 987 6543'
        ],
        'price' => 45,
        'experience' => 3,
        'tours' => 156
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Guides</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .guide-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 25px;
        }

        .guide-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .guide-name {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .rating {
            color: #ffb400;
            font-size: 18px;
        }

        .reviews {
            color: #666;
            font-size: 14px;
        }

        .details-section {
            margin: 15px 0;
            padding: 15px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .badge {
            display: inline-block;
            padding: 5px 12px;
            background: #f0f0f0;
            border-radius: 20px;
            margin: 5px 5px 5px 0;
            font-size: 14px;
        }

        .contact-info {
            color: #666;
            font-size: 14px;
            margin: 10px 0;
        }

        .price-section {
            text-align: right;
        }

        .price {
            font-size: 28px;
            color: #2ecc71;
            font-weight: bold;
        }

        .per-day {
            color: #888;
            font-size: 14px;
        }

        .button-group {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-outline {
            background: white;
            border: 2px solid #2ecc71;
            color: #2ecc71;
        }

        .btn-primary {
            background: #2ecc71;
            color: white;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Available Local Guides</h1>
        
        <?php foreach ($guides as $guide): ?>
        <div class="guide-card">
            <div class="guide-header">
                <div>
                    <div class="guide-name"><?= htmlspecialchars($guide['name']) ?></div>
                    <div class="rating">
                        ★★★★★ <?= $guide['rating'] ?>/5 
                        <span class="reviews">(<?= $guide['reviews'] ?> reviews)</span>
                    </div>
                </div>
            </div>

            <div class="details-section">
                <div class="badge"><?= implode('</div><div class="badge">', $guide['languages']) ?></div>
                <div class="location"><?= htmlspecialchars($guide['location']) ?></div>
                
                <div class="specialties" style="margin-top: 15px;">
                    <strong>Specialties:</strong><br>
                    <?php foreach ($guide['specialties'] as $specialty): ?>
                        <div class="badge"><?= htmlspecialchars($specialty) ?></div>
                    <?php endforeach; ?>
                </div>

                <div class="contact-info">
                    <?= htmlspecialchars($guide['contact']['email']) ?>   •   
                    <?= htmlspecialchars($guide['contact']['phone']) ?>
                </div>
            </div>

            <div class="price-section">
                <div class="price">$<?= $guide['price'] ?></div>
                <div class="per-day">per day</div>
                <div style="margin-top: 10px;">
                    <?= $guide['experience'] ?> years experience<br>
                    <?= $guide['tours'] ?> tours completed
                </div>
            </div>

            <div class="button-group">
                <button class="btn btn-outline">View Profile</button>
                <button class="btn btn-primary" onclick="showBookingForm('<?= $guide['name'] ?>')">
                    Book Now
                </button>
            </div>
        </div>
        <?php endforeach; ?>

        <a href="#" class="back-btn">← Back to Search</a>
    </div>

    <script>
        function showBookingForm(guideName) {
            if (confirm(`Book ${guideName}? We'll contact you to confirm details.`)) {
                // Add actual booking logic here
                alert('Booking request sent! We will contact you shortly.');
            }
        }
    </script>
</body>
</html>