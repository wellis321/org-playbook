<?php
// Data Schema tab content
?>

<div>
    <h2 class="mb-4 text-2xl font-semibold text-slate-800">Data Schema</h2>
    <p class="mb-6 text-slate-600">
        The following schema represents the core data entities and their relationships within the <?php echo htmlspecialchars($system['name']); ?> system.
    </p>

    <div class="mb-6 rounded-lg bg-slate-50 p-6">
        <h3 class="mb-4 text-lg font-medium text-slate-800">Core Entities</h3>

        <?php foreach ($system['keyEntities'] as $entity): ?>
            <div class="mb-6 rounded border border-slate-200 bg-white p-4 shadow-sm">
                <h4 class="mb-2 font-medium text-slate-800"><?php echo htmlspecialchars($entity); ?></h4>
                <p class="mb-3 text-sm text-slate-600">
                    This entity represents a core data structure in the <?php echo htmlspecialchars($system['name']); ?> system.
                </p>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-4 py-2 text-left font-medium text-slate-700">Field</th>
                                <th class="px-4 py-2 text-left font-medium text-slate-700">Type</th>
                                <th class="px-4 py-2 text-left font-medium text-slate-700">Description</th>
                                <th class="px-4 py-2 text-left font-medium text-slate-700">Constraints</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            <tr>
                                <td class="px-4 py-2 font-medium text-slate-800">id</td>
                                <td class="px-4 py-2 text-slate-600">UUID</td>
                                <td class="px-4 py-2 text-slate-600">Unique identifier</td>
                                <td class="px-4 py-2 text-slate-600">Primary key, required</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 font-medium text-slate-800">name</td>
                                <td class="px-4 py-2 text-slate-600">String</td>
                                <td class="px-4 py-2 text-slate-600">Name or title</td>
                                <td class="px-4 py-2 text-slate-600">Required, max 100 chars</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 font-medium text-slate-800">created_at</td>
                                <td class="px-4 py-2 text-slate-600">DateTime</td>
                                <td class="px-4 py-2 text-slate-600">Creation timestamp</td>
                                <td class="px-4 py-2 text-slate-600">Required, auto-generated</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="rounded-lg bg-slate-50 p-6">
        <h3 class="mb-4 text-lg font-medium text-slate-800">Entity Relationships</h3>
        <p class="text-slate-600">
            This diagram shows how the core entities relate to each other within the <?php echo htmlspecialchars($system['name']); ?> system and how they connect to other systems through the Organisation Information Pool.
        </p>
        <div class="mt-4 rounded border border-slate-200 bg-white p-4 text-center">
            <p class="text-slate-500">Entity relationship diagram will be added here</p>
        </div>
    </div>
</div>
