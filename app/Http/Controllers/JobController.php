<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $region = $request->get('region');
        $regions = empty($region) ? [] : explode(',', strtolower($region) ?: '');

        if ($search) {
            $jobs = Job::search($request->get('q'))->take(10)->query(function (Builder $query) use ($regions) {
                $query = $query->latest();
                count($regions) !== 0 && $query = $query->whereIn('region', $regions);

                return $query;
            });
        } else {
            $jobs = Job::latest();
            count($regions) !== 0 && $jobs = $jobs->whereIn('region', $regions);
        }

        return Inertia::render('jobs/Index', [
            'jobs' => $jobs->paginate(10)->withQueryString()->appends('query', null),
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
