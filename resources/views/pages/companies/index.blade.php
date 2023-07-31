<?php

use App\Models\Company;
use function Livewire\Volt\{computed, state, usesPagination};

usesPagination();

state(search: '')->url();

$companies = computed(function () {
	return Company::search($this->search)->paginate(10)->withQueryString()->appends(['query' => null]);
});
?>

<x-layouts.app>
	@volt('companies-index')
	<div>
		<x-elements.input wire:model.live="search" placeholder="Search companies..." class="w-80"/>
		<div class="space-y-5 mt-3">
			@foreach($this->companies as $company)
				<x-company-preview :wire:key="$company->name" :company="$company"/>
			@endforeach
		</div>
		<x-pagination :paginator="$this->companies"/>
	</div>
	@endvolt
</x-layouts.app>
