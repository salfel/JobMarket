<?php

namespace App\Livewire\Companies;

use App\Livewire\Forms\CompanyForm;
use Livewire\Component;

class Create extends Component
{
    public string $region = '';

    public CompanyForm $form;

    public function store()
    {
        $this->form->store();
    }

    public function render()
    {
        return view('livewire.companies.create');
    }
}
