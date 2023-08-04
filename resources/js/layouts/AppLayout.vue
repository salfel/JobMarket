<script setup>
import Header from "@/components/Header.vue";
</script>

<template>
	<div class="min-h-screen flex flex-col">
		<Header />
		<main class="pt-3 flex justify-center items-stretch flex-1">
			<div class="flex flex-col px-3 max-w-4xl w-full">
				<slot />
			</div>
		</main>
	</div>
</template>
