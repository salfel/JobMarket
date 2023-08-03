<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('companies/Index', [
            'companies' => fn (
            ) => Company::search($request->get('q'))->paginate(10)->withQueryString()->appends(['query' => null]),
        ]);
    }

    public function create()
    {
        if (! Gate::allows('create-company', Company::class)) {
            abort(403, 'You are not logged in!');
        }

        return Inertia::render('companies/Create');
    }

    public function store(CompanyRequest $request)
    {

    }

    public function show(Company $company)
    {
        return Inertia::render('companies/Show', [
            'company' => $company,
        ]);
    }

    public function edit(Company $company)
    {
    }

    public function update(Request $request, Company $company)
    {
    }

    public function destroy(Company $company)
    {
    }
}
