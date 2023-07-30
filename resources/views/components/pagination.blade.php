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
			<x-icon.chevron-left/>
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
			<x-icon.chevron-right/>
		</x-elements.simple-button>
	</div>
@endif
