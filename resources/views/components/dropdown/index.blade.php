<div class="relative" x-data="{
	show: false,
	toggle() {
		if (this.show) {
			return this.close()
		}
		this.show = true;
	},
	close() {
		this.show = false
	}
}">
	<button @click="toggle()">
		<x-icon.user-circle-solid/>
	</button>

	<x-dropdown.box x-show="show" @click.outside="close">
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
	</x-dropdown.box>
</div>
