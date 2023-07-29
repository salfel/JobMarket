@props(['name'])

<label>
	<span class="block mb-1 text-sm text-medium">{{ $name }}</span>
	<x-elements.input {{ $attributes }} />
	@error( $attributes['wire:model'] )
	<span class="block text-red-500 text-sm mt-1">{{ $message }}</span>
	@enderror
</label>
