<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">

	@vite(['resources/css/app.css', 'resources/js/app.js'])
	<title>{{ $title ?? 'Page Title' }}</title>
</head>
<body>
<x-nav.header/>
<main {{ $attributes->merge(['class' => 'pt-3 flex justify-center']) }}>
	<div class="max-w-4xl w-full">
		{{ $slot }}
	</div>
</main>
</body>
</html>
