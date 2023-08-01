<div class="w-full">
	<div class="w-full">
		<x-elements.input wire:model.live="search" placeholder="Search companies..." class="w-80"/>
	</div>
	<div class="space-y-5 mt-3">
		@foreach($companies as $company)
			<x-company-preview :wire:key="$company->name" :company="$company"/>
		@endforeach
	</div>
	<x-pagination :paginator="$companies"/>
</div>
