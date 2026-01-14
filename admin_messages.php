<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (!isLoggedIn() || !isAdmin()) {
    redirect('login.php');
}

// Handle Single Delete
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $pdo->prepare("DELETE FROM contact_messages WHERE id=?")->execute([$id]);
    $_SESSION['flash_msg'] = "Message deleted successfully.";
    $_SESSION['flash_type'] = "success";
    redirect('admin_messages.php');
}

// Handle Delete All
if (isset($_GET['action']) && $_GET['action'] == 'delete_all') {
    $pdo->query("DELETE FROM contact_messages");
    $_SESSION['flash_msg'] = "All messages have been deleted.";
    $_SESSION['flash_type'] = "success";
    redirect('admin_messages.php');
}

$pageTitle = "Admin Messages";
include 'includes/header.php';

$messages = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC")->fetchAll();
?>

<div class="container mt-20">
    <?php if (isset($_SESSION['flash_msg'])): ?>
        <div style="padding: 15px; margin-bottom: 20px; border-radius: 8px; font-weight: 500;
            <?php
            $ft = $_SESSION['flash_type'] ?? 'info';
            if ($ft == 'success')
                echo 'background: #d4edda; color: #155724; border: 1px solid #c3e6cb;';
            elseif ($ft == 'danger')
                echo 'background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;';
            else
                echo 'background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb;';
            ?>">
            <?php
            echo $_SESSION['flash_msg'];
            unset($_SESSION['flash_msg']);
            unset($_SESSION['flash_type']);
            ?>
        </div>
    <?php endif; ?>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2>Contact Messages</h2>
        <div>
            <?php if (!empty($messages)): ?>
                <a href="?action=delete_all" class="btn-search"
                    style="width: auto; padding: 0 20px; background: #c0392b; margin-right: 10px;"
                    onclick="return confirm('WARNING: Are you sure you want to delete ALL messages? This cannot be undone.');">
                    <i class="fas fa-trash-alt"></i> Delete All
                </a>
            <?php endif; ?>
            <a href="admin_dashboard.php" class="btn-search" style="width: auto; padding: 0 20px;">&larr; Back to
                Dashboard</a>
        </div>
    </div>

    <?php if (empty($messages)): ?>
        <div class="card text-center">
            <p style="color: #666;">No messages found.</p>
        </div>
    <?php else: ?>
        <div style="display: grid; gap: 20px;">
            <?php foreach ($messages as $msg): ?>
                <div class="card" style="border-left: 5px solid var(--primary); padding: 20px;">
                    <div
                        style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 10px;">
                        <div>
                            <h3 style="margin: 0 0 5px 0; color: var(--primary);">
                                <?php echo htmlspecialchars($msg['subject']); ?>
                            </h3>
                            <div style="color: #666; font-size: 0.95rem;">
                                From: <strong><?php echo htmlspecialchars($msg['name']); ?></strong>
                                &lt;<?php echo htmlspecialchars($msg['email']); ?>&gt;
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <div style="color: #999; font-size: 0.85rem; margin-bottom: 5px;">
                                <?php echo date('d M Y, h:i A', strtotime($msg['created_at'])); ?>
                            </div>
                            <a href="?delete=<?php echo $msg['id']; ?>" onclick="return confirm('Delete this message?');"
                                style="color: #dc3545; font-size: 0.9rem; text-decoration: none;">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                    <div
                        style="margin-top: 15px; background: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #eee; color: #333; line-height: 1.6;">
                        <?php echo nl2br(htmlspecialchars($msg['message'])); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>