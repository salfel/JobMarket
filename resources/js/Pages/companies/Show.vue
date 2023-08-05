<script lang="ts" setup>
import AppLayout from "@/layouts/AppLayout.vue";
import type {Company, Job, Pagination} from "@/utils/types";
import JobPreview from "@/components/JobPreview.vue";
import Paginator from "@/components/Paginator.vue"

const props = defineProps<{
	company: Company, jobs: Pagination<Job>
}>();

defineOptions({layout: AppLayout})

</script>

<template>
	<Card :pt="{ title: { class: 'flex items-start gap-5' }}">
		<template #title>
			<img :alt="company.name" :src="company.logo" class="inline-block w-20 h-20"/>
			<div class="flex-1 ">
				<div class="flex items-center justify-between">
					<span>{{ company.name }}</span>
					<div class="flex items-center gap-2">
						<i class="pi pi-map-marker"></i>
						<span class="font-normal text-base">{{ company.location }}</span>
					</div>
				</div>
				<div class="flex items-center gap-12 mt-2">
					<a :href="company.website"
					   class="flex items-center gap-2 hover:text-blue-500"
					   target="_blank">
						<i class="pi pi-globe"></i>
						<span class="text-base">Website</span>
					</a>
					<a :href="'mailto:' + company.email"
					   class="flex items-center gap-2 hover:text-blue-500">
						<i class="pi pi-envelope"></i>
						<span class="text-base">Email</span>
					</a>
					<a :href="'tel:' + company.phone"
					   class="flex items-center gap-2 hover:text-blue-500">
						<i class="pi pi-phone"></i>
						<span class="text-base">Phone</span>
					</a>
				</div>
			</div>
		</template>
		<template #content>
			{{ company.description }}
		</template>
	</Card>

	<div class="mt-16 flex-1">
		<span class="font-medium text-xl">There are {{ jobs.data.length }} jobs available!</span>

		<div class="space-y-12 mt-5">
			<JobPreview v-for="job in jobs.data" :job="job"/>
		</div>
	</div>
	<Paginator :paginator="jobs"/>
</template>
