<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../includes/db.php';

requireAdminLogin();

$db = getDB();

// Handle category management
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $name = $_POST['name'] ?? '';
        if (!empty($name)) {
            try {
                $stmt = $db->prepare("INSERT INTO categories (name) VALUES (:name)");
                $stmt->execute([':name' => $name]);
            } catch (PDOException $e) {
                // Category might already exist
            }
        }
    } elseif ($action === 'delete') {
        $id = $_POST['id'] ?? '';
        if (!empty($id)) {
            $stmt = $db->prepare("DELETE FROM categories WHERE id = :id");
            $stmt->execute([':id' => $id]);
        }
    }
}

// Get all categories
$categories = $db->query("SELECT c.*, COUNT(s.id) as system_count FROM categories c LEFT JOIN systems s ON c.name = s.category GROUP BY c.id ORDER BY c.name")->fetchAll();

$pageTitle = 'Manage Categories';
include __DIR__ . '/../includes/header.php';
?>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-5xl px-4">
        <div class="mb-8 flex items-center justify-between">
            <h1 class="text-3xl font-bold text-slate-800">Manage Categories</h1>
            <a href="/admin/dashboard.php" class="text-sm text-slate-600 hover:text-slate-800">← Back to Dashboard</a>
        </div>

        <div class="mb-8 rounded-xl bg-white p-6 shadow-sm">
            <h2 class="mb-4 text-xl font-semibold text-slate-800">Add New Category</h2>
            <form method="POST" class="flex gap-4">
                <input type="hidden" name="action" value="add">
                <input type="text" name="name" required placeholder="Category name"
                       class="flex-1 rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                    Add Category
                </button>
            </form>
        </div>

        <div class="rounded-xl bg-white shadow-sm overflow-hidden">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Systems</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"><?php echo htmlspecialchars($category['name']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500"><?php echo $category['system_count']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <?php if ($category['system_count'] == 0): ?>
                                    <form method="POST" class="inline">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                <?php else: ?>
                                    <span class="text-slate-400">Cannot delete (in use)</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer-close.php'; ?>
