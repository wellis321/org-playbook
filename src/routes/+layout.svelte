<script lang="ts">
	import '../app.css';
	import Navbar from '$lib/components/Navbar.svelte';
	import Footer from '$lib/components/Footer.svelte';
	import FeedbackWidget from '$lib/components/FeedbackWidget.svelte';
	let { children } = $props();
</script>

<div class="flex min-h-screen flex-col">
	<Navbar />
	<div class="flex-grow">
		{@render children()}
	</div>
	<Footer />
	<FeedbackWidget />
</div>
