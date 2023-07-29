@props(['paginator'])
@php
	/** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $paginator */
	$items = $paginator->getUrlRange($paginator->currentPage() - 2, $paginator->currentPage() + 2);
	$pages = $paginator->lastPage();
@endphp

@if($paginator->hasPages())
	<div class="flex items-center justify-center mt-5">
		<x-elements.simple-button
			as="a"
			href="{{ $paginator->getUrlRange(1, 1)[1] }}"
			wire:navigate
			@class(['rounded-l-md', 'pointer-events-none bg-gray-100 select-none' => $paginator->currentPage() === 1])
		>
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				 stroke="currentColor" class="w-6">
				<path stroke-linecap="round" stroke-linejoin="round"
					  d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5"/>
			</svg>
		</x-elements.simple-button>

		@foreach($items as $item => $link)
			@continue($item < 1 || $item > $pages)
			<x-elements.simple-button
				as="a"
				href="{{ $link }}"
				wire:navigate
				@class(['font-medium bg-sky-500 text-white border-sky-500 pointer-events-none' => $item === $paginator->currentPage()])
			>
				<span class="inline-grid place-items-center text-sm h-5 w-5">{{ $item }}</span>
			</x-elements.simple-button>
		@endforeach


		<x-elements.simple-button
			as="a"
			href="{{ $paginator->getUrlRange($pages, $pages)[$pages] }}"
			wire:navigate
			@class(['rounded-r-md', 'pointer-events-none bg-gray-100 select-none' => $paginator->currentPage() === $paginator->lastPage()])
		>
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				 stroke="currentColor" class="w-6">
				<path stroke-linecap="round" stroke-linejoin="round"
					  d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"/>
			</svg>
		</x-elements.simple-button>
	</div>
@endif
