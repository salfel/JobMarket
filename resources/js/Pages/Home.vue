<script lang="ts" setup>
import AppLayout from "@/layouts/AppLayout.vue";
import { usePage } from "@inertiajs/vue3";

defineOptions({ layout: AppLayout });
</script>

<template>{{ usePage().props.flash?.message }}</template>
