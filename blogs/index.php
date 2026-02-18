<?php
$pageTitle = 'Blogs | Organisation Playbook';
$pageDescription = 'Articles and insights on building human-centered organisations.';
include __DIR__ . '/../includes/header.php';

$posts = [
    [
        'slug' => 'the-organisation-as-a-thinking-thing',
        'title' => 'The Organisation as a Thinking Thing',
        'excerpt' => 'There is a question underneath most digitisation projects that never gets asked. Not "which tools should we use" or "what is our cloud strategy" — but something more fundamental. Something like: what do we actually believe information is for?',
    ],
];
?>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-5xl px-4">
        <header class="mb-12">
            <h1 class="mb-4 text-4xl font-bold text-slate-800">Blogs</h1>
            <p class="max-w-3xl text-lg text-slate-600">
                Articles and insights on building human-centered organisations, digital transformation,
                and the philosophy behind effective systems.
            </p>
        </header>

        <div class="space-y-6">
            <?php foreach ($posts as $post): ?>
                <a href="/blogs/<?php echo htmlspecialchars($post['slug']); ?>" class="block rounded-xl bg-white p-8 shadow-sm transition-shadow hover:shadow-md">
                    <h2 class="mb-2 text-2xl font-semibold text-slate-800"><?php echo htmlspecialchars($post['title']); ?></h2>
                    <p class="text-slate-600"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                    <span class="mt-4 inline-block text-sm font-medium text-blue-600 hover:text-blue-800">Read more →</span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer-close.php'; ?>
