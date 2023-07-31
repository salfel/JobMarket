<?php

use function Livewire\Volt\{computed, state, usesFileUploads};

state(region: '', show: false);

$regions = computed(function () {
	return array_filter(config('constants.regions'), function (string $region) {
		return str_contains(strtolower($region), $this->region);
	});
});

$changeRegion = function (string $region) {
	$this->region = $region;

	$this->js(sprintf("
        document.querySelector('#region').value = '%s'
   ", $region));
};

$setShow = function ($show = true) {
	$this->show = $show;
}

?>

<div class="relative flex-1 basis-56">
	<x-elements.input-field wire:focus="setShow" wire:click.outside="setShow(false)" name="Region"
							wire:model.live="region" id="region" autocomplete="off" error="region"
	/>

	@if($this->show)
		<x-dropdown.box class="!bg-white !left-0">
			@foreach($this->regions as $region)
				<x-dropdown.item as="button" wire:click.prevent="changeRegion('{{ $region }}')"
								 wire:key="{{ $region }}">
					{{ $region }}
				</x-dropdown.item>
			@endforeach
		</x-dropdown.box>
	@endif
</div>
