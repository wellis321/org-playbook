<?php
$pageTitle = 'Functional Composition Over Object-Oriented Design | Organisation Playbook';
$pageDescription = 'Building systems that embrace the fluid nature of social relationships and roles.';
include __DIR__ . '/../includes/header.php';
?>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
    <div class="container mx-auto max-w-5xl px-4">
        <header class="mb-12">
            <h1 class="mb-4 text-4xl font-bold text-slate-800">Functional Composition Over Object-Oriented Design</h1>
            <p class="max-w-3xl text-lg text-slate-600">
                Building systems that embrace the fluid nature of social relationships and roles.
            </p>
        </header>

        <div class="mb-8 rounded-xl bg-white p-8 shadow-sm">
            <h2 class="mb-6 text-2xl font-semibold text-slate-800">The Challenge with Traditional Design</h2>
            <p class="mb-4 text-slate-600">
                In social care organisations, a fundamental challenge has always been that technical systems are built using object-oriented design principles. These systems typically define rigid classes like "Staff" or "Service User" with fixed properties and behaviors.
            </p>
            <p class="mb-4 text-slate-600">
                However, the reality of social care is much more fluid and dynamic:
            </p>
            <ul class="list-disc pl-6 space-y-2 text-slate-600 mb-4">
                <li>A member of staff might become a person who uses the services</li>
                <li>A service user might join the organisation as a staff member</li>
                <li>People frequently move between departments or take on multiple roles</li>
                <li>Relationships between people change over time and can be multi-dimensional</li>
            </ul>
            <p class="text-slate-600">
                Object-oriented programming struggles with this fluidity, often requiring complex inheritance hierarchies, type casting, or duplicate records to handle role changes.
            </p>
        </div>

        <div class="mb-8 rounded-xl bg-white p-8 shadow-sm">
            <h2 class="mb-6 text-2xl font-semibold text-slate-800">A Better Approach: Functional Composition</h2>
            <p class="mb-4 text-slate-600">
                Rather than defining people by rigid class hierarchies, we use a functional composition approach where:
            </p>
            <ul class="list-disc pl-6 space-y-4 text-slate-600">
                <li>
                    <strong>People are core entities</strong> who exist independently of their roles or relationships
                </li>
                <li>
                    <strong>Roles are composable functions</strong> that can be applied to people dynamically and changed over time
                </li>
                <li>
                    <strong>Relationships are first-class concepts</strong> that connect people in multiple, changing ways
                </li>
                <li>
                    <strong>Historical context is preserved</strong> as roles and relationships evolve
                </li>
            </ul>
        </div>

        <div class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="rounded-xl bg-white p-8 shadow-sm">
                    <h3 class="mb-4 text-xl font-semibold text-slate-800">Object-Oriented Approach</h3>
                    <div class="mb-4 p-4 bg-slate-100 rounded font-mono text-sm">
                        <p>class Staff {</p>
                        <p class="ml-2">id: string;</p>
                        <p class="ml-2">name: string;</p>
                        <p class="ml-2">department: string;</p>
                        <p class="ml-2">role: string;</p>
                        <p class="ml-2">// Staff-specific methods</p>
                        <p>}</p>
                        <br/>
                        <p>class ServiceUser {</p>
                        <p class="ml-2">id: string;</p>
                        <p class="ml-2">name: string;</p>
                        <p class="ml-2">needs: string[];</p>
                        <p class="ml-2">carePlan: CarePlan;</p>
                        <p class="ml-2">// Service user methods</p>
                        <p>}</p>
                    </div>
                    <p class="text-slate-600">
                        Converting between types requires creating new objects and transferring data. Role history is lost or requires custom tracking.
                    </p>
                </div>
                <div class="rounded-xl bg-white p-8 shadow-sm">
                    <h3 class="mb-4 text-xl font-semibold text-slate-800">Functional Composition</h3>
                    <div class="mb-4 p-4 bg-slate-100 rounded font-mono text-sm">
                        <p>interface Person {</p>
                        <p class="ml-2">id: string;</p>
                        <p class="ml-2">name: string;</p>
                        <p class="ml-2">// Core person attributes</p>
                        <p>}</p>
                        <br/>
                        <p>interface Role {</p>
                        <p class="ml-2">type: string;</p>
                        <p class="ml-2">startDate: Date;</p>
                        <p class="ml-2">endDate?: Date;</p>
                        <p class="ml-2">// Role-specific attributes</p>
                        <p>}</p>
                        <br/>
                        <p>// A person can have multiple roles</p>
                        <p>// simultaneously or over time</p>
                    </div>
                    <p class="text-slate-600">
                        People maintain identity while roles are added, removed, or changed. History is preserved naturally in the data model.
                    </p>
                </div>
            </div>
        </div>

        <div class="mb-8 rounded-xl bg-white p-8 shadow-sm">
            <h2 class="mb-6 text-2xl font-semibold text-slate-800">Database Implementation</h2>
            <p class="mb-4 text-slate-600">
                This approach is implemented using MySQL, which provides the flexibility to model these relationships effectively:
            </p>
            <ul class="list-disc pl-6 space-y-2 text-slate-600">
                <li><strong>People table:</strong> Stores core information about individuals</li>
                <li><strong>Roles table:</strong> Tracks all roles a person has held with temporal data</li>
                <li><strong>Relationships table:</strong> Defines connections between people with context and history</li>
            </ul>
            <p class="mt-4 text-slate-600">
                This design allows for powerful queries that can answer questions like:
            </p>
            <ul class="list-disc pl-6 space-y-2 text-slate-600">
                <li>"Who was this person's care coordinator in 2022?"</li>
                <li>"Which staff members were previously service users?"</li>
                <li>"What different roles has this person held in our organisation?"</li>
            </ul>
        </div>

        <div class="mb-8 rounded-xl bg-white p-8 shadow-sm">
            <h2 class="mb-6 text-2xl font-semibold text-slate-800">Real-World Benefits</h2>
            <p class="mb-4 text-slate-600">
                This approach offers significant benefits for social care organisations:
            </p>
            <ul class="list-disc pl-6 space-y-4 text-slate-600">
                <li>
                    <strong>Reflects Reality:</strong> Systems match how social care actually works, with fluid roles and relationships
                </li>
                <li>
                    <strong>Reduces Duplicate Data:</strong> No need for multiple records of the same person in different systems
                </li>
                <li>
                    <strong>Preserves History:</strong> Complete historical view of a person's journey through the organisation
                </li>
                <li>
                    <strong>Enables Complex Analysis:</strong> Powerful reporting across roles and relationships over time
                </li>
                <li>
                    <strong>Supports Person-Centred Care:</strong> Maintains the whole-person view regardless of how roles change
                </li>
            </ul>
        </div>

        <div class="rounded-xl bg-slate-800 p-8 text-center text-white shadow-md">
            <h2 class="mb-4 text-2xl font-semibold">Implementing Functional Composition</h2>
            <p class="mx-auto mb-6 max-w-2xl text-slate-300">
                Ready to shift from object-oriented thinking to functional composition in your social care systems?
            </p>
            <div class="mt-8">
                <a
                    href="/playbook/technical-architecture"
                    class="inline-block rounded-lg bg-white px-6 py-2 font-medium text-slate-800 transition-colors hover:bg-slate-100 mr-4"
                >
                    See Technical Architecture
                </a>
                <a
                    href="/contact"
                    class="inline-block rounded-lg bg-white px-6 py-2 font-medium text-slate-800 transition-colors hover:bg-slate-100"
                >
                    Get Started
                </a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer-close.php'; ?>
