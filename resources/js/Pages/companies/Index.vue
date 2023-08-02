<script lang="ts" setup>
import CompanyPreview from "@/components/CompanyPreview.vue";
import Paginator from "@/components/Paginator.vue";
import { router } from "@inertiajs/vue3";
import {ref} from "vue";
import _ from "lodash";
import type { Company, Pagination } from "@/utils/types";
import AppLayout from "@/layouts/AppLayout.vue";

defineProps<{
	companies: Pagination<Company>;
}>();

defineOptions({ layout: AppLayout })

const search = ref(new URL(location.href).searchParams.get("q"));

const searchCompanies = _.throttle(() => {
	router.visit("/companies/?q=" + search.value, {
		only: ["companies"],
		preserveState: true
	});
}, 100);
</script>

<template>
	<div class="w-full">
		<input
			ref="searchInput"
			v-model="search"
			class="w-60 px-3 py-1.5 ring-1 ring-gray-300 focus:ring-2 focus:ring-cyan-500 focus:outline-none rounded-md"
			type="search"
			@input="searchCompanies"
		/>
		<div class="space-y-5 mt-3">
			<CompanyPreview v-for="company in companies.data" :key="company.id" :company="company" />
		</div>
		<Paginator :paginator="companies" />
	</div>
</template>
