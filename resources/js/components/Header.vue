<script lang="ts" setup>
import { Link, usePage } from "@inertiajs/vue3";
import Dropdown from "@/components/Dropdown.vue";
import route from "ziggy-js";
</script>

<template>
	<header
		class="sticky top-0 left-0 flex items-center justify-around h-16 bg-white"
	>
		<Link class="text-2xl font-bold text-sky-500 tracking-tighter" href="/"
			>JobMarket
		</Link>

		<nav>
			<ul class="flex items-center justify-around gap-10">
				<li>
					<Link
						class="font-medium hover:text-sky-500 hover:underline"
						:href="route('companies.create')"
					>
						Start Listing
					</Link>
				</li>
				<li>
					<Link
						class="font-medium hover:text-sky-500 hover:underline"
						href="/jobs"
					>
						Jobs
					</Link>
				</li>
				<li>
					<Link
						:href="route('companies.index')"
						class="font-medium hover:text-sky-500 hover:underline"
					>
						Companies
					</Link>
				</li>
			</ul>
		</nav>
		<Dropdown v-if="usePage().props.user" />
		<Link
			v-else
			class="font-medium hover:text-sky-500 hover:underline"
			href="/auth/login"
		>
			Login
		</Link>
	</header>
</template>

<style scoped></style>
