@props(['disabled' => false, 'as' => 'button'])

<{{ $as }}
{{ $attributes->merge([
	'class' => 'px-3 py-1.5 ring-1 ring-gray-300 focus:bg-gray-50 ' . ($disabled ? 'bg-gray-200 cursor-not-allowed' : '')
]) }}
>
{{ $slot }}
</{{ $as }}>
