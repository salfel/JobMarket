<script lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";

export default {
	layout: AppLayout,
};
</script>

<script lang="ts" setup>
import type { Company, Pagination } from "@/utils/types";
import CompanyPreview from "@/components/CompanyPreview.vue";
import { ref } from "vue";
import { router, Link } from "@inertiajs/vue3";
import _ from "lodash";

defineProps<{
	companies: Pagination<Company>;
}>();

const search = ref(new URL(location.href).searchParams.get("q"));
const searchInput = ref<HTMLInputElement>(null);

const searchCompanies = _.throttle(() => {
	router.visit("/companies/?q=" + search.value, {
		only: ["companies"],
		onSuccess() {
			setTimeout(() => console.log(searchInput.value), 1000);
		},
	});
}, 100);
</script>

<template>
	<div class="w-full">
		<input
			ref="searchInput"
			v-model="search"
			class="w-full px-3 py-1.5 ring-1 ring-gray-300 focus:ring-2 focus:ring-cyan-500 focus:outline-none rounded-md"
			type="search"
			@input="searchCompanies"
		/>
		<div v-for="company in companies.data" class="space-y-5 mt-3">
			<CompanyPreview :company="company" />
		</div>
		<!--		<x-pagination :paginator="$companies"/>-->
	</div>
</template>
