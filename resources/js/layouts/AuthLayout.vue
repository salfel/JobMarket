<script setup>
	import Card from "@/components/Card.vue";
</script>

<template>
	<main class="h-screen flex items-center justify-center bg-slate-100">
		<Card>
			<slot />
		</Card>
	</main>
</template>
