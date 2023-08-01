<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CompanyForm extends Form
{
    #[Rule(['required', 'unique:companies,name', 'min:3'])]
    public string $name = '';

    #[Rule(['required', 'min:12'])]
    public string $description = '';

    #[Rule(['required', 'unique:company,email', 'email'])]
    public string $email = '';

    #[Rule(['required'])]
    public string $phone = '';

    #[Rule(['required', 'url'])]
    public string $website = '';

    #[Rule(['required', 'image', 'size:512'])]
    public $logo = null;

    #[Rule(['required'])]
    public string $region = '';

    #[Rule(['required'])]
    public string $location = '';

    public function store(): void
    {
        parent::validate();
    }
}
