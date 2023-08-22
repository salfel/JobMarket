<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
		return Inertia::render('Dashboard', [
			'user' => Auth::user()->load('applications.job.company', 'companies')
		]);
    }
}
