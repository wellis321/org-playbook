<script lang="ts">
	import { fly } from 'svelte/transition';
	import { page } from '$app/stores';

	// State management
	let isOpen = false;
	let feedbackType = 'issue';
	let feedbackText = '';
	let isAnonymous = false;
	let includeScreenshot = true;
	let submitting = false;
	let submitted = false;

	// Toggle the feedback panel
	function togglePanel() {
		isOpen = !isOpen;
		if (!isOpen) {
			resetForm();
		}
	}

	// Reset the form
	function resetForm() {
		feedbackType = 'issue';
		feedbackText = '';
		isAnonymous = false;
		includeScreenshot = true;
		submitted = false;
	}

	// Submit the feedback
	async function submitFeedback() {
		submitting = true;

		// Collect context data
		const contextData = {
			url: $page.url.href,
			path: $page.url.pathname,
			system: getCurrentSystem($page.url.pathname),
			timestamp: new Date().toISOString(),
			userAgent: navigator.userAgent,
			screenSize: `${window.innerWidth}x${window.innerHeight}`
			// In a real implementation, we would collect more context data
			// and potentially take a screenshot if requested
		};

		// In a real implementation, this would send data to the server
		// For now, we'll just simulate a successful submission
		await new Promise((resolve) => setTimeout(resolve, 1000));

		submitting = false;
		submitted = true;

		// Auto-close after showing success message
		setTimeout(() => {
			if (submitted) {
				isOpen = false;
				resetForm();
			}
		}, 3000);
	}

	// Helper function to determine the current system from the URL
	function getCurrentSystem(pathname: string): string {
		if (pathname.startsWith('/systems')) {
			const parts = pathname.split('/');
			if (parts.length > 2) {
				return parts[2];
			}
			return 'Systems Overview';
		}

		// Extract first part of path
		const firstPathPart = pathname.split('/')[1] || 'home';
		return firstPathPart.charAt(0).toUpperCase() + firstPathPart.slice(1);
	}
</script>

<div class="fixed right-4 bottom-4 z-50 flex flex-col items-end">
	<!-- Feedback button -->
	<button
		on:click={togglePanel}
		class="flex items-center rounded-full bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:outline-none"
	>
		<svg
			xmlns="http://www.w3.org/2000/svg"
			class="mr-2 h-5 w-5"
			viewBox="0 0 20 20"
			fill="currentColor"
		>
			<path
				fill-rule="evenodd"
				d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
				clip-rule="evenodd"
			/>
		</svg>
		Feedback
	</button>

	<!-- Feedback panel -->
	{#if isOpen}
		<div
			transition:fly={{ y: 10, duration: 200 }}
			class="mt-2 w-80 rounded-lg border border-gray-200 bg-white p-4 shadow-xl"
		>
			{#if submitted}
				<div class="text-center">
					<svg
						xmlns="http://www.w3.org/2000/svg"
						class="mx-auto h-12 w-12 text-green-500"
						fill="none"
						viewBox="0 0 24 24"
						stroke="currentColor"
					>
						<path
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
						/>
					</svg>
					<h3 class="mt-2 text-lg font-medium text-gray-900">Thank you for your feedback!</h3>
					<p class="mt-1 text-sm text-gray-500">Your input helps us improve our systems.</p>
				</div>
			{:else}
				<div class="mb-4 flex items-center justify-between">
					<h3 class="text-lg font-medium text-gray-900">Share your feedback</h3>
					<button
						on:click={togglePanel}
						class="text-gray-400 hover:text-gray-500 focus:outline-none"
						aria-label="Close"
					>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							class="h-5 w-5"
							viewBox="0 0 20 20"
							fill="currentColor"
						>
							<path
								fill-rule="evenodd"
								d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
								clip-rule="evenodd"
							/>
						</svg>
					</button>
				</div>

				<form on:submit|preventDefault={submitFeedback}>
					<div class="mb-4">
						<label for="feedback-type" class="mb-1 block text-sm font-medium text-gray-700"
							>Feedback type</label
						>
						<select
							id="feedback-type"
							bind:value={feedbackType}
							class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
						>
							<option value="issue">Report an issue</option>
							<option value="improvement">Suggest an improvement</option>
							<option value="content">Report content error</option>
							<option value="compliment">Share a compliment</option>
							<option value="question">Ask a question</option>
						</select>
					</div>

					<div class="mb-4">
						<label for="feedback-text" class="mb-1 block text-sm font-medium text-gray-700"
							>Your feedback</label
						>
						<textarea
							id="feedback-text"
							bind:value={feedbackText}
							rows="3"
							class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
							placeholder="Please describe your feedback..."
							required
						></textarea>
					</div>

					<div class="mb-4 flex items-center">
						<input
							id="anonymous"
							type="checkbox"
							bind:checked={isAnonymous}
							class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
						/>
						<label for="anonymous" class="ml-2 block text-sm text-gray-700"
							>Submit anonymously</label
						>
					</div>

					<div class="mb-4 flex items-center">
						<input
							id="screenshot"
							type="checkbox"
							bind:checked={includeScreenshot}
							class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
						/>
						<label for="screenshot" class="ml-2 block text-sm text-gray-700"
							>Include screenshot</label
						>
					</div>

					<div class="flex justify-end">
						<button
							type="button"
							on:click={togglePanel}
							class="mr-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:outline-none"
						>
							Cancel
						</button>
						<button
							type="submit"
							disabled={submitting || !feedbackText}
							class="rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:outline-none disabled:opacity-50"
						>
							{#if submitting}
								<span class="flex items-center">
									<svg
										class="mr-2 h-4 w-4 animate-spin text-white"
										xmlns="http://www.w3.org/2000/svg"
										fill="none"
										viewBox="0 0 24 24"
									>
										<circle
											class="opacity-25"
											cx="12"
											cy="12"
											r="10"
											stroke="currentColor"
											stroke-width="4"
										></circle>
										<path
											class="opacity-75"
											fill="currentColor"
											d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
										></path>
									</svg>
									Submitting...
								</span>
							{:else}
								Submit Feedback
							{/if}
						</button>
					</div>
				</form>
			{/if}
		</div>
	{/if}
</div>
