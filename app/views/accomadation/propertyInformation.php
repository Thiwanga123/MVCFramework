<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            gap: 20px;
            flex-wrap: wrap;
        }
        .content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: calc(50% - 10px);
            box-sizing: border-box;
        }
        .content h2 {
            margin-top: 0;
            color: #003580;
        }
        .section {
            margin-bottom: 20px;
        }
        .section label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .section input[type="text"],
        .section input[type="number"],
        .section select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .counter {
            display: flex;
            align-items: center;
        }
        .counter button {
            background-color: #0071c2;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .counter input {
            width: 50px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 0 10px;
        }
        .radio-group, .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }
        .radio-group label, .checkbox-group label {
            margin-right: 20px;
            flex: 1 0 50%;
        }
        .checkbox-group input, .radio-group input {
            margin-right: 10px;
        }
        .check-in-out {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .check-in-out div {
            flex: 1;
        }
        button i {
            margin-right: 5px;
        }
        @media (max-width: 768px) {
            .content {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Column -->
        <div class="content">
            <h2>Property Details</h2>
            <div class="section">
                <label>Where can people sleep?</label>
                <div class="sleeping-places">
                    <div class="place">
                        <input type="text" value="Bedroom 1" readonly>
                        <input type="text" value="1 double bed" readonly>
                        <button><i class="fas fa-minus-circle"></i></button>
                    </div>
                    <button><i class="fas fa-plus-circle"></i> Add bedroom</button>
                </div>
            </div>
            <div class="section">
                <label>How many guests can stay?</label>
                <div class="counter">
                    <button>-</button>
                    <input type="number" value="2" readonly>
                    <button>+</button>
                </div>
            </div>
            <div class="section">
                <label>How big is this apartment?</label>
                <input type="text" placeholder="Apartment size - optional">
                <select>
                    <option value="square metres">square metres</option>
                </select>
            </div>
        </div>
        
        <!-- Right Column -->
        <div class="content">
            <h2>House Rules</h2>
            <div class="section">
                <label>Smoking allowed</label>
                <div class="radio-group">
                    <label><input type="radio" name="smoking" checked> Yes</label>
                    <label><input type="radio" name="smoking"> No</label>
                </div>
            </div>
            <div class="section">
                <label>Check out</label>
                <div class="check-in-out">
                    <div>
                        <label>From</label>
                        <input type="text" value="08:00" readonly>
                    </div>
                    <div>
                        <label>Until</label>
                        <input type="text" value="11:00" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
