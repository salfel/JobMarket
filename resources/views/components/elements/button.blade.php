<button
	{{ $attributes->merge(['class' => 'px-3 py-1.5 text-white font-medium bg-cyan-400 hover:bg-cyan-500 text-gray-800 rounded-md active:scale-[98%] transition-transform']) }}
>
	{{ $slot }}
</button>
