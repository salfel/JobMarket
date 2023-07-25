<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Rule;
use Livewire\Form;

class RegisterForm extends Form
{
	#[Rule('required|min:3')]
	public string $name = '';

	#[Rule('required|email|unique:users,email')]
	public string $email = '';

	#[Rule('required|confirmed|min:5')]
	public string $password = '';

	public string $password_confirmation = '';
}
