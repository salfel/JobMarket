@php
	if (isset($class)) {
        $attributes['class'] = importantClasses($class);
	}
@endphp
<input
	{{ $attributes->merge([
		'class' => 'w-full px-3 py-1.5 ring-1 ring-gray-300 focus:ring-2 focus:ring-cyan-500 focus:outline-none rounded-md',
		'type' => 'text'
	]) }}
>
