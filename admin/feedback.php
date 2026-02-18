<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../includes/db.php';

requireAdminLogin();

$db = getDB();

$filterType = $_GET['type'] ?? '';
$filterSystem = $_GET['system'] ?? '';

$query = "SELECT * FROM feedback WHERE 1=1";
$params = [];

if (!empty($filterType)) {
    $query .= " AND feedback_type = :type";
    $params[':type'] = $filterType;
}

if (!empty($filterSystem)) {
    $query .= " AND `system` = :system";
    $params[':system'] = $filterSystem;
}

$query .= " ORDER BY created_at DESC";

$stmt = $db->prepare($query);
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}
$stmt->execute();
$feedback = $stmt->fetchAll();

// Get unique types and systems for filters
$types = $db->query("SELECT DISTINCT feedback_type FROM feedback ORDER BY feedback_type")->fetchAll(PDO::FETCH_COLUMN);
$systems = $db->query("SELECT DISTINCT `system` FROM feedback WHERE `system` IS NOT NULL ORDER BY `system`")->fetchAll(PDO::FETCH_COLUMN);

$pageTitle = 'View Feedback';
include __DIR__ . '/../includes/header.php';
?>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-5xl px-4">
        <div class="mb-8 flex items-center justify-between">
            <h1 class="text-3xl font-bold text-slate-800">Feedback Submissions</h1>
            <a href="/admin/dashboard.php" class="text-sm text-slate-600 hover:text-slate-800">← Back to Dashboard</a>
        </div>

        <div class="mb-6 rounded-xl bg-white p-6 shadow-sm">
            <form method="GET" class="flex flex-col gap-4 md:flex-row">
                <div>
                    <label for="type" class="block text-sm font-medium text-slate-700 mb-1">Filter by Type</label>
                    <select id="type" name="type" class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Types</option>
                        <?php foreach ($types as $type): ?>
                            <option value="<?php echo htmlspecialchars($type); ?>" <?php echo $filterType === $type ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($type); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="system" class="block text-sm font-medium text-slate-700 mb-1">Filter by System</label>
                    <select id="system" name="system" class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Systems</option>
                        <?php foreach ($systems as $system): ?>
                            <option value="<?php echo htmlspecialchars($system); ?>" <?php echo $filterSystem === $system ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($system); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <div class="space-y-4">
            <?php if (empty($feedback)): ?>
                <div class="rounded-xl bg-white p-8 shadow-sm text-center">
                    <p class="text-slate-600">No feedback submissions found.</p>
                </div>
            <?php else: ?>
                <?php foreach ($feedback as $item): ?>
                    <div class="rounded-xl bg-white p-6 shadow-sm">
                        <div class="mb-4 flex items-start justify-between">
                            <div>
                                <span class="inline-block rounded-full bg-blue-100 px-3 py-1 text-sm text-blue-800 mb-2">
                                    <?php echo htmlspecialchars($item['feedback_type']); ?>
                                </span>
                                <?php if ($item['system']): ?>
                                    <span class="inline-block rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-700 ml-2">
                                        <?php echo htmlspecialchars($item['system']); ?>
                                    </span>
                                <?php endif; ?>
                                <p class="text-sm text-slate-500 mt-2">
                                    <?php echo date('M j, Y g:i A', strtotime($item['created_at'])); ?>
                                    <?php if ($item['is_anonymous']): ?>
                                        <span class="ml-2 text-xs">(Anonymous)</span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <p class="text-slate-800 mb-4"><?php echo nl2br(htmlspecialchars($item['feedback_text'])); ?></p>
                        <?php if ($item['url']): ?>
                            <p class="text-sm text-slate-600">
                                <strong>URL:</strong> <a href="<?php echo htmlspecialchars($item['url']); ?>" target="_blank" class="text-blue-600 hover:text-blue-800">
                                    <?php echo htmlspecialchars($item['url']); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer-close.php'; ?>
