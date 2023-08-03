<script lang="ts" setup>
import AppLayout from "@/layouts/AppLayout.vue";
import { AutoCompleteCompleteEvent } from "primevue/autocomplete";
import {usePage, useForm} from "@inertiajs/vue3";
import { regions as _regions } from "@/utils/constants";
import route from "ziggy-js";
import {onMounted, ref} from "vue";
import {Company} from "@/utils/types";
import {FileUploadSelectEvent} from "primevue/fileupload";

defineOptions({ layout: AppLayout });

const props = defineProps<{
	company: Company
}>()

const regions = ref(_regions);
let form = useForm(props.company);

function searchRegion(event: AutoCompleteCompleteEvent) {
	regions.value = _regions.filter((region: string) =>
		region.toLowerCase().includes(event.query.toLowerCase())
	);
}

async function onSelect(e: FileUploadSelectEvent) {
	const formData = new FormData()
	formData.append('logo', e.files[0])
    //@ts-ignore
	formData.append('_token', usePage().props._token)
	const response = await fetch(route('upload'), {
		method: 'POST',
		body: formData
	})
    form.logo = (await response.json()).path
}

function handleSubmit() {
	form.patch(route('companies.update', [props.company.id]))
}

</script>

<template>
	<form
		class="flex flex-col gap-3"
		@submit.prevent="handleSubmit"
	>
		<label class="flex flex-col gap-2">
			<span>Name</span>
			<InputText v-model="form.name" />
			<small v-if="form.errors.name" class="text-red-500">{{
				form.errors.name
			}}</small>
		</label>

		<div class="flex flex-col gap-2">
			<label for="name">Description</label>
			<Textarea v-model="form.description" rows="3" />
			<small v-if="form.errors.description" class="text-red-500">{{
				form.errors.description
			}}</small>
		</div>

		<div class="flex flex-wrap gap-5 [&_label]:flex-1 [&_label]:basis-56">
			<label class="flex flex-col gap-2">
				<span>Website</span>
				<InputText v-model="form.website" />
				<small v-if="form.errors.website" class="text-red-500">{{
					form.errors.website
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
				<span>Phone</span>
				<InputText v-model="form.phone" />
				<small v-if="form.errors.phone" class="text-red-500">{{
					form.errors.phone
				}}</small>
			</label>
		</div>
		<div class="flex flex-col items-start gap-2">
			<span>Logo</span>
			<FileUpload mode="basic" accept="image/*" @select="onSelect" />
			<small v-if="form.errors.logo" class="text-red-500">{{
				form.errors.logo
			}}</small>
		</div>
		<div class="flex flex-wrap gap-5 [&_label]:flex-1 [&_label]:basis-56">
			<label class="flex flex-col gap-2">
				<span>Region</span>
				<AutoComplete
					v-model="form.region"
					:suggestions="regions"
					dropdown
					dropdown-class="bg-blue-500"
					inputClass="w-full"
					@complete="searchRegion"
				/>
				<small v-if="form.errors.region" class="text-red-500">{{
					form.errors.region
				}}</small>
			</label>
			<label class="flex flex-col gap-2">
				<span>Location</span>
				<InputText v-model="form.location" />
				<small v-if="form.errors.location" class="text-red-500">{{
					form.errors.location
				}}</small>
			</label>
		</div>

		<Button class="bg-blue-500 mt-3" label="Update Company" type="submit" />
	</form>
</template>
