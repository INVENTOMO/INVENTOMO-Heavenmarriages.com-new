<?php
$pageTitle = "Membership Plans";
$currentPage = "plans";
require_once 'includes/db.php';
require_once 'includes/functions.php';
include 'includes/header.php';
?>

<div class="hero-section"
        style="height: 300px; background-image: url('assets/images/banner.jpg'); background-position: center; position: relative; display: flex; align-items: center; justify-content: center;">
        <div style="background: rgba(0,0,0,0.6); padding: 20px 40px; border-radius: 8px; text-align: center;">
                <h1 class="hero-title"
                        style="color: white; margin-bottom: 10px; font-weight: 800; text-transform: uppercase;">Choose
                        Your Plan</h1>
                <p class="hero-subtitle" style="color: #eee; font-size: 1.1rem;">Find your perfect match with our
                        premium services</p>
        </div>
</div>

<div class="container mt-20">
        <div style="display: flex; gap: 30px; justify-content: center; flex-wrap: wrap; margin-bottom: 50px;">

                <!-- Free Plan -->
                <div class="card" style="flex: 1; min-width: 300px; text-align: center; border-top: 5px solid #ccc;">
                        <h2 style="color: #666;">Free Member</h2>
                        <div style="font-size: 40px; font-weight: 800; color: #333; margin: 20px 0;">pkr 0</div>
                        <p style="color: #888; font-style: italic;">Forever</p>

                        <ul style="list-style: none; padding: 0; margin: 30px 0; text-align: left;">
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><i class="fas fa-check"
                                                style="color: green; margin-right: 10px;"></i> Create Profile</li>
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><i class="fas fa-check"
                                                style="color: green; margin-right: 10px;"></i> Upload Photos</li>
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><i class="fas fa-check"
                                                style="color: green; margin-right: 10px;"></i> Search Profiles</li>
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee; color: #ccc;"><i
                                                class="fas fa-times" style="margin-right: 10px;"></i> View Clear Photos
                                </li>
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee; color: #ccc;"><i
                                                class="fas fa-times" style="margin-right: 10px;"></i> Contact Details
                                </li>
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee; color: #ccc;"><i
                                                class="fas fa-times" style="margin-right: 10px;"></i> Admin Support</li>
                        </ul>

                        <a href="register.php" class="nav-btn nav-btn-outline" style="display: block; width: 100%;">Get
                                Started</a>
                </div>

                <!-- Premium Plan -->
                <div class="card"
                        style="flex: 1; min-width: 300px; text-align: center; border-top: 5px solid var(--primary); transform: scale(1.05); box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <div
                                style="background: var(--primary); color: white; display: inline-block; padding: 5px 15px; border-radius: 20px; font-size: 0.8rem; margin-bottom: 10px;">
                                RECOMMENDED</div>
                        <h2 style="color: var(--primary);">Premium Member</h2>
                        <div style="font-size: 40px; font-weight: 800; color: var(--primary); margin: 20px 0;">pkr 500
                        </div>
                        <p style="color: #888; font-style: italic;">One Time Payment</p>

                        <ul style="list-style: none; padding: 0; margin: 30px 0; text-align: left;">
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><i class="fas fa-check"
                                                style="color: green; margin-right: 10px;"></i> Create Profile</li>
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><i class="fas fa-check"
                                                style="color: green; margin-right: 10px;"></i> Upload Photos</li>
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><i class="fas fa-check"
                                                style="color: green; margin-right: 10px;"></i> Search Profiles</li>
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><i class="fas fa-check"
                                                style="color: green; margin-right: 10px;"></i> <strong>View Clear
                                                Photos</strong></li>
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><i class="fas fa-check"
                                                style="color: green; margin-right: 10px;"></i> <strong>Direct Contact
                                                (via Admin)</strong></li>
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><i class="fas fa-check"
                                                style="color: green; margin-right: 10px;"></i> Priority Support</li>
                        </ul>

                        <a href="checkout.php" class="nav-btn nav-btn-fill" style="display: block; width: 100%;">Upgrade
                                Now</a>
                </div>
        </div>

        <div style="margin: 80px 0;">
                <h2 class="text-center" style="margin-bottom: 40px; font-size: 2rem;">Why Go Premium?</h2>
                <div style="display: flex; gap: 40px; flex-wrap: wrap; justify-content: center;">

                        <!-- Locked View Example -->
                        <div style="flex: 1; min-width: 300px; opacity: 0.8;">
                                <h3 class="text-center" style="color: #666; margin-bottom: 20px;">Free User View</h3>
                                <div class="profile-card">
                                        <div style="padding: 15px 20px; border-bottom: 1px solid #f0f0f0;">
                                                <h3 style="margin: 0; color: var(--primary); font-size: 1.4rem;">Rehan
                                                        Ahmed</h3>
                                        </div>
                                        <div style="padding: 20px;">
                                                <div class="profile-img-container"
                                                        style="height: 150px; width: 150px; border-radius: 50%; margin: 0 auto 10px; border: 3px solid #eee; position: relative; overflow: hidden;">
                                                        <img src="assets/images/male_default.png"
                                                                style="width: 100%; height: 100%; border-radius: 50%; filter: blur(5px);">
                                                        <div class="locked-overlay"
                                                                style="border-radius: 50%; position: absolute; top:0; left:0; width:100%; height:100%; display:flex; align-items:center; justify-content:center; background: rgba(255,255,255,0.3);">
                                                                <i class="fas fa-lock"
                                                                        style="font-size: 24px; color: #333;"></i>
                                                        </div>
                                                </div>
                                                <div class="info-grid">
                                                        <div class="info-item"><span class="info-label"><i
                                                                                class="fas fa-birthday-cake"></i>
                                                                        Age</span><span class="info-value">28
                                                                        Years</span></div>
                                                        <div class="info-item"><span class="info-label"><i
                                                                                class="fas fa-ruler-vertical"></i>
                                                                        Height</span><span
                                                                        class="info-value">5.10</span></div>
                                                        <div class="info-item"><span class="info-label"><i
                                                                                class="fas fa-mosque"></i>
                                                                        Religion</span><span class="info-value">-</span>
                                                        </div>
                                                        <div class="info-item"><span class="info-label"><i
                                                                                class="fas fa-globe"></i>
                                                                        Country</span><span
                                                                        class="info-value">Pakistan</span></div>
                                                </div>
                                                <a href="#" class="btn-card-footer"
                                                        style="background: #ccc; pointer-events: none;">View Profile
                                                        (Locked)</a>
                                        </div>
                                </div>
                        </div>

                        <!-- Unlocked View Example -->
                        <div style="flex: 1; min-width: 300px;">
                                <h3 class="text-center" style="color: var(--primary); margin-bottom: 20px;">Premium User
                                        View</h3>
                                <div class="profile-card"
                                        style="box-shadow: 0 10px 40px rgba(186, 45, 11, 0.15); border: 1px solid #BA2D0B;">
                                        <div
                                                style="padding: 15px 20px; border-bottom: 1px solid #ffebea; background: #fff5f5;">
                                                <h3 style="margin: 0; color: var(--primary); font-size: 1.4rem;">Zara
                                                        Sheikh</h3>
                                        </div>
                                        <div style="padding: 20px;">
                                                <div class="profile-img-container"
                                                        style="height: 150px; width: 150px; border-radius: 50%; margin: 0 auto 10px; border: 3px solid #BA2D0B; overflow: hidden;">
                                                        <img src="assets/images/female_default.png"
                                                                style="width: 100%; height: 100%; border-radius: 50%;">
                                                </div>
                                                <div class="info-grid">
                                                        <div class="info-item"><span class="info-label"><i
                                                                                class="fas fa-birthday-cake"></i>
                                                                        Age</span><span class="info-value">26
                                                                        Years</span></div>
                                                        <div class="info-item"><span class="info-label"><i
                                                                                class="fas fa-ruler-vertical"></i>
                                                                        Height</span><span class="info-value">5.6</span>
                                                        </div>
                                                        <div class="info-item"><span class="info-label"><i
                                                                                class="fas fa-mosque"></i>
                                                                        Religion</span><span
                                                                        class="info-value">Islam</span></div>
                                                        <div class="info-item"><span class="info-label"><i
                                                                                class="fas fa-globe"></i>
                                                                        Country</span><span
                                                                        class="info-value">Pakistan</span></div>
                                                </div>
                                                <a href="#" class="btn-card-footer">View Full Profile</a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

        <div class="card p-20 text-center mb-10">
                <h3><i class="fas fa-headset" style="color: var(--secondary);"></i> Need Help Choosing?</h3>
                <p>Contact our support team on WhatsApp for guidance.</p>
                <a href="contact.php" style="font-weight: bold;">Contact Us &rarr;</a>
        </div>
</div>

<?php include 'includes/footer.php'; ?>