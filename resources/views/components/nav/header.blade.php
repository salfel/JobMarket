<header class="flex items-center justify-around h-16 bg-white">
	<span class="text-2xl font-bold text-sky-500 tracking-tighter pointer-events-none">JobMarket</span>

	<nav>
		<ul class="flex items-center justify-around gap-10">
			<li>
				<a href="/companies/create" wire:navigate class="font-medium hover:text-sky-500 hover:underline">
					Start Listing
				</a>
			</li>
			<li>
				<a href="/jobs" wire:navigate class="font-medium hover:text-sky-500 hover:underline">
					Jobs
				</a>
			</li>
			<li>
				<a href="/companies" wire:navigate class="font-medium hover:text-sky-500 hover:underline">
					Companies
				</a>
			</li>
		</ul>
	</nav>
	@auth('web')
		<x-modal>
			<x-slot:button>
				@if($user->avatar)
					<img
						src="{{ $user->avatar }}"
						alt="{{ $user->name }}"
						class="h-7 w-7 rounded-full"
					/>
				@endif
			</x-slot:button>
		</x-modal>
	@else
		<a href="{{ route('login') }}" wire:navigate class="font-medium hover:text-sky-500 hover:underline">
			Login
		</a>
	@endauth
</header>
