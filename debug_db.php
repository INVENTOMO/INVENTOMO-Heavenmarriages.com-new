<?php
require 'includes/db.php';
echo "--- DESCRIBE users ---\n";
$stmt = $pdo->query('DESCRIBE users');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Field: " . $row['Field'] . " - Type: " . $row['Type'] . "\n";
}
echo "\n--- USERS ---\n";
$stmt = $pdo->query('SELECT id, name, email, role, is_fake FROM users');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
}
?>