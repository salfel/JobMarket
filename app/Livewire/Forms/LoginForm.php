<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';

    public function authenticate(): void
    {
        $validated = $this->validate();

        if (Auth::attempt($validated)) {
            Session::regenerate();

            parent::getComponent()->redirectRoute('home');
        } else {
            $this->reset('password');
            $this->addError('email', 'Wrong email or password');
        }
    }
}
