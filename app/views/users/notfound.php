<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            font-family: system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
        }

        .container {
            text-align: center;
            padding: 2rem;
            max-width: 600px;
        }

        .illustration {
            margin: 0 auto 2rem;
        }

        .illustration img {
            width: 200px;
            height: auto;
        }

        .title {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 1rem 0;
            color: #1e1b4b;
        }

        .message {
            color: #6b7280;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .search-button {
            background-color: #1e1b4b;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-button:hover {
            background-color: #2e2d4d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="illustration">
            <img src="<?php echo URLROOT;?>/Images/image.png" alt="No results illustration showing a sad laptop with a question mark" />
        </div>
        <h1 class="title">No Result Found!</h1>
        <p class="message">"Sorry, we came up empty-handed. Let's broaden our search and help you find what you're looking for."</p>
        <a href="<?php echo URLROOT;?>/users/accomadation"><button class="search-button">Back to Page </button></a>
    </div>
</body>
</html>