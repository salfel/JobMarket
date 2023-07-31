<?php

use function Livewire\Volt\{state};

state(show: false);

$toggle = function () {
	$this->show = !$this->show;
};

$close = function () {
	$this->show = false;
};

?>

<div class="relative" x-data>
	<button wire:click="toggle" wire:click.outside="close">
		<x-icon.user-circle-solid/>
	</button>

	@if($this->show)
		<ul class="absolute right-0 mt-3 w-40 rounded-md bg-gray-50 shadow-lg">
			<x-dropdown.item wire:navigate href="/dashboard">
				Dashboard
			</x-dropdown.item>
			<x-dropdown.item wire:navigate href="/settings">
				Settings
			</x-dropdown.item>
			<hr class="divider-y my-1">
			<x-dropdown.item as="form" class="text-red-500" method="POST" action="/auth/logout">
				@csrf
				<button type="submit" class="w-full flex flex-start">Logout</button>
			</x-dropdown.item>
		</ul>
	@endif
</div>
