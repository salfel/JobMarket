<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{

    public LoginForm $form;
    public User $user;

    public function authenticate() {
        $this->form->validate();

        if (Auth::attempt($this->form->all())) {
            Session::regenerate();

            return to_route('home');
        }
        else {
            $this->addError('form.email', 'Wrong email or password');
            $this->form->password = '';
        }
    }

    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
