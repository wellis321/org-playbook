<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-5xl px-4">
        <div class="mb-8 flex items-center justify-between">
            <h1 class="text-3xl font-bold text-slate-800">Manage Systems</h1>
            <a href="/admin/systems.php?action=create" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                Create New System
            </a>
        </div>

        <div class="rounded-xl bg-white shadow-sm overflow-hidden">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    <?php foreach ($systems as $system): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"><?php echo htmlspecialchars($system['id']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"><?php echo htmlspecialchars($system['name']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500"><?php echo htmlspecialchars($system['category']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="/admin/systems.php?action=edit&id=<?php echo urlencode($system['id']); ?>" class="text-blue-600 hover:text-blue-900 mr-4">Edit</a>
                                <a href="/admin/systems.php?action=delete&id=<?php echo urlencode($system['id']); ?>"
                                   onclick="return confirm('Are you sure you want to delete this system?')"
                                   class="text-red-600 hover:text-red-900">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
