<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (isLoggedIn()) {
    redirect('index.php');
}

$pageTitle = "Login";
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Please enter email and password.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Check if Banned
            if ($user['status'] === 'banned') {
                $error = "Your account has been banned due to violation of our terms. Please contact support.";
            } else {
                // Login Success
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['is_premium'] = $user['is_premium'];

                if ($user['role'] === 'admin') {
                    redirect('admin_dashboard.php');
                } else {
                    redirect('index.php');
                }
            }
        } else {
            $error = "Invalid credentials.";
        }
    }
}

include 'includes/header.php';
?>

<div class="container mt-20">
    <div class="auth-card">
        <h2 class="text-center">Login</h2>
        <?php if ($error): ?>
            <p style="color: red; text-align: center;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group mb-10">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mb-10">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="text-center mt-20">
                <button type="submit" class="btn-search" style="width: 100%;">Login</button>
            </div>
            <p class="text-center mt-20">
                Don't have an account? <a href="register.php">Register</a>
            </p>
        </form>
    </div>
</div>

<!-- Banned Account Popup -->
<?php if (isset($error) && strpos($error, 'banned') !== false): ?>
    <div id="bannedModal"
        style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); display:flex; align-items:center; justify-content:center; z-index:9999; animation: fadeIn 0.3s;">
        <div
            style="background:white; padding:40px 30px; border-radius:12px; text-align:center; max-width:400px; width:90%; box-shadow:0 10px 25px rgba(0,0,0,0.2); position: relative;">
            <i class="fas fa-user-slash" style="font-size:60px; color:#dc3545; margin-bottom:20px; display:block;"></i>
            <h2 style="color:#dc3545; margin-bottom:10px; font-size: 24px;">Access Denied</h2>
            <p style="color:#555; font-size: 16px; line-height: 1.5; margin-bottom:25px;">
                <?php echo $error; ?>
            </p>
            <button onclick="document.getElementById('bannedModal').style.display='none'"
                style="background:#333; color:white; border:none; padding:12px 30px; border-radius:30px; font-size:16px; font-weight:600; cursor:pointer; transition:0.3s;">
                Understood
            </button>
        </div>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>