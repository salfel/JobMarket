<div>
	<x-elements.input wire:model.live="search" placeholder="Search companies..." class="w-80" />
	<div>
		@foreach($companies as $company)
			<div>{{ $company->name }}</div>
		@endforeach
	</div>
	<x-pagination :paginator="$companies" />
</div>
