<?php
// Related Systems tab content
// Map integration names to system IDs via database lookup
?>

<div>
    <h2 class="mb-4 text-2xl font-semibold text-slate-800">Related Systems</h2>
    <p class="mb-6 text-slate-600">
        The <?php echo htmlspecialchars($system['name']); ?> system integrates with the following systems within the Organisation Information Pool architecture.
    </p>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <?php foreach ($relatedSystems as $integration): ?>
            <?php
            // Find system ID: exact name match, or name starting with integration (e.g. "Finance" -> "Finance Management")
            $stmt = $db->prepare("SELECT id FROM systems WHERE name = :name OR name LIKE CONCAT(:name, ' %') OR name LIKE CONCAT('%', :name2, '%') LIMIT 1");
            $stmt->execute([':name' => $integration, ':name2' => $integration]);
            $relatedSystem = $stmt->fetch();
            $relatedSlug = $relatedSystem ? $relatedSystem['id'] : null;
            ?>
            <div class="rounded-lg border border-slate-200 bg-white p-4 shadow-sm">
                <h3 class="mb-2 font-medium text-slate-800"><?php echo htmlspecialchars($integration); ?></h3>
                <p class="mb-3 text-sm text-slate-600">
                    This system shares data and functionality with the <?php echo htmlspecialchars($system['name']); ?> system.
                </p>
                <?php if ($relatedSlug): ?>
                    <a href="/systems/<?php echo htmlspecialchars($relatedSlug); ?>" class="text-sm font-medium text-blue-600 hover:text-blue-800">
                        View System Details
                    </a>
                <?php else: ?>
                    <span class="text-sm text-slate-500"><?php echo htmlspecialchars($integration); ?></span>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
