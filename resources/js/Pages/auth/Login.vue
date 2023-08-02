<script>
import AuthLayout from "@/layouts/AuthLayout.vue";

export default {
	layout: AuthLayout,
};
</script>

<script setup>
import { useForm } from "@inertiajs/vue3";

let form = useForm({
	email: null,
	password: null,
});

function handleSubmit() {
	form.post("/auth/login", {
		onError(errors) {
			if (errors.email === "Invalid Credentials") {
				form.reset("password");
			}
			setTimeout(() => form.clearErrors(...Object.keys(errors)), 3000);
		},
	});
}
</script>

<template>
	<form class="w-96 flex flex-col gap-5" @submit.prevent="handleSubmit">
		<h1 class="text-2xl font-semibold text-center">Login</h1>

		<label>
			<span class="block mb-1 text-sm text-medium">Email</span>
			<input
				v-model="form.email"
				class="w-full px-3 py-1.5 ring-1 ring-gray-300 focus:ring-2 focus:ring-cyan-500 focus:outline-none rounded-md"
				type="text"
			/>
			<span
				v-if="form.errors.email"
				class="block text-red-500 text-sm mt-1"
				>{{ form.errors.email }}</span
			>
		</label>

		<label class="w-full">
			<span class="block mb-1 text-sm text-medium">Password</span>
			<input
				v-model="form.password"
				class="w-full px-3 py-1.5 ring-1 ring-gray-300 focus:ring-2 focus:ring-cyan-500 focus:outline-none rounded-md"
				type="password"
			/>
			<span
				v-if="form.errors.password"
				class="block text-red-500 text-sm mt-1"
				>{{ form.errors.password }}</span
			>
		</label>

		<button
			class="w-full px-3 py-1.5 text-white font-medium bg-cyan-400 hover:bg-cyan-500 rounded-md active:scale-[98%] transition-transform"
			type="submit"
		>
			Login
		</button>

		<p class="text-sm mt-3 text-center text-gray-800">
			Not logged in yet?
			<a
				class="font-medium text-sky-500 hover:underline"
				href="/auth/register"
			>
				Register instead!
			</a>
		</p>
	</form>
</template>
