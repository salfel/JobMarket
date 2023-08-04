<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::search($request->get('q'))->take(500)->get()->toArray();
        $companies = array_filter($companies,
            fn ($company) => str_contains(strtolower($company['region']), strtolower($request->get('region') ?: '')));
        $companies = paginateArray($companies, 10, path: '/companies');

        return Inertia::render('companies/Index', [
            'companies' => fn () => $companies,
        ]);
    }

    public function show(Company $company)
    {
        return Inertia::render('companies/Show', [
            'company' => $company,
        ]);
    }

    public function edit(Company $company)
    {
        Gate::authorize('update-company', $company);

        return Inertia::render('companies/Edit', [
            'company' => $company,
        ]);
    }

    public function update(CompanyRequest $request, Company $company)
    {
        Gate::authorize('update-company', $company);
        $path = null;
        $attributes = $request->validated();
        $company->update($attributes);

        return to_route('companies.show', [$company->id]);
    }

    public function store(CompanyRequest $request)
    {
        Gate::authorize('create-company', Company::class);
        $path = $request->file('logo')->store('public/logos');
        $attributes = [
            ...$request->validated(),
            'logo' => '/'.str_replace('public', 'storage', $path),
            'owner_id' => Auth::user()->id,
        ];
        $company = Company::create($attributes);

        return to_route('companies.show', [$company->id]);
    }

    public function create()
    {
        Gate::authorize('create-company', Company::class);

        return Inertia::render('companies/Create');
    }

    public function destroy(Company $company)
    {
        Gate::authorize('delete-company', $company);
        Company::delete();

        return to_route('companies.index');
    }
}
