<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

$user_id = $_SESSION['user_id']; // Default to self

// Allow Admin to edit others
if (isAdmin() && isset($_GET['id'])) {
    $user_id = (int) $_GET['id'];
}

$pageTitle = isAdmin() && isset($_GET['id']) ? "Edit User (Admin)" : "Edit Profile";
include 'includes/header.php';

// Fetch Current Profile
$stmt = $pdo->prepare("SELECT * FROM profiles WHERE user_id = ?");
$stmt->execute([$user_id]);
$profile = $stmt->fetch();

// Fetch base user info for Gender (immutable mostly)
$u_stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$u_stmt->execute([$user_id]);
$base_user = $u_stmt->fetch();

if (!$profile) {
    echo "<div class='container mt-20'>Error: Profile not found. Please contact support.</div>";
    include 'includes/footer.php';
    exit;
}

// Handle Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    // Sanitize and Get Variables
    $p = $_POST; // Shortcut

    $sql = "UPDATE profiles SET 
            phone=?, profile_color=?, height=?, weight=?, education=?, university=?, occupation=?, job_post=?, monthly_income=?, 
            marital_status=?, living_arrangement=?, looking_to_marry=?, willing_to_relocate=?,
            bio=?, city=?, state=?, country=?, country_origin=?, state_origin=?, city_origin=?, 
            religion=?, sect=?, is_revert=?, caste=?, mother_tongue=?,
            partner_age_min=?, partner_age_max=?, partner_height_min=?, partner_height_max=?,
            partner_country=?, partner_city=?, partner_religion=?, partner_sect=?, partner_caste=?,
            partner_education=?, partner_profession=?, partner_income=?, partner_expectations=?
            WHERE user_id=?";

    $stmt = $pdo->prepare($sql);
    $params = [
        $p['phone'],
        $p['profile_color'] ?? $profile['profile_color'] ?? null,
        $p['height'],
        $p['weight'],
        $p['education'],
        $p['university'],
        $p['occupation'],
        $p['job_post'],
        $p['monthly_income'],
        $p['marital_status'],
        $p['living_arrangement'],
        $p['looking_to_marry'],
        $p['willing_to_relocate'],
        $p['bio'],
        $p['city'],
        $p['state'],
        $p['country'],
        $p['country_origin'],
        $p['state_origin'],
        $p['city_origin'],
        $p['religion'],
        $p['sect'],
        $p['is_revert'] ?? 'No',
        $p['caste'],
        $p['mother_tongue'],
        $p['partner_age_min'],
        $p['partner_age_max'],
        $p['partner_height_min'],
        $p['partner_height_max'],
        $p['partner_country'],
        $p['partner_city'],
        $p['partner_religion'],
        $p['partner_sect'],
        $p['partner_caste'],
        $p['partner_education'],
        $p['partner_profession'],
        $p['partner_income'],
        $p['partner_expectations'],
        $user_id
    ];

    if ($stmt->execute($params)) {
        // Update User Account Info (Name & Password)
        $name = trim($p['name']);
        $password = $p['password'];

        if (!empty($name)) {
            $email = trim($p['email']);
            if (!empty($password)) {
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $pdo->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?")->execute([$name, $email, $hashed, $user_id]);
            } else {
                $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?")->execute([$name, $email, $user_id]);
            }
        }

        echo "<script>alert('Profile updated successfully!'); window.location.href = 'profile.php" . (isAdmin() && isset($_GET['id']) ? "?id=$user_id" : "") . "';</script>";
        exit;
    } else {
        $error = "Failed to update profile.";
        echo "<script>alert('Failed to update profile.');</script>";
    }
}
?>

