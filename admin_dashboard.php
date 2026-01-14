<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (!isLoggedIn() || !isAdmin()) {
    redirect('index.php');
}

// Analytics Logic
// 1. User Stats
$total_users = $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'user'")->fetchColumn();
$premium_users = $pdo->query("SELECT COUNT(*) FROM users WHERE is_premium = 1 AND role = 'user'")->fetchColumn();
$recent_registrations = $pdo->query("SELECT COUNT(*) FROM users WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND role = 'user'")->fetchColumn();
$revenue = $premium_users * 500; // Estimated Revenue

// 2. Gender Distribution
$male_count = $pdo->query("SELECT COUNT(*) FROM profiles WHERE gender = 'Male'")->fetchColumn();
$female_count = $pdo->query("SELECT COUNT(*) FROM profiles WHERE gender = 'Female'")->fetchColumn();

// 3. User List for Management (With Pagination)
$limit = 20;
$total_users_count = $total_users; // Already fetched above
$total_pages = ceil($total_users_count / $limit);
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
if ($page < 1)
    $page = 1;
if ($page > $total_pages && $total_pages > 0)
    $page = $total_pages;
$offset = ($page - 1) * $limit;

$stmt = $pdo->prepare("SELECT u.id, u.name, u.email, u.is_premium, u.is_fake, u.created_at, u.status, p.phone
                     FROM users u 
                     LEFT JOIN profiles p ON u.id = p.user_id
                     WHERE u.role = 'user' 
                     ORDER BY u.created_at DESC LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$users_list = $stmt->fetchAll();

// Handle User Actions (Delete & Toggle Premium)
if (isset($_GET['delete_id'])) {
    $del_id = (int) $_GET['delete_id'];
    if ($del_id != $_SESSION['user_id']) {
        // Safety: Don't delete other admins
        $check = $pdo->prepare("SELECT role FROM users WHERE id = ?");
        $check->execute([$del_id]);
        $target_user = $check->fetch();

        if ($target_user && $target_user['role'] !== 'admin') {
            $pdo->prepare("DELETE FROM users WHERE id = ?")->execute([$del_id]);
            $_SESSION['flash_msg'] = "User deleted successfully.";
            $_SESSION['flash_type'] = "danger";
        } else {
            $_SESSION['flash_msg'] = "Cannot delete an administrator.";
            $_SESSION['flash_type'] = "warning";
        }
        header("Location: admin_dashboard.php?page=$page");
        exit;
    }
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    $target_id = (int) $_GET['id'];
    $act = $_GET['action'];

    if ($act === 'make_premium') {
        $pdo->prepare("UPDATE users SET is_premium = 1 WHERE id = ?")->execute([$target_id]);
        $_SESSION['flash_msg'] = "User upgraded to Premium!";
        $_SESSION['flash_type'] = "success";
    } elseif ($act === 'revoke_premium') {
        $pdo->prepare("UPDATE users SET is_premium = 0 WHERE id = ?")->execute([$target_id]);
        $_SESSION['flash_msg'] = "User downgraded to Free.";
        $_SESSION['flash_type'] = "warning";
    } elseif ($act === 'ban_user') {
        $pdo->prepare("UPDATE users SET status = 'banned' WHERE id = ?")->execute([$target_id]);
        $_SESSION['flash_msg'] = "User has been BANNED.";
        $_SESSION['flash_type'] = "danger";
    } elseif ($act === 'activate_user') {
        $pdo->prepare("UPDATE users SET status = 'active' WHERE id = ?")->execute([$target_id]);
        $_SESSION['flash_msg'] = "User has been Activated.";
        $_SESSION['flash_type'] = "success";
    } elseif ($act === 'toggle_fake') {
        // Toggle 0 to 1 and 1 to 0. Handle potential NULLs by defaulting to 0.
        $pdo->prepare("UPDATE users SET is_fake = CASE WHEN is_fake = 1 THEN 0 ELSE 1 END WHERE id = ?")->execute([$target_id]);
        $_SESSION['flash_msg'] = "User status updated.";
        $_SESSION['flash_type'] = "info";
    }
    header("Location: admin_dashboard.php?page=$page");
    exit;
}

$pageTitle = "Admin Dashboard";
include 'includes/header.php';
?>

<style>
    /* Admin Specific Responsive Styles */
    .admin-stats-card {
        transition: transform 0.3s ease;
    }

    .admin-stats-card:hover {
        transform: translateY(-5px);
    }

    .action-btn {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        color: white;
        transition: 0.2s;
        border: none;
        cursor: pointer;
        font-size: 14px;
        margin: 2px;
    }

    .action-btn:hover {
        transform: scale(1.1);
        filter: brightness(1.1);
    }

    .btn-edit {
        background: #3498db;
    }

    .btn-fake {
        background: #e67e22;
    }

    .btn-fake.is-fake {
        background: #e74c3c;
        box-shadow: 0 0 8px rgba(231, 76, 60, 0.4);
    }

    .btn-premium {
        background: #95a5a6;
    }

    .btn-premium.is-premium {
        background: #f1c40f;
        color: #333;
    }

    .btn-ban {
        background: #2c3e50;
    }

    .btn-unban {
        background: #27ae60;
    }

    .btn-delete {
        background: #c0392b;
    }

    /* Responsive Table Table */
    @media screen and (max-width: 900px) {
        .responsive-table tr {
            display: block;
            margin-bottom: 20px;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 10px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
        }

        .responsive-table thead {
            display: none;
        }

        .responsive-table td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f9f9f9;
            padding: 12px 10px !important;
            text-align: right !important;
        }

        .responsive-table td::before {
            content: attr(data-label);
            font-weight: 700;
            text-align: left;
            color: #666;
            font-size: 0.85rem;
        }

        .responsive-table td:last-child {
            border-bottom: none;
            justify-content: center;
            gap: 5px;
        }
    }
