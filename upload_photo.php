<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photo'])) {
    $user_id = $_SESSION['user_id'];
    $file = $_FILES['photo'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        // Validation
        $allowed = ['image/jpeg', 'image/png', 'image/webp'];
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);

        if (in_array($mime, $allowed)) {
            // Paths
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = "user_{$user_id}_" . time();
            $original_rel = "protected_uploads/original/{$filename}.{$ext}";
            $blurred_rel = "protected_uploads/blurred/{$filename}.{$ext}";

            $original_abs = __DIR__ . '/' . $original_rel;
            $blurred_abs = __DIR__ . '/' . $blurred_rel;

            // Move Original
            if (move_uploaded_file($file['tmp_name'], $original_abs)) {
                // Create Blurred
                if (createBlurredImage($original_abs, $blurred_abs, 40)) {
                    // Unset previous primary if this is primary.
                    $pdo->prepare("UPDATE photos SET is_primary = 0 WHERE user_id = ?")->execute([$user_id]);

                    $stmt = $pdo->prepare("INSERT INTO photos (user_id, original_path, blurred_path, is_primary) VALUES (?, ?, ?, 1)");
                    $stmt->execute([$user_id, $original_rel, $blurred_rel]);

                    redirect('profile.php?success=uploaded');
                } else {
                    echo "Error blurring image.";
                }
            } else {
                echo "Error saving file.";
            }
        } else {
            echo "Invalid file type.";
        }
    } else {
        echo "Upload error.";
    }
} else {
    redirect('profile.php');
}
?>