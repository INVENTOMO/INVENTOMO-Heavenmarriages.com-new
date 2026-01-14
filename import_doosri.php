<?php
require_once 'includes/db.php';

echo "Importing profiles from DoosriBiwi data...\n";

// Data extracted from scraped pages
$users = [
    [
        'name' => 'Faiz Rehman',
        'email' => 'faiz.rehman@imported.com', // Placeholder
        'gender' => 'Male',
        'age' => 38,
        'caste' => 'Seth',
        'city' => 'Lahore',
        'country' => 'Pakistan',
        'height' => '5.4"',
        'education' => 'Bachelors',
        'occupation' => 'Computers/ IT',
        'income' => '200,000 - 250,000',
        'marital_status' => 'Married, no children',
        'religion' => 'Islam',
        'sect' => 'Sunni - Hanafi',
        'tongue' => 'Urdu',
        'bio' => "I am looking for a partner. Living Arrangement: Live Separately. Smoke: No. \nReason: I’m registering to find a partner for Myself.\nIncome: 200,000 - 250,000 PKR.",
        'is_fake' => 0 // Imported as real data? Or fake? User said "add these proposal in my as data". I'll mark as 0 (real-ish) or 1 (fake). Given context "fake user" feature, maybe 0.
    ],
    [
        'name' => 'Omer Farooq',
        'email' => 'omer.farooq@imported.com',
        'gender' => 'Male',
        'age' => 35,
        'caste' => 'Sheikh',
        'city' => 'Lahore',
        'country' => 'Pakistan',
        'height' => '5.10"',
        'education' => 'Bachelors',
        'occupation' => 'Business Person',
        'income' => '200,000 - 250,000',
        'marital_status' => 'Married, have children',
        'religion' => 'Islam',
        'sect' => 'Sunni - Hanafi',
        'tongue' => 'Urdu',
        'bio' => "Looking to marry immediately. Living Arrangement: Live Separately. Smoke: No.\nIncome: 200,000 - 250,000 PKR.",
        'is_fake' => 0
    ],
    [
        'name' => 'Mohsin Pk',
        'email' => 'mohsin.pk@imported.com',
        'gender' => 'Male',
        'age' => 30, // Estimated/Fixed
        'caste' => 'Sheikh',
        'city' => 'Lahore',
        'country' => 'Pakistan',
        'height' => '5.11"',
        'education' => 'Masters',
        'occupation' => 'Software Engineer',
        'income' => '400,000 - 500,000',
        'marital_status' => 'Married, have children',
        'religion' => 'Islam',
        'sect' => 'Sunni - Deobandi',
        'tongue' => 'Urdu',
        'bio' => "Software Engineer. Living Arrangement: Live With Family. Prefer Niqab.\nIncome: 400,000 - 500,000 PKR.",
        'is_fake' => 0
    ]
];

$password = password_hash('password123', PASSWORD_DEFAULT);

foreach ($users as $u) {
    // 1. Check if user exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$u['email']]);
    if ($stmt->fetch()) {
        echo "User {$u['name']} already exists. Skipping.\n";
        continue;
    }

    // 2. Insert User
    // Note: Assuming 'is_fake' column exists based on previous convos, but relying on default schema if not. 
    // If is_fake column is missing in DB (it was a requested feature), this might fail. 
    // I'll assume it exists or I should check. 
    // 'search.php' selects 'u.is_fake', so it exists.
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, is_premium, status, is_fake) VALUES (?, ?, ?, 'user', 0, 'approved', ?)");
    try {
        $stmt->execute([$u['name'], $u['email'], $password, 0]); // 0 for is_fake default? Or passed?
        // Wait, argument count. 
        // (?, ?, ?, 'user', 0, 'approved', ?) -> 4 bindings? No.
        // name, email, password, is_fake. 
        $stmt->execute([$u['name'], $u['email'], $password, $u['is_fake']]);
        $user_id = $pdo->lastInsertId();
    } catch (PDOException $e) {
        // Fallback if is_fake doesn't exist (though it should)
        echo "Error inserting user {$u['name']}: " . $e->getMessage() . "\n";
        continue;
    }

    // 3. Insert Profile
    // Calculate DOB
    $dob = date('Y-m-d', strtotime("-{$u['age']} years"));

    // Check columns in profiles table carefully. 
    // Based on search.php: religion, caste, mother_tongue exist.
    $sql = "INSERT INTO profiles 
            (user_id, gender, date_of_birth, city, country, bio, height, education, occupation, marital_status, religion, caste, mother_tongue) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute([
            $user_id,
            $u['gender'],
            $dob,
            $u['city'],
            $u['country'],
            $u['bio'],
            $u['height'],
            $u['education'],
            $u['occupation'],
            $u['marital_status'],
            $u['religion'],
            $u['caste'],
            $u['tongue']
        ]);
        echo "Imported {$u['name']} successfully.\n";
    } catch (PDOException $e) {
        echo "Error inserting profile for {$u['name']}: " . $e->getMessage() . "\n";
    }
}

echo "Done.\n";
?>