<button
	{{ $attributes->merge(['class' => 'w-full px-3 py-1.5 bg-cyan-400 hover:bg-cyan-500 text-gray-800 rounded-md active:scale-[98%] transition-transform']) }}
>
	{{ $slot }}
</button>
