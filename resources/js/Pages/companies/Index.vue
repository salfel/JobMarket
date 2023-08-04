<script lang="ts" setup>
import CompanyPreview from "@/components/CompanyPreview.vue";
import Paginator from "@/components/Paginator.vue";
import { router } from "@inertiajs/vue3";
import { ref } from "vue";
import _ from "lodash";
import type { Company, Pagination } from "@/utils/types";
import AppLayout from "@/layouts/AppLayout.vue";
import { regions as _regions } from "@/utils/constants";
import { AutoCompleteCompleteEvent } from "primevue/autocomplete";

defineProps<{
	companies: Pagination<Company>;
}>();

defineOptions({ layout: AppLayout });

const search = ref(new URL(location.href).searchParams.get("q"));
const region = ref(new URL(location.href).searchParams.get("region"));
const regions = ref(_regions);

const searchCompanies = _.throttle(() => {
	let url = "/companies?";
	const searchParams = new URLSearchParams();
	if (search.value) searchParams.set("q", search.value);
	if (region.value) searchParams.set("region", region.value);
	router.visit(url + searchParams.toString(), {
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
	<div class="h-full z-0">
		<div class="space-x-5">
			<InputText
				v-model="search"
				placeholder="Search..."
				@input="searchCompanies"
			/>
			<AutoComplete
				v-model="region"
				:suggestions="regions"
				dropdown
				dropdown-class="bg-blue-500"
				placeholder="Region"
				@complete="searchRegion"
				@itemSelect="searchCompanies"
			/>
			<Button
				class="bg-blue-500"
				label="Search"
				@click="searchCompanies"
			/>
		</div>
		<div class="space-y-5 mt-3">
			<CompanyPreview
				v-for="company in companies.data"
				:key="company.id"
				:company="company"
			/>
		</div>
	</div>

	<Paginator :paginator="companies" />
</template>
