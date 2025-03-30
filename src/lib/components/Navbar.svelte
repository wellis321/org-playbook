<script lang="ts">
	import { base } from '$app/paths';
	let isMenuOpen = $state(false);
	let isPlaybookMenuOpen = $state(false);

	function toggleMenu() {
		isMenuOpen = !isMenuOpen;
	}

	function togglePlaybookMenu() {
		isPlaybookMenuOpen = !isPlaybookMenuOpen;
	}

	function closePlaybookMenu() {
		isPlaybookMenuOpen = false;
	}
</script>

<nav class="bg-white shadow-sm">
	<div class="container mx-auto max-w-5xl px-4">
		<div class="flex h-16 items-center justify-between">
			<div class="flex items-center">
				<a href="{base}/" class="flex items-center">
					<span class="text-xl font-semibold text-slate-800">Organisation Playbook</span>
				</a>
			</div>

			<!-- Desktop menu -->
			<div class="hidden items-center space-x-6 md:flex">
				<a href="{base}/" class="font-medium text-slate-700 hover:text-slate-900">Home</a>

				<!-- Playbook dropdown -->
				<div class="relative">
					<button
						class="flex items-center font-medium text-slate-700 hover:text-slate-900"
						onclick={togglePlaybookMenu}
						onblur={() => setTimeout(closePlaybookMenu, 100)}
					>
						Playbook
						<svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d={isPlaybookMenuOpen ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7'}
							/>
						</svg>
					</button>

					{#if isPlaybookMenuOpen}
						<div
							class="ring-opacity-5 absolute left-0 mt-2 w-48 rounded-md bg-white py-2 shadow-lg ring-1 ring-black"
						>
							<a
								href="{base}/playbook"
								class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">Overview</a
							>
							<a
								href="{base}/playbook/technical-architecture"
								class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100"
								>Technical Architecture</a
							>
							<a
								href="{base}/playbook/functional-composition"
								class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100"
								>Functional Composition</a
							>
						</div>
					{/if}
				</div>

				<a href="{base}/systems" class="font-medium text-slate-700 hover:text-slate-900">Systems</a>
				<a href="{base}/roadmap" class="font-medium text-slate-700 hover:text-slate-900">Roadmap</a>
			</div>

			<!-- Mobile menu button -->
			<div class="flex items-center md:hidden">
				<button
					onclick={toggleMenu}
					class="text-slate-700 hover:text-slate-900 focus:outline-none"
					aria-label="Toggle menu"
				>
					<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						{#if isMenuOpen}
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M6 18L18 6M6 6l12 12"
							/>
						{:else}
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M4 6h16M4 12h16M4 18h16"
							/>
						{/if}
					</svg>
				</button>
			</div>
		</div>

		<!-- Mobile menu -->
		{#if isMenuOpen}
			<div class="space-y-2 py-4 md:hidden">
				<a href="{base}/" class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100"
					>Home</a
				>

				<!-- Playbook section with sub-items -->
				<div>
					<a
						href="{base}/playbook"
						class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100"
					>
						Playbook
					</a>
					<div class="ml-4 space-y-1">
						<a
							href="{base}/playbook/technical-architecture"
							class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100"
						>
							Technical Architecture
						</a>
						<a
							href="{base}/playbook/functional-composition"
							class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100"
						>
							Functional Composition
						</a>
					</div>
				</div>

				<a
					href="{base}/systems"
					class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100"
				>
					Systems
				</a>
				<a
					href="{base}/roadmap"
					class="block rounded-md px-4 py-2 text-slate-700 hover:bg-slate-100"
				>
					Roadmap
				</a>
			</div>
		{/if}
	</div>
</nav>
