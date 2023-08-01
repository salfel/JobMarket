<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public string $search = '';

    public function render()
    {
        return view('livewire.companies.index', [
            'companies' => Company::search($this->search)->paginate(10)->withQueryString()->appends(['query' => null]),
        ]);
    }
}
