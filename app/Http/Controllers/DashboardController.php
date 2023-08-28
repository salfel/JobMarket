<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
		$user = Auth::user();

		if ($user->has('company')) {
			$test = new SupportCollection;
			$test->sortBy('created_at');
			$applications = $user->load('company.applications.job')->company->applications;
			$paginator = new LengthAwarePaginator($applications->forPage(LengthAwarePaginator::resolveCurrentPage('applications'), 10)->values(), count($applications), 10, options: ['pageName' => 'applications', 'path' => 'dashboard']);
			return Inertia::render('Dashboard', [
				'company' => $user->company()->first(),
				'applications' => $paginator
			]);
		}

		return Inertia::render('Dashboard', [
			'applications' => $user->applications()->with('job')->get(),
			'companies' => $user->companies()
		]);
    }
}
