<div class="container">
    <h2>Completed Trips with Special Requirements</h2>
    <div class="trip-list">
        <?php foreach ($completedTrips as $trip): ?>
        <div class="trip-card">
            <h3><?= htmlspecialchars($trip['destination']) ?></h3>
            <p><?= htmlspecialchars($trip['special_requirements']) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>