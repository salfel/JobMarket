<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Form;

#[Layout('components.layouts.auth')]
class RegisterForm extends Form
{
    #[Rule(['required', 'min:3'])]
    public string $name = '';

    #[Rule(['required', 'email', 'unique:users,email'])]
    public string $email = '';

    #[Rule(['required', new Password(8), 'confirmed'])]
    public string $password = '';

    #[Rule(['required'])]
    public string $password_confirmation = '';

    public function store(): void
    {
        $validated = $this->validate();

        $user = User::create($validated);
        Auth::login($user);

        parent::getComponent()->redirectRoute('home');
    }
}
