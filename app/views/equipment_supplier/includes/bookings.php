<div class="booking">
    <h2>Bookings For the Equipment</h2>
    <div class="div">
        <div class="top">
            <div class="cal">
                <?php 
                    if (!defined('APPROOT')) {
                        define('APPROOT', dirname(dirname(dirname(__FILE__))));
                    }

                    include_once APPROOT . '/views/inc/components/calendar.php'; ?> 
            </div>
        </div>

        <?php var_dump($data['bookings']); ?>
        <div class="Bottom">
                 <div class="table-container">
                        <?php if(!empty($data['bookings'])): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Price</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['bookings'] as $booking):?>
                                    <tr>
                                        <td>
                                            <?php if (!empty($booking->image_path)): ?>
                                                <img src="<?= URLROOT . '/' . htmlspecialchars($booking->image_path); ?>" alt="Product Image" width="100" height="100">
                                            <?php else: ?>
                                                No Image
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($booking->start_date); ?></td>
                                        <td><?php echo htmlspecialchars($booking->end_date); ?></td>
                                        <td>
                                            <span class="status <?php echo strtolower($booking->status); ?>">
                                                <?php echo htmlspecialchars($booking->status); ?>
                                            </span>
                                        </td>
                                        <td><?php echo htmlspecialchars($booking->total_price); ?></td> 
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table> 
                        <?php else: ?>
                            <p>You don't have any bookings at the moment.</p>
                        <?php endif; ?>
                    </div>
        </div>
    </div>
</div>
