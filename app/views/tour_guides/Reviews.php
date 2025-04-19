<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/Orders.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/sidebarHeader.css">
    

    <title>Reviews<</title>
</head>
<body>
    <!-- SideBar -->
    <?php
        include('Sidebar.php');;
    ?>
     <!-- End Of Sidebar -->
      <!--Main Content-->
     <div class="content">
        <!--navbar-->

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #e1e4e8;
            margin-bottom: 20px;
        }

        header .logo {
            display: flex;
            align-items: center;
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }

        header .logo svg {
            margin-right: 10px;
            fill: #2e5cb8;
        }

        .user-actions {
            display: flex;
            align-items: center;
        }

        .user-actions button {
            background-color: #2e5cb8;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .user-actions button:hover {
            background-color: #1d4898;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 25px;
            color:#2b7a78;
        }

        .rating-summary {
            display: flex;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 30px;
        }

        .rating-overall {
            flex: 1;
            border-right: 1px solid #e1e4e8;
            padding-right: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .rating-overall .star {
            color: #ffb400;
            font-size: 40px;
            margin-bottom: 5px;
        }

        .rating-overall .rating-number {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .rating-overall .rating-text {
            color: #666;
            margin-bottom: 5px;
        }

        .rating-overall .total-ratings {
            color: #888;
            font-size: 14px;
        }

        .rating-breakdown {
            flex: 2;
            padding-left: 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .rating-row {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .rating-label {
            width: 60px;
            font-size: 15px;
            color: #555;
        }

        .rating-bar-container {
            flex: 1;
            height: 12px;
            background-color: #eee;
            border-radius: 6px;
            margin: 0 15px;
            overflow: hidden;
        }

        .rating-bar {
            height: 100%;
            background-color: #ffb400;
            border-radius: 6px;
        }

        .rating-count {
            width: 60px;
            font-size: 15px;
            color: #555;
            text-align: right;
        }

        .reviews-list {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 5px;
        }

        .reviews-header {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #e1e4e8;
            font-weight: 500;
            color: #555;
        }

        .customer-col {
            flex: 1;
        }

        .id-col {
            flex: 0.7;
        }

        .review-col {
            flex: 3.5;
        }

        .date-col {
            flex: 1;
            text-align: center;
        }

        .rating-col {
            flex: 1;
            text-align: center;
        }

        .action-col {
            flex: 0.5;
            text-align: right;
        }

        .review-item {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.2s;
        }

        .review-item:hover {
            background-color: #f9f9f9;
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .customer-info {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .customer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e1e4e8;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }

        .customer-avatar svg {
            width: 20px;
            height: 20px;
            fill: #6e7980;
        }

        .customer-name {
            font-weight: 500;
            color: #333;
        }

        .customer-id {
            flex: 0.7;
            color: #666;
        }

        .review-text {
            flex: 3.5;
            color: #333;
            line-height: 1.5;
        }

        .review-date {
            flex: 1;
            text-align: center;
            color: #666;
        }

        .review-rating {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .review-rating .stars {
            display: flex;
        }

        .review-rating .star {
            color: #ffb400;
            margin: 0 1px;
        }

        .review-actions {
            flex: 0.5;
            text-align: right;
        }

        .review-actions button {
            background: none;
            border: none;
            cursor: pointer;
            color: #888;
            padding: 5px;
            font-size: 18px;
        }

        .review-actions button:hover {
            color: #333;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 12px;
            margin: 0 5px;
            border-radius: 4px;
            color: #555;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .pagination a:hover {
            background-color: #f0f0f0;
        }

        .pagination a.active {
            background-color: #2e5cb8;
            color: white;
        }
    </style>
</head>
<body>
    <?php
    // This would be replaced with actual database connection in a real implementation
    $averageRating = 5;
    $totalRatings = 55;
    
    $ratingBreakdown = [
        5 => 50,
        4 => 40,
        3 => 30,
        2 => 20,
        1 => 10
    ];
    
    $reviews = [
        [
           
            'customer' => 'Ruwani',
            'text' => "I've been on many tours, but this one stood out because of our exceptional guide.",
            'date' => '2024/05/04',
            'rating' => 5
        ],
        [
            
            'customer' => 'Milan',
            'text' => 'Excellent experience! The guide ensured everything went smoothly and even shared local tips.',
            'date' => '2024/07/09',
            'rating' => 5
        ],
        [
           
            'customer' => 'Parami',
            'text' => 'Best tour guide that i met. Highly Recommanded.',
            'date' => '2024/10/05',
            'rating' => 5
        ]
    ];
    ?>

    <div class="container">
        <header>
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M19 3h-4.18C14.25 1.44 12.53 0 10.5 0S6.75 1.44 6.18 3H2C.9 3 0 3.9 0 5v14c0 1.1.9 2 2 2h17c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-8.5-1c.83 0 1.5.67 1.5 1.5S11.33 5 10.5 5 9 4.33 9 3.5 9.67 2 10.5 2zM19 19H2V5h17v14z"/>
                    <path d="M10.5 7h-3c-.28 0-.5.22-.5.5s.22.5.5.5h3c.28 0 .5-.22.5-.5s-.22-.5-.5-.5zm3 2h-6c-.28 0-.5.22-.5.5s.22.5.5.5h6c.28 0 .5-.22.5-.5s-.22-.5-.5-.5zm0 2h-6c-.28 0-.5.22-.5.5s.22.5.5.5h6c.28 0 .5-.22.5-.5s-.22-.5-.5-.5zm0 2h-6c-.28 0-.5.22-.5.5s.22.5.5.5h6c.28 0 .5-.22.5-.5s-.22-.5-.5-.5z"/>
                </svg>
                All Reviews
            </div>
            
        </header>

        <h1>Reviews</h1>

        <div class="rating-summary">
            <div class="rating-overall">
                <div class="star">★</div>
                <div class="rating-number"><?php echo $averageRating; ?></div>
                <div class="rating-text">Average Rating</div>
                <div class="total-ratings">Based on <?php echo number_format($totalRatings); ?> ratings</div>
            </div>
            <div class="rating-breakdown">
                <?php foreach($ratingBreakdown as $stars => $count): ?>
                    <div class="rating-row">
                        <div class="rating-label"><?php echo $stars; ?> star</div>
                        <div class="rating-bar-container">
                            <div class="rating-bar" style="width: <?php echo ($count / $totalRatings) * 100; ?>%"></div>
                        </div>
                        <div class="rating-count"><?php echo number_format($count); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="reviews-list">
            <div class="reviews-header">
                <div class="customer-col">Customer</div>
                
                <div class="review-col">Review</div>
                <div class="date-col">Date</div>
                <div class="rating-col">Rating</div>
               
            </div>

            <?php foreach($reviews as $review): ?>
                <div class="review-item">
                    <div class="customer-info">
                        <div class="customer-avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <div class="customer-name"><?php echo $review['customer']; ?></div>
                    </div>
                    <div class="review-text"><?php echo $review['text']; ?></div>
                    <div class="review-date"><?php echo $review['date']; ?></div>
                    <div class="review-rating">
                        <div class="stars">
                            <?php for($i = 0; $i < $review['rating']; $i++): ?>
                                <div class="star">★</div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pagination">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">»</a>
        </div>
    </div>
</body>
</html>