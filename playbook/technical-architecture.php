<?php
$pageTitle = 'Technical Architecture and Integration | Organisation Playbook';
$pageDescription = 'A modern, scalable approach to building integrated systems that prioritise human needs.';
include __DIR__ . '/../includes/header.php';
?>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-5xl px-4">
        <header class="mb-12">
            <h1 class="mb-4 text-4xl font-bold text-slate-800">Technical Architecture and Integration</h1>
            <p class="max-w-3xl text-lg text-slate-600">
                A modern, scalable approach to building integrated systems that prioritise human needs.
            </p>
        </header>

        <div class="mb-8 rounded-xl bg-white p-8 shadow-sm">
            <h2 class="mb-6 text-2xl font-semibold text-slate-800">Overview</h2>
            <p class="mb-4 text-slate-600">
                Our digital platform is built on a modern, scalable architecture that prioritises human needs while maintaining technical excellence.
                This architecture enables seamless integration between different systems while reducing duplication and complexity.
            </p>
        </div>

        <div class="mb-8 rounded-xl bg-white p-8 shadow-sm">
            <h2 class="mb-6 text-2xl font-semibold text-slate-800">Core Architecture Principles</h2>
            <ul class="list-disc pl-6 space-y-4 text-slate-600">
                <li>
                    <strong>Person-Centric Design:</strong> All systems are built around people and their needs, not the other way around.
                </li>
                <li>
                    <strong>Single Source of Truth:</strong> Core data is managed centrally to prevent duplication and inconsistency.
                </li>
                <li>
                    <strong>Unified Access:</strong> Single sign-on across all applications reduces friction and improves security.
                </li>
                <li>
                    <strong>Modular Systems:</strong> Applications are built as independent modules that share common resources.
                </li>
            </ul>
        </div>

        <div class="mb-8 rounded-xl bg-white p-8 shadow-sm">
            <h2 class="mb-6 text-2xl font-semibold text-slate-800">Key Components</h2>

            <div class="mb-8">
                <h3 class="mb-3 text-xl font-semibold text-slate-800">1. Authentication Service</h3>
                <p class="mb-4 text-slate-600">
                    Centralised authentication system that provides:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-slate-600">
                    <li>Single sign-on across all applications</li>
                    <li>Role-based access control</li>
                    <li>Secure session management</li>
                    <li>Integration with external identity providers</li>
                </ul>
            </div>

            <div class="mb-8">
                <h3 class="mb-3 text-xl font-semibold text-slate-800">2. Model Context Protocol (MCP) Server</h3>
                <p class="mb-4 text-slate-600">
                    Central server managing shared resources including:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-slate-600">
                    <li>Staff sets and information</li>
                    <li>Service user data</li>
                    <li>Document management</li>
                    <li>Common configurations</li>
                </ul>
            </div>

            <div class="mb-8">
                <h3 class="mb-3 text-xl font-semibold text-slate-800">3. Application Suite</h3>
                <p class="mb-4 text-slate-600">
                    Individual applications built on shared infrastructure:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-slate-600">
                    <li>Rota Management System</li>
                    <li>Document Management System</li>
                    <li>Medication Management System</li>
                    <li>Additional modules as needed</li>
                </ul>
            </div>
        </div>

        <div class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="rounded-xl bg-white p-8 shadow-sm">
                    <h3 class="mb-4 text-xl font-semibold text-slate-800">For Organisations</h3>
                    <ul class="list-disc pl-6 space-y-2 text-slate-600">
                        <li>Reduced technical complexity</li>
                        <li>Lower maintenance costs</li>
                        <li>Improved data consistency</li>
                        <li>Better security control</li>
                    </ul>
                </div>
                <div class="rounded-xl bg-white p-8 shadow-sm">
                    <h3 class="mb-4 text-xl font-semibold text-slate-800">For Users</h3>
                    <ul class="list-disc pl-6 space-y-2 text-slate-600">
                        <li>Single login for all systems</li>
                        <li>Consistent user experience</li>
                        <li>Reduced training needs</li>
                        <li>Improved productivity</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mb-8 rounded-xl bg-white p-8 shadow-sm">
            <h2 class="mb-6 text-2xl font-semibold text-slate-800">Technical Implementation</h2>
            <p class="mb-4 text-slate-600">
                Built using modern web technologies:
            </p>
            <ul class="list-disc pl-6 space-y-2 text-slate-600">
                <li><strong>Frontend/Backend:</strong> PHP with MySQL for reliable, scalable applications</li>
                <li><strong>Database:</strong> MySQL for structured data storage with relational integrity</li>
                <li><strong>Authentication:</strong> Secure session management with password hashing</li>
                <li><strong>API:</strong> RESTful endpoints with JSON responses</li>
            </ul>
        </div>

        <div class="rounded-xl bg-slate-800 p-8 text-center text-white shadow-md">
            <h2 class="mb-4 text-2xl font-semibold">Getting Started</h2>
            <p class="mx-auto mb-6 max-w-2xl text-slate-300">
                Organisations can adopt this architecture in phases:
            </p>
            <ol class="list-decimal pl-6 space-y-4 text-left text-slate-300">
                <li>
                    <strong>Phase 1:</strong> Implement core authentication and MCP server
                </li>
                <li>
                    <strong>Phase 2:</strong> Migrate existing applications to use shared resources
                </li>
                <li>
                    <strong>Phase 3:</strong> Deploy new applications using the unified architecture
                </li>
                <li>
                    <strong>Phase 4:</strong> Optimise and expand based on organisational needs
                </li>
            </ol>
            <div class="mt-8">
                <a
                    href="/contact"
                    class="inline-block rounded-lg bg-white px-6 py-2 font-medium text-slate-800 transition-colors hover:bg-slate-100"
                >
                    Learn More
                </a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer-close.php'; ?>
