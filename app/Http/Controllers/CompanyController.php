<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyController extends Controller
{
    public function index()
    {
        return Inertia::render('companies/Index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Company $company)
    {
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
