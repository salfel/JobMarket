<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::factory(10)->create([
            'owner_id' => User::first()->id,
        ]);
    }
}
