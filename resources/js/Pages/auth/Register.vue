<script lang="ts" setup>
import AuthLayout from "@/layouts/AuthLayout.vue";
import { useForm } from "@inertiajs/vue3";
import route from "ziggy-js";

defineOptions({ layout: AuthLayout });

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

		<label class="flex flex-col gap-2">
			<span>Name</span>
			<InputText v-model="form.name" />
			<small v-if="form.errors.name" class="text-red-500">{{
				form.errors.name
			}}</small>
		</label>

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

		<label class="flex flex-col gap-2">
			<span>Password Confirmation</span>
			<Password
				v-model="form.password_confirmation"
				:feedback="false"
				inputClass="w-full"
				toggleMask
			/>
			<small
				v-if="form.errors.password_confirmation"
				class="text-red-500"
				>{{ form.errors.password_confirmation }}</small
			>
		</label>

		<Button type="submit" class="bg-blue-500" label="Register" />

		<p class="text-sm mt-3 text-center text-gray-800">
			Already logged in?
			<Link
				:href="route('auth.login')"
				class="font-medium text-blue-500 hover:underline"
			>
				Login instead!
			</Link>
		</p>
	</form>
</template>
