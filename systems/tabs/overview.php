<?php
// Overview tab content
?>

<div>
    <h2 class="mb-4 text-2xl font-semibold text-slate-800">System Overview</h2>

    <div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-2">
        <div>
            <h3 class="mb-2 font-medium text-slate-800">Primary Users</h3>
            <ul class="list-inside list-disc space-y-1 text-slate-600">
                <?php foreach ($system['primaryUsers'] as $user): ?>
                    <li><?php echo htmlspecialchars($user); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div>
            <h3 class="mb-2 font-medium text-slate-800">Key Information Entities</h3>
            <ul class="list-inside list-disc space-y-1 text-slate-600">
                <?php foreach ($system['keyEntities'] as $entity): ?>
                    <li><?php echo htmlspecialchars($entity); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="mb-6">
        <h3 class="mb-2 font-medium text-slate-800">Integration Points</h3>
        <div class="flex flex-wrap gap-2">
            <?php foreach ($system['integrationPoints'] as $integration): ?>
                <span class="rounded-full bg-blue-100 px-3 py-1 text-sm text-blue-800">
                    <?php echo htmlspecialchars($integration); ?>
                </span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="border-t border-slate-200 pt-6">
        <h3 class="mb-2 font-medium text-slate-800">Development Status</h3>
        <span class="inline-block rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-700">Idea</span>
        <p class="mt-2 text-slate-600">
            This system is currently in the conceptual stage and will be developed according to the Organisation Playbook roadmap.
        </p>
    </div>
</div>
