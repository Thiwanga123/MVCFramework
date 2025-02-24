<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Adjust the path based on your project structure
require_once dirname(__DIR__) . '/app/models/M_accomadation.php';

echo "Starting setup process...\n";

try {
    $accomadationModel = new M_accomadation();
    echo "M_accomadation instantiated successfully.\n";

    if ($accomadationModel->createReleaseHoldingAmountEvent()) {
        echo "Release holding amount event created successfully.\n";
    } else {
        echo "Failed to create release holding amount event.\n";
    }
} catch (Exception $e) {
    echo "Error occurred: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}
?>