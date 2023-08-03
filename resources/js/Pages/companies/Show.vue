<script setup lang="ts">
	import AppLayout from "@/layouts/AppLayout.vue";
	import { MapPinIcon, GlobeAltIcon, EnvelopeIcon, PhoneIcon } from '@heroicons/vue/24/solid'
	import type {Company, User} from "@/utils/types";
	import route from "ziggy-js";

	defineProps<{
		company: Company,
		user: User
	}>();

	defineOptions({ layout: AppLayout})
</script>

<template>
	<div>
		<div class="flex gap-5">
			<img :src="company.logo" :alt="company.name" class="h-24 w-24"/>
			<div>
				<div class="max-w-2xl">
					<div class="flex justify-between items-center mb-1">
						<h1 class="text-2xl font-semibold">{{ company.name }}</h1>
						<div class="flex items-center gap-1 text-blue-600">
							<MapPinIcon class="h-6 w-6" />
							<span>{{ company.location }}</span>
						</div>
					</div>
					<p>{{ company.description }}</p>
				</div>
				<div class="flex items-center gap-24 mt-3">
					<a :href="company.website" class="font-medium hover:text-blue-500">
						<GlobeAltIcon class="w-5 h-5 inline-block mr-2" />

						<span class="align-middle">Website</span>
					</a>
					<a :href="'mailto:' + company.email" class="font-medium hover:text-blue-500">
						<EnvelopeIcon class="w-5 h-5 inline-block mr-2" />

						<span class="align-middle">Email</span>
					</a>
					<a :href="'tel:' + company.phone" class="font-medium hover:text-blue-500">
						<PhoneIcon class="w-5 h-5 inline-block mr-2" />

						<span class="align-middle">Phone</span>
					</a>
				</div>
			</div>
		</div>

		<div v-if="user.id === company.owner_id" class="mt-10">
			<Link :href="route('companies.edit', [company.id])">
				<Button label="Edit" text/>
			</Link>

			<Link as="button" method="DELETE" :href="route('companies.destroy', [company.id])">
				<Button label="Delete" severity="danger" text/>
			</Link>
		</div>

		<span class="inline-block text-lg font-medium mt-16">There are no listings available</span>
	</div>
</template>
