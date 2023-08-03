<script setup lang="ts">
	import { Link } from '@inertiajs/vue3'
	import {Pagination} from "@/utils/types";

	const props = defineProps<{
		paginator: Pagination<any>
	}>()
	console.log(props.paginator)
</script>

<template>
	<div class="flex items-center justify-center mt-5">
		<Link
			v-for="link in paginator.links"
			v-html="link.label"
			:href="link.url ?? '#'"
			:class="{
				'px-3 py-1.5 ring-1 ring-gray-300 hover:bg-blue-200 focus:bg-gray-50': true,
				'font-medium bg-blue-500 text-white border-blue-500': link.active,
				'pointer-events-none bg-gray-100': link.url == null
			}"
		/>
	</div>
</template>
