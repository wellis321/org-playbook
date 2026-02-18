<?php
$pageTitle = 'Organisation Playbook';
$pageDescription = 'A comprehensive guide to building human-centered organisations where systems serve people, not the other way around.';
include __DIR__ . '/../includes/header.php';
?>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-5xl px-4">
        <header class="mb-12">
            <h1 class="mb-4 text-4xl font-bold text-slate-800">Organisation Playbook</h1>
            <p class="max-w-3xl text-lg text-slate-600">
                A comprehensive guide to building human-centered organisations where systems serve people,
                not the other way around.
            </p>
        </header>

        <div class="mb-8 rounded-xl bg-white p-8 shadow-sm">
            <h2 class="mb-6 text-2xl font-semibold text-slate-800">Introduction</h2>

            <p class="mb-4 text-slate-600">
                The Organisation Playbook is a guide to structuring an organisation around people and their
                needs, rather than rigid systems. It aims to create intuitive, efficient workflows where
                staff do not require extensive training to navigate digital systems. Instead, information
                and processes should be designed to be natural and accessible.
            </p>

            <p class="text-slate-600">
                This playbook is a living document that will evolve over time as we refine our approach to
                structured, people-first information management. We'll be adding more sections and details
                as we develop the playbook further.
            </p>
        </div>

        <div class="mb-12 grid grid-cols-1 gap-8 md:grid-cols-2">
            <div class="rounded-xl bg-white p-8 shadow-sm">
                <h3 class="mb-4 text-xl font-semibold text-slate-800">Organisation Information Pool</h3>
                <p class="mb-4 text-slate-600">
                    The Organisation Information Pool encompasses all the information that defines an
                    organisation, including:
                </p>
                <ul class="mb-4 list-inside list-disc space-y-2 text-slate-600">
                    <li><strong>Staff</strong> – HR records, roles, authentication, payroll</li>
                    <li><strong>People Supported</strong> – Case records, support plans, compliance data</li>
                    <li>
                        <strong>Teams/Groups</strong> – Memberships, hierarchies, permissions, responsibilities
                    </li>
                    <li>
                        <strong>Properties & Assets</strong> – Locations, maintenance records, ownership, usage
                    </li>
                </ul>
                <a href="/playbook/technical-architecture" class="font-medium text-blue-600 hover:text-blue-800">Learn more →</a>
            </div>

            <div class="rounded-xl bg-white p-8 shadow-sm">
                <h3 class="mb-4 text-xl font-semibold text-slate-800">Rules for Managing Information</h3>
                <p class="mb-4 text-slate-600">
                    To ensure efficiency, security, and usability, the Organisation Information Pool follows
                    these rules:
                </p>
                <ul class="mb-4 list-inside list-disc space-y-2 text-slate-600">
                    <li><strong>No Duplication</strong> – A single source of truth for all information</li>
                    <li>
                        <strong>Standardisation & Validation</strong> – Consistent formats, enforced at multiple
                        levels
                    </li>
                    <li>
                        <strong>Person-Centric Approach</strong> – Designed for ease of use and improved experiences
                    </li>
                    <li><strong>Security-First Design</strong> – Data encrypted at rest and in transport</li>
                </ul>
                <a href="/playbook/functional-composition" class="font-medium text-blue-600 hover:text-blue-800">Learn more →</a>
            </div>
        </div>

        <div class="mb-12 rounded-xl bg-white p-8 shadow-sm">
            <h2 class="mb-6 text-2xl font-semibold text-slate-800">The Future Vision</h2>

            <div class="mb-8">
                <h3 class="mb-3 text-xl font-semibold text-slate-800">National HR & Recruitment System</h3>
                <p class="text-slate-600">
                    A functional programming-based HR and recruitment system could be developed at a national
                    level to provide modular, adaptable tools for organisations across Scotland. This system
                    could be maintained by a dedicated development team, reducing reliance on third-party
                    providers and increasing efficiency across the public and third sectors.
                </p>
            </div>

            <div>
                <h3 class="mb-3 text-xl font-semibold text-slate-800">Form Builder for Organisations</h3>
                <p class="mb-4 text-slate-600">
                    A key tool for organisations is a custom form builder with strict validation and GDPR
                    compliance. Every field must have validation, and some fields may belong to GDPR rule
                    groups with predefined access and retention controls.
                </p>
                <a href="/playbook/technical-architecture" class="font-medium text-blue-600 hover:text-blue-800">Learn more about our vision →</a>
            </div>
        </div>

        <div class="rounded-xl bg-slate-800 p-8 text-center text-white shadow-md">
            <h2 class="mb-4 text-2xl font-semibold">Implementation: How to Apply This Playbook</h2>
            <p class="mx-auto mb-6 max-w-2xl text-slate-300">
                Organisations can adopt this playbook in phases, starting with quick wins and moving toward
                full implementation. We're here to guide you through the process.
            </p>
            <a
                href="/contact"
                class="inline-block rounded-lg bg-white px-6 py-2 font-medium text-slate-800 transition-colors hover:bg-slate-100"
            >
                Get Started
            </a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer-close.php'; ?>
