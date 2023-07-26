<x-layouts.app>
	<div>
		@foreach($user->companies as $company)
			<div>{{ $company->name }}</div>
		@endforeach
	</div>
</x-layouts.app>
