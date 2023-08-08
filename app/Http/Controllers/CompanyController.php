<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $region = $request->get('region');
        $regions = empty($region) ? [] : explode(',', strtolower($region) ?: '');

        if ($search) {
            $companies = Company::search($request->get('q'))->take(Company::count())->query(function (Builder $query) use ($regions) {
                $query = $query->with('jobs');
                count($regions) !== 0 && $query = $query->whereIn('region', $regions);

                return $query;
            });
        } else {
            $companies = Company::with('jobs');
            count($regions) !== 0 && $companies = $companies->whereIn('region', $regions);
        }

        return Inertia::render('companies/Index', [
            'companies' => fn () => $companies->paginate(10)->withQueryString()->appends('query', null),
        ]);
    }

    public function show(Company $company)
    {
        return Inertia::render('companies/Show', [
            'company' => $company,
            'jobs' => $company->jobs()->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    public function store(CompanyRequest $request)
    {
        Gate::authorize('create', Company::class);
        $path = $request->file('logo')->store('public/logos');
        $attributes = [
            ...$request->validated(),
            'logo' => '/'.str_replace('public', 'storage', $path),
            'owner_id' => Auth::user()->id,
        ];
        $company = Company::create($attributes);

        return to_route('companies.show', [$company->id]);
    }

    public function create(Request $request)
    {
        if (! Gate::allows('create', Company::class)) {
            $request->session()->flash('alert', ['type' => 'error', 'message' => 'You have to be logged in!']);

            return redirect()->back();
        }

        return Inertia::render('companies/Create');
    }

    public function edit(Company $company)
    {
        if (! Gate::allows('update', $company)) {
            session()->flash('toast', ['type' => 'error', 'message' => 'You are not authorized to edit this company.']);

            return back();
        }

        return Inertia::render('companies/Edit', [
            'company' => $company,
        ]);
    }

    public function update(CompanyRequest $request, Company $company)
    {
        Gate::authorize('update', $company);
        $attributes = $request->validated();
        $company->update($attributes);

        return to_route('companies.show', [$company->id]);
    }

    public function destroy(Company $company)
    {
        Gate::authorize('delete', $company);
        $company->delete();

        return to_route('companies.index');
    }
}
