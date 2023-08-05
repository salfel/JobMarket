<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::search($request->get('q'))->take(500)->get()->toArray();
        $jobs = array_filter($jobs,
            fn ($job) => str_contains(strtolower($job['region']), strtolower($request->get('region') ?: '')));
        $jobs = paginateArray($jobs, 10, path: '/jobs');

        return Inertia::render('jobs/Index', [
            'jobs' => $jobs,
        ]);
    }

    public function store(JobRequest $request)
    {
        $this->authorize('create', Job::class);

        return Job::create($request->validated());
    }

    public function show(Job $job)
    {
        $this->authorize('view', $job);

        return $job;
    }

    public function update(JobRequest $request, Job $job)
    {
        $this->authorize('update', $job);

        $job->update($request->validated());

        return $job;
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);

        $job->delete();

        return response()->json();
    }
}
