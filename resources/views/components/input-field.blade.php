@props(['name'])

<label>
	<span class="block mb-1 text-sm text-medium">{{ $name }}</span>
	<input {{ $attributes->merge(['class' => config('styles.input')]) }} />
	@error( $attributes['wire:model'] )
		<span class="block text-red-500 text-sm mt-1">{{ $message }}</span>
	@enderror
</label>
