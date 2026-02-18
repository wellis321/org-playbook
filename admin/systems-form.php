<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-5xl px-4">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800"><?php echo $action === 'create' ? 'Create' : 'Edit'; ?> System</h1>
            <a href="/admin/systems.php" class="text-sm text-slate-600 hover:text-slate-800">← Back to Systems</a>
        </div>

        <form method="POST" class="rounded-xl bg-white p-8 shadow-sm">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($system['id'] ?? ''); ?>">

            <div class="mb-4">
                <label for="id" class="block text-sm font-medium text-slate-700 mb-1">System ID</label>
                <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($system['id'] ?? ''); ?>"
                       required class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       <?php echo $action === 'edit' ? 'readonly' : ''; ?>>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($system['name'] ?? ''); ?>"
                       required class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="4" required
                          class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"><?php echo htmlspecialchars($system['description'] ?? ''); ?></textarea>
            </div>

            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-slate-700 mb-1">Category</label>
                <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($system['category'] ?? ''); ?>"
                       required class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="primary_users" class="block text-sm font-medium text-slate-700 mb-1">Primary Users (one per line)</label>
                <textarea id="primary_users" name="primary_users" rows="4"
                          class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"><?php echo htmlspecialchars(implode("\n", $primaryUsers ?? [])); ?></textarea>
            </div>

            <div class="mb-4">
                <label for="key_entities" class="block text-sm font-medium text-slate-700 mb-1">Key Entities (one per line)</label>
                <textarea id="key_entities" name="key_entities" rows="4"
                          class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"><?php echo htmlspecialchars(implode("\n", $keyEntities ?? [])); ?></textarea>
            </div>

            <div class="mb-4">
                <label for="integration_points" class="block text-sm font-medium text-slate-700 mb-1">Integration Points (one per line)</label>
                <textarea id="integration_points" name="integration_points" rows="4"
                          class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"><?php echo htmlspecialchars(implode("\n", $integrationPoints ?? [])); ?></textarea>
            </div>

            <div class="flex justify-end gap-4">
                <a href="/admin/systems.php" class="rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Cancel
                </a>
                <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                    <?php echo $action === 'create' ? 'Create' : 'Update'; ?> System
                </button>
            </div>
        </form>
    </div>
</div>
