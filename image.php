<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

// Prevent direct access if no ID
if (!isset($_GET['id'])) {
    header("HTTP/1.0 404 Not Found");
    exit;
}

$photo_id = (int) $_GET['id'];

// Fetch photo details
$stmt = $pdo->prepare("SELECT * FROM photos WHERE id = ?");
$stmt->execute([$photo_id]);
$photo = $stmt->fetch();

if (!$photo) {
    header("HTTP/1.0 404 Not Found");
    exit;
}

// Logic to determine which version to serve
$serve_original = false;

if (isLoggedIn()) {
    $current_user_id = $_SESSION['user_id'];

    // 1. Owner
    if ($photo['user_id'] == $current_user_id) {
        $serve_original = true;
    }
    // 2. Admin
    elseif (isAdmin()) {
        $serve_original = true;
    }
    // 3. Premium User
    elseif (isPremium()) {
        $serve_original = true;
    }
}

// Decide file path
$file_path = $serve_original ? $photo['original_path'] : $photo['blurred_path'];
// Fix path if it's relative
$full_path = __DIR__ . '/' . $file_path;

if (!file_exists($full_path)) {
    // Fallback or error
    header("HTTP/1.0 404 Not Found");
    // debug
    // echo "File not found: $full_path";
    exit;
}

// Serve the file
$mime_type = mime_content_type($full_path);
header("Content-Type: $mime_type");
header("Content-Length: " . filesize($full_path));
// Security headers
if (!$serve_original) {
    // If blurred, maybe cache is okay? 
    // If sensitive original, prevent caching might be better but for performance we want cache.
    // Let's allow caching.
}
readfile($full_path);
exit;
?>