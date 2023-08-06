<script lang="ts" setup>

import {Job, Pagination} from "@/utils/types";
import AppLayout from "@/layouts/AppLayout.vue";
import JobPreview from "@/components/JobPreview.vue";
import Paginator from "@/components/Paginator.vue";
import _ from "lodash";
import {router} from "@inertiajs/vue3";
import {AutoCompleteCompleteEvent} from "primevue/autocomplete";
import {regions as _regions} from "@/utils/constants";
import {ref} from "vue";

defineProps<{
	jobs: Pagination<Job>
}>()

defineOptions({layout: AppLayout})

const search = ref(new URL(location.href).searchParams.get("q"));
const region = ref(new URL(location.href).searchParams.get("region"));
const regions = ref(_regions)

const searchJobs = _.throttle(() => {
	let url = "/jobs?";
	const searchParams = new URLSearchParams();
	if (search.value) searchParams.set("q", search.value);
	if (region.value) searchParams.set("region", region.value);
	router.visit(url + searchParams.toString(), {
		only: ["jobs"], preserveState: true,
	});
}, 100);

function searchRegion(event: AutoCompleteCompleteEvent) {
	regions.value = _regions.filter((region) => region.toLowerCase().includes(event.query.toLowerCase()));
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
				@itemSelect="searchJobs"
			/>
		</div>
		<div class="space-y-5 mt-3">
			<JobPreview
				v-for="job in jobs.data"
				:key="job.id"
				:job="job"
			/>
		</div>
	</div>

	<Paginator :paginator="jobs"/>
</template>
