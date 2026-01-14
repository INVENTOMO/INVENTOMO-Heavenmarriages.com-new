<?php
global $pdo;
// Default
$wa_number = '+92 308 4742715';
$clean_wa = '923084742715';

if (isset($pdo)) {
    try {
        $db_wa = getSetting($pdo, 'whatsapp_number');
        if ($db_wa) {
            $wa_number = $db_wa;
        }
    } catch (Exception $e) {
    }
}
// Ensure clean number for links
$clean_wa = str_replace(['+', ' ', '-'], '', $wa_number);
?>
<footer class="footer">
    <div class="container"
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; margin-bottom: 40px;">
        
        <!-- Column 1: About -->
        <div class="footer-col">
            <h3>Heaven Marriages</h3>
            <p>Pakistan's #1 Matrimonial Service. We are dedicated to helping you find your
                perfect life partner in a safe and secure environment.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <!-- Column 2: Quick Links -->
        <div class="footer-col">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="plans.php">Membership Plans</a></li>
                <li><a href="search.php">Browse Profiles</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <!-- Column 3: Contact Info -->
        <div class="footer-col">
            <h3>Contact Us</h3>
            <ul class="contact-info">
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Model Town Extension Lahore</span>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <a href="https://wa.me/<?php echo $clean_wa; ?>" target="_blank"><?php echo $wa_number; ?></a>
                </li>
                <li>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:ibraheemtahir0rs@gmail.com">ibraheemtahir0rs@gmail.com</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container" style="border-top: 1px solid #333; padding-top: 25px; text-align: center;">
        <p>&copy; <?php echo date('Y'); ?> Heaven Marriages. All Rights Reserved. Made by <a
                href="https://linktr.ee/inventomo" target="_blank"
                style="color: var(--primary); font-weight: bold; text-decoration: none;">INVENTOMO</a></p>
    </div>
</footer>

<!-- WhatsApp Float -->
<a href="https://wa.me/<?php echo $clean_wa; ?>" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>

<script src="assets/js/main.js"></script>
</body>

</html>