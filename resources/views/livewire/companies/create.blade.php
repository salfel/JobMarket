<x-card>
	<form wire:submit="store" class="flex-1 flex flex-col gap-3 [&_input]:w-full">
		<x-elements.input-field wire:model="form.name" name="Name"/>
		<x-elements.input-field name="Description">
			<x-slot:input>
				<textarea
					class="w-full max-h-40 px-3 py-1.5 ring-1 ring-gray-300 focus:ring-2 focus:ring-cyan-500 focus:outline-none rounded-md"
					wire:model="form.description"></textarea>
			</x-slot:input>
		</x-elements.input-field>
		<div class="flex flex-wrap justify-between gap-5 [&_label]:basis-56 [&_label]:flex-1">
			<x-elements.input-field wire:model="form.email" name="Email"/>
			<x-elements.input-field type="tel" x-mask="+99 9999-999-999" wire:model="form.phone" name="Phone"/>

			<x-elements.input-field wire:model="form.website" name="Website"/>
		</div>
		<div>
			<x-elements.input-field wire:model="form.logo" name="Logo">
				<x-slot:input>
					<x-elements.button type="button" wire:click="clickFileUpload">
						upload
					</x-elements.button>
					<input type="file" id="fileInput" wire:model="form.logo" class="hidden">
				</x-slot:input>
			</x-elements.input-field>
		</div>
		<div class="flex flex-wrap justify-between gap-5 [&_label]:basis-56 [&_label]:flex-1">
			<x-region-search/>
			<x-elements.input-field wire:model="form.location" name="Location"/>
		</div>
		<x-elements.button type="submit" class="w-full">
			Submit
		</x-elements.button>
	</form>
</x-card>
