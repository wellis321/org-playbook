<?php
require_once __DIR__ . '/../includes/db.php';

$db = getDB();

// Get all categories
$categoriesQuery = $db->query("SELECT DISTINCT category FROM systems ORDER BY category");
$categories = ['All'];
while ($row = $categoriesQuery->fetch()) {
    $categories[] = $row['category'];
}

// Get systems with their relationships
$systemsQuery = $db->query("
    SELECT s.*,
           GROUP_CONCAT(DISTINCT spu.user_type) as primary_users,
           GROUP_CONCAT(DISTINCT ske.entity_name) as key_entities,
           GROUP_CONCAT(DISTINCT sip.integration_name) as integration_points
    FROM systems s
    LEFT JOIN system_primary_users spu ON s.id = spu.system_id
    LEFT JOIN system_key_entities ske ON s.id = ske.system_id
    LEFT JOIN system_integration_points sip ON s.id = sip.system_id
    GROUP BY s.id
    ORDER BY s.name
");
$systems = $systemsQuery->fetchAll();

// Process systems data
foreach ($systems as &$system) {
    $system['primaryUsers'] = $system['primary_users'] ? explode(',', $system['primary_users']) : [];
    $system['keyEntities'] = $system['key_entities'] ? explode(',', $system['key_entities']) : [];
    $system['integrationPoints'] = $system['integration_points'] ? explode(',', $system['integration_points']) : [];
}

$pageTitle = 'Organisation Systems';
$pageDescription = 'Explore the systems that can be built upon the Organisation Information Pool architecture.';
include __DIR__ . '/../includes/header.php';
?>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-5xl px-4">
        <header class="mb-12">
            <h1 class="mb-4 text-4xl font-bold text-slate-800">Organisation Systems</h1>
            <p class="max-w-3xl text-lg text-slate-600">
                These systems can be built upon the Organisation Information Pool architecture, sharing data
                and functionality while adhering to our core design principles.
            </p>
        </header>

        <div class="mb-8 rounded-xl bg-white p-8 shadow-sm">
            <h2 class="mb-6 text-2xl font-semibold text-slate-800">Core Design Principles</h2>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div class="border-l-4 border-blue-500 pl-4">
                    <h3 class="mb-2 font-medium text-slate-800">Simplicity First</h3>
                    <p class="text-sm text-slate-600">
                        Systems should be intuitive and straightforward, minimising complexity and cognitive
                        load.
                    </p>
                </div>

                <div class="border-l-4 border-blue-500 pl-4">
                    <h3 class="mb-2 font-medium text-slate-800">Poka-Yoke (Error Prevention)</h3>
                    <p class="text-sm text-slate-600">
                        Systems should prevent errors before they occur through constraints, validations, and
                        clear guidance.
                    </p>
                </div>

                <div class="border-l-4 border-blue-500 pl-4">
                    <h3 class="mb-2 font-medium text-slate-800">User-Centered Design</h3>
                    <p class="text-sm text-slate-600">
                        If users find a system difficult to use, the problem lies with the system, not the user.
                    </p>
                </div>

                <div class="border-l-4 border-blue-500 pl-4">
                    <h3 class="mb-2 font-medium text-slate-800">Seamless Integration</h3>
                    <p class="text-sm text-slate-600">
                        All systems should share data and functionality where appropriate, eliminating
                        duplication.
                    </p>
                </div>

                <div class="border-l-4 border-blue-500 pl-4">
                    <h3 class="mb-2 font-medium text-slate-800">Minimal Training</h3>
                    <p class="text-sm text-slate-600">
                        Systems should be so intuitive that extensive training is unnecessary.
                    </p>
                </div>
            </div>
        </div>

        <div class="mb-12">
            <div class="mb-6 flex flex-col items-start justify-between gap-4 md:flex-row md:items-center">
                <h2 class="text-2xl font-semibold text-slate-800">Systems Inventory</h2>

                <div class="flex flex-col gap-4 sm:flex-row">
                    <div>
                        <label for="category-filter" class="mb-1 block text-sm font-medium text-slate-700">Category</label>
                        <select
                            id="category-filter"
                            class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo htmlspecialchars($category); ?>"><?php echo htmlspecialchars($category); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="search" class="mb-1 block text-sm font-medium text-slate-700">Search</label>
                        <input
                            type="text"
                            id="search"
                            placeholder="Search systems..."
                            class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        />
                    </div>
                </div>
            </div>

            <div id="systems-grid" class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($systems as $system): ?>
                    <div class="system-card rounded-xl bg-white p-6 shadow-sm transition-shadow hover:shadow-md"
                         data-category="<?php echo htmlspecialchars($system['category']); ?>"
                         data-name="<?php echo htmlspecialchars(strtolower($system['name'])); ?>"
                         data-description="<?php echo htmlspecialchars(strtolower($system['description'])); ?>">
                        <div class="mb-2 flex items-start justify-between">
                            <h3 class="text-lg font-semibold text-slate-800"><?php echo htmlspecialchars($system['name']); ?></h3>
                            <span class="rounded-full bg-slate-100 px-2 py-1 text-xs text-slate-700"><?php echo htmlspecialchars($system['category']); ?></span>
                        </div>
                        <p class="mb-4 line-clamp-2 text-sm text-slate-600"><?php echo htmlspecialchars($system['description']); ?></p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-slate-500"><?php echo count($system['primaryUsers']); ?> user groups</span>
                            <div class="flex gap-2">
                                <button
                                    class="text-sm font-medium text-slate-600 hover:text-slate-800 quick-view-btn"
                                    data-system-id="<?php echo htmlspecialchars($system['id']); ?>"
                                >
                                    Quick View
                                </button>
                                <a
                                    href="/systems/<?php echo htmlspecialchars($system['id']); ?>"
                                    class="text-sm font-medium text-blue-600 hover:text-blue-800"
                                >
                                    Full Details
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="rounded-xl bg-slate-800 p-8 text-center text-white shadow-md">
            <h2 class="mb-4 text-2xl font-semibold">System Interconnections</h2>
            <p class="mx-auto mb-6 max-w-2xl text-slate-300">
                The power of the Organisation Information Pool lies in how these systems interconnect,
                sharing data and functionality to create a seamless user experience.
            </p>
            <a
                href="/roadmap"
                class="inline-block rounded-lg bg-white px-6 py-2 font-medium text-slate-800 transition-colors hover:bg-slate-100"
            >
                View Development Roadmap
            </a>
        </div>
    </div>
</div>

<!-- System Detail Modal -->
<div id="system-modal" class="hidden bg-opacity-50 fixed inset-0 z-50 flex items-center justify-center bg-black p-4">
    <div class="max-h-[90vh] w-full max-w-2xl overflow-y-auto rounded-xl bg-white shadow-lg">
        <div class="p-6" id="modal-content">
            <!-- Content will be loaded via AJAX -->
        </div>
    </div>
</div>

<script>
// Filtering and search functionality
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilter = document.getElementById('category-filter');
    const searchInput = document.getElementById('search');
    const systemsGrid = document.getElementById('systems-grid');
    const systemCards = document.querySelectorAll('.system-card');

    function filterSystems() {
        const selectedCategory = categoryFilter.value;
        const searchTerm = searchInput.value.toLowerCase();

        systemCards.forEach(card => {
            const category = card.dataset.category;
            const name = card.dataset.name;
            const description = card.dataset.description;

            const categoryMatch = selectedCategory === 'All' || category === selectedCategory;
            const searchMatch = searchTerm === '' ||
                name.includes(searchTerm) ||
                description.includes(searchTerm);

            if (categoryMatch && searchMatch) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    categoryFilter.addEventListener('change', filterSystems);
    searchInput.addEventListener('input', filterSystems);

    // Quick view functionality
    document.querySelectorAll('.quick-view-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const systemId = this.dataset.systemId;
            window.location.href = '/systems/' + systemId;
        });
    });
});
</script>

<?php include __DIR__ . '/../includes/footer-close.php'; ?>
