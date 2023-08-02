<script setup lang="ts">
import AuthLayout from "@/layouts/AuthLayout.vue";
import { useForm } from "@inertiajs/vue3";
import FormInput from "@/components/FormInput.vue";
import route from "ziggy-js";

defineOptions({ layout: AuthLayout })

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

		<FormInput name="Email" v-model:value="form.email" :error="form.errors.email"/>
		<FormInput name="Password" v-model:value="form.password" :error="form.errors.password" type="password" />

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
                :href="route('auth.register')"
			>
				Register instead!
			</a>
		</p>
	</form>
</template>
