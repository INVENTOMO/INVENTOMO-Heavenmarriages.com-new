<?php
require_once 'includes/db.php';
set_time_limit(300);
echo "Updating phone numbers...\n";

$file = __DIR__ . '/users_data.txt';
$content = file_get_contents($file);
$lines = explode("\n", $content);
$headers = [];

$count = 0;
foreach ($lines as $index => $line) {
    if ($index == 0)
        continue; // Header
    $line = trim($line);
    if (empty($line))
        continue;

    $data = explode("\t", $line);
    // Assuming format based on previous file: Full Name is index 1, Email index 2, Phone index 3.
    // Let's verify indexes from header line or robust check?
    // Header: Create Account	Full Name	Email Address	Phone Number
    // Indexes: 0=Create Account, 1=Full Name, 2=Email, 3=Phone

    if (count($data) < 4)
        continue;

    $email = trim($data[2]);
    $phone = trim($data[3]);

    if (!empty($email) && !empty($phone)) {
        // Find User
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            $user_id = $user['id'];
            // Update Profile
            try {
                // Check if profile exists? It should.
                $upd = $pdo->prepare("UPDATE profiles SET phone = ? WHERE user_id = ?");
                $upd->execute([$phone, $user_id]);
                $count++;
            } catch (PDOException $e) {
                echo "Error updating $email: " . $e->getMessage() . "\n";
            }
        }
    }
}

echo "Updated phone numbers for $count users.\n";
?>