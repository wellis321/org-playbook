<?php
require_once __DIR__ . '/../includes/db.php';

$slug = $_GET['slug'] ?? '';

if (empty($slug)) {
    header('Location: /systems');
    exit;
}

$db = getDB();

// Get system data
$stmt = $db->prepare("
    SELECT s.*,
           GROUP_CONCAT(DISTINCT spu.user_type) as primary_users,
           GROUP_CONCAT(DISTINCT ske.entity_name) as key_entities,
           GROUP_CONCAT(DISTINCT sip.integration_name) as integration_points
    FROM systems s
    LEFT JOIN system_primary_users spu ON s.id = spu.system_id
    LEFT JOIN system_key_entities ske ON s.id = ske.system_id
    LEFT JOIN system_integration_points sip ON s.id = sip.system_id
    WHERE s.id = :slug
    GROUP BY s.id
");

$stmt->execute([':slug' => $slug]);
$system = $stmt->fetch();

if (!$system) {
    header('HTTP/1.0 404 Not Found');
    include __DIR__ . '/../404.php';
    exit;
}

// Process system data
$system['primaryUsers'] = $system['primary_users'] ? explode(',', $system['primary_users']) : [];
$system['keyEntities'] = $system['key_entities'] ? explode(',', $system['key_entities']) : [];
$system['integrationPoints'] = $system['integration_points'] ? explode(',', $system['integration_points']) : [];

// Filter out "All Systems" from integration points for related systems
$relatedSystems = array_filter($system['integrationPoints'], function($ip) {
    return $ip !== 'All Systems';
});

// Special cases
$isStaffDigitalIdentity = $system['id'] === 'staffidentity';
$isTrainingManagement = $system['id'] === 'training';
$isIdentityManagement = $system['id'] === 'identity';
$isFeedbackManagement = $system['id'] === 'feedback';

$pageTitle = $system['name'] . ' | Organisation Systems';
$pageDescription = $system['description'];
include __DIR__ . '/../includes/header.php';

$activeTab = $_GET['tab'] ?? 'overview';
$tabs = [
    ['id' => 'overview', 'label' => 'Overview'],
    ['id' => 'schema', 'label' => 'Data Schema'],
    ['id' => 'diagrams', 'label' => 'Diagrams'],
    ['id' => 'a11y', 'label' => 'Accessibility'],
    ['id' => 'related', 'label' => 'Related Systems'],
    ['id' => 'security', 'label' => 'Security & GDPR'],
    ['id' => 'poka-yoke', 'label' => 'Poka-Yoke'],
    ['id' => 'implementation', 'label' => 'Implementation Steps']
];
?>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-5xl px-4">
        <!-- Breadcrumb navigation -->
        <div class="mb-8">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/" class="inline-flex items-center text-sm text-slate-600 hover:text-slate-900">
                            <svg class="mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="h-6 w-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="/systems" class="ml-1 text-sm text-slate-600 hover:text-slate-900 md:ml-2">Systems</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="h-6 w-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-slate-500 md:ml-2"><?php echo htmlspecialchars($system['name']); ?></span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- System header -->
        <header class="mb-8">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold text-slate-800"><?php echo htmlspecialchars($system['name']); ?></h1>
                <span class="rounded-full bg-slate-100 px-3 py-1 text-sm font-medium text-slate-700"><?php echo htmlspecialchars($system['category']); ?></span>
            </div>
            <p class="mt-2 text-lg text-slate-600"><?php echo htmlspecialchars($system['description']); ?></p>
        </header>

        <!-- Tab navigation -->
        <div class="mb-6 border-b border-slate-200">
            <ul class="-mb-px flex flex-wrap">
                <?php foreach ($tabs as $tab): ?>
                    <li class="mr-2">
                        <a
                            href="?slug=<?php echo urlencode($slug); ?>&tab=<?php echo $tab['id']; ?>"
                            class="inline-block rounded-t-lg border-b-2 p-4 <?php echo $activeTab === $tab['id'] ? 'border-blue-600 text-blue-600' : 'border-transparent hover:border-slate-300 hover:text-slate-600'; ?>"
                            <?php echo $activeTab === $tab['id'] ? 'aria-current="page"' : ''; ?>
                        >
                            <?php echo htmlspecialchars($tab['label']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Tab content -->
        <div class="mb-12 rounded-xl bg-white p-8 shadow-sm">
            <?php if ($activeTab === 'overview'): ?>
                <?php include __DIR__ . '/tabs/overview.php'; ?>
            <?php elseif ($activeTab === 'schema'): ?>
                <?php include __DIR__ . '/tabs/schema.php'; ?>
            <?php elseif ($activeTab === 'diagrams'): ?>
                <?php include __DIR__ . '/tabs/diagrams.php'; ?>
            <?php elseif ($activeTab === 'a11y'): ?>
                <?php include __DIR__ . '/tabs/a11y.php'; ?>
            <?php elseif ($activeTab === 'related'): ?>
                <?php include __DIR__ . '/tabs/related.php'; ?>
            <?php elseif ($activeTab === 'security'): ?>
                <?php include __DIR__ . '/tabs/security.php'; ?>
            <?php elseif ($activeTab === 'poka-yoke'): ?>
                <?php include __DIR__ . '/tabs/poka-yoke.php'; ?>
            <?php elseif ($activeTab === 'implementation'): ?>
                <?php include __DIR__ . '/tabs/implementation.php'; ?>
            <?php endif; ?>
        </div>

        <!-- Back to systems button -->
        <div class="text-center">
            <a
                href="/systems"
                class="inline-flex items-center rounded-lg bg-slate-100 px-5 py-2.5 text-center text-sm font-medium text-slate-700 hover:bg-slate-200 focus:ring-4 focus:ring-slate-300 focus:outline-none"
            >
                <svg class="mr-2 -ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                Back to Systems
            </a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer-close.php'; ?>
