<form wire:submit.prevent="authenticate" class="w-96 flex flex-col gap-5">
	<h1 class="text-2xl font-semibold text-center">Login</h1>

	<x-elements.input-field wire:model="form.email" name="Email" class="w-full"/>
	<x-elements.input-field wire:model="form.password" type="password" name="Password" class="w-full"/>

	<x-elements.button type="submit">
		Login
	</x-elements.button>

	<p class="text-sm mt-3 text-center text-gray-800">Not logged in yet?
		<a href="/auth/register" wire:navigate class="font-medium text-sky-500 hover:underline">
			Register instead!
		</a>
	</p>
</form>
