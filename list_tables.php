<?php
require_once 'includes/db.php';
try {
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    foreach ($tables as $table) {
        echo $table . "\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>