<?php

use function Livewire\Volt\{rules, state, usesFileUploads};
use function Laravel\Folio\{middleware};
use Illuminate\Validation\Rule;

usesFileUploads();

state(
	name: '',
	description: '',
	phone: '',
	email: '',
	website: '',
	region: '',
	location: '',
	logo: ''
);

rules([
	'name' => ['required', 'min:3'],
	'description' => ['required'],
	'phone' => ['required'],
	'email' => ['required', 'unique:users,email', 'unique:companies,email', 'email'],
	'website' => ['required', 'url'],
	'region' => ['required', Rule::in(config('constants.regions'))],
	'location' => ['required', 'min:3'],
	'logo' => ['required', 'image', 'size:512']
]);

middleware(['auth']);

$store = function () {
	$this->validate();
	$this->logo->store('photos');
};

$clickFileUpload = function () {
	$this->js('document.querySelector("#fileInput").click()');
}

?>

<x-layouts.app title="Create Company">
	@volt
	<x-card>
		<form wire:submit="store" class="flex-1 flex flex-col gap-3 [&_input]:w-full">
			<x-elements.input-field wire:model="name" name="Name"/>
			<x-elements.input-field name="Description">
				<x-slot:input>
				<textarea
					class="w-full max-h-40 px-3 py-1.5 ring-1 ring-gray-300 focus:ring-2 focus:ring-cyan-500 focus:outline-none rounded-md"
					wire:model="description"></textarea>
				</x-slot:input>
			</x-elements.input-field>
			<div class="flex flex-wrap justify-between gap-5 [&_label]:basis-56 [&_label]:flex-1">
				<x-elements.input-field wire:model="email" name="Email"/>
				<x-elements.input-field type="tel" x-mask="+99 9999-999-999" wire:model="phone" name="Phone"/>

				<x-elements.input-field wire:model="website" name="Website"/>
			</div>
			<div>
				<x-elements.input-field wire:model="logo" name="Logo">
					<x-slot:input>
						<x-elements.button type="button" wire:click="clickFileUpload">
							upload
						</x-elements.button>
						<input type="file" id="fileInput" wire:model="logo" class="hidden" wire:model="logo">
					</x-slot:input>
				</x-elements.input-field>
			</div>
			<div class="flex flex-wrap justify-between gap-5 [&_label]:basis-56 [&_label]:flex-1">
				<livewire:region-search :region="$this->region"/>
				<x-elements.input-field wire:model="location" name="Location"/>
			</div>
			<x-elements.button type="submit" class="w-full">
				Submit
			</x-elements.button>
		</form>
	</x-card>
	@endvolt
</x-layouts.app>
