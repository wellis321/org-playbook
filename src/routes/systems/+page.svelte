<script lang="ts">
	import { systems, categories, type System } from './systems-data';

	// Filter and sort functionality
	let selectedCategory = 'All';
	let searchTerm = '';

	$: filteredSystems = systems
		.filter(
			(system) =>
				(selectedCategory === 'All' || system.category === selectedCategory) &&
				(searchTerm === '' ||
					system.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
					system.description.toLowerCase().includes(searchTerm.toLowerCase()))
		)
		.sort((a, b) => a.name.localeCompare(b.name));

	// System detail view
	let selectedSystem: System | null = null;

	function viewSystemDetails(system: System): void {
		selectedSystem = system;
	}

	function closeSystemDetails(): void {
		selectedSystem = null;
	}
</script>

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
						<label for="category-filter" class="mb-1 block text-sm font-medium text-slate-700"
							>Category</label
						>
						<select
							id="category-filter"
							bind:value={selectedCategory}
							class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
						>
							{#each categories as category}
								<option value={category}>{category}</option>
							{/each}
						</select>
					</div>

					<div>
						<label for="search" class="mb-1 block text-sm font-medium text-slate-700">Search</label>
						<input
							type="text"
							id="search"
							bind:value={searchTerm}
							placeholder="Search systems..."
							class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
						/>
					</div>
				</div>
			</div>

			<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
				{#each filteredSystems as system}
					<div class="rounded-xl bg-white p-6 shadow-sm transition-shadow hover:shadow-md">
						<div class="mb-2 flex items-start justify-between">
							<h3 class="text-lg font-semibold text-slate-800">{system.name}</h3>
							<span class="rounded-full bg-slate-100 px-2 py-1 text-xs text-slate-700"
								>{system.category}</span
							>
						</div>
						<p class="mb-4 line-clamp-2 text-sm text-slate-600">{system.description}</p>
						<div class="flex items-center justify-between">
							<span class="text-xs text-slate-500">{system.primaryUsers.length} user groups</span>
							<div class="flex gap-2">
								<button
									class="text-sm font-medium text-slate-600 hover:text-slate-800"
									on:click={() => viewSystemDetails(system)}
								>
									Quick View
								</button>
								<a
									href={`/systems/${system.id}`}
									class="text-sm font-medium text-blue-600 hover:text-blue-800"
								>
									Full Details
								</a>
							</div>
						</div>
					</div>
				{/each}
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
{#if selectedSystem}
	<div class="bg-opacity-50 fixed inset-0 z-50 flex items-center justify-center bg-black p-4">
		<div class="max-h-[90vh] w-full max-w-2xl overflow-y-auto rounded-xl bg-white shadow-lg">
			<div class="p-6">
				<div class="mb-4 flex items-start justify-between">
					<h2 class="text-2xl font-semibold text-slate-800">{selectedSystem.name}</h2>
					<button
						on:click={closeSystemDetails}
						class="text-slate-500 hover:text-slate-700"
						aria-label="Close"
					>
						<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M6 18L18 6M6 6l12 12"
							></path>
						</svg>
					</button>
				</div>

				<span class="mb-4 inline-block rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-700">
					{selectedSystem.category}
				</span>

				<p class="mb-6 text-slate-600">{selectedSystem.description}</p>

				<div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-2">
					<div>
						<h3 class="mb-2 font-medium text-slate-800">Primary Users</h3>
						<ul class="list-inside list-disc space-y-1 text-slate-600">
							{#each selectedSystem.primaryUsers as user}
								<li>{user}</li>
							{/each}
						</ul>
					</div>

					<div>
						<h3 class="mb-2 font-medium text-slate-800">Key Information Entities</h3>
						<ul class="list-inside list-disc space-y-1 text-slate-600">
							{#each selectedSystem.keyEntities as entity}
								<li>{entity}</li>
							{/each}
						</ul>
					</div>
				</div>

				<div class="mb-6">
					<h3 class="mb-2 font-medium text-slate-800">Integration Points</h3>
					<div class="flex flex-wrap gap-2">
						{#each selectedSystem.integrationPoints as integration}
							<span class="rounded-full bg-blue-100 px-3 py-1 text-sm text-blue-800">
								{integration}
							</span>
						{/each}
					</div>
				</div>

				<div class="border-t border-slate-200 pt-6">
					<h3 class="mb-2 font-medium text-slate-800">Development Status</h3>
					<span class="inline-block rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-700">
						Idea
					</span>
					<p class="mt-2 text-sm text-slate-600">
						This system is currently in the conceptual stage and will be developed according to the
						Organisation Playbook roadmap.
					</p>
				</div>
			</div>
		</div>
	</div>
{/if}
