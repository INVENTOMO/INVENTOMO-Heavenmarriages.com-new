<?php
// Fetch Global Settings
if (isset($pdo)) {
    $wa_number = getSetting($pdo, 'whatsapp_number') ?? '+923001234567'; // Default fallback
    $site_title = getSetting($pdo, 'site_title') ?? 'Heaven Marriages';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' : ''; ?><?php echo $site_title ?? 'Heaven Marriages'; ?>
    </title>

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Heaven Marriages is Pakistan's #1 trusted matrimonial service. Find your perfect life partner with verified profiles, secure matchmaking, and premium services. Join thousands of happy couples today!">
    <meta name="keywords"
        content="matrimonial, marriage, rishta, pakistan matrimony, muslim marriage, shadi, matchmaking, bride, groom, rishta pakistan">
    <meta name="author" content="Heaven Marriages">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://heavenmarriage.com/<?php echo basename($_SERVER['PHP_SELF']); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://heavenmarriage.com/">
    <meta property="og:title"
        content="<?php echo isset($pageTitle) ? $pageTitle . ' - ' : ''; ?><?php echo $site_title ?? 'Heaven Marriages'; ?>">
    <meta property="og:description"
        content="Find your perfect soulmate on Heaven Marriages. Safe, secure, and trusted by millions of Pakistanis.">
    <meta property="og:image" content="https://heavenmarriage.com/assets/images/banner.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://heavenmarriage.com/">
    <meta property="twitter:title"
        content="<?php echo isset($pageTitle) ? $pageTitle . ' - ' : ''; ?><?php echo $site_title ?? 'Heaven Marriages'; ?>">
    <meta property="twitter:description"
        content="Find your perfect soulmate on Heaven Marriages. Safe, secure, and trusted by millions of Pakistanis.">
    <meta property="twitter:image" content="https://heavenmarriage.com/assets/images/banner.jpg">

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Heaven Marriages",
      "url": "https://heavenmarriage.com",
      "logo": "https://heavenmarriage.com/assets/images/logo.png",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "<?php echo $wa_number ?? '+923084742715'; ?>",
        "contactType": "customer service",
        "areaServed": "PK",
        "availableLanguage": ["en", "ur"]
      },
      "sameAs": [
        "https://www.facebook.com/heavenmarriage",
        "https://www.instagram.com/heavenmarriage"
      ]
    }
    </script>
    <?php
    // Dynamic Schema based on Page
    $current_page_schema = basename($_SERVER['PHP_SELF']);
    if ($current_page_schema == 'index.php') {
        echo '<script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "WebSite",
          "url": "https://heavenmarriage.com",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "https://heavenmarriage.com/search.php?q={search_term_string}",
            "query-input": "required name=search_term_string"
          }
        }
        </script>';
    } elseif ($current_page_schema == 'about.php') {
        echo '<script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "AboutPage",
          "mainEntity": {
            "@type": "Organization",
            "name": "Heaven Marriages",
            "description": "Pakistans #1 trusted matrimonial service providing secure matchmaking."
          }
        }
        </script>';
    } elseif ($current_page_schema == 'contact.php') {
        echo '<script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "ContactPage",
          "description": "Contact Heaven Marriages for support and inquiries.",
          "mainEntity": {
             "@type": "Organization",
             "name": "Heaven Marriages",
             "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "' . ($wa_number ?? '+923001234567') . '",
                "contactType": "customer support"
             }
          }
        }
        </script>';
    } elseif ($current_page_schema == 'plans.php') {
        echo '<script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Product",
          "name": "Premium Matrimony Plans",
          "description": "Upgrade to premium to unlock exclusive features on Heaven Marriages.",
          "brand": {
            "@type": "Brand",
            "name": "Heaven Marriages"
          },
          "offers": {
            "@type": "Offer",
            "price": "500",
            "priceCurrency": "PKR",
            "availability": "https://schema.org/InStock"
          }
        }
        </script>';
    } elseif ($current_page_schema == 'register.php') {
        echo '<script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "RegisterAction",
          "target": "https://heavenmarriage.com/register.php",
          "name": "Create Account"
        }
        </script>';
    } elseif ($current_page_schema == 'login.php') {
        echo '<script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "LoginAction",
          "target": "https://heavenmarriage.com/login.php",
          "name": "Log In"
        }
        </script>';
    }
    ?>

    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Google Fonts: Outfit -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="navbar-brand">Heaven Marriages</a>

            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>

            <ul class="nav-links" id="navLinks">
                <li><a href="index.php" class="<?php echo ($currentPage ?? '') == 'home' ? 'active' : ''; ?>">Home</a>
                </li>
                <li><a href="about.php" class="<?php echo ($currentPage ?? '') == 'about' ? 'active' : ''; ?>">About
                        Us</a></li>
                <li><a href="plans.php"
                        class="<?php echo ($currentPage ?? '') == 'plans' ? 'active' : ''; ?>">Membership Plans</a></li>
                <li><a href="search.php" class="<?php echo ($currentPage ?? '') == 'search' ? 'active' : ''; ?>">Search
                        Profile</a></li>
                <li><a href="contact.php"
                        class="<?php echo ($currentPage ?? '') == 'contact' ? 'active' : ''; ?>">Contact</a></li>
                <?php if (isLoggedIn()): ?>
                    <?php if (isAdmin()): ?>
                        <li><a href="admin_dashboard.php" class="nav-admin">Admin Panel</a></li>
                    <?php endif; ?>
                    <li><a href="profile.php">My Profile</a></li>
                    <li><a href="edit_profile.php">Edit Profile</a></li>
                    <li><a href="logout.php" class="nav-btn nav-btn-outline">Logout</a></li>
                <?php else: ?>
                    <li><a href="register.php" class="nav-btn nav-btn-outline">Register</a></li>
                    <li><a href="login.php" class="nav-btn nav-btn-fill">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>