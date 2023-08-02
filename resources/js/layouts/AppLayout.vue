<script setup>
import Header from "@/components/Header.vue";
</script>

<template>
	<Header />
	<main class="pt-3 flex justify-center">
		<div class="max-w-4xl w-full">
			<slot />
		</div>
	</main>
</template>
