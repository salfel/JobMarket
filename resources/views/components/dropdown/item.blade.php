@props(['as' => 'a'])

<li>
	<{{ $as }} {{ $attributes->merge(['class' => 'flex items-center gap-2 w-full px-3 py-1.5 text-sm hover:bg-gray-100 first-of-type:rounded-t-md last-of-type:rounded-b-md']) }}
	>
	{{ $slot }}
</{{ $as }}>
</li>
