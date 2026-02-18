<?php
// Get base path (empty for root, or set to subdirectory if needed)
$base = '';
?>

<nav class="bg-white shadow-sm">
    <div class="container mx-auto max-w-5xl px-4">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <a href="<?php echo $base; ?>/" class="flex items-center">
                    <span class="text-xl font-semibold text-slate-800">Organisation Playbook</span>
                </a>
            </div>

            <!-- Desktop menu -->
            <div class="hidden items-center space-x-6 md:flex">
                <a href="<?php echo $base; ?>/" class="font-medium text-slate-700 hover:text-slate-900">Home</a>

                <!-- Playbook dropdown -->
                <div class="relative" id="playbook-dropdown">
                    <button
                        class="flex items-center font-medium text-slate-700 hover:text-slate-900"
                        onclick="togglePlaybookMenu()"
                        onblur="setTimeout(() => closePlaybookMenu(), 100)"
                    >
                        Playbook
                        <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="playbook-arrow">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"
                            />
                        </svg>
                    </button>

                    <div id="playbook-menu" class="hidden ring-opacity-5 absolute left-0 mt-2 w-48 rounded-md bg-white py-2 shadow-lg ring-1 ring-black">
                        <a
                            href="<?php echo $base; ?>/playbook"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">Overview</a>
                        <a
                            href="<?php echo $base; ?>/playbook/technical-architecture"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100"
                            >Technical Architecture</a>
                        <a
                            href="<?php echo $base; ?>/playbook/functional-composition"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100"
                            >Functional Composition</a>
                    </div>
                </div>

                <a href="<?php echo $base; ?>/systems" class="font-medium text-slate-700 hover:text-slate-900">Systems</a>

                <!-- Blogs dropdown -->
                <div class="relative" id="blogs-dropdown">
                    <button
                        class="flex items-center font-medium text-slate-700 hover:text-slate-900"
                        onclick="toggleBlogsMenu()"
                        onblur="setTimeout(() => closeBlogsMenu(), 100)"
                    >
                        Blogs
                        <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="blogs-arrow">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="blogs-menu" class="hidden absolute left-0 mt-2 w-56 rounded-md bg-white py-2 shadow-lg ring-1 ring-black ring-opacity-5">
                        <a href="<?php echo $base; ?>/blogs" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">Overview</a>
                        <a href="<?php echo $base; ?>/blogs/the-organisation-as-a-thinking-thing" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">The Organisation as a Thinking Thing</a>
                    </div>
                </div>

                <a href="<?php echo $base; ?>/roadmap" class="font-medium text-slate-700 hover:text-slate-900">Roadmap</a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button
                    onclick="toggleMobileMenu()"
                    class="text-slate-700 hover:text-slate-900 focus:outline-none"
                    aria-label="Toggle menu"
                    id="mobile-menu-button"
                >
                    <svg class="h-6 w-6" id="menu-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden space-y-2 py-4 md:hidden">
            <a href="<?php echo $base; ?>/" class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100">Home</a>

            <!-- Playbook section with sub-items -->
            <div>
                <a
                    href="<?php echo $base; ?>/playbook"
                    class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100">
                    Playbook
                </a>
                <div class="ml-4 space-y-1">
                    <a
                        href="<?php echo $base; ?>/playbook/technical-architecture"
                        class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100">
                        Technical Architecture
                    </a>
                    <a
                        href="<?php echo $base; ?>/playbook/functional-composition"
                        class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100">
                        Functional Composition
                    </a>
                </div>
            </div>

            <a href="<?php echo $base; ?>/systems" class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100">Systems</a>

            <div>
                <a href="<?php echo $base; ?>/blogs" class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100">Blogs</a>
                <div class="ml-4 space-y-1">
                    <a href="<?php echo $base; ?>/blogs/the-organisation-as-a-thinking-thing" class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100">The Organisation as a Thinking Thing</a>
                </div>
            </div>

            <a href="<?php echo $base; ?>/roadmap" class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100">Roadmap</a>
        </div>
    </div>
</nav>

<script>
let isPlaybookMenuOpen = false;
let isBlogsMenuOpen = false;
let isMobileMenuOpen = false;

function togglePlaybookMenu() {
    isPlaybookMenuOpen = !isPlaybookMenuOpen;
    const menu = document.getElementById('playbook-menu');
    const arrow = document.getElementById('playbook-arrow');

    if (isPlaybookMenuOpen) {
        menu.classList.remove('hidden');
        arrow.setAttribute('d', 'M5 15l7-7 7 7');
    } else {
        menu.classList.add('hidden');
        arrow.setAttribute('d', 'M19 9l-7 7-7-7');
    }
}

function closePlaybookMenu() {
    if (isPlaybookMenuOpen) {
        isPlaybookMenuOpen = false;
        const menu = document.getElementById('playbook-menu');
        const arrow = document.getElementById('playbook-arrow');
        menu.classList.add('hidden');
        arrow.setAttribute('d', 'M19 9l-7 7-7-7');
    }
}

function toggleBlogsMenu() {
    isBlogsMenuOpen = !isBlogsMenuOpen;
    const menu = document.getElementById('blogs-menu');
    const arrow = document.getElementById('blogs-arrow');
    if (isBlogsMenuOpen) {
        menu.classList.remove('hidden');
        arrow.setAttribute('d', 'M5 15l7-7 7 7');
    } else {
        menu.classList.add('hidden');
        arrow.setAttribute('d', 'M19 9l-7 7-7-7');
    }
}

function closeBlogsMenu() {
    if (isBlogsMenuOpen) {
        isBlogsMenuOpen = false;
        const menu = document.getElementById('blogs-menu');
        const arrow = document.getElementById('blogs-arrow');
        menu.classList.add('hidden');
        arrow.setAttribute('d', 'M19 9l-7 7-7-7');
    }
}

function toggleMobileMenu() {
    isMobileMenuOpen = !isMobileMenuOpen;
    const menu = document.getElementById('mobile-menu');
    const icon = document.getElementById('menu-icon');

    if (isMobileMenuOpen) {
        menu.classList.remove('hidden');
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
    } else {
        menu.classList.add('hidden');
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
    }
}
</script>
