<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

$is_own_profile = false;
$user_id = 0;
$profile = null;
$photos = [];

if (isset($_GET['id'])) {
    $user_id = (int) $_GET['id'];
    if (isLoggedIn() && $_SESSION['user_id'] == $user_id) {
        $is_own_profile = true;
    }
} elseif (isLoggedIn()) {
    $user_id = $_SESSION['user_id'];
    $is_own_profile = true;
} else {
    redirect('login.php');
}

// Fetch Profile
$stmt = $pdo->prepare("SELECT u.name, u.email, u.is_premium, u.is_fake, u.role, p.* FROM users u LEFT JOIN profiles p ON u.id = p.user_id WHERE u.id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    die("User not found.");
}

// Fetch Photos
$stmt = $pdo->prepare("SELECT * FROM photos WHERE user_id = ?");
$stmt->execute([$user_id]);
$photos = $stmt->fetchAll();

// View Permissions
$can_see_full = false;
if ($is_own_profile || isAdmin() || isPremium()) {
    $can_see_full = true;
}

// Handle Profile Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile']) && $is_own_profile) {
    $height = trim($_POST['height']);
    $edu = trim($_POST['education']);
    $occ = trim($_POST['occupation']);
    $mar = $_POST['marital_status'];
    $bio = trim($_POST['bio']);

    $stmt = $pdo->prepare("UPDATE profiles SET height=?, education=?, occupation=?, marital_status=?, bio=? WHERE user_id=?");
    if ($stmt->execute([$height, $edu, $occ, $mar, $bio, $user_id])) {
        // Redirect to avoid resubmission
        header("Location: profile.php");
        exit;
    }
}

$pageTitle = $user['name'] . "'s Profile";
include 'includes/header.php';
?>



