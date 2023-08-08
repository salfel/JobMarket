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
        $region = $request->get('region');
        $regions = empty($region) ? [] : explode(',', strtolower($region) ?: '');

        $jobs = Job::search($request->get('q'))->take(100)->get();
        $jobs = $jobs->filter(fn ($company) => count($regions) === 0 || in_array(strtolower($company['region']), $regions));
        $jobs = sortByDate($jobs->toArray());
        $jobs = paginateCollection($jobs, 10, path: '/companies');

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
        return Inertia::render('jobs/Show', [
            'job' => $job,
        ]);
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
