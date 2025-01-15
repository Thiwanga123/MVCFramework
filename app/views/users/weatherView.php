<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e8f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .weather-container {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .location {
            color: #2c5282;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .temperature {
            color: #2f855a;
            font-size: 3rem;
            margin: 1rem 0;
        }

        .weather-condition {
            color: #3182ce;
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .detail-item {
            background-color: #ebf8ff;
            padding: 1rem;
            border-radius: 15px;
            text-align: center;
            border: 1px solid #bee3f8;
            transition: transform 0.2s;
        }

        .detail-item:hover {
            transform: scale(1.02);
            background-color: #e6ffed;
            border-color: #9ae6b4;
        }

        .detail-label {
            color: #2b6cb0;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .detail-value {
            color: #276749;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #3182ce;
        }
    </style>
</head>
<body>
    <div class="weather-container">
        <div class="location">San Francisco, CA</div>
        <div class="temperature">72°F</div>
        <div class="weather-condition">Partly Cloudy</div>
        <div class="details">
            <div class="detail-item">
                <i class="fas fa-tint icon"></i>
                <div class="detail-label">Humidity</div>
                <div class="detail-value">65%</div>
            </div>
            <div class="detail-item">
                <i class="fas fa-wind icon"></i>
                <div class="detail-label">Wind Speed</div>
                <div class="detail-value">8 mph</div>
            </div>
            <div class="detail-item">
                <i class="fas fa-tachometer-alt icon"></i>
                <div class="detail-label">Pressure</div>
                <div class="detail-value">1015 hPa</div>
            </div>
            <div class="detail-item">
                <i class="fas fa-sun icon"></i>
                <div class="detail-label">UV Index</div>
                <div class="detail-value">5</div>
            </div>
        </div>
    </div>
</body>
</html>