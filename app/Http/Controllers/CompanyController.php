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
        return Inertia::render('companies/Index', [
            'companies' => fn (
            ) => Company::search($request->get('q'))->when('region', $request->get('region'))->paginate(10)->withQueryString()->appends(['query' => null]),
        ]);
    }

    public function create()
    {
        Gate::authorize('create-company', Company::class);

        return Inertia::render('companies/Create');
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
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/logos');
            $path = '/'.str_replace('public', 'storage', $path);
        }
        $attributes = $request->validated();
        if ($path != null) {
            $attributes['logo'] = $path;
        }
        $company->update($attributes);

        return to_route('companies.show', [$company->id]);
    }

    public function destroy(Company $company)
    {
        Gate::authorize('delete-company', $company);
        Company::delete();

        return to_route('companies.index');
    }
}
