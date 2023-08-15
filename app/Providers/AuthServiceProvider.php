<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Policies\ApplicationPolicy;
use App\Policies\CompanyPolicy;
use App\Policies\JobPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Company::class => CompanyPolicy::class,
        Job::class => JobPolicy::class,
        Application::class => ApplicationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
