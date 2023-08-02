<script lang="ts" setup>
import AppLayout from "@/layouts/AppLayout.vue";
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import AutoComplete, {AutoCompleteCompleteEvent} from "primevue/autocomplete";
import {useForm} from "@inertiajs/vue3";
import {regions as _regions} from "@/utils/constants";
import {ref} from "vue";

defineOptions({layout: AppLayout})

const regions = ref(_regions);

let form = useForm({
    name: '',
    description: '',
    website: '',
    phone: '',
    email: '',
    region: '',
    location: '',
    logo: null
})

function searchRegion(event: AutoCompleteCompleteEvent) {
	regions.value = _regions.filter((region) => region.toLowerCase().includes(event.query.toLowerCase()))
}

</script>

<template>
    <form class="flex flex-col gap-3">
		<label class="flex flex-col gap-2">
			<span>Name</span>
			<InputText v-model="form.name"/>
			<small v-if="form.errors.name" class="text-red-500">{{ form.errors.name }}</small>
		</label>

		<div class="flex flex-col gap-2">
			<label for="name">Description</label>
			<Textarea v-model="form.description" rows="3"/>
			<small v-if="form.errors.description" class="text-red-500">{{ form.errors.description }}</small>
		</div>

        <div class="flex flex-wrap gap-5 [&_label]:flex-1 [&_label]:basis-56">
			<label class="flex flex-col gap-2">
				<span>Website</span>
				<InputText v-model="form.website"/>
				<small v-if="form.errors.website" class="text-red-500">{{ form.errors.website }}</small>
			</label>
			<label class="flex flex-col gap-2">
				<span>Email</span>
				<InputText v-model="form.email"/>
				<small v-if="form.errors.email" class="text-red-500">{{ form.errors.email }}</small>
			</label>
			<label class="flex flex-col gap-2">
				<span>Phone</span>
				<InputText v-model="form.phone"/>
				<small v-if="form.errors.phone" class="text-red-500">{{ form.errors.phone }}</small>
			</label>
		</div>
        <div class="flex flex-wrap gap-5 [&_label]:flex-1 [&_label]:basis-56">
			<label class="flex flex-col gap-2">
				<span>Region</span>
				<AutoComplete v-model="form.region" inputClass="w-full" :suggestions="regions" @complete="searchRegion"/>
				<small v-if="form.errors.region" class="text-red-500">{{ form.errors.region }}</small>
			</label>
			<label class="flex flex-col gap-2">
				<span>Location</span>
				<InputText v-model="form.location"/>
				<small v-if="form.errors.location" class="text-red-500">{{ form.errors.location }}</small>
			</label>
        </div>

		<Button label="Create Company"  />
    </form>
</template>
