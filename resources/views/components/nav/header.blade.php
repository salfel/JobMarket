<header class="sticky top-0 left-0 flex items-center justify-around h-16 bg-white">
	<a href="/"
	   class="text-2xl font-bold text-sky-500 tracking-tighter">JobMarket</a>

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
				<x-icon.user-circle-solid class="text-gray-700"/>
			</x-slot:button>
		</x-modal>
	@else
		<a href="/auth/login" wire:navigate class="font-medium hover:text-sky-500 hover:underline">
			Login
		</a>
	@endauth
</header>
