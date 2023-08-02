<script lang="ts" setup>
import AuthLayout from "@/layouts/AuthLayout.vue";
import { useForm } from "@inertiajs/vue3";
import FormInput from "@/components/FormInput.vue";
import route from "ziggy-js";

defineOptions({ layout: AuthLayout })

let form = useForm({
	name: null,
	email: null,
	password: null,
	password_confirmation: null,
});


function handleSubmit() {
	form.post("/auth/register", {
		onError(errors) {
			//@ts-ignore
			setTimeout(() => form.clearErrors(...Object.keys(errors)), 3000);
		},
	});
}
</script>

<template>
	<form class="w-96 flex flex-col gap-5" @submit.prevent="handleSubmit">
		<h1 class="text-2xl font-semibold text-center">Register</h1>

		<FormInput name="Name" v-model:value="form.name" :error="form.errors.name" />
        <FormInput name="Email" v-model:value="form.email" :error="form.errors.email" />
        <FormInput name="Password" v-model:value="form.password" :error="form.errors.password" type="password" />
        <FormInput name="Password Confirmation" v-model:value="form.password_confirmation" :error="form.errors.password_confirmation" type="password" />


		<button
			class="w-full px-3 py-1.5 text-white font-medium bg-cyan-400 hover:bg-cyan-500 rounded-md active:scale-[98%] transition-transform"
			type="submit"
		>
			Register
		</button>

		<p class="text-sm mt-3 text-center text-gray-800">
			Already logged in?
			<a
				class="font-medium text-sky-500 hover:underline"
				:href="route('auth.login')"
			>
				Login instead!
			</a>
		</p>
	</form>
</template>
