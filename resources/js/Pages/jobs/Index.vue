<script lang="ts" setup>

import {Job, Pagination} from "@/utils/types";
import AppLayout from "@/layouts/AppLayout.vue";
import JobPreview from "@/components/JobPreview.vue";
import Paginator from "@/components/Paginator.vue";

defineProps<{
	jobs: Pagination<Job>
}>()

defineOptions({layout: AppLayout})

</script>

<template>
	<div class="h-full z-0">
		<!--		<div class="space-x-5">-->
		<!--			<InputText-->
		<!--				v-model="search"-->
		<!--				placeholder="Search..."-->
		<!--				@input="searchCompanies"-->
		<!--			/>-->
		<!--			<AutoComplete-->
		<!--				v-model="region"-->
		<!--				:suggestions="regions"-->
		<!--				dropdown-->
		<!--				dropdown-class="bg-blue-500"-->
		<!--				placeholder="Region"-->
		<!--				@complete="searchRegion"-->
		<!--				@itemSelect="searchCompanies"-->
		<!--			/>-->
		<!--			<Button-->
		<!--				class="bg-blue-500"-->
		<!--				label="Search"-->
		<!--				@click="searchCompanies"-->
		<!--			/>-->
		<!--		</div>-->
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
