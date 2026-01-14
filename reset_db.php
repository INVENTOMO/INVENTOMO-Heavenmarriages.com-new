<?php
require_once 'includes/db.php';
$pdo->exec("SET FOREIGN_KEY_CHECKS = 0");
$pdo->exec("TRUNCATE TABLE profiles");
$pdo->exec("TRUNCATE TABLE photos");
$pdo->exec("DELETE FROM users WHERE id > 1"); // Keep Super Admin
$pdo->exec("ALTER TABLE users AUTO_INCREMENT = 2");
$pdo->exec("SET FOREIGN_KEY_CHECKS = 1");
echo "Database reset.";
?>