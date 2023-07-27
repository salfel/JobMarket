<x-layouts.app>
	@auth('web')
		<div>
			@foreach($user?->companies as $company)
				<div>{{ $company->name }}</div>
			@endforeach
		</div>
	@else
		You are not logged in yet
	@endauth
</x-layouts.app>
