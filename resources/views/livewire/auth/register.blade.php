<form wire:submit="store" class="w-96 flex flex-col gap-5">
	<h1 class="text-xl font-semibold text-center">Register</h1>

	<x-elements.input-field wire:model="form.name" name="Name" class="w-full"/>
	<x-elements.input-field wire:model="form.email" name="Email" class="w-full"/>
	<x-elements.input-field type="password" wire:model="form.password" name="Password" class="w-full"/>
	<x-elements.input-field type="password" wire:model="form.password_confirmation" name="Confirm Password"
							class="w-full"/>

	<x-elements.button type="submit" class="w-full">
		Submit
	</x-elements.button>

	<p class="text-sm mt-3 text-center text-gray-800">
		Already registered?
		<a href="/auth/login" wire:navigtate class="font-medium text-sky-500 hover:underline">
			Login instead!
		</a>
	</p>
</form>
