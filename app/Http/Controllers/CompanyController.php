<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('companies/Index', [
            'companies' => fn () => Company::search($request->get('q'))->paginate(10)->withQueryString()->appends(['query' => null]),
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
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
