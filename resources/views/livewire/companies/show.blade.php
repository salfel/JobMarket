<div>

	<div class="flex gap-5">
		<img src="{{ $company->logo }}" alt="{{ $company->name }}" class="h-24 w-24"/>
		<div>
			<div class="max-w-2xl">
				<div class="flex justify-between items-center mb-1">
					<h1 class="text-2xl font-semibold">{{ $company->name }}</h1>
					<div class="flex items-center gap-1 text-sky-600">
						<x-icon.map-pin-solid size="6"/>
						<span>{{ $company->location }}</span>
					</div>
				</div>
				<p>{{ $company->description }}</p>
			</div>
			<div class="flex items-center gap-24 mt-3">
				<a href="{{ $company->website }}" class="font-medium hover:text-sky-500">
					<x-icon.globe-alt-solid size="5" class="inline-block"/>

					<span class="align-middle">Website</span>
				</a>
				<a href="mailto:{{ $company->email }}" class="font-medium hover:text-sky-500">
					<x-icon.envelope-solid size="5" class="inline-block"/>

					<span class="align-middle">Email</span>
				</a>
				<a href="tel:{{ $company->phone }}" class="font-medium hover:text-sky-500">
					<x-icon.phone-solid size="5" class="inline-block"/>

					<span class="align-middle">Phone</span>
				</a>
			</div>
		</div>
	</div>

	<span class="inline-block text-lg font-medium mt-16">There are no listings available</span>
</div>


