<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Rate Update</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-blue-50">
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-blue-700 mb-4">Update Transaction Rate</h1>
            <form>
                <div class="mb-4">
                    <label for="rate" class="block text-gray-700 font-medium mb-2">Rate Percentage</label>
                    <input type="number" id="rate" name="rate" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter rate percentage">
                </div>
                <div class="mb-4">
                    <label for="admin-approval" class="block text-gray-700 font-medium mb-2">Admin Approvals</label>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="admin1" name="admin1" class="mr-2" disabled checked>
                        <label for="admin1" class="text-gray-700">Admin 1 (You)</label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="admin2" name="admin2" class="mr-2">
                        <label for="admin2" class="text-gray-700">Admin 2</label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="admin3" name="admin3" class="mr-2">
                        <label for="admin3" class="text-gray-700">Admin 3</label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="admin4" name="admin4" class="mr-2">
                        <label for="admin4" class="text-gray-700">Admin 4</label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="notify" class="block text-gray-700 font-medium mb-2">Send Notification to Admins</label>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="notify2" name="notify2" class="mr-2">
                        <label for="notify2" class="text-gray-700">Notify Admin 2</label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="notify3" name="notify3" class="mr-2">
                        <label for="notify3" class="text-gray-700">Notify Admin 3</label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="notify4" name="notify4" class="mr-2">
                        <label for="notify4" class="text-gray-700">Notify Admin 4</label>
                    </div>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update Rate</button>
            </form>
        </div>
    </div>
</body>
</html>