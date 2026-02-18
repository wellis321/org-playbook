<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../includes/db.php';

requireAdminLogin();

$db = getDB();

// Get statistics
$systemsCount = $db->query("SELECT COUNT(*) as count FROM systems")->fetch()['count'];
$categoriesCount = $db->query("SELECT COUNT(DISTINCT category) as count FROM systems")->fetch()['count'];
$feedbackCount = $db->query("SELECT COUNT(*) as count FROM feedback")->fetch()['count'];
$recentFeedback = $db->query("SELECT * FROM feedback ORDER BY created_at DESC LIMIT 5")->fetchAll();

$pageTitle = 'Admin Dashboard';
include __DIR__ . '/../includes/header.php';
?>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-5xl px-4">
        <div class="mb-8 flex items-center justify-between">
            <h1 class="text-3xl font-bold text-slate-800">Admin Dashboard</h1>
            <a href="/admin/logout.php" class="text-sm text-slate-600 hover:text-slate-800">Logout</a>
        </div>

        <div class="mb-8 grid grid-cols-1 gap-6 md:grid-cols-3">
            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-sm font-medium text-slate-600 mb-2">Total Systems</h3>
                <p class="text-3xl font-bold text-slate-800"><?php echo $systemsCount; ?></p>
                <a href="/admin/systems.php" class="mt-2 text-sm text-blue-600 hover:text-blue-800">Manage Systems →</a>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-sm font-medium text-slate-600 mb-2">Categories</h3>
                <p class="text-3xl font-bold text-slate-800"><?php echo $categoriesCount; ?></p>
                <a href="/admin/categories.php" class="mt-2 text-sm text-blue-600 hover:text-blue-800">Manage Categories →</a>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-sm font-medium text-slate-600 mb-2">Feedback Submissions</h3>
                <p class="text-3xl font-bold text-slate-800"><?php echo $feedbackCount; ?></p>
                <a href="/admin/feedback.php" class="mt-2 text-sm text-blue-600 hover:text-blue-800">View Feedback →</a>
            </div>
        </div>

        <div class="rounded-xl bg-white p-6 shadow-sm">
            <h2 class="mb-4 text-xl font-semibold text-slate-800">Recent Feedback</h2>
            <?php if (empty($recentFeedback)): ?>
                <p class="text-slate-600">No feedback submissions yet.</p>
            <?php else: ?>
                <div class="space-y-4">
                    <?php foreach ($recentFeedback as $feedback): ?>
                        <div class="border-l-4 border-blue-500 pl-4">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="font-medium text-slate-800"><?php echo htmlspecialchars($feedback['feedback_type']); ?></p>
                                    <p class="text-sm text-slate-600"><?php echo htmlspecialchars(substr($feedback['feedback_text'], 0, 100)); ?>...</p>
                                    <p class="text-xs text-slate-500 mt-1"><?php echo date('M j, Y g:i A', strtotime($feedback['created_at'])); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer-close.php'; ?>
