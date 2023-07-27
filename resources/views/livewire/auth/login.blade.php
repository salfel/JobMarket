<form wire:submit="authenticate" class="w-72 flex flex-col gap-5">
	<h1 class="text-xl font-semibold text-center">Login</h1>

	<x-input-field wire:model="form.email" name="Email"/>
	<x-input-field wire:model="form.password" type="password" name="Password"/>

	<button type="submit" class="{{ config('styles.button') }}">
		Login
	</button>
</form>
