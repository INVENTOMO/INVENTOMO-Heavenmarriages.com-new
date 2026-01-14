<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

$user_id = $_SESSION['user_id'];
$pageTitle = "Premium Upgrade Instructions";
include 'includes/header.php';

// Prepare dynamic WhatsApp Link
global $wa_number; // Assumed available from header/global scope
$clean_wa = str_replace(['+', ' '], '', $wa_number);
$msg = "Hello Admin, I want to upgrade to Premium. My User ID is: " . $user_id . ". I will send the payment screenshot shortly.";
$wa_link = "https://wa.me/" . $clean_wa . "?text=" . urlencode($msg);
?>

<div class="container mt-20" style="max-width: 900px;">
    <h2 class="text-center mb-20" style="color: var(--primary);">Premium Upgrade Process</h2>
    <p class="text-center mb-40" style="color: #666; max-width: 600px; margin: 0 auto 40px;">
        Follow these simple steps to activate your Premium Membership. We use a manual verification process to ensure
        security.
    </p>

    <!-- Visual Diagram / Steps -->
    <div
        style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; position: relative; margin-bottom: 50px;">

        <!-- Connecting Line (Desktop) -->
        <div class="step-connector"
            style="position: absolute; top: 40px; left: 0; width: 100%; height: 2px; background: #eee; z-index: -1; display: none;">
        </div>
        <style>
            @media(min-width: 768px) {
                .step-connector {
                    display: block;
                }
            }
        </style>

        <!-- Step 1 -->
        <div class="card text-center"
            style="flex: 1; min-width: 200px; border: 1px solid #eee; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            <div
                style="width: 80px; height: 80px; background: #e3f2fd; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: #2196f3; font-size: 30px;">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <h4 style="margin-bottom: 10px;">1. Valid Payment</h4>
            <p style="font-size: 0.9rem; color: #666;">Send <strong>PKR 500</strong> to our JazzCash or Admin Account.
            </p>
        </div>

        <!-- Step 2 -->
        <div class="card text-center"
            style="flex: 1; min-width: 200px; border: 1px solid #eee; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            <div
                style="width: 80px; height: 80px; background: #fff3e0; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: #ff9800; font-size: 30px;">
                <i class="fas fa-camera"></i>
            </div>
            <h4 style="margin-bottom: 10px;">2. Take Screenshot</h4>
            <p style="font-size: 0.9rem; color: #666;">Capture the successful transaction receipt/screenshot.</p>
        </div>

        <!-- Step 3 -->
        <div class="card text-center"
            style="flex: 1; min-width: 200px; border: 1px solid #eee; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            <div
                style="width: 80px; height: 80px; background: #e8f5e9; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: #4caf50; font-size: 30px;">
                <i class="fab fa-whatsapp"></i>
            </div>
            <h4 style="margin-bottom: 10px;">3. Send to Admin</h4>
            <p style="font-size: 0.9rem; color: #666;">Send the screenshot to Admin via WhatsApp for approval.</p>
        </div>

        <!-- Step 4 -->
        <div class="card text-center"
            style="flex: 1; min-width: 200px; border: 1px solid #eee; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            <div
                style="width: 80px; height: 80px; background: #fce4ec; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: #e91e63; font-size: 30px;">
                <i class="fas fa-user-check"></i>
            </div>
            <h4 style="margin-bottom: 10px;">4. Get Premium</h4>
            <p style="font-size: 0.9rem; color: #666;">Admin verifies and upgrades your account instantly.</p>
        </div>

    </div>

    <!-- Detailed Instructions & Action -->
    <div class="card" style="border-top: 5px solid var(--primary);">
        <h3 class="mb-20">Payment Details</h3>

        <div
            style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 30px; border: 1px dashed #ccc;">
            <div
                style="display: flex; justify-content: space-between; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 10px;">
                <span style="color: #666;">Payment Method:</span>
                <span style="font-weight: bold;">JazzCash / EasyPaisa</span>
            </div>
            <div
                style="display: flex; justify-content: space-between; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 10px;">
                <span style="color: #666;">Account Number:</span>
                <span style="font-weight: bold; font-size: 1.1rem;"><?php echo $wa_number; ?></span>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <span style="color: #666;">Amount:</span>
                <span style="font-weight: bold; color: var(--primary); font-size: 1.2rem;">PKR 500</span>
            </div>
        </div>

        <div class="text-center">
            <p class="mb-20">Ready to send the proof? Click below to open WhatsApp with Admin.</p>
            <a href="<?php echo $wa_link; ?>" target="_blank" class="btn-search"
                style="padding: 15px 40px; font-size: 1.2rem; background-color: #25d366; border-radius: 50px; display: inline-flex; align-items: center; gap: 10px; width: auto;">
                <i class="fab fa-whatsapp" style="font-size: 1.4rem;"></i> Send Payment Proof
            </a>
            <p style="margin-top: 15px; font-size: 0.9rem; color: #999;">
                Note: Verification usually takes 10-30 minutes during business hours.
            </p>
        </div>
    </div>

</div>

<?php include 'includes/footer.php'; ?>