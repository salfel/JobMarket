<script lang="ts" setup>
import Header from "@/components/Header.vue";
import {useToast} from "primevue/usetoast";
import {usePage} from "@inertiajs/vue3";
import {computed, watch} from "vue";
import {Alert} from "@/utils/types";

const toast = useToast();

const alert = computed(() => {
	const flash = usePage().props.flash as { alert?: Alert };
	return flash?.alert;
});

watch(alert, (newAlert) => {
	if (newAlert) {
		toast.add({
			severity: newAlert.type, detail: newAlert.message, summary: "You are not authorized", life: 5000,
		});
	}
});
</script>

<template>
	<div class="min-h-screen flex flex-col pb-5">
		<Toast class="z-20" position="bottom-right"/>
		<Header/>
		<main class="pt-3 flex justify-center items-stretch flex-1">
			<div class="flex flex-col px-3 max-w-4xl w-full">
				<slot/>
			</div>
		</main>
	</div>
</template>
