<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Login extends Component
{
    public LoginForm $form;

    #[Rule('required')]
    public $email = '';

    public function authenticate()
    {

        $this->form->authenticate();
    }
}
