
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
<body>
    <!--if $data[] is available print true-->
    
        <h1>Users</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Telephone Number</th>
                    <th>Date of Joined</th>
                </tr>
            </thead>
            <tbody>
    <?php if (!empty($data['travelers'])) : ?>
        <?php foreach ($data['travelers'] as $user) : ?>
            <tr>
                <td><?php echo $user->admin_id; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->telephone_number; ?></td>
                <td><?php echo $user->date_of_joined; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="5">No users found.</td>
        </tr>
    <?php endif; ?>
</tbody>

        </table>
   
</body>

</body>
</html>
