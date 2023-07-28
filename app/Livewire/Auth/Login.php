<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function authenticate(): void
    {
        $this->form->validate();

        if (Auth::attempt($this->form->all())) {
            Session::regenerate();

            $this->redirectRoute('home');
        } else {
            $this->addError('form.email', 'Wrong email or password');
        }
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
