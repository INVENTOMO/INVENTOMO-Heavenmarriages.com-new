<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if (!isLoggedIn() || !isAdmin()) {
    die("Unauthorized.");
}

$pdo->exec("UPDATE users SET is_fake = 1 WHERE role = 'user'");
echo "All existing users have been marked as FAKE. New registrations will still be REAL by default.";
?>