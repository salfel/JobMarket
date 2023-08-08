<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::all();
        foreach ($companies as $company) {
            Job::factory(5)->create([
                'company_id' => $company->id,
            ]);
            $company->jobs()->searchable();
        }
    }
}
