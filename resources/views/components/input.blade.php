<label>
    <span class="block mb-1">{{ $name }}</span>
    <input
        type="text"
        class="w-full px-3 py-1.5 ring-1 ring-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-500 rounded-md"
        {{ $attributes }}
    />
    @error($attributes['wire:model'])
        <span class="block text-red-500 text-sm mt-1">{{ $message }}</span>
    @enderror
</label>
