<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;

class Index extends Component
{
    public $companies;

    public function mount()
    {
        $this->companies = Company::all();
    }

    public function render()
    {
        return view('livewire.companies.index');
    }
}
