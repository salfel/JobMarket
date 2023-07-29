<?php

use function Livewire\Volt\{rules, state};

state(email: '', password: '');

rules([
	'email' => 'required|email',
	'password' => 'required'
]);

$authenticate = function () {
	$validated = $this->validate();

	if (Auth::attempt($validated)) {
		Session::regenerate();

		$this->redirect('/');
	} else {
		$this->addError('email', 'Wrong email or password');
		$this->reset('password');
	}
}

?>

<x-auth-layout>
	@volt
	<form wire:submit.prevent="authenticate" class="w-96 flex flex-col gap-5">
		<h1 class="text-2xl font-semibold text-center">Login</h1>

		<x-elements.input-field wire:model="email" name="Email" class="w-full"/>
		<x-elements.input-field wire:model="password" type="password" name="Password" class="w-full"/>

		<x-elements.button type="submit">
			Logie
		</x-elements.button>

		<p class="text-sm mt-3 text-center text-gray-800">Not logged in yet?
			<a href="/auth/register" wire:navigtate class="font-medium text-sky-500 hover:underline">
				Register instead!
			</a>
		</p>
	</form>
	@endvolt
</x-auth-layout>

