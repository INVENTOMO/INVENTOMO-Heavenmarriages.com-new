<?php
require_once 'includes/db.php';
try {
    $pdo->exec("ALTER TABLE users ADD COLUMN is_fake BOOLEAN DEFAULT FALSE");
    echo "Added is_fake column to users table.\n";
} catch (PDOException $e) {
    echo "Error or already exists: " . $e->getMessage() . "\n";
}
?>