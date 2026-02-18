<?php
http_response_code(404);
$pageTitle = 'Page Not Found | Organisation Playbook';
$pageDescription = 'The page you are looking for could not be found.';
include __DIR__ . '/includes/header.php';
?>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-3xl px-4 text-center">
        <h1 class="mb-4 text-6xl font-bold text-slate-800">404</h1>
        <h2 class="mb-4 text-2xl font-semibold text-slate-700">Page Not Found</h2>
        <p class="mb-8 text-slate-600">
            Sorry, we couldn't find the page you're looking for.
        </p>
        <a href="/" class="inline-block rounded-lg bg-slate-800 px-6 py-2 font-medium text-white transition-colors hover:bg-slate-700">
            Return to Home
        </a>
        <p class="mt-6">
            <a href="/systems" class="text-blue-600 hover:text-blue-800">View Systems</a> &middot;
            <a href="/playbook" class="text-blue-600 hover:text-blue-800">Explore Playbook</a>
        </p>
    </div>
</div>

<?php include __DIR__ . '/includes/footer-close.php'; ?>
