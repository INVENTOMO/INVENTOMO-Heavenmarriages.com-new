<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

$pageTitle = "Home";
$currentPage = "home";

// Fetch settings for hero
$heroTitle = getSetting($pdo, 'hero_title') ?: "Find Your Perfect Match";
$heroSubtitle = getSetting($pdo, 'hero_subtitle') ?: "Trusted by Millions";

include 'includes/header.php';
?>

<!-- Hero Section -->
<header class="hero-section">
    <h1 class="hero-title"><?php echo htmlspecialchars($heroTitle); ?></h1>
    <p class="hero-subtitle"><?php echo htmlspecialchars($heroSubtitle); ?></p>
</header>
<div class="container search-box-container">
    <!-- Search Form (Same as before) -->
    <h2 class="text-center mb-10">Find Your Perfect Match</h2>
    <form action="search.php" method="GET" class="search-form">
        <div class="form-group">
            <label>I'm looking for a</label>
            <select name="gender" class="form-control">
                <option value="Female">Bride (Female)</option>
                <option value="Male">Groom (Male)</option>
            </select>
        </div>
        <div class="form-group">
            <label>Age From</label>
            <select name="age_from" class="form-control">
                <?php for ($i = 18; $i <= 60; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Age To</label>
            <select name="age_to" class="form-control">
                <option value="30" selected>30</option>
                <?php for ($i = 18; $i <= 60; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" name="city" class="form-control" placeholder="e.g. Lahore">
        </div>
        <div class="form-group form-group-btn">
            <label>&nbsp;</label>
            <button type="submit" class="btn-search">Search Now</button>
        </div>
    </form>
</div>

<!-- Browse By Location (New Visual Section) -->
<div class="container" style="margin-top: -20px; position: relative; z-index: 5;">
    <div class="card" style="padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
        <div
            style="display: flex; justify-content: space-between; gap: 20px; overflow-x: auto; padding-bottom: 10px; text-align: center;">

            <a href="search.php?city=Lahore" style="flex: 1; min-width: 100px; text-decoration: none; color: #333;">
                <i class="fas fa-mosque" style="font-size: 40px; color: var(--primary); margin-bottom: 10px;"></i>
                <div style="font-weight: 700; font-size: 0.9rem;">Lahore Profile</div>
            </a>

            <a href="search.php?city=Islamabad" style="flex: 1; min-width: 120px; text-decoration: none; color: #333;">
                <i class="fas fa-landmark" style="font-size: 40px; color: var(--primary); margin-bottom: 10px;"></i>
                <div style="font-weight: 700; font-size: 0.9rem;">Islamabad / Pindi</div>
            </a>

            <a href="search.php?city=Karachi" style="flex: 1; min-width: 100px; text-decoration: none; color: #333;">
                <i class="fas fa-archway" style="font-size: 40px; color: var(--primary); margin-bottom: 10px;"></i>
                <div style="font-weight: 700; font-size: 0.9rem;">Karachi Profile</div>
            </a>

            <a href="search.php?city=Kashmir" style="flex: 1; min-width: 100px; text-decoration: none; color: #333;">
                <i class="fas fa-mountain" style="font-size: 40px; color: var(--primary); margin-bottom: 10px;"></i>
                <div style="font-weight: 700; font-size: 0.9rem;">Kashmir Profile</div>
            </a>

            <a href="search.php?city=KPK" style="flex: 1; min-width: 100px; text-decoration: none; color: #333;">
                <i class="fas fa-dungeon" style="font-size: 40px; color: var(--primary); margin-bottom: 10px;"></i>
                <div style="font-weight: 700; font-size: 0.9rem;">KPK Profile</div>
            </a>

            <a href="search.php?city=South Punjab"
                style="flex: 1; min-width: 120px; text-decoration: none; color: #333;">
                <i class="fas fa-heart" style="font-size: 40px; color: var(--primary); margin-bottom: 10px;"></i>
                <div style="font-weight: 700; font-size: 0.9rem;">South Punjab</div>
            </a>

            <a href="search.php" style="flex: 1; min-width: 100px; text-decoration: none; color: #333;">
                <i class="fas fa-city" style="font-size: 40px; color: var(--primary); margin-bottom: 10px;"></i>
                <div style="font-weight: 700; font-size: 0.9rem;">Other City</div>
            </a>

            <a href="search.php?city=International"
                style="flex: 1; min-width: 120px; text-decoration: none; color: #333;">
                <i class="fas fa-globe-asia" style="font-size: 40px; color: var(--primary); margin-bottom: 10px;"></i>
                <div style="font-weight: 700; font-size: 0.9rem;">International</div>
            </a>

        </div>
    </div>
</div>

<!-- Latest Profiles Section -->
<div class="container mt-20">
    <h2 class="text-center" style="margin-bottom: 40px; font-size: 2.5rem;">Latest Matches</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
        <?php
        // Fetch 6 latest profiles
        $stmt = $pdo->query("SELECT u.id, u.name, u.is_premium, u.is_fake, p.*, 
                    (SELECT id FROM photos WHERE user_id = u.id AND is_primary = 1 LIMIT 1) as photo_id
                    FROM users u
                    JOIN profiles p ON u.id = p.user_id
                    WHERE (u.status = 'approved' OR u.status = 'active') AND u.role = 'user' AND u.email != 'ibraheemtahir0rs@gmail.com'
                    ORDER BY u.created_at DESC LIMIT 6");
        $latest_profiles = $stmt->fetchAll();

        $viewer_can_see = false;
        if (isLoggedIn() && (isAdmin() || isPremium())) {
            $viewer_can_see = true;
        }

        foreach ($latest_profiles as $p):
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
                            <?php
                            $age = '';
                            if (!empty($p['date_of_birth'])) {
                                $age = date_diff(date_create($p['date_of_birth']), date_create('today'))->y;
                            }
                            ?>

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

    <div class="text-center" style="margin-top: 40px;">
        <a href="search.php" class="nav-btn nav-btn-outline" style="padding: 15px 40px; font-size: 1.1rem;">Load
            More
            Profiles &rarr;</a>
    </div>
</div>

<?php include 'includes/stats_strip.php'; ?>

<!-- How It Works Section -->
<div class="container" style="margin: 80px auto; text-align: center;">
    <h2 style="font-size: 2.5rem; margin-bottom: 10px;">How It <span style="color: #BA2D0B;">Works</span></h2>
    <div style="width: 50px; height: 3px; background: #BA2D0B; margin: 0 auto 20px;"></div>
    <p style="color: #666; margin-bottom: 50px;">Step Into a World of Beautiful Proposals</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 30px;">
        <!-- Step 1 -->
        <div class="card"
            style="padding: 40px 20px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s ease;">
            <div
                style="width: 60px; height: 60px; background: #BA2D0B; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; font-weight: bold; margin: 0 auto 20px;">
                01</div>
            <h3 style="margin-bottom: 15px;">Profile Creation</h3>
            <p style="color: #666; font-size: 0.95rem; line-height: 1.6;">
                Confirm eligibility, submit your profile, and pay a non-refundable registration fee to get
                started.
            </p>
        </div>

        <!-- Step 2 -->
        <div class="card"
            style="padding: 40px 20px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s ease;">
            <div
                style="width: 60px; height: 60px; background: #BA2D0B; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; font-weight: bold; margin: 0 auto 20px;">
                02</div>
            <h3 style="margin-bottom: 15px;">Matching Process</h3>
            <p style="color: #666; font-size: 0.95rem; line-height: 1.6;">
                Receive 3-4 proposals weekly via WhatsApp. Shortlist your matches and arrange meetings upon
                mutual
                interest.
            </p>
        </div>

        <!-- Step 3 -->
        <div class="card"
            style="padding: 40px 20px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s ease;">
            <div
                style="width: 60px; height: 60px; background: #BA2D0B; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; font-weight: bold; margin: 0 auto 20px;">
                03</div>
            <h3 style="margin-bottom: 15px;">Finalization & Closure</h3>
            <p style="color: #666; font-size: 0.95rem; line-height: 1.6;">
                Pay the final fee when matched. Service ends upon match or expiry. Misconduct results in
                termination.
            </p>
        </div>
    </div>
</div>

<!-- Features Section (Why Us) -->
<div class="container" style="margin: 80px auto;">
    <h2 class="text-center" style="margin-bottom: 40px; font-size: 2.5rem;">Why Heaven Marriage?</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
        <div class="card text-center" style="border-top: 4px solid var(--primary);">
            <div style="font-size: 40px; color: var(--primary); margin-bottom: 15px;">
                <i class="fas fa-users-cog"></i>
            </div>
            <h3>Personalized Matches</h3>
            <p>Our intelligent system helps you find matches that truly fit your preferences.</p>
        </div>
        <div class="card text-center" style="border-top: 4px solid var(--secondary);">
            <div style="font-size: 40px; color: var(--secondary); margin-bottom: 15px;">
                <i class="fas fa-lock"></i>
            </div>
            <h3>100% Secure</h3>
            <p>Your photos are blurred for non-premium members. Maximum privacy guaranteed.</p>
        </div>
        <div class="card text-center" style="border-top: 4px solid var(--primary);">
            <div style="font-size: 40px; color: var(--primary); margin-bottom: 15px;">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3>Verified Profiles</h3>
            <p>We work hard to eliminate fake profiles so you can search with confidence.</p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>