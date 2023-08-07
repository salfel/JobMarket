<script lang="ts" setup>
import type {Job} from "@/utils/types";
import {convertDate} from "@/utils/functions";
import route from "ziggy-js";

const props = defineProps<{
	job: Job
}>()
</script>

<template>
	<Card :pt="{
		content: {
			class: '!p-1'
		},
		title: {
			class: 'flex items-center justify-between'
		},
		subtitle: { class: 'line-clamp-2' }
	}">
		<template #title>
			<Link :href="route('jobs.show', [job.id])">
				<h4 class="hover:text-blue-500">{{ job.name }}</h4>
			</Link>
			<span class="text-base font-normal">{{ convertDate(job.created_at) }}</span>
		</template>
		<template #subtitle>
			{{ job.description }}
		</template>
		<template #content>
			<div class="flex items-center justify-start gap-5">
				<div class="space-x-2">
					<i class="pi pi-clock"></i>
					<span class="capitalize">{{ job.employment_type }}</span>
				</div>
				<div class="space-x-2">
					<i class="pi pi-map-marker"></i>
					<span>{{ job.location }}</span>
				</div>
				<div class="space-x-2">
					<i class="pi pi-star"></i>
					<span class="capitalize">{{ job.experience_level }}</span>
				</div>

				<Link class="ml-auto" href="#">
					<Button class="bg-blue-500" label="Apply"/>
				</Link>
			</div>
		</template>
	</Card>
</template>
