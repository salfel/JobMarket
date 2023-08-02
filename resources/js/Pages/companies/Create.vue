<script lang="ts" setup>
import AppLayout from "@/layouts/AppLayout.vue";
import FormInput from "@/components/FormInput.vue";
import {useForm} from "@inertiajs/vue3";

defineOptions({layout: AppLayout})

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
</script>

<template>
    <form class="flex flex-col gap-3">
        <FormInput name="Name" :error="form.errors.name" v-model:value="form.name"/>
        <FormInput name="Description" :error="form.errors.description">
            <textarea v-model="form.description"
                      class="w-full px-3 py-1.5 ring-1 ring-gray-300 focus:ring-2 focus:ring-cyan-500 focus:outline-none rounded-md"></textarea>
        </FormInput>

        <div class="flex flex-wrap gap-5">
            <FormInput container="flex-1 basis-56" name="Website" :error="form.errors.website"
                       v-model:value="form.website"/>
            <FormInput container="flex-1 basis-56" name="Email" :error="form.errors.email" v-model:value="form.email"/>
            <FormInput container="flex-1 basis-56" name="Phone" :error="form.errors.phone" v-model:value="form.phone"/>
        </div>
        <div class="flex flex-wrap gap-5">

            <FormInput container="flex-1 basis-56" name="Location" :error="form.errors.location"
                       v-model:value="form.location"/>
        </div>
    </form>
</template>
