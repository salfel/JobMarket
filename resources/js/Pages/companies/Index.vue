<script lang="ts" setup>
import CompanyPreview from "@/components/CompanyPreview.vue";
import Paginator from "@/components/Paginator.vue";
import { router } from "@inertiajs/vue3";
import { ref } from "vue";
import _ from "lodash";
import type { Company, Pagination } from "@/utils/types";
import AppLayout from "@/layouts/AppLayout.vue";
import InputText from "primevue/inputtext";

defineProps<{
	companies: Pagination<Company>;
}>();

defineOptions({ layout: AppLayout });

const search = ref(new URL(location.href).searchParams.get("q"));

const searchCompanies = _.throttle(() => {
	router.visit("/companies/?q=" + search.value, {
		only: ["companies"],
		preserveState: true,
	});
}, 100);
</script>

<template>
	<div class="w-full">
		<InputText v-model="search" @input="searchCompanies" />
		<div class="space-y-5 mt-3">
			<CompanyPreview
				v-for="company in companies.data"
				:key="company.id"
				:company="company"
			/>
		</div>
		<Paginator :paginator="companies" />
	</div>
</template>
