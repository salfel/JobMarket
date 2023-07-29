<?php

use App\Models\User;
use function Livewire\Volt\{rules, state};

state(name: '', email: '', password: '', password_confirmation: '');

rules([
	'name' => 'required|min:3',
	'email' => 'required|email|unique:users,email',
	'password' => 'required|min:6|confirmed',
	'password_confirmation' => 'required'
])
	->attributes([
		'password_confirmation' => 'password confirmation'
	]);

$store = function () {
	$validated = $this->validate();

	$user = User::create($validated);
	Auth::login($user);

	return $this->redirect('/');
}

?>

<x-auth-layout>
	@volt
	<form wire:submit="store" class="w-96 flex flex-col gap-5">
		<h1 class="text-xl font-semibold text-center">Register</h1>

		<x-elements.input-field wire:model="name" name="Name" class="w-full"/>
		<x-elements.input-field wire:model="email" name="Email" class="w-full"/>
		<x-elements.input-field type="password" wire:model="password" name="Password" class="w-full"/>
		<x-elements.input-field type="password" wire:model="password_confirmation" name="Confirm Password"
								class="w-full"/>

		<x-elements.button type="submit">
			Submit
		</x-elements.button>

		<p class="text-sm mt-3 text-center text-gray-800">
			Already registered?
			<a href="/auth/login" wire:navigtate class="font-medium text-sky-500 hover:underline">
				Login instead!
			</a>
		</p>
	</form>
	@endvolt
</x-auth-layout>

