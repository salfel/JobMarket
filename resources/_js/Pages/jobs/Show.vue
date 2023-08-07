<script lang="ts" setup>
import AppLayout from "@/layouts/AppLayout.vue";
import {Job} from "@/utils/types";

defineProps<{
	job: Job
}>()

defineOptions({layout: AppLayout})
</script>

<template>
	<Card>
		<template #title>
			{{ job.name }}
		</template>
		<template #subtitle>
			<div class="flex gap-8">
				<div class="space-x-2">
					<i class="pi pi-map-marker"></i>
					<span>{{ job.location }}</span>
				</div>
				<div class="space-x-2">
					<i class="pi pi-clock"></i>
					<span>{{ job.employment_type }}</span>
				</div>
				<div class="space-x-2">
					<i class="pi pi-star"></i>
					<span>{{ job.experience_level }}</span>
				</div>
			</div>
		</template>
		<template #content>
			{{ job.description }}
		</template>
	</Card>
</template>
