@props(['company'])
@php /** @var \App\Models\Company $company */ @endphp

<x-card class="grid grid-cols-[auto_1fr] space-x-3">
	<img src="{{ $company->logo }}" alt="{{ $company->name }}" class="w-16 h-16"/>
	<div class="">
		<div>
			<h3 class="text-lg font-medium">{{ $company->name }}</h3>
			<p>{{ $company->description }}</p>
		</div>
		<div class="flex items-center gap-24 mt-3">
			<a href="mailto:{{ $company->email }}">
				Email
			</a>
			<a href="{{ $company->website }}">
				Website
			</a>
			<a href="tel:{{ $company->phone }}">
				Phone
			</a>
		</div>
	</div>

</x-card>
