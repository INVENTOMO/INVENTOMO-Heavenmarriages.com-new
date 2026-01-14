<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

$pageTitle = "Search Profiles";
$currentPage = "search";

// Filters
$where = "(u.status = 'approved' OR u.status = 'active') AND u.role = 'user' AND u.email != 'ibraheemtahir0rs@gmail.com'";
$params = [];

if (isset($_GET['gender']) && !empty($_GET['gender'])) {
    $where .= " AND p.gender = ?";
    $params[] = $_GET['gender'];
}

if (isset($_GET['city']) && !empty($_GET['city'])) {
    $where .= " AND p.city LIKE ?";
    $params[] = "%" . $_GET['city'] . "%";
}
// Age logic roughly
if (isset($_GET['age_from']) && !empty($_GET['age_from'])) {
    $date = date('Y-m-d', strtotime("-{$_GET['age_from']} years"));
    $where .= " AND p.date_of_birth <= ?"; // Younger date is higher value? No. 1990 <= 2000. 
    // born before (today - 20 years) means age >= 20. 
    // Born in 2000. Today 2025. Age 25.
    // If Age From 20. Target Date 2005. 2000 <= 2005. Correct.
    $params[] = $date;
}
if (isset($_GET['age_to']) && !empty($_GET['age_to'])) {
    $date = date('Y-m-d', strtotime("-{$_GET['age_to']} years"));
    // Born after (today - 30 years).
    $where .= " AND p.date_of_birth >= ?";
    $params[] = $date;
}

// Query
$sql = "SELECT u.id, u.name, u.is_premium, u.is_fake, p.*, 
        (SELECT id FROM photos WHERE user_id = u.id AND is_primary = 1 LIMIT 1) as photo_id
        FROM users u 
        JOIN profiles p ON u.id = p.user_id 
        WHERE $where 
        ORDER BY u.created_at DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$profiles = $stmt->fetchAll();

include 'includes/header.php';
?>

