<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

$pageTitle = "Register";
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $dob = $_POST['date_of_birth'];
    $city = trim($_POST['city']);

    if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($gender) || empty($dob) || empty($city)) {
        $error = "All fields are required.";
    } else {
        // Check email
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = "Email already registered.";
        } else {
            // Register
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $pdo->beginTransaction();
            try {
                // Insert User (Explicitly REAL: is_fake = 0)
                $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, status, is_fake) VALUES (?, ?, ?, 'user', 'pending', 0)");
                $stmt->execute([$name, $email, $hashed_password]);
                $user_id = $pdo->lastInsertId();

                // Insert Profile
                $stmt = $pdo->prepare("INSERT INTO profiles (user_id, gender, date_of_birth, city, phone) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$user_id, $gender, $dob, $city, $phone]);

                $pdo->commit();
                $success = "Registration successful! You can now login.";
                // Auto login could be added here, but let's redirect to login for clarity
                // redirect('login.php');
            } catch (Exception $e) {
                $pdo->rollBack();
                $error = "Registration failed: " . $e->getMessage();
            }
        }
    }
}

include 'includes/header.php';
?>

<div class="container mt-20">
    <div class="auth-card">
        <h2 class="text-center">Create Account</h2>
        <?php if ($error): ?>
            <p style="color: red; text-align: center;"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p style="color: green; text-align: center;"><?php echo $success; ?> <a href="login.php">Login here</a></p>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group mb-10">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group mb-10">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mb-10">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="e.g. +923001234567" required>
            </div>
            <div class="form-group mb-10">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group mb-10">
                <label>Gender</label>
                <select name="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group mb-10">
                <label>Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control" required>
            </div>
            <div class="form-group mb-10">
                <label>City</label>
                <input type="text" name="city" class="form-control" required>
            </div>
            <div class="text-center mt-20">
                <button type="submit" class="btn-search" style="width: 100%;">Register</button>
            </div>
            <p class="text-center mt-20">
                Already have an account? <a href="login.php">Login</a>
            </p>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>