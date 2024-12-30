<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodations Table</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f6f8fc 0%, #e9f0f7 100%);
            padding: 40px;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            border-radius: 20px;
            margin: 20px 0;
        }

        th {
            background: linear-gradient(135deg, #93c5fd 0%, #60a5fa 100%);
            color: #1e3a8a;
            padding: 20px 15px;
            text-align: left;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        th:first-child {
            border-top-left-radius: 20px;
        }

        th:last-child {
            border-top-right-radius: 20px;
        }

        tr:last-child td:first-child {
            border-bottom-left-radius: 20px;
        }

        tr:last-child td:last-child {
            border-bottom-right-radius: 20px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: linear-gradient(90deg, #f8fafc 0%, #f1f5f9 100%);
        }

        .property-id {
            color: #64748b;
            font-family: monospace;
        }

        .price {
            color: #2563eb;
            font-weight: 600;
        }

        .category {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            padding: 6px 14px;
            border-radius: 12px;
            font-size: 0.85em;
            display: inline-block;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.85em;
            transition: all 0.2s;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .btn-view {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
        }

        .btn-update {
            background: linear-gradient(135deg, #38a169 0%, #059669 100%);
            color: white;
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            
            .container {
                margin: 0;
                padding: 10px;
                border-radius: 0;
            }
            
            table {
                font-size: 0.9em;
                border-radius: 0;
                margin: 10px 0;
            }
            
            .actions {
                flex-direction: column;
                gap: 4px;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Accommodation Name</th>
                    <th>Location</th>
                    <th>Property-ID</th>
                    <th>Price</th>
                    <th>Guests</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ocean View Villa</td>
                    <td>Maldives</td>
                    <td class="property-id">PROP-001</td>
                    <td class="price">$200/night</td>
                    <td>8</td>
                    <td><span class="category">Luxury</span></td>
                    <td>
                        <div class="actions">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-update">Update</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Mountain Retreat</td>
                    <td>Switzerland</td>
                    <td class="property-id">PROP-002</td>
                    <td class="price">$350/night</td>
                    <td>6</td>
                    <td><span class="category">Premium</span></td>
                    <td>
                        <div class="actions">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-update">Update</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>City Apartment</td>
                    <td>New York</td>
                    <td class="property-id">PROP-003</td>
                    <td class="price">$150/night</td>
                    <td>4</td>
                    <td><span class="category">Standard</span></td>
                    <td>
                        <div class="actions">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-update">Update</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>