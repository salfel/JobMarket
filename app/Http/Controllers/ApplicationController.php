<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ApplicationController extends Controller
{
	public function store(ApplicationRequest $request, Job $job)
	{
		if (! Gate::allows('create', Application::class)) {
			$request->session()->flash('alert', ['type' => 'error', 'message' => 'You have to be logged in!']);

			return redirect()->back();
		}

		Application::create([
			...$request->validated(),
			'user_id' => Auth::user()->id,
			'job_id' => $job->id
		]);

		return to_route('dashboard');
	}

	public function show(Application $application)
	{
	}

	public function edit(Application $application)
	{
	}

	public function update(Request $request, Application $application)
	{
	}

	public function destroy(Application $application)
	{
	}
}
