<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

$pageTitle = "Contact Us";
$currentPage = "contact";
include 'includes/header.php';

$wa_number = '+923084742715';
// Try fetching from DB if possible
try {
    $wa_number = getSetting($pdo, 'whatsapp_number') ?: $wa_number;
} catch (Exception $e) {
}
?>

<div class="hero-section" style="height: 300px; background-image: url('assets/images/banner.jpg'); position: relative;">
    <div style="background: rgba(0,0,0,0.6); padding: 20px 40px; border-radius: 8px; text-align: center;">
        <h1 class="hero-title"
            style="font-weight: 800; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px;">Contact Us
        </h1>
        <p class="hero-subtitle"
            style="font-weight: 700; background: var(--primary); display: inline-block; padding: 5px 15px; border-radius: 4px; color: white; margin: 0;">
            We are here to help you find your soulmate</p>
    </div>
</div>

<!-- Fast Support Banner -->
<div class="container search-box-container"
    style="margin-top: -60px; text-align: center; margin-bottom: 40px; padding: 40px;">
    <h2 style="color: var(--primary);">Quick & Friendly Support</h2>
    <p style="max-width: 600px; margin: 0 auto; color: #666; font-size: 1.1rem;">
        Our support team is known for lightning-fast responses. Whether you have a question about registration or need
        help finding a match, we are just one message away!
    </p>
</div>

<div class="container" style="margin-bottom: 80px;">
    <div style="display: flex; gap: 40px; flex-wrap: wrap;">

        <!-- Contact Info Column -->
        <div style="flex: 1; min-width: 300px;">
            <div class="card" style="height: 100%;">
                <h2 style="margin-bottom: 30px;">Get in Touch</h2>

                <div style="display: flex; gap: 20px; margin-bottom: 30px; align-items: start;">
                    <div
                        style="width: 60px; height: 60px; background: #e3fadc; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #25d366; font-size: 24px;">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div>
                        <h3 style="margin: 0 0 5px 0; font-size: 1.2rem;">WhatsApp Support</h3>
                        <p style="margin: 0; color: #666; font-size: 0.95rem;">Fastest response time (Recommended)</p>
                        <a href="https://wa.me/<?php echo str_replace('+', '', $wa_number); ?>" target="_blank"
                            style="color: var(--primary); font-weight: 900; font-size: 1.4rem; margin-top: 5px; display: inline-block; text-decoration: none;"><?php echo $wa_number; ?></a>
                    </div>
                </div>

                <div style="display: flex; gap: 20px; margin-bottom: 30px; align-items: start;">
                    <div
                        style="width: 60px; height: 60px; background: #e0f2fe; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--secondary); font-size: 24px;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h3 style="margin: 0 0 5px 0; font-size: 1.2rem;">Email Us</h3>
                        <p style="margin: 0; color: #666; font-size: 0.95rem;">For general inquiries and feedback</p>
                        <a href="mailto:ibraheemtahir0rs@gmail.com"
                            style="color: var(--primary); font-weight: 900; font-size: 1.4rem; margin-top: 5px; display: inline-block; text-decoration: none;">ibraheemtahir0rs@gmail.com</a>
                    </div>
                </div>

                <div style="display: flex; gap: 20px; align-items: start;">
                    <div
                        style="width: 60px; height: 60px; background: #ffebee; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary); font-size: 24px;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h3 style="margin: 0 0 5px 0; font-size: 1.2rem;">Visit Office</h3>
                        <p style="margin: 0; color: #666; font-size: 0.95rem;">Office #12, 3rd Floor, Business
                            Center,<br>Main Boulevard, Lahore, Pakistan</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Contact Form Column -->
        <div style="flex: 1; min-width: 300px;">
            <div class="card">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_message'])) {
                    $name = trim($_POST['name']);
                    $email = trim($_POST['email']);
                    $subject = trim($_POST['subject']);
                    $message = trim($_POST['message']);

                    if ($name && $email && $message) {
                        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
                        if ($stmt->execute([$name, $email, $subject, $message])) {
                            echo '<div id="success-popup" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 40px; border-radius: 12px; box-shadow: 0 10px 40px rgba(0,0,0,0.2); text-align: center; z-index: 1000; animation: fadeIn 0.5s;">
                                <div style="width: 80px; height: 80px; background: #2ecc71; border-radius: 50%; color: white; display: flex; align-items: center; justify-content: center; font-size: 40px; margin: 0 auto 20px;">
                                    <i class="fas fa-check"></i>
                                </div>
                                <h2 style="color: #333; margin-bottom: 10px;">Message Sent!</h2>
                                <p style="color: #666; margin-bottom: 20px;">Thank you for contacting us. We will get back to you shortly.</p>
                                <button onclick="document.getElementById(\'success-popup\').style.display=\'none\'; window.location.href=\'contact.php\'" class="nav-btn nav-btn-fill">Okay, Great!</button>
                            </div>
                            <div id="overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 999; animation: fadeIn 0.5s;"></div>';
                        }
                    }
                }
                ?>
                <h2 style="margin-bottom: 20px;">Send a Message</h2>
                <form method="POST" action="">
                    <div class="form-group mb-10">
                        <label>Your Name</label>
                        <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                    </div>
                    <div class="form-group mb-10">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
                    </div>
                    <div class="form-group mb-10">
                        <label>Subject</label>
                        <select name="subject" class="form-control">
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Registration Help">Registration Help</option>
                            <option value="Report a Profile">Report a Profile</option>
                            <option value="Success Story">Success Story</option>
                        </select>
                    </div>
                    <div class="form-group mb-10">
                        <label>Message</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="How can we help you?"
                            required></textarea>
                    </div>
                    <button type="submit" name="send_message" class="nav-btn nav-btn-fill"
                        style="width: 100%; border: none; cursor: pointer;">
                        Send Message <i class="fas fa-paper-plane" style="margin-left: 10px;"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>