<script lang="ts" setup>
import {Link} from '@inertiajs/vue3'
import {Pagination} from "@/utils/types";

const props = defineProps<{
	paginator: Pagination<any>
}>()
const show = props.paginator.total > props.paginator.per_page
</script>

<template>
	<div v-show="show" class="flex items-center justify-center mt-5">
		<Link
			v-for="link in paginator.links"
			:class="{
				'px-3 py-1.5 ring-1 ring-gray-300 hover:bg-blue-200 focus:bg-gray-50': true,
				'font-medium bg-blue-500 hover:bg-blue-500 text-white border-blue-500': link.active,
				'pointer-events-none bg-gray-100': link.url == null
			}"
			:href="link.url ?? '#'"
			v-html="link.label"
		/>
	</div>
</template>
