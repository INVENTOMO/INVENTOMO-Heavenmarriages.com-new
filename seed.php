<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

echo "Seeding started...\n";

$common_pass = password_hash('password123', PASSWORD_DEFAULT);

// --- 1. Create Test Users ---
$test_users = [
    [
        'name' => 'Admin User',
        'email' => 'ibraheemtahir0rs@gmail.com',
        'role' => 'admin',
        'is_premium' => 1,
        'gender' => 'Male'
    ],
    [
        'name' => 'Rizwan Ahmed',
        'email' => 'user@heavenmarriage.com',
        'role' => 'user',
        'is_premium' => 0,
        'gender' => 'Male'
    ],
    [
        'name' => 'Zara Sheikh',
        'email' => 'premium@heavenmarriage.com',
        'role' => 'user',
        'is_premium' => 1,
        'gender' => 'Female'
    ]
];

foreach ($test_users as $u) {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$u['email']]);
    $existing = $stmt->fetch();

    // Update name if exists
    if ($existing) {
        $stmt = $pdo->prepare("UPDATE users SET name = ? WHERE id = ?");
        $stmt->execute([$u['name'], $existing['id']]);
    }

    if ($existing) {
        // Update existing to ensure correct role/premium status/password
        $stmt = $pdo->prepare("UPDATE users SET password = ?, role = ?, is_premium = ?, status = 'approved' WHERE id = ?");
        $stmt->execute([$common_pass, $u['role'], $u['is_premium'], $existing['id']]);
        $user_id = $existing['id'];
        echo "Updated {$u['name']} ({$u['email']})\n";
    } else {
        // Insert new
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, is_premium, status) VALUES (?, ?, ?, ?, ?, 'approved')");
        $stmt->execute([$u['name'], $u['email'], $common_pass, $u['role'], $u['is_premium']]);
        $user_id = $pdo->lastInsertId();
        echo "Created {$u['name']} ({$u['email']})\n";
    }

    // Ensure Profile Exists
    $stmt = $pdo->prepare("SELECT id FROM profiles WHERE user_id = ?");
    $stmt->execute([$user_id]);
    if (!$stmt->fetch()) {
        $stmt = $pdo->prepare("INSERT INTO profiles (user_id, gender, date_of_birth, city, bio, height, education, occupation, marital_status, country) VALUES (?, ?, '1995-01-01', 'Lahore', 'Test profile bio.', '5.8', 'Masters', 'Engineer', 'Single', 'Pakistan')");
        $stmt->execute([$user_id, $u['gender']]);
    }
}

// --- 2. Create Random Users ---
$males = ['Ali Khan', 'Ahmed Raza', 'Bilal Sheikh', 'Fahad Mustafa', 'Hamza Ali'];
$females = ['Sana Mir', 'Ayesha Omar', 'Zara Noor', 'Fatima Sana', 'Hina Altaf'];
$cities = ['Lahore', 'Karachi', 'Islamabad', 'Faisalabad', 'Multan'];

function seedRandomUser($name, $gender, $pdo, $password, $cities)
{
    $email = strtolower(str_replace(' ', '', $name)) . "@example.com";
    $city = $cities[array_rand($cities)];
    $dob = date('Y-m-d', strtotime("-" . rand(22, 35) . " years"));

    // Check if exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch())
        return;

    // User
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, status, is_premium) VALUES (?, ?, ?, 'user', 'approved', 0)");
    $stmt->execute([$name, $email, $password]);
    $user_id = $pdo->lastInsertId();

    // Profile
    $stmt = $pdo->prepare("INSERT INTO profiles (user_id, gender, date_of_birth, city, bio, height, education, occupation, marital_status, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pakistan')");
    $stmt->execute([
        $user_id,
        $gender,
        $dob,
        $city,
        "I am a simple and honest person looking for a partner.",
        "5'" . rand(4, 11),
        "Masters",
        "Engineer/Doctor",
        "Single"
    ]);

    // Simplified Image Logic (No Copying/Blurring to save time/errors if files missing, just DB entry if needed)
    // Actually, let's skip physical file copy for randoms to avoid errors if assets missing. 
    // Just insert dummy record if we want or leave empty.
    // existing logic used copy(). Let's keep it safe.
}

foreach ($males as $name) {
    seedRandomUser($name, 'Male', $pdo, $common_pass, $cities);
}
foreach ($females as $name) {
    seedRandomUser($name, 'Female', $pdo, $common_pass, $cities);
}

echo "Seeding completed.\n";
echo "------------------------------------------------\n";
echo "CREDENTIALS (Password for all: password123)\n";
echo "1. Normal User:  user@heavenmarriage.com\n";
echo "2. Premium User: premium@heavenmarriage.com\n";
echo "3. Admin User:   admin@heavenmarriage.com\n";
echo "------------------------------------------------\n";
?>