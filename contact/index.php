<?php
$pageTitle = 'Contact | Organisation Playbook';
$pageDescription = 'Get in touch with the Organisation Playbook team.';
include __DIR__ . '/../includes/header.php';
?>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-3xl px-4">
        <header class="mb-12 text-center">
            <h1 class="mb-4 text-4xl font-bold text-slate-800">Get in Touch</h1>
            <p class="text-lg text-slate-600">
                We'd love to hear from you. Whether you have questions about the playbook, want to
                contribute, or are interested in applying these principles in your organisation.
            </p>
        </header>

        <div class="space-y-8">
            <div class="rounded-xl bg-white p-8 shadow-sm">
                <h2 class="mb-4 text-xl font-semibold text-slate-800">Share Your Feedback</h2>
                <p class="mb-4 text-slate-600">
                    The quickest way to share ideas, report issues, or suggest improvements is through
                    our feedback widget. Look for the blue <strong>Feedback</strong> button in the
                    bottom-right corner of any page.
                </p>
                <p class="text-slate-600">
                    Your feedback helps us improve the Organisation Playbook and build systems that
                    work better for everyone.
                </p>
            </div>

            <div class="rounded-xl bg-white p-8 shadow-sm">
                <h2 class="mb-4 text-xl font-semibold text-slate-800">Contribute on GitHub</h2>
                <p class="mb-4 text-slate-600">
                    This project is open source. You can view the code, report issues, or contribute
                    directly on GitHub.
                </p>
                <a
                    href="https://github.com/wellis321/org-playbook"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center rounded-lg bg-slate-800 px-6 py-2 font-medium text-white hover:bg-slate-700"
                >
                    View on GitHub
                    <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>

            <div class="rounded-xl bg-slate-800 p-8 text-center text-white">
                <h2 class="mb-2 text-xl font-semibold">Explore the Playbook</h2>
                <p class="mb-6 text-slate-300">
                    Learn more about our approach to building human-centered organisations.
                </p>
                <a href="/playbook" class="inline-block rounded-lg bg-white px-6 py-2 font-medium text-slate-800 transition-colors hover:bg-slate-100">
                    Explore the Playbook
                </a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer-close.php'; ?>
