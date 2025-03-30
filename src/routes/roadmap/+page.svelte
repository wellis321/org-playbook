<script lang="ts">
	import { onMount } from 'svelte';

	// This would typically come from a database or API
	// For now, we'll just use some sample data
	let roadmapSections = [
		{
			title: 'Core Playbook Content',
			description: 'The fundamental elements and detailed content areas of the playbook.',
			status: 'In Progress',
			percentComplete: 60
		},
		{
			title: 'Enhanced User Experience',
			description: 'Interactive elements and visual learning tools to improve engagement.',
			status: 'Planning',
			percentComplete: 10
		},
		{
			title: 'Implementation Resources',
			description: 'Practical toolkits and contextual adaptations for different organisations.',
			status: 'Planning',
			percentComplete: 5
		},
		{
			title: 'Knowledge Sharing & Community',
			description: 'Case studies, examples, and community features for collaborative learning.',
			status: 'Not Started',
			percentComplete: 0
		},
		{
			title: 'Progressive Learning Paths',
			description: 'Content tailored to different audiences and quick-start resources.',
			status: 'Not Started',
			percentComplete: 0
		},
		{
			title: 'Measurement and Evaluation',
			description: 'Frameworks for measuring the impact of human-centered systems.',
			status: 'Not Started',
			percentComplete: 0
		},
		{
			title: 'Technology Integration',
			description: 'Technical guidance for implementing the playbook principles.',
			status: 'Not Started',
			percentComplete: 0
		}
	];

	// For a more detailed view, we could load the full roadmap markdown
	let showDetailedRoadmap = false;
	let roadmapMarkdown = '';

	onMount(async () => {
		try {
			const response = await fetch('/src/lib/playbook-development-roadmap.md');
			roadmapMarkdown = await response.text();
		} catch (error) {
			console.error('Failed to load roadmap markdown:', error);
		}
	});
</script>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
	<div class="container mx-auto max-w-5xl px-4">
		<header class="mb-12">
			<h1 class="mb-4 text-4xl font-bold text-slate-800">Development Roadmap</h1>
			<p class="max-w-3xl text-lg text-slate-600">
				Our plan for developing the Organisation Playbook into a comprehensive resource. This
				roadmap outlines our current progress and future plans.
			</p>
		</header>

		<div class="mb-8 rounded-xl bg-white p-8 shadow-sm">
			<h2 class="mb-6 text-2xl font-semibold text-slate-800">Overview</h2>
			<p class="mb-6 text-slate-600">
				The Organisation Playbook is being developed in phases, with each phase building on the
				foundation of the previous one. We're currently in the Foundation phase, establishing the
				core concepts and structure of the playbook.
			</p>

			<div class="mb-8">
				<h3 class="mb-4 text-xl font-semibold text-slate-800">Development Phases</h3>
				<div class="space-y-6">
					<div class="border-l-4 border-blue-500 pl-4">
						<h4 class="font-medium text-slate-800">Phase 1: Foundation (Current)</h4>
						<p class="text-slate-600">
							Establishing core content, website structure, and visual identity.
						</p>
					</div>
					<div class="border-l-4 border-slate-300 pl-4">
						<h4 class="font-medium text-slate-800">Phase 2: Expansion</h4>
						<p class="text-slate-600">
							Developing interactive elements, implementation toolkits, and initial case studies.
						</p>
					</div>
					<div class="border-l-4 border-slate-300 pl-4">
						<h4 class="font-medium text-slate-800">Phase 3: Community</h4>
						<p class="text-slate-600">
							Launching knowledge sharing features and sector-specific adaptations.
						</p>
					</div>
					<div class="border-l-4 border-slate-300 pl-4">
						<h4 class="font-medium text-slate-800">Phase 4: Refinement</h4>
						<p class="text-slate-600">
							Implementing feedback mechanisms and advanced visualisation tools.
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="mb-12">
			<h2 class="mb-6 text-2xl font-semibold text-slate-800">Progress by Area</h2>
			<div class="grid grid-cols-1 gap-6">
				{#each roadmapSections as section}
					<div class="rounded-xl bg-white p-6 shadow-sm">
						<div class="mb-2 flex items-center justify-between">
							<h3 class="text-xl font-semibold text-slate-800">{section.title}</h3>
							<span
								class="rounded-full px-3 py-1 text-sm {section.status === 'In Progress'
									? 'bg-blue-100 text-blue-800'
									: section.status === 'Planning'
										? 'bg-amber-100 text-amber-800'
										: 'bg-slate-100 text-slate-800'}"
							>
								{section.status}
							</span>
						</div>
						<p class="mb-4 text-slate-600">{section.description}</p>
						<div class="h-2.5 w-full rounded-full bg-slate-200">
							<div
								class="h-2.5 rounded-full bg-blue-600"
								style="width: {section.percentComplete}%"
							></div>
						</div>
						<div class="mt-2 text-right text-sm text-slate-500">
							{section.percentComplete}% complete
						</div>
					</div>
				{/each}
			</div>
		</div>

		<div class="rounded-xl bg-slate-800 p-8 text-center text-white shadow-md">
			<h2 class="mb-4 text-2xl font-semibold">Contribute to Our Roadmap</h2>
			<p class="mx-auto mb-6 max-w-2xl text-slate-300">
				We welcome ideas and feedback on our development roadmap. If you have suggestions for
				features or content that would make the Organisation Playbook more useful, we'd love to hear
				from you.
			</p>
			<a
				href="/contact"
				class="inline-block rounded-lg bg-white px-6 py-2 font-medium text-slate-800 transition-colors hover:bg-slate-100"
			>
				Share Your Ideas
			</a>
		</div>
	</div>
</div>
