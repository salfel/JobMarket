<script setup lang="ts">

defineProps([
    'name',
    'value',
    'error',
	'container'
])

defineEmits(['update:value'])

</script>

<template>
    <label :class="container">
        <span class="block mb-1 text-sm text-medium">{{ name }}</span>
        <slot>
            <input
                    :value="value"
                    @input="$emit('update:value', $event.target?.value)"
                    class="w-full px-3 py-1.5 ring-1 ring-gray-300 focus:ring-2 focus:ring-cyan-500 focus:outline-none rounded-md"
                    type="text"
                    v-bind="$attrs"
            />
        </slot>
        <span
                v-if="error"
                class="block text-red-500 text-sm mt-1"
        >
			{{ error }}</span>
    </label>
</template>
