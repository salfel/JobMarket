<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
	use WithPagination;

	public string $search = '';

    public function render()
    {
		$companies = Company::search($this->search);
        return view('livewire.companies.index', [
			'companies' => $companies->paginate(10)
        ]);
    }
}
