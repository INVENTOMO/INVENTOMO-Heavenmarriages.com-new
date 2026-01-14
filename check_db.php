<?php
require_once 'includes/db.php';
$stmt = $pdo->query("SHOW COLUMNS FROM users");
$columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
echo "Users columns: " . implode(", ", $columns) . "\n";

$stmt = $pdo->query("SHOW COLUMNS FROM profiles");
$columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
echo "Profiles columns: " . implode(", ", $columns) . "\n";
?>