<div class="container mt-20">
    <h2>Searching Matches</h2>

    <div class="search-box-container static-box">
        <form action="" method="GET" class="search-form">
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="">Any</option>
                    <option value="Female" <?php echo (isset($_GET['gender']) && $_GET['gender'] == 'Female') ? 'selected' : ''; ?>>Bride (Female)</option>
                    <option value="Male" <?php echo (isset($_GET['gender']) && $_GET['gender'] == 'Male') ? 'selected' : ''; ?>>Groom (Male)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Age From</label>
                <select name="age_from" class="form-control">
                    <option value="">Any</option>
                    <?php for ($i = 18; $i <= 60; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo (isset($_GET['age_from']) && $_GET['age_from'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Age To</label>
                <select name="age_to" class="form-control">
                    <option value="">Any</option>
                    <?php for ($i = 18; $i <= 60; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo (isset($_GET['age_to']) && $_GET['age_to'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control" value="<?php echo $_GET['city'] ?? ''; ?>">
            </div>
            <div class="form-group form-group-btn">
                <label>&nbsp;</label>
                <button type="submit" class="btn-search">Search Matches</button>
            </div>
        </form>
    </div>

    <?php
    // Check permissions
    $viewer_can_see = false;
    if (isLoggedIn() && (isAdmin() || isPremium())) {
        $viewer_can_see = true;
    }

    if (count($profiles) > 0):
        ?>
        <div class="profiles-grid">
            <?php
            foreach ($profiles as $p):
                // Calculate age
                $age = '';
                if (!empty($p['date_of_birth'])) {
                    $age = date_diff(date_create($p['date_of_birth']), date_create('today'))->y;
                }

                // Permission check for this specific profile (redundant global check above? No, viewer_can_see logic needs to be inside loop or global? 
                // The loop below (lines 116+) does its own check. I will let the loop handle it to be safe, or clean it up.
                // For now, just fix the syntax crash.
        


                // Check permissions
                $viewer_can_see = false;
                if (isset($_SESSION['user_id'])) {
                    if ($_SESSION['user_id'] == $p['user_id'] || isAdmin() || isPremium()) {
                        $viewer_can_see = true;
                    }
                }

                // Profile Completion (approximate)
                $filled = 0;
                $total = 10;
                if (!empty($p['education']))
                    $filled++;
                if (!empty($p['occupation']))
                    $filled++;
                if (!empty($p['height']))
                    $filled++;
                if (!empty($p['marital_status']))
                    $filled++;
                if (!empty($p['city']))
                    $filled++;
                if (!empty($p['country']))
                    $filled++;
                if (!empty($p['bio']))
                    $filled++;
                if (!empty($p['caste']))
                    $filled++;
                if (!empty($p['religion']))
                    $filled++;
                if (!empty($p['mother_tongue']))
                    $filled++;

                $progress = ($filled / $total) * 100;
                if ($progress > 95)
                    $progress = 98;
                ?>
                <div class="profile-card <?php echo $p['is_premium'] ? 'is-premium' : ''; ?>" style="position: relative;">
                    <?php if ($p['is_premium']): ?>
                        <div class="premium-verification-badge" title="Premium Member">
                            <i class="fas fa-crown"></i>
                        </div>
                    <?php endif; ?>
                    <!-- Name and Header -->
                    <div style="padding: 15px 20px; border-bottom: 1px solid #f0f0f0;">
                        <h3 style="margin: 0; color: var(--primary); font-size: 1.4rem;">
                            <?php echo htmlspecialchars($p['name']); ?>
                            <?php if (isAdmin() && isset($p['is_fake']) && $p['is_fake']): ?>
                                <span
                                    style="background: #dc3545; color: white; font-size: 0.7rem; padding: 2px 6px; border-radius: 4px; vertical-align: middle; margin-left: 10px; text-transform: uppercase; font-weight: bold;">Fake</span>
                            <?php endif; ?>
                        </h3>
                    </div>

                    <!-- Content Body -->
                    <div style="padding: 20px; flex: 1; display: flex; flex-wrap: wrap; gap: 20px;">

                        <!-- Image -->
                        <div style="width: 150px; flex-shrink: 0; text-align: center;">
                            <div class="profile-img-container"
                                style="height: 150px; width: 150px; border-radius: 50%; margin: 0 auto 10px; border: 3px solid #eee;">
                                <?php if ($p['photo_id']): ?>
                                    <img src="image.php?id=<?php echo $p['photo_id']; ?>"
                                        class="<?php echo !$viewer_can_see ? 'blur-effect' : ''; ?>" style="border-radius: 50%;">
                                    <?php if (!$viewer_can_see): ?>
                                        <div class="locked-overlay" style="border-radius: 50%;">
                                            <i class="fas fa-lock" style="font-size: 20px;"></i>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div
                                        style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #aaa; border-radius: 50%;">
                                        <i class="fas fa-user" style="font-size: 50px;"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Details Grid -->
                        <div style="flex: 1; min-width: 280px;">
                            <div class="info-grid">

                                <div class="info-item">
                                    <span class="info-label"><i class="fas fa-birthday-cake"></i> Age</span>
                                    <span class="info-value"><?php echo $age ? $age . ' Years' : 'N/A'; ?></span>
                                </div>

                                <div class="info-item">
                                    <span class="info-label"><i class="fas fa-ruler-vertical"></i> Height</span>
                                    <span
                                        class="info-value"><?php echo $p['height'] ? htmlspecialchars($p['height']) : '-'; ?></span>
                                </div>

                                <div class="info-item">
                                    <span class="info-label"><i class="fas fa-mosque"></i> Religion</span>
                                    <span
                                        class="info-value"><?php echo $p['religion'] ? htmlspecialchars($p['religion']) : '-'; ?></span>
                                </div>

                                <div class="info-item">
                                    <span class="info-label"><i class="fas fa-users"></i> Caste</span>
                                    <span
                                        class="info-value"><?php echo $p['caste'] ? htmlspecialchars($p['caste']) : '-'; ?></span>
                                </div>

                                <div class="info-item">
                                    <span class="info-label"><i class="fas fa-language"></i> Tongue</span>
                                    <span
                                        class="info-value"><?php echo $p['mother_tongue'] ? htmlspecialchars($p['mother_tongue']) : '-'; ?></span>
                                </div>

                                <div class="info-item">
                                    <span class="info-label"><i class="fas fa-heart"></i> Status</span>
                                    <span
                                        class="info-value"><?php echo $p['marital_status'] ? htmlspecialchars($p['marital_status']) : '-'; ?></span>
                                </div>

                                <div class="info-item">
                                    <span class="info-label"><i class="fas fa-globe"></i> Country</span>
                                    <span
                                        class="info-value"><?php echo $p['country'] ? htmlspecialchars($p['country']) : '-'; ?></span>
                                </div>

                                <div class="info-item">
                                    <span class="info-label"><i class="fas fa-map-marker-alt"></i> City</span>
                                    <span
                                        class="info-value"><?php echo $p['city'] ? htmlspecialchars($p['city']) : '-'; ?></span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Footer Button -->
                    <a href="profile.php?id=<?php echo $p['user_id']; ?>" class="btn-card-footer">
                        View Profile
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center" style="font-size: 1.2rem; color: #777;">No matches found matching your criteria.</p>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>