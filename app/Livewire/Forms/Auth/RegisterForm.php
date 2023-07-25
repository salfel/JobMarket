<?php

namespace App\Livewire\Forms\Auth;

use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Mockery\Generator\StringManipulation\Pass\Pass;

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
