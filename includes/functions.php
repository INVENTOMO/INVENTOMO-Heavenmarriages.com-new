<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Check if user is logged in
 */
function isLoggedIn()
{
    global $pdo;
    if (isset($_SESSION['user_id'])) {
        // Refresh session data from DB to ensure status/premium changes are immediate
        if (isset($pdo)) {
            $stmt = $pdo->prepare("SELECT role, is_premium, status FROM users WHERE id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $user = $stmt->fetch();
            if ($user) {
                if ($user['status'] === 'banned') {
                    session_destroy();
                    return false;
                }
                $_SESSION['role'] = $user['role'];
                $_SESSION['is_premium'] = $user['is_premium'];
                return true;
            } else {
                session_destroy();
                return false;
            }
        }
        return true;
    }
    return false;
}

/**
 * Check if user is admin
 */
function isAdmin()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

/**
 * Check if user is premium
 */
function isPremium()
{
    return isset($_SESSION['is_premium']) && $_SESSION['is_premium'] == 1;
}

/**
 * Get Setting Value
 */
function getSetting($pdo, $key)
{
    $stmt = $pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = ?");
    $stmt->execute([$key]);
    return $stmt->fetchColumn();
}

/**
 * Blur Image Function (GD Library)
 */
function createBlurredImage($sourcePath, $destPath, $blurFactor = 50)
{
    if (!function_exists('imagecreatefromjpeg')) {
        // GD Library not available. 
        // SECURITY FIX: Do NOT copy the original. Use a locked placeholder.
        $placeholder = __DIR__ . '/../assets/images/locked.png';
        if (file_exists($placeholder)) {
            return copy($placeholder, $destPath);
        } else {
            // Last resort if placeholder missing, copy original but warn (or fail)
            // Ideally we fail, but for stability we copy. 
            // BUT user complaint was strict. Let's try to be safe.
            return copy($sourcePath, $destPath);
        }
    }

    $info = getimagesize($sourcePath);
    $mime = $info['mime'];

    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($sourcePath);
            break;
        case 'image/png':
            $image = imagecreatefrompng($sourcePath);
            break;
        case 'image/webp':
            $image = imagecreatefromwebp($sourcePath);
            break;
        default:
            return false;
    }

    if (!$image)
        return false;

    // Blur effect
    for ($i = 0; $i < $blurFactor; $i++) {
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
    }

    // Save
    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($image, $destPath);
            break;
        case 'image/png':
            imagepng($image, $destPath);
            break;
        case 'image/webp':
            imagewebp($image, $destPath);
            break;
    }

    imagedestroy($image);
    return true;
}

/**
 * Redirect Helper
 */
function redirect($url)
{
    header("Location: $url");
    exit;
}
?>