<div class="container mt-20">
    <?php if ($is_own_profile && $user['status'] === 'pending'): ?>
        <div
            style="background: #fff3cd; color: #856404; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #ffeeba; display: flex; align-items: center; gap: 15px;">
            <i class="fas fa-clock" style="font-size: 24px;"></i>
            <div>
                <strong>Account Pending Approval:</strong> Your profile is currently under review by our administrators. It
                will be visible to others once approved. You can still complete your profile details below.
            </div>
        </div>
    <?php endif; ?>

    <div style="display: flex; gap: 30px; flex-wrap: wrap;">
        <!-- Sidebar / Photo -->
        <div style="flex: 1; min-width: 300px;">
            <div class="card text-center">
                <?php
                $primary_photo_id = 0;
                foreach ($photos as $ph) {
                    if ($ph['is_primary'])
                        $primary_photo_id = $ph['id'];
                }
                if (!$primary_photo_id && count($photos) > 0)
                    $primary_photo_id = $photos[0]['id'];
                ?>
                <div
                    style="height: 350px; background: #eee; border-radius: 8px; overflow: hidden; margin-bottom: 20px; position: relative;">
                    <?php if ($user['is_premium']): ?>
                        <div class="premium-verification-badge"
                            style="top: 15px; right: 15px; width: 40px; height: 40px; font-size: 18px;">
                            <i class="fas fa-crown"></i>
                        </div>
                    <?php endif; ?>
                    <?php if ($primary_photo_id): ?>
                        <div style="width: 100%; height: 100%; overflow: hidden;">
                            <img src="image.php?id=<?php echo $primary_photo_id; ?>"
                                class="<?php echo !$can_see_full ? 'blur-effect' : ''; ?>"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <?php if (!$can_see_full): ?>
                            <div
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.1); z-index: 2;">
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div
                            style="display: flex; align-items: center; justify-content: center; height: 100%; color: #999;">
                            <i class="fas fa-user-circle" style="font-size: 80px;"></i>
                        </div>
                    <?php endif; ?>
                </div>

                <h3>
                    <?php echo htmlspecialchars($user['name']); ?>
                    <?php if (isAdmin() && isset($user['is_fake']) && $user['is_fake']): ?>
                        <span
                            style="background: #dc3545; color: white; font-size: 0.8rem; padding: 2px 8px; border-radius: 4px; vertical-align: middle; margin-left: 10px; text-transform: uppercase;">Fake</span>
                    <?php endif; ?>
                </h3>
                <?php if ($can_see_full): ?>
                    <p class="mb-10"><span
                            style="background: gold; padding: 2px 8px; border-radius: 4px; font-size: 0.8rem;">Verified</span>
                    </p>
                <?php else: ?>
                    <p class="mb-10"><span
                            style="background: #eee; padding: 2px 8px; border-radius: 4px; font-size: 0.8rem;">Basic Info
                            Visible</span></p>
                <?php endif; ?>

                <?php if ($is_own_profile): ?>
                    <form action="upload_photo.php" method="POST" enctype="multipart/form-data" style="margin-top: 20px;">

                        <div class="custom-file-upload">
                            <input type="file" name="photo" id="photo-upload" required style="display: none;"
                                onchange="document.getElementById('file-name-text').textContent = this.files[0].name">
                            <label for="photo-upload" class="upload-label"
                                style="border: 2px dashed #ddd; border-radius: 8px; padding: 20px; text-align: center; cursor: pointer; display: block; transition: all 0.3s; background: #fafafa; margin-bottom: 10px;">
                                <div style="margin-bottom: 5px;"><i class="fas fa-cloud-upload-alt"
                                        style="font-size: 24px; color: var(--primary);"></i></div>
                                <span id="file-name-text" style="color: #666; font-size: 0.9rem;">Choose a Photo</span>
                            </label>
                        </div>

                        <button type="submit" class="btn-search"
                            style="width: 100%; border-radius: 8px; padding: 10px; font-weight: bold;">
                            Upload Photo
                        </button>
                    </form>
                <?php elseif (!$is_own_profile): ?>
                    <?php if ($can_see_full): ?>
                        <?php
                        global $wa_number;
                        // Use $user_id derived from GET/Session which is reliable
                        $msg = "Hello Admin, I am interested in Heaven Marriage Profile ID: " . $user_id . " (" . $user['name'] . ")";
                        $link = "https://wa.me/" . str_replace('+', '', $wa_number) . "?text=" . urlencode($msg);
                        ?>
                        <a href="<?php echo $link; ?>" target="_blank" class="btn-search"
                            style="display: block; margin-top: 10px; text-decoration: none; background-color: #25d366;">Contact
                            via Admin</a>
                    <?php else: ?>
                        <div
                            style="background: #fff3cd; padding: 10px; border-radius: 4px; margin-top: 10px; font-size: 0.9rem;">
                            Upgrade to Premium to see full details and contact.
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <?php if (count($photos) > 1): ?>
                <div class="card mt-20">
                    <h4>Gallery</h4>
                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        <?php foreach ($photos as $ph): ?>
                            <img src="image.php?id=<?php echo $ph['id']; ?>"
                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px; cursor: pointer;">
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Details -->
        <div style="flex: 2; min-width: 300px;">
            <div class="card">
                <h2>Profile Details</h2>

                <!-- Basic Info Grid (Always Visible) -->
                <table class="details-table">
                    <tr>
                        <th style="color: var(--primary);">Profile ID</th>
                        <td style="font-weight: bold; color: var(--primary);">#<?php echo $user_id; ?></td>
                    </tr>
                    <?php if ($is_own_profile || isAdmin()): ?>
                        <tr>
                            <th>Email</th>
                            <td><?php echo htmlspecialchars($user['email'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?php echo htmlspecialchars($user['phone'] ?? 'N/A'); ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <th>Age</th>
                        <td><?php echo $user['date_of_birth'] ? date_diff(date_create($user['date_of_birth']), date_create('today'))->y : 'N/A'; ?>
                            Years</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo htmlspecialchars($user['gender'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><?php echo htmlspecialchars($user['city'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>Height</th>
                        <td><?php echo htmlspecialchars($user['height'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>Religion</th>
                        <td><?php echo htmlspecialchars($user['religion'] ?? 'Islam'); ?></td>
                    </tr>
                    <tr>
                        <th>Caste / Sect</th>
                        <td><?php echo htmlspecialchars($user['caste'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>Mother Tongue</th>
                        <td><?php echo htmlspecialchars($user['mother_tongue'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>Marital Status</th>
                        <td><?php echo htmlspecialchars($user['marital_status'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td><?php echo htmlspecialchars($user['country'] ?? 'Pakistan'); ?></td>
                    </tr>
                    <tr>
                        <th>State / Province</th>
                        <td><?php echo htmlspecialchars($user['state'] ?? 'N/A'); ?></td>
                    </tr>
                </table>

                <!-- Bio (Always Visible) -->
                <?php if ($user['bio']): ?>
                    <div style="margin-top: 30px;">
                        <h3 style="border-bottom: 2px solid #f0f0f0; padding-bottom: 10px; margin-bottom: 15px;">About Me
                        </h3>
                        <p style="line-height: 1.6; color: #555; font-size: 1.05rem;">
                            <?php echo nl2br(htmlspecialchars($user['bio'])); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <!-- DETAILED SECTIONS (Premium/Admin/Owner Only) -->
                <?php if ($can_see_full): ?>
                    <div style="margin-top: 40px; border-top: 1px solid #eee; padding-top: 20px;">

                        <!-- Personal Info -->
                        <h3
                            style="border-bottom: 2px solid var(--primary); padding-bottom: 10px; margin-bottom: 15px; color: var(--primary); font-size: 1.2rem;">
                            Personal Information</h3>
                        <table class="details-table">
                            <tr>
                                <th>Origin</th>
                                <td><?php echo htmlspecialchars(($user['city_origin'] ?? '') . ', ' . ($user['state_origin'] ?? '') . ', ' . ($user['country_origin'] ?? '')); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Looking To Marry</th>
                                <td><?php echo htmlspecialchars($user['looking_to_marry'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th>Living Arrangement</th>
                                <td><?php echo htmlspecialchars($user['living_arrangement'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th>Willing To Relocate</th>
                                <td><?php echo htmlspecialchars($user['willing_to_relocate'] ?? ''); ?></td>
                            </tr>
                            <?php if ($user['is_premium']): ?>
                                <tr>
                                    <th>Complexion</th>
                                    <td><?php echo htmlspecialchars($user['profile_color'] ?? ''); ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <th>Weight</th>
                                <td><?php echo htmlspecialchars($user['weight'] ?? ''); ?></td>
                            </tr>
                        </table>

                        <!-- Career Info -->
                        <h3
                            style="border-bottom: 2px solid var(--primary); padding-bottom: 10px; margin-bottom: 15px; color: var(--primary); font-size: 1.2rem; margin-top: 30px;">
                            Career Information</h3>
                        <table class="details-table">
                            <tr>
                                <th>Qualification</th>
                                <td><?php echo htmlspecialchars($user['education'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th>University</th>
                                <td><?php echo htmlspecialchars($user['university'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th>Occupation</th>
                                <td><?php echo htmlspecialchars($user['occupation'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th>Job Post</th>
                                <td><?php echo htmlspecialchars($user['job_post'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th>Monthly Income</th>
                                <td><?php echo htmlspecialchars($user['monthly_income'] ?? ''); ?></td>
                            </tr>
                        </table>

                        <!-- Religion -->
                        <h3
                            style="border-bottom: 2px solid var(--primary); padding-bottom: 10px; margin-bottom: 15px; color: var(--primary); font-size: 1.2rem; margin-top: 30px;">
                            Religion</h3>
                        <table class="details-table">
                            <tr>
                                <th>Religion</th>
                                <td><?php echo htmlspecialchars($user['religion'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th>Sect</th>
                                <td><?php echo htmlspecialchars($user['sect'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th>Are You Revert</th>
                                <td><?php echo htmlspecialchars($user['is_revert'] ?? ''); ?></td>
                            </tr>
                        </table>

                        <!-- Partner Expectations -->
                        <h3
                            style="border-bottom: 2px solid var(--primary); padding-bottom: 10px; margin-bottom: 15px; color: var(--primary); font-size: 1.2rem; margin-top: 30px;">
                            Life Partner Expectations</h3>
                        <table class="details-table">
                            <tr>
                                <th>Age Range</th>
                                <td><?php echo htmlspecialchars(($user['partner_age_min'] ?? '') . ' - ' . ($user['partner_age_max'] ?? '')); ?>
                                    Years</td>
                            </tr>
                            <tr>
                                <th>Height Range</th>
                                <td><?php echo htmlspecialchars(($user['partner_height_min'] ?? '') . ' - ' . ($user['partner_height_max'] ?? '')); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <td><?php echo htmlspecialchars(($user['partner_city'] ?? '') . ', ' . ($user['partner_country'] ?? '')); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Religion / Sect</th>
                                <td><?php echo htmlspecialchars(($user['partner_religion'] ?? '') . ' / ' . ($user['partner_sect'] ?? '')); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Caste / Clan</th>
                                <td><?php echo htmlspecialchars($user['partner_caste'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th>Education</th>
                                <td><?php echo htmlspecialchars($user['partner_education'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th>Profession</th>
                                <td><?php echo htmlspecialchars($user['partner_profession'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th>Income</th>
                                <td><?php echo htmlspecialchars($user['partner_income'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th>Other</th>
                                <td><?php echo nl2br(htmlspecialchars($user['partner_expectations'] ?? '')); ?></td>
                            </tr>
                        </table>

                    </div>
                <?php else: ?>
                    <!-- Upsell for Free Users to see logic -->
                    <div
                        style="margin-top: 40px; background: #fafafa; padding: 20px; border-radius: 8px; text-align: center; border: 1px dashed #ccc;">
                        <i class="fas fa-lock" style="font-size: 30px; color: #999; margin-bottom: 15px;"></i>
                        <h3 style="color: #666; margin-bottom: 10px;">Detailed Profile Locked</h3>
                        <p style="color: #888; margin-bottom: 20px;">Upgrade to Premium to view detailed Career, Origin, and
                            Partner Preference information.</p>
                        <a href="plans.php" class="btn-search">Unlock Full Profile</a>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($is_own_profile): ?>
                <div style="margin-top: 20px; margin-bottom: 40px; text-align: right;">
                    <a href="edit_profile.php" class="btn-card-footer"
                        style="display: inline-block; width: auto; background: var(--secondary); color: white; padding: 12px 25px; border-radius: 6px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-weight: 600;">Edit
                        Full
                        Profile <i class="fas fa-edit" style="margin-left: 8px;"></i></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>