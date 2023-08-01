<script setup lang="ts">
	import { Link, usePage } from '@inertiajs/vue3'
    import { UserCircleIcon} from "@heroicons/vue/24/solid";
    import Dropdown from "@/components/Dropdown.vue";

    const user = usePage().props.user;

    const dropDownLinks: {name: string, link: string, class?: string}[] = [
        {
            name: 'Dashboard',
            link: '/dashboard',
        },
        {
            name: 'Settings',
            link: '/settings'
        },
        {
            name: 'Logout',
            link: '/auth/logout',
            class: 'text-red-500'
        }
    ]
</script>

<template>
	<header class="sticky top-0 left-0 flex items-center justify-around h-16 bg-white">
	<Link href="/"
	   class="text-2xl font-bold text-sky-500 tracking-tighter">JobMarket</Link>

	<nav>
		<ul class="flex items-center justify-around gap-10">
			<li>
				<Link href="/companies/create"
				   class="font-medium hover:text-sky-500 hover:underline">
					Start Listing
				</Link>
			</li>
			<li>
				<Link href="/jobs" class="font-medium hover:text-sky-500 hover:underline">
					Jobs
				</Link>
			</li>
			<li>
				<Link href="/companies" class="font-medium hover:text-sky-500 hover:underline">
					Companies
				</Link>
			</li>
		</ul>
	</nav>
    <Dropdown v-if="user" />

	<a v-else href="/auth/login" class="font-medium hover:text-sky-500 hover:underline">
		Login
	</a>
</header>
</template>

<style scoped>

</style>
