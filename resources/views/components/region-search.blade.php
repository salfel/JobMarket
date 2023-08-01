<div class="relative flex-1 basis-56" x-data="{
	open: false,
	region: '',
	regions: ['{{ implode("','", config('constants.regions')) }}']
}">
	<x-elements.input-field
		wire:model="form.region" name="Region" container="w-full"
		@focusin="open = true" @focusout="open = false" x-model="region"
	/>

	<x-dropdown.box x-show="open" class="!w-full !left-0 !mt-0 bg-white">
		<template x-for="reg in regions" :key="reg">
			<x-dropdown.item as="button" @click="region = reg">
				<span x-text="reg"></span>
			</x-dropdown.item>
		</template>
	</x-dropdown.box>
</div>
