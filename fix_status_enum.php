<?php
require_once 'includes/db.php';

try {
    // Change status column from ENUM to VARCHAR to support 'banned' and 'active'
    $sql = "ALTER TABLE users MODIFY COLUMN status VARCHAR(50) DEFAULT 'active'";
    $pdo->exec($sql);
    echo "Successfully updated users table status column to VARCHAR(50).<br>";

    // Update existing users to 'active' if they were 'approved' or 'pending' to ensure consistency
    // Or just leave them. But 'banned' will now be accepted.

    echo "Database schema fixed. You can now Ban/Unban users.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>