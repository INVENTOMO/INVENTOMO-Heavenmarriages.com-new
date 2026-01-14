<?php
require_once 'includes/db.php'; // Needed for footer/settings
require_once 'includes/functions.php';

$pageTitle = "About Us";
$currentPage = "about";
include 'includes/header.php';
?>

<div class="hero-section" style="height: 350px;">
    <h1 class="hero-title">About Heaven Marriage</h1>
    <p class="hero-subtitle">Connecting Hearts, Creating Families since 2010</p>
</div>

<div class="container search-box-container" style="margin-top: -80px; text-align: center;">
    <h2>Who We Are</h2>
    <p style="max-width: 800px; margin: 0 auto; color: #666; font-size: 1.1rem;">
        Heaven Marriage is Pakistan’s most trusted matrimonial service. We believe that marriages are made in heaven,
        but finding the right partner requires a little help here on earth. Our platform provides a safe, secure, and
        respectful environment for families to find suitable matches for their loved ones.
    </p>
</div>

<?php include 'includes/stats_strip.php'; ?>

<div class="container">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 80px;">
        <div class="card text-center" style="border-bottom: 4px solid var(--primary);">
            <i class="fas fa-shield-alt" style="font-size: 50px; color: var(--primary); margin-bottom: 20px;"></i>
            <h3>100% Verified Profiles</h3>
            <p>We manually screen every profile to ensure safety and authenticity. No fake accounts allowed.</p>
        </div>
        <div class="card text-center" style="border-bottom: 4px solid var(--secondary);">
            <i class="fas fa-user-secret" style="font-size: 50px; color: var(--secondary); margin-bottom: 20px;"></i>
            <h3>Privacy Control</h3>
            <p>Your photos and contact details are secure. Only premium members can see your clear photos.</p>
        </div>
        <div class="card text-center" style="border-bottom: 4px solid var(--primary);">
            <i class="fas fa-users" style="font-size: 50px; color: var(--primary); margin-bottom: 20px;"></i>
            <h3>Broad Community</h3>
            <p>Thousands of potential brides and grooms from all cities of Pakistan and abroad.</p>
        </div>
    </div>

    <div class="card mb-10" style="display: flex; flex-wrap: wrap; gap: 40px; align-items: center; background: #fffafb; border: none;">
        <div style="flex: 1; min-width: 300px;">
            <img src="assets/images/banner.jpg" style="width: 100%; border-radius: 12px; height: 300px; object-fit: cover; box-shadow: 0 10px 30px rgba(0,0,0,0.1);" alt="Our Mission">
        </div>
        <div style="flex: 1; min-width: 300px;">
            <h2 style="color: var(--primary); font-size: 2rem;">Our Mission</h2>
            <p style="font-size: 1.1rem; color: #555; line-height: 1.8;">
                Our mission is simple: to bring happiness to every family by helping them find the perfect match. We understand that in our culture, marriage is not just a union of two individuals but two families.
            </p>
            <p style="font-size: 1.1rem; color: #555; line-height: 1.8;">
                We utilize technology to make the search easier, but we keep our values traditional. We provide personalized support and a platform that respects your privacy and dignity.
            </p>
            <a href="register.php" class="nav-btn nav-btn-fill mt-20" style="display: inline-block;">Join Our Family</a>
        </div>
    </div>
    
    <div style="margin: 80px 0;">
        <h2 class="text-center" style="font-size: 2.5rem; margin-bottom: 50px;">Our Seamless Process</h2>
        
        <div style="position: relative; max-width: 900px; margin: 0 auto;">
            <!-- Connecting Line -->
            <div style="position: absolute; left: 50%; top: 0; bottom: 0; width: 4px; background: #eee; transform: translateX(-50%); z-index: 0;"></div>

            <!-- Step 1 -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 50px; position: relative; z-index: 1;">
                <div style="width: 45%; text-align: right;">
                    <h3 style="color: var(--primary); font-size: 1.5rem;">1. Register Free</h3>
                    <p>Create your profile in minutes. It's easy, fast, and completely free to get started.</p>
                </div>
                <div style="width: 60px; height: 60px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem; border: 4px solid white; box-shadow: 0 0 0 4px #eee;">1</div>
                <div style="width: 45%;"></div>
            </div>

            <!-- Step 2 -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 50px; position: relative; z-index: 1;">
                <div style="width: 45%;"></div>
                <div style="width: 60px; height: 60px; background: var(--secondary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem; border: 4px solid white; box-shadow: 0 0 0 4px #eee;">2</div>
                <div style="width: 45%; text-align: left;">
                    <h3 style="color: var(--secondary); font-size: 1.5rem;">2. Find Matches</h3>
                    <p>Use our advanced search filters to find profiles that meet your exact criteria.</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 50px; position: relative; z-index: 1;">
                <div style="width: 45%; text-align: right;">
                    <h3 style="color: green; font-size: 1.5rem;">3. Connect & Marry</h3>
                    <p>Upgrade to premium to contact families directly and finalize your rishta.</p>
                </div>
                <div style="width: 60px; height: 60px; background: green; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem; border: 4px solid white; box-shadow: 0 0 0 4px #eee;">3</div>
                <div style="width: 45%;"></div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>