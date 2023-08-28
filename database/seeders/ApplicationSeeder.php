<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = Job::all();

        $jobs->each(function($job) {
            Application::factory(5)->create([
                'job_id' => $job->id,
                'user_id' => User::inRandomOrder()->first()
            ]);
        });
    }
}
