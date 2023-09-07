<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class SettingsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
		return Inertia::render('Settings');
    }
}
