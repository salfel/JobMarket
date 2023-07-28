<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public ?string $search = null;

    public function mount(Request $request)
    {
        $this->search = $request->get('search');
    }

    public function render()
    {
        $companies = Company::search($this->search);

        return view('livewire.companies.index', [
            'companies' => $companies->paginate(10)->withQueryString()->appends([
                'query' => null, 'search' => $this->search,
            ]),
        ]);
    }
}
