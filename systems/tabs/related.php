<?php
// Related Systems tab content
?>

<div>
    <h2 class="mb-4 text-2xl font-semibold text-slate-800">Related Systems</h2>
    <p class="mb-6 text-slate-600">
        The <?php echo htmlspecialchars($system['name']); ?> system integrates with the following systems within the Organisation Information Pool architecture.
    </p>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <?php foreach ($relatedSystems as $integration): ?>
            <div class="rounded-lg border border-slate-200 bg-white p-4 shadow-sm">
                <h3 class="mb-2 font-medium text-slate-800"><?php echo htmlspecialchars($integration); ?></h3>
                <p class="mb-3 text-sm text-slate-600">
                    This system shares data and functionality with the <?php echo htmlspecialchars($system['name']); ?> system.
                </p>
                <?php
                // Try to find a system with matching name
                $relatedSlug = strtolower(str_replace(' ', '', $integration));
                $relatedSlug = str_replace('/', '-', $relatedSlug);
                ?>
                <a
                    href="/systems/<?php echo htmlspecialchars($relatedSlug); ?>"
                    class="text-sm font-medium text-blue-600 hover:text-blue-800"
                >
                    View System Details
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
