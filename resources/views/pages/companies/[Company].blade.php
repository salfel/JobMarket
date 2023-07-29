@props(['company'])
@php /** @var App\Models\Company $company */ @endphp

<x-app-layout>
	<div>
		{{ $company->name }}
	</div>
</x-app-layout>
