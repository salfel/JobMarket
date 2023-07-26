<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\RegisterForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
	public RegisterForm $form;

	public function store()
	{
		$validated = $this->form->validate();

		$user = User::create($validated);

		Auth::login($user);
		return $this->redirectRoute('home');
	}

	#[Layout('components.layouts.auth')]
	public function render()
	{
		return view('livewire.auth.register');
	}
}
