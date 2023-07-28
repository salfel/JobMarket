@props(['paginator'])
@php
	/** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $paginator */
	$items = $paginator->getUrlRange($paginator->currentPage() - 2, $paginator->currentPage() + 2);
	$pages = $paginator->lastPage();
@endphp

@if($paginator->hasPages())
	<div class="flex items-center">
		<a href="{{ $paginator->getUrlRange(1, 1)[1] }}"
		   wire:navigate
		   class="{{ $paginator->currentPage() == 1 ? 'pointer-events-none bg-gray-100 select-none' : '' }} {{ config('styles.button-simple') }} rounded-l-md">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				 stroke="currentColor" class="w-5">
				<path stroke-linecap="round" stroke-linejoin="round"
					  d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5"/>
			</svg>
		</a>

		@foreach($items as $item => $link)
			@continue($item < 1 || $item > $pages)
			<a href="{{ $link }}"
			   wire:navigate
			   class="{{ config('styles.button-simple') . ($item == $paginator->currentPage() ? ' font-medium bg-sky-500 text-white border-sky-500 pointer-events-none': '') }}">
				<span class="inline-grid place-items-center text-sm h-5 w-5 ">{{ $item }}</span>
			</a>
		@endforeach


		<a href="{{ $paginator->getUrlRange($pages, $pages)[$pages] }}"
		   wire:navigate
		   class="{{ $paginator->currentPage() == $paginator->lastPage() ? 'pointer-events-none bg-gray-100 select-none' : '' }} {{ config('styles.button-simple') }} rounded-r-md">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				 stroke="currentColor" class="w-5">
				<path stroke-linecap="round" stroke-linejoin="round"
					  d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"/>
			</svg>
		</a>
	</div>
@endif
