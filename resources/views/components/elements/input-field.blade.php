@props(['name', 'input'])

<label class="w-auto">
	<span class="block mb-1 text-sm text-medium">{{ $name }}</span>
	@if(isset($input))
		{{ $input }}
	@else
		<x-elements.input {{ $attributes }} />
	@endif
	@error( $attributes['wire:model'] ?? $attributes['wire:model.live'])
	<span class="block text-red-500 text-sm mt-1">{{ $message }}</span>
	@enderror
</label>