<div class="container mt-20">
    <div class="auth-card" style="max-width: 900px; margin: 0 auto;">
        <h2 class="text-center mb-20" style="color: var(--primary);">Edit Profile</h2>

        <form method="POST" action="">

            <!-- 0. ACCOUNT SETTINGS (Name & Password) -->
            <div class="card mb-20">
                <h3
                    style="border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; color: var(--secondary);">
                    Account Settings</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control"
                            value="<?php echo htmlspecialchars($base_user['name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control"
                            value="<?php echo htmlspecialchars($base_user['email']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="password" class="form-control"
                            placeholder="Leave blank to keep current password">
                    </div>
                </div>
            </div>

            <!-- 1. PERSONAL INFO -->
            <div class="card mb-20">
                <h3
                    style="border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; color: var(--secondary);">
                    Personal Information</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">

                    <div class="form-group">
                        <label>Gender (Read Only)</label>
                        <input type="text" class="form-control"
                            value="<?php echo htmlspecialchars($profile['gender']); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control"
                            value="<?php echo htmlspecialchars($profile['date_of_birth']); ?>" disabled
                            title="Contact Admin to change">
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control"
                            value="<?php echo htmlspecialchars($profile['phone'] ?? ''); ?>" required>
                    </div>

                    <div class="form-group"><label>Marital Status</label>
                        <select name="marital_status" class="form-control">
                            <option value="Single" <?php echo ($profile['marital_status'] == 'Single') ? 'selected' : ''; ?>>Single</option>
                            <option value="Divorced" <?php echo ($profile['marital_status'] == 'Divorced') ? 'selected' : ''; ?>>Divorced</option>
                            <option value="Widowed" <?php echo ($profile['marital_status'] == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                            <option value="Separated" <?php echo ($profile['marital_status'] == 'Separated') ? 'selected' : ''; ?>>Separated</option>
                        </select>
                    </div>
                    <div class="form-group"><label>Looking To Marry</label>
                        <select name="looking_to_marry" class="form-control">
                            <option value="Immediately" <?php echo ($profile['looking_to_marry'] == 'Immediately') ? 'selected' : ''; ?>>Immediately</option>
                            <option value="Within 1 Year" <?php echo ($profile['looking_to_marry'] == 'Within 1 Year') ? 'selected' : ''; ?>>Within 1 Year</option>
                            <option value="Anytime" <?php echo ($profile['looking_to_marry'] == 'Anytime') ? 'selected' : ''; ?>>Anytime</option>
                        </select>
                    </div>

                    <div class="form-group"><label>Height (e.g. 5'8")</label><input type="text" name="height"
                            class="form-control" value="<?php echo htmlspecialchars($profile['height']); ?>"></div>
                    <?php if (isPremium() || isAdmin()): ?>
                        <div class="form-group">
                            <label>Complexion / Skin Color</label>
                            <input type="text" name="profile_color" class="form-control"
                                placeholder="e.g. Fair, Wheatish, etc."
                                value="<?php echo htmlspecialchars($profile['profile_color'] ?? ''); ?>">
                        </div>
                    <?php endif; ?>
                    <div class="form-group"><label>Weight (Kg)</label><input type="text" name="weight"
                            class="form-control" value="<?php echo htmlspecialchars($profile['weight']); ?>"></div>

                    <div class="form-group"><label>Mother Tongue</label><input type="text" name="mother_tongue"
                            class="form-control" value="<?php echo htmlspecialchars($profile['mother_tongue']); ?>">
                    </div>
                    <div class="form-group"><label>Caste / Tribe</label><input type="text" name="caste"
                            class="form-control" value="<?php echo htmlspecialchars($profile['caste']); ?>"></div>

                    <div class="form-group"><label>Living Arrangement</label>
                        <select name="living_arrangement" class="form-control">
                            <option value="Live With Family" <?php echo ($profile['living_arrangement'] == 'Live With Family') ? 'selected' : ''; ?>>Live With Family</option>
                            <option value="Independent" <?php echo ($profile['living_arrangement'] == 'Independent') ? 'selected' : ''; ?>>Independent</option>
                        </select>
                    </div>
                    <div class="form-group"><label>Willing To Relocate</label>
                        <select name="willing_to_relocate" class="form-control">
                            <option value="Yes" <?php echo ($profile['willing_to_relocate'] == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                            <option value="No" <?php echo ($profile['willing_to_relocate'] == 'No') ? 'selected' : ''; ?>>
                                No</option>
                            <option value="Maybe" <?php echo ($profile['willing_to_relocate'] == 'Maybe') ? 'selected' : ''; ?>>Maybe</option>
                        </select>
                    </div>
                </div>

                <h4 style="margin: 20px 0 10px; color: #666;">Current Location</h4>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                    <div class="form-group"><label>Country</label><input type="text" name="country" class="form-control"
                            value="<?php echo htmlspecialchars($profile['country']); ?>"></div>
                    <div class="form-group"><label>State / Province</label><input type="text" name="state"
                            class="form-control" value="<?php echo htmlspecialchars($profile['state']); ?>"></div>
                    <div class="form-group"><label>City</label><input type="text" name="city" class="form-control"
                            value="<?php echo htmlspecialchars($profile['city']); ?>"></div>
                </div>

                <h4 style="margin: 20px 0 10px; color: #666;">Origin / Hometown</h4>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                    <div class="form-group"><label>Country of Origin</label><input type="text" name="country_origin"
                            class="form-control" value="<?php echo htmlspecialchars($profile['country_origin']); ?>">
                    </div>
                    <div class="form-group"><label>State of Origin</label><input type="text" name="state_origin"
                            class="form-control" value="<?php echo htmlspecialchars($profile['state_origin']); ?>">
                    </div>
                    <div class="form-group"><label>City of Origin</label><input type="text" name="city_origin"
                            class="form-control" value="<?php echo htmlspecialchars($profile['city_origin']); ?>"></div>
                </div>
            </div>

            <!-- 2. CAREER -->
            <div class="card mb-20">
                <h3
                    style="border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; color: var(--secondary);">
                    Career Information</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div class="form-group"><label>Qualification</label><input type="text" name="education"
                            class="form-control" value="<?php echo htmlspecialchars($profile['education']); ?>"></div>
                    <div class="form-group"><label>University / Institute</label><input type="text" name="university"
                            class="form-control" value="<?php echo htmlspecialchars($profile['university']); ?>"></div>
                    <div class="form-group"><label>Occupation</label><input type="text" name="occupation"
                            class="form-control" value="<?php echo htmlspecialchars($profile['occupation']); ?>"></div>
                    <div class="form-group"><label>Job Post / Designation</label><input type="text" name="job_post"
                            class="form-control" value="<?php echo htmlspecialchars($profile['job_post']); ?>"></div>
                    <div class="form-group"><label>Monthly Income</label><input type="text" name="monthly_income"
                            class="form-control" value="<?php echo htmlspecialchars($profile['monthly_income']); ?>">
                    </div>
                </div>
            </div>

            <!-- 3. RELIGION -->
            <div class="card mb-20">
                <h3
                    style="border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; color: var(--secondary);">
                    Religion</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div class="form-group"><label>Religion</label><input type="text" name="religion"
                            class="form-control" value="<?php echo htmlspecialchars($profile['religion']); ?>"></div>
                    <div class="form-group"><label>Sect</label><input type="text" name="sect" class="form-control"
                            value="<?php echo htmlspecialchars($profile['sect']); ?>"></div>
                    <div class="form-group"><label>Are You Revert?</label>
                        <select name="is_revert" class="form-control">
                            <option value="No" <?php echo ($profile['is_revert'] == 'No') ? 'selected' : ''; ?>>No
                            </option>
                            <option value="Yes" <?php echo ($profile['is_revert'] == 'Yes') ? 'selected' : ''; ?>>Yes
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- 4. PARTNER EXPECTATIONS -->
            <div class="card mb-20">
                <h3
                    style="border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; color: var(--secondary);">
                    Life Partner Expectations</h3>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                    <div class="form-group"><label>Age Range Min</label><input type="number" name="partner_age_min"
                            class="form-control" value="<?php echo htmlspecialchars($profile['partner_age_min']); ?>">
                    </div>
                    <div class="form-group"><label>Age Range Max</label><input type="number" name="partner_age_max"
                            class="form-control" value="<?php echo htmlspecialchars($profile['partner_age_max']); ?>">
                    </div>

                    <div class="form-group"><label>Height Min</label><input type="text" name="partner_height_min"
                            class="form-control"
                            value="<?php echo htmlspecialchars($profile['partner_height_min']); ?>"></div>
                    <div class="form-group"><label>Height Max</label><input type="text" name="partner_height_max"
                            class="form-control"
                            value="<?php echo htmlspecialchars($profile['partner_height_max']); ?>"></div>

                    <div class="form-group"><label>Partner Country</label><input type="text" name="partner_country"
                            class="form-control" value="<?php echo htmlspecialchars($profile['partner_country']); ?>">
                    </div>
                    <div class="form-group"><label>Partner City</label><input type="text" name="partner_city"
                            class="form-control" value="<?php echo htmlspecialchars($profile['partner_city']); ?>">
                    </div>

                    <div class="form-group"><label>Partner Religion</label><input type="text" name="partner_religion"
                            class="form-control" value="<?php echo htmlspecialchars($profile['partner_religion']); ?>">
                    </div>
                    <div class="form-group"><label>Partner Sect</label><input type="text" name="partner_sect"
                            class="form-control" value="<?php echo htmlspecialchars($profile['partner_sect']); ?>">
                    </div>
                    <div class="form-group"><label>Partner Caste</label><input type="text" name="partner_caste"
                            class="form-control" value="<?php echo htmlspecialchars($profile['partner_caste']); ?>">
                    </div>

                    <div class="form-group"><label>Partner Education</label><input type="text" name="partner_education"
                            class="form-control" value="<?php echo htmlspecialchars($profile['partner_education']); ?>">
                    </div>
                    <div class="form-group"><label>Partner Profession</label><input type="text"
                            name="partner_profession" class="form-control"
                            value="<?php echo htmlspecialchars($profile['partner_profession']); ?>"></div>
                    <div class="form-group"><label>Partner Income</label><input type="text" name="partner_income"
                            class="form-control" value="<?php echo htmlspecialchars($profile['partner_income']); ?>">
                    </div>
                </div>

                <div class="form-group mt-20">
                    <label>Other Expectations / Details</label>
                    <textarea name="partner_expectations" class="form-control"
                        rows="4"><?php echo htmlspecialchars($profile['partner_expectations']); ?></textarea>
                </div>
            </div>

            <div class="bio-popup mt-20">
                <label>Bio / About Me</label>
                <textarea name="bio" class="form-control" rows="5"
                    placeholder="Tell us about yourself..."><?php echo htmlspecialchars($profile['bio']); ?></textarea>
            </div>

            <div class="text-center mt-20">
                <button type="submit" name="update_profile" class="btn-search btn-gap"
                    style="padding: 12px 40px; display: inline-block; width: auto;">Save All
                    Changes</button>
                <a href="profile.php" class="btn-search btn-cancel"
                    style="text-decoration: none; display: inline-block; width: auto; padding: 12px 40px;">Cancel</a>
            </div>

        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>