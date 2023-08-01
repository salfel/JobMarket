<div class="relative flex-1 basis-56" x-data="{
	open: false,
	region: '',
	regions: [{{ "'".implode("','", config('constants.regions'))."'" }}]
}" @click.outside="open = false">
	<x-elements.input-field @focusin="open = true" name="Region"
							wire:model="form.region" id="region" autocomplete="off" x-model="region"
	/>
	<div x-text="region"></div>

	<x-dropdown.box class="!bg-white !left-0 !w-full" x-show="open">
		<template x-for="reg in regions" :key="reg">
			<x-dropdown.item as="button">
				<span x-text="reg"></span>
			</x-dropdown.item>
		</template>
	</x-dropdown.box>
</div>