</style>

<div class="container mt-20">
    <?php if (isset($_SESSION['flash_msg'])): ?>
        <div style="padding: 15px; margin-bottom: 20px; border-radius: 8px; font-weight: 500;
            <?php
            $ft = $_SESSION['flash_type'] ?? 'info';
            if ($ft == 'success')
                echo 'background: #d4edda; color: #155724; border: 1px solid #c3e6cb;';
            elseif ($ft == 'danger')
                echo 'background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;';
            elseif ($ft == 'warning')
                echo 'background: #fff3cd; color: #856404; border: 1px solid #ffeeba;';
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

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Admin Dashboard</h2>
        <a href="admin_messages.php" class="btn-search" style="width: auto; padding: 0 25px;">
            <i class="fas fa-envelope"></i> View Messages
        </a>
    </div>

    <!-- Key Metrics Cards -->
    <div
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px;">
        <div class="card text-center" style="border-left: 5px solid var(--primary);">
            <h3 style="color: #666; font-size: 1rem;">Total Users</h3>
            <div style="font-size: 2rem; font-weight: bold; color: #333;"><?php echo $total_users; ?></div>
        </div>
        <div class="card text-center" style="border-left: 5px solid #FFD700;">
            <h3 style="color: #666; font-size: 1rem;">Premium Users</h3>
            <div style="font-size: 2rem; font-weight: bold; color: #333;"><?php echo $premium_users; ?></div>
        </div>
        <div class="card text-center" style="border-left: 5px solid green;">
            <h3 style="color: #666; font-size: 1rem;">Revenue (Est.)</h3>
            <div style="font-size: 2rem; font-weight: bold; color: #333;">PKR <?php echo number_format($revenue); ?>
            </div>
        </div>
        <div class="card text-center" style="border-left: 5px solid blue;">
            <h3 style="color: #666; font-size: 1rem;">New (7 Days)</h3>
            <div style="font-size: 2rem; font-weight: bold; color: #333;"><?php echo $recent_registrations; ?></div>
        </div>
    </div>

    <!-- Charts Section -->
    <div style="display: flex; gap: 30px; flex-wrap: wrap; margin-bottom: 40px;">
        <div class="card" style="flex: 1; min-width: 300px;">
            <h3 class="mb-20 class text-center">Gender Distribution</h3>
            <div style="max-height: 300px; position: relative;">
                <canvas id="genderChart"></canvas>
            </div>
        </div>
        <div class="card" style="flex: 1; min-width: 300px;">
            <h3 class="mb-20 class text-center">Membership Status</h3>
            <div style="max-height: 300px; position: relative;">
                <canvas id="premiumChart"></canvas>
            </div>
        </div>
    </div>

    <!-- User Management Table -->
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 class="mb-0">User Management</h3>

            <!-- Pagination Controls -->
            <div>
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>" class="btn-search"
                        style="padding: 5px 15px; font-size: 0.9rem;">&laquo; Prev</a>
                <?php endif; ?>
                <span style="margin: 0 10px; font-weight: bold; color: #666;">Page <?php echo $page; ?> of
                    <?php echo $total_pages; ?></span>
                <?php if ($page < $total_pages): ?>
                    <a href="?page=<?php echo $page + 1; ?>" class="btn-search"
                        style="padding: 5px 15px; font-size: 0.9rem;">Next &raquo;</a>
                <?php endif; ?>
            </div>
        </div>
        <div style="overflow-x: auto;">
            <table class="responsive-table" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f8f9fa;">
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">User Info</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Contact Details</th>
                        <th style="padding: 12px; text-align: center; border-bottom: 2px solid #ddd;">Membership</th>
                        <th style="padding: 12px; text-align: center; border-bottom: 2px solid #ddd;">Account Status
                        </th>
                        <th style="padding: 12px; text-align: center; border-bottom: 2px solid #ddd;">Registered On
                        </th>
                        <th style="padding: 12px; text-align: center; border-bottom: 2px solid #ddd;">Actions Control
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users_list as $u): ?>
                        <tr>
                            <td data-label="User" style="padding: 12px; border-bottom: 1px solid #eee;">
                                <div style="font-weight: 700; color: var(--primary); font-size: 1rem;">
                                    <?php echo htmlspecialchars($u['name']); ?>
                                </div>
                                <div style="font-size: 0.75rem; color: #999;">#<?php echo $u['id']; ?></div>
                                <?php if ($u['is_fake']): ?>
                                    <span
                                        style="background: #dc3545; color: white; font-size: 0.6rem; padding: 2px 6px; border-radius: 4px; text-transform: uppercase; font-weight: 800; margin-top: 4px; display: inline-block;">Fake
                                        Profile</span>
                                <?php endif; ?>
                            </td>

                            <td data-label="Contact" style="padding: 12px; border-bottom: 1px solid #eee; color: #666;">
                                <div style="font-size: 0.9rem;"><i class="fas fa-envelope" style="width: 15px;"></i>
                                    <?php echo htmlspecialchars($u['email']); ?></div>
                                <div style="font-size: 0.9rem;"><i class="fas fa-phone" style="width: 15px;"></i>
                                    <?php echo htmlspecialchars($u['phone'] ?? 'N/A'); ?></div>
                            </td>

                            <td data-label="Membership"
                                style="padding: 12px; border-bottom: 1px solid #eee; text-align: center;">
                                <?php if ($u['is_premium']): ?>
                                    <span
                                        style="background: #FFD700; color: #333; padding: 3px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 700;">
                                        <i class="fas fa-crown"></i> Premium
                                    </span>
                                <?php else: ?>
                                    <span
                                        style="background: #eee; color: #666; padding: 3px 10px; border-radius: 20px; font-size: 0.75rem;">Free</span>
                                <?php endif; ?>
                            </td>

                            <td data-label="Account Status"
                                style="padding: 12px; border-bottom: 1px solid #eee; text-align: center;">
                                <?php if ($u['status'] === 'banned'): ?>
                                    <span
                                        style="background: #343a40; color: #fff; padding: 3px 10px; border-radius: 20px; font-size: 0.75rem;">Banned</span>
                                <?php elseif ($u['status'] === 'pending'): ?>
                                    <span
                                        style="background: #e67e22; color: #fff; padding: 3px 10px; border-radius: 20px; font-size: 0.75rem;">Pending
                                        Approval</span>
                                <?php else: ?>
                                    <span
                                        style="background: #27ae60; color: #fff; padding: 3px 10px; border-radius: 20px; font-size: 0.75rem;">Active
                                        Member</span>
                                <?php endif; ?>
                            </td>

                            <td data-label="Registered"
                                style="padding: 12px; border-bottom: 1px solid #eee; text-align: center; font-size: 0.9rem;">
                                <div><?php echo date('M d, Y', strtotime($u['created_at'])); ?></div>
                                <div style="font-size: 0.7rem; color: #999;">
                                    <?php echo date('h:i A', strtotime($u['created_at'])); ?>
                                </div>
                            </td>

                            <td data-label="Actions"
                                style="padding: 12px; border-bottom: 1px solid #eee; text-align: center;">
                                <div style="display: flex; gap: 5px; justify-content: center; flex-wrap: wrap;">
                                    <a href="edit_profile.php?id=<?php echo $u['id']; ?>" class="action-btn btn-edit"
                                        title="Edit Profile">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="admin_dashboard.php?action=toggle_fake&id=<?php echo $u['id']; ?>"
                                        class="action-btn btn-fake <?php echo $u['is_fake'] ? 'is-fake' : ''; ?>"
                                        title="<?php echo $u['is_fake'] ? 'Mark as Real' : 'Mark as Fake'; ?>">
                                        <i class="fas fa-user-secret"></i>
                                    </a>

                                    <?php if ($u['is_premium']): ?>
                                        <a href="admin_dashboard.php?action=revoke_premium&id=<?php echo $u['id']; ?>"
                                            class="action-btn btn-premium is-premium"
                                            onclick="return confirm('Downgrade to Free?');" title="Downgrade to Free">
                                            <i class="fas fa-crown"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="admin_dashboard.php?action=make_premium&id=<?php echo $u['id']; ?>"
                                            class="action-btn btn-premium" title="Upgrade to Premium">
                                            <i class="fas fa-crown"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($u['status'] === 'banned'): ?>
                                        <a href="admin_dashboard.php?action=activate_user&id=<?php echo $u['id']; ?>"
                                            class="action-btn btn-unban" onclick="return confirm('Unban this user?');"
                                            title="Unban User">
                                            <i class="fas fa-user-check"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="admin_dashboard.php?action=ban_user&id=<?php echo $u['id']; ?>"
                                            class="action-btn btn-ban" onclick="return confirm('BAN this user?');"
                                            title="Ban User">
                                            <i class="fas fa-user-slash"></i>
                                        </a>
                                    <?php endif; ?>

                                    <a href="admin_dashboard.php?delete_id=<?php echo $u['id']; ?>"
                                        class="action-btn btn-delete"
                                        onclick="return confirm('Permanently delete this user? This cannot be undone.');"
                                        title="Delete User">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Gender Chart
        const ctxGender = document.getElementById('genderChart').getContext('2d');
        new Chart(ctxGender, {
            type: 'doughnut',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    data: [<?php echo $male_count; ?>, <?php echo $female_count; ?>],
                    backgroundColor: ['#36A2EB', '#FF6384'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });

        // Premium Status Chart
        const ctxPrem = document.getElementById('premiumChart').getContext('2d');
        new Chart(ctxPrem, {
            type: 'pie',
            data: {
                labels: ['Free Users', 'Premium Users'],
                datasets: [{
                    data: [<?php echo ($total_users - $premium_users); ?>, <?php echo $premium_users; ?>],
                    backgroundColor: ['#e0e0e0', '#FFD700'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    });
</script>

<?php include 'includes/footer.php'; ?>