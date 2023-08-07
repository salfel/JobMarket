<script lang="ts" setup>
import type {Company} from "@/lib/types";
import Card from "";
import route from "ziggy-js";

defineProps<{
	company: Company;
}>();
</script>

<template>
	<Card :pt="{
		content: {
			class: '!py-0 line-clamp-3'
		},
		title: {
			class: 'flex items-center justify-between'
		}
	}">
		<template #title>
			<Link :href="route('companies.show', [company.id])" class="hover:text-blue-500">{{ company.name }}</Link>
			<div class="space-x-2">
				<i class="pi pi-map-marker"></i>
				<span class="font-medium text-base">{{ company.location }}</span>
			</div>
		</template>

		<template #content>
			{{ company.description }}
		</template>
	</Card>
</template>
