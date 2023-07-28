@props(['company'])
@php /** @var App\Models\Company $company */ @endphp

<div>
	{{ $company->name }}
</div>
