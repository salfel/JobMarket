<div>
	<x-elements.input wire:model.live="search" placeholder="Search companies..." class="w-80"/>
	<div class="space-y-5 mt-3">
		@foreach($companies as $company)
			<x-company-preview :company="$company"/>
		@endforeach
	</div>
	<x-pagination :paginator="$companies"/>
</div>
