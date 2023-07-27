<div
	x-data="{
		open: false,
		toggle() {
			if (this.open) {
				return this.close()
			}

			this.$refs.button.focus();
			this.open = true
		},
		close(focusAfter) {
			if (! this.open) return;

			this.open = false;
			focusAfter && focusAfter.focus()
		}
	}"
	x-on:keydown.escape.prevent.stop="close($refs.button)"
	x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
	x-id="['dropdown-button']"
	class="relative"
>
	<button
		x-ref="button"
		x-on:click="toggle()"
		:aria-expanded="open"
		:aria-controls="$id('dropwown-button')"
		type="button"
	>
		{{ $button }}
	</button>

	<div
		x-ref="panel"
		x-show="open"
		x-on:click.outside="close($refs.button)"
		x-transition.origin.top
		:id="$id('dropdown-button')"
		class="absolute right-0 mt-2 w-40 rounded-md bg-white shadow-md"
	>
		<a href="/dashboard" wire:navigate class="flex items-center gap-2 w-full px-3 py-1.5 text-sm hover:bg-gray-100">
			Dashboard
		</a>
		<a href="/settings" wire:navigate class="flex items-center gap-2 w-full px-3 py-1.5 text-sm hover:bg-gray-100">
			Settings
		</a>
		<hr class="divide-y my-1">
		<form action="{{ route('logout') }}" method="POST">
			@csrf
			<button type="submit"
					class="flex items-center gap-2 w-full px-3 py-1.5 text-sm text-red-500 hover:bg-gray-100">
				Logout
			</button>
		</form>
	</div>
</div>
