<div class="container">
    <h2>Pending Trips to Galle Needing Female Guides</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Destination</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Adults</th>
                <th>Children</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pendingTrips as $trip): ?>
            <tr>
                <td><?= htmlspecialchars($trip['destination']) ?></td>
                <td><?= htmlspecialchars($trip['start_date']) ?></td>
                <td><?= htmlspecialchars($trip['end_date']) ?></td>
                <td><?= htmlspecialchars($trip['adults']) ?></td>
                <td><?= htmlspecialchars($trip['children']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>