<script lang="ts" setup>
import CompanyPreview from "@/components/CompanyPreview.vue";
import Paginator from "@/components/Paginator.vue";
import { router } from "@inertiajs/vue3";
import {reactive, ref} from "vue";
import _ from "lodash";
import type { Company, Pagination } from "@/utils/types";
import AppLayout from "@/layouts/AppLayout.vue";
import {regions as _regions} from "@/utils/constants";
import {AutoCompleteCompleteEvent} from "primevue/autocomplete";

defineProps<{
	companies: Pagination<Company>;
}>();

defineOptions({ layout: AppLayout });

const search = ref(new URL(location.href).searchParams.get("q"));
const region = ref('')
const regions = ref(_regions)

const searchCompanies = _.throttle(() => {
	let url = '/companies/?q=' + search.value;
	if (region) url += '&region=' + region.value;
	router.visit("/companies/?q=" + search.value, {
		only: ["companies"],
		preserveState: true,
	});
}, 100);

function searchRegion(event: AutoCompleteCompleteEvent) {
	regions.value = _regions.filter((region) =>
		region.toLowerCase().includes(event.query.toLowerCase())
	);
}
</script>

<template>
	<div class="w-full">
		<div>
			<InputText v-model="search" @input="searchCompanies" class="mr-5" placeholder="Search..." />
			<AutoComplete
				v-model="region"
				:suggestions="regions"
				dropdown
				dropdown-class="bg-blue-500"
				@complete="searchRegion"
				placeholder="Region"
			/>
		</div>
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
