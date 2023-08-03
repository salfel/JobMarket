<script lang="ts" setup>
import AuthLayout from "@/layouts/AuthLayout.vue";
import { useForm } from "@inertiajs/vue3";
import route from "ziggy-js";

defineOptions({ layout: AuthLayout });

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
			//@ts-ignore
			setTimeout(() => form.clearErrors(...Object.keys(errors)), 3000);
		},
	});
}
</script>

<template>
	<form class="w-96 flex flex-col gap-5" @submit.prevent="handleSubmit">
		<h1 class="text-2xl font-semibold text-center">Login</h1>

		<label class="flex flex-col gap-2">
			<span>Email</span>
			<InputText v-model="form.email" />
			<small v-if="form.errors.email" class="text-red-500">{{
				form.errors.email
			}}</small>
		</label>

		<label class="flex flex-col gap-2">
			<span>Password</span>
			<Password
				v-model="form.password"
				:feedback="false"
				inputClass="w-full"
				toggleMask
			/>
			<small v-if="form.errors.password" class="text-red-500">{{
				form.errors.password
			}}</small>
		</label>

		<Button type="submit" class="bg-blue-500" label="Login" />

		<p class="text-sm mt-3 text-center text-gray-800">
			Not logged in yet?
			<a
				:href="route('auth.register')"
				class="font-medium text-blue-500 hover:underline"
			>
				Register instead!
			</a>
		</p>
	</form>
</template>
