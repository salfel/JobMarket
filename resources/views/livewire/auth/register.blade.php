<form wire:submit="store" class="w-96 flex flex-col gap-5">
	<h1 class="text-xl font-semibold text-center">Register</h1>

	<x-input-field wire:model="form.name" name="Name"/>
	<x-input-field wire:model="form.email" name="Email"/>
	<x-input-field type="password" wire:model="form.password" name="Password"/>
	<x-input-field type="password" wire:model="form.password_confirmation" name="Confirm Password"/>

	<button type="submit" class="{{ config('styles.button') }}">
		Register
	</button>
</form